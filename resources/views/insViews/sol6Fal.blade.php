<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitud #') . $solicitud_id . ' - Normas Infringidas por el Aprendiz' }}
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
                    <form method="POST" action="{{ route('insViews.sol6Fal') }}">
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

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_capitulo').addEventListener('change', (e) => {
        fetch('articulos', {
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
        fetch('numerals', {
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
