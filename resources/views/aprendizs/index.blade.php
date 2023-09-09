<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD para los aprendices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between m-4">
                        <x-link2 href="{{ route('aprendizs.create') }}" class="m-4">Agregar aprendiz</x-link2>
                        <form action="{{ route('aprendizs.index') }}" method="get" class="flex-grow ml-4">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input name="q" type="search" id="default-search"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 "
                                    placeholder="Busque por ficha o documento">
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-orange-600 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2">Buscar</button>
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-orange-200">
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
                                    Ficha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-orange-100">
                            @forelse ($aprendizs as $aprendiz)
                                <tr class="border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $aprendiz->apr_identificacion }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $aprendiz->apr_nombres }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $aprendiz->apr_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $aprendiz->ficha->fic_codigo }}
                                    </td>
                                    <td class="px-6 py-4 bg-orange-100 text-center">
                                        <x-link title="Editar"
                                            class="bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 active:bg-amber-900"
                                            href="{{ route('aprendizs.edit', $aprendiz) }}"><x-svg-edit></x-svg-edit></x-link>
                                        <form method="POST" action="{{ route('aprendizs.destroy', $aprendiz) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar este elemento?')">
                                                <x-svg-delete></x-svg-delete></x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No se encontraron aprendices') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        {!! $aprendizs->links() !!}
    </div>
</x-app-layout>
