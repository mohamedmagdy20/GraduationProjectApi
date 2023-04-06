@switch($type)
    @case('action')
        <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}"  onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button>
    @break
    @case('image')
        <img style="width: 40px;border-radius: 8px" src="{{ $data->img ? asset('files/category/'.$data->img) : asset('assets/image/team/profile-picture-2.jpg') }}" alt="{{$data->image}}">
    @break

    @default
        
@endswitch