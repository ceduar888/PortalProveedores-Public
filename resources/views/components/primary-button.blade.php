<button style="border-style: solid 2px; background-color: #b7c141;" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
