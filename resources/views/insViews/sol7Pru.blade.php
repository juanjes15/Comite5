<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitud #') . $solicitud_id . ' - Pruebas' }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.sol7Pru') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="pru_tipo" value="{{ __('Tipo de prueba(s)') }}" />
                            <x-input id="pru_tipo" class="block mt-1 w-full" type="text" name="pru_tipo"
                                :value="old('pru_tipo')" required autofocus autocomplete="pru_tipo" />
                        </div>
                        <div>
                            <x-label for="pru_descripcion" value="{{ __('Breve descripción de la(s) prueba(s)') }}" />
                            <x-input id="pru_descripcion" class="block mt-1 w-full" type="text"
                                name="pru_descripcion" :value="old('pru_descripcion')" required autofocus
                                autocomplete="pru_descripcion" />
                        </div>
                        <div>
                            <x-label for="pru_fecha" value="{{ __('Fecha y hora de los sucesos') }}" />
                            <x-input id="pru_fecha" class="block mt-1 w-full" type="datetime-local" name="pru_fecha"
                                :value="old('pru_fecha')" required autofocus autocomplete="pru_fecha" />
                        </div>
                        <div>
                            <x-label for="pru_lugar" value="{{ __('Lugar de los hechos') }}" />
                            <x-input id="pru_lugar" class="block mt-1 w-full" type="text" name="pru_lugar"
                                :value="old('pru_lugar')" required autofocus autocomplete="pru_lugar" />
                        </div>
                        <div>
                            <x-label for="pru_url" value="{{ __('Archivo') }}" />
                            <x-input id="pru_url" class="block mt-1 w-full" type="file" name="pru_url"
                                :value="old('pru_url')" required autofocus autocomplete="pru_url" />
                        </div>
                        <input type="text" name="solicitud_id" hidden value="{{ $solicitud_id }}">
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Finalizar') }}
                            </x-button>
                            <x-linkb href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                    </form>
                    <p class="mt-4">Al finalizar, podrás revisar la solicitud y corregir errores, <br> o eliminar la
                        solicitud antes de que sea aceptada</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
