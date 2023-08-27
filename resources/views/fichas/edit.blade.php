<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar ficha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('fichas.update', $ficha) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="fic_codigo" value="{{ __('Codigo') }}" />
                            <x-input id="fic_codigo" class="block mt-1 w-full" type="text" name="fic_codigo"
                                :value="$ficha->fic_codigo" required autofocus autocomplete="fic_codigo" />
                        </div>
                        <div>
                            <x-label for="fic_inicioLectiva" value="{{ __('Inicio Etapa Lectiva') }}" />
                            <x-input id="fic_inicioLectiva" class="block mt-1 w-full" type="date"
                                name="fic_inicioLectiva" :value="$ficha->fic_inicioLectiva" required autofocus
                                autocomplete="fic_inicioLectiva" />
                        </div>
                        <div>
                            <x-label for="fic_finLectiva" value="{{ __('Fin Etapa Lectiva') }}" />
                            <x-input id="fic_finLectiva" class="block mt-1 w-full" type="date" name="fic_finLectiva"
                                :value="$ficha->fic_finLectiva" required autofocus autocomplete="fic_finLectiva" />
                        </div>
                        <div>
                            <x-label for="fic_inicioProductiva" value="{{ __('Inicio Etapa Productiva') }}" />
                            <x-input id="fic_inicioProductiva" class="block mt-1 w-full" type="date"
                                name="fic_inicioProductiva" :value="$ficha->fic_inicioProductiva" required autofocus
                                autocomplete="fic_inicioProductiva" />
                        </div>
                        <div>
                            <x-label for="fic_finProductiva" value="{{ __('Fin Etapa Productiva') }}" />
                            <x-input id="fic_finProductiva" class="block mt-1 w-full" type="date"
                                name="fic_finProductiva" :value="$ficha->fic_finProductiva" required autofocus
                                autocomplete="fic_finProductiva" />
                        </div>
                        <div>
                            <x-label for="fic_modalidad" value="{{ __('Modalidad') }}" />
                            <x-input id="fic_modalidad" class="block mt-1 w-full" type="text" name="fic_modalidad"
                                :value="$ficha->fic_modalidad" required autofocus autocomplete="fic_modalidad" />
                        </div>
                        <div>
                            <x-label for="fic_jornada" value="{{ __('Jornada') }}" />
                            <x-input id="fic_jornada" class="block mt-1 w-full" type="text" name="fic_jornada"
                                :value="$ficha->fic_jornada" required autofocus autocomplete="fic_jornada" />
                        </div>
                        <div>
                            <x-label for="pro_id" value="{{ __('Programa') }}" />
                            <select name="pro_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($programas as $programa)
                                    @if ($programa->id == $ficha->pro_id)
                                        <option selected value="{{ $programa->id }}">{{ $programa->pro_nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $programa->id }}">{{ $programa->pro_nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="ins_id" value="{{ __('Instructor') }}" />
                            <select name="ins_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($instructors as $instructor)
                                    @if ($instructor->id == $ficha->ins_id)
                                        <option selected value="{{ $instructor->id }}">{{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}
                                        </option>
                                    @else
                                        <option value="{{ $instructor->id }}">{{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Editar') }}
                            </x-button>
                            <x-link href="{{ route('fichas.index') }}" class="mx-3">Atras</x-link>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
