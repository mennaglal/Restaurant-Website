
<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Categories</title>
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
    <header id="header">
        <div class="container">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li ><a href={{('dashboard')}}>Home</a></li>
                    <li class="menu-active"><a href={{('categories') }}>Categories</a></li>
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
    <section id="food-menu">
        <div class="container">
            <header class="section-header">
                <h3>Category Menu</h3>
            </header>
            <a href="#newcategory" data-toggle="modal"><button class="btn btn-block btn-addcategory">+Add Category</button></a>
            <br>

            <div class="modal" tabindex="-1" role="dialog" id="newcategory">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('categories.store')}}"method="post" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Category Name</label>
                                <input type="text" class="form-control" id="name"name="name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description"name="description" rows="3"placeholder="Enter Category Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-block btn-addcategory">Add && Save</button>
                                <button type="button" class="btn btn-block btn-cancel_category" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $x)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="single-menu">
                            <img class="img-fluid" src="img/{{$x->image}}" />
                            <h4>{{ $x->name }}</h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Menu Section End-->
    <!-- Cart Section Start -->

    <section id="cart">
        <div class="container">
            <header class="section-header">
                <h3>Categories</h3>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Delete/Edit</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($categories as $i=>$x)
                                <tr>
                                    <td>{{ $i+1}}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->description }}</td>
                                    <td><img src="img/{{$x->image}}"></td>

                                    <td>
                                        <button>
                                        <a data-id="{{ $x->id }}"
                                           data-name="{{ $x->name }}"
                                           data-description="{{ $x->description }}"
{{--                                           data-image="{{ $x->image }}"--}}
                                           data-toggle="modal"
                                           href="#editcategory"
                                           title="Edit"><i class="fa fa-edit"></i></a></button>
                                        <a data-id="{{ $x->id }}"
                                           data-name="{{ $x->name }}"
                                           data-toggle="modal"
                                           href="#deletecategory"
                                           title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal" tabindex="-1" role="dialog" id="editcategory">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <form action="{{route('categories.update',$categories[0]->id)}}"method="post" >
                                {{ method_field('patch') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label >Category Name</label>
                                    <input type="text" class="form-control" id="name"name="name"placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description"name="description" rows="3"placeholder="Enter Category Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="image" name="image"placeholder="Choose Category Image">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-block btn-addcategory">Save changes</button>
                                    <button type="button" class="btn btn-block btn-cancel_category" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                                <!-- delete -->
                <div class="modal" tabindex="-1" role="dialog" id="deletecategory">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Category Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('categories.destroy',$categories[0]->id)}}"method="post" >
                                {{ method_field('delete') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="exampleFormControlInput1">Category Name</label>
                                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Category Name">
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
    </section>
    <!-- Cart Section End -->
    <!-- Footer Start -->
    @extends('footer');
    <!-- Footer End -->

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
{{--    <script src="{{asset('js/main.js')}}"></script>--}}

    <script>
        $('#editcategory').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            // var image = button.data('image')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
            modal.find('.modal-content .form-group #description').val(description);
            // modal.find('.modal-content .form-group #image').val(image);
        });
        $('#deletecategory').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
        });
    </script>



    </body>
    </html>

</x-app-layout>

