<div class="container">
    <div class="float-left logo">
      <h2 class="animate__animated animate__fadeInDown"><a href=""><span>Market</span></a></h2>
    </div>
    <nav class="float-right nav-menu d-none d-lg-block">
      <ul>
        <li id="carrito" style="display: none;" class="drop-down"><a href="#services">Carrito<i class="fas fa-cart-arrow-down"></i></i></a>
        </li>
        <li class="drop-down"><a href="">CATEGORIA</a>
          <ul>
            @foreach (@categorias() as $categoria)
              <li><a href="{{ route('web.categorias', ['id'=>$categoria->id]) }}">{{ $categoria->nombre }}</a></li>
            @endforeach
          </ul>
        </li>
        @auth
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            CERRAR SESION
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </li>
          <li><a href="{{ url('/index') }}">HOME</a></li>
        @endauth
        @guest
          <li class="drop-down"><a href="">INGRESAR</a>
            <ul>
            @if (Route::has('login'))
                <li><a href="{{ route('showLogin') }}">INICIAR SESION</a></li>
            @endif
            @if (Route::has('register'))
                <li><a href="{{ route('showRegister') }}">REGISTRAR</a></li>
            @endif
            </ul>
          </li>
        @endguest
      </ul>
    </nav>
  </div>
