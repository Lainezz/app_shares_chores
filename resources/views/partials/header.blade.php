<header class="body__header">
    <div class="header__div_logo">
        <a class="div_logo__a" href="{{ route('home')}}">SHARES CHORES APP</a>
    </div>
    <nav class="header__navigation">
        @auth
        <div class="navigation__div">
            {{auth()->user()->name}}
        </div>
        <a href="{{ route('user.showIndex', ['id' => auth()->user()->id]) }}" class="navigation__a">
            CHORES LIST
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