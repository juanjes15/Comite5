<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Comité - Creación y citación') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('gesViews.comIni') }}">
                        @csrf
                        <div>
                            <x-label for="com_fecha" value="{{ __('Fecha y hora para el nuevo comité') }}" />
                            <x-input id="com_fecha" class="block mt-1 w-full" type="datetime-local" name="com_fecha"
                                :value="old('com_fecha')" required autofocus autocomplete="com_fecha" />
                        </div>
                        <div>
                            <x-label for="com_lugar"
                                value="{{ __('Lugar o salón donde se llevará a cabo el comité') }}" />
                            <x-input id="com_lugar" class="block mt-1 w-full" type="text" name="com_lugar"
                                :value="old('com_lugar')" required autofocus autocomplete="com_lugar" />
                        </div>
                        <input type="text" name="com_estado" hidden value="Iniciado">
                        <input type="text" name="solicitud_id" hidden value="{{ $solicitud->id }}">
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Enviar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
