@extends('dashboard')

@section('content')

<div class="card card-body border-0 shadow mb-4">
        <div class="row align-item-center">
            <div class="col-12">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4"></h2>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <!-- Avatar -->
                            <img class="rounded avatar-xl image-viewer" src="{{$data->img ? $data->img : asset('assets/image/team/profile-picture-1.jpg')}}" data-viewer="{{auth()->user()->img}}" alt="change avatar">
                        </div>
                                                               
                    </div>
                </div>
            </div>
            <h2 class="h5 mb-4">Personal Information</h2>

            <div class="col-md-12 card card-body border-0 shadow mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3 align-items-center">
                        <div>
                            {{-- <label for="name">Name</label>
                            <input class="form-control" id="name"  name="name" type="text" value="{{auth()->user()->name}}" required> --}}
                            <div>
                                <span>Name : </span>{{$data->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>Email : </span>{{$data->email}}
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>Phone : </span>{{$data->phone}}
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>Gender : </span>{{$data->gender}}
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <span>Date Of Birth : </span>{{$data->date_of_birth}}
                        </div>
                    </div>
                </div>
              
            </div>

            <h2 class="h5 mb-4">Results</h2>
            <div class="col-md-12 card-body border-0 shadow mb-4">
                
            </div>
      
        </div>
        
</div>

@endsection

@section('js')
@endsection