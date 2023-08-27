<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de fichas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('administrar')
                        <x-link href="{{ route('fichas.create') }}" class="m-4">Añadir ficha</x-link>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Inicio Etapa Lectiva
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Inicio Etapa Productiva
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Modalidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Programa
                                </th>
                                @can('administrar')
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fichas as $ficha)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $ficha->fic_codigo }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $ficha->fic_inicioLectiva }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $ficha->fic_inicioProductiva }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $ficha->fic_modalidad }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 truncate max-w-xs">
                                        {{ $ficha->programa->pro_nombre }}
                                    </td>
                                    @can('administrar')
                                        <td class="px-6 py-4">
                                            <x-link href="{{ route('fichas.edit', $ficha) }}">Editar</x-link>
                                            <form method="POST" action="{{ route('fichas.destroy', $ficha) }}"
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
                                        {{ __('No se encontraron fichas') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $fichas->links() !!}
    </div>
</x-app-layout>
