<x-guest-layout :pagina="$pagina">
    
    <div class="bg-white shadow py-8 px-4 rounded-lg max-w-md mx-auto text-center">
        <p class="bg-[#bfcd30] py-2 px-5 rounded-lg w-full font-bold text-center text-white uppercase">
            ¡Registro exitoso! Te hemos enviado un mensaje a {{ $correo }} para que valides tu correo electrónico
        </p>
    </div>
    <div class="text-center pt-3">
        <p>
            <a href="{{ url('/auth/login') }}" class="text-blue-500 underline">{{ __('Inicia Sesión') }}</a>
        </p>
    </div>
    
</x-guest-layout>