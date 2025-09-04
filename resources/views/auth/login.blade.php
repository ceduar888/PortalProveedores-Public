<x-guest-layout :pagina="$pagina">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <img src="{{ asset('/img/logo.jpeg') }}" alt="urbanica desarrollos inmobiliario" width="200" height="auto" style="margin: auto"/>

    <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-3xl font-extrabold text-center">
        Portal<span class="font-normal text-gray-500">Proveedores</span>
    </h1> 
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
         <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Usuario')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Clave de Acceso')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-input-error :messages="$errors->get('completado')" class="mt-2" />

        <div class="flex items-center mt-4 justify-center">
            @if (Route::has('password.request'))
                <p class="text-gray-600 text-sm mr-1">¿Quiéres trabajar con nosotros?</p>

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-offset-2" href="/auth/register">
                     {{ __(' Regístrate aquí') }}
                </a>
            @endif
        </div>

        <div class="mt-4 text-center">
            <x-primary-button class="ms-3">
                {{ __('Iniciar Sesion') }}
            </x-primary-button>
        </div>
        
    </form>
</x-guest-layout>

