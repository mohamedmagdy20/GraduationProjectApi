@if($type == 'action')

@if ($data->deleted_at == null)
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" checked onchange="deleteAppointment({{$data->id}})" id="flexSwitchCheckDefault">
</div>
<a class="btn  btn-sm btn-info" href="{{route('appointements.data',$data->id)}}"><i class="fa fa-pen"></i></a>

@else
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" onchange="restoreAppointment({{$data->id}})"  id="flexSwitchCheckDefault">
</div>
<a onclick="deleteConfirmation({{$data->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

@endif
@endif