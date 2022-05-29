<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="uil uil-estate me-1"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="uil uil-notebooks me-1"></i>Items</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}"><i
                                class="uil uil-user-plus me-1"></i>Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}"><i class="uil uil-user me-1"></i>Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/items') }}">
                            <i class="uil uil-apps me-1"></i>
                            Manage Items
                        </a>
                    </li>
                    @if (Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/categories') }}">
                                <i class="uil uil-paperclip me-1"></i>
                                Manage Categories
                            </a>

                            <a class="nav-link" href="">
                                <i class="uil uil-paperclip me-1"></i>
                                Manage Order
                            </a>

                            <a class="nav-link" href="">
                                <i class="uil uil-paperclip me-1"></i>
                                Print Faktur
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-user me-1"></i>
                            Hi, {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
