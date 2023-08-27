<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear capitulo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('capitulos.store') }}">
                        @csrf
                        <div>
                            <x-label for="cap_numero" value="{{ __('Numero') }}" />
                            <x-input id="cap_numero" class="block mt-1 w-full" type="text" name="cap_numero"
                                :value="old('cap_numero')" required autofocus autocomplete="cap_numero" />
                        </div>
                        <div>
                            <x-label for="cap_descripcion" value="{{ __('Descripcion') }}" />
                            <x-input id="cap_descripcion" class="block mt-1 w-full" type="text"
                                name="cap_descripcion" :value="old('cap_descripcion')" required autofocus
                                autocomplete="cap_descripcion" />
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Crear') }}
                            </x-button>
                            <x-link href="{{ route('capitulos.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
