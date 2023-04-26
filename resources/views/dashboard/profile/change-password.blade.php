@extends('dashboard')
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Change Password</h1>
            {{-- <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p> --}}
        </div>
        <div>
            <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/forms/" class="btn btn-outline-gray"><i class="far fa-question-circle me-1"></i> Forms Docs</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <form id="password-form" class="needs-validation" novalidate enctype="multipart/form-data">

                    @csrf

                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Old Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="old_password"  aria-describedby="" name="old_password">
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="password">New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="price" aria-describedby="" name="password">
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation" aria-describedby="" name="password_confirmation">
                            </div>
                            <!-- End of input -->
                        </div>

                    
                  
                  
                        <div class="col-md-12">
                            {{-- <input type="submit" value="Save" class="btn btn-primary"> --}}
                            <button class="btn btn-primary submit-button">Save</button>
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

        $("#password-form").submit(function(e){
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

            e.preventDefault();
            $.ajax({
                url:'{{route('admin.change-password')}}',
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
                            message: data.error,
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

            });
        });
                
        });

       
</script>
@endsection