<nav class="navbar navbar-expand-lg  nav_style">
    <div class="container">
        <a class="navbar-brand" href='{{url("/")}}'><span class="logo_style">Blog</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav me-auto  mb-lg-0"></ul>
            <ul class="navbar-nav me-auto  mb-lg-0"></ul>


            <ul class="navbar-nav me-auto  mb-lg-0">

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href='{{url("/index")}}' id="home"><span class="home-style">Home</span></a>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href='{{url("/categoriesnav")}}' id="category"><span class="span-style">Category</span></a>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href="{{url("/aboutnav")}}" id="about"><span class="span-style">About</span></a>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href=""><span class="span-style">User Search</span></a>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link text-light btn btn-danger" href='{{url("/dashboard")}}'>Dashboard</a>
                </li>

                {{-- login and register system --}}
                <li class="nav-item mt-1">
                    @if (Route::has('login'))

                        @auth
                        {{-- after login /register --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-light btn btn-dark" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href='{{url("/profile/1")}}' class="dropdown-item text-center">Profile</a>
                                    <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        {{-- after login /register --}}
                    @else
                            <a href="{{ route('login') }}" class="login_btn_style btn btn-primary">Log
                                in</a>


                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="register_btn_style btn btn-success">Register</a>
                            @endif
                        @endauth
                    @endif
                </li>
                {{-- login and register system --}}


        </ul>

        {{-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
    </div>
    </div>
</nav>
