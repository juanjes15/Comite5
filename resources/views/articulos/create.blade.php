<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear articulo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('articulos.store') }}">
                        @csrf
                        <div>
                            <x-label for="art_numero" value="{{ __('Numero') }}" />
                            <x-input id="art_numero" class="block mt-1 w-full" type="text" name="art_numero"
                                :value="old('art_numero')" required autofocus autocomplete="art_numero" />
                        </div>
                        <div>
                            <x-label for="art_descripcion" value="{{ __('Descripcion') }}" />
                            <x-input id="art_descripcion" class="block mt-1 w-full" type="text"
                                name="art_descripcion" :value="old('art_descripcion')" required autofocus
                                autocomplete="art_descripcion" />
                        </div>
                        <div>
                            <x-label for="cap_id" value="{{ __('Capitulo') }}" />
                            <select name="cap_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione un Capitulo--</option>
                                @foreach ($capitulos as $capitulo)
                                    <option value="{{ $capitulo->id }}">{{ $capitulo->cap_numero }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Crear') }}
                            </x-button>
                            <x-link href="{{ route('articulos.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
