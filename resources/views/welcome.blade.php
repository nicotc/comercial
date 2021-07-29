<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--Main Navigation-->
<header>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

        <link rel="stylesheet" href="css/mdb.min.css" />

    <style>
      #intro {
        background-image: url("fondo.jpg");
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
    {{--     <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <strong>MDB</strong>
        </a> --}}
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         {{--    <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#intro">Home</a>
            </li> --}}
{{--             <li class="nav-item">
              <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                target="_blank">Learn Bootstrap 5</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Download MDB UI KIT</a>
            </li> --}}
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="mailto:nicotestagrossa@gmail.com" rel="nofollow"
                target="_blank">
                <i class="fas fa-wrench"></i>
              </a>
            </li>
           {{--  <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.facebook.com/mdbootstrap" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <img width="500" src="ag10logo.png">
            <h5 class="mb-4">GESTOR DE PEDIDOS</h5>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-outline-light btn-lg m-2" href="{{ url('/home')}}">Dashboard</a>
                    @else
                    <a class="btn btn-outline-light btn-lg m-2" href="{{ route('login')}}">Inicio de sesión</a>

                        @if (Route::has('register'))
                        <a class="btn btn-outline-light btn-lg m-2" href="{{ route('register')}}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

</body>
</html>




