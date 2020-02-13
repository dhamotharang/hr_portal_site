<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar header scrolled">
        <div class="sticky-top">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark fixed-top bg-primary navbar-toggleable-sm py-3" data-toggle="affix">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <a class="navbar-brand d-block d-md-none" href="index.html">

                </a>
                @if(!(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr'))

                <div style="margin-left: 580px" class="d-none d-md-block text-center">
                    <a style="text-align: center" class="sidebartoggler waves-effect waves-light d-flex align-items-center side-start" href="{{url("home")}}" data-sidebartype="mini-sidebar">
                        <span style="font-family:Arial" class="navigation-text ml-3">HR PORTAL</span>
                    </a>
                </div>
                @else
                <div class="d-none d-md-block text-center">
                    <a style="text-align: center" class="sidebartoggler waves-effect waves-light d-flex align-items-center side-start" href="{{url("home")}}" data-sidebartype="mini-sidebar">
                <span style="font-family:Arial" class="navigation-text ml-3">HR PORTAL</span>                    </a>
                </div>
                @endif
                
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            
            <!-- ============================================================== -->

            <div style="margin-left: 100px" class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- toggle and nav items -->
                @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')

                <ul class="navbar-nav float-left mr-auto">
                    <!-- EMPLOYEES -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="index.html" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 16px;">Employees </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="message-center message-body">

                                        <!-- new-->
                                        <a href="{{ url('/register') }}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-user-plus mr-2 ml-1"></i>Add New Employee</h5>
                                        </a>
                                        <!-- all -->
                                        <a href="{{ url('upload') }}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-plus-circle mr-2 ml-1"></i>Add All</h5>
                                        </a>
                                        <!-- search -->
                                        <a href="{{ url('employees') }}" class="message-item">

                                          <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-search mr-2 ml-1"></i>Search Employee</h5>
                                       </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link text-dark" href=href="{{ url('employees') }}"> <b>See all Employees</b> <i class="fas fa-arrow-alt-circle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->

                    <!-- EMPLOYEE BALANCE -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="index.html" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 16px;">Employees Balance</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="message-center message-body">

                                        <!-- new-->
                                        <a href="{{url("employees_balance/search_balance")}}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-calculator mr-2 ml-1"></i>Add New Employee Balance</h5>
                                        </a>
                                        <!-- all -->
                                        <a href="{{url("upload_balance")}}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-plus-circle mr-2 ml-1"></i>Add To All</h5>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- EMPLOYEES notification -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="index.html" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 16px;">Employee Notifications</span> <i class="font-18 mdi mdi-gmail"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="message-center message-body">

                                        <!-- new-->
                                        <a href="{{url("employees_notify/search_notification")}}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-bell mr-2 ml-1"></i>Add Employee Notification</h5>
                                        </a>
                                        <!-- new to Group-->
                                        <a href="{{url("employees_notify/group_notification")}}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-users mr-2 ml-1"></i>Add Group Notification</h5>
                                        </a>
                                        <!-- all -->
                                        <a href="{{url("upload_note")}}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-plus-circle mr-2 ml-1"></i>Add To All</h5>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
 
                    <!-- EMPLOYEES general notification -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="index.html" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 16px;">Employee General Notifications</span> <i class="fas fa-bell mr-2 ml-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="message-center message-body">

                                        <!-- new-->
                                        <a href="{{url("generaklNotifications")}}" class="message-item">

                                            <h5 style="font-family: Arial; font-size: 16px" class="message-title"><i class="fas fa-bell mr-2 ml-1"></i>Add General Notification</h5>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                </ul>
                @endif

                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    {{-- <li class="nav-item search-box">
                        <form class="app-search d-none d-lg-block">
                            <input type="text" class="form-control" placeholder="Search...">
                            <a href="index.html" class="active"><i class="fa fa-search"></i></a>
                        </form>
                    </li> --}}
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    @if(!(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr'))
                    <ul style="margin-left: 60%" class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded-circle" width="100" height="60">
                        <span class="ml-2 user-text font-medium">{{Auth::user()->name}}</span><span class="fas fa-angle-down ml-2 user-text"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                <div class=""><img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded" width="80"></div>
                                <div class="ml-2">
                                    <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                    <p class=" mb-0 text-muted">{{Auth::user()->email}}</p>
                                    <a href="{{url('profile')}}" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                                </div>
                            </div>

                            <a class="dropdown-item" href="{{url("profile")}}"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                            <a class="dropdown-item" href="{{url('employees_balance/' . Auth::user()->id) }}"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                            <a class="dropdown-item" href="{{url('employees_notify/' . Auth::user()->id) }}"><i class="fas fa-bell mr-2 ml-1"></i> My Notification</a>

                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            @guest
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-power-off mr-1 ml-1"></i> Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">  
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')
                                   <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                       <i class="fa fa-power-off mr-1 ml-1"></i>
                                          {{ __('Logout') }}
                                      </a>
                       
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                              @else                     
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off mr-1 ml-1"></i>
                                        {{ __('Logout') }}
                                    </a>
                     
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               @endif
                          @endguest
                        </div>
                    </li>
                    </ul>
                    @else
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded-circle" width="100" height="60">
                            <span class="ml-2 user-text font-medium">{{Auth::user()->name}}</span><span class="fas fa-angle-down ml-2 user-text"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                        <p class=" mb-0 text-muted">{{Auth::user()->email}}</p>
                                        <a href="{{url("profile")}}" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                                    </div>
                                </div>
    
                                <a class="dropdown-item" href="{{url("profile")}}"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                <a class="dropdown-item" href="{{url('employees_balance/' . Auth::user()->id) }}"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                                <a class="dropdown-item" href="{{url('employees_notify/' . Auth::user()->id) }}"><i class="fas fa-bell mr-2 ml-1"></i> My Notifications</a>

                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                @guest
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-power-off mr-1 ml-1"></i> Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">  
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                           <i class="fa fa-power-off mr-1 ml-1"></i>
                                              {{ __('Logout') }}
                                          </a>
                           
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                  @else                     
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                         <i class="fa fa-power-off mr-1 ml-1"></i>
                                            {{ __('Logout') }}
                                        </a>
                         
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                   @endif
                              @endguest
                            </div>
                        </li>
                        </ul>
                    @endif
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->

                
               
            </div>
        </nav>
    </div>
    </header>

    <script>
        $(document).ready(function() {

var toggleAffix = function(affixElement, scrollElement, wrapper) {

  var height = affixElement.outerHeight(),
      top = wrapper.offset().top;
  
  if (scrollElement.scrollTop() >= top){
      wrapper.height(height);
      affixElement.addClass("affix");
  }
  else {
      affixElement.removeClass("affix");
      wrapper.height('auto');
  }
    
};

$('[data-toggle="affix"]').each(function() {
  var ele = $(this),
      wrapper = $('<div></div>');
  
  ele.before(wrapper);
  $(window).on('scroll resize', function() {
      toggleAffix(ele, $(this), wrapper);
  });
  
  // init
  toggleAffix(ele, $(window), wrapper);
});

});
    </script>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    {{-- <!-- All Jquery -->
    <!-- ============================================================== -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.j')}}s"></script>
    <!-- apps -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.mini-sidebar.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <!-- This Page JS -->
    <script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/calendar/cal-init.js')}}"></script> --}}
    {{-- <script>
        $('#calendar').fullCalendar('option', 'height', 650);
    </script> --}}

    <style>
    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
    background:#7884E4;
    padding: 6px 0;
}


html,body {
	height:100%;
    padding-top:50px;
}

.navbar { 
  -webkit-transition:padding 0.2s ease;
  -moz-transition:padding 0.2s ease; 
  -o-transition:padding 0.2s ease;        
  transition:padding 0.2s ease;  
}

.affix {
  padding-top: 0.2em !important;
  padding-bottom: 0.2em !important;
  -webkit-transition:padding 0.2s linear;
  -moz-transition:padding 0.2s linear;  
  -o-transition:padding 0.2s linear;         
  transition:padding 0.2s linear;  
}

section {
    min-height:calc(100% - 70px);
}
    </style>