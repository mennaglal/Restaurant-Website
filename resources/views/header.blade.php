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
@endcan
