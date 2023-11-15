<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Detalles de la solicitud #') . $solicitud->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="my-2 text-lg font-semibold">Información Básica</h1>
                        <form method="POST" action="{{ route('insViews.updInf', $solicitud) }}">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-label for="created_at" value="{{ __('Fecha y hora de la solicitud') }}" />
                                <x-input id="created_at" type="datetime-local" name="created_at" :value="$solicitud->created_at"
                                    autofocus disabled autocomplete="created_at" />
                            </div>
                            <div>
                                <x-label for="sol_lugar" value="{{ __('Lugar de los hechos') }}" />
                                <x-input id="sol_lugar" type="text" name="sol_lugar" :value="$solicitud->sol_lugar" required
                                    autofocus autocomplete="sol_lugar" />
                                <x-input-error class="mt-2" :messages="$errors->get('sol_lugar')" />
                            </div>
                            <div>
                                <x-label for="sol_motivo" value="{{ __('Motivo de la solicitud') }}" />
                                <x-input id="sol_motivo" type="text" name="sol_motivo" :value="$solicitud->sol_motivo" required
                                    autofocus autocomplete="sol_motivo" />
                                <x-input-error class="mt-2" :messages="$errors->get('sol_motivo')" />
                            </div>
                            <div>
                                <x-label for="sol_descripcion" value="{{ __('Descripción de la solicitud') }}" />
                                <x-input id="sol_descripcion" type="text" name="sol_descripcion" :value="$solicitud->sol_descripcion"
                                    required autofocus autocomplete="sol_descripcion" />
                                <x-input-error class="mt-2" :messages="$errors->get('sol_descripcion')" />
                            </div>
                            <div class="flex mt-4">
                                <x-button>
                                    {{ __('Editar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Instructores involucrados en esta solicitud</h1>
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-mint2">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Identificación
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombres
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-mint1">
                                @forelse ($instructors as $instructor)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $instructor->ins_identificacion }}
                                        </td>
                                        <td class="px-6 py-4 truncate max-w-xs">
                                            {{ $instructor->ins_nombres }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $instructor->ins_apellidos }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b">
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            {{ __('No se encontraron instructores en esta solicitud') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <x-link class="mx-3 mt-3" href="{{ route('insViews.revIns', $solicitud) }}">
                            Editar Instructores Involucrados</x-link>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Aprendices involucrados en esta solicitud</h1>
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-mint2">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Identificación
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombres
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-mint1">
                                @forelse ($aprendizs as $aprendiz)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $aprendiz->apr_identificacion }}
                                        </td>
                                        <td class="px-6 py-4 truncate max-w-xs">
                                            {{ $aprendiz->apr_nombres }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $aprendiz->apr_apellidos }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b">
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            {{ __('No se encontraron aprendices en esta solicitud') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <x-link class="mx-3 mt-3" href="{{ route('insViews.revApr', $solicitud) }}">
                            Editar Aprendices Involucrados</x-link>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-4 text-lg font-semibold">Normas infringidas en esta solicitud</h1>
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
                        <x-link class="mx-3 mt-3" href="{{ route('insViews.revFal', $solicitud) }}">
                            Editar Normas Infringidas</x-link>
                    </div>

                    <div class="bg-sena-100 p-6 rounded-lg mb-6">
                        <h1 class="mb-2 text-lg font-semibold">Material probatorio de esta solicitud</h1>
                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('insViews.updPru', $prueba) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-label for="pru_tipo" value="{{ __('Tipo de prueba(s)') }}" />
                                <x-input id="pru_tipo" class="block mt-1 w-full" type="text" name="pru_tipo"
                                    :value="$prueba->pru_tipo" required autofocus autocomplete="pru_tipo" />
                                <x-input-error class="mt-2" :messages="$errors->get('pru_tipo')" />
                            </div>
                            <div>
                                <x-label for="pru_descripcion"
                                    value="{{ __('Breve descripción de la(s) prueba(s)') }}" />
                                <x-input id="pru_descripcion" class="block mt-1 w-full" type="text"
                                    name="pru_descripcion" :value="$prueba->pru_descripcion" required autofocus
                                    autocomplete="pru_descripcion" />
                                <x-input-error class="mt-2" :messages="$errors->get('pru_descripcion')" />
                            </div>
                            <div>
                                <x-label for="pru_fecha" value="{{ __('Fecha y hora de los sucesos') }}" />
                                <x-input id="pru_fecha" class="block mt-1 w-full" type="datetime-local"
                                    name="pru_fecha" :value="$prueba->pru_fecha" required autofocus autocomplete="pru_fecha" />
                                <x-input-error class="mt-2" :messages="$errors->get('pru_fecha')" />
                            </div>
                            <div>
                                <x-label for="pru_lugar" value="{{ __('Lugar de los hechos') }}" />
                                <x-input id="pru_lugar" class="block mt-1 w-full" type="text" name="pru_lugar"
                                    :value="$prueba->pru_lugar" required autofocus autocomplete="pru_lugar" />
                                <x-input-error class="mt-2" :messages="$errors->get('pru_lugar')" />
                            </div>
                            <div class="bg-sena-200 p-2 rounded-lg my-2">
                                <x-label for="pru_url" value="{{ __('Archivo') }}" />
                                <x-link2 href="{{ route('insViews.dowPru', $prueba) }}">Descargar</x-link2>
                                @if (session('error'))
                                    <div class="text-red-500">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <x-input id="pru_url" class="block mt-1 w-full" type="file" name="pru_url"
                                    value="" autofocus autocomplete="pru_url" />
                                <x-input-error class="mt-2" :messages="$errors->get('pru_url')" />
                            </div>
                            <input type="text" name="solicitud_id" hidden value="{{ $solicitud->id }}">
                            <div class="flex mt-4">
                                <x-button>
                                    {{ __('Editar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
