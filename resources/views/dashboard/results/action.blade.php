@switch($type)
    @case('img')
    <img style="width: 40px;border-radius: 8px" src="{{

        $data->img ? $data->img : asset('assets/image/team/profile-picture-2.jpg')
        
        }}"  onclick="viewImg(this)"  alt="{{$data->img}}">
        @break
        @case('file_url')
         <a href="{{$data->files_url}}" target="__blank"><i class="fa-solid fa-link"></i></a> 
        @break


        @case('notes')
         <a href="{{$data->notes}}" target="__blank"><i class="fa-solid fa-link"></i></a> 
        @break
    @default
        
@endswitch

