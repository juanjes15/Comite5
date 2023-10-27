<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Editar ficha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('fichas.update', $ficha) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="fic_codigo" value="{{ __('Código') }}" />
                            <x-input id="fic_codigo" type="text" name="fic_codigo" :value="$ficha->fic_codigo" required
                                autofocus autocomplete="fic_codigo" />
                        </div>
                        <div>
                            <x-label for="fic_inicioLectiva" value="{{ __('Inicio Etapa Lectiva') }}" />
                            <x-input id="fic_inicioLectiva" type="date" name="fic_inicioLectiva" :value="$ficha->fic_inicioLectiva"
                                required autofocus autocomplete="fic_inicioLectiva" />
                        </div>
                        <div>
                            <x-label for="fic_finLectiva" value="{{ __('Fin Etapa Lectiva') }}" />
                            <x-input id="fic_finLectiva" type="date" name="fic_finLectiva" :value="$ficha->fic_finLectiva" required
                                autofocus autocomplete="fic_finLectiva" />
                        </div>
                        <div>
                            <x-label for="fic_inicioProductiva" value="{{ __('Inicio Etapa Productiva') }}" />
                            <x-input id="fic_inicioProductiva" type="date" name="fic_inicioProductiva"
                                :value="$ficha->fic_inicioProductiva" required autofocus autocomplete="fic_inicioProductiva" />
                        </div>
                        <div>
                            <x-label for="fic_finProductiva" value="{{ __('Fin Etapa Productiva') }}" />
                            <x-input id="fic_finProductiva" type="date" name="fic_finProductiva" :value="$ficha->fic_finProductiva"
                                required autofocus autocomplete="fic_finProductiva" />
                        </div>
                        <div>
                            <x-label for="fic_modalidad" value="{{ __('Modalidad') }}" />
                            <select name="fic_modalidad" class="bg-white rounded-md block w-full p-1.5">
                                <option value="Presencial" @if ($ficha->fic_modalidad === 'Presencial') selected @endif>Presencial
                                </option>
                                <option value="Virtual" @if ($ficha->fic_modalidad === 'Virtual') selected @endif>Virtual
                                </option>
                            </select>
                        </div>
                        <div>
                            <x-label for="fic_jornada" value="{{ __('Jornada') }}" />
                            <select name="fic_jornada" class="bg-white rounded-md block w-full p-1.5">
                                <option value="Diurna" @if ($ficha->fic_jornada === 'Diurna') selected @endif>Diurna
                                </option>
                                <option value="Nocturna" @if ($ficha->fic_jornada === 'Nocturna') selected @endif>Nocturna
                                </option>
                                <option value="Mixta" @if ($ficha->fic_jornada === 'Mixta') selected @endif>Mixta
                                </option>
                            </select>
                        </div>
                        <div>
                            <x-label for="programa_id" value="{{ __('Programa') }}" />
                            <select name="programa_id" class="bg-white rounded-md block w-full p-1.5">
                                @foreach ($programas as $programa)
                                    @if ($programa->id == $ficha->programa_id)
                                        <option selected value="{{ $programa->id }}">{{ $programa->pro_codigo }} -
                                            {{ $programa->pro_nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $programa->id }}">{{ $programa->pro_codigo }} -
                                            {{ $programa->pro_nombre }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="instructor_id" value="{{ __('Gestor de la ficha') }}" />
                            <select name="instructor_id" class="bg-white rounded-md block w-full p-1.5">
                                @foreach ($instructors as $instructor)
                                    @if ($instructor->id == $ficha->instructor_id)
                                        <option selected value="{{ $instructor->id }}">{{ $instructor->ins_nombres }}
                                            {{ $instructor->ins_apellidos }}
                                        </option>
                                    @else
                                        <option value="{{ $instructor->id }}">{{ $instructor->ins_nombres }}
                                            {{ $instructor->ins_apellidos }}
                                        </option>
                                    @endif
                                @endforeach
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
