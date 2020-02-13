<header> 
        <div  class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <!--start logo handle-->
                        <div class="row align-items-center">
                            @if(!(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr'))

                            <div class="col-xl-1 ml-2">
                                <div style="margin-left: 730%" class="logo">
                                    <a href="{{url("home")}}">
                                        <img width="100" height="70" src="{{asset('storage/logos/logo.png')}}" alt="dejavu logo">
                                    </a>
                                </div>
                            </div>
                            @else    
                            <div class="col-xl-1 ml-2">
                                <div class="logo">
                                    <a href="{{url("home")}}">
                                        <img width="100" height="70" src="{{asset('storage/logos/logo.png')}}" alt="dejavu logo">
                                    </a>
                                </div>
                            </div>
                            @endif

                            <!--end logo handle-->
                            <div class="col-xl-5 col-lg-6 ml-3 mt-3">
                                <div class="main-menu  d-none d-lg-block ">
                                    <nav >
                                        <ul style="width: 1200px" id="navigation">


                                            <!--start home handle-->
                                            @if((Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr'))
                                            <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" class="active" href="{{url("home")}}">home</a></li>
                                            {{-- @else
                                            <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" class="active" href="{{url("home")}}">home</a></li>      --}}
                                            @endif
                                            <!--end home handle-->

                                            <!--start navbar control-->
                                            @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')
                                            <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="#">Employees <i class="ti-angle-down"></i></a>
                                                <ul style="width: 250px" class="submenu">
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{ url('/register') }}"><i style="font-size: 12px" class="fas fa-user-plus mr-2 ml-1"></i>Add New Employee</a></li>
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{ url('upload') }}"><i style="font-size: 12px" class="fas fa-plus-circle mr-2 ml-1"></i>Add All</a></li>
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{ url('employees') }}"><i style="font-size: 12px" class="fas fa-search mr-2 ml-1"></i>Search Employee</a></li>
                                                </ul>
                                            </li>
                                            <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="#">Employees Balance <i class="ti-angle-down"></i></a>
                                                <ul style="width: 310px" class="submenu">
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{url("employees_balance/search_balance")}}"><i style="font-size: 12px" class="fas fa-calculator mr-2"></i>Add New Employee Balance</a></li>
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{url("upload_balance")}}"><i style="font-size: 12px" class="fas fa-plus-circle mr-2 ml-1"></i>Add To All</a></li>
                                                </ul>
                                            </li>
                                            <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="#">Employee Notifications <i class="ti-angle-down"></i></a>
                                                <ul style="width: 310px" class="submenu">
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{url("employees_notify/search_notification")}}"><i style="font-size: 12px" class="fas fa-bell mr-2 ml-1"></i>Add Employee Notification</a></li>
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{url("employees_notify/group_notification")}}"><i style="font-size: 12px" class="fas fa-users mr-2 ml-1"></i>Add Group Notification</a></li>
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{url("upload_note")}}"><i style="font-size: 12px" class="fas fa-plus-circle mr-2 ml-1"></i>Add To All</a></li>
                                                </ul>
                                            </li>

                                            <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="#">Employee General Notifications <i class="ti-angle-down"></i></a>
                                                <ul style="width: 290px" class="submenu">
                                                        <li><a style="font-size: 17px; font-weight: bold ;font-family: Arial" href="{{url("generaklNotifications")}}"><i style="font-size: 12px" class="fas fa-bell mr-2 ml-1"></i>Add General Notification</a></li>
                                                </ul>
                                            </li>
                                        
                                        @endif

                                         <!-- User profile and search -->
                    <!-- ============================================================== -->
                    @if(!(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr'))
                    <li style="float: right;margin-right: 100px; margin-bottom: 50px" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded-circle" width="100" height="50">
                        <span class="ml-2 user-text font-medium">{{Auth::user()->name}}</span>
                        </a>
                        <div style="left: -130px"  class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                <div class=""><img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded" width="80"></div>
                                <div class="ml-2">
                                    <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                    <p class=" mb-0 text-muted">{{Auth::user()->email}}</p>
                                    <a href="{{url('profile')}}" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                                </div>
                            </div>

                            <a class="dropdown-item" href="{{url("profile")}}"><i style="font-size: 18px" class="ti-user mr-1 ml-1"></i> My Profile</a>
                            <a class="dropdown-item" href="{{url('employees_balance/' . Auth::user()->id) }}"><i style="font-size: 18px" class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                            <a class="dropdown-item" href="{{url('employees_notify/' . Auth::user()->id) }}"><i style="font-size: 18px" class="fas fa-bell mr-2 ml-1"></i> My Notification</a>

                            <a class="dropdown-item" href="{{url("complains/create")}}"><i style="font-size: 18px" class="fas fa-frown mr-1 ml-1"></i>Send Complain</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i style="font-size: 18px" class="ti-settings mr-1 ml-1"></i> Account Setting</a>
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
                                                       <i style="font-size: 18px" class="fa fa-power-off mr-1 ml-1"></i>
                                          {{ __('Logout') }}
                                      </a>
                       
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                              @else                     
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i style="font-size: 18px" class="fa fa-power-off mr-1 ml-1"></i>
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
                        <li style="float: right" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded-circle" width="100" height="60">
                            <span class="ml-2 user-text font-medium">{{Auth::user()->name}}</span>
                            </a>
                            <div style="left: -130px;margin-right: 70px; margin-bottom: 50px" class="dropdown-menu  user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" alt="user" class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                        <p class=" mb-0 text-muted">{{Auth::user()->email}}</p>
                                        <a href="{{url("profile")}}" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                                    </div>
                                </div>
    
                                <a class="dropdown-item" href="{{url("profile")}}"><i style="font-size: 18px" class="ti-user mr-1 ml-1"></i> My Profile</a>
                                <a class="dropdown-item" href="{{url('employees_balance/' . Auth::user()->id) }}"><i style="font-size: 18px" class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                                <a class="dropdown-item" href="{{url('employees_notify/' . Auth::user()->id) }}"><i style="font-size: 18px" class="fas fa-bell mr-2 ml-1"></i> My Notifications</a>

                                <a class="dropdown-item" href="{{url("complains/")}}"><i style="font-size: 18px" class="fas fa-frown mr-1 ml-1"></i> Show Complains</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i style="font-size: 18px" class="ti-settings mr-1 ml-1"></i> Account Setting</a>
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
                                                           <i style="font-size: 18px" class="fa fa-power-off mr-1 ml-1"></i>
                                              {{ __('Logout') }}
                                          </a>
                           
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              @csrf
                                          </form>
                                  @else                     
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                         <i style="font-size: 18px" class="fa fa-power-off mr-1 ml-1"></i>
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
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <hr/>.
    <!-- header-end -->


       <!-- link that opens popup -->
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
    <!-- JS here -->
    {{-- <script src="{{asset('assets/js_templete/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/popper.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js_templete/popper.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/scrollIt.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/wow.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/plugins.js')}}"></script>
    <script src="{{asset('assets/js_templete/gijgo.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/slick.min.js')}}"></script> --}}
   

    
    <!--contact js-->
    <script src="{{asset('assets/js_templete/contact.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.form.js')}}"></script>
    <script src="{{asset('assets/js_templete/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js_templete/mail-script.js')}}"></script>


    <script src="{{asset('assets/js_templete/main.js')}}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
    </script>