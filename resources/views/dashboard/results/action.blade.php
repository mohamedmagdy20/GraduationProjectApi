@switch($type)
    @case('img')
    <img style="width: 40px;border-radius: 8px" src="{{

        $data->img ? $data->img : asset('assets/image/team/profile-picture-2.jpg')
        
        }}" alt="{{$data->img}}">
        @break

    @default
        
@endswitch