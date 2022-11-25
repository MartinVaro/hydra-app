<!DOCTYPE html>
<html lang="en">
<head>
		<!-- CSS here -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/ticker-style.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>

<header>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="container">
                
            <!-- Navbar Brand-->
            @if (Route::has('login'));
                @auth
                <a class="navbar-brand ps-3" href="/" style="color:#51ff00; font-size: 15px;"></a>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <a class="navbar-brand ps-3" href="{{ url('/profile') }}" style="color:#51ff00; font-size: 15px;">{{ Auth::user()->name }} {{ Auth::user()->apellido }}</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="navbar-brand ps-3" href="{{route('proyecto.index')}}" style="color:#050505; font-size: 15px;"">Mis Proyectos</a></li>
                        <li><a class="navbar-brand ps-3" href="{{route('proyecto.create')}}" style="color:#050505; font-size: 15px;"">Crear Proyecto</a></li>
                    @can('dashboard') 
                        <li><a class="navbar-brand ps-3" href="/admin" style="color:#050505; font-size: 15px;"">Admin/Usuarios</a></li>
                    @endcan
                    @can('allproyect')
                        <li><a class="navbar-brand ps-3" href="" style="color:#050505; font-size: 15px;"">Admin/Proyectos</a></li>
                    @endcan
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
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color:#51ff00; font-size: 15px;">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" style="color:#51ff00; font-size: 15px;">Registrarse</a>
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
                                    <a href="/"><img src="{{asset('assets/img/logo/hydrablack.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-left ">
                                    <img src="{{asset('assets/img/hero/header_hydra.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
       </div>
        <!-- Header End -->
    </header>





  


</header>

<h1 class="text-info text-center">Editar Proyecto</h1>
    <div class="container p-5 border border-3 rounded w-75">
      <form action="/proyecto/{{$proyecto->id}}" enctype="multipart/form-data" method="POST" class="px-4 py-3"> {{--Editar--}}
        @method('PATCH')    
        @csrf
          <div class="form-group p-4">
            <label for="titulo" class="input-group-text btn-primary  bg-opacity-50">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{isset($proyecto)? $proyecto->titulo:''}}{{old('titulo')}}" required>
            @error('titulo')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          
             
          <div  class="input-group p-4">
            <label class="input-group-text btn-primary" for="categoria">Categoria</label>
            <select class="form-select" name="categoria" id="categoria" required>
                <option value=""></option>
                <option value="Ambiente" {{isset($proyecto)&& $proyecto->categoria=='Ambiente' ? 'selected': ''}}>Ambiente</option>
                <option value="Universo" {{isset($proyecto)&& $proyecto->categoria=='Universo' ? 'selected': ''}}>Universo</option>
                <option value="Educación" {{isset($proyecto)&& $proyecto->categoria=='Educación' ? 'selected': ''}}>Educación</option>
                <option value="Desarrollo Sustentable" {{isset($proyecto)&& $proyecto->categoria=='Desarrollo Sustentable' ? 'selected': ''}}>Desarrollo Sustentable</option>
                <option value="Desarrollo Tecnológico" {{isset($proyecto)&& $proyecto->categoria=='Desarrollo Tecnológico' ? 'selected': ''}}>Desarrollo Tecnológico</option>
                <option value="Energía" {{isset($proyecto)&& $proyecto->categoria=='Energía' ? 'selected': ''}}>Energía</option>
                <option value="Salud" {{isset($proyecto)&& $proyecto->categoria=='Salud' ? 'selected': ''}}>Salud</option>
                <option value="Sociedad" {{isset($proyecto)&& $proyecto->categoria=='Sociedad' ? 'selected': ''}}>Sociedad</option>
            </select>
          </div>
        
          <div class="form-group p-4">
            <img width="300px" src="{{Storage::url($proyecto->portada)}}"><br>
            <br><label for="imagen" class="input-group-text btn-primary">Imagen</label>
            <input accept="image/*" type="file" class="form-control" name="imagen">
            @error('imagen')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


          <div class="form-group p-4">
            <label for="descripcion" class="input-group-text btn-primary  bg-opacity-50">Descripcion</label>
            <textarea class="form-control"  name="descripcion" id="descripcion" cols="30" rows="10">{{isset($proyecto) ? $proyecto->descripcion  : ''}}</textarea><br>
            @error('descripcion')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror <br>
          </div>
          <div class="form-group p-4">
            <label for="fecha" class="input-group-text btn-primary  bg-opacity-50">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="{{isset($proyecto)? $proyecto->fecha:''}}{{old('fecha')}}" required>
            @error('fecha')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>

          <div class="form-group p-4">
            <label for="abstracto" class="input-group-text btn-primary  bg-opacity-50">Abstracto</label>
            <textarea class="form-control"  name="abstracto" id="abstracto" cols="30" rows="10">{{isset($proyecto) ? $proyecto->abstracto  : ''}}</textarea><br>
            @error('abstracto')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror <br>
            <button type="submit" class="btn btn-primary active">Actualizar</button>
          </div>

      </form>
    </div>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="./assets/js/jquery.ticker.js"></script>
        <script src="./assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    </body>
</html>

 