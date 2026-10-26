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

    public function showLoginForm()
    {
        return $this->showLogin();
    }

    public function login(Request $request)
    {
        $loginInput = $request->input('email');
        $password = $request->input('password');

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $remember = (bool) $request->has('remember');
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if (Auth::attempt([$fieldType => $loginInput, 'password' => $password], $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return redirect()->intended(route('home'))->with('success', 'Welcome back, ' . $user->name . '! You are now signed in.');
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

    public function showRegisterForm()
    {
        return $this->showRegister();
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address_line1' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:10',
            'postcode' => 'nullable|string|max:10',
            'medicare_number' => 'nullable|string|max:50',
            'medicare_ref' => 'nullable|string|max:5',
            'medicare_expiry' => 'nullable|string|max:10',
            'terms' => 'nullable',
        ];

        if ($request->has('password_confirmation')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        $validated = $request->validate($rules);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'patient',
            'phone' => $validated['phone'] ?? '0411174173',
            'date_of_birth' => $validated['date_of_birth'] ?? now()->subYears(25)->toDateString(),
            'gender' => $validated['gender'] ?? 'prefer_not_to_say',
            'address_line1' => $validated['address_line1'] ?? 'Telehealth Patient',
            'city' => $validated['city'] ?? 'Berwick',
            'state' => $validated['state'] ?? 'VIC',
            'postcode' => $validated['postcode'] ?? '3806',
            'medicare_number' => $validated['medicare_number'] ?? null,
            'medicare_ref' => $validated['medicare_ref'] ?? null,
            'medicare_expiry' => $validated['medicare_expiry'] ?? null,
            'is_active' => true,
        ]);

        Auth::login($user);

        return redirect()->intended(route('home'))->with('success', 'Account created successfully! Welcome to Zymika Health.');
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
