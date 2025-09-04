<x-guest-layout :pagina="$pagina">
    
    @if ($error)
        <div class="bg-white shadow py-8 px-4 rounded-lg max-w-md mx-auto text-center">
            <p class="bg-[#bfcd30] py-2 px-5 rounded-lg w-full font-bold text-center text-white uppercase">
                Ocurrió un error al validar tu cuenta 
            </p>
        </div>
    @else
        <div class="bg-white shadow py-8 px-4 rounded-lg max-w-md mx-auto text-center">
            <p class="bg-[#bfcd30] py-2 px-5 rounded-lg w-full font-bold text-center text-white uppercase mb-5">
                {{ $nombre }} tu cuenta ha sido verificada con éxito 
            </p>
            <a href="{{ url('/auth/login') }}" class="underline text-blue-600 uppercase">Inicia Sesión aquí</a>
        </div>
    @endif

</x-guest-layout>