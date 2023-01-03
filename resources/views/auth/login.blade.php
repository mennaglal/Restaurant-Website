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
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <section id="top-header">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="img/logo.png" /></a>
        </div>
    </section>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <section id="login">
            <div class="container">
                <div class="section-header">
                    <h3>Login</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-col-1">
                            <div class="login-form">
                                <form>
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <label for="email" :value="__('Email')">Email</label>
                                        <br>
                                        <x-text-input id="email"
                                                      class="input_login block mt-1 w-full"
                                                      type="email" name="email"
                                                      :value="old('email')"
                                                      placeholder="Enter Your Email"
                                                      required autofocus />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password" :value="__('Password')">Password</label>
                                        <br>
                                        <x-text-input id="password"
                                                      class="input_login block mt-1 w-full"
                                                      type="password"
                                                      name="password"
                                                      placeholder="Enter Your Password"
                                                      required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    </div>
                                    <!-- Remember Me -->
                                    <div class=" mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-black-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                            <span class="ml-2 text-sm text-black-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-end mt-4 ">

                                        <div><button type="submit"> {{ __('Log in') }}</button></div>
                                        @if (Route::has('password.request'))
                                            <a class="login_link mr-4 underline text-sm  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

        <!-- Password -->
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ml-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
    </form>
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

