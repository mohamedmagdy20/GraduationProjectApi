@extends('dashboard')
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Add Admin</h1>
        </div>
        {{-- <div>
            <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/forms/" class="btn btn-outline-gray"><i class="far fa-question-circle me-1"></i> Forms Docs</a>
        </div> --}}
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <form id="admin-form" class="needs-validation" novalidate>
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                <span class="text-danger name_err"></span>

                         
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" aria-describedby="" placeholder="Ex@email.com" name="email">
                                <span class="text-danger  email_err"></span>

                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" aria-describedby="" name="password">
                                <span class="text-danger  password_err"></span>
                        
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation" aria-describedby="emailHelp" name="password_confirmation">
                                <span class="text-danger  password_confirmation_err"></span>
                          
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-md-6">
                            <label for="email">Role <span class="text-danger">*</span></label>

                            @foreach ($role as $r )
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{$r->name}}" id="defaultCheck-{{$r->id}}" name="role_id">
                                    <label class="form-check-label" for="defaultCheck-{{$r->id}}">
                                      {{$r->display_name}}
                                    </label>
                                </div>
                         
                            @endforeach
                            <span class="text-danger  role_id_err"></span>

                        </div>
                        <div class="col-md-12">
                            {{-- <input type="submit" value="Save" class="btn btn-primary "> --}}
                            
                            <button type="submit" class="btn btn-primary submit-button">Save</button>
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
        $("#admin-form").submit(function(e){
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

            e.preventDefault();
           
            
            $.ajax({
                url:'{{route('admin.store')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                    if(data.status === true){
                        $(".submit-button").html('Save').prop('disabled', false);
                        notyf.open({
                            type: 'success',
                            message: data.msg
                        });
                    }else{
                        $(".submit-button").html('Save').prop('disabled', false);
                        console.log(data.error);
                        notyf.open({
                            type: 'error',
                            message: data.error.password[0]

                        });
                    }
                        
                },
                error:function(data)
                {
                    $(".submit-button").html('Save').prop('disabled', false);
                      
                    // alert('error')
                    // notyf.success(data.error);
                    if(data.status == 400){
                        // printErrorMsg(data.responseJSON.error)
                        msg = data.responseJSON.error
                        $.each(msg,function(key,value){
                            $(`.${key}_err`).text(value)
                            notyf.open({
                                    type: 'error',
                                    message: value
                            
                                });
                        })
                    }
                    
                }

            });
        });

        // function printErrorMsg(msg){
        //         $("span").html('');

        //         $.each(msg,function(key,value){
        //             $(`.${key}_err`).text(value)
        //             notyf.open({
        //                     type: 'error',
        //                     message: value

        //                 });
        //         })
        // }
                
        });
  
</script>
@endsection