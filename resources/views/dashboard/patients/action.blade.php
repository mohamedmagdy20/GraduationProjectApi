@if ($type == 'action')
    @if ($data->deleted_at == null)
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" checked onchange="deletePatient({{$data->id}})" id="flexSwitchCheckDefault">
        </div>
    @else
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" onchange="restorePatient({{$data->id}})"  id="flexSwitchCheckDefault">
        </div>
    @endif

    {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}"  onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button> --}}



    @elseif ($type == 'img')
    <img style="width: 40px;border-radius: 8px" src="{{

     $data->img ? $data->img : asset('assets/image/team/profile-picture-2.jpg')
     
     }}" alt="{{$data->img}}">

@endif
