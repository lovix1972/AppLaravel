<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'reparto' => 'required|string|min:1',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'reparto' => $validatedData['reparto'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('registerUser')->with('success', 'Registrazione avvenuta con successo');
    }

    public function login(Request $request)
    {
        // 1. Valida tutti i campi, incluso 'reparto'
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'reparto' => 'required',
        ]);

        // 2. Crea un array di credenziali SOLO con 'email' e 'password'
        $credential = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],

        ];

        if (Auth::attempt($credential)) {
            // Il login ha successo, ora reindirizziamo
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Login riuscito');
        }

        // Il login fallisce, torna indietro con l'errore
        return back()->withErrors([
            'email' => 'Credenziali errate!',
        ])->onlyInput('email');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('utenti')->with('success', 'Utente eliminato con successo');
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function userlist()
    {
        if (Auth::check()) {
            $users = User::all();

            return view('pages.userlist', ['users' => $users]);
        } else {
            return redirect('login');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Logout riuscito');
    }




}
