<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" value="{{ __('Nombre') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="$user->name" required autofocus autocomplete="name" />
                        </div>
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email"
                                :value="$user->email" required autofocus autocomplete="email" />
                        </div>
                        <div>
                            <x-label for="rol" value="{{ __('Nivel de Formación') }}" />
                            <x-input id="rol" class="block mt-1 w-full" type="text"
                                name="rol" :value="$user->rol" required autofocus
                                autocomplete="rol" />
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('users.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
