<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Creación del plan de mejoramiento - Comité #') . $comite->id . ' - Instructor: ' . $comite->solicitud->aprendizs[0]->ficha->instructor->ins_nombres . ' ' . $comite->solicitud->aprendizs[0]->ficha->instructor->ins_apellidos }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('gesViews.plaIni') }}">
                        @csrf
                        <div>
                            <x-label for="pla_fechaInicio" value="{{ __('Fecha y hora para el nuevo comité') }}" />
                            <x-input id="pla_fechaInicio" class="block mt-1 w-full" type="date" name="pla_fechaInicio"
                                :value="old('pla_fechaInicio')" autocomplete="pla_fechaInicio" />
                        </div>
                        <div>
                            <x-label for="pla_fechaFin" value="{{ __('Fecha y hora para el nuevo comité') }}" />
                            <x-input id="pla_fechaFin" class="block mt-1 w-full" type="date" name="pla_fechaFin"
                                :value="old('pla_fechaFin')" autocomplete="pla_fechaFin" />
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
