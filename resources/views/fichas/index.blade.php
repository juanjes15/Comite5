<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('CRUD para las fichas') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray2 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between m-4">
                        <x-link href="{{ route('fichas.create') }}" class="m-4">Agregar ficha</x-link>
                        <form action="{{ route('fichas.index') }}" method="get" class="flex-grow ml-4">
                            <label for="default-search" class="mb-2 text-sm sr-only">Buscar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-svg-search></x-svg-search>
                                </div>
                                <input name="q" type="search" id="default-search" placeholder="Buscar por ..."
                                    class="block w-full p-4 pl-10 text-sm border rounded-lg focus:ring-cyan-800 focus:border-cyan-800 ">
                                <x-button class="absolute right-2.5 bottom-2.5" type="submit">Buscar</x-button>
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 uppercase bg-mint2">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Inicio Lectiva
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Modalidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    programa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-mint1">
                            @forelse ($fichas as $ficha)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ficha->fic_codigo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ficha->fic_inicioLectiva }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ficha->fic_modalidad }}
                                    </td>
                                    <td class="px-6 py-4 truncate max-w-xs">
                                        {{ $ficha->programa->pro_nombre }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <x-link2 title="Editar" href="{{ route('fichas.edit', $ficha) }}">
                                            <x-svg-edit></x-svg-edit>
                                        </x-link2>
                                        <form method="POST" action="{{ route('fichas.destroy', $ficha) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar la ficha {{ $ficha->fic_codigo }}?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                        {{ __('No se encontraron fichas') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        {!! $fichas->appends(['q' => request()->input('q')])->links() !!}
    </div>
</x-app-layout>
