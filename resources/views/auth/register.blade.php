<x-guest-register :pagina="$pagina">

    <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-3xl font-extrabold text-center mt-8">
        Registro<span class="font-normal text-gray-500">Proveedores</span>
    </h1> 

    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- FILA 1 -->
        <div class="lg:flex">
            <!-- Tipo de persona -->
            <div class="mt-4 lg:w-1/3 mr-9" >
                <x-input-label for="tipo_persona" :value="__('Tipo de persona *')" />
                <select required id="tipo_persona" name="tipo_persona" :value="old('tipo_persona')" class="border-gray-300 focus:border-green-400  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                    <option style="color:lightgray;" value=""> -- seleccione -- </option>
                    @foreach ($tipoPersonas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach    
                </select>
                <x-input-error :messages="$errors->get('tipo_persona')" class="mt-2" />
            </div>
            <div class="mt-4 lg:w-1/3">

            </div>
            <div class="mt-4 lg:w-1/3">

            </div>
        </div>



        <!-- FILA 2 -->
        <div class="lg:flex">
            <!-- Nombre / Razon social -->
            <div class="lg:w-1/2 mt-4 mr-5">
                <x-input-label for="name" :value="__('Nombre Completo/Razón Social *')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- Nombre comercial -->
            <div class="lg:w-1/2 mt-4 ml-5">
                <x-input-label for="nom_comercial" :value="__('Nombre Comercial')" />
                <x-text-input id="nom_comercial" class="block mt-1 w-full" type="text" name="nom_comercial" :value="old('nom_comercial')" required autofocus autocomplete="nom_comercial" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>



        <!-- FILA 3 -->
        <div class="lg:flex">
            <!-- Tipo documento -->
            <div class="mt-4 lg:w-1/3 mr-9">
                <x-input-label for="tipo_documento" :value="__('Tipo de Documento *')" />
                <select required id="tipo_documento" name="tipo_documento" :value="old('tipo_documento')" class="border-gray-300  focus:border-green-400 focus:ring-[#bfcd30]  rounded-md shadow-sm">
                    <option value=""> -- seleccione -- </option>
                    @foreach ($tipoDocumentos as $documento)
                        <option value="{{ $documento->id }}">{{ $documento->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('tipo_documento')" class="mt-2" />
            </div>
            <div class="mt-4 lg:w-1/3">

            </div>
            <div class="mt-4 lg:w-1/3">

            </div>
        </div>



        <!-- FILA 4 -->
        <div class="lg:flex">
            <!-- Numero documento -->
            <div class="mt-4 lg:w-1/3 mr-3">
                <x-input-label for="num_documento" :value="__('Número de Documento *')" />
                <x-text-input id="num_documento" class="block mt-1 w-full" type="text" name="num_documento" :value="old('num_documento')" required autofocus autocomplete="num_documento"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Numero telefono-->
            <div class="mt-4 lg:w-1/3 ml-3 mr-3">
                <x-input-label for="num_telefono" :value="__('Número de Teléfono *')" />
                <x-text-input id="num_telefono" class="block mt-1 w-full" type="text" name="num_telefono" :value="old('num_telefono')" autofocus autocomplete="num_telefono" placeholder="2222-2222" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Numero celular -->
            <div class="mt-4 lg:w-1/3 ml-3">
                <x-input-label for="num_celular" :value="__('Número de Celular *')" />
                <x-text-input id="num_celular" class="block mt-1 w-full" type="text" name="num_celular" :value="old('num_celular')" required autofocus autocomplete="num_celular" placeholder="7777-7777"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>



        <!-- FILA 5 -->
        <div class="lg:flex">
            <!-- Correo -->
            <div class="lg:w-1/2 mt-4 mr-5">
                <x-input-label for="email" :value="__('Correo Electrónico *')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Confirmar Correo -->
            <div class="lg:w-1/2 mt-4 ml-5">
                <x-input-label for="email_confirmation" :value="__('Confirmar Correo Electrónico *')" />
                <x-text-input id="email_confirmation" class="block mt-1 w-full" type="email" name="email_confirmation" :value="old('email_confirmation')" required autocomplete="email_confirmation" />
                <x-input-error :messages="$errors->get('email_confirmation')" class="mt-2" />
            </div>
        </div>
        


        <!-- FILA 6 -->
        <div class="lg:flex">
             <!-- Clave acceso -->
            <div class="lg:w-1/2 mt-4 mr-5">
                <x-input-label for="password" :value="__('Clave de Acceso (Mínimo 8 caracteres) *')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Al menos una letra mayúscula, un número y un símbolo" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Clave de Acceso -->
            <div class="lg:w-1/2 mt-4 ml-5">
                <x-input-label for="password_confirmation" :value="__('Confirmar Clave de Acceso *')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

        </div>

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <div class="flex justify-between mt-4">
            <span style="color:red; font-size:small">Campos obligatorios *</span>
        </div>


        <!-- ULTIMA FILA -->
        <div class="flex items-center justify-between mt-4">
            <div class="flex justify-start">
                <p class="text-gray-600 text-sm mr-1">¿Tienes una cuenta?</p>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-offset-2" href="{{ route('login') }}">
                    {{ __(' Inicia Sesión') }}
                </a>
            </div>

            <div>
                <x-primary-button class="ms-4">
                    {{ __('Enviar') }}
                </x-primary-button>
            </div>
        </div>

    </form>
</x-guest-register>
