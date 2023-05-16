@if($type == 'action')
<a class="btn  btn-sm btn-info" href="{{route('appointements.data',$data->id)}}"><i class="fa fa-pen"></i></a>

@if ($data->deleted_at == null)
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" checked onchange="deleteAppointment({{$data->id}})" id="flexSwitchCheckDefault">
</div>
@else
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" onchange="restoreAppointment({{$data->id}})"  id="flexSwitchCheckDefault">
</div>
@endif
@endif