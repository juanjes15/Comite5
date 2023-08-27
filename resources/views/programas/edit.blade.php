<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar programa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('programas.update', $programa) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="pro_codigo" value="{{ __('Código') }}" />
                            <x-input id="pro_codigo" class="block mt-1 w-full" type="text" name="pro_codigo"
                                :value="$programa->pro_codigo" required autofocus autocomplete="pro_codigo" />
                        </div>
                        <div>
                            <x-label for="pro_nombre" value="{{ __('Nombre') }}" />
                            <x-input id="pro_nombre" class="block mt-1 w-full" type="text" name="pro_nombre"
                                :value="$programa->pro_nombre" required autofocus autocomplete="pro_nombre" />
                        </div>
                        <div>
                            <x-label for="pro_nivelFormacion" value="{{ __('Nivel de Formación') }}" />
                            <x-input id="pro_nivelFormacion" class="block mt-1 w-full" type="text"
                                name="pro_nivelFormacion" :value="$programa->pro_nivelFormacion" required autofocus
                                autocomplete="pro_nivelFormacion" />
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('programas.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
