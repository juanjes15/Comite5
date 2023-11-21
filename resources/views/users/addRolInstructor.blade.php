<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Relaciona el usuario con un instructor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('users.storeRolInstructor', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="instructor_id" value="{{ __('Instructores') }}" />
                            <select name="instructor_id" id="instructor_id"
                                class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione un Instructor--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">
                                        {{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="user" hidden value="{{ $user->id }}">
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Guardar') }}
                            </x-button>
                            <x-linkb href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
