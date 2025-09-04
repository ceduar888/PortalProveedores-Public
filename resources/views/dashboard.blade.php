@if(auth()->user()->completado == false)
    <x-app-layout :pagina="$pagina"> 

        <x-slot name="header">
            <p class="font-md font-semibold text-gray-800 leading-tight">
                ¡Hola! {{ Auth::user()->name }} 
            </p>
            <p class="font-sm text-gray-500">
                Completa tu solicitud de Proveedor
            </p>
        </x-slot>

        <x-alerts/>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div class="relative w-[1100px] h-[500px] overflow-hidden rounded-xl text-[#0f2a3b]">
                            <a href="/proveedor/solicitud-paso-1" 
                            class="absolute ml-52 top-1/2 -translate-y-1/2 
                                    bg-[#bfcd30] py-4 px-3 font-bold rounded-full shadow-sm hover:text-white hover:bg-[#0f2a3b]">
                                COMPLETAR SOLICITUD
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>

                            <img src="{{ asset('/img/proveedor-inicio.jpg') }}" 
                                class="w-full h-full object-cover" alt="Proveedor">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <x-app-layout :pagina="$pagina">

        <x-slot name="header">
            <p class="font-md font-semibold text-gray-800 leading-tight">
                Hola, {{ Auth::user()->name }} 
            </p>
            <p class="font-sm text-gray-500">
                ¡Bienvenido!
            </p>
        </x-slot>

        <x-alerts/>
        
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex items-center justify-center">

                        @if($imagenes)
                            <div class="w-[1100px] h-[500px] overflow-hidden">
                                <div id="carouselExampleIndicators" class="carousel slide h-full" data-bs-ride="carousel">
                                    
                                    <!-- Indicators -->
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    </div>

                                    <!-- Slides -->
                                    <div class="carousel-inner h-full rounded-xl">
                                        <div class="carousel-item active">
                                            <img src="{{ $imagenes->img1 }}" class="w-full h-full object-cover" alt="Banner1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ $imagenes->img2 }}" class="w-full h-full object-cover" alt="Banner2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ $imagenes->img3 }}" class="w-full h-full object-cover" alt="Banner3">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ $imagenes->img4 }}" class="w-full h-full object-cover" alt="Banner4">
                                        </div>
                                    </div>

                                    <!-- Controls -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        @endif
  
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endif
