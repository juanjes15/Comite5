<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Crear programa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('programas.store') }}">
                        @csrf
                        <div>
                            <x-label for="pro_codigo" value="{{ __('Código') }}" />
                            <x-input id="pro_codigo" type="text" name="pro_codigo" :value="old('pro_codigo')" required
                                autofocus autocomplete="pro_codigo" />
                        </div>
                        <div>
                            <x-label for="pro_nombre" value="{{ __('Nombre') }}" />
                            <x-input id="pro_nombre" type="text" name="pro_nombre" :value="old('pro_nombre')" required
                                autofocus autocomplete="pro_nombre" />
                        </div>
                        <div>
                            <x-label for="pro_nivelFormacion" value="{{ __('Nivel de Formación') }}" />
                            <x-input id="pro_nivelFormacion" type="text" name="pro_nivelFormacion" :value="old('pro_nivelFormacion')"
                                required autofocus autocomplete="pro_nivelFormacion" />
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Crear') }}
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
