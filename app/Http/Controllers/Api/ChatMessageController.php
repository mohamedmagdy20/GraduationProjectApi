<?php

namespace App\Http\Controllers\Api;

use App\Events\NewMessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\GetMessageRequest;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Storage;

class ChatMessageController extends Controller
{
    //
    public function index(GetMessageRequest $request)
    {
        $data = $request->validated();
        $chatId = $data['chat_id'];
        $message = ChatMessage::where('chat_id',$chatId)->with('doctor')->with('user')->latest('created_at')->get();
        return response()->json(['data'=>$message,'status'=>true]);
    }

    public function getUser()
    {
        $data = User::all();
        return response()->json(['data'=>$data,'status'=>true]);

    }

    public function store(Request $request)
    {
        $data = [];
        $data['doctor_id'] = auth()->user()->id;
        $data['user_id'] = $request->user_id;
        $data['chat_id'] = $request->chat_id;
        $data['message'] = $request->message;
        if($request->file('file'))
        {
            $imgName = time().$request->file('file')->getClientOriginalName();
            Storage::disk('chat-files')->put($imgName, file_get_contents($request->file('file')));
            $data['file'] = asset('files/chat-files/'.$imgName);
        }
        $data['type'] = 'doctor';

        $chatMessage = ChatMessage::create($data);
        $chatMessage->load('doctor');

        // Real Time Notification Message //
        $this->sendNotificationToOther($chatMessage);

        return response()->json(['data'=>$chatMessage,'message'=>'Message Sent','status'=>true]);

    }

    private function sendNotificationToOther(ChatMessage $chatMessage)
    {
        // $chatId = $chatMessage->chat_id;
        broadcast(new NewMessageSent($chatMessage))->toOthers();
    }
}
