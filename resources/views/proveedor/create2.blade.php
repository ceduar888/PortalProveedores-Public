<x-app-layout :pagina="$pagina">
    <!-- Datos generales y residencia -> Datos profesionales/empresariales -> PEP -> Persona natural -> Persona jurídica -->
    <x-alert-success-error/>

    <x-slot name="header">
        <p class="font-md font-semibold text-gray-800 leading-tight">
            Solicitud de Proveedor 
        </p>
        <p class="font-sm text-gray-500">
            Completa el formulario
        </p>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border sm:rounded-lg">
                <div class="py-6 text-gray-900 px-10">

                    <form action="/proveedor/solicitud-paso-2" method="POST">
                        @csrf
                        
                        <input type="hidden" name="idProveedor" value="{{ $proveedor->id }}">

                        <div class=" mb-2">
                            <p style="color: #0f2a3b; font:bold">PASO 2. DATOS PROFESIONALES Y FINANCIEROS</p>
                        </div>

                        <!-- FILA 1 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpActEcon" :value="__('Profesión *')" />
                                <x-text-input required value="{{ $proveedor->cmpActEcon }}" class="w-full py-1 text-sm" id="cmpActEcon" type="text" name="cmpActEcon" autofocus autocomplete="cmpActEcon" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="fel_ActivEconMH" :value="__('Giro/Actividad económica *')" />
                                <select required id="fel_ActivEconMH" name="fel_ActivEconMH" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->giros)
                                        <option style="color:white;" value="{{ $proveedor->giros->id }}">{{ $proveedor->giros->codigo }} - {{ $proveedor->giros->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($giros as $giro)
                                        <option value="{{ $giro->id }}">{{ $giro->codigo }} - {{ $giro->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- FILA 2 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2"> 
                                <x-input-label for="cmpIngreMensual" :value="__('Rango de ingresos mensuales *')" />
                                <select required id="cmpIngreMensual" name="cmpIngreMensual" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->ingresos)
                                        <option style="color:white;" value="{{ $proveedor->ingresos->id }}">{{ $proveedor->ingresos->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($ingresos as $ingre)
                                        <option value="{{ $ingre->id }}">{{ $ingre->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpEsAPNFD" :value="__('APNFD *')" />
                                <select required id="cmpEsAPNFD" name="cmpEsAPNFD" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->activApnfd)
                                        <option style="color:white;" value="{{ $proveedor->activApnfd->id }}">{{ $proveedor->activApnfd->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($apnfd as $apn)
                                        <option value="{{ $apn->id }}">{{ $apn->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <!-- FILA 3 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpEsPEP" :value="__('PEP *')" />
                                <select required id="EsPEP" name="cmpEsPEP" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        <option style="color:white;" value="{{ $proveedor->cmpEsPEP }}">{{ $proveedor->cmpEsPEP ?? '-- seleccione --' }}</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>
                            </div>
                            <div id="DIVs" class="mt-3 lg:w-1/2"></div>
                            <div style="display: none;" class="mt-3 lg:w-1/2" id="CargoPEP">
                                <x-input-label for="cmpCargoPEP" :value="__('Cargo desempeñado *')" />
                                <select name="cmpCargoPEP" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->cargo)
                                        <option style="color:white;" value="{{ $proveedor->cargo->id }}">{{ $proveedor->cargo->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <!-- FILA 4 -->
                        <div class="lg:flex gap-4">
                            <div style="display: none;" id="PEPfechaInicio" class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpPEPDesde" :value="__('PEP fecha inicio')" />
                                <x-text-input value="{{ $proveedor->cmpPEPDesde }}" class="w-full py-1 text-sm" id="cmpPEPDesde" type="date" name="cmpPEPDesde" autofocus autocomplete="cmpPEPDesde" />
                            </div>
                            <div style="display: none;" id="PEPfechaFin" class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpPEPHasta" :value="__('PEP fecha fin')" />
                                <x-text-input value="{{ $proveedor->cmpPEPHasta }}" class="w-full py-1 text-sm" id="cmpPEPHasta" type="date" name="cmpPEPHasta" autofocus autocomplete="cmpPEPHasta" />
                            </div>
                        </div>

                        <!-- FILA 5 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="BankCode" :value="__('Banco *')" />
                                <select required name="BankCode" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->banco)
                                        <option style="color:white;" value="{{ $proveedor->banco->id }}">{{ $proveedor->banco->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($bancos as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 lg:w-1/2"></div>
                        </div>

                        <!-- FILA 6 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="numero_cuenta" :value="__('Número de cuenta *')" />
                                <x-text-input required value="{{ $proveedor->numero_cuenta }}" class="w-full py-1 text-sm" id="numero_cuenta" type="text" name="numero_cuenta" autofocus autocomplete="numero_cuenta" />
                            </div>
                            <div class="mt-3 lg:w-1/2"> 
                                <x-input-label for="tipo_cuenta" :value="__('Tipo de cuenta *')" />
                                <select required name="tipo_cuenta" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->tipo_cuenta)
                                        <option style="color:white;" value="{{ $proveedor->tipo_cuenta }}">{{ $proveedor->tipo_cuenta }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    
                                    <option value="Corriente">Corriente</option>
                                    <option value="Ahorros">Ahorros</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-start mt-3">
                            <p class="text-red-500 text-xs">* Campos obligatorios </p>
                        </div>

                        <!-- FILA 7 -->
                        <div class="lg:flex items-center justify-between">
                            <div class="mt-3 lg:w-1/2">
                                <div class="flex items-center justify-start mt-3">
                                    <button type="button" onclick="window.location.href='/proveedor/solicitud-paso-1'" class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
                                        Atras
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <div class="flex items-center justify-end mt-3">
                                    <button type="submit" class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
                                        Siguiente
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('EsPEP').addEventListener('change', function () {
            const cargoPEP = document.getElementById('CargoPEP');
            const PEPInicio = document.getElementById('PEPfechaInicio');
            const PEPFin = document.getElementById('PEPfechaFin');
            const DIVs = document.getElementById('DIVs');

            if(this.value === 'SI'){
                cargoPEP.style.display = 'block';
                PEPInicio.style.display = 'block';
                PEPFin.style.display = 'block';
                DIVs.style.display = 'none';
            } else{
                cargoPEP.style.display = 'none';
                PEPInicio.style.display = 'none';
                PEPFin.style.display = 'none';
                DIVs.style.display = 'block';
            }
        });
    </script>

    <x-js-codigo-pais/>
</x-app-layout>