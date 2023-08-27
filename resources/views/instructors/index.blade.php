<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de instructores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('administrar')
                        <x-link href="{{ route('instructors.create') }}" class="m-4">Añadir instructor</x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telefono
                                </th>
                                @can('administrar')
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($instructors as $instructor)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $instructor->ins_identificacion }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $instructor->ins_nombres }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $instructor->ins_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $instructor->ins_email }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $instructor->ins_telefono }}
                                    </td>
                                    @can('administrar')
                                        <td class="px-6 py-4">
                                            <x-link href="{{ route('instructors.edit', $instructor) }}">Editar</x-link>
                                            <form method="POST" action="{{ route('instructors.destroy', $instructor) }}"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit" onclick="return confirm('¿Está seguro?')">
                                                    Eliminar</x-danger-button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron instructores') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $instructors->links() !!}
    </div>
</x-app-layout>
