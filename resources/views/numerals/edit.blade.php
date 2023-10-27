<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar numeral') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('numerals.update', $numeral) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="num_descripcion" value="{{ __('Descripción') }}" />
                            <textarea id="num_descripcion" rows="4" name="num_descripcion" required autofocus autocomplete="num_descripcion"
                                class="block mt-1 p-2.5 w-full rounded-md shadow-sm">{{ $numeral->num_descripcion }}</textarea>
                        </div>
                        <div>
                            <x-label for="num_categoria" value="{{ __('Categoria') }}" />
                            <select name="num_categoria" class="bg-white rounded-md block w-full p-1.5">
                                <option value="Académica" @if ($numeral->num_categoria === 'Académica') selected @endif>Académica
                                </option>
                                <option value="Disciplinaria" @if ($numeral->num_categoria === 'Disciplinaria') selected @endif>
                                    Disciplinaria
                                </option>
                            </select>
                        </div>
                        <div>
                            <x-label for="num_tipoFalta" value="{{ __('Tipo de Falta') }}" />
                            <select name="num_tipoFalta" class="bg-white rounded-md block w-full p-1.5">
                                <option value="Leve" @if ($numeral->num_tipoFalta === 'Leve') selected @endif>Leve
                                </option>
                                <option value="Grave" @if ($numeral->num_tipoFalta === 'Grave') selected @endif>Grave
                                </option>
                                <option value="Gravísima" @if ($numeral->num_tipoFalta === 'Gravísima') selected @endif>Gravísima
                                </option>
                            </select>
                        </div>
                        <div>
                            <x-label for="articulo_id" value="{{ __('Articulo') }}" />
                            <select name="articulo_id" class="bg-white rounded-md block w-full p-1.5">
                                @foreach ($articulos as $articulo)
                                    @if ($articulo->id == $numeral->articulo_id)
                                        <option selected value="{{ $articulo->id }}">{{ $articulo->art_numero }} -
                                            {{ $articulo->art_descripcion }}
                                        </option>
                                    @else
                                        <option value="{{ $articulo->id }}">{{ $articulo->art_numero }} -
                                            {{ $articulo->art_descripcion }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
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
