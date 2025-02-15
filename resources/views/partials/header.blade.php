<header class="body__header">
    <div class="header__div_logo">
        LOGO HOME
    </div>
    <nav class="header__navigation">
        @auth
            <a href="{{ route('user.showIndex', ['id' => auth()->user()->id]) }}" class="navigation__a">
                {{auth()->user()->name}}
            </a>
            <a href="{{ route('chore.showRegister')}}" class="navigation__a">
                REGISTER CHORE
            </a>
            <a href="{{ route('user.doLogout') }}" class="navigation__a">
                LOGOUT
            </a>
        @else
            <a href="{{ route('user.showLogin') }}" class="navigation__a">
                LOGIN
            </a>
            <a href="{{ route('user.showRegister') }}" class="navigation__a">
                REGISTER
            </a>
        @endauth
    </nav>
</header>