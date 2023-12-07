<header>
    <div class="w-100 bg-dark">
        <div style="height: 64px" class="d-flex justify-content-center align-items-center">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/auth/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/register">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</header>
