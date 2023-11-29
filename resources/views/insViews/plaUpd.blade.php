<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar plan de mejoramiento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.storePla', $plan) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="pla_fechaInicio"
                                value="{{ __('Fecha de inicio del plan de mejoramiento') }}" />
                            <x-input id="pla_fechaInicio" type="date" name="pla_fechaInicio" :value="$plan->pla_fechaInicio"
                                required autofocus autocomplete="pla_fechaInicio" />
                        </div>
                        <div>
                            <x-label for="pla_fechaFin"
                                value="{{ __('Fecha límite para este plan de mejoramiento') }}" />
                            <x-input id="pla_fechaFin" type="date" name="pla_fechaFin" :value="$plan->pla_fechaFin" required
                                autofocus autocomplete="pla_fechaFin" />
                        </div>
                        <div>
                            <x-label for="pla_descripcion"
                                value="{{ __('Descripción de la actividad a desarrollar') }}" />
                            <x-input id="pla_descripcion" type="text" name="pla_descripcion" :value="$plan->pla_descripcion"
                                required autofocus autocomplete="pla_descripcion" />
                        </div>
                        <div class="bg-sena-200 p-2 rounded-lg my-2">
                            <x-label for="pla_url" value="{{ __('Archivo') }}" />
                            <x-link2 href="{{ route('insViews.dowPla', $plan) }}">Descargar</x-link2>
                            @if (session('error3'))
                                <div class="text-red-500">
                                    {{ session('error3') }}
                                </div>
                            @endif
                            <x-input id="pla_url" class="block mt-1 w-full" type="file" name="pla_url"
                                value="" autofocus autocomplete="pla_url" />
                        </div>
                        <input type="text" name="pla_estado" hidden value="Activo">
                        <input type="text" name="comite_id" hidden value="{{ $plan->comite_id }}">
                        <input type="text" name="instructor_id" hidden value="{{ $plan->instructor_id }}">
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
