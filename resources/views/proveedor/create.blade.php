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

                    <form action="/proveedor/solicitud-paso-1" method="POST">
                        @csrf
                        
                        <input type="hidden" name="idProveedor" value="{{ $proveedor->id }}">

                        <div class=" mb-2">
                            <p style="color: #0f2a3b; font:bold">PASO 1. DATOS GENERALES Y DE RESIDENCIA</p>
                        </div>

                        <!-- FILA 1 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="fel_tipo_persona" :value="__('Tipo de Persona')" />
                                <x-text-input readonly value="{{ $proveedor->tipoPersona->nombre }}" class="w-full py-1 text-sm" id="fel_tipo_persona" type="text" name="fel_tipo_persona" autofocus autocomplete="fel_tipo_persona" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="fel_emailDTE" :value="__('Correo electrónico')" />
                                <x-text-input readonly value="{{ $proveedor->fel_emailDTE }}" class="w-full py-1 text-sm" id="fel_emailDTE" type="text" name="fel_emailDTE" autofocus autocomplete="fel_emailDTE" />
                            </div>
                        </div>

                        <!-- FILA 2 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="TipoCont" :value="__('Tipo de Contribuyente *')" />
                                <select required id="TipoCont" name="TipoCont" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->TipoContribuyente)
                                        <option style="color:white;" value="{{ $proveedor->TipoContribuyente->id }}">{{ $proveedor->TipoContribuyente->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($tipoContribuyentes as $contribuyente)
                                        <option value="{{ $contribuyente->id }}">{{ $contribuyente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpTipoDoc" :value="__('Tipo de Documento *')" />
                                <select required name="cmpTipoDoc" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->tipoDocumento)
                                        <option style="color:white;" value="{{ $proveedor->tipoDocumento->id }}">{{ $proveedor->tipoDocumento->nombre }}</option>
                                    @else 
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    
                                    @foreach ($tipoDocumentos as $doc)
                                        <option value="{{ $doc->id }}">{{ $doc->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- FILA 3 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpNumDoc" :value="__('Número de documento *')" />
                                <x-text-input required value="{{ $proveedor->cmpNumDoc }}" class="w-full py-1 text-sm" id="cmpNumDoc" type="text" name="cmpNumDoc" autofocus autocomplete="cmpNumDoc" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpLugarExp" :value="__('Lugar de expedición')" />
                                <x-text-input value="{{ $proveedor->cmpLugarExp }}" class="w-full py-1 text-sm" id="cmpLugarExp" type="text" name="cmpLugarExp" autofocus autocomplete="cmpLugarExp" />
                            </div>
                        </div>

                        <!-- FILA 4 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpFechaExp" :value="__('Fecha de expedición')" />
                                <x-text-input value="{{ $proveedor->cmpFechaExp }}" class="w-full py-1 text-sm" id="cmpFechaExp" type="date" name="cmpFechaExp" autofocus autocomplete="cmpFechaExp" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpFechaVencDoc" :value="__('Fecha de vencimiento')" />
                                <x-text-input value="{{ $proveedor->cmpFechaVencDoc }}" class="w-full py-1 text-sm" id="cmpFechaVencDoc" type="date" name="cmpFechaVencDoc" autofocus autocomplete="cmpFechaVencDoc" />
                            </div>
                        </div>

                        <!-- FILA 5 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="Phone1" :value="__('Teléfono')" />
                                <x-text-input required value="{{ $proveedor->Phone1 }}" class="w-full py-1 text-sm" id="Phone1" type="text" name="Phone1" autofocus autocomplete="Phone1" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="Cellular" :value="__('Celular')" />
                                <x-text-input required value="{{ $proveedor->Cellular }}" class="w-full py-1 text-sm" id="Cellular" type="text" name="Cellular" autofocus autocomplete="Cellular" />
                            </div>
                        </div>

                        <!-- FILA 6 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpNacionalidad" :value="__('Nacionalidad *')" />
                                <select required id="cmpNacionalidad" name="cmpNacionalidad" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->pais)
                                        <option style="color:white;" value="{{ $proveedor->pais->id }}">{{ $proveedor->pais->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpPaisNac" :value="__('Pais de Nacimiento')" />
                                <select id="cmpPaisNac" name="cmpPaisNac" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->paisNac)
                                        <option style="color:white;" value="{{ $proveedor->paisNac->id }}">{{ $proveedor->paisNac->nombre }}</option>
                                    @else
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- FILA 7 -->
                         @if($proveedor->fel_tipo_persona == 1)
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-full">
                                    <x-input-label for="cmpEstFamiliar" :value="__('Estado Civíl *')" />
                                    <select id="cmpEstFamiliar" name="cmpEstFamiliar" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->cmpEstFamiliar)
                                            @php
                                                $estado = ['01' => 'Soltero(a)', '02' => 'Casado(a)', '03' => 'Viudo(a)']
                                            @endphp
                                            <option value="{{ $proveedor->cmpEstFamiliar }}">{{ $estado[$proveedor->cmpEstFamiliar] ?? 'N/A' }}</option>
                                        @else
                                            <option value=""> -- seleccione -- </option>
                                        @endif
                                        <option value="01">Soltero(a)</option>
                                        <option value="02">Casado(a)</option>
                                        <option value="03">Viudo(a)</option>
                                    </select>
                                </div>
                            </div>
                        @endif

                        <!-- FILA 8 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="cmpLugarNac" :value="__('Lugar y Fecha de Nacimiento')" />
                                <x-text-input id="cmpLugarNac" value="{{ $proveedor->cmpLugarNac }}" class="w-full py-1" type="text" name="cmpLugarNac"  autofocus autocomplete="cmpLugarNac" />
                                
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="fel_nombrePAISDTE" :value="__('País *')" />
                                <select required id="pais" name="fel_nombrePAISDTE" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->paisDTE)
                                        <option style="color:white;" value="{{ $proveedor->paisDTE->id }}">{{ $proveedor->paisDTE->nombre }}</option>
                                    @else 
                                        <option style="color:white;" value=""> -- seleccione -- </option>
                                    @endif
                                    
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- FILA 9 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="fel_DeptoMH" :value="__('Departamento *')" />
                                <select required id="fel_DeptoMH" name="fel_DeptoMH" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->departamento)
                                        <option value="{{ $proveedor->departamento->id }}" style="color:white;">{{ $proveedor->departamento->name }}</option>
                                    @else
                                        <option value="" style="color:white;"> -- seleccione -- </option>
                                    @endif
                                    
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->code }}">{{ $departamento->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <x-input-label for="fel_MunicipioMH" :value="__('Municipio *')" />
                                <select required id="municipio" name="fel_MunicipioMH" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                    @if($proveedor->municipio)
                                        <option value="{{ $proveedor->municipio->id }}" style="color:white;">{{ $proveedor->municipio->nombre }}</option>
                                    @else 
                                        <option value="" style="color:white;"> -- seleccione -- </option>
                                    @endif
                                    
                                    @foreach($municipios as $municipio)
                                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- FILA 10 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-full">
                                <x-input-label for="fel_DireccionDTE" :value="__('Dirección Completa *')" />
                                <x-text-input required value="{{ $proveedor->fel_DireccionDTE }}" class="w-full py-1" id="fel_DireccionDTE" type="text" name="fel_DireccionDTE" autofocus autocomplete="fel_PAISDTE" />
                            </div>
                        </div>

                        <div class="flex items-center justify-start mt-3">
                            <p class="text-red-500 text-xs">* Campos obligatorios </p>
                        </div>

                        <div class="flex items-center justify-end mt-3">
                            <button class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
                                Siguiente
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>