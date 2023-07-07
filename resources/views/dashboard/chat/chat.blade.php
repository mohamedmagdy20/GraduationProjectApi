@extends('dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/chat.css')}}">
@endsection
@section('content')


<div class="page-content page-container" id="page-content">
    <div class="padding">
      <div class="row container d-flex justify-content-center">
        <div class="col-md-12">
          <div class="card card-bordered">
            <div class="card-header">
              <h4 class="card-title"><strong>Chat</strong></h4>
            </div>


            <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
              style="overflow-y: scroll !important; height:400px !important;">


              <div class="media media-chat media-chat-reverse">
                <div class="media-body">
                  <p>Hiii, I'm good.</p>
                  <p>How are you doing?</p>
                  <p>Long time no see! Tomorrow office. will be free on sunday.</p>
                  <p class="meta"><time datetime="2018">00:06</time></p>
                </div>
              </div>

              

              <div class="media media-chat">
                <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                <div class="media-body">
                  <p>Okay</p>
                  <p>We will go on sunday? </p>
                  <p class="meta"><time datetime="2018">00:07</time></p>
                </div>
              </div>






              <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">
                </div>
              </div>
              <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
              </div>
            </div>

            <div class="publisher bt-1 border-light">
              <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png"
                alt="...">
              <input class="publisher-input" name="message" id="message" type="text" placeholder="Write something">
              {{-- <span class="publisher-btn file-group">
                <i class="fa fa-paperclip file-browser"></i>
                <input type="file" name="file" id="file">
              </span> --}}
              <a class="publisher-btn text-info" id="send" data-abc="true"><i class="fa fa-paper-plane"></i></a>
            </div>

          </div>
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
                    if(data.status === true){
                      let senderMessage=''+`
                        <h1>${data.data.message}</h1>
                        `;
                        $("#chat-content").append(senderMessage)
                        
                      }

                
                        
                },
                error:function(data)
                {
                  console.log(data);                    
                }

            });
      });
  });

  Pusher.logToConsole = true;
        
        var pusher = new Pusher('330999961f09239ec1cc', {
          cluster: 'ap1'
        });

  var channel = pusher.subscribe(`chat.{{$data->id}}`);
        channel.bind('message.sent', function(data) {
          let senderMessage=''+`
            <div class="media media-chat">
                <div class="media-body">
                  <p class="meta"><time datetime="2018">Hi</time></p>
                </div>
            </div>
            `;
          $("#chat-content").append(senderMessage)
        });
</script>
@endsection