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
            <li class="breadcrumb-item"><a href="{{route('appointment_times.index')}}">Appointment Time</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Appointment Time</h1>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <form id="appointment-form" class="needs-validation" novalidate>
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="time_from">Time From <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time_from" value="{{old('time_from',$data->time_from)}}" aria-describedby="" name="time_from">
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="time_to">Time To <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time_to" value="{{old('time_to',$data->time_to)}}" aria-describedby="" name="time_to">
                            </div>
                            <!-- End of input -->
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
        $("#appointment-form").submit(function(e){
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Editing...').prop('disabled', true);

            e.preventDefault();
           
            
            $.ajax({
                url:'{{route('appointment_times.update')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                        notyf.open({
                            type: 'success',
                            message: data.msg
                        });
                        
                    $(".submit-button").html('Save').prop('disabled', false);

                },
                error:function(data)
                {
                    // alert('error')
                    // notyf.success(data.error);
                    notyf.open({
                            type: 'error',
                            message: data.error
                        });
                    $(".submit-button").html('Save').prop('disabled', false);

                }

            });
        });
                
        });
  
</script>
@endsection