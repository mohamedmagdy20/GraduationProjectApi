@extends('dashboard')

@section('content')

<div class="card border-0 shadow mb-4 mt-5 p-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            {{-- <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
        </ol>
    </nav>
    <h1 class="h4">Appointments</h1>
    <div class="row  w-100 ">

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Patient</label>
                <select name="" class="selectize" id="patient_id">
                    @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Category</label>
                <select name="" class=" form-control select" id="category_id">
                    @foreach ($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Date</label>
                <input type="text" name="dates" id="dates" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Time</label>
                <select name="" class=" form-control select" id="time_id">
                    @foreach ($times as $time)
                        <option value="{{$time->id}}">{{$time->time_from}} {{$time->time_to}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2" style="margin-top: 31px">
            <div class="form-group">
                <button onclick="handleFilter()" class="btn btn-primary" >Search <i class="fa-solid fa-magnifying-glass"></i></button>
                <button onclick="ClearFilter()" class="btn btn-light" >Clear</button>
            </div>    
        </div> 
    </div>
</div>


<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded" id="appointment-table">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Code</th>
                        <th class="border-0 ">Name</th>
                        <th class="border-0">Date</th>
                        <th class="border-0">Category</th>
                        <th class="border-0">Time</th>
                        <th class="border-0">Amount</th>
                        <th class="border-0">actions</th>                       
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection

@section('js')
<script>

// load Data With Jquery //
let AppointmentTable = null

function setAppointment() {
    var url = "{{ route('appointements.data') }}";
    
    AppointmentTable = $("#appointment-table").DataTable({
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
                data:'code'
            },
            {
                data:'patient_id'
            },
            {
                data: 'register_date'
            },
           
            {
                data: 'category_id'
            },
            {
                data: 'time'
            },
            {
                data: 'invoice_id'
            },
            {
                data: 'actions'
            }
        ],
    });
}

setAppointment();


function handleFilter()
{
    patient = $('#patient_id').val() || '';
    category = $('#category_id').val() || '';
    dates = $('#dates').val() || '';
    times = $('#time_id').val() || '';

    if (AppointmentTable) {
        var url = "{{ route('appointements.data') }}" + `?patient_id=${patient}&category_id=${category}&dates=${dates}&time_id=${times}`;
        console.log(url);
        AppointmentTable.ajax.url(url).load()
    }
}

function ClearFilter()
{
    $('#patient_id').val('');
    $('#category_id').val('');
    $('#dates').val('');
    $('#time_id').val('');
    var url = "{{ route('appointements.data') }}";
    AppointmentTable.ajax.url(url).load()

}



function deleteAppointment(id)
{
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: "{{route('appointements.delete')}}",
        data: {_token: CSRF_TOKEN,id:id},
        dataType: 'JSON',
        success: function (results) {
            console.log(results);
            if (results.status === true) {
                notyf.open({
                    type: 'success',
                    message: 'Data Deleted'
                });
            } else {
                notyf.open({
                    type: 'error',
                    message: "Error Accure"
                });
            }
            AppointmentTable.ajax.reload()

        },
        error:function(result){
            notyf.open({
                    type: 'error',
                    message: "Error Accure"
                });
                AppointmentTable.ajax.reload()
            
        }
    });

}
function restoreAppointment(id)
{
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: "{{route('appointements.delete')}}",
        data: {_token: CSRF_TOKEN,id:id},
        dataType: 'JSON',
        success: function (results) {
            console.log(results);

            if (results.status === true) {
                notyf.open({
                    type: 'success',
                    message: "Data Restored"
                });
            } else {
                notyf.open({
                    type: 'error',
                    message: "Error Accure"
                });
            }
            AppointmentTable.ajax.reload()

        },
        error:function(result){
            notyf.open({
                    type: 'error',
                    message: "Error Accure"
                });
                AppointmentTable.ajax.reload()

        }
    });
}

</script>
@endsection