<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('CRUD para los aprendices') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray2 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between m-4">
                        <x-link href="{{ route('aprendizs.create') }}" class="m-4">Agregar aprendiz</x-link>
                        <form action="{{ route('aprendizs.index') }}" method="get" class="flex-grow ml-4">
                            <label for="default-search" class="mb-2 text-sm sr-only">Buscar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-svg-search></x-svg-search>
                                </div>
                                <input name="q" type="search" id="default-search"
                                    placeholder="Buscar por ficha o documento"
                                    class="block w-full p-4 pl-10 text-sm border rounded-lg focus:ring-cyan-800 focus:border-cyan-800 ">
                                <x-button class="absolute right-2.5 bottom-2.5" type="submit">Buscar</x-button>
                            </div>
                        </form>
                    </div>
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
                                    Ficha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-mint1">
                            @forelse ($aprendizs as $aprendiz)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $aprendiz->apr_identificacion }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $aprendiz->apr_nombres }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $aprendiz->apr_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $aprendiz->ficha->fic_codigo }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <x-link2 title="Editar" href="{{ route('aprendizs.edit', $aprendiz) }}">
                                            <x-svg-edit></x-svg-edit>
                                        </x-link2>
                                        <form method="POST" action="{{ route('aprendizs.destroy', $aprendiz) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar a {{ $aprendiz->apr_nombres }} {{ $aprendiz->apr_apellidos }}?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
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
        {!! $aprendizs->appends(['q' => request()->input('q')])->links() !!}
    </div>
</x-app-layout>
