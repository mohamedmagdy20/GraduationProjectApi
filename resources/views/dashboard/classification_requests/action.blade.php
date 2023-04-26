@if ($type == 'action')
    <a href="{{route('classification-request.create',$data->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-filter"></i></a>
@endif