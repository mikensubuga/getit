  <!--Navbar-->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark unique-color-dark ">
        <a class="navbar-brand" href="/">Get It</a>
        <a class="navbar-brand" href="/">
                <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt="mdb logo">
              </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarSupportedContent-4" style="">
            
  
          <ul class="navbar-nav ml-auto">
        @if(Auth::check())
            <li class="nav-item active">
              <a class="nav-link waves-effect waves-light" href="#">
                <i class="fa fa-envelope"></i> Contact
                
              </a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Orders </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                      <a class="dropdown-item waves-effect waves-light" href="{{ route('order.showSelling', Auth::user()->id) }}">My Sellings</a>
                      <a class="dropdown-item waves-effect waves-light" href="{{ route('order.show', Auth::user()->id) }}"> My Orders</a>
                    </div>
                  </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> {{ Auth::user()->name }} </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                <a class="dropdown-item waves-effect waves-light" href="{{ route('user', Auth::user()->name) }}">My account</a>
                <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }} "    
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Log out</a>
              </div>
            </li>
        @else
                <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{ route('login') }}">
                  <i class="fa fa-gear"></i> Login</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('register') }}">
                      <i class="fa fa-gear"></i> Register</a>
                </li>
        @endif
          </ul>
        </div>
      </nav>
  

