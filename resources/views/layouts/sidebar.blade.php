
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
        <div class="d-flex align-items-center">
          <div class="avatar-lg me-4">
            <img src="{{asset('files/admin/'.auth()->user()->img)}}" class="card-img-top rounded-circle border-white"
              alt="Bonnie Green">
          </div>
          <div class="d-block">
            <h2 class="h5 mb-3">Hi, {{auth()->user()->name}}</h2>
            <a href="{{route('logout')}}" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
              <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
          @lang('lang.logout')
            </a>
          </div>
        </div>
        <div class="collapse-close d-md-none">
          <a href="#sidebarMenu" data-bs-toggle="collapse"
              data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
              aria-label="Toggle navigation">
              <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
      </div>
      <ul class="nav flex-column pt-3 pt-md-0">

        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <img src="{{asset('assets/image/favicon/brain-logo.png')}}" height="20" width="20" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">@lang('lang.dashboard')</span>
          </a>
        </li>
        @if (auth()->user()->hasPermission('show_admins'))
        <li class="nav-item">
          <span
            class="nav-link  collapsed  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#submenu-components">
            <span>
              <span class="sidebar-icon">
                <i class="fa fa-user"></i>
              </span>
              <span class="sidebar-text">@lang('lang.admins')</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </span>
          </span>
          <div class="multi-level collapse " role="list"
            id="submenu-components" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item">
                <a class="nav-link"
                  href="{{route('admin.index')}}">
                  <span class="sidebar-text">@lang('lang.show') @lang('lang.admins')</span>
                </a>
              </li>
              @if (auth()->user()->hasPermission('add_admins'))
                
              <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.create')}}">
                  <span class="sidebar-text">@lang('lang.add') @lang('lang.admins')</span>
                </a>
              </li>
              @endif

              @if (auth()->user()->hasPermission('show_permissions'))
              <li class="nav-item ">
                <a class="nav-link" href="{{route('roles.index')}}">
                  <span class="sidebar-text">@lang('lang.roles')</span>
                </a>
              </li>
              @endif

            </ul>
          </div>
        </li>  
        @endif
        

        @if (auth()->user()->hasPermission('show_categories'))
        <li class="nav-item">
          <span
            class="nav-link  collapsed  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#submenu-category">
            <span>
              <span class="sidebar-icon">
                <i class="fa fa-file"></i>
              </span>
              <span class="sidebar-text">@lang('lang.category')</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </span>
          </span>
          <div class="multi-level collapse " role="list"
            id="submenu-category" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item">
                <a class="nav-link"
                  href="{{route('category.index')}}">
                  <span class="sidebar-text">@lang('lang.show') @lang('lang.category')</span>
                </a>
              </li>
              @if (auth()->user()->hasPermission('add_categories'))
              <li class="nav-item ">
                <a class="nav-link" href="{{route('category.create')}}">
                  <span class="sidebar-text">@lang('lang.add') @lang('lang.category')</span>
                </a>
              </li>      
              @endif
          

            </ul>
          </div>
        </li>  
        @endif
        

        {{-- Start But THE Buttons There --}}



        @if (auth()->user()->hasPermission('show_doctors'))
        <li class="nav-item">
          <span
            class="nav-link  collapsed  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse" data-bs-target="#submenu-doctors">
            <span>
              <span class="sidebar-icon">

                <i class="fa fa-user-doctor"></i>

              </span>
              <span class="sidebar-text">@lang('lang.doctors')</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </span>
          </span>
          <div class="multi-level collapse " role="list"
            id="submenu-doctors" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item">
                <a class="nav-link"
                  href="{{route('doctors.index')}}">
                  <span class="sidebar-text">@lang('lang.show') @lang('lang.doctors')</span>
                </a>
              </li>
              @if (auth()->user()->hasPermission('add_doctors'))
              <li class="nav-item">
                <a class="nav-link"
                  href="{{route('doctors.create')}}">
                  <span class="sidebar-text">@lang('lang.add') @lang('lang.doctors')</span>
                </a>
              </li>    
              @endif
            


            </ul>
          </div>
        </li>  
        @endif
        


        @if (auth()->user()->hasPermission('show_patients'))

        <li class="nav-item">
          <a href="{{route('patients.index')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <i class="fa fa-users"></i>
            </span>
            <span class="mt-1 ms-1 sidebar-text">@lang('lang.patient')</span>
          </a>
        </li>
        @endif





        @if (auth()->user()->hasPermission('show_appointments'))
        <li class="nav-item">
          <a href="{{route('appointments.index')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <i class="fa fa-calendar-check"></i>
            </span>
            <span class="mt-1 ms-1 sidebar-text">@lang('lang.appointment')</span>
            <span class="mt-1 ms-1 sidebar-text">
              <div class="notification" id="notification-count">{{$acount}}</div>

            </span>
          </a>
        </li>   
        @endif
       

        {{-- Classificatieon Request --}}
        @if (auth()->user()->hasPermission('show_classifiation_request'))
        
        <li class="nav-item">
          <a href="{{route('classification-request.index')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <i class="fa fa-code-pull-request"></i>
            </span>
            <span class="mt-1 ms-1 sidebar-text">@lang('lang.request')</span>
            <span class="mt-1 ms-1 sidebar-icon">
              <div class="notification" id="notification-count">{{$now}}</div>
          
            </span>
          
          </a>
        </li>
        @endif


        {{-- Results --}}
        @if (auth()->user()->hasPermission('show_result'))

        <li class="nav-item">
          <a href="{{route('results.index')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <i class="fa fa-square-poll-vertical"></i>
            </span>
            <span class="mt-1 ms-1 sidebar-text">@lang('lang.results')</span>
          </a>
        </li>
        @endif
           {{-- Invoices --}}
          @if (auth()->user()->hasPermission('show_invoices'))

           <li class="nav-item">
            <a href="{{route('invoices.index')}}" class="nav-link d-flex align-items-center">
              <span class="sidebar-icon">
                <i class="fa-solid fa-file-invoice"></i>
              </span>
              <span class="mt-1 ms-1 sidebar-text">@lang('lang.invoices')</span>
            </a>
          </li>
          @endif



          @if (auth()->user()->hasPermission('show_notifications'))
          <li class="nav-item">
           <a href="{{route('chat.index')}}" class="nav-link d-flex align-items-center">
             <span class="sidebar-icon">
               <i class="fa fa-comment"></i>
             </span>
             <span class="mt-1 ms-1 sidebar-text">@lang('lang.chat')</span>
             <span class="mt-1 ms-1 sidebar-icon">
              <div class="notification" id="chat-count">{{$chatCount}}</div>
          
            </span>
           </a>
         </li>
          @endif

           {{-- Invoices --}}
           @if (auth()->user()->hasPermission('show_notifications'))
           <li class="nav-item">
            <a href="{{route('notifications.index')}}" class="nav-link d-flex align-items-center">
              <span class="sidebar-icon">
                <i class="fa fa-bell"></i>
              </span>
              <span class="mt-1 ms-1 sidebar-text">@lang('lang.notification')</span>
            </a>
          </li>
           @endif


         

           @if (auth()->user()->hasPermission('show_security'))
           <li class="nav-item">
            <span
              class="nav-link  collapsed  d-flex justify-content-between align-items-center"
              data-bs-toggle="collapse" data-bs-target="#submenu-settings">
              <span>
                <span class="sidebar-icon">
  
                  <i class="fa-solid fa-shield-halved"></i>
  
                </span>
                <span class="sidebar-text">@lang('lang.security')</span>
              </span>
              <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              </span>
            </span>
            <div class="multi-level collapse " role="list"
              id="submenu-settings" aria-expanded="false">
              <ul class="flex-column nav">
                <li class="nav-item">
                  <a class="nav-link"
                    href="{{route('activity.index')}}">
                    <span class="sidebar-text">@lang('lang.activity')</span>
                  </a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link"
                    href="{{route('loginHisory.index')}}">
                    <span class="sidebar-text">@lang('lang.login_history')</span>
                  </a>
                </li>
  
  
         
  
              </ul>
            </div>
          </li>
  
             
           @endif
     
        
           {{-- Appointment Times --}}
           @if (auth()->user()->hasPermission('show_payment_method'))
           <li class="nav-item">
            <a href="{{route('payment_methods.index')}}" class="nav-link d-flex align-items-center">
              <span class="sidebar-icon">
                <i class="fa-solid fa-dollar-sign"></i>
              </span>
              <span class="mt-1 ms-1 sidebar-text">@lang('lang.payment_method')</span>
            </a>
          </li>      
           @endif
       

           {{-- Appointment Times --}}
           @if (auth()->user()->hasPermission('show_appointment_time'))
           
           <li class="nav-item">
            <a href="{{route('appointment_times.index')}}" class="nav-link d-flex align-items-center">
              <span class="sidebar-icon">
                <i class="fa-solid fa-calendar-days"></i>
              </span>
              <span class="mt-1 ms-1 sidebar-text">@lang('lang.appointment_time')</span>
            </a>
          </li>
           @endif

           @if (auth()->user()->hasPermission('show_appointment_time'))

          <li class="nav-item">
            <a href="{{route('tips.index')}}" class="nav-link d-flex align-items-center">
              <span class="sidebar-icon">
                <i class="fa-solid fa-calendar-days"></i>
              </span>
              <span class="mt-1 ms-1 sidebar-text">@lang('lang.tips')</span>
            </a>
          </li>
          @endif

        {{-- end of side bar --}}

        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>






      </ul>
    </div>
  </nav>
