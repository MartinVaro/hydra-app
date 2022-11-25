<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FinderBook</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/ticker-style.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="container">     
            <!-- Navbar Brand-->
            @if (Route::has('login'))
                @auth
                <a class="navbar-brand ps-3" href="/" style="color:#51ff00; font-size: 15px;"></a>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <a class="navbar-brand ps-3" href="{{ url('/profile') }}" style="color:#51ff00; font-size: 15px;">{{ Auth::user()->name }} {{ Auth::user()->apellido }}</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="navbar-brand ps-3" href="{{route('proyecto.index')}}" style="color:#050505; font-size: 15px;"">Mis Proyectos</a></li>
                        <li><a class="navbar-brand ps-3" href="{{route('proyecto.create')}}" style="color:#050505; font-size: 15px;"">Crear Proyecto</a></li>
                        <li><form method="POST" action="{{route('logout')}}">
                            @csrf
                            <a class="navbar-brand ps-3" href="{{route('logout')}}" onclick="event.preventDefault();
                            this.closest('form').submit(); " style="color:#050505; font-size: 15px;"">Cerrar sesión</a>
                            </form>  
                        </li>  
                    </ul>
                </li>
            </ul>


                @else
                <div class="main-menu d-none d-md-block ps-3">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif
        </nav>


        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-mid d-none d-md-block">
                   <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="/"><img src="assets/img/logo/hydrablack.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-left ">
                                    <img src="assets/img/hero/header_hydra.png" alt="">
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
        

                    </div>
                    <br><br><br><br><br>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        FinderBook User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                   {{$slot}}
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FinderBook 2022</div>
                            <div>
                                <a href="policy">Privacy Policy</a>
                                &middot;
                                <a href="terms">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="/livewire/livewire.js?id=940557fc56b15ccb9a2d" data-turbo-eval="false" data-turbolinks-eval="false"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('eliminar')=='ok')
    <script>
        Swal.fire(
        'Eliminado!',
        'Tu proyecto se eliminó con éxito',
        'success')
    </script>
    @endif
    
    @if(session('editar')=='ok')
    <script>
        Swal.fire(
        'Editado!',
        'Tu proyecto se actualizó con éxito',
        'success')
    </script>
    @endif

    
    @if(session('crear')=='ok')
    <script>
        Swal.fire(
        'Registro completo!',
        'Tu proyecto se creó con éxito',
        'success')
    </script>
    @endif

    @if(session('logeado')=='ok')
    <script>
        Swal.fire(
        'Ya has iniciado sesión!',
        '',
        'success')
    </script>
    @endif

    @if(session('contactar')=='ok')
    <script>
        Swal.fire(
        'Haz contactado a un usuario',
        'se envío tu correo y nombre de contacto, sí el usuario quiere ser tu amigo te enviará un email',
        'success')
    </script>
    @endif

    <script type="text/javascript">
        function detener(evt, contenedor){
            evt.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: "Este proyecto se eliminará definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(contenedor).submit();
                //document.queryselector.All();
            }
            })


        };
    </script>

    </body>
</html>



