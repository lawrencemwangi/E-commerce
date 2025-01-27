<div class="navbar_container">
    <div class="nav_logo">
        <div class="logo">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="{{ ('app.name') }}">
        </div>
        
        <div class="home">
            <a href="{{ route('home') }}">{{ config('app.name') }}</a>
        </div>
    </div>

    <div class="nav_links" id="navLinks">
        <ul>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('collection') }}">Shop</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>

            <li class="profile">
                @if(Auth::user())
                    <a href="{{ route('profile.edit') }}" class="profiles">
                        <i class="fa fa-user"></i>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="logout">Log out</button>
                    </form>
                @else
                    <button><a href="{{ route('login') }}" class="btn">Login</a></button>
                @endif
            </li>
        </ul>
    </div>

    <div class="burger" id="burgerIcon">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>