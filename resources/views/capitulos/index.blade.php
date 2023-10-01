<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('CRUD para los Capitulos del Reglamento') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray2 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between m-4">
                        <x-link href="{{ route('capitulos.create') }}" class="m-4">Agregar capítulo</x-link>
                    </div>
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 uppercase bg-mint2">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Número
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-mint1">
                            @forelse ($capitulos as $capitulo)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $capitulo->cap_numero }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $capitulo->cap_descripcion }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <x-link2 title="Editar" href="{{ route('capitulos.edit', $capitulo) }}">
                                            <x-svg-edit></x-svg-edit>
                                        </x-link2>
                                        <form method="POST" action="{{ route('capitulos.destroy', $capitulo) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" title="Eliminar"
                                                onclick="return confirm('¿Está seguro de eliminar el capítulo {{ $capitulo->cap_numero }}?')">
                                                <x-svg-delete></x-svg-delete>
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                        {{ __('No se encontraron capitulos') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        {!! $capitulos->links() !!}
    </div>
</x-app-layout>
