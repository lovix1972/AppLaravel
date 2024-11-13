<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
   public function showRegistrationForm()
   {
       return view('register');
   }
   public function register(Request $request)
   {

       $validatedData = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email',
           'password' => 'required|string|min:8',

       ]);

       $user = User::create ([
           'name'=>$validatedData['name'],
           'email'=>$validatedData['email'],
           'password'=> Hash::make($validatedData['password']),
       ]);
       //Auth::login($user);
       return redirect()->route('showRegisterForm')->with('success','Registrazione avvenuta con successo');
   }

public function deleteUser($id){
       $user = User::findOrFail($id);
       $user->delete();
       return redirect()->route('utenti')->with('success','Utente eliminato con successo');
}
public function showLoginForm()
{

       return view('login');
}
public function login(Request $request)
{
$credential = $request->validate([
    'email' => 'required|email',
    'password' => 'required',
]);
if (Auth::attempt($credential)) {
    $request->session()->regenerate();
    return redirect()->intended('/home')->with('success', 'Login riuscito');
}
return back()->withErrors([
    'email' => 'Email o password errati',

])->onlyInput('email');
}

public function logout(Request $request)
{
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('showLoginForm');
}
}
