<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\APNFD;
use App\Models\Banco;
use App\Models\CargoDesempenado;
use App\Models\Departamento;
use App\Models\FuenteIngresos;
use App\Models\Giro;
use App\Models\Incoterms;
use App\Models\Ingresos;
use App\Models\Municipio;
use App\Models\PagosAnticipados;
use App\Models\Pais;
use App\Models\Proveedor;
use App\Models\RecintoFiscal;
use App\Models\Regimen;
use App\Models\TipoContribuyente;
use App\Models\TipoDocumento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProveedorController extends Controller
{
    
    public function edit1()
    {
        try {
            $id = auth()->user()->id;

            $proveedor = Proveedor::where('usuario_id', $id)
                        ->with('tipoPersona')
                        ->with('tipoContribuyente')
                        ->with('pais')
                        ->with('paisNac')
                        ->with('paisDTE')
                        ->with('departamento')
                        ->with('municipio')
                        ->first();

            $tipoContribuyentes = TipoContribuyente::all();
            $paises = Pais::all();
            $departamentos = Departamento::all();
            $municipios = Municipio::all();
            $tipoDocumentos = TipoDocumento::all();

            return view('proveedor.create', [
                'pagina' => 'Solicitud Paso 1',
                'proveedor' => $proveedor,
                'tipoContribuyentes' => $tipoContribuyentes,
                'paises' => $paises,
                'departamentos' => $departamentos,
                'municipios' => $municipios,
                'tipoDocumentos' => $tipoDocumentos
            ]);

        } catch (\Exception $ex) {

            return redirect('/dashboard')->with('error', $ex->getMessage());
        }
    }

    public function store1(Request $request)
    {
        try {
            
            $request->validate([
                'TipoCont' => 'required',
                'cmpNacionalidad' => 'required',
                'fel_nombrePAISDTE' => 'required',
                'fel_DeptoMH' => 'required',
                'fel_MunicipioMH' => 'required',
                'fel_DireccionDTE' => 'required',
                'cmpTipoDoc' => 'required',
                'cmpNumDoc' => 'required',
                'Phone1' => 'required',
                'Cellular' => 'required'
            ]);

            $idProveedor = $request->idProveedor;

            $proveedor = Proveedor::findOrFail($idProveedor);

            $proveedor->TipoCont = $request->TipoCont;
            $proveedor->cmpTipoDoc = $request->cmpTipoDoc;
            $proveedor->cmpNumDoc = $request->cmpNumDoc;
            $proveedor->cmpLugarExp = $request->cmpLugarExp;
            $proveedor->cmpFechaExp = $request->cmpFechaExp;
            $proveedor->cmpFechaVencDoc = $request->cmpFechaVencDoc;
            $proveedor->Cellular = $request->Cellular;
            $proveedor->Phone1 = $request->Phone1;
            $proveedor->cmpNacionalidad = $request->cmpNacionalidad;
            $proveedor->cmpPaisNac = $request->cmpPaisNac;
            $proveedor->cmpLugarNac = $request->cmpLugarNac;
            $proveedor->cmpEstFamiliar = $request->cmpEstFamiliar;
            $proveedor->fel_nombrePAISDTE = $request->fel_nombrePAISDTE;
            $proveedor->fel_DeptoMH = $request->fel_DeptoMH;
            $proveedor->fel_MunicipioMH = $request->fel_MunicipioMH;
            $proveedor->fel_DireccionDTE = $request->fel_DireccionDTE;
            $proveedor->save();

            return redirect('/proveedor/solicitud-paso-2');

        } catch(\Exception $ex) {

            return redirect('/proveedor/solicitud-paso-1')->with('error', $ex->getMessage());
        }
    }

    public function edit2()
    {
        try {
            $id = auth()->user()->id;

            $proveedor = Proveedor::where('usuario_id', $id)
                        ->with('tipoPersona')
                        ->with('tipoDocumento')
                        ->with('giros')
                        ->with('ingresos')
                        ->with('activApnfd')
                        ->with('cargo')
                        ->with('pago')
                        ->with('banco')
                        ->first();

            $giros = Giro::all();
            $ingresos = Ingresos::all();
            $apnfd = APNFD::all();
            $cargos = CargoDesempenado::all();
            $pagos = PagosAnticipados::all();
            $bancos = Banco::all();

            return view('proveedor.create2', [
                'pagina' => 'Solicitud Paso 2',
                'proveedor' => $proveedor,
                'giros' => $giros,
                'ingresos' => $ingresos,
                'apnfd' => $apnfd,
                'cargos' => $cargos,
                'pagos' => $pagos,
                'bancos' => $bancos
            ]);

        } catch (\Exception $ex) {

            return redirect('/proveedor/solicitud-paso-1')->with('error', $ex->getMessage());
        }
    }

    public function store2(Request $request)
    {
        try{

            $request->validate([
                'cmpActEcon' => 'required',
                'fel_ActivEconMH' => 'required',
                'cmpIngreMensual' => 'required',
                'cmpEsAPNFD' => 'required',
                'cmpEsPEP' => 'required',
            ]);

            $idProveedor = $request->idProveedor;

            $proveedor = Proveedor::findOrFail($idProveedor);

            $proveedor->cmpActEcon = $request->cmpActEcon;
            $proveedor->fel_ActivEconMH = $request->fel_ActivEconMH;
            $proveedor->cmpIngreMensual = $request->cmpIngreMensual;
            $proveedor->cmpEsAPNFD = $request->cmpEsAPNFD;
            $proveedor->cmpEsPEP = $request->cmpEsPEP;
            $proveedor->cmpCargoPEP = $request->cmpCargoPEP;
            $proveedor->cmpPEPDesde = $request->cmpPEPDesde;
            $proveedor->cmpPEPHasta = $request->cmpPEPHasta;
            $proveedor->cmpFrecPagoAntic = $request->cmpFrecPagoAntic;
            $proveedor->cmpMontoPagoAntic = $request->cmpMontoPagoAntic;
            $proveedor->BackCode = $request->BankCode;
            $proveedor->numero_cuenta = $request->numero_cuenta;
            $proveedor->tipo_cuenta = $request->tipo_cuenta;
            $proveedor->save();

            return redirect('/proveedor/solicitud-paso-3');

        }catch(\Exception $ex){

            return redirect('/proveedor/solicitud-paso-2')->with('error', $ex->getMessage());
        }
    }

    public function edit3()
    {
        try {
            $id = auth()->user()->id;

            $proveedor = Proveedor::where('usuario_id', $id)
                        ->with('fuenteIngresos')
                        ->with('dptoTrabajo')
                        ->with('municTrabajo')
                        ->with('ingresosAdic')
                        ->with('fuenteIngOtros')
                        ->with('incoterm')
                        ->with('regimen')
                        ->with('recinto')
                        ->first();

            $fuenteDeIngresos = FuenteIngresos::all();
            $departamentos = Departamento::all();
            $municipios = Municipio::all();
            $ingresos = Ingresos::all();
            $incoterms = Incoterms::all();
            $regimen = Regimen::all();
            $recintos = RecintoFiscal::all();

            return view('proveedor.create3', [
                'pagina' => 'Solicitud Paso 3',
                'proveedor' => $proveedor,
                'fuenteDeIngresos' => $fuenteDeIngresos,
                'departamentos' => $departamentos,
                'municipios' => $municipios,
                'ingresos' => $ingresos,
                'incoterms' => $incoterms,
                'regimen' => $regimen,
                'recintos' => $recintos
            ]);

        } catch (\Exception $ex) {

            return redirect('/proveedor/solicitud-paso-2')->with('error', $ex->getMessage());
        }
    }

    public function store3(Request $request)
    {
         try{
            // Validar que tipo de persona es
            $idProveedor = $request->idProveedor;

            $proveedor = Proveedor::findOrFail($idProveedor);

            if($proveedor->fel_tipo_persona == 1){

                $request->validate([
                    'cmpFuenteIng' => 'required',
                ]);

                $proveedor->cmpFuenteIng = $request->cmpFuenteIng;
                $proveedor->cmpLugarTrabajo = $request->cmpLugarTrabajo;
                $proveedor->cmpDptoJob = $request->cmpDptoJob;
                $proveedor->cmpMunicJob = $request->cmpMunicJob;
                $proveedor->cmpDirLugTrab = $request->cmpDirLugTrab;
                $proveedor->cmpCargoDesemp = $request->cmpCargoDesemp;
                $proveedor->cmpEmailJob = $request->cmpEmailJob;
                $proveedor->cmpCelularJob = $request->cmpCelularJob;
                $proveedor->cmpFuenteIngOtros = $request->cmpFuenteIngOtros;
                $proveedor->cmpLugarTrabOtro = $request->cmpLugarTrabOtro;
                $proveedor->cmpCargoOtro = $request->cmpCargoOtro;
                $proveedor->cmpEmailOtro = $request->cmpEmailOtro;
                $proveedor->cmpIngreAdic = $request->cmpIngreAdic;
                $proveedor->save();

                return redirect('/proveedor/solicitud-paso-4');
            }

            $request->validate([
                'cmpInscripcionRC' => 'required',
                'cmpInscripcionRL' => 'required',
                'cmpYearsOperando' => 'required',
                'cmpNumEmpleados' => 'required',
            ]);

            $proveedor->fel_incoterms = $request->fel_incoterms;
            $proveedor->fel_descIncoterms = $request->fel_descIncoterms;
            $proveedor->cmpInscripcionRC = $request->cmpInscripcionRC;
            $proveedor->cmpInscripcionRL = $request->cmpInscripcionRL;
            $proveedor->fel_RecintoFiscal = $request->fel_RecintoFiscal;
            $proveedor->fel_regimen = $request->fel_regimen;
            $proveedor->cmpYearsOperando = $request->cmpYearsOperando;
            $proveedor->cmpNumEmpleados = $request->cmpNumEmpleados;
            $proveedor->save();

            return redirect('/proveedor/solicitud-paso-4');

        }catch(\Exception $ex){

            return redirect('/proveedor/solicitud-paso-3')->with('error', $ex->getMessage())->withInput();
        }
    }

    public function edit4()
    {
        try{

            $id = auth()->user()->id;

            $proveedor = Proveedor::where('usuario_id', $id)
                        ->first();

            return view('proveedor.create4', [
                'pagina' => 'Solicitud Paso 4',
                'proveedor' => $proveedor
            ]);

        }catch(\Exception $ex){

            return redirect('/proveedor/solicitud-paso-3')->with('error', $ex->getMessage());
        }
    }

    public function store4(Request $request)
    {
        try {

            $campos = [
                'duiRepLeg',
                'pasaport',
                'idTribuRepLeg',
                'credeAdmiJD',
                'constSociedad',
                'matriComVige',
                'compDomicilioEmp',
                'actaConsti',
                'nitRegFisc',
                'ftcpPoder',
                'duiNitApode',
                'declaRent',
                'declaIva',
                'estaFinan',
                'estaBanc',
                'refBanc',
                'constSueldo',
                'soportIngExtra',
                'compDomicilio',
                'tarjRegFisc',
                'compVent',
                'donac',
                'presta',
                'currEmp',
                'listProyect',
                'id_proveedor',
            ];

            $anexosData = [];

            foreach ($campos as $campo) {
                $anexosData[$campo] = $this->guardarArchivo($request, $campo);
            }

            $idUsuario = auth()->user()->id;
            $usuario = User::findOrFail($idUsuario);
            $usuario->completado = true;
            $usuario->save();

            $idProveedor = $request->idProveedor;
            $anexosData['id_proveedor'] = $idProveedor;

            $adjuntos = Anexo::where('id_proveedor', $idProveedor)->first();

            if(!$adjuntos){
                Anexo::create($anexosData);
            }else{
                $adjuntos->update($anexosData);
            }

            return redirect('/dashboard')->with('success', 'Datos guardados con éxito, espera la confirmación de aprobación de tu solicitud');

        } catch(\Exception $ex){

            return redirect('/proveedor/solicitud-paso-4')->with('error', $ex->getMessage());
        }
    }

    private function guardarArchivo(Request $request, $campo)
    {
        $proveedor = $request->idProveedor;

        if ($request->hasFile($campo) && $request->file($campo) instanceof \Illuminate\Http\UploadedFile) {
            $archivo = $request->file($campo);
            $fecha = now()->format('Y-m-d');
            $nombre = "{$fecha}_PROV{$proveedor}_{$archivo->getClientOriginalName()}";
            $ruta = $archivo->storeAs('public/anexos', $nombre);
            return Storage::url($ruta);
        }

        return null;
    }
}
