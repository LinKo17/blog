<nav class="navbar navbar-expand-lg  nav_style">
    <div class="container">
        <a class="navbar-brand" href='{{ url('/') }}'><span class="logo_style">Blog</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav me-auto  mb-lg-0"></ul>
            <ul class="navbar-nav me-auto  mb-lg-0"></ul>


            <ul class="navbar-nav me-auto  mb-lg-0">

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href='{{ url('/index') }}' id="home"><span
                            class="home-style">Home</span></a>
                </li>

                <li class="nav-item nav-style dropdown">
                    <a class="nav-link a-style" href='' id="category" data-bs-toggle="dropdown">
                        <span class="span-style dropdown">Category</span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($category_datas as $category)
                            <li class="list-group-item category_list_navbar_style">
                                <a href="/categoriesnav/{{ $category->id }}"
                                    class="nav-link text-center active">{{ $category->category }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href="{{ url('/aboutnav') }}" id="about"><span
                            class="span-style">About</span></a>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link a-style" href=""  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="span-style">
                            <i class="fa-solid fa-magnifying-glass d-none d-lg-inline"></i>
                            <span class="d-inline d-lg-none">search</span>
                        </span>
                    </a>
                </li>

                <li class="nav-item nav-style">
                    <a class="nav-link text-light btn btn-danger" href='{{ url('/dashboard') }}'>Dashboard</a>
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
                            <a href='{{ url('/profile') }}' class="dropdown-item text-center">Profile</a>

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

        </div>
    </div>
</nav>

{{-- model section --}}
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">User Search</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{url("user/search")}}">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" style="border:1px solid black;" name="search" placeholder="Enter user name">
                        <button class="btn btn-outline-success">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
{{-- model section end --}}
