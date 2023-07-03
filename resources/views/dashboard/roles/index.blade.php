@extends('dashboard')

@section('content')


<div class="card border-0 shadow mb-4 mt-5 p-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            {{-- <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
    </nav>
    <div class="row justify-content-around w-100 ">
        <div class="col-md-12">
            <h1 class="h4">Roles</h1>
        </div>     
    </div>
</div>


<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded" id="admin-table">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        <th class="border-0">@lang('lang.name')</th>
                        <th class="border-0">@lang('lang.note')</th>
                        <th class="border-0">@lang('lang.actions')</th>                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index=> $role )
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <a href="{{route('permissions.edit',$role->id)}}" class="btn btn-warning"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('role.edit',$role->id)}}" class="btn btn-primary"> <i class="fa fa-pen"></i></a>
                            </td>


                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    
</div>


@endsection