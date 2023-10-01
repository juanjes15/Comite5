<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar instructor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('instructors.update', $instructor) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="ins_identificacion" value="{{ __('Identificacion') }}" />
                            <x-input id="ins_identificacion" type="text" name="ins_identificacion" :value="$instructor->ins_identificacion"
                                required autofocus autocomplete="ins_identificacion" />
                        </div>
                        <div>
                            <x-label for="ins_nombres" value="{{ __('Nombres') }}" />
                            <x-input id="ins_nombres" type="text" name="ins_nombres" :value="$instructor->ins_nombres" required
                                autofocus autocomplete="ins_nombres" />
                        </div>
                        <div>
                            <x-label for="ins_apellidos" value="{{ __('Apellidos') }}" />
                            <x-input id="ins_apellidos" type="text" name="ins_apellidos" :value="$instructor->ins_apellidos" required
                                autofocus autocomplete="ins_apellidos" />
                        </div>
                        <div>
                            <x-label for="ins_email" value="{{ __('Email') }}" />
                            <x-input id="ins_email" type="text" name="ins_email" :value="$instructor->ins_email" required autofocus
                                autocomplete="ins_email" />
                        </div>
                        <div>
                            <x-label for="ins_telefono" value="{{ __('Telefono') }}" />
                            <x-input id="ins_telefono" type="text" name="ins_telefono" :value="$instructor->ins_telefono" required
                                autofocus autocomplete="ins_telefono" />
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
