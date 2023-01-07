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
    <header id="header">
        <div class="container">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href={{('dashboard')}}>Home</a></li>
                    <li><a href={{('categories') }}>Categories</a></li>
                    <li><a href={{('foods') }}>Foods</a></li>
                    <li><a href={{('chiefs') }}>Chiefs</a></li>
                    <li class="menu-has-children"><a href={{('users') }}>Users Menu</a>
                        <ul>
                            <li><a href={{('users') }}>Users</a></li>
                            <li><a href={{'roles'}}>Role Users</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <!-- Header End -->

    <!-- Welcome Section Start -->
    <div id="welcome">
        <div class="container">
            <h3>Welcome to Italian Cuisine</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida sollicitudin turpis id posuere. Fusce nec rhoncus nibh. Fusce arcu libero, euismod eget commodo at, venenatis a nisi. Sed faucibus metus sed leo vulputate blandit.</p>

        </div>
    </div>
    <!-- Welcome Section End -->

    <!-- About Section Start-->
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

{{--    <!-- Testimonials Section Start -->--}}
{{--    <section id="testimonials" class="section-bg wow fadeInUp">--}}
{{--        <div class="container">--}}
{{--            <div class="section-header">--}}
{{--                <h3>Our Food Lovers</h3>--}}
{{--            </div>--}}

{{--            <div class="owl-carousel testimonials-carousel">--}}
{{--                <div class="row testimonial-item">--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="img">--}}
{{--                            <img src="{{asset('img/testimonial-1.jpg')}}" class="testimonial-img" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-8">--}}
{{--                        <div class="testimonial-content">--}}
{{--                            <div class="content">--}}
{{--                                <h4>Jamie Boyd</h4>--}}
{{--                                <h5>VIP Client</h5>--}}
{{--                                <p>--}}
{{--                                    <i class="fa fa-quote-left"></i>--}}
{{--                                    Commodo sed hendrerit id, posuere tempus odio. Phasellus vel leo aliquam, interdum massa quis, aliquam sapien. Aliquam erat volutpat. Etiam nec feugiat libero. Phasellus in ipsum nunc.--}}
{{--                                    <i class="fa fa-quote-right"></i>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row testimonial-item">--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="img">--}}
{{--                            <img src="{{asset('img/testimonial-2.jpg')}}" class="testimonial-img" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-8">--}}
{{--                        <div class="testimonial-content">--}}
{{--                            <div class="content">--}}
{{--                                <h4>Albert Cerrato</h4>--}}
{{--                                <h5>Regular Client</h5>--}}
{{--                                <p>--}}
{{--                                    <i class="fa fa-quote-left"></i>--}}
{{--                                    Proin ut dui dictum ligula condimentum cursus. Ut orci arcu, commodo sed hendrerit id, posuere tempus odio. Phasellus vel leo aliquam, interdum massa quis, aliquam sapien. Aliquam erat volutpat--}}
{{--                                    <i class="fa fa-quote-right"></i>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row testimonial-item">--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="img">--}}
{{--                            <img src="{{asset('img/testimonial-3.jpg')}}" class="testimonial-img" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-8">--}}
{{--                        <div class="testimonial-content">--}}
{{--                            <div class="content">--}}
{{--                                <h4>Theresa Wood</h4>--}}
{{--                                <h5>VIP Client</h5>--}}
{{--                                <p>--}}
{{--                                    <i class="fa fa-quote-left"></i>--}}
{{--                                    Dictum ligula condimentum cursus commodo sed hendrerit id, posuere tempus odio. Phasellus vel leo aliquam, interdum massa quis, aliquam sapien. Aliquam erat volutpat. Etiam nec ultricies semper risus.--}}
{{--                                    <i class="fa fa-quote-right"></i>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Testimonials Section End -->--}}


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
