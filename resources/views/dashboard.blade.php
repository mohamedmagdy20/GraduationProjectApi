
<!DOCTYPE html>
<html lang="en" dir="">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Brain Center Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
<meta name="author" content="Themesberg">
<meta name="description" content="Brain Center Admin Panel">
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">


<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/image/favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/image/favicon/brain-logo.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/image/favicon/brain-logo.png')}}">
<link rel="manifest" href="{{asset('assets/image/favicon/brain-logo.png')}}">
<link rel="mask-icon" href="{{asset('assets/image/favicon/brain-logo.png')}}" color="#ffffff">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link type="text/css" href="{{asset('assets/lib/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

<!-- Notyf -->
<link type="text/css" href="{{asset('assets/lib/notyf/notyf.min.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{asset('assets/lib/datatables/datatables.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}
<link rel="stylesheet" href="{{asset('assets/css/date-picker.css')}}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css" integrity="sha512-rBi1cGvEdd3NmSAQhPWId5Nd6QxE8To4ADjM2a6n0BrqQdisZ/RPUlm0YycDzvNL1HHAh1nKZqI0kSbif+5upQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.3/viewer.min.css" integrity="sha512-zdX1vpRJc7+VHCUJcExqoI7yuYbSFAbSWxscAoLF0KoUPvMSAK09BaOZ47UFdP4ABSXpevKfcD0MTVxvh0jLHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Volt CSS -->
<link type="text/css" href="{{asset('assets/css/volt.css')}}" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

@yield('css')

<style>
    .notification {
        background-color: #E11D48;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
    }
</style>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
       
        Pusher.logToConsole = true;
        
        var pusher = new Pusher('330999961f09239ec1cc', {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('my-channel');
        channel.bind('appointment-added', function(data) {
          // alert(JSON.stringify(data));
          notyf.open({
              type: 'success',
              message: `${data.name} Has Make Appointment`,
          });
         
          old = $('#notification-count').text();
          $('#notification-count').text(parseInt(old) + 1 );

        });


        var othChannel  = pusher.subscribe('start-message');

        othChannel.bind('start-chat-with-doctor', function(data) {
          console.log(data);
          notyf.open({
              type: 'success',
              message: `${data.docName} Has Sent Request To Start Chat`,
          });         
          old = $('#chat-count').text();
          $('#chat-count').text(parseInt(old) + 1 );
        });


  // Enable pusher logging - don't include this in production
  
</script>
</head>

<body>
    @include('layouts.loader')
        <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
        

    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="{{route('dashboard')}}">
            <img class="navbar-brand-dark" src="{{asset('assets/image/brand/light.svg')}}" alt="Volt logo" /> <img class="navbar-brand-light" src="{{asset('assets/image/brand/dark.svg')}}" alt="Volt logo" />
        </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <audio id="audio" src="{{asset('sounds/notification.mp3')}}" autoplay muted></audio>

</nav>
@include('layouts.sidebar')    



<main class="content">

    @include('layouts.navigation')




    @yield('content')




<div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
    <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
        <span class="fw-bold d-inline-flex align-items-center h6">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
            Settings
        </span>
    </div>
</div>

    @include('layouts.footer')
</main>


    <!-- Core -->
<script src="{{asset('assets/lib/@popperjs/core/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')}}"></script>


<!-- Vendor JS -->
<script src="{{asset('assets/lib/onscreen/dist/on-screen.umd.min.js')}}"></script>

<!-- Slider -->
<script src="{{asset('assets/lib/nouislider/dist/nouislider.min.js')}}"></script>

<!-- Smooth scroll -->
<script src="{{asset('assets/lib/smooth-scroll/dist/smooth-scroll.min.js')}}"></script>

<!-- Charts -->
<script src="{{asset('assets/graphs/charts.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.umd.min.js" integrity="sha512-TJ7U6JRJx5IpyvvO9atNnBzwJIoZDaQnQhb0Wmw32Rj5BQHAmJG16WzaJbDns2Wk5VG6gMt4MytZApZG47rCdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <!-- Datepicker -->
<script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> --}}

<!-- Sweet Alerts 2 -->
{{-- <script src="{{asset('assets/lib/sweetalert2/dist/sweetalert2.all.min.js')}}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
{{-- <script src="{{asset('assets/js/sweet_alert.js')}}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{asset('assets/lib/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

<script src="{{asset('assets/lib/notyf/notyf.min.js')}}"></script>

<!-- Simplebar -->
<script src="{{asset('assets/lib/simplebar/dist/simplebar.min.js')}}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

{{-- datatables --}}
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/lib/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/lib/datatables/datatables.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" integrity="sha512-24XP4a9KVoIinPFUbcnjIjAjtS59PUoxQj3GNVpWc86bCqPuy3YxAcxJrxFCxXe4GHtAumCbO2Ze2bddtuxaRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Loader --}}
<script src="{{asset('assets/js/loader.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>

<script src="{{asset('assets/js/date-picker.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<!-- Volt JS -->
<script src="{{asset('assets/js/volt.js')}}"></script>

@yield('js')

<script>
    $(document).ready(function() {
        const imageElements = document.querySelectorAll('.image-viewer');
        imageElements.forEach((element) => {
            new Viewer(element);
            $('.image-viewer').ezPlus({
                zoomType: 'inner',
                cursor: 'crosshair'
            });
        });
    });

   

</script>


<script>
$('.selectize').selectize();    
</script>
<script>
        const notyf = new Notyf({
        position: {
            x: 'right',
            y: 'top',
        },
        types: [
            {
                type: 'error',
                background: '#FA5252',
                icon: {
                    className: 'fas fa-times',
                    tagName: 'span',
                    color: '#fff'
                },
                dismissible: false
            }
        ]
        });

        function viewImg(img)
        {
            new Viewer(img);
            $(img).ezPlus({
                zoomType: 'inner',
                cursor: 'crosshair'
            });
        }

        

        // var $disabledResults = $(".select");
        // $disabledResults.select2();


        var input = document.getElementById('image-input');
        input.addEventListener('change', handleFileSelect, false);

        function handleFileSelect(event) {
         var file = event.target.files[0];
               
         // Check if the selected file is an image
         if (!file.type.match('image.*')) {
           alert('Please select an image file.');
           return;
         }
         
         // Create a FileReader object to read the file
         var reader = new FileReader();
         
         // Set the onload event handler of the FileReader object
         reader.onload = function(event) {
           // Create an image element with the selected image
           var img = document.createElement('img');
           img.setAttribute('src', event.target.result);
           img.onclick = function() { 
                new Viewer(img);
                $(img).ezPlus({
                    zoomType: 'inner',
                    cursor: 'crosshair'
                });
            };
           
           // Add the image element to the image container div
           var container = document.getElementById('image-container');
           container.appendChild(img);
         };
         
         // Read the selected file as a data URL
         reader.readAsDataURL(file);
        }
</script>
<script>
    $('input[name="dates"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
</script>


{{-- Datatables Buttons --}}
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
</body>

</html>
