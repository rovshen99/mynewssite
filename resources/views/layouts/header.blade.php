<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">MyNEWS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('news') }}">Новости</a>
                    </li>
                    @if(session('user'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('profile') }}">{{ session('user')->login }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('logout') }}">Выйти</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-outline-light ml-3" href="{{ route('loginForm') }}">Войти</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>