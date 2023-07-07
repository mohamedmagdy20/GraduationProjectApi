<?php

namespace App\Http\Controllers\Api;

use App\Events\StartMessageNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\GetChatRequest;
use App\Http\Requests\Chat\StoreChatRequest;
use App\Models\Chat;
use App\Models\ChatParticipant;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index(GetChatRequest $request)
    {
        $data = $request->validated();
        $isPrivate = true;

        if($request->has('is_private'))
        {
            $isPrivate = (int)$data['is_private'];
        }
        $chats = Chat::where('is_private',$isPrivate)
        ->hasParticipant(auth()->user()->id)
        ->whereHas('message')
        ->with('lastMessage.doctor','participants.doctor')->get();

        return response()->json(['data'=>$chats,
            'status'=>true
        ]);
    }

    public function show(Chat $chat)
    {
        $chat->load('lastMessage.doctor','participants.doctor');
        return response()->json(['data'=>$chat,
        'status'=>true
        ]);   
    }

    public function store(Request $request)
    {
        $previousChat = $this->getperviousChat();   
        $doctorName = auth()->user()->name;
        if($previousChat == null)
        {
            $chat = Chat::create(['created_by'=>auth()->user()->id,'name'=>auth()->user()->name]);
            // create participant 
            ChatParticipant::create([
                'chat_id'=>$chat->id,
                'doctor_id'=>auth()->user()->id,
                'user_id'=>3,
            ]);
            // $chat->refresh()->load('lastMessage.doctor','participants.doctor');
            $chat_id = $chat->id;

        }else{
            $chat_id = $previousChat->id;
        }
        broadcast(new StartMessageNotification($doctorName));
        return response()->json(['chat_id'=>$chat_id,'status'=>true]); 

    }

    

    private function getperviousChat()
    {
        $doctorId = auth()->user()->id;
        return Chat::where('is_private',1)->whereHas('participants',function($q) use($doctorId){
            $q->where('doctor_id',$doctorId);
        })->first();
    }
}
