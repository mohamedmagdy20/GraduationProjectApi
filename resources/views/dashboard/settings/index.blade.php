@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow mb-4 mt-5 p-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
            </nav>
            <div class="row justify-content-around w-100 ">
                <div class="col-md-12">
                    <h1 class="h4">Settings</h1>
                </div>     
            </div>
        </div>
        
    </div>
    <div class="col-md-12">
        <div class="card card-body border-0 shadow mb-4 mb-xl-0">
            <h2 class="h5 mb-4">Dashboard Settings</h2>
            <ul class="list-group list-group-flush">
               
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                        <h3 class="h6 mb-1">Google Rechaptcha</h3>
                        <p class="small pe-4">Show I am not Robot in Admin Login</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="active_rechaptcha" onchange="toggleActiveRechaptcha({{$data[0]['id']}},{{$data[0]['value']}})">
                            <label class="form-check-label" for="user-notification-2"></label>
                        </div>                                            
                    </div>
                </li>
             
            </ul>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function toggleActiveRechaptcha(id,value)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: "{{route('settings.toggle-activate')}}",
            data: {_token: CSRF_TOKEN,id:id,active:value},
            dataType: 'JSON',
            success: function (results) {
                if (results.status === true) {
                    notyf.open({
                        type: 'success',
                        message: results.msg
                    });
                } else {
                    notyf.open({
                        type: 'error',
                        message: "Error Accure"
                    });
                }
            },
            error:function(result){
                notyf.open({
                        type: 'error',
                        message: "Error Accure"
                    });
            }
        });
    }
</script>
@endsection