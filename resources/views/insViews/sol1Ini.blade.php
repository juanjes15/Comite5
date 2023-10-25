<x-app-layout>
    <x-slot name="header">
        <h2 class="leading-tight">
            {{ __('Solicitar Comité - Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12 text-black font-medium">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-mint1 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900">Pasos para solicitar un comité:</h2>
                    <ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside">
                        <li>
                            Seleccionar la ficha a la cuál pertenece el aprendiz
                        </li>
                        <li>
                            Llenar formulario de información básica de la solicitud
                        </li>
                        <li>
                            Añadir los instructores involucrados en la solicitud
                        </li>
                        <li>
                            Añadir los aprendices involucrados en la solicitud
                        </li>
                        <li>
                            Añadir las normas del reglamento infringidas
                        </li>
                        <li>
                            Añadir las pruebas que sustentan la solicitud
                        </li>
                    </ol>
                    <p class="mt-4">Recuerda que sólo el gestor de cada ficha puede <br> solicitar un comité para sus respectivos estudiantes</p>
                    <x-link href="{{ route('insViews.sol2Fic') }}" class="mx-3 mt-5">Comenzar</x-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
