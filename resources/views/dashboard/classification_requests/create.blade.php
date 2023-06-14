@extends('dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('css/uploads-imgs.css')}}">
@stop
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add Forms</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Classfication Request For {{$data->patient->name}}</h1>
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
                                <label for="doctor_id">Doctor <span class="text-danger">*</span></label>
                                <select name="doctor_id" class="selectize " id="doctor_id">
                                    @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End of input -->
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <!-- input -->
                            <div class="mb-4">
                                <label for="image">image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" aria-describedby="" name="image">
                            </div>
                            <!-- End of input -->
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div id="image-container"></div>
                        </div>

                  
                        <div class="col-md-12">
                            {{-- <input type="submit" value="Save" class="btn btn-primary"> --}}
                            <button class="btn btn-primary submit-button">Show Result</button>
                            <a onclick="clearResult()">Clear</a>
                        </div>
                        
                </form>    
         
            </div>
        </div>
    </div>
</div>

<div class="row"  id="Report" style="display:none">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
              <div class="card-body"> 
    
                <div class="container-fluid Report py-5" >
                
                    <div class=" patient ">
                    
                        <div class="heading ">
                            <h1>Patient Information</h1> 
                        </div>
                    
                        <div class="form-patient py-3 px-5">
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">First Name  :  {{$data->patient->name}}</td>
                                        <td>Last name : {{$data->patient->name}} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">phone : {{$data->patient->phone}}</td>
                                        <td>Age :  {{$data->patient->date_of_birth }} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Gender : {{$data->patient->gender}}</td>
                                        <td>Date : {{$data->patient->date_of_birth}} </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Type of MRI Radiology : {{$data->category->name}}</td> 
                                        <td></td>
                                    </tr>
                                
                                </tbody>
                            </table>
                    </div>
                
                
                
                    <div class="classification ">
                    
                        <div class="heading">
                            <h1>Classification</h1> 
                        </div>
                    
                        <div class="form-classification  py-3 px-5">
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"> Classification   : <span> <input type="text" class="form-control" disabled name="result" id="result"> </span> </td>
    
                                    </tr>
                                    <tr>
                                        <td scope="row">Type of MRI Radiology : {{$data->category->name}}</td> 
                                    </tr>
                                
                                    <tr>
                                        <td>image  : </td>
                                        <td><img src="" class="result-img image-viewer" id="result-img" name="result-img" alt=""> </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    </div>
                
    
                
                
    
                    <div class="classification ">
                    
                        <div class="heading ">
                            <h1>CT Report</h1> 
                        </div>
                    
                        <div class="form-classification  py-3 px-5">
                        
                            {{-- <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"> Classification   : NoTumor  </td>
    
                                    </tr>
                                    <tr>
                                        <td>History : A 22-year-old women with a 
                                            medical history of brain disease was asmittrd to hospital for routine evaluation . </td> 
                                    </tr>
                                
                                </tbody>
                            </table> --}}
                    </div>
                    </div>
                    <p class="text-warning">Save File to Patient Through Google Drive</p>
                           {{-- <input type="file" name="files[]" class="form-control" multiple id="files"> --}}
                           
                        {{-- <div class="multiple-uploader" id="multiple-uploader">
                            <div class="mup-msg">
                                <span class="mup-main-msg">click to upload images.</span>
                                <span class="mup-msg" id="max-upload-number">Upload up to 10 images</span>
                                <span class="mup-msg">Only images, pdf and psd files are allowed for upload</span>
                            </div>
                        </div> --}}
                            <div class="from-group">
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                      <label class="upload__btn">
                                        <p>Upload images</p>
                                        <input type="file" multiple="" name="files[]" data-max_length="20" id="files" class="upload__inputfile btn btn-info">
                                      </label>
                                    </div>
                                    <div class="upload__img-wrap"></div>
                                  </div>
                              
                     
                    </div>

                    <div class="form-group">
                        <label for="select-files">Note</label>
                        <textarea name="note" id="note" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                
                
                    <input type="hidden" id="category_id" value="{{$data->category_id}}">
                    <input type="hidden" id="patinet_id" value="{{$data->patient_id}}">
                    <input type="hidden" id="appointment_id" value="{{$data->id}}">
                    <input type="hidden" id="url" value="{{$data->category->url}}">
                
                </div>

                <div class="col-md-12 mb-4">
                    <button class="btn btn-primary save-button" id="save-result">Save</button>
                </div>
    
                </div>
            </div>
           
        
        </div>
       
        
  
 
</div>

@endsection

@section('js')
<script src="{{asset('js/multiple-uploader.js')}}"></script>
<script>
    $(document).ready(function(){

        $("#admin-form").submit(function(e){
            $(".submit-button").html('<i class="fa fa-spinner fa-spin"></i> Process...').prop('disabled', true);

            e.preventDefault();

            url = $("#url").val()
            $.ajax({
                url:`${url}`,
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                data: new FormData(this),
                processData:false,
                contentType:false,
                success:function(data){
                    $("#Report").css('display','block')
                    showResult(data.type)
                    $(".submit-button").html('Save').prop('disabled', false);      
                },
                error:function(data)
                {
                    $(".submit-button").html('Save').prop('disabled', false);
                    console.log(data);
                    notyf.open({
                            type: 'error',
                            message: "Error Accure"
                        });
                }

            });
        });
    });


    // show Report and pass data 
    function  showResult(result)
    {
        $("#result").val(result)    
    }

    function clearResult()
    {   
        $("#Report").css('display','none')
        $("#result").val('')


    }


        var input = document.getElementById('image');
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

           $(".result-img").attr("src",event.target.result);
           // Add the image element to the image container div
           var container = document.getElementById('image-container');
           container.appendChild(img);

         };
         
         // Read the selected file as a data URL
         reader.readAsDataURL(file);
        }

      

</script>

<script>
 $(document).ready(function(){

    $("#save-result").click(function(e){
            $(".save-button").html('<i class="fa fa-spinner fa-spin"></i> Process...').prop('disabled', true);

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                e.preventDefault()

                doctor_id = $("#doctor_id").val();
                note = $("#note").val();
                result = $('#result').val();
                img = document.getElementById('image');
                category_id = $('#category_id').val();
                patient_id = $('#patinet_id').val();
                appointment_id = $("#appointment_id").val()

                console.log(img);


                // //////////////////////////
                var form_data = new FormData()

                
                var files = $('#files')[0].files;
                for (var i = 0; i < files.length; i++) {
                    form_data.append('files[]', files[i]);
                }
                form_data.append('doctor_id',doctor_id)
                form_data.append('patient_id',patient_id)
                form_data.append('category_id',category_id)
                form_data.append('result',result)
                form_data.append('img',img.files[0])
                form_data.append('appointment_id',appointment_id)
                form_data.append('_token',"{{csrf_token()}}")
                form_data.append('note',note)


                // console.log(alldata);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:`{{route('classification-request.make')}}`,
                    type:'POST',
                    data:form_data,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        // alert(response.image)
                        console.log(data);
                        // if(data.status === true){  
                        $(".save-button").html('Save').prop('disabled', false);
                    
                        notyf.open({
                        type: 'success',
                            message: data.msg
                        });
                        // window.location.replace("{{route('classification-request.index')}}");
                        // window.reload()
                    

                    },
                    error:function(data)
                    {
                        console.log(data);
                        $(".save-button").html('Save').prop('disabled', false);
                        notyf.open({
                                type: 'error',
                                message: data.error
                            });
                    }
                
                });
        });

});


</script>

<script>
    CKEDITOR.replace('note');
</script>
@endsection