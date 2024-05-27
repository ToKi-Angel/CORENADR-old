<style>
  .navbar.fixed-top {
    background-color: transparent !important;
    transition: background-color 0.3s ease-in-out;
  }

  .navbar.fixed-top.scrolled {
    background-color: #f8f9fa !important;
  }

  .navbar.fixed-top {
    font-family: monospace;
    font-size: 1.6rem;
    color: #000000;
  }

  .navbar-brand img {
    width: 150px;
    height: auto;
  }

  .navbar-collapse {
    justify-content: flex-end;
  }

  .navbar-nav {
    margin-left: auto;
  }

  .nav-link {
    padding: 0 10px;
    font-size: 1.2rem;
    color: #000000;
  }

  .logout-btn {
    font-size: 1.2rem;
    color: #ffffff;
    margin-right: 10px;
    border-radius: 20px;
    padding: 5px 10px;
  }

  .tab-btn {
    font-size: 1.2rem;
    color: #ffffff;
    background-color: rgb(48, 186, 224);
    border-color: rgba(66, 212, 178, 0.245);
    border-radius: 20px;
    padding: 5px 10px;
    margin-left: 5px
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      {{-- <a class="navbar-brand" href="{{ route('empresa') }}"> --}}
      <a class="navbar-brand" href="">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 130px; height: auto;">
      </a>
      <div class="ml-auto">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/inicio">
            <button class="btn btn-primary tab-btn">Compostas</button>
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/misArchivos/tabl">
            <button class="btn btn-primary tab-btn">Mecanización</button>
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/creditos_Explicacio">
            <button class="btn btn-primary tab-btn">Arboles Frutales</button>
          </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('registrarUsuario') }}">Agregar Usuario</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <a href="{{ route('logout') }}" class="btn btn-danger logout-btn"> <i class="icocod">&#127939;</i> Salir del sistema</a>
      </form>
    </div>
  </div>
</nav>
<br>

<script>
  // Agrega la clase 'scrolled' a la barra de navegación cuando se hace scroll
  window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar.fixed-top');
    if (window.scrollY > 0) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
</script>
