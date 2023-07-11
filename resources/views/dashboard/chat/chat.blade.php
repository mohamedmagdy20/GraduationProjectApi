@extends('dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/chat.css')}}">
<style>
  .reverse{
    margin-left: auto; 
    margin-right: 0;
  }
  .send-back{
    background: #D1D5DB;
  }
</style>
@endsection
@section('content')

<div class="py-4">
  <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
          <li class="breadcrumb-item">
              <a href="{{route('dashboard')}}">
                  <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
              </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">@lang('lang.chat')</li>
      </ol>
  </nav>
  <div class="d-flex justify-content-between w-100 flex-wrap">
      <div class="mb-3 mb-lg-0">
          <h1 class="h4">Chat With {{$data->craetedBy->name}} </h1>
      </div>
  </div>
</div>

<div class="container py-5 px-4">
  <div class="row rounded-lg overflow-hidden shadow">
    <!-- Chat Box--> 
    <div class="col-12 px-0">
      <div class="px-4 py-5 chat-box bg-white" id="chat-content">
        @foreach ($data->message as $d )
          @if ($d->type == 'user')
          <div class="media w-50 reverse mb-3">
            <div class="media-body">
              <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">{{$d->message}}</p>
              </div>
              <p class="small text-muted">{{$d->created_at->format('h:i:s')}}</p>
            </div>
          </div>         
          @else
          
          <div class="media w-50  mb-3">
            <div class="media-body">
              <div class="bg-info rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">{{$d->message}}</p>
              </div>
              <p class="small text-muted">{{$d->created_at->format('h:i:s')}}</p>
            </div>
          </div>

          @endif
        @endforeach
      </div>

      <!-- Typing area -->
        <div class="input-group" style="background-color:#D1D5DB">
          <input type="text" placeholder="@lang('lang.type_message')" id="message"  class="form-control rounded-0 border-0 py-4 bg-dark">
            <button  id="send" class="btn btn-primary"> <i class="fa fa-paper-plane"></i></button>
        </div>
     
    </div>
  </div>
</div>

  <input type="hidden" name="" id="chat_id" value="{{$data->id}}">
  <input type="hidden" name="" id="doctor_id" value="{{$data->created_by}}">
  <input type="hidden" name="" id="user_id" value="{{auth()->user()->id}}">


@endsection
@section('js')
<script>
 
  // $("#send").click(function(){
  //   $.post('dashboard/chat/send-message',
  //   {
  //     message:message,
  //     chat_id:chat_id,
  //     doctor_id:doctor_id,
  //     user_id:user_id
  //   },
  //   function(data , status){
  //     console.log(data);
  //     console.log(status);
  //     let senderMessage=''+`
  //     <div class="media media-chat media-chat-reverse">
  //         <div class="media-body">
  //           <p class="meta"><time datetime="2018">${data.data.created_at}</time></p>
  //           <p class="meta"><time datetime="2018">${message}</time></p>
  //         </div>
  //     </div>
  //     `;
  //     $("#chat-content").append(senderMessage)
  //   });
  // });


  $(document).ready(function(){
      $("#send").click(function(e){
        $("#send").html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

        let message = $("#message").val();
        let chat_id = $("#chat_id").val();
        let doctor_id = $("#doctor_id").val();
        let user_id = $("#user_id").val();

        // prepare data 
        var form_data = new FormData()
        form_data.append('doctor_id',doctor_id)
        form_data.append('message',message)
        form_data.append('chat_id',chat_id)
        form_data.append('user_id',user_id)




        $.ajax({
                url:'{{route('chat.send')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data:form_data,
                processData:false,
                contentType:false,
                success:function(data){
                  console.log(data);
                    if(data.status === true){
                      let senderMessage=''+`
                          <div class="media w-50 reverse mb-3">
                            <div class="media-body">
                              <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">${data.data.message}</p>
                              </div>
                              <p class="small text-muted">${data.data.time}</p>
                            </div>
                          </div>               
                        `;
                        scrollToBottom()
                        $("#chat-content").append(senderMessage)  
                        $("#message").val('')  
                        $("#send").html('<i class="fa fa-paper-plane"></i>').prop('disabled', false);


                        
                        
                      }
                },
                error:function(data)
                {
                  console.log(data);                    
                }

            });
      });
  });

  function scrollToBottom() {
      var chatContainer = document.getElementById('chat-content');
      chatContainer.scrollTop = chatContainer.scrollHeight;
  }

  Pusher.logToConsole = true;
        
        var pusher = new Pusher('330999961f09239ec1cc', {
          cluster: 'ap1'
        });

  var channel = pusher.subscribe(`chat.{{$data->id}}.{{$data->created_by}}`);
        channel.bind('message.doctor.sent', function(data) {
          let senderMessage=''+`

          <div class="media w-50  mb-3">
            <div class="media-body">
              <div class="bg-info rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white">${data.chatMessage.message}</p>
              </div>
              <p class="small text-muted">${data.chatMessage.time}</p>
            </div>
          </div>
            `;
          $("#chat-content").append(senderMessage)
        });
</script>
@endsection