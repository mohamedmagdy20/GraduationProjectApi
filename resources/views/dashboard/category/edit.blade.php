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
            <li class="breadcrumb-item active" aria-current="page">@lang('lang.edit') @lang('lang.category')</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">@lang('lang.edit') @lang('lang.category')</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <form id="admin-form" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id" value="{{$data->id}}">
                    
                    
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">@lang('lang.name') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" aria-describedby="" name="name" value="{{$data->name}}">
                                <span class="text-danger name_err"></span>
                          
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="price">@lang('lang.price') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="price" aria-describedby="" name="price" value="{{$data->price}}">
                                <span class="text-danger price_err"></span>
                   
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="url">@lang('lang.url') <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="url" aria-describedby="" name="url" value="{{$data->url}}">
                                <span class="text-danger url_err"></span>
                         
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="img">@lang('lang.image') <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image-input" aria-describedby="" value="{{$data->img_name}}" name="img">
                                <span class="text-danger img_err"></span>
                        
                            </div>
                            <!-- End of input -->
                            <img src="{{asset('files/category/'.$data->img_name)}}" class="w-25" alt="" srcset="">
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div id="image-container"></div>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="img">@lang('lang.note') </label>
                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{$data->notes}}</textarea>
                            </div>
                            <!-- End of input -->
                        </div>
                  
                  
                        <div class="col-md-12">
                            <button class="btn btn-primary submit-button">@lang('lang.save')</button>
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
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Checking...').prop('disabled', true);

            e.preventDefault();
            $.ajax({
                url:'{{route('category.update')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                    $(".submit-button").html('Save').prop('disabled', true);
                    console.log(data.error);
                    if(data.status === true){
                        notyf.open({
                            type: 'success',
                            message: data.msg
                        });
                    }else{
                        console.log(data);
                        notyf.open({
                            type: 'error',
                            message: "Error Accure"

                        });
                    }
                        
                },
                error:function(data)
                {
                    // // alert('error')
                    // // notyf.success(data.error);
                    // notyf.open({
                    //         type: 'error',
                    //         message: data.error
                    //     });
                    $(".submit-button").html('Save').prop('disabled', true);


                    msg = data.responseJSON.error
                        $.each(msg,function(key,value){
                            $(`.${key}_err`).text(value)
                            notyf.open({
                                    type: 'error',
                                    message: value
                            
                                });
                        })
                }

            });
        });
                
        });

</script>
@endsection