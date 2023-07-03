@switch($type)
    @case('action')
        @if ($data->deleted_at == null)
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" checked onchange="deleteDoctor({{$data->id}})" id="flexSwitchCheckDefault">
        </div>
        <a href="{{route('doctors.edit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></a>

        @else
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" onchange="restoreDoctor({{$data->id}})"  id="flexSwitchCheckDefault">
        </div>
        <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

        @endif
        @break
    @case('image')
            {{-- F:\GraduationProject\GraduationProject\public\files\doctor\167880566811.png --}}
            {{-- "mohamed"+"magdy" --}}
        <img style="width: 40px;border-radius: 8px" onclick="viewImg(this)" src="{{ $data->image ? $data->image : asset('assets/image/team/profile-picture-2.jpg') }}" class="image-viewer" alt="{{$data->name}}">
    @break

    @default
        
@endswitch

{{-- <script>

    $(document).ready(function() {
         const imageElements = document.querySelectorAll('.image-viewer');
         console.log(imageElements);
         imageElements.forEach((element) => {
             new Viewer(element);
             $('.image-viewer').ezPlus({
                 zoomType: 'inner',
                 cursor: 'crosshair'
             });
         });
     
     })
        
    </script> --}}