
<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Categories</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
        @if (Route::has('login'))
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
                            <li ><a href={{('dashboard')}}>Home</a></li>
                        @endcan
                        @can('categories')
                            <li><a href={{('categories') }}>Categories</a></li>
                        @endcan
                        @can('foods')
                            <li><a href={{('foods') }}>Foods</a></li>
                        @endcan
                        @can('chiefs')
                            <li ><a href={{('chiefs') }}>Chiefs</a></li>
                        @endcan
                        @can('online order page')
                            <li><a href={{('orders') }}>Order</a></li>
                        @endcan
                        @can('contact page')
                            <li class="menu-active"><a href={{('contacts') }}>Contact Us</a></li>
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
    @endcan

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Contact Section Start -->
    <section id="contact">
        <div class="container">
            <div class="section-header">
                <h3>Contact Us</h3>
            </div>

            <div class="row contact-detail">
                @can('opening hours')
                <div class="col-md-6">
                    <div class="contact-col-1">
                        <div class="contact-hours">
                            <h4>Opening Hours</h4>
                            <p>Monday-Friday: 7am to 12am</p>
                            <p>Saturday: 5pm to 12am</p>
                            <p>Sunday: 9am to 12am</p>
                        </div>
                    </div>
                </div>
                @endcan
                @can('contact info')
                <div class="col-md-6">
                    <div class="contact-col-2">
                        <div class="contact-info">
                            <h4>Contact Info</h4>
                            <p>4137  State Street, CA, USA</p>
                            <p><a href="tel:+1-234-567-8900">+1-234-567-8900</a></p>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
             @can('contact us')
            <div class="row">
                <div class="col-md-6">
                    @can('map')
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d12623.52751148822!2d-122.47260557388145!3d37.72245039905841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s220%2C+San+Francisco%2C+California%2C+USA!5e0!3m2!1sen!2sbd!4v1555690883913!5m2!1sen!2sbd" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    @endcan
                </div>

                <div class="col-md-6">
                    <div class="contact-form">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" required="required" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" required="required" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message" required="required" ></textarea>
                            </div>
                            @can('contact send message btn')
                            <div><button type="submit">Send Message</button></div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </section>
    <!-- Contact Section End -->


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
    {{--    <!-- Main Javascript File -->--}}
    {{--    <script src="{{asset('js/main.js')}}"></script>--}}

    <!-- Footer Start -->
    @extends('footer');
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @extends('footer_scripts');

    </body>
    </html>

</x-app-layout>

