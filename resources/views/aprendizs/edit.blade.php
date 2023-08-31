<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar aprendiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('aprendizs.update', $aprendiz) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="apr_identificacion" value="{{ __('Identificacion') }}" />
                            <x-input id="apr_identificacion" class="block mt-1 w-full" type="text"
                                name="apr_identificacion" :value="$aprendiz->apr_identificacion" required autofocus
                                autocomplete="apr_identificacion" />
                        </div>
                        <div>
                            <x-label for="apr_nombres" value="{{ __('Nombres') }}" />
                            <x-input id="apr_nombres" class="block mt-1 w-full" type="text" name="apr_nombres"
                                :value="$aprendiz->apr_nombres" required autofocus autocomplete="apr_nombres" />
                        </div>
                        <div>
                            <x-label for="apr_apellidos" value="{{ __('Apellidos') }}" />
                            <x-input id="apr_apellidos" class="block mt-1 w-full" type="text" name="apr_apellidos"
                                :value="$aprendiz->apr_apellidos" required autofocus autocomplete="apr_apellidos" />
                        </div>
                        <div>
                            <x-label for="apr_email" value="{{ __('Email') }}" />
                            <x-input id="apr_email" class="block mt-1 w-full" type="text" name="apr_email"
                                :value="$aprendiz->apr_email" required autofocus autocomplete="apr_email" />
                        </div>
                        <div>
                            <x-label for="apr_telefono" value="{{ __('Telefono') }}" />
                            <x-input id="apr_telefono" class="block mt-1 w-full" type="text" name="apr_telefono"
                                :value="$aprendiz->apr_telefono" required autofocus autocomplete="apr_telefono" />
                        </div>
                        <div>
                            <x-label for="apr_direccion" value="{{ __('Direccion') }}" />
                            <x-input id="apr_direccion" class="block mt-1 w-full" type="text" name="apr_direccion"
                                :value="$aprendiz->apr_direccion" required autofocus autocomplete="apr_direccion" />
                        </div>
                        <div>
                            <x-label for="apr_fechaNacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                            <x-input id="apr_fechaNacimiento" class="block mt-1 w-full" type="date"
                                name="apr_fechaNacimiento" :value="$aprendiz->apr_fechaNacimiento" required autofocus
                                autocomplete="apr_fechaNacimiento" />
                        </div>
                        <div>
                            <x-label for="ficha_id" value="{{ __('Ficha') }}" />
                            <select name="ficha_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($fichas as $ficha)
                                    @if ($ficha->id == $aprendiz->ficha_id)
                                        <option selected value="{{ $ficha->id }}">{{ $ficha->fic_codigo }} -
                                            {{ $ficha->programa->pro_nombre }}</option>
                                    @else
                                        <option value="{{ $ficha->id }}">{{ $ficha->fic_codigo }} -
                                            {{ $ficha->programa->pro_nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ url()->previous() }}" class="mx-3">Atras</x-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
