
<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Categories</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        @extends('header')
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
                    <li><a href={{('categories') }}>Categories</a></li>
                    <li class="menu-active"><a href={{('foods') }}>Foods</a></li>
                    <li><a href={{('chiefs') }}>Chiefs</a></li>

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
                <h3>Food Menu</h3>
            </header>
            <a href="#newfood" data-toggle="modal"><button class="btn btn-block btn-addcategory">+Add Food</button></a>

            <br>

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
                                <th scope="col">Category Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Image</th>
                                <th scope="col">Delete/Edit</th>
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
                                <td>
                                    <a data-id="{{ $x->id }}"
                                       data-category_name="{{ $x->category->name }}"
                                       data-name="{{ $x->name }}"
                                       data-description="{{ $x->description }}"
                                       data-image="{{ $x->image }}"
                                       data-price="{{ $x->price}}"
                                       data-quantity="{{ $x->quantity }}"
                                       data-toggle="modal"
                                       href="#editfood" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a data-id="{{ $x->id }}"
                                       data-category_name="{{ $x->category->name }}"
                                       data-name="{{ $x->name }}"
                                       data-description="{{ $x->description }}"
                                       data-toggle="modal" href="#deletefood" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- edit -->
                <div class="modal fade" tabindex="-1" role="dialog" id="editcfood" aria-hidden="true" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Food</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <form action="{{route('categories.update',$foods[0]->id)}}"method="post" >
                                {{ method_field('patch') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Category Name</label>
                                    <input type="text" class="form-control" id="category_name"name="category_name" placeholder="Enter Food Quantity">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name"name="name" placeholder="Enter Food Name">
                                    <input type="hidden" name="id" id="id" value="">
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
                                    <button type="submit" class="btn btn-block btn-addcategory">Save changes</button>
                                    <button type="button" class="btn btn-block btn-cancel_category" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <!-- delete -->
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
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Category Id</label>
                                    <input type="text" class="form-control" id="category_id"name="category_id" placeholder="Enter Food Quantity">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
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
    <script>
        $('#editcategory').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var image = button.data('image')
            var price = button.data('price')
            var quantity = button.data('quantity')
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
            modal.find('.modal-content .form-group #description').val(description);
            modal.find('.modal-content .form-group #image').val(image);
            modal.find('.modal-content .form-group #price').val(price);
            modal.find('.modal-content .form-group #quantity').val(quantity);
            modal.find('.modal-content .form-group #category_id').val(category_id);
        })
    </script>

    <script>
        $('#deletecategory').on('show.bs.modal', function(event) {
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var image = button.data('image')
            var price = button.data('price')
            var quantity = button.data('quantity')
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-content .form-group #id').val(id);
            modal.find('.modal-content .form-group #name').val(name);
            modal.find('.modal-content .form-group #description').val(description);
            modal.find('.modal-content .form-group #image').val(image);
            modal.find('.modal-content .form-group #price').val(price);
            modal.find('.modal-content .form-group #quantity').val(quantity);
            modal.find('.modal-content .form-group #category_id').val(category_id);
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


<!---->
<!--<div class="modal fade" id="editCategoryModal" aria-labelledby="editModalLabel"-->
<!--                            aria-hidden="true">-->
<!--                            <div class="modal-dialog modal-dialog-centered">-->
<!--                                <div class="modal-content">-->
<!--                                    <div class="modal-header bg-light p-3">-->
<!--                                        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>-->
<!--                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"-->
<!--                                            id="close-modal"></button>-->
<!--                                    </div>-->
<!--                                    <form id="EditForm">-->
<!--    @csrf-->
<!--                                        <div class="modal-body">-->
<!--                                            <input type="hidden" name="categoryname_eid" id="categoryname_eid">-->
<!--                                            <div class="mb-3 form-group">-->
<!--                                                <label for="categoryname_efield" class="form-label">Category Name</label>-->
<!--                                                <input type="text" name="categoryname_efield" id="categoryname_efield" class="form-control" placeholder="Enter Category Name" />-->
<!--                                            </div>-->
<!--</div>-->
<!--                                        <div class="modal-footer">-->
<!--                                            <div class="hstack gap-2 justify-content-end">-->
<!--                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>-->
<!--                                                <button type="submit" class="btn btn-success">Update</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </form>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--<script>-->
<!---->
<!--function editCategory(e) {-->
<!--var categoryId  = e.id;-->
<!--var categoryName  = e.category_name;-->
<!---->
<!--$("#categoryname_eid").val(categoryId);-->
<!--$("#categoryname_efield").val(categoryName);-->
<!--$('#editCategoryModal').modal('show');-->
<!--}-->
<!---->
<!--$('body').on('submit', '#EditForm', function(e){-->
<!--let id = $('#categoryname_eid').val();-->
<!--let data = {-->
<!--id : id,-->
<!--categoryName : $('#categoryname_efield').val(),-->
<!--}-->
<!--let url = window.location.origin;-->
<!--let path = url + '/categories/update' + '/'  + id;-->
<!---->
<!--axios.post(path, data)-->
<!--.then( res => {-->
<!--console.log(res)-->
<!--})-->
<!--.catch( err => console.log(err));-->
<!--})-->
<!--</script>-->

