@switch($type)
    @case('data_message')
    @if ($data->invoice->data_message == 'Approve' && $data->invoice->status )
        <span class="badge super-badge bg-success text-white">{{$data->invoice->data_message}}</span>
    @else
        <span class="badge super-badge bg-success text-white">{{$data->invoice->data_message}}</span>
    @endif
        @break

    @default
        
@endswitch