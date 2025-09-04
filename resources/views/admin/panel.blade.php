@if(auth()->user()->role == 1)
    <x-app-layout :pagina="$pagina">

        <x-slot name="header">
            <nav x-data="{ open: false }" class="bg-white w-full">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-12">
                        <div class="flex">

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link-admin :href="route('panel-admin')" :active="request()->routeIs('panel-admin')">
                                    {{ __('Noticias') }}
                                </x-nav-link-admin>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Inicio') }}
                        </x-responsive-nav-link>
                        <!-- Admin navigation -->
                        

                        <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            {{ __('Mi Perfil') }}
                        </x-responsive-nav-link>
                        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </nav>
        </x-slot>

        <x-alerts/>
        
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <!-- FILA 1 -->
                        <div class="lg:flex items-center justify-center">
                            <div>
                                <!-- Noticia 1 -->
                                <form method="POST" action="/admin/noticia-1" enctype="multipart/form-data">
                                @csrf
                                    <h3 class="mb-2 text-center">Noticia 1</h3>
                                    <div class="rounded-md shadow-md">
                                        @if($noticia)
                                            <img class="p-2" src="{{ $noticia->img1 }}" alt="Noticia 1" width="400" height="auto">
                                        @endif
                                    </div>
                                    <div class="flex flex-col mt-3">
                                        <input required type="file" class="text-sm" name="img1">
                                        <button type="submit" class="mt-2 items-center px-2 py-1 border border-transparent bg-[#bfcd30] rounded-md text-sm text-white uppercase hover:bg-[#0f2a3b]">Cambiar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- FILA 2 -->
                        <div class="lg:flex items-center justify-center mt-12">
                            <div>
                                <!-- Noticia 2 -->
                                <form method="POST" action="/admin/noticia-2" enctype="multipart/form-data">
                                @csrf
                                    <h3 class="mb-2 text-center">Noticia 2</h3>
                                    <div class="rounded-md shadow-md">
                                        @if($noticia)
                                            <img class="p-2" src="{{ $noticia->img2 }}" alt="Noticia 2" width="400" height="auto">
                                        @endif
                                    </div>
                                    <div class="flex flex-col mt-3">
                                        <input required type="file" class="text-sm" name="img2">
                                        <button type="submit" class="mt-2 items-center px-2 py-1 border border-transparent bg-[#bfcd30] rounded-md text-sm text-white uppercase hover:bg-[#0f2a3b]">Cambiar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- FILA 3 -->
                        <div class="lg:flex items-center justify-center mt-12">
                            <div>
                                <!-- Noticia 3 -->
                                <form method="POST" action="/admin/noticia-3" enctype="multipart/form-data">
                                @csrf
                                    <h3 class="mb-2 text-center">Noticia 3</h3>
                                    <div class="rounded-md shadow-md">
                                        @if($noticia)
                                            <img class="p-2" src="{{ $noticia->img3 }}" alt="Noticia 3" width="400" height="auto">
                                        @endif
                                    </div>
                                    <div class="flex flex-col mt-3">
                                        <input required type="file" class="text-sm" name="img3">
                                        <button type="submit" class="mt-2 items-center px-2 py-1 border border-transparent bg-[#bfcd30] rounded-md text-sm text-white uppercase hover:bg-[#0f2a3b]">Cambiar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- FILA 4 -->
                        <div class="lg:flex items-center justify-center mt-12">
                            <div>
                                <!-- Noticia 4 -->
                                <form method="POST" action="/admin/noticia-4" enctype="multipart/form-data">
                                @csrf
                                    <h3 class="mb-2 text-center">Noticia 4</h3>
                                    <div class="rounded-md shadow-md">
                                        @if($noticia)
                                            <img class="p-2" src="{{ $noticia->img4 }}" alt="Noticia 4" width="400" height="auto">
                                        @endif
                                    </div>
                                    <div class="flex flex-col mt-3">
                                        <input required type="file" class="text-sm" name="img4">
                                        <button type="submit" class="mt-2 items-center px-2 py-1 border border-transparent bg-[#bfcd30] rounded-md text-sm text-white uppercase hover:bg-[#0f2a3b]">Cambiar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <x-404/>
@endif
