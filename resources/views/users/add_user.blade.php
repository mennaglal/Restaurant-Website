<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Edit Users</title>
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

    <section id="permission-menu">
        <div class="container">
            <button class="btn-show"><a id="link_btn_show" href="{{ route('users.index') }}">Back</a></button>
            <form action="{{route('users.store')}}"method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="">
                    <label for="exampleFormControlInput1">Username: <span class="tx-danger">*</span></label>
                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">E-mail: <span class="tx-danger">*</span></label>
                        <input type="email" class="form-control" id="email"name="email" placeholder="Enter E-mail">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password: <span class="tx-danger">*</span></label>
                    <input type="password" class="form-control" id="password"name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Confirm Password: <span class="tx-danger">*</span></label>
                    <input type="password" class="form-control" id="confirm-password"name="confirm-password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                <select name="status" id="status" class="form-control  nice-select  custom-select">
                    <option value="enable">enable</option>
                    <option value="disable">disable</option>
                </select>
                </div>
                <div class="form-group">
                    <label class="form-label">User Type: <span class="tx-danger">*</span></label>
                    {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-addcategory">Add && Save</button>
                    <button type="button" class="btn btn-block btn-cancel_category" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>

    </section>
    <!-- Menu Section End-->
    <!-- row -->

    <!-- row closed -->
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
