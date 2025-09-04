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

                    <form action="/proveedor/solicitud-paso-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="idProveedor" value="{{ $proveedor->id }}">

                        <div class=" mb-2">
                            <p style="color: #0f2a3b; font:bold">PASO 4. DOCUMENTACION</p>
                        </div>

                        <!-- FILA 1 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="duiRepLeg" :value="__('Fotocopia de documento único de identidad de representante legal: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="duiRepLeg">
                            </div>
                        </div>

                        <!-- FILA 2 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="pasaport" :value="__('Fotocopia de pasaporte o carnet de residencia (extranjero): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="pasaport">
                            </div>
                        </div>

                        <!-- FILA 3 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="idTribuRepLeg" :value="__('Fotocopia de tarjeta de identificación tributaria del representante legal: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="idTribuRepLeg">
                            </div>
                        </div>

                        <!-- FILA 4 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="credeAdmiJD" :value="__('Credencial vigente de elección de administrador o de junta directiva: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="credeAdmiJD">
                            </div>
                        </div>

                        <!-- FILA 5 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="constSociedad" :value="__('Escritura de constitución de la sociedad: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="constSociedad">
                            </div>
                        </div>

                        <!-- FILA 6 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="matriComVige" :value="__('Matrícula de comercio vigente: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="matriComVige">
                            </div>
                        </div>

                        <!-- FILA 7 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="compDomicilioEmp" :value="__('Comprobante de domicilio de la empresa: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="compDomicilioEmp">
                            </div>
                        </div>

                        <!-- FILA 8 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="actaConsti" :value="__('Acuerdo ejecutivo, decreto o acta de constitución (para asociaciones, cooperativas, ONGs, otros): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="actaConsti">
                            </div>
                        </div>

                        <!-- FILA 9 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="nitRegFisc" :value="__('Fotocopia de NIT y número de registro fiscal de la sociedad: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="nitRegFisc">
                            </div>
                        </div>

                        <!-- FILA 10 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="ftcpPoder" :value="__('Fotocopia de poder si firma un apoderado: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="ftcpPoder">
                            </div>
                        </div>

                        <!-- FILA 11 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="duiNitApode" :value="__('Fotocopia de DUI y NIT si firma un apoderado: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="duiNitApode">
                            </div>
                        </div>

                        <!-- FILA 12 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="declaRent" :value="__('Declaración de renta de los últimos dos años: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="declaRent">
                            </div>
                        </div>

                        <!-- FILA 13 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="declaIva" :value="__('Declaración de IVA de los últimos tres meses: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="declaIva">
                            </div>
                        </div>

                        <!-- FILA 14 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="estaFinan" :value="__('Estados financieros auditados de los últimos dos años: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="estaFinan">
                            </div>
                        </div>

                        <!-- FILA 15 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="estaBanc" :value="__('Estados de cuenta bancarios (si aplica): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="estaBanc">
                            </div>
                        </div>

                        <!-- FILA 16 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="refBanc" :value="__('Referencia bancaria (si aplica): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="refBanc">
                            </div>
                        </div>

                        <!-- FILA 17 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="constSueldo" :value="__('Constancia de sueldo (si aplica): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="constSueldo">
                            </div>
                        </div>

                        <!-- FILA 18 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="soportIngExtra" :value="__('Documentación de soporte de ingresos extra (si aplica): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="soportIngExtra">
                            </div>
                        </div>

                        <!-- FILA 19 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="compDomicilio" :value="__('Comprobante de domicilio: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="compDomicilio">
                            </div>
                        </div>

                        <!-- FILA 20 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="tarjRegFisc" :value="__('Fotocopia de tarjeta de registro físcal (si aplica): ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="tarjRegFisc">
                            </div>
                        </div>

                        <!-- FILA 21 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="compVent" :value="__('Compraventas: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="compVent">
                            </div>
                        </div>

                        <!-- FILA 22 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="donac" :value="__('Donación: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="donac">
                            </div>
                        </div>

                        <!-- FILA 23 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="presta" :value="__('Prestamo: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="presta">
                            </div>
                        </div>

                        <!-- FILA 24 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="currEmp" :value="__('Curriculo de la empresa y carta de presentación: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="currEmp">
                            </div>
                        </div>

                        <!-- FILA 25 -->
                        <div class="lg:flex gap-4">
                            <div class="mt-3 lg:w-1/2 flex items-center justify-start">
                                <x-input-label for="listProyect" :value="__('Listado de proyectos ejecutados con montos: ')" />
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <input class="p-1 w-full text-gray-900 border cursor-pointer bg-gray-50" style="font-size: x-small;" type="file" name="listProyect">
                            </div>
                        </div>

                        <div class="flex items-center justify-start mt-3">
                            <p class="text-red-500 text-xs">Los documentos deben subirse en formato PDF </p>
                        </div>

                        <!-- FILA  -->
                        <div class="lg:flex items-center justify-between">
                            <div class="mt-3 lg:w-1/2">
                                <div class="flex items-center justify-start mt-3">
                                    <button type="button" onclick="window.location.href='/proveedor/solicitud-paso-3'" class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
                                        Atras
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 lg:w-1/2">
                                <div class="flex items-center justify-end mt-3">
                                    <button type="submit" class="bg-[#b7c141] inline-flex items-center px-4 py-2 border border-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#0f2a3b] focus:ring-offset-2 transition ease-in-out duration-150">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <x-js-codigo-pais/>
</x-app-layout>