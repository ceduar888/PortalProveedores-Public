<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login')->with('pagina', 'Inicio de Sesión');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

    // Mensaje de confirmacion de cuenta
    public function mensaje(Request $request)
    {
        $correo = $request->query('correo');

        return view('auth.mensaje-confirmacion', [
            'correo' => $correo,
            'pagina' => 'Confirma tu Cuenta'
        ]);
    }

    // Confirmacion de parte del usuario
    public function confirmacionEmail(string $token_email) 
    {
        try {

            $user = User::where('token_email', $token_email)->first();

            if (!$user) {

                return view('auth.confirmacion-cuenta', [
                    'pagina' => 'Confirmación de Cuenta',
                    'error' => true
                ]);
            }

            $user->confirmado = true;
            $user->token_email = '';
            $user->save();

            return view('auth.confirmacion-cuenta', [
                'pagina' => 'Confirmación de Cuenta',
                'error' => false,
                'nombre' => $user->name
            ]);

        } catch (\Exception $ex) {

            $message = $ex->getMessage();

            var_dump('Exception Message: '. $message);
        }
        
    }
}
