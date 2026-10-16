<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the login view.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $guestSessionId = $request->session()->getId();

        $request->authenticate();

        $user = Auth::user();

        if ($user && $guestSessionId) {
            CartService::migrateGuestCart($user->id, $guestSessionId);
        }

        // Crucial security: Regenerate session ID to prevent Session Fixation attacks
        $request->session()->regenerate();

        if ($user && $user->isSuperAdmin()) {
            return redirect()->route('superadmin.index')->with('success', 'Selamat datang Super Administrator Pande Oka.');
        }

        return redirect()->intended(route('home'))->with('success', 'Selamat datang kembali! Anda berhasil masuk ke akun.');
    }

    /**
     * Show the registration view.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming customer registration request.
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        // Safe Eloquent creation using PDO prepared statements (100% SQL injection safe)
        // Password is automatically hashed securely via User model casts
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'role' => UserRole::User,
            'phone' => $request->validated('phone'),
            'province' => $request->validated('province'),
            'city' => $request->validated('city'),
            'postal_code' => $request->validated('postal_code'),
            'address' => $request->validated('address'),
            'password' => $request->validated('password'),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk dengan akun baru Anda.');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        // Invalidate session and regenerate CSRF token to prevent session hijacking
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Anda telah berhasil keluar dari akun.');
    }
}
