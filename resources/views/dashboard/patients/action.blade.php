    @if ($type == 'action')
    <div class="d-flex">
            @if ($data->deleted_at == null)
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" checked onchange="deletePatient({{$data->id}})" id="flexSwitchCheckDefault">
            </div>
        @else
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" onchange="restorePatient({{$data->id}})"  id="flexSwitchCheckDefault">
            </div>
            <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
        @endif
        
        <a class="btn btn-sm btn-warning text-white " href="{{route('patients.show',$data->id)}}"><i class="fa fa-eye"></i></a>
        
    </div>
   
    {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $data->id }}"  onclick="deleteConfirmation({{$data->id}})"><i class="fa fa-trash"></i></button> --}}



    @elseif ($type == 'img')
    <img style="width: 40px;border-radius: 8px" src="{{

     $data->img ? $data->img : asset('assets/image/team/profile-picture-2.jpg')
     
     }}" class="image-viewer" alt="{{$data->img}}">

@endif


<script>
    $(document).ready(function() {
         const imageElements = document.querySelectorAll('.image-viewer');
         imageElements.forEach((element) => {
             new Viewer(element);
             $('.image-viewer').ezPlus({
                 zoomType: 'inner',
                 cursor: 'crosshair'
             });
         });
     
     })
    </script>