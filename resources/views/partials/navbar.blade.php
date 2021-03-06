<nav class="navbar navbar-expand-lg navbar-light px-md-5 sticky-top bg-secondary">
    <div class="container-fluid">
        <div class="col-12 d-flex flex-row justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <h2 class="m-0 font-weight-semi-bold text-light">BuyMe</h2>
            </a>
            <div class="d-flex flex-row align-items-center">

                @guest
                    <a class="nav-link text-light" href="{{ route('login') }}">Sign in</a>
                @endguest

                @auth
                    <a class="nav-link text-right text-light" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
                @livewire('cart-counter')
            </div>
        </div>
    </div>
</nav>
