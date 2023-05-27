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
            <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Add Doctor</h1>
        </div>
        <div>
            {{-- <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/components/forms/" class="btn btn-outline-gray"><i class="far fa-question-circle me-1"></i> Forms Docs</a> --}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <form id="admin-form" class="needs-validation" novalidate enctype="multipart/form-data">

                    @csrf

                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name"  aria-describedby="" name="name">
                                <span class="text-danger m-1 name_err"></span>
                            </div>
                            <!-- End of input -->
                        </div>
                        
                        <div class="col-lg-6 col-sm-6">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" aria-describedby="" name="phone">
                                <span class="text-danger m-1 phone_err"></span>
                          
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">Email </label>
                                <input name="email" id="email" cols="30" rows="10" class="form-control">
                                <span class="text-danger m-1 email_err"></span>
                           
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <div class="mb-4">
                                <label for="image">image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image-input" aria-describedby="" name="image">
                                <span class="text-danger m-1 image_err"></span>
                           
                            </div>
                        </div> 
                        <div class="col-md-12 col-sm-12">
                            <div id="image-container"></div>
                        </div>
                  
                  
                        <div class="col-md-12">
                            {{-- <input type="submit" value="Save" class="btn btn-primary submit-form"> --}}

                            <button type="submit" class="btn btn-primary submit-form">
                                Save
                            </button>
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
            $('.submit-form').html('<i class="fa fa-spinner fa-spin"></i> Adding...').css('disable',false);
         
            e.preventDefault();

            $.ajax({
                url:'{{route('doctors.store')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                    console.log(data);
                    
                    $('submit-form').html('Save').css('disable',true);

                        
                    if(data.status === true){
                     
                        notyf.open({
                            type: 'success',
                            message: data.msg
                        });

                    }else{
                        console.log(data);
                        notyf.open({
                            type: 'error',
                            message: "Error Accure",
                        });

                    }

                },
                error:function(data)
                {
                    // alert('error')
                    // notyf.success(data.error);
                    if(data.status == 422){
                        msg = data.responseJSON.errors
                        $.each(msg,function(key,value){
                            $(`.${key}_err`).text(value)
                        })
                    }
                    notyf.open({
                            type: 'error',
                            message: "Error Accure",

                        });
                    $('.submit-form').html('Save').css('disable',true);

                }

            });
        });
      
        });
  
</script>
@endsection