<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center">
                <button id="sidebar-toggle"
                    class="sidebar-toggle me-3 btn btn-icon-only d-none d-lg-inline-block align-items-center justify-content-center">
                    <svg class="toggle-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg></button>
                {{-- <form class="navbar-search form-inline" id="navbar-search-main">
                    <div class="input-group input-group-merge search-bar"><span class="input-group-text"
                            id="topbar-addon"><svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><input type="text" class="form-control" id="topbarInputIconLeft"
                            placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                    </div>
                </form> --}}
            </div>
            <ul class="navbar-nav align-items-center">

                <li class="nav-item dropdown"><a class="nav-link text-dark  dropdown-toggle"
                    data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                    data-bs-display="static" aria-expanded="false">
                    <i class="fa-solid fa-language" style="font-size:20px; color:#333"></i>

                 </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                        <a
                        class="dropdown-item d-flex align-items-center" href="{{route('change-language','ar')}}">
                          @lang('lang.arabic')</a>

                        <a class="dropdown-item d-flex align-items-center" href="{{route('change-language','en')}}">
                            @lang('lang.english') </a>      
                      
                      
                    
                </div>
            </li>
                <li class="nav-item dropdown"><a class="nav-link text-dark notification-bell unread dropdown-toggle"
                        data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">
                        <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                            </path>
                        </svg></a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                                @foreach ($appointmets as $data )
                                <a href="{{route('classification-request.index')}}"
                                class="list-group-item list-group-item-action border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img alt="Image placeholder" src="{{$data->patient->img ? $data->patient->img : asset('assets/image/profile-cover.jpg')}}" class="avatar-md rounded">
                                    </div>
                                    <div class="col ps-0 ms-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="h6 mb-0 text-small">{{$data->patient->name}}</h4>
                                            </div>
                                            <div class="text-end"><small class="text-danger">{{$data->created_at->format('Y M D')}}</small>
                                            </div>
                                        </div>
                                        <p class="font-small mt-1 mb-0">{{$data->patient->name}} Has Make New Appointment </p>
                                    </div>
                                </div>
                            </a>
                          
                                @endforeach
                         </div>
                    </div>
                </li>
                <li class="nav-item dropdown ms-lg-3"><a class="nav-link dropdown-toggle pt-1 px-0" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="media d-flex align-items-center"><img class="avatar rounded-circle"
                                alt="Image placeholder"
                                src="{{ auth()->user()->img ? asset('files/admin/'.auth()->user()->img) : asset('assets/image/team/profile-picture-2.jpg') }}"
                                alt="{{auth()->user()->name}}">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block"><span
                                    class="mb-0 font-small fw-bold text-gray-900">{{auth()->user()->name}}</span></div>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1"><a
                            class="dropdown-item d-flex align-items-center" href="{{route('admin.profile')}}"><svg
                                class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd"></path>
                            </svg> My Profile </a>
                            @if (auth()->user()->hasPermission('show_settings'))
                            <a class="dropdown-item d-flex align-items-center" href="{{route('settings.index')}}"><svg
                                class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg> Settings </a>      
                            @endif
                          
                          
                        <div role="separator" class="dropdown-divider my-1"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('admin.logout')}}"><svg
                                class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg> Logout</a>
                    </div>
                </li>

                
            
                
            </ul>
        </div>
    </div>
</nav>


<div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
    <div class="card-body bg-gray-800 text-white pt-4">
        {{-- <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
            href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button> --}}
        {{-- <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
            <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
                data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
                data-size="large" data-show-count="true"
                aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
        </div> --}}
        {{-- <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank"
            class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
            Download
            <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                    clip-rule="evenodd"></path>
            </svg>
        </a> --}}
        {{-- <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p> --}}
        {{-- <div class="d-flex justify-content-center">
            <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                target="_blank">
                <img src="{{asset('assets/image/technologies/bootstrap-5-logo.svg')}}" class="image image-xs">
            </a>
            <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
                <img src="{{asset('assets/image/technologies/react-logo.svg')}}" class="image image-xs">
            </a>
        </div> --}}
    </div>


</div>