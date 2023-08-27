<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear prueba') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('pruebas.store') }}">
                        @csrf
                        <div>
                            <x-label for="pru_tipo" value="{{ __('Tipo') }}" />
                            <x-input id="pru_tipo" class="block mt-1 w-full" type="text" name="pru_tipo"
                                :value="old('pru_tipo')" required autofocus autocomplete="pru_tipo" />
                        </div>
                        <div>
                            <x-label for="pru_descripcion" value="{{ __('Descripcion') }}" />
                            <x-input id="pru_descripcion" class="block mt-1 w-full" type="text"
                                name="pru_descripcion" :value="old('pru_descripcion')" required autofocus
                                autocomplete="pru_descripcion" />
                        </div>
                        <div>
                            <x-label for="pru_fecha" value="{{ __('Fecha') }}" />
                            <x-input id="pru_fecha" class="block mt-1 w-full" type="date" name="pru_fecha"
                                :value="old('pru_fecha')" required autofocus autocomplete="pru_fecha" />
                        </div>
                        <div>
                            <x-label for="pru_url" value="{{ __('URL') }}" />
                            <x-input id="pru_url" class="block mt-1 w-full" type="text" name="pru_url"
                                :value="old('pru_url')" required autofocus autocomplete="pru_url" />
                        </div>
                        <div>
                            <x-label for="sol_id" value="{{ __('Solicitud') }}" />
                            <select name="sol_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Seleccione una solicitud--</option>
                                @foreach ($solicitudComites as $solicitudComite)
                                    <option value="{{ $solicitudComite->id }}">{{ $solicitudComite->sol_asunto }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Crear') }}
                            </x-button>
                            <x-link href="{{ route('pruebas.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
