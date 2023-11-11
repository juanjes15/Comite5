<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitud #') . $solicitud->id . ' - Normas Infringidas por el Aprendiz' }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <x-label value="{{ __('Capitulos') }}" />
                    <select id="_capitulo" class="bg-white rounded-md block w-full p-1.5 my-2">
                        @foreach ($capitulos as $capitulo)
                            <option value="{{ $capitulo->id }}">{{ $capitulo->cap_numero }} -
                                {{ $capitulo->cap_descripcion }}</option>
                        @endforeach
                    </select>
                    <form method="POST" action="{{ route('insViews.revFal', $solicitud) }}">
                        @csrf
                        <div>
                            <x-label for="articulo_id" value="{{ __('Articulos') }}" />
                            <select name="articulo_id" id="_articulo"
                                class="bg-white rounded-md block w-full p-1.5 my-2"></select>
                        </div>
                        <div>
                            <x-label for="numeral_id" value="{{ __('Numerales') }}" />
                            <select name="numeral_id" id="_numeral"
                                class="bg-white rounded-md block w-full p-1.5 my-2"></select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Agregar norma infringida') }}
                            </x-button>
                        </div>
                    </form>
                    <h2 class="mt-6 mb-2 font-semibold">Artículos infringidos en esta solicitud</h2>
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
                                <th scope="col" class="px-6 py-3">
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
                                    <td class="px-6 py-4 text-center">
                                        <form method="POST"
                                            action="{{ route('insViews.revArt', ['solicitud' => $solicitud, 'articulo' => $articulo]) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar este articulo?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                        {{ __('No se encontraron articulos infringidos') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <h2 class="mt-6 mb-2 font-semibold">Numerales infringidos en esta solicitud</h2>
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
                                <th scope="col" class="px-6 py-3">
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
                                    <td class="px-6 py-4 text-center">
                                        <form method="POST"
                                            action="{{ route('insViews.revNum', ['solicitud' => $solicitud, 'numeral' => $numeral]) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar este numeral?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                        {{ __('No se encontraron numerales infringidos') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="flex mt-4">
                        <x-linkb href="{{ route('insViews.revDet', $solicitud) }}" class="mx-3">Atras</x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_capitulo').addEventListener('change', (e) => {
        fetch('/instructor/articulos', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.json()
        }).then(data => {
            var opciones = "<option value=''>Escoja un artículo</option>";
            for (let i in data.lista) {
                opciones += '<option value="' + data.lista[i].id + '">' + data.lista[i].art_numero +
                    ' - ' + data.lista[i].art_descripcion + '</option>';
            }
            document.getElementById("_articulo").innerHTML = opciones;
        }).catch(error => console.error(error));
    })

    document.getElementById('_articulo').addEventListener('change', (e) => {
        fetch('/instructor/numerals', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.json()
        }).then(data => {
            if (data.lista[0] != null) {
                var opciones = "<option value=''>Escoja un numeral</option>";
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id + '">' + data.lista[i]
                        .num_descripcion + '</option>';
                }
            } else {
                var opciones = "<option value=''>No se encontraron numerales</option>";
            }
            document.getElementById("_numeral").innerHTML = opciones;
        }).catch(error => console.error(error));
    })
</script>
