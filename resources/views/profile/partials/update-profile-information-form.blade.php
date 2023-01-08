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
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"
                          name="name"
                          type="text"
                          class="input_login mt-1 block w-full"
                          :value="old('name', $user->name)"
                          required autofocus autocomplete="name"
                          placeholder="Enter Your Name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          name="email"
                          type="email"
                          class="input_login mt-1 block w-full"
                          :value="old('email', $user->email)"
                          required autocomplete="email"
                          placeholder="Enter Your Email"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <div><button type="submit"> {{ __('Save') }}</button></div>

            @if (session('status') === 'profile-updated')
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
