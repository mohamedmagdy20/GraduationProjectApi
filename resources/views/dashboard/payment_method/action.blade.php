@switch($type)
    @case('actions')
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" onchange="CheckActive({{$data->id}})" {{$data->deleted_at == null ? 'checked' : '' }}  id="flexSwitchCheckDefault">
    </div>
        @break

    @default
        
@endswitch