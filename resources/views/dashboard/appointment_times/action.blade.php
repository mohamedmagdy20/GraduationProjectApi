
@if ($type == 'action')
    @if ($data->deleted_at == null)
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" checked onchange="deleteAppointment({{$data->id}})" id="flexSwitchCheckDefault">
    </div>
    @else
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" onchange="restoreAppointment({{$data->id}})"  id="flexSwitchCheckDefault">
    </div>
    @endif
    <a href="{{route('appointment_times.edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>

@endif

