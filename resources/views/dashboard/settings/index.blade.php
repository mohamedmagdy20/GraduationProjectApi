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
                    <li class="breadcrumb-item active" aria-current="page">@lang('lang.settings')</li>
                </ol>
            </nav>
            <div class="row justify-content-around w-100 ">
                <div class="col-md-12">
                    <h1 class="h4">@lang('lang.settings')</h1>
                </div>     
            </div>
        </div>
        
    </div>
    <div class="col-md-12">
        <div class="card card-body border-0 shadow mb-4 mb-xl-0">
            <h2 class="h5 mb-4">@lang('lang.dashboard') @lang('lang.settings')</h2>
            <ul class="list-group list-group-flush">
               
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                        <h3 class="h6 mb-1">Google Rechaptcha</h3>
                        <p class="small pe-4">Show I am not Robot in Admin Login</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="active_rechaptcha" {{$data[0]->value == 1 ? 'checked' : ''}} onchange="toggleActiveRechaptcha({{$data[0]['id']}},{{$data[0]['value']}})">
                            <label class="form-check-label" for="user-notification-2"></label>
                        </div>                                            
                    </div>
                </li>
             
            </ul>

            <div class="row">
                <form method="POST" id="location-form">
                    @csrf
                <div class="col-md-12">
                    <input type="hidden" class="form-control" placeholder="lat" value="{{$location->lat}}" name="lat" id="lat">
                    <input type="hidden" class="form-control" placeholder="long" value="{{$location->long}}" name="long"
                        id="lng">
                        <label for="">Select Location of Center</label>
                    <div id="map" style="height:500px; width: 100%;" class="my-3"></div>
                </div>
                <button class="btn btn-primary" id="submit-form">Save Location</button>
            </form>

            </div>
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

<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: {{$location->lat}},
                lng: {{$location->long}}
            },
            zoom: 8,
            scrollwheel: true,
        });

        const uluru = {
            lat: {{$location->lat}},
            lng:  {{$location->long}}
        };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'position_changed',
            function() {
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })

        google.maps.event.addListener(map, 'click',
            function(event) {
                pos = event.latLng
                marker.setPosition(pos)
            })
    }
</script>

<script>

    $(document).ready(function(){
     $("#location-form").submit(function(e){
         $("#submit-form").html('<i class="fa fa-spinner fa-spin"></i> Process...').prop('disabled', true);

         e.preventDefault();
        
         
         $.ajax({
             url:'{{route('settings.location.update')}}',
             header:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             },
             type:'POST',
             data: new FormData(this),
             processData:false,
             contentType:false,
             success:function(data){
                 if(data.status === true){
                     $("#submit-form").html('Save').prop('disabled', false);
                     notyf.open({
                         type: 'success',
                         message: data.msg
                     });
                 }else{
                     $("#submit-form").html('Save').prop('disabled', false);
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
             }

         });
     });
    
     });

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

@endsection