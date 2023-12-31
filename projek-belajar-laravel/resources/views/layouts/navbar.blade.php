<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid nav-fs">
        <a class="navbar-brand text-white" href="#">Belajar Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ url('/biodata') }}">About Me</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <a href={{ url('/dashboard') }}></a>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('login') }}">Log In</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page"
                                href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
