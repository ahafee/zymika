<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = (bool) $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'address_line1' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:10',
            'postcode' => 'required|string|max:10',
            'medicare_number' => 'nullable|string|max:50',
            'medicare_ref' => 'nullable|string|max:5',
            'medicare_expiry' => 'nullable|string|max:10',
            'terms' => 'required|accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'patient',
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'address_line1' => $validated['address_line1'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'postcode' => $validated['postcode'],
            'medicare_number' => $validated['medicare_number'] ?? null,
            'medicare_ref' => $validated['medicare_ref'] ?? null,
            'medicare_expiry' => $validated['medicare_expiry'] ?? null,
        ]);

        Auth::login($user);

        return redirect()->route('patient.dashboard')->with('success', 'Account created successfully! Welcome to ZYMIKA HEALTH Patient Portal.');
    }

    public function showForgotPassword()
    {
        return view('pages.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        return back()->with('status', 'A password reset link has been dispatched to your email address.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function redirectBasedOnRole(User $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->isDoctor()) {
            return redirect()->route('doctor.dashboard');
        }

        return redirect()->route('patient.dashboard');
    }
}
