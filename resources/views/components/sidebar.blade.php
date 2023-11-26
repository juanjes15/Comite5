<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-56 h-screen pt-24 transition-transform -translate-x-full bg-pattern sm:translate-x-0 shadow-2xl shadow-sena-800"
    aria-label="Sidebar">
    <div class="h-full px-1 pb-4 overflow-y-auto bg-pattern">
        <ul class="space-y-1 text-base text-white font-bold">
            @if (auth()->user()->rol === 'Administrador')
                <!-- Gestor Comité -->
                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 transition duration-75 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200"
                        aria-controls="dropdown-gestor" data-collapse-toggle="dropdown-gestor">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Gestor Comité</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-gestor" class="hidden py-2 space-y-2">
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('instructors.index') }}">Instructores</a>
                        </li>
                    </ul>
                </li>
                <!-- CRUD'S -->
                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 transition duration-75 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200"
                        aria-controls="dropdown-cruds" data-collapse-toggle="dropdown-cruds">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CRUD's</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-cruds" class="hidden py-2 space-y-2">
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('instructors.index') }}">Instructores</a>
                        </li>
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('aprendizs.index') }}">Aprendices</a>
                        </li>
                        <hr class="h-px m-2 bg-gray-950 border-2">
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('programas.index') }}">Programas</a>
                        </li>
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('fichas.index') }}">Fichas</a>
                        </li>
                        <hr class="h-px m-2 bg-gray-950 border-2">
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('capitulos.index') }}">Capitulos</a>
                        </li>
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('articulos.index') }}">Articulos</a>
                        </li>
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('numerals.index') }}">Numerales</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"
                        class="flex items-center p-3 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Usuarios</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->rol === 'Instructor')
                <li>
                    <a href="{{ route('insViews.sol1Ini') }}"
                        class="flex items-center p-3 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Solicitar comité</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('insViews.revSol') }}"
                        class="flex items-center p-3 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Registrar novedad</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('insViews.comAll') }}"
                        class="flex items-center p-3 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Comités finalizados</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->rol === 'Gestor de Comites')
                <li>
                    <a href="{{ route('gesViews.solAll') }}"
                        class="flex items-center p-3 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Solicitudes</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 transition duration-75 rounded-lg group bg-sena-700 hover:text-black hover:bg-sena-200"
                        aria-controls="dropdown-comites" data-collapse-toggle="dropdown-comites">
                        <svg class="flex-shrink-0 w-5 h-5 text-sena-400 transition duration-75 group-hover:text-black"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Comités...</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    {{-- Añadir "hidden" a las clases del ul para ocultar el dropdown --}}
                    <ul id="dropdown-comites" class="py-2 space-y-2">
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('gesViews.comAll') }}">aceptados</a>
                        </li>
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('gesViews.comAls') }}">en sesión</a>
                        </li>
                        <li>
                            <a class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-sena-600 hover:text-black hover:bg-sena-200"
                                href="{{ route('gesViews.comAlf') }}">finalizados</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>
