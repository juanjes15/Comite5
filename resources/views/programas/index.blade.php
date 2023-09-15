<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD para los programas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between m-4">
                        <x-link2 href="{{ route('programas.create') }}" class="m-4">Agregar programa</x-link2>
                        <form action="{{ route('programas.index') }}" method="get" class="flex-grow ml-4">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-svg-search></x-svg-search>
                                </div>
                                <input name="q" type="search" id="default-search" placeholder="Buscar por nose"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 ">
                                <button
                                    class="text-white absolute right-2.5 bottom-2.5 bg-orange-600 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2"
                                    type="submit">Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-orange-200">
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
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-orange-100">
                            @forelse ($programas as $programa)
                                <tr class="border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $programa->pro_codigo }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 truncate max-w-xs">
                                        {{ $programa->pro_nombre }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $programa->pro_nivelFormacion }}
                                    </td>
                                    <td class="px-6 py-4 bg-orange-100 text-center">
                                        <x-link title="Editar"
                                            class="bg-amber-400 hover:bg-amber-600 focus:bg-amber-600 active:bg-amber-700"
                                            href="{{ route('programas.edit', $programa) }}">
                                            <x-svg-edit></x-svg-edit>
                                        </x-link>
                                        <form method="POST" action="{{ route('programas.destroy', $programa) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar el programa {{ $programa->pro_nombre }}?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron programas') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        {!! $programas->appends(['q' => request()->input('q')])->links() !!}
    </div>
</x-app-layout>
