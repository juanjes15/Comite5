<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar artículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('articulos.update', $articulo) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="art_numero" value="{{ __('Número') }}" />
                            <x-input id="art_numero" type="text" name="art_numero" :value="$articulo->art_numero" required
                                autofocus autocomplete="art_numero" />
                        </div>
                        <div>
                            <x-label for="art_descripcion" value="{{ __('Descripción') }}" />
                            <x-input id="art_descripcion" type="text" name="art_descripcion" :value="$articulo->art_descripcion"
                                required autofocus autocomplete="art_descripcion" />
                        </div>
                        <div>
                            <x-label for="capitulo_id" value="{{ __('Capitulo') }}" />
                            <select name="capitulo_id" class="bg-white rounded-md block w-full p-1.5">
                                @foreach ($capitulos as $capitulo)
                                    @if ($capitulo->id == $articulo->capitulo_id)
                                        <option selected value="{{ $capitulo->id }}">{{ $capitulo->cap_numero }} -
                                            {{ $capitulo->cap_descripcion }}
                                        </option>
                                    @else
                                        <option value="{{ $capitulo->id }}">{{ $capitulo->cap_numero }} -
                                            {{ $capitulo->cap_descripcion }}
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
