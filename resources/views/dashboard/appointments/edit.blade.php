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
            <li class="breadcrumb-item active" aria-current="page">@lang('lang.edit') @lang('lang.appointment')</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">@lang('lang.edit') @lang('lang.appointment') </h1>
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
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">@lang('lang.patient') <span class="text-danger">*</span></label>
                                <select name="patient_id" class="selectize">
                                    @foreach ($patients as $pat )
                                       <option value="{{$pat->id}}" {{$data->patient_id == $pat->id ? 'selected' : ''}}>{{$pat->name}}</option>                                        
                                    @endforeach
                                </select>
                                <span class="text-danger patient_id_err"></span>
                            
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="email">@lang('lang.category') <span class="text-danger">*</span></label>
                                <select name="category_id" class="selectize">
                                    @foreach ($cats as $c )
                                       <option value="{{$c->id}}" {{$data->category_id == $c->id ? 'selected' : ''}}>{{$c->name}} = {{$c->price}}</option>                                        
                                    @endforeach
                                </select>
                                <span class="text-danger category_id_err"></span>
                            
                            </div>
                            <!-- End of input -->
                        </div>


                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="register_date">@lang('lang.date') <span class="text-danger">*</span></label>
                               <input type="date"  name="register_date" class="form-control" value="{{$data->register_date}}" onchange="getAvailableTime()"  id="register_date">
                                <span class="text-danger date_err"></span>
                            
                            </div>
                            <!-- End of input -->
                        </div>

                        <input type="hidden"  name="id"  value="{{$data->id}}"   id="id">

                        
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="appointment_times_id">@lang('lang.appointment_time') <span class="text-danger">*</span></label>
                                <select name="appointment_times_id" class="form-select" id="appointment_times_id">
                                    
                                </select>
                                <span class="text-danger appointment_times_id_err"></span>
                            
                            </div>
                            <!-- End of input -->
                        </div>
                        

                        
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="appointment_time_id">@lang('lang.payment_method') <span class="text-danger">*</span></label>
                                <select name="payment_id" class="form-select" id="payment_id" >
                                    @foreach ($payments as $item)
                                    <option value="{{$item->id}}" {{$data->invoice->payment_method_id == $item->id ? 'selected' :''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger appointment_time_id_err"></span>
                            
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-lg-6 col-sm-12 " id="code-dev">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="code">@lang('lang.code') <span class="text-danger"></span></label>
                                <input type="text" name="code" class="form-control" value="{{$data->invoice->code}}"  id="code">
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

        $("#admin-form").submit(function(e){
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

            e.preventDefault();
            $.ajax({
                url:'{{route('appointments.store')}}',
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
                        $(".submit-button").html('Save').prop('disabled', true);
                     
                        notyf.open({
                            type: 'success',
                            message: data.msg
                        });


                    }else{
                        console.log(data);
                        $(".submit-button").html('Save').prop('disabled', true);

                        notyf.open({
                            type: 'error',
                            message: "Error Accure",
                        });
                    }
                        
                },
                error:function(data)
                {
                    $(".submit-button").html('Save').prop('disabled', false);
                    
                    if(data.status == 422){
                        // printErrorMsg(data.responseJSON.errors)
                        msg = data.responseJSON.errors
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
                
        });


        function getAvailableTime() {
            let date = $("#register_date").val();
            $.ajax({
                type: 'GET',
                url: `{{route('appointements.time.data')}}`,
                data:{date},
                success: function(data) {
                    console.log(data);
                    $("#appointment_times_id").html(data);
                },
                error: function(error) {
                    console.log(error);
                    alert('error')
                }
            });
        }
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

        // function showCode()
        // {
        //     let method = $("#payment_id").val();
        //     let code_div = $("#code-dev");
        //     if(method == '2' || method == '3' )
        //     {
        //         code_div.removeClass('d-none')
        //     }else{
        //         code_div.addClass('d-none')
        //     }
        // }

       
</script>
@endsection