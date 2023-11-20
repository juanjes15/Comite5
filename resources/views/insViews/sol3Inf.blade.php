<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitar Comité - Información Básica') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.sol3Inf') }}">
                        @csrf
                        <div>
                            <x-label for="sol_lugar" value="{{ __('Lugar') }}" />
                            <x-input id="sol_lugar" class="block mt-1 w-full" type="text" name="sol_lugar"
                                :value="old('sol_lugar')" required autofocus autocomplete="sol_lugar" />
                        </div>
                        <div>
                            <x-label for="sol_motivo" value="{{ __('Motivo') }}" />
                            <x-input id="sol_motivo" class="block mt-1 w-full" type="text" name="sol_motivo"
                                :value="old('sol_motivo')" required autofocus autocomplete="sol_motivo" />
                        </div>
                        <div>
                            <x-label for="sol_descripcion" value="{{ __('Descripción') }}" />
                            <x-input id="sol_descripcion" class="block mt-1 w-full" type="text"
                                name="sol_descripcion" :value="old('sol_descripcion')" required autofocus
                                autocomplete="sol_descripcion" />
                        </div>
                        <div>
                            <x-label for="sol_observacion" value="{{ __('Observaciones') }}" />
                            <x-input id="sol_observacion" class="block mt-1 w-full" type="text"
                                name="sol_observacion" :value="old('sol_observacion')" autofocus autocomplete="sol_observacion" />
                        </div>
                        <input type="text" name="sol_estado" hidden value="Solicitado">
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Siguiente') }}
                            </x-button>
                            <x-linkb href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
