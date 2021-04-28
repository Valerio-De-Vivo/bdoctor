<header id="top" class="main-menu">
    <div class="logo-section">
        <img class="logo" src="{{ asset('img/common/logo.png') }}" alt="logo">
    </div>

    <div class="menu-item">
        <ul>
            <li>
                <a class=" {{ (Request::route()->getName() == 'guest-index') ? 'active' : '' }} " href="{{route('guest-index')}}">Home</a>
            </li>
            <li>
                <a class=" {{ (Request::route()->getName() == 'ricerca-avanzata') ? 'active' : '' }} " href=" {{route('ricerca-avanzata')}} ">Ricerca Avanzata</a>
            </li>
            <li>
                <a class=" {{ (Request::route()->getName() == 'show.doctors') ? 'active' : '' }} " href="{{route('show.doctors')}}">Top Dottori</a>
            </li>
            
            <li>
                <a  href="#contatti">Contatti</a>
            </li>
        </ul>
    </div>

    <div class="login">
        <ul>
        @if (Route::has('login'))
            @auth
              <li class="">
                <a class="btn green" href="{{ route('dashboard-dottore') }}">Dashboard dottore</a>
                <a class="my-logout" style="font-size: .8rem" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </li>
            @else
              <li class="">
                <a id="log" class="" href="{{ route('login') }}">Accedi</a>
              </li>

                @if (Route::has('register'))
                  <li class="">
                    <a id="reg" class="" href="{{ route('register') }}">Sei un dottore? Iscriviti</a>
                  </li>
                @endif
            @endauth
        @endif
        </ul>
    </div>

    <div class="nav-mobile">
        <i class="fas fa-bars"></i>
    </div>

    <div class="menu-mobile none">
        <i class="fas fa-times close"></i>
        <ul>
            <li>
                <a class=" {{ (Request::route()->getName() == 'guest-index') ? 'active' : '' }} " href="{{route('guest-index')}}">Home</a>
            </li>
            <li>
                <a class=" {{ (Request::route()->getName() == 'ricerca-avanzata') ? 'active' : '' }} " href=" {{route('ricerca-avanzata')}} ">Ricerca Avanzata</a>
            </li>
            <li>
                <a class=" {{ (Request::route()->getName() == 'show.doctors') ? 'active' : '' }} " href="{{route('show.doctors')}}">Top Dottori</a>
            </li>
            
            <li>
                <a id="cont"  href="#contatti">Contatti</a>
            </li>
        </ul>
        <ul>
            @if (Route::has('login'))
                @auth
                  <li class="">
                    <a class="btn green" href="{{ route('dashboard-dottore') }}">Dashboard dottore</a>
                    <a class="my-logout" style="font-size: .8rem" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                  </li>
                @else
                  <li class="">
                    <a id="log" class="" href="{{ route('login') }}">Accedi</a>
                  </li>
    
                    @if (Route::has('register'))
                      <li class="">
                        <a id="reg" class="" href="{{ route('register') }}">Sei un dottore? Iscriviti</a>
                      </li>
                    @endif
                @endauth
            @endif
            </ul>
    </div>
</header>