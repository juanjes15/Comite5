<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar comite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('comites.update', $comite) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="com_acta" value="{{ __('Acta') }}" />
                            <x-input id="com_acta" class="block mt-1 w-full" type="text" name="com_acta"
                                :value="$comite->com_acta" required autofocus autocomplete="com_acta" />
                        </div>
                        <div>
                            <x-label for="com_estado" value="{{ __('Estado') }}" />
                            <x-input id="com_estado" class="block mt-1 w-full" type="text"
                                name="com_estado" :value="$comite->com_estado" required autofocus
                                autocomplete="com_estado" />
                        </div>
                        <div>
                            <x-label for="com_fecha" value="{{ __('Fecha') }}" />
                            <x-input id="com_fecha" class="block mt-1 w-full" type="date" name="com_fecha"
                                :value="$comite->com_fecha" required autofocus autocomplete="com_fecha" />
                        </div>
                        <div>
                            <x-label for="com_recomendacion" value="{{ __('Recomendacion') }}" />
                            <x-input id="com_recomendacion" class="block mt-1 w-full" type="text" name="com_recomendacion"
                                :value="$comite->com_recomendacion" required autofocus autocomplete="com_recomendacion" />
                        </div>
                        <div>
                            <x-label for="sol_id" value="{{ __('Solicitud') }}" />
                            <select name="sol_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($solicitudComites as $solicitudComite)
                                    @if ($solicitudComite->id == $comite->sol_id)
                                        <option selected value="{{ $solicitudComite->id }}">{{ $solicitudComite->sol_asunto }}
                                        </option>
                                    @else
                                        <option value="{{ $solicitudComite->id }}">{{ $solicitudComite->sol_asunto }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('comites.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
