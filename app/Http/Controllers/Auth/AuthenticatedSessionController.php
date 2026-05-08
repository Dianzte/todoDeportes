<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use DragonCode\Support\Concerns\Validation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

    if (Cookie::has('usuario_bloqueado')){
        throw ValidationException::withMessages([
            'name' => 'Usuario bloqueado temporalmente. Intente nuevamente más tarde.',
        ]);
    }

    try {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(route('equipos.index', absolute: false));
    } catch (ValidationException $e) {
        //aqui se usan las cookies
        $intentos = (int) Cookie::get('intentos_login', 0) + 1;

        if ($intentos >= 3) {
            Cookie::queue('usuario_bloqueado', true, 1);
            Cookie::queue(Cookie::forget('intentos_login')); 
        
            throw ValidationException::withMessages([
            'name' => 'Usuario bloqueado temporalmente. Intente nuevamente más tarde.',
            ]);
        } 
        
        Cookie::queue('intentos_login', $intentos, 1); 
        
        throw $e;
    }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
