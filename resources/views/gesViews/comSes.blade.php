<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Sesión Comité #') . $comite->id . ' - Instructor: ' . $comite->solicitud->aprendizs[0]->ficha->instructor->ins_nombres . ' ' . $comite->solicitud->aprendizs[0]->ficha->instructor->ins_apellidos }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="my-2 text-lg font-semibold">Información de la Solicitud</h1>
                        <div>
                            <x-label for="created_at" value="{{ __('Fecha y hora de la solicitud') }}" />
                            <x-input id="created_at" type="datetime-local" name="created_at" :value="$comite->solicitud->created_at" disabled
                                autocomplete="created_at" />
                        </div>
                        <div>
                            <x-label for="sol_lugar" value="{{ __('Lugar de los hechos') }}" />
                            <x-input id="sol_lugar" type="text" name="sol_lugar" :value="$comite->solicitud->sol_lugar" disabled
                                autocomplete="sol_lugar" />
                        </div>
                        <div>
                            <x-label for="sol_motivo" value="{{ __('Motivo de la solicitud') }}" />
                            <x-input id="sol_motivo" type="text" name="sol_motivo" :value="$comite->solicitud->sol_motivo" disabled
                                autocomplete="sol_motivo" />
                        </div>
                        <div>
                            <x-label for="sol_descripcion" value="{{ __('Descripción de la solicitud') }}" />
                            <x-input id="sol_descripcion" type="text" name="sol_descripcion" :value="$comite->solicitud->sol_descripcion"
                                disabled autocomplete="sol_descripcion" />
                        </div>
                        <div>
                            <x-label for="sol_observacion" value="{{ __('Observaciones') }}" />
                            <x-input id="sol_observacion" type="text" name="sol_observacion" :value="$comite->solicitud->sol_observacion"
                                disabled autocomplete="sol_observacion" />
                        </div>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-4 text-lg font-semibold">Normas infringidas</h1>
                        <h2 class="mb-2 font-semibold">Artículos infringidos</h2>
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-mint2">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Número
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripción
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Capitulo
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-mint1">
                                @forelse ($articulos as $articulo)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $articulo->art_numero }}
                                        </td>
                                        <td class="px-6 py-4 truncate max-w-xs">
                                            {{ $articulo->art_descripcion }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $articulo->capitulo->cap_numero }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b">
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            {{ __('No se encontraron articulos infringidos') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h2 class="mt-6 mb-2 font-semibold">Numerales infringidos</h2>
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-mint2">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Artículo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripción
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Categoría
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Falta
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-mint1">
                                @forelse ($numerals as $numeral)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $numeral->articulo->art_numero }}
                                        </td>
                                        <td class="px-6 py-4 truncate max-w-xs">
                                            {{ $numeral->num_descripcion }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $numeral->num_categoria }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $numeral->num_tipoFalta }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b">
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            {{ __('No se encontraron numerales infringidos') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Material probatorio</h1>
                        <div>
                            <x-label for="pru_tipo" value="{{ __('Tipo de prueba(s)') }}" />
                            <x-input id="pru_tipo" class="block mt-1 w-full" type="text" name="pru_tipo"
                                :value="$prueba->pru_tipo" disabled autocomplete="pru_tipo" />
                        </div>
                        <div>
                            <x-label for="pru_descripcion" value="{{ __('Breve descripción de la(s) prueba(s)') }}" />
                            <x-input id="pru_descripcion" class="block mt-1 w-full" type="text"
                                name="pru_descripcion" :value="$prueba->pru_descripcion" disabled autocomplete="pru_descripcion" />
                        </div>
                        <div>
                            <x-label for="pru_fecha" value="{{ __('Fecha y hora de los sucesos') }}" />
                            <x-input id="pru_fecha" class="block mt-1 w-full" type="datetime-local" name="pru_fecha"
                                :value="$prueba->pru_fecha" disabled autocomplete="pru_fecha" />
                        </div>
                        <div>
                            <x-label for="pru_lugar" value="{{ __('Lugar de los hechos') }}" />
                            <x-input id="pru_lugar" class="block mt-1 w-full" type="text" name="pru_lugar"
                                :value="$prueba->pru_lugar" disabled autocomplete="pru_lugar" />
                        </div>
                        <div>
                            <x-label for="pru_url" value="{{ __('Archivo') }}" />
                            <x-link2 href="{{ route('gesViews.dowPru', $prueba) }}">Descargar</x-link2>
                            @if (session('error'))
                                <div class="text-red-500">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Descargos de los instructores</h1>
                        @foreach ($instructors as $instructor)
                            <form method="POST"
                                action="{{ route('gesViews.comIns', ['comite' => $comite, 'instructor' => $instructor]) }}">
                                @csrf
                                @method('PUT')
                                <div>
                                    <x-label for="is_descargo"
                                        value="{{ $instructor->ins_nombres . ' ' . $instructor->ins_apellidos }}" />
                                    <textarea id="is_descargo" rows="4" name="is_descargo" required autofocus autocomplete="is_descargo"
                                        class="block mt-1 p-2.5 w-full rounded-md shadow-sm">{{ $instructor->InstructorSolicitud->is_descargo ?? '' }}</textarea>
                                </div>
                                <div class="flex mt-4">
                                    <x-button>
                                        {{ __('Guardar') }}
                                    </x-button>
                                </div>
                            </form>
                        @endforeach
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Descargos de los aprendices</h1>
                        @foreach ($aprendizs as $aprendiz)
                            <form method="POST"
                                action="{{ route('gesViews.comApr', ['comite' => $comite, 'aprendiz' => $aprendiz]) }}">
                                @csrf
                                @method('PUT')
                                <div>
                                    <x-label for="as_descargo"
                                        value="{{ $aprendiz->apr_nombres . ' ' . $aprendiz->apr_apellidos }}" />
                                    <textarea id="as_descargo" rows="4" name="as_descargo" required autofocus autocomplete="as_descargo"
                                        class="block mt-1 p-2.5 w-full rounded-md shadow-sm">{{ $aprendiz->AprendizSolicitud->as_descargo ?? '' }}</textarea>
                                </div>
                                <div class="flex mt-4">
                                    <x-button>
                                        {{ __('Guardar') }}
                                    </x-button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Recomendación</h1>
                        <form method="POST" action="{{ route('gesViews.comRec', $comite) }}">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-label for="com_recomendacion" value="{{ __('Recomendación del Comité') }}" />
                                <textarea id="com_recomendacion" rows="3" name="com_recomendacion" required autofocus
                                    autocomplete="com_recomendacion" class="block mt-1 p-2.5 w-full rounded-md shadow-sm">{{ $comite->com_recomendacion }}</textarea>
                            </div>
                            <div class="flex mt-4">
                                <x-button>
                                    {{ __('Guardar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                    <div class="flex mt-4">
                        <x-link href="{{ route('gesViews.comFin', $comite) }}" class="mx-3">Finalizar</x-link>
                        <x-linkb href="{{ route('gesViews.comAll') }}" class="mx-3">Atrás</x-linkb>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
