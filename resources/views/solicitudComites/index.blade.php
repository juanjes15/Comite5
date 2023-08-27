<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de solicitudes a comité') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Instructor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Asunto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha solicitud
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                @can('administrar')
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($solicitudComites as $solicitudComite)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->instructor->ins_nombres }}
                                        {{ $solicitudComite->instructor->ins_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->sol_asunto }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->created_at }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $solicitudComite->sol_estado }}
                                    </td>
                                    @can('administrar')
                                        <td class="px-6 py-4">
                                            <form method="POST"
                                                action="{{ route('solicitudComites.destroy', $solicitudComite) }}"
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
                                    <td colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron solicitudes de comites') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $solicitudComites->links() !!}
    </div>
</x-app-layout>
