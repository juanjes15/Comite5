<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Imágen de perfil') }}
        </h2>

        <img width="50" height="50" class="rounded-full" src="{{ "/storage/$user->avatar" }}" alt="avatar">

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Añadir o modificar tu imágen de perfil.') }}
        </p>
    </header>

    @if (session('message'))
        <div class="text-red-500">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="avatar" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"
                required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
