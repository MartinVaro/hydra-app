<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Hydra Home </title>
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
            @if (Route::has('login'))
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

            <a class="navbar-brand ps-3" href="/" style="color:#51ff00; font-size: 15px;">Home</a>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="navbar-brand ps-3" href="{{ route('login') }}" style="color:#050505; font-size: 15px;">Log in</a></li>
                        @if (Route::has('register'))
                        <li><a class="navbar-brand ps-3" href="{{ route('register') }}" style="color:#050505; font-size: 15px;">Registrarse</a>
                        @endif
                    </ul>
                </li>
            </ul>
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
               <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                    <div class="sticky-logo">
                                        <a href="/"><img src="assets/img/logo/hydrablack.png" alt=""></a>
                                    </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>                  
                                        <ul id="navigation">  
                                            <li><a href="/categoria/ambiente"style="color:#0db851;">Ambiente</a></li>
                                            <li><a href="/categoria/universo"style="color:#0db851;">Universo</a></li>
                                            <li><a href="/categoria/educacion"style="color:#0db851;">Educación</a></li>
                                            <li><a href="/categoria/sustentable" style="color:#0db851;">Sustentable</a></li>
                                            <li><a href="/categoria/tecnologico"style="color:#0db851;">Tecnológico</a></li>
                                            <li><a href="/categoria/energia"style="color:#0db851;">Energía</a></li>
                                            <li><a href="/categoria/salud"style="color:#0db851;">Salud</a></li>
                                            <li><a href="/categoria/sociedad"style="color:#0db851;">Sociedad</a></li>
                                            </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="/search">
                                            <input type="text" id="buscar" name="buscar" placeholder="Buscar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>


    
    <main>
    <!-- Trending Area Start -->

@if (Route::has('login'))
    @auth
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Recomendados</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach ($preferencias as $proyecto)
                                    <li class="news-item">{{$proyecto->titulo}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        

                                    <?php $a=0; ?>
                                    @foreach ($preferencias as $proyecto)
                                        @if ($a==0)
                                        
                                        <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                            <div class="trend-top-cap">
                                                
                                        <span>{{$proyecto->titulo}}</span>
                                        <h2><a href="proyecto/{{$proyecto->id}}">{{$proyecto->abstracto}}</a></h2>
                                        

                                        
                                        @endif
                                    <?php $a=$a+1;?>
                                    @if($a==1)
                                        @break
                                    @endif
                                    @endforeach
                                
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                            <?php $a=0; ?>
                                @foreach ($preferencias as $proyecto)  
                                @if ($a>=1 && $a<=3) 
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color3"><a style="color:#000000;" href="proyecto/{{$proyecto->id}}" >{{$proyecto->titulo}}</a></span>
                                            <p>{{$proyecto->abstracto}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <?php
                                    $a=$a+1;
                                ?>
                                @if($a==4)
                                    @break
                                @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <?php $a=0; ?>
                        @foreach ($preferencias as $proyecto)
                        @if ($a>=4 && $a<=6)                
                        <div class="trand-right-single d-flex">
                                <div class="trand-right-img  mb-30"">
                                    <img src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color3"><a style="color:#000000;" href="proyecto/{{$proyecto->id}}" >{{$proyecto->titulo}}</a></span>
                                    <p>{{$proyecto->abstracto}}</p>
                                </div>
                        </div>
                        @endif 
                        <?php
                            $a=$a+1;
                        ?>
                        @if ($a==7)
                            @break
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach ($combined as $proyecto)
                                    <li class="news-item">{{$proyecto->titulo}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        

                                    <?php $a=0; ?>
                                    @foreach ($combined as $proyecto)
                                        @if ($a==0)
                                        
                                        <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                            <div class="trend-top-cap">
                                                
                                        <span>{{$proyecto->titulo}}</span>
                                        <h2><a href="proyecto/{{$proyecto->id}}">{{$proyecto->abstracto}}</a></h2>
                                        

                                        
                                        @endif
                                    <?php $a=$a+1;?>
                                    @if($a==1)
                                        @break
                                    @endif
                                    @endforeach
                                
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                            <?php $a=0; ?>
                                @foreach ($combined as $proyecto)  
                                @if ($a>=1 && $a<=3) 
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color3"><a style="color:#000000;" href="proyecto/{{$proyecto->id}}" >{{$proyecto->titulo}}</a></span>
                                            <p>{{$proyecto->abstracto}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <?php
                                    $a=$a+1;
                                ?>
                                @if($a==4)
                                    @break
                                @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <?php $a=0; ?>
                        @foreach ($combined as $proyecto)
                        @if ($a>=4 && $a<=6)                
                        <div class="trand-right-single d-flex">
                                <div class="trand-right-img  mb-30"">
                                    <img width="275px" src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color3"><a style="color:#000000;" href="proyecto/{{$proyecto->id}}" >{{$proyecto->titulo}}</a></span>
                                    <p>{{$proyecto->abstracto}}</p>
                                </div>
                        </div>
                        @endif 
                        <?php
                            $a=$a+1;
                        ?>
                        @if ($a==7)
                            @break
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endauth           
@endif

    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
           <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Nuevos Proyectos</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                        <?php $a=0; ?>
                            @foreach ($fechados as $proyecto)
                            @if ($a>=0 && $a<=5) 
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="{{Storage::disk('digitalocean')->url($proyecto->portada)}}" alt="">
                                </div>
                                <div class="weekly-caption"> 
                                    
                                    <span class="color3"><a style="color:#000000;" href="proyecto/{{$proyecto->id}}" >{{$proyecto->titulo}}</a></span>
                                    <p>{{$proyecto->abstracto}}</p>
                                </div>
                            </div>
                            @endif 
                            <?php
                            $a=$a+1;
                            ?>
                            @if ($a==6)
                                @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>           
    <!-- End Weekly-News -->
   

    <!-- End pagination  -->
    </main>
    
   <footer>
       <!-- Footer Start-->
       <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-2 col-sm-2">
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
       <!-- footer-bottom aera -->
   </footer>
   
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