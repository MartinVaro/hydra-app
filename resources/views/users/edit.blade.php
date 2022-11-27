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
            <a class="navbar-brand ps-3" href="/" style="color:#51ff00; font-size: 15px;">Home</a>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <a class="navbar-brand ps-3" href="{{ url('/profile') }}" style="color:#51ff00; font-size: 15px;">{{ Auth::user()->name }} {{ Auth::user()->apellido }}</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="navbar-brand ps-3" href="{{route('proyecto.index')}}" style="color:#050505; font-size: 15px;"">Mis Proyectos</a></li>
                    <li><a class="navbar-brand ps-3" href="{{route('proyecto.create')}}" style="color:#050505; font-size: 15px;"">Crear Proyecto</a></li>
                @can('dashboard') 
                    <li><a class="navbar-brand ps-3" href="admin" style="color:#050505; font-size: 15px;"">Admin/Usuarios</a></li>
                @endcan
                @can('allproyect')
                    <li><a class="navbar-brand ps-3" href="admin/proyectos" style="color:#050505; font-size: 15px;"">Admin/Proyectos</a></li>
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


</header>
<br></br>
<h1 class="text-info text-center">Editar Permisos</h1>
    <div class="container p-5 border border-3 rounded w-75">
    <label for="titulo" class="input-group-text btn-primary  bg-opacity-50">Nombre del usuario: {{$user->name}} {{$user->apellido}}</label>
    <form action="/user/{{$user->id}}" enctype="multipart/form-data" method="POST" class="px-4 py-3"> {{--Editar--}}
        @method('PATCH')    
        @csrf
        <div class="single-element-widget">
							<strong>Roles</strong>
                            <br></br>
							</div>
                            @foreach ($roles as $role)
                                <div class="checkbox">
                                <label><input type="checkbox" name="roles[]" value={{$role->id}}>{{$role->name}}</label>
                                </div>
                            @endforeach 
                            <button type="submit" class="btn btn-primary active">Actualizar</button>
		</div>


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


<!-- 
<form action="/user/{{$user->id}}" emethod="PUT" class="px-4 py-3"> 
        @method('PATCH')    
        @csrf
          <div class="form-group p-4">
            <label for="titulo" class="input-group-text btn-primary  bg-opacity-50">Nombre del usuario: {{$user->name}} </label>
            <div class="single-element-widget mt-30">
            <div class="col-lg-3 col-md-4 mt-sm-30">
						<div class="single-element-widget">
							<strong>Roles</strong>
                            <br></br>
							</div>


                            <label class="heading">Seleccione su lenguaje favorito:</label>
                            <div class="checkbox">
                            <label><input type="checkbox" name="check_lista[]" value="C++">C++</label>
                            </div>
                            <div class="checkbox"> 
                            <label><input type="checkbox" name="check_lista[]" value="Java">Java</label>
                            </div>
                            <div class="checkbox">
                            <label><input type="checkbox" name="check_lista[]" value="PHP7">PHP 7</label>
                            </div> 
                            <div class="checkbox">
                            <label><input type="checkbox" name="check_lista[]" value="HTML5/CSS">HTML5/CSS</label>
                            </div> 
                            <div class="checkbox">
                            <label><input type="checkbox" name="check_lista[]" value="JavaScript/jQuery">JavaScript/jQuery</label>
                            </div> 
                            <button type="submit" class="btn btn-primary" name="enviar">Enviar Información</button>
						</div>
				
	
					</div>

          </div>
          
      </form>

    -->