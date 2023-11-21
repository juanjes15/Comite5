<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Relaciona el usuario con un aprendiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('users.storeRolAprendiz', $user) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="aprendiz_id" value="{{ __('Aprendices') }}" />
                            <select name="aprendiz_id" id="aprendiz_id" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione un Aprendiz--</option>
                                @foreach ($aprendizs as $aprendiz)
                                    <option value="{{ $aprendiz->id }}">
                                        {{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }}</option>
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
