@extends('dashboard')
@section('content')
<div class="profile mt-5 mb-3">
    <div class="row">

        <div class="col-md-12 align-items-center">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">General information</h2>
                <form id="profile-form" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row align-item-center">
                        <div class="col-12">
                            <div class="card card-body border-0 shadow mb-4">
                                <h2 class="h5 mb-4">Select profile photo</h2>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <!-- Avatar -->
                                        <img class="rounded avatar-xl image-viewer" src="{{auth()->user()->img ? asset('files/admin/'.auth()->user()->img) : asset('assets/image/team/profile-picture-1.jpg')}}" data-viewer="{{auth()->user()->img}}" alt="change avatar">
                                    </div>
                                    <div class="file-field">
                                        <div class="d-flex justify-content-xl-center ms-xl-3">
                                            <div class="d-flex">
                                                <svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                                                <input type="file" name="img">
                                                <div class="d-md-block text-left">
                                                    <div class="fw-normal text-dark mb-1">Choose Image</div>
                                                    <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 align-items-center">
                            <div>
                                <label for="name">Name</label>
                                <input class="form-control" id="name"  name="name" type="text" value="{{auth()->user()->name}}" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control " id="email" name="email" type="email" value="{{auth()->user()->email}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2 submit-button" type="submit">Save</button>
                        <a href="{{route('change-password')}}" class="btn btn-danger mt-2 animate-up-2">Change Password</a>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection


@section('js')
<script>
    $(document).ready(function(){

        $('#profile-form').submit(function(e){
            alert('hi')
            e.preventDefault();
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Process...').prop('disabled', true);

            $.ajax({
                url:'{{route('admin.edit.profile')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                    console.log(data.error);
                    if(data.status === true){
                        $(".submit-button").html('Save').prop('disabled', false);
                     
                        notyf.open({
                            type: 'success',
                            message: data.msg
                        });


                    }else{
                        console.log(data);
                        $(".submit-button").html('Save').prop('disabled', false);

                        notyf.open({
                            type: 'error',
                            message: "Error Accure",
                        });
                    }
                        
                },
                error:function(data)
                {
                    $(".submit-button").html('Save').prop('disabled', false);

                    notyf.open({
                            type: 'error',
                            message: data.error
                        });
                }
            })
        })
    })
</script>
@endsection