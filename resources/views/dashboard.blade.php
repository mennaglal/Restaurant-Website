<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Pacifico" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

        <!-- Main Stylesheet File -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    </head>

    <body>

    <!-- Top Header Start -->
    <section id="top-header">
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" />
        </div>
        @if (!Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
            @else
                <a href="{{ route('login') }}"><button class="btn-login">Login</button></a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><button class="btn-login">Register</button></a>
                @endif
            @endauth
        @endif
    </section>
    <!-- Top Header End -->
    <!-- Header Start -->
    @can('home navbar')

    <header id="header">
        <div class="container">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    @can('home')
                    <li class="menu-active"><a href={{('dashboard')}}>Home</a></li>
                    @endcan
                    @can('categories')
                    <li><a href={{('categories') }}>Categories</a></li>
                    @endcan
                    @can('foods')
                    <li><a href={{('foods') }}>Foods</a></li>
                    @endcan
                    @can('chiefs')
                    <li><a href={{('chiefs') }}>Chiefs</a></li>
                    @endcan
                    @can('online order page')
                    <li><a href={{('orders') }}>Order</a></li>
                    @endcan
                    @can('contact page')
                    <li><a href={{('contacts') }}>Contact Us</a></li>
                    @endcan
                    @can('users')
                    <li class="menu-has-children"><a href={{('users') }}>Users Menu</a>
                        <ul>
                            <li><a href={{('users') }}>Users</a></li>
                            <li><a href={{'roles'}}>Role Users</a></li>
                        </ul>
                    </li>
                    @endcan

                </ul>
            </nav>
        </div>
    </header>
    <!-- Header End -->
    @endcan
    <!-- Welcome Section Start -->
    @can('home welcome')
    <div id="welcome">
        <div class="container">
            <h3>Welcome to Italian Cuisine</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida sollicitudin turpis id posuere. Fusce nec rhoncus nibh. Fusce arcu libero, euismod eget commodo at, venenatis a nisi. Sed faucibus metus sed leo vulputate blandit.</p>

        </div>
    </div>
    <!-- Welcome Section End -->
    @endcan

    <!-- About Section Start-->
    @can('home about us')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-col-left"></div>
                </div>

                <div class="col-md-6">
                    <div class="about-col-right">
                        <header class="section-header">
                            <h3>About Us</h3>
                        </header>
                        <ul class="icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-whatsapp"></a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam convallis quam sed tincidunt accumsan. Aliquam at tincidunt tortor, ac porta turpis. Curabitur lacinia venenatis semper.
                        </p>
                        <p>
                            Aliquam ut nibh ut lacus posuere facilisis. Vestibulum ullamcorper arcu et bibendum ultrices. Suspendisse rutrum turpis vitae.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End-->
    @endcan

    <!-- Footer Start -->
    @extends('footer')

    <!-- Footer End -->
    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js" integrity="sha512-DfYvPq8dRtcMvBM5HQqofz2dx7bzKBsvWc5X1apElb28ekQIrH98r6iysAKss5QO6tbY6pRV6RNp2DHeZFy+Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/easing/easing.min.js')}}"></script>
    <script src="{{asset('vendor/stickyjs/sticky.js')}}"></script>
    <script src="{{asset('vendor/superfish/hoverIntent.js')}}"></script>
    <script src="{{asset('vendor/superfish/superfish.min.js')}}"></script>
    <script src="{{asset('vendor/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('vendor/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Main Javascript File -->
    <script src="{{asset('js/main.js')}}"></script>

    </body>
    </html>

</x-app-layout>
