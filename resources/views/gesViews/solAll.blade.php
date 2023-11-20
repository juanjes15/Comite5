<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitudes de comité pendientes de aprobación') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray2 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between m-4">
                        <form action="{{ route('gesViews.solAll') }}" method="get" class="flex-grow ml-4">
                            <label for="default-search" class="mb-2 text-sm sr-only">Buscar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-svg-search></x-svg-search>
                                </div>
                                <input name="q" type="search" id="default-search"
                                    placeholder="Buscar por fecha, lugar o motivo"
                                    class="block w-full p-4 pl-10 text-sm border rounded-lg focus:ring-cyan-800 focus:border-cyan-800 ">
                                <x-button class="absolute right-2.5 bottom-2.5" type="submit">Buscar</x-button>
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 uppercase bg-mint2">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Fecha de la solicitud
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Instructor solicitante
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Motivo de la solicitud
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-mint1">
                            @forelse ($solicituds as $solicitud)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $solicitud->created_at }}
                                    </td>
                                    <td class="px-6 py-4 truncate max-w-xs">
                                        {{ $solicitud->aprendizs[0]->ficha->instructor->ins_nombres }}
                                        {{ $solicitud->aprendizs[0]->ficha->instructor->ins_apellidos }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $solicitud->sol_motivo }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <x-link2 title="Detalles" href="{{ route('gesViews.solDet', $solicitud) }}">
                                            <x-svg-edit></x-svg-edit>
                                        </x-link2>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                        {{ __('No se encontraron solicitudes pendientes de aprobación') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        {!! $solicituds->appends(['q' => request()->input('q')])->links() !!}
    </div>
</x-app-layout>
