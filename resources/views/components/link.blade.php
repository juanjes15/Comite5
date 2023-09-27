<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-sena-600 border border-white rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sena-700 focus:bg-sena-800 active:bg-sena-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
