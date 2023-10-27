<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar programa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('programas.update', $programa) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="pro_codigo" value="{{ __('Código') }}" />
                            <x-input id="pro_codigo" type="text" name="pro_codigo" :value="$programa->pro_codigo" required
                                autofocus autocomplete="pro_codigo" />
                        </div>
                        <div>
                            <x-label for="pro_nombre" value="{{ __('Nombre') }}" />
                            <x-input id="pro_nombre" type="text" name="pro_nombre" :value="$programa->pro_nombre" required
                                autofocus autocomplete="pro_nombre" />
                        </div>
                        <div>
                            <x-label for="pro_nivelFormacion" value="{{ __('Nivel de formación') }}" />
                            <select name="pro_nivelFormacion" class="bg-white rounded-md block w-full p-1.5">
                                <option value="Técnico" @if ($programa->pro_nivelFormacion === 'Técnico') selected @endif>Técnico
                                </option>
                                <option value="Tecnólogo" @if ($programa->pro_nivelFormacion === 'Tecnólogo') selected @endif>Tecnólogo
                                </option>
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
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
