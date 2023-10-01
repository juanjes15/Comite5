<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Crear ficha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('fichas.store') }}">
                        @csrf
                        <div>
                            <x-label for="fic_codigo" value="{{ __('Código') }}" />
                            <x-input id="fic_codigo" type="text" name="fic_codigo" :value="old('fic_codigo')" required
                                autofocus autocomplete="fic_codigo" />
                        </div>
                        <div>
                            <x-label for="fic_inicioLectiva" value="{{ __('Inicio Etapa Lectiva') }}" />
                            <x-input id="fic_inicioLectiva" type="date" name="fic_inicioLectiva" :value="old('fic_inicioLectiva')"
                                required autofocus autocomplete="fic_inicioLectiva" />
                        </div>
                        <div>
                            <x-label for="fic_finLectiva" value="{{ __('Fin Etapa Lectiva') }}" />
                            <x-input id="fic_finLectiva" type="date" name="fic_finLectiva" :value="old('fic_finLectiva')" required
                                autofocus autocomplete="fic_finLectiva" />
                        </div>
                        <div>
                            <x-label for="fic_inicioProductiva" value="{{ __('Inicio Etapa Productiva') }}" />
                            <x-input id="fic_inicioProductiva" type="date" name="fic_inicioProductiva"
                                :value="old('fic_inicioProductiva')" required autofocus autocomplete="fic_inicioProductiva" />
                        </div>
                        <div>
                            <x-label for="fic_finProductiva" value="{{ __('Fin Etapa Productiva') }}" />
                            <x-input id="fic_finProductiva" type="date" name="fic_finProductiva" :value="old('fic_finProductiva')"
                                required autofocus autocomplete="fic_finProductiva" />
                        </div>
                        <div>
                            <x-label for="fic_modalidad" value="{{ __('Modalidad') }}" />
                            <x-input id="fic_modalidad" type="text" name="fic_modalidad" :value="old('fic_modalidad')" required
                                autofocus autocomplete="fic_modalidad" />
                        </div>
                        <div>
                            <x-label for="fic_jornada" value="{{ __('Jornada') }}" />
                            <x-input id="fic_jornada" type="text" name="fic_jornada" :value="old('fic_jornada')" required
                                autofocus autocomplete="fic_jornada" />
                        </div>
                        <div>
                            <x-label for="programa_id" value="{{ __('Programa') }}" />
                            <select name="programa_id" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione un programa--</option>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->pro_codigo }} -
                                        {{ $programa->pro_nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="instructor_id" value="{{ __('Gestor de la ficha') }}" />
                            <select name="instructor_id" class="bg-white rounded-md block w-full p-1.5">
                                <option value="">--Seleccione un Gestor para esta ficha--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->ins_nombres }}
                                        {{ $instructor->ins_apellidos }}
                                    </option>
                                @endforeach
                            </select>
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
