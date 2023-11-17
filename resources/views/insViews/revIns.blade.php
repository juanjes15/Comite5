<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitud #') . $solicitud->id . ' - Instructores involucrados' }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('insViews.revIns', $solicitud) }}">
                        @csrf
                        <div>
                            <x-label for="instructor_id" value="{{ __('Instructores') }}" />
                            <select name="instructor_id" id="instructor_id"
                                class="bg-white rounded-md block w-full p-1.5 my-2">
                                <option value="">--Seleccione un Instructor--</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">
                                        {{ $instructor->ins_nombres }} {{ $instructor->ins_apellidos }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Agregar instructor') }}
                            </x-button>
                        </div>
                    </form>
                    <h2 class="mt-6 mb-2 font-semibold">Instructores involucrados en esta solicitud</h2>
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 uppercase bg-mint2">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Identificación
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombres
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Apellidos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-mint1">
                            @forelse ($instructors2 as $instructor)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $instructor->ins_identificacion }}
                                    </td>
                                    <td class="px-6 py-4 truncate max-w-xs">
                                        {{ $instructor->ins_nombres }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $instructor->ins_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form method="POST"
                                            action="{{ route('insViews.delIns', ['solicitud' => $solicitud, 'instructor' => $instructor]) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar este instructor?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                        {{ __('No se encontraron instructores involucrados') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="flex mt-4">
                        <x-linkb href="{{ route('insViews.revDet', $solicitud) }}" class="mx-3">Atras</x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
