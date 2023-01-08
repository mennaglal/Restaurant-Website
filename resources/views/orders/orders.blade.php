
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
                            <li><a href={{('chiefs') }}>Chiefs</a></li>
                        @endcan
                        @can('online order page')
                            <li class="menu-active"><a href={{('orders') }}>Order</a></li>
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
    @endcan
    <!-- Header End -->
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
    <!-- Menu Section Start -->
    @can('delicious food menu')
    <section id="food-menu">
        <div class="container">
            <header class="section-header">
                <h3>Delicious Food Menu</h3>
            </header>
            <div class="row">
                @foreach ($foods as $x)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="single-menu">
                            <img class="img-fluid" src="img/{{$x->image}}" />
                            <div>{{ $x->price }}</div>
                            <h4>{{ $x->name }}</h4>
                            <a href="order.html">Order Now</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    @endcan
    <!-- Menu Section End-->
    <!-- Cart Section Start -->
    @can('online order cart',)
    <section id="cart">
        <div class="container">
            <header class="section-header">
                <h3>Orders</h3>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Lorem ipsum</th>
                                <td>$10</td>
                                <td><div class="quantity"><input type="text" value="1"></div></td>
                                <td>$10</td>
                                <td><a href=""><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Proin Tortor</th>
                                <td>$15</td>
                                <td><div class="quantity"><input type="text" value="2"></div></td>
                                <td>$30</td>
                                <td><a href=""><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Aliquam Erat</th>
                                <td>$20</td>
                                <td><div class="quantity"><input type="text" value="3"></div></td>
                                <td>$60</td>
                                <td><a href=""><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @can('online order checkout btn')
                    <div class="button">
                        <button type="submit">Checkout</button>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </section>
    @endcan
    <!-- Cart Section End -->

    <!-- Checkout Section Start -->
    @can('online order checkout btn')
    <section id="checkout">
        <div class="container">
            <header class="section-header">
                <h3>Checkout</h3>
            </header>
            <div class="row form">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="City" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="State" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Zip" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cards">
                        <p>We Accept:</p>
                        <img src="img/credit-cards.png" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name on Card" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Credit card number" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Exp Month" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Exp Year" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="CVV" />
                        </div>
                    </div>
                </div>
                @can('online order placeorder btn')
                <div class="button">
                    <button type="submit">Place Order</button>
                </div>
                @endcan
            </div>
        </div>
    </section>
    @endcan
    <!-- Checkout Section End -->
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
    {{--    <!-- Main Javascript File -->--}}
    {{--    <script src="{{asset('js/main.js')}}"></script>--}}




    </body>
    </html>

</x-app-layout>

