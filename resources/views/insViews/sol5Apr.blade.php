<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitud #') . $solicitud_id . ' - Aprendices involucrados' }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.sol5Apr') }}">
                        @csrf
                        <div>
                            <x-label for="aprendiz_id" value="{{ __('Aprendices') }}" />
                            <select name="aprendiz_id[]" id="aprendiz_id"
                                class="bg-white rounded-md block w-full p-1.5 my-2">
                                <option value="">--Seleccione Aprendices--</option>
                                @foreach ($aprendizs as $aprendiz)
                                    <option value="{{ $aprendiz->id }}">
                                        {{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-bbutton class="mr-3" id="addAprendiz">Agregar Aprendiz</x-bbutton>
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
    // Código JavaScript para agregar aprendices dinámicamente
    $(document).ready(function() {
        $('#addAprendiz').click(function() {
            // Clonar el campo de selección y agregarlo al formulario
            var cloneSelect = $('#aprendiz_id').clone();
            $('#aprendiz_id').after(cloneSelect);
        });
    });
</script>
