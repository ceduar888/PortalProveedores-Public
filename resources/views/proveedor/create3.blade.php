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

    @if($proveedor->fel_tipo_persona == 1)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border sm:rounded-lg">
                    <div class="py-6 text-gray-900 px-10">

                        <form action="/proveedor/solicitud-paso-3" method="POST">
                            @csrf
                            
                            <input type="hidden" name="idProveedor" value="{{ $proveedor->id }}">

                            <div class=" mb-2">
                                <p style="color: #0f2a3b; font:bold">PASO 3. PERSONA NATURAL</p>
                            </div>

                            <!-- FILA 1 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpFuenteIng" :value="__('Fuente de ingresos *')" />
                                    <select required id="cmpFuenteIng" name="cmpFuenteIng" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->fuenteIngresos)
                                            <option style="color:white;" value="{{ $proveedor->fuenteIngresos->id }}">{{ $proveedor->fuenteIngresos->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($fuenteDeIngresos as $fuente)
                                            <option value="{{ $fuente->id }}">{{ $fuente->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpLugarTrabajo" :value="__('Trabajo - nombre empresa')" />
                                    <x-text-input value="{{ $proveedor->cmpLugarTrabajo }}" :value="old('cmpLugarTrabajo')" class="w-full py-1 text-sm" id="cmpLugarTrabajo" type="text" name="cmpLugarTrabajo" autofocus autocomplete="cmpLugarTrabajo" />
                                </div>
                            </div>

                            <!-- FILA 2 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpDptoJob" :value="__('Trabajo - departamento')" />
                                    <select id="cmpDptoJob" name="cmpDptoJob" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->dptoTrabajo)
                                            <option style="color:white;" value="{{ $proveedor->dptoTrabajo->id }}">{{ $proveedor->dptoTrabajo->name }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($departamentos as $dpto)
                                            <option value="{{ $dpto->id }}">{{ $dpto->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpMunicJob" :value="__('Trabajo - municipio')" />
                                    <select id="cmpMunicJob" name="cmpMunicJob" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->municTrabajo)
                                            <option style="color:white;" value="{{ $proveedor->municTrabajo->id }}">{{ $proveedor->municTrabajo->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($municipios as $munic)
                                            <option value="{{ $munic->id }}">{{ $munic->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- FILA 3 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-full">
                                    <x-input-label for="cmpDirLugTrab" :value="__('Trabajo - dirección completa')" />
                                    <x-text-input value="{{ $proveedor->cmpDirLugTrab }}" class="w-full py-1 text-sm" id="cmpDirLugTrab" type="text" name="cmpDirLugTrab" autofocus autocomplete="cmpDirLugTrab" />
                                </div>
                            </div>

                            <!-- FILA 4 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpCargoDesemp" :value="__('Trabajo - cargo desempeñado')" />
                                    <x-text-input value="{{ $proveedor->cmpCargoDesemp }}" class="w-full py-1 text-sm" id="cmpCargoDesemp" type="text" name="cmpCargoDesemp" autofocus autocomplete="cmpCargoDesemp" />
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpEmailJob" :value="__('Trabajo - correo electrónico')" />
                                    <x-text-input value="{{ $proveedor->cmpEmailJob }}" class="w-full py-1 text-sm" id="cmpEmailJob" type="email" name="cmpEmailJob" autofocus autocomplete="cmpEmailJob" />
                                </div>
                            </div>

                            <!-- FILA 5 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpCelularJob" :value="__('Trabajo - celular')" />
                                    <x-text-input value="{{ $proveedor->cmpCelularJob }}" class="w-full py-1 text-sm" id="cmpCelularJob" type="text" name="cmpCelularJob" autofocus autocomplete="cmpCelularJob" />
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpFuenteIngOtros" :value="__('Ingresos adicionales - fuente de ingresos')" />
                                    <select id="cmpFuenteIngOtros" name="cmpFuenteIngOtros" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->fuenteIngOtros)
                                            <option style="color:white;" value="{{ $proveedor->fuenteIngOtros->id }}">{{ $proveedor->fuenteIngOtros->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($fuenteDeIngresos as $fuente)
                                            <option value="{{ $fuente->id }}">{{ $fuente->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- FILA 6 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpLugarTrabOtro" :value="__('Ingresos adicionales - lugar trabajo/nombre empresa')" />
                                    <x-text-input value="{{ $proveedor->cmpLugarTrabOtro }}" class="w-full py-1 text-sm" id="cmpLugarTrabOtro" type="text" name="cmpLugarTrabOtro" autofocus autocomplete="cmpLugarTrabOtro" />
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpCargoOtro" :value="__('Ingresos adicionales - cargo desempeñado')" />
                                    <x-text-input value="{{ $proveedor->cmpCargoOtro }}" class="w-full py-1 text-sm" id="cmpCargoOtro" type="text" name="cmpCargoOtro" autofocus autocomplete="cmpCargoOtro" />
                                </div>
                            </div>

                            <!-- FILA 7 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpEmailOtro" :value="__('Ingresos adicionales - correo electrónico')" />
                                    <x-text-input value="{{ $proveedor->cmpEmailOtro }}" class="w-full py-1 text-sm" id="cmpEmailOtro" type="email" name="cmpEmailOtro" autofocus autocomplete="cmpEmailOtro" />
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpIngreAdic" :value="__('Ingresos adicionales - rango ingresos mensuales')" />
                                    <select id="cmpIngreAdic" name="cmpIngreAdic" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->ingresosAdic)
                                            <option style="color:white;" value="{{ $proveedor->ingresosAdic->id }}">{{ $proveedor->ingresosAdic->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($ingresos as $ingre)
                                            <option value="{{ $ingre->id }}">{{ $ingre->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center justify-start mt-3">
                                <p class="text-red-500 text-xs">* Campos obligatorios </p>
                            </div>

                            <!-- FILA 6 -->
                            <div class="lg:flex items-center justify-between">
                                <div class="mt-3 lg:w-1/2">
                                    <div class="flex items-center justify-start mt-3">
                                        <button type="button" onclick="window.location.href='/proveedor/solicitud-paso-2'" class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
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
    @else
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border sm:rounded-lg">
                    <div class="py-6 text-gray-900 px-10">

                        <form action="/proveedor/solicitud-paso-3" method="POST">
                            @csrf
                            
                            <input type="hidden" name="idProveedor" value="{{ $proveedor->id }}">

                            <div class=" mb-2">
                                <p style="color: #0f2a3b; font:bold">PASO 3. PERSONA JURIDICA</p>
                            </div>

                            <!-- FILA 1 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="fel_incoterms" :value="__('Código incoterms')" />
                                    <select name="fel_incoterms" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->incoterm)
                                            <option style="color:white;" value="{{ $proveedor->incoterm->id }}">{{ $proveedor->incoterm->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($incoterms as $inco)
                                            <option value="{{ $inco->id }}">{{ $inco->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="fel_descIncoterms" :value="__('Incoterms')" />
                                    <x-text-input value="{{ $proveedor->fel_descIncoterms }}" class="w-full py-1 text-sm" id="fel_descIncoterms" type="text" name="fel_descIncoterms" autofocus autocomplete="fel_descIncoterms" />
                                </div>
                            </div>

                            <!-- FILA 2 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpInscripcionRC" :value="__('Número de inscripción registro de comercio *')" />
                                    <x-text-input required value="{{ $proveedor->cmpInscripcionRC }}" class="w-full py-1 text-sm" id="cmpInscripcionRC" type="text" name="cmpInscripcionRC" autofocus autocomplete="cmpInscripcionRC" />
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpInscripcionRL" :value="__('Número de inscripción representante legal *')" />
                                    <x-text-input required value="{{ $proveedor->cmpInscripcionRL }}" class="w-full py-1 text-sm" id="cmpInscripcionRL" type="text" name="cmpInscripcionRL" autofocus autocomplete="cmpInscripcionRL" />
                                </div>
                            </div>

                            <!-- FILA 3 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="fel_RecintoFiscal" :value="__('Recinto fiscal')" />
                                    <select name="fel_RecintoFiscal" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->recinto)
                                            <option style="color:white;" value="{{ $proveedor->recinto->id }}">{{ $proveedor->recinto->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($recintos as $recinto)
                                            <option value="{{ $recinto->id }}">{{ $recinto->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="fel_regimen" :value="__('Régimen de exportación')" />
                                    <select name="fel_regimen" class="w-full py-1 text-sm border-gray-300 focus:border-[#b7c141]  focus:ring-[#bfcd30]  rounded-md shadow-sm">
                                        @if($proveedor->regimen)
                                            <option style="color:white;" value="{{ $proveedor->regimen->id }}">{{ $proveedor->regimen->nombre }}</option>
                                        @else
                                            <option style="color:white;" value=""> -- seleccione -- </option>
                                        @endif
                                        @foreach ($regimen as $reg)
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- FILA 4 -->
                            <div class="lg:flex gap-4">
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpYearsOperando" :value="__('Años de operación de la empresa *')" />
                                    <x-text-input required value="{{ $proveedor->cmpYearsOperando }}" class="w-full py-1 text-sm" id="cmpYearsOperando" type="number" min="1" name="cmpYearsOperando" autofocus autocomplete="cmpYearsOperando" />
                                </div>
                                <div class="mt-3 lg:w-1/2">
                                    <x-input-label for="cmpNumEmpleados" :value="__('Número de empleados de la empresa *')" />
                                    <x-text-input required value="{{ $proveedor->cmpNumEmpleados }}" class="w-full py-1 text-sm" id="cmpNumEmpleados" type="number" min="1" name="cmpNumEmpleados" autofocus autocomplete="cmpNumEmpleados" />
                                </div>
                            </div>

                            <div class="flex items-center justify-start mt-3">
                                <p class="text-red-500 text-xs">* Campos obligatorios </p>
                            </div>

                            <!-- FILA 5 -->
                            <div class="lg:flex items-center justify-between">
                                <div class="mt-3 lg:w-1/2">
                                    <div class="flex items-center justify-start mt-3">
                                        <button type="button" onclick="window.location.href='/proveedor/solicitud-paso-2'" class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
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
    @endif

    <x-js-codigo-pais/>
</x-app-layout>