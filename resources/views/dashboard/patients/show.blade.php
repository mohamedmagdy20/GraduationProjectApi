@extends('dashboard')

@section('content')

<div class="card card-body border-0 shadow mb-4">
        <div class="row align-item-center">
            <div class="col-12">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4"></h2>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <!-- Avatar -->
                            <img class="rounded avatar-xl image-viewer" src="{{$data->img ? $data->img : asset('assets/image/team/profile-picture-1.jpg')}}" data-viewer="{{auth()->user()->img}}" alt="change avatar">
                        </div>
                                                               
                    </div>
                </div>
            </div>
            <h2 class="h5 mb-4">@lang('lang.genral_info')</h2>

            <div class="col-md-12 card card-body border-0 shadow mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3 align-items-center">
                        <div>
                            {{-- <label for="name">Name</label>
                            <input class="form-control" id="name"  name="name" type="text" value="{{auth()->user()->name}}" required> --}}
                            <div>
                                <span>@lang('name') : </span>{{$data->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>@lang('lang.email') : </span>{{$data->email}}
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>@lang('lang.phone') : </span>{{$data->phone}}
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>@lang('lang.gender') : </span>{{$data->gender}}
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>@lang('lang.date') : </span>{{$data->date_of_birth}}
                        </div>
                    </div>
                </div>
              
            </div>

            <h2 class="h5 mb-4">@lang('lang.genral_info')</h2>


                <div class="card-title">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">@lang('lang.results')</button>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('lang.appointment')</button>
                        </li>

                    </ul>
                </div>
          
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        @include('dashboard.patients.result')
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @include('dashboard.patients.appointment')
                    </div>
                </div>
            </div>
      
        </div>
        
</div>

{{-- <input type="hidden" name="" value="{{$data->id}}" id="id"> --}}

@endsection

@section('js')
<script>
// load Data With Jquery //
let ResultTable = null
function setResultDatatable() {
    
    var url = `{{route('patients.get-result',$data->id)}}`;
    
    ResultTable = $("#result-table").DataTable({
        processing: true,
        serverSide: true,
        dom: 'Blfrtip',
        lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
        pageLength: 9,
        sorting: [0, "DESC"],
        ordering: false,
        ajax: url,
        
        language: {
            paginate: {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            },
        },
        columns: [
            {
                data: 'img'
            },
            {
                data: 'doctor_id'
            },
            {
                data: 'category_id'
            },
            {
                data: 'result'
            },
            {
                data: 'rate'
            }
        ],
    });
}
setResultDatatable();

let AppointmentTable = null
function setAppointmentDatatable()
{
    var url =  `{{route('patients.get-appointment',$data->id)}}`;
    AppointmentTable = $("#appointment-table").DataTable({
        processing:true,
        serverSide:true,
        dom:'Blfrtip',
        lengthMenu:[0,5,10,20,50,100,200,500],
        pageLength:9,
        sorting:[0,"DESC"],
        ordering:false,
        ajax:url,
        language:{
            paginate: {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            },
        },
        columns: [
            {
                data: 'register_date'
            },
            {
                data: 'time'
            },
            {
                data: 'category_id'
            },
            {
                data: 'currency'
            },
            {
                data: 'amount'
            },
            {
                data:'data_message'
            },
            {
                data:'payment_date'
            }
        ],
    })

}
setAppointmentDatatable();

</script>
@endsection