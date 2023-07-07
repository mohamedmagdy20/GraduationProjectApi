

@if ($type == 'actions')
    <a href="{{route('chat.start',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-comment"></i></a>
    <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

    @endif

