<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('rp.index') }}">Razas Perrros</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('rp.index') }}">Listado de razas de perros</a>
      </li>
            @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ route('rp.temperamentos') }}">Temperamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('rp.tamanos') }}">Tamaños</a>
      </li>
          @endauth
      <li class="nav-item">
        <a class="nav-link" href="{{ route('o.acerca-de') }}">Acerca de</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

              </li>
          @endguest
      </ul>


  </div>
</nav>
