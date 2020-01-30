<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')
  <a class="navbar-brand" href="{{url("home")}}">Dejavu HR Portal</a>
  @else
  <a class="navbar-brand" href="{{url("home")}}" style="margin-left: 45%">Dejavu HR Portal</a>
 @endif
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')
      <li class="nav-item active">
        <a class="nav-link" href="{{url("home")}}">Home <span class="sr-only">(current)</span></a>
      </li>

<!--####Employees links##-->
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Employees
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

            <li><a class="dropdown-item" href="{{ url('/register') }}">Add New Employee</a>
          </li>
          <li><a class="dropdown-item" href="{{ url('upload') }}">Add All</a></li>
          <li><a class="dropdown-item" href="{{ url('employees') }}">Search Employee</a></li>
          {{-- <li><a class="dropdown-item" href="/HR_Portal/public/employees">Show All Employees</a></li> --}}
        </ul>
      </li>
<!--######################-->

<!--####Employees Balance links##-->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Employees Balance
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

      <li><a class="dropdown-item" href="{{url("employees_balance/search_balance")}}">Add New Employee Balance</a>
    </li>
    <li><a class="dropdown-item" href="{{url("upload_balance")}}">Add To All</a></li>

  </ul>
</li>
<!--######################-->

<!--####Employee Notifications links##-->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Employee Notifications
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

      <li><a class="dropdown-item" href="{{url("employees_notify/search_notification")}}">Add New Employee Notification</a>
    </li>
    <li><a class="dropdown-item" href="{{url("upload_note")}}">Add To All</a></li>

    {{-- <li><a class="dropdown-item" href="#">Add All</a></li>
    <li><a class="dropdown-item" href="#">Search Employee</a></li> --}}
  </ul>
</li>
<!--######################-->

<!--####Employee Gneral Notification links##-->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Employee Gneral Notification
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

      <li><a class="dropdown-item" href="{{url("generaklNotifications")}}">Add New Gneral Notification</a>
      {{-- <li><a class="dropdown-item" href="#">Show Gneral Notification</a> --}}

    </li>
    {{-- <li><a class="dropdown-item" href="#">Add All</a></li>
    <li><a class="dropdown-item" href="#">Search Employee</a></li> --}}
  </ul>
</li>
@endif



<!--######################-->

             <!-- Authentication Links -->
             @guest
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
             </li>
             @if (Route::has('register'))
                 <li class="nav-item">  
                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                 </li>
             @endif
         @else
           @if(Auth::user()->Djv_Group === 'admin' || Auth::user()->Djv_Group === 'TopManager'|| Auth::user()->Djv_Group === 'hr')
           <li>
            <img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" class="rounded-circle" alt="Cinque Terre" width="100" height="60">
           </li>
             <li class="nav-item dropdown" style="margin-left:10px;  background:#ddd; border-radius:10px">
              <a id="navbarDropdown" style="color:#000" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }} <span class="caret"></span>
                 </a>
      
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="employees/{{ Auth::user()->id }}/edit">
                    User Profile
                </a>
                  
                  <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
      
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 </div>
             </li>
             @else
             <li style="margin-left: 130%">
              <img src="{{asset('storage/EmployeeProfileImages/'. Auth::user()->user_pp)}}" class="rounded-circle" alt="Cinque Terre" width="100" height="60">
            </li>
           <li class="nav-item dropdown" style="margin-left:10px;   background:#ddd; border-radius:10px">
            <a id="navbarDropdown" style="color:#000" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   {{ Auth::user()->name }} <span class="caret"></span>
               </a>
    
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="employees/{{ Auth::user()->id }}/edit">
                  User Profile
              </a>
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>
    
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
               </div>
           </li>
              @endif

         @endguest


    </ul>
  </div>
</nav>

<style>

/* div a {
  text-decoration: none;
  color: white;
  font-size: 20px;
  padding: 15px;
  display:inline-block;
} */
/* ul {
  display: inline;
  margin: 0;
  padding: 0;
} */
/* ul li {display: inline-block;} */
ul li:hover {background: #555;}
/* ul li:hover ul {display: block;} */
/* ul li ul {
  
  width: 220px;
  display: none;
  
} */



/* ul li ul li { 
  background: #fff; 
  display: block; 
}
ul li ul li a {display:block !important;} 
ul li ul li:hover {background: #555;} */





.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: .8em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}

.navbar-dark .navbar-brand
 {
    color: #fff;
    margin-right: 130PX;
}
</style>

<script>
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
  }
  var $subMenu = $(this).next('.dropdown-menu');
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass('show');
  });


  return false;
});
</script>