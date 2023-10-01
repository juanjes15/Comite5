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
                            <x-input id="num_categoria" type="text" name="num_categoria" :value="$numeral->num_categoria" required
                                autofocus autocomplete="num_categoria" />
                        </div>
                        <div>
                            <x-label for="num_tipoFalta" value="{{ __('Tipo de Falta') }}" />
                            <x-input id="num_tipoFalta" type="text" name="num_tipoFalta" :value="$numeral->num_tipoFalta" required
                                autofocus autocomplete="num_tipoFalta" />
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
