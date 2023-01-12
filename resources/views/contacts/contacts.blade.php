
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
    <!-- Cart Section Start -->
    @can('contact us')
        <section id="cart">
            <div class="container">
                <header class="section-header">
                    <h3>Contacts List</h3>
                </header>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Contact Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                @foreach ($contacts as $x)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $x->name }}</td>
                                        <td>{{ $x->email }}</td>
                                        <td>{{ $x->subject }}</td>
                                        <td>{{ $x->message }}</td>
                                        <td>
                                            <a data-id="{{ $x->id }}"
                                               data-name="{{ $x->name }}"
                                               data-message="{{ $x->message }}"
                                               data-toggle="modal"
                                               href="#deletecontact"
                                               title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- delete -->
                        <div class="modal" tabindex="-1" role="dialog" id="deletecontact">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('contacts.destroy',$contacts[0]->id)}}"method="post" >
                                        {{ method_field('delete') }}
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="">
                                            <label for="exampleFormControlInput1">Contact Name</label>
                                            <input type="text" class="form-control" id="name"name="name" placeholder="Contact Name">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="Message" id="message" name="message"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-block btn-addcategory">Confirm Delete</button>
                                            <button type="button" class="btn btn-block btn-cancel_category" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
    <!-- Cart Section End -->

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
            <div class="row">

                <div class="col-md-12">
                    <div class="contact-form">
                        <form action="{{route('contacts.store')}}"method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required="required" id="name" name="name"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" required="required" id="email" name="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" required="required"id="subject" name="subject" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message" required="required" id="message" name="message"></textarea>
                            </div>
                            @can('contact send message btn')
                            <div><button type="submit">Send Message</button></div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
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
        <!-- Main Javascript File -->
        <script src="{{asset('js/main.js')}}"></script>
    <!-- Footer Start -->
    @extends('footer')
    <!-- Footer End -->
    <script>
        $('#deletecontact').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var message = button.data('message')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
            modal.find('.modal-content .form-group #message').val(message);
        });
    </script>



    </body>
    </html>

</x-app-layout>

