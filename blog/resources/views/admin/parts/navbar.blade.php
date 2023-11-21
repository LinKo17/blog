<nav class="navbar navbar-expanded navbar_style navbar-dark">
    <div class="container-fluid">

        <a href='{{url("/index")}}' class="navbar-brand logo_style">Blog</a>

        <ul class="nav-menu dropdown mt-2">
            <li class="list-group-item dropdown">
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
        </ul>

    </div>
</nav>
