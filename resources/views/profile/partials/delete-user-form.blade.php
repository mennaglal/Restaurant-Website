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
<section class="profile_delete space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <x-danger-button class="delete_btn"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="input_login mt-1 block w-3/4"
                    placeholder="Enter Your Password"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button class="cancel_btn" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="delete_btn ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
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

