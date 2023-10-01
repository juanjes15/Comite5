<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar capítulo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('capitulos.update', $capitulo) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="cap_numero" value="{{ __('Número') }}" />
                            <x-input id="cap_numero" type="text" name="cap_numero" :value="$capitulo->cap_numero" required
                                autofocus autocomplete="cap_numero" />
                        </div>
                        <div>
                            <x-label for="cap_descripcion" value="{{ __('Descripción') }}" />
                            <x-input id="cap_descripcion" type="text" name="cap_descripcion" :value="$capitulo->cap_descripcion"
                                required autofocus autocomplete="cap_descripcion" />
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
