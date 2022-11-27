<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$proyecto->titulo}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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


    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                    <!-- Hot Aimated News Tittle-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <h3 class="mb-10 genric-btn success-border e-large" style="font-size: 25px;" type="button">{{$proyecto->titulo}}</h3>             
                            </div>        
                        </div>

                <!-- Calificación principal-->
                <?php 
                    $avg=$calificacions->avg('ranking');
                    $avg=round($avg,1);
                ?>

                <div class="text-right">
                    <h3 class="mb-10 genric-btn warning e-large" style="font-size: 25px;" type="button">{{$avg}} / 5</h3>
                    <p>Fecha de creación: {{$proyecto->fecha}}</p>
			    </div>

                </div>
                   <div class="row">
                        <div class="col-lg-12">
                            <!-- Trending Tittle -->
                            
                            <div class="about-right mb-20">
                                <div class="about-img">
                                    <p>{{$proyecto->portada}}</p>
                                    <img src="{{Storage::disk('s3')->url($proyecto->portada)}}">
                                    <img src="{{Storage::url($proyecto->portada)}}" alt="">
                                </div>



                    <!-- Donaciones realzadas -->
                    <div class="progress-table-wrap">
					<div class="progress-table">
                    <?php 
                    $suma=$donacions->sum('cantidad');
                    $porcentaje=(($suma*100)/10000);
                    ?>
						<div class="table-row">
							<div class="serial"></div>
							<div class="country"> Dinero recaudado: </div>
							<div class="visit">{{$suma}}</div>
							<div class="percentage">
								<div class="progress">
									<div class="progress-bar color-4" role="progressbar" style="width: {{$porcentaje}}%"
										aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						
					</div>
				    </div>











                        <!-- STAR Ranking -->
                            @auth
                            @if (Auth::id()!=$proyecto->user_id)
                                @if(!$calificacions->where('user_id', Auth::id()))
                                <div class="container d-flex justify-content-center mt-50">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="stars">
                                                <form action="/calificacion" method="POST"> 
                                                    @csrf 
                                                    <input id="proyecto_id" name="proyecto_id" type="hidden" value="{{$proyecto->id}}">
                                                    <input type="radio" class="star star-5" id="star-5"  value=5 name="ranking">  
                                                    <label class="star star-5" for="star-5"></label>           
                                                    <input type="radio" class="star star-4" id="star-4" value=4 name="ranking">
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input type="radio" class="star star-3" id="star-3" value=3 name="ranking">
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input type="radio" class="star star-2" id="star-2" value=2 name="ranking">
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input type="radio" class="star star-1" id="star-1" value=1 name="ranking">
                                                    <label class="star star-1" for="star-1"></label>
                                                    
                                                    
                                                    <div class="button-group-area mt-10">
                                                        <button class="genric-btn success-border radius">Calificar</button>
                                                    </div>
                                                </form> 
                                            </div>            
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="container d-flex justify-content-center mt-50">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="stars">
                                                <?php 
                                                $bool=true;
                                                $siexiste=$calificacions->where('user_id', Auth::id()); 
                                                if($siexiste->isEmpty()){
                                                    $bool=false;
                                                }
                                                ?>
                                                
                                                @if($bool) 
                                                    @foreach ($siexiste as $micali)
                                                        @for ($i=1; $i<=$micali->ranking; $i++)
                                                            <label class="star star-2" for="star-2"></label> 
                                                        @endfor
                                                    @endforeach                                   
                                                </div>
                                                    @if($micali)
                                                        <form id="{{$micali->id}}" action="/calificacion/{{$micali->id}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="button" class="btn btn-warning btn-block rating-submit" onclick="pausar(event, {{$micali->id}});" value="Modificar">                                          
                                                        </form>
                                                    @endif
                                                

                                                @else
                                                <div class="container d-flex justify-content-center mt-50">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="stars">
                                                                <form action="/calificacion" method="POST"> 
                                                                    @csrf 
                                                                    <input id="tema" name="tema" type="hidden" value="{{$proyecto->categoria}}">
                                                                    <input id="proyecto_id" name="proyecto_id" type="hidden" value="{{$proyecto->id}}">
                                                                    <input type="radio" class="star star-5" id="star-5"  value=5 name="ranking"/>  
                                                                    <label class="star star-5" for="star-5"></label>           
                                                                    <input type="radio" class="star star-4" id="star-4" value=4 name="ranking"/>
                                                                    <label class="star star-4" for="star-4"></label>
                                                                    <input type="radio" class="star star-3" id="star-3" value=3 name="ranking"/>
                                                                    <label class="star star-3" for="star-3"></label>
                                                                    <input type="radio" class="star star-2" id="star-2" value=2 name="ranking"/>
                                                                    <label class="star star-2" for="star-2"></label>
                                                                    <input type="radio" class="star star-1" id="star-1" value=1 name="ranking"/>
                                                                    <label class="star star-1" for="star-1"></label>
                                                                    <div class="buttons px-4 mt-0">
                                                                        <button class="btn btn-warning btn-block rating-submit">Calificar</button>
                                                                    </div>
                                                                </form> 
                                                            </div>            
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endif
                            @endauth
                        <!-- End Ranking -->







                                <div class="section-tittle mb-30 pt-30">
                                    <h3>Resumen</h3>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25">{{$proyecto->abstracto}}</p>
                                </div>  
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25"><strong>Temática: </strong>{{$proyecto->categoria}}</p>
                                </div> 
                                <div class="section-tittle mb-30 pt-30">
                                    <h3>Descripción</h3>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25">{{$proyecto->descripcion}}</p>
                                </div>
                                
                                <div class="section-tittle mb-30 pt-30"">
                                    <h3>Comentarios</h3>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        @foreach ($comentarios as $comentario)
                                        <tr>
                                            <td  width="200" class="about-pera1" style="color:#0db851;">{{$comentario->user->name}} {{$comentario->user->apellido}} :</td>
                                            <td class="about-pera1 mb-25"">{{$comentario->coment}}</td>
                                            @auth
                                            @if (Auth::id()==$comentario->user_id)
                                            <td>
                                                <form id="{{$comentario->id}}" action="/comentario/{{$comentario->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="button" class="genric-btn danger-border radius" onclick="detener(event, {{$comentario->id}});" value="Borrar">                                          
                                                </form>
                                            </td>
                                            @endif
                                            @endauth
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                        </div>
            
                
                @if (Route::has('login'))
                @auth
                    <!-- From -->
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-contact contact_form mb-80" enctype="multipart/form-data" action="/comentario" method="POST"> {{--Crear--}}
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100 error" name="coment" id="coment" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Ingresa tu comentario"></textarea>
                                        </div>
                                    </div>
                                    <input id="proyecto_id" name="proyecto_id" type="hidden" value="{{$proyecto->id}}">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="genric-btn success-border radius">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth
                @endif
                    <!-- From -->
                    <div class="section-tittle mb-30 pt-30"">
                        <h3>Donación</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-contact contact_form mb-80" enctype="multipart/form-data" action="/donacion" method="POST"> {{--Crear--}}
                                @csrf
                                <div class="row">
                                            <div class="col-12">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="nombre" id="nombre" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu nombre completo'" placeholder="Ingresa tu nombre completo">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="cantidad" id="cantidad" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cantidad que deseas donar'" placeholder="Cantidad que deseas donar">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control error" name="tarjeta" id="tarjeta" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa el número de tu tarjeta'" placeholder="Ingresa el número de tu tarjeta">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="CVV" id=""CVV" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CVV'" placeholder="CVV">
                                                </div>
                                            </div>
                                            <input id="proyecto_id" name="proyecto_id" type="hidden" value="{{$proyecto->id}}">
                                        </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="genric-btn warning-border radius">Donar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                   </div>
            </div>

            
        </div>

        

        <!-- About US End -->
    </main>

    
    <footer>
       <!-- Footer Start-->
       <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="/"><img src="{{asset('assets/img/logo/hydra2_footer2.png')}}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>La red donde tu proyecto crece.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </footer>





   <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>::-webkit-scrollbar {
        width: 8px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
        
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888; 
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    } body{
    }
    div.stars {
    width: 270px;
    display: inline-block;
    }
    .mt-200{
        margin-top:200px;  
    }
    input.star { display: none; }

    label.star {
    float: right;
    padding: 10px;
    font-size: 36px;
    color: #4A148C;
    transition: all .2s;
    }


    
    input.star:checked ~ label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
    color: #FE7;
    text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
    content: '\f006';
    font-family: FontAwesome;
    }
    
    </style>

   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('./assets/js/popper.min.js')}}"></script>
        <script src="{{asset('./assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('./assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('./assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('./assets/js/slick.min.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{asset('./assets/js/gijgo.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('./assets/js/wow.min.js')}}"></script>
		<script src="{{asset('./assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('./assets/js/jquery.magnific-popup.js')}}"></script>

        <!-- Breaking New Pluging -->
        <script src="{{asset('./assets/js/jquery.ticker.js')}}"></script>
        <script src="{{asset('./assets/js/site.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset('./assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('./assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('./assets/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('./assets/js/contact.js')}}"></script>
        <script src="{{asset('./assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('./assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('./assets/js/mail-script.js')}}"></script>
        <script src="{{asset('./assets/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('./assets/js/plugins.js')}}"></script>
        <script src="{{asset('./assets/js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        
        <script src="{{asset('//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if(session('crear')=='ok')
        <script>
            Swal.fire(
            'Registro completo!',
            'Tu proyecto se creó con éxito',
            'success')
        </script>
        @endif

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



        
    </body>
</html>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



        <script type="text/javascript">
        function detener(evt, contenedor){
            evt.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: "Este comentario se eliminará definitivamente!",
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

        function pausar(evt, contenedor){
            evt.preventDefault();
            Swal.fire({
            title: '¿Está seguro?',
            text: "Esta calificacion se eliminará, para que puedas asignar otra!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, cambiar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(contenedor).submit();
                //document.queryselector.All();
            }
            })


        };
</script>