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
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
        </ol>
    </nav>
    <div class="row justify-content-around w-100 ">
        <div class="col-md-12">
            <h1 class="h4">Notifications</h1>
        </div>     
    </div>
    <div class="row  w-100 ">


        <div class="col-md-4">
            <div class="form-group">
                <label for="">Type</label>
                <select name="" class=" form-control select" id="is_readed">
                   <option value="1">Seen</option>
                   <option value="0">Not Seen</option>
                   
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
            <table class="table table-centered table-nowrap mb-0 rounded" id="patient-table">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Doctor Name</th>
                        <th class="border-0 ">message</th>
                        <th class="border-0 ">date Send</th>
                        <th class="border-0">Status</th>
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
let PatientTable = null

function setPatientDatatable() {
    var url = "{{ route('notifications.get-data') }}";
    
    PatientTable = $("#patient-table").DataTable({
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

        
        columns: [{
                data: 'doctor_id'
            },
            {
                data: 'message'
            },
            {
                data: 'created_at'
            },
            {
                data: 'is_readed'
            },
        ],

    
    });
}

setPatientDatatable();


function handleFilter()
{
    isseen = $('#is_readed').val() || '';

    if (PatientTable) {
        var url = "{{ route('notifications.get-data') }}" + `?is_readed=${isseen}`;
        PatientTable.ajax.url(url).load()
    }
}

function ClearFilter()
{
    $('#is_readed').val('') || '';

    var url = "{{ route('notifications.get-data') }}";
    PatientTable.ajax.url(url).load()

}





</script>
@endsection

