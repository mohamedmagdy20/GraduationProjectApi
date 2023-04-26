@switch($type)
    @case('action')
        @if ($data->deleted_at == null)
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" checked onchange="deleteAdmin({{$data->id}})" id="flexSwitchCheckDefault">
        </div>
        @else
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" onchange="restoreAdmin({{$data->id}})"  id="flexSwitchCheckDefault">
        </div>
        @endif
    @break
    @case('image')
        <img style="width: 40px;border-radius: 8px" src="{{ $data->img ? asset('files/admin/'.$data->img) : asset('assets/image/team/profile-picture-2.jpg') }}"  onclick="viewImg(this)" alt="{{$data->image}}">
    @break

    @default
        
@endswitch

