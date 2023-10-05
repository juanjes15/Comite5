<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Crear numeral') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('numerals.store') }}">
                        @csrf
                        <div>
                            <x-label for="num_descripcion" value="{{ __('Descripción') }}" />
                            <textarea id="num_descripcion" rows="4" name="num_descripcion" required autofocus autocomplete="num_descripcion"
                                class="block mt-1 p-2.5 w-full rounded-md shadow-sm" :value="old('num_categoria')"></textarea>
                        </div>
                        <div>
                            <x-label for="num_categoria" value="{{ __('Categoria') }}" />
                            <select name="num_categoria" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione una categoría--</option>
                                <option value="Académica">Académica</option>
                                <option value="Disciplinaria">Disciplinaria</option>
                            </select>
                        </div>
                        <div>
                            <x-label for="num_tipoFalta" value="{{ __('Tipo de Falta') }}" />
                            <select name="num_tipoFalta" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione el Tipo de Falta--</option>
                                <option value="Leve">Leve</option>
                                <option value="Grave">Grave</option>
                                <option value="Gravísima">Gravísima</option>
                            </select>
                        </div>
                        <div>
                            <x-label for="articulo_id" value="{{ __('Articulo') }}" />
                            <select name="articulo_id" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione un articulo--</option>
                                @foreach ($articulos as $articulo)
                                    <option value="{{ $articulo->id }}">{{ $articulo->art_numero }} -
                                        {{ $articulo->art_descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Crear') }}
                            </x-button>
                            <x-linkb class="mx-3" href="{{ url()->previous() }}">Atras
                            </x-linkb>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
