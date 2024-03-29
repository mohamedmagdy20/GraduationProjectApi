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
            <li class="breadcrumb-item active" aria-current="page">@lang('lang.invoices')</li>
        </ol>
    </nav>
    <div class="row justify-content-around w-100 ">
        <div class="col-md-12">
            <h1 class="h4">@lang('lang.invoices')</h1>
        </div>     
    </div>

    <div class="row  w-100 ">

        <div class="col-md-4">
            <div class="form-group">
                <label for="">@lang('lang.patient')</label>
                <select name="" class=" form-control select" id="patient_id">
                    @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">@lang('lang.payment_method')</label>
                <select name="" class=" form-control select" id="method">
                    @foreach ($methods as $d)
                        <option value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">@lang('lang.from')</label>
                <input type="number" class="form-control" name="from" id="from">
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="">@lang('lang.to')</label>
                <input type="number" class="form-control" name="to" id="to">
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="">@lang('lang.date')</label>
                <input type="text" name="dates" id="dates" class="form-control">
            </div>
        </div>

        <div class="col-md-2" style="margin-top: 31px">
            <div class="form-group">
                <button onclick="handleFilter()" class="btn btn-primary" >@lang('lang.search') <i class="fa-solid fa-magnifying-glass"></i></button>
                <button onclick="ClearFilter()" class="btn btn-light" >@lang('lang.clear')</button>
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
                        <th class="border-0 rounded-start">@lang('lang.code')</th>
                        <th class="border-0 ">@lang('lang.amount')</th>
                        <th class="border-0 ">@lang('lang.currency')</th>
                        <th class="border-0 ">@lang('lang.status')</th>
                        <th class="border-0">@lang('lang.date')</th>
                        <th class="border-0">@lang('lang.message')</th>        
                        <th class="border-0">@lang('lang.payment_method')</th>            
                        <th>@lang('lang.patient') @lang('lang.name')</th>   
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>

                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                        <th></th>

                    </tr>
                </tfoot>
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
    var url = "{{ route('invoices.get-data') }}";
    
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

        
        columns: [
            {
                data: 'code'
            },
            {
                data: 'amount'
            },
            {
                data: 'currency'
            },
            {
                data: 'status'
            },
            {
                data: 'date'
            },
            {
                data: 'data_message'
            },
            {
                data:'method'
            },
            {
                data:'name'
            }
        ],

        footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                        console.log(api);
                    // converting to interger to find total
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                
                    // computing column Total of the complete result 
                    var totalcost = api
                        .column(1).data().reduce( function (a, b) {
                                 return intVal(a) + intVal(b);
                                        }, 1 );

                        // Update footer by showing the total with the reference of the column index 
                        $( api.column( 0 ).footer() ).html( "Total: "+totalcost/100 + " EGP");
                      
        },
    });
}

setPatientDatatable();


function handleFilter()
{
    patient = $('#patient_id').val() || '';
    dates = $('#dates').val() || '';
    from = $("#from").val() || '';
    to = $("#to").val() || '';
    method = $("#method").val()||'';

    if (PatientTable) {
        var url = "{{ route('invoices.get-data') }}"+`?patient_id=${patient}&from=${from}&to=${to}&dates=${dates}&method=${method}`;
        console.log(url);
        PatientTable.ajax.url(url).load()
    }
}

function ClearFilter()
{
    $('#patient_id').val('');
    $('#dates').val('');
    $("#from").val('');
    $("#to").val('')   
    $("#method").val('');

    var url = "{{ route('invoices.get-data') }}";
    PatientTable.ajax.url(url).load()
}
</script>
@endsection

