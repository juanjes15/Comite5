<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de programas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('administrar')
                        <x-link href="{{ route('programas.create') }}" class="m-4">Añadir programa</x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nivel de formación
                                </th>
                                @can('administrar')
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programas as $programa)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $programa->pro_codigo }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 truncate max-w-xs">
                                        {{ $programa->pro_nombre }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $programa->pro_nivelFormacion }}
                                    </td>
                                    @can('administrar')
                                        <td class="px-6 py-4">
                                            <x-link href="{{ route('programas.edit', $programa) }}">Editar</x-link>
                                            <form method="POST" action="{{ route('programas.destroy', $programa) }}"
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
                                        {{ __('No se encontraron programas') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $programas->links() !!}
    </div>
</x-app-layout>
