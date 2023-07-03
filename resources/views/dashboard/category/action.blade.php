
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
    @if ($data->deleted_at == null)
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" checked onchange="deleteCategory({{$data->id}})" id="flexSwitchCheckDefault">
    </div>
    <a href="{{route('category.edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>

    @else
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" onchange="restoreCategory({{$data->id}})"  id="flexSwitchCheckDefault">
    </div>
    <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

    @endif
@elseif ($type == 'img_name')
    <img style="width: 40px;border-radius: 8px" src="{{
     
     $data->img ? asset('files/category/'.$data->img_name) : asset('assets/image/team/profile-picture-2.jpg')
     
     }}"  onclick="viewImg(this)" alt="{{$data->image}}">
@endif

