
{{-- @switch($type)
    @case('action')
        <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}"  onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
        <a href="{{route('category.edit',$data->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
        @break
    @case('img_name')
        <img style="width: 40px;border-radius: 8px" src="{{ $data->img ? asset('files/category/'.$data->img_name) : asset('assets/image/team/profile-picture-2.jpg') }}" alt="{{$data->image}}">
    @break

    @default
        
@endswitch --}}

@if ($type == 'action')
    <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}"  onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
    <a href="{{route('category.edit',$data->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
@elseif ($type == 'img_name')
    <img style="width: 40px;border-radius: 8px" src="{{
     
     $data->img ? asset('files/category/'.$data->img_name) : asset('assets/image/team/profile-picture-2.jpg')
     
     }}" alt="{{$data->image}}">

@endif


{{-- ternary operator --}}
