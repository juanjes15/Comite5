<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitar Comité - Instructores involucrados') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.sol4Ins') }}">
                        @csrf
                        <div>
                            <x-label for="instructor_id" value="{{ __('Instructores') }}" />
                            <select name="instructor_id[]" id="instructor_id"
                                class="bg-white rounded-md block w-full p-1.5 my-2">
                                <option value="ss">--Seleccione Instructores--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">
                                        {{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <button
                                class="mr-3 inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                type="button" id="addInstructor">Agregar Instructor</button>
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
    // Código JavaScript para agregar instructores dinámicamente
    $(document).ready(function() {
        $('#addInstructor').click(function() {
            // Clonar el campo de selección y agregarlo al formulario
            var cloneSelect = $('#instructor_id').clone();
            $('#instructor_id').after(cloneSelect);
        });
    });
</script>
