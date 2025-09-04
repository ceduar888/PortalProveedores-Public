<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmacionMail;
use App\Models\Proveedor;
use App\Models\TipoDocumento;
use App\Models\TipoPersona;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $pagina = 'Registro de Proveedores';

        $tipoPersonas = TipoPersona::all();

        $tipoDocumentos = TipoDocumento::all();

        return view('auth.register', [
            'pagina' => $pagina,
            'tipoPersonas' => $tipoPersonas,
            'tipoDocumentos' => $tipoDocumentos
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validaciones
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class, 'confirmed'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_persona' => ['required', 'string'],
            'nom_comercial' => [ 'string'],
            'tipo_documento' => ['required', 'string'],
            'num_documento' => ['required', 'string'],
            'num_telefono' => ['string'],
            'num_celular' => ['required', 'string']
        ]);

        $token = Str::random(64);

        DB::beginTransaction();

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'completado' => false,
            'confirmado' => false,
            'token_email' => $token
        ]);

        event(new Registered($user));

        // Crear el proveedor
        $proveedor = Proveedor::create([
            'fel_tipo_persona' => $request->tipo_persona,
            'CardName' => $request->name,
            'CardFName' => $request->nom_comercial,
            'cmpTipoDoc' => $request->tipo_documento,
            'cmpNumDoc' => $request->num_documento,
            'Phone1' => $request->num_telefono,
            'Cellular' => $request->num_celular,
            'fel_emailDTE' => $request->email,
            'usuario_id' => $user->id
        ]);

        DB::commit();

        // Enviar el correo con el token
        Mail::to($user->email)->send(new ConfirmacionMail($user));

        $correo = $proveedor->correo;

        // Redirigir a la pagina de confirmacion de envio de correo con el email del usuario
        return redirect()->route('mensaje-email', [
            'correo' => $correo
        ]);
                    
    }
}
