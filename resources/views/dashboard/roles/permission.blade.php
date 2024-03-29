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
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">@lang('lang.roles')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('lang.edit') @lang('lang.permission')</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">@lang('lang.edit') @lang('lang.permission')  {{$role->display_name}}</h1>
            {{-- <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p> --}}
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body"> 
                <form id="permissions-form" class="needs-validation" novalidate>
                    @csrf

                    <div class="row mb-4">
                     <input type="hidden" name="role_id" value="{{$role->id}}" id="role_id">
                        <div class="col-md-12">
                            <label for="role">@lang('lang.roles') <span class="text-danger">*</span></label>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll"
                                     value="" name=""
                                     >
                                    <label class="form-check-label" for="selectAll">
                                       @lang('lang.select_all')
                                    </label>
                                </div>
                            </div>
                        
                            <div class="row">
                            
                                @foreach ($data as $permission )
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck-{{$permission->id}}"
                                         {{ $role->hasPermission($permission->name) ? 'checked' : '' }}
                                         value="{{ $permission->id }}" name="permissions[]"
                                         >
                                        <label class="form-check-label" for="defaultCheck-{{$permission->id}}">
                                            {{  App::isLocale('ar') ? $permission->description :  $permission->display_name}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        
                        </div>
                        <div class="col-md-12">
                            {{-- <input type="submit" value="Save" class="btn btn-primary "> --}}
                            
                            <button type="submit" class="btn btn-primary submit-button">@lang('lang.save')</button>
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
        $("#permissions-form").submit(function(e){
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

            e.preventDefault();
           
            
            $.ajax({
                url:'{{route('permissions.update')}}',
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                    console.log(data);
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
                    console.log(data);
                    // alert('error')
                    // notyf.success(data.error);
                    notyf.open({
                            type: 'error',
                            message: data.error
                        });
                }

            });
        });

        $("#selectAll").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    
        });

                
        });
  
</script>
@endsection