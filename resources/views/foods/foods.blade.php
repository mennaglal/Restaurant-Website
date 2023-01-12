
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
                            <li class="menu-active"><a href={{('foods') }}>Foods</a></li>
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
    <section id="food-menu">
        <div class="container">
            <header class="section-header">
                <h3>Food Menu</h3>
            </header>
            @can('add food')
            <a href="#newfood" data-toggle="modal"><button class="btn btn-block btn-addcategory">+Add Food</button></a>
            @endcan
            <br>
            <!---add new food -->
            <div class="modal" tabindex="-1" role="dialog" id="newfood">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Food</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('foods.store')}}"method="post" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Category Name</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="" selected disabled> --Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Food Name</label>
                                <input type="text" class="form-control" id="name"name="name" placeholder="Enter Food Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description"name="description" rows="3"placeholder="Enter Food Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Price</label>
                                <input type="text" class="form-control" id="price"name="price" placeholder="Enter Food Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantity</label>
                                <input type="text" class="form-control" id="quantity"name="quantity" placeholder="Enter Food Quantity">
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
                @foreach ($foods as $x)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="single-menu">
                            <img class="img-fluid" src="img/{{$x->image}}" />
                            <div>{{ $x->price }}</div>
                            <h4>{{ $x->name }}</h4>
{{--                            <a href="#">Add To Cart</a >--}}
                        </div>
                    </div>
                @endforeach

            </div>
            <a class="btn btn-block btn-addcategory" data-toggle="modal"  href="#create_order">Create Order</a >
            <!-- create order -->
            <div class="modal" tabindex="-1" role="dialog" id="create_order">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create New Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            {{csrf_field()}}
                            <?php
                                $emptyArray = [[]];
                                ?>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">food Name</label>
                                <select name="id" id="id" class="form-control" required>
                                    <option value="" selected disabled> --Select Food--</option>
                                    @foreach ($foods as $food)
                                        <option value="{{ $food->id }}">{{ $food->name }}</option>
                                    @endforeach
                                </select>
                                <input id="selectedid" name="selectedid" type="hidden">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantity</label>
                                <input type="text" class="form-control" id="quantity"name="quantity" placeholder="Enter Food Quantity">
                            </div>
                            <p> The value of the option selected is:
                                <?php
                                    array_push($emptyArray, array('laravel', 'codeigniter'));
                                    //print_r($emptyArray) ;
                                    ?>

                                <span class="output"></span>
                            </p>


                            <button onclick="getOption()" type="submit"> Check option </button>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-block btn-addcategory">Order Now</button>
                                <button type="button" class="btn btn-block btn-cancel_category" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <?php
                            // Submit user input data for 2D array
//                            if (isset($_POST['submit'])) {
//
//                                // POST submitted data
//                                $dimention1 = $_POST["selectedid"];
//
//                                // POST submitted data
//                                $dimention2 = $_POST["quantity"];
//
//                                echo "Entered 2d nxn: " . $dimention1
//                                    . "x" . $dimention2 . " <br>";
//                                $d = [];
//                                $k = 0;
//
//                                for($row = 0; $row < $dimention1; $row++) {
//                                    for ($col = 0; $col < $dimention2; $col++) {
//                                        $d[$row][$col]= $k++;
//                                    }
//                                }
//
//                                for ($row = 0; $row < $dimention1; $row++) {
//                                    for ($col = 0; $col < $dimention2; $col++) {
//                                        echo $d[$row][$col]." ";
//                                    }
//                                    echo "<br>";
//                                }
//                            }
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Menu Section End-->
    <!-- Cart Section Start -->
    @can('show food')
    <section id="cart">
        <div class="container">
            <header class="section-header">
                <h3>Foods List</h3>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Image</th>
                                @can('update food')
                                <th scope="col">Delete/Edit</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($foods as $x)
                                    <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->category->name }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->description }}</td>
                                    <td>{{ $x->price }}</td>
                                    <td>{{ $x->quantity }}</td>
                                    <td><img src="img/{{$x->image}}"></td>
                                    @can('update food')
                                    <td>
                                        @can('update food')
                                        <a data-id="{{ $x->id }}"
                                           data-category_name="{{ $x->category->name }}"
                                           data-name="{{ $x->name }}"
                                           data-description="{{ $x->description }}"
                                           data-price="{{ $x->price}}"
                                           data-quantity="{{ $x->quantity }}"
                                           data-toggle="modal"
                                           href="#editfood" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('delete food')
                                        <a data-id="{{ $x->id }}"
                                           data-category_name="{{ $x->category->name }}"
                                           data-name="{{ $x->name }}"
                                           data-description="{{ $x->description }}"
                                           data-toggle="modal" href="#deletefood" title="Delete"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- edit food-->
                <div class="modal" tabindex="-1" role="dialog" id="editfood">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Food</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <form action="{{route('foods.update',$foods[0]->id)}}"method="post" >
                                {{ method_field('patch') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="exampleFormControlInput1">Category Name</label>
                                    <input type="text" class="form-control" id="category_name"name="category_name" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Food Name</label>
                                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Food Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="description"name="description" rows="3"placeholder="Enter Food Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Price</label>
                                    <input type="text" class="form-control" id="price"name="price" placeholder="Enter Food Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantity</label>
                                    <input type="text" class="form-control" id="quantity"name="quantity" placeholder="Enter Food Quantity">
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

                <!-- delete food-->
                <div class="modal" tabindex="-1" role="dialog" id="deletefood">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Food Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('foods.destroy',$foods[0]->id)}}"method="post" >
                                {{ method_field('delete') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="exampleFormControlInput1">Food Name</label>
                                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Food Name">
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
    @endcan
    <!-- Cart Section End -->

    <!-- Footer Start -->
    @extends('footer');
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
    <script type="text/javascript">
        function getOption() {
            selectElement = document.querySelector('#id');
            output = selectElement.value;
            document.querySelector('#selectedid').value = output;

            var key_value = {};
            $('#selectedid').each(function(){
                key_value[$(this).attr('name')]= $(this).val();
            })
            alert(JSON.stringify(key_value));
        }
    </script>
    <script>
        $('#editfood').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            // var image = button.data('image')
            var price = button.data('price')
            var quantity = button.data('quantity')
            var category_name = button.data('category_name')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
            modal.find('.modal-content .form-group #description').val(description);
            // modal.find('.modal-content .form-group #image').val(image);
            modal.find('.modal-content .form-group #price').val(price);
            modal.find('.modal-content .form-group #quantity').val(quantity);
            modal.find('.modal-content .form-group #category_name').val(category_name);
        });
        $('#deletefood').on('show.bs.modal', function(event) {
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

