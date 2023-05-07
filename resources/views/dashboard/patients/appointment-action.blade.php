@switch($type)
    @case('data_message')
    @if ($data->invoice->data_message == 'Approve' && $data->invoice->status )

        <span class="btn btn-sm btn-success text-white">{{$data->invoice->data_message}}</span>
    @else
        <span class="btn btn-sm btn-danger text-white">{{$data->invoice->data_message}}</span>
    @endif
        @break

    @default
        
@endswitch