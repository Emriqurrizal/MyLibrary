<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand">📚 MyLibrary</a>

        {{-- Hide menu toggle + nav items on landing page --}}
        @if (!Request::is('/'))
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}">My Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('genres.index') }}">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/recommendations') }}">Recommendations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <span class="nav-link text-white">👤 {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-white text-decoration-none">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        @endif
    </div>
</nav>
