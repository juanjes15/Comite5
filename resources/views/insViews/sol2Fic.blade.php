<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitar Comité - Ficha a la que pertenece el aprendiz') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.sol2Fic') }}">
                        @csrf
                        <div>
                            <x-label for="ficha_id" value="{{ __('Fichas') }}" />
                            <select name="ficha_id" id="ficha_id" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione una Ficha--</option>
                                @foreach ($fichas as $ficha)
                                    <option value="{{ $ficha->id }}">
                                        {{ $ficha->fic_codigo }} - {{ $ficha->programa->pro_nombre }}</option>
                                @endforeach
                            </select>
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
