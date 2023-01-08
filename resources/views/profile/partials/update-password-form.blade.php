<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
<section class="profile_section">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password"
                          name="current_password"
                          type="password"
                          class="input_login mt-1 block w-full"
                          autocomplete="current-password"
                          placeholder="Enter Your Current Password"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password"
                          name="password"
                          type="password"
                          class="input_login mt-1 block w-full"
                          autocomplete="new-password"
                          placeholder="Enter Your New Password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation"
                          name="password_confirmation"
                          type="password"
                          class="input_login mt-1 block w-full"
                          autocomplete="new-password"
                          placeholder="Confirm Your New Password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <div><button type="submit"> {{ __('Save') }}</button></div>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
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
