
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
    <header id="header">
        <div class="container">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li ><a href={{('dashboard')}}>Home</a></li>
                    <li ><a href={{('categories') }}>Categories</a></li>
                    <li><a href={{('foods') }}>Foods</a></li>
                    <li class="menu-active"><a href={{('chiefs') }}>Chiefs</a></li>
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
    <section id="team">
        <div class="container">
            <header class="section-header">
                <h3>Chief Menu</h3>
            </header>
            <a href="#newchief" data-toggle="modal"><button class="btn btn-block btn-addcategory">+Add Chief</button></a>

            <br>

            <div class="modal" tabindex="-1" role="dialog" id="newchief">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Chief</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('chiefs.store')}}"method="post" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chief Name</label>
                                <input type="text" class="form-control" id="name"name="name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chief Facebook Link</label>
                                <input type="text" class="form-control" id="facebook_link"name="facebook_link" placeholder="Enter Chief Facebook Link">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chief Twitter Link</label>
                                <input type="text" class="form-control" id="twitter_link"name="twitter_link" placeholder="Enter Chief Twitter Link">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chief Instagram Link</label>
                                <input type="text" class="form-control" id="instagram_link"name="instagram_link" placeholder="Enter Chief Instagram Link">
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
                @foreach ($chiefs as $x)
                    <div class="col-sm-6 col-md-3">
                        <div class="single-team">
                            <img class="img-fluid" src="img/{{$x->image}}">
                            <h4>{{$x->name}}</h4>
                            <ul class="icon">
                                <li><a href="{{$x->twitter_link}}" class="fa fa-twitter"></a></li>
                                <li><a href="{{$x->facebook_link}}" class="fa fa-facebook"></a></li>
                                <li><a href="{{$x->instagram_link}}" class="fa fa-instagram"></a></li>
                            </ul>
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
                <h3>Cart</h3>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Facebook Link</th>
                                <th scope="col">Twitter Link</th>
                                <th scope="col">Instagram Link</th>
                                <th scope="col">Delete/Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($chiefs as $x)
                                    <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td><img src="img/{{$x->image}}"></td>
                                    <td>{{ $x->facebook_link }}</td>
                                    <td>{{ $x->twitter_link }}</td>
                                    <td>{{ $x->instagram_link }}</td>
                                    <td>
                                        <a data-id="{{ $x->id }}"
                                           data-name="{{ $x->name }}"
{{--                                           data-image="{{ $x->image }}"--}}
                                           data-facebook_link="{{ $x->facebook_link }}"
                                           data-twitter_link="{{ $x->twitter_link }}"
                                           data-instagram_link="{{ $x->instagram_link }}"
                                           data-toggle="modal"
                                           href="#editchief" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a data-id="{{ $x->id }}"
                                           data-name="{{ $x->name }}"
                                           data-toggle="modal" href="#deletechief" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" tabindex="-1" role="dialog" id="editchief" aria-hidden="true" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Chief</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <form action="{{route('chiefs.update',$chiefs[0]->id)}}"method="post" >
                                {{ method_field('patch') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chief Name</label>
                                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Chief Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chief Facebook Link</label>
                                    <input type="text" class="form-control" id="facebook_link"name="facebook_link" placeholder="Enter Chief Facebook Link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chief Twitter Link</label>
                                    <input type="text" class="form-control" id="twitter_link"name="twitter_link" placeholder="Enter Chief Twitter Link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chief Instagram Link</label>
                                    <input type="text" class="form-control" id="instagram_link"name="instagram_link" placeholder="Enter Chief Instagram Link">
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
                <div class="modal" tabindex="-1" role="dialog" id="deletechief">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Chief Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('chiefs.destroy',$chiefs[0]->id)}}"method="post" >
                                {{ method_field('delete') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                </div>
                                <div class="form-group">
{{--                                    <input type="hidden" name="id" id="id" value="">--}}
                                    <label for="exampleFormControlInput1">Chief Name</label>
                                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Chief Name">
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

    <script>
        $('#editchief').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            // var image = button.data('image')
            var description = button.data('description')
            var twitter_link = button.data('twitter_link')
            var facebook_link = button.data('facebook_link')
            var instagram_link = button.data('instagram_link')

            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
            modal.find('.modal-content .form-group #description').val(description);
            modal.find('.modal-content .form-group #twitter_link').val(twitter_link);
            modal.find('.modal-content .form-group #facebook_link').val(facebook_link);
            modal.find('.modal-content .form-group #instagram_link').val(instagram_link);
            // modal.find('#image').val(image);
        })
    </script>

    <script>
        $('#deletechief').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
        })
    </script>

    <!-- Footer Start -->
    @extends('footer');
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @extends('footer_scripts');

    </body>
    </html>

</x-app-layout>

