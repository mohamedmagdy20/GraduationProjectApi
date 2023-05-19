@switch($type)
    @case('is_readed')
    @if ($data->is_readed == true)
        <p class="bg-success rounded-2 text-center text-white p-2">Seen</p>
    @else
        <p class="bg-danger rounded-2 text-center text-white p-2">Not Seen</p>
    @endif
        @break
    @default
        
@endswitch

