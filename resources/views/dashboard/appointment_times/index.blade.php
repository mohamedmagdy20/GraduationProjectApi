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
            <li class="breadcrumb-item active" aria-current="page">Appointment Times</li>
        </ol>
    </nav>
    <div class="row justify-content-around w-100 ">
        <div class="col-md-6">
            <h1 class="h4">Appointment Times</h1>
        </div>     

        <div class="col-md-6">
            <a href="{{route('appointment_times.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Appointment Time</a>
        </div>
    </div>
</div>


<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded" id="appointment-time-tables">
                <thead class="thead-light">
                    <tr>
                        
                        <th>Time From </th>
                        <th>Time To</th>
                        <th>actions</th>
                       
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

function setActivityDatatable() {
    var url = "{{ route('appointment_times.get-data') }}";
    
    AppointmentTable = $("#appointment-time-tables").DataTable({
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
                        data: 'time_from',
                    },
                    
                    {
                        data: 'time_to',
                    },

                    {
                        data: 'action',
                    },
                    

        ],

       
    });
}

setActivityDatatable();


function deleteAppointment(id)
{
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: "{{route('appointment_times.delete')}}",
        data: {_token: CSRF_TOKEN,id:id},
        dataType: 'JSON',
        success: function (results) {
            if (results.status === true) {
                AppointmentTable.ajax.reload()
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
function restoreAppointment(id)
{
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        url: "{{route('appointment_times.restore')}}",
        data: {_token: CSRF_TOKEN,id:id},
        dataType: 'JSON',
        success: function (results) {
            if (results.status === true) {
                AppointmentTable.ajax.reload()
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

