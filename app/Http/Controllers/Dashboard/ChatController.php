<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\NewMessageSent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ChatController extends Controller
{
    //
    public function index()
    {
      
        return view('dashboard.chat.index');        
    }
    public function chat($chatId)
    {
        $chats =  Chat::with('message')->with('craetedBy')->where('id',$chatId)->first();
        return view('dashboard.chat.chat',['data'=>$chats]);
    }

    public function data()
    {
        $data = Chat::query()->with('craetedBy')->latest();
        return DataTables::of($data)->addColumn('actions',function($data)
        {
            return view('dashboard.chat.action',['type'=>'actions','data'=>$data]);
        })
        ->addColumn('doc',function($data)
        {
            return $data->craetedBy->name;
        })
        ->make(true);
    }


    public function store(Request $request)
    {
        $data = [];
        $data['doctor_id'] = $request->doctor_id;
        $data['user_id'] = auth()->user()->id;
        $data['chat_id'] = $request->chat_id;
        $data['message'] = $request->message;
        if($request->file('file'))
        {
            $imgName = time().$request->file('file')->getClientOriginalName();
            Storage::disk('chat-files')->put($imgName, file_get_contents($request->file('file')));
            $data['file'] = asset('files/chat-files/'.$imgName);
        }
        $data['type'] = 'user';

        $chatMessage = ChatMessage::create($data);
        $data = [
            'image'=>$chatMessage->user->img,
            'message'=>$chatMessage->message,
            'file'=>$chatMessage->file,
            'time'=>Carbon::parse($chatMessage->created_at)->format('h:i:s')
        ];
        // Real Time Notification Message //
        $this->sendNotificationToOther($chatMessage);

        return response()->json(['data'=>$data,'message'=>'Message Sent','status'=>true]);

    }

    private function sendNotificationToOther(ChatMessage $chatMessage)
    {
        // $chatId = $chatMessage->chat_id;
        broadcast(new NewMessageSent($chatMessage))->toOthers();
    }

    public function delete(Request $request)
    {
        $admin = Chat::findOrFail($request->id);
        $admin->delete();
        return response()->json(['msg'=>'Chat Deleted','status'=>true], 200);
    }
}
