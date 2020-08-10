<!-- Robust Navbar-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="{{ route('home') }}"><img class="brand-logo" alt="logo" src="{{asset('images/cupcake.jpg')}}">
                <h3 class="brand-text">Cupcake Exports</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Explore Robust...">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right"> 
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
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="user-name">{{ Auth::user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{URL::to('editProfile/'.Auth::user()->id) }}"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </div>
</nav>
<!-- Left side bar menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow "    data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="#"><i class="fas fa-handshake"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Meeting</span></a>
            <ul class="menu-content">
             
              <li class="active"><a class="menu-item" href="{{url('/addmeeting')}}" data-i18n="nav.page_layouts.1_column">Add Meeting</a>
              </li>
              <li ><a class="menu-item" href="{{url('/newmeeting')}}" data-i18n="nav.page_layouts.2_columns">New Meeting</a>
              </li>
              <li class="navigation-divider"></li>
              <li ><a class="menu-item" href="{{url('/meetinghistory')}}" data-i18n="nav.page_layouts.fixed_navbar">Meeting History</a>
              </li>
              <li ><a class="menu-item" href="{{url('/individual')}}" data-i18n="nav.page_layouts.fixed_navbar">Individual Meetings</a>
              </li>
              <li ><a class="menu-item" href="{{url('/eventcalender')}}" data-i18n="nav.page_layouts.fixed_navbar">Event Calender</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="{{url('/users')}}"><i class="fas fa-users"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Users</span></a>
          </li>  

        </ul>  
      </div>
</div>

<script>

  /*$(".menu-content a").on("click", function(){
     $(".menu-content").find(".active").removeClass("active");
     $(this).parent().addClass("active");
  });*/

</script>