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
       return view('pages.register');
   }
   public function register(Request $request)
   {

       $validatedData = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email',
           'password' => 'required|string|min:8',
           'reparto' => 'required|string|min:1'
       ]);
       //dd($validatedData);
       $user = User::create ([
           'name'=>$validatedData['name'],
           'email'=>$validatedData['email'],
           'reparto'=>$validatedData['reparto'],
           'password'=> Hash::make($validatedData['password'])
       ]);

       Auth::login($user);
       return redirect()->route('showUserForm')->with('success','Registrazione avvenuta con successo');
   }
    public function login(Request $request)
    {

        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'reparto' => 'required'
        ]);
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Login riuscito');
        }
        return back()->withErrors([
            'email' => 'Credenziali errate!',

        ])->onlyInput('email');
    }

public function deleteUser($id){
       $user = User::findOrFail($id);
       $user->delete();
       return redirect('utenti')->with('success','Utente eliminato con successo');
}
public function showLoginForm()
{

       return view('pages.login');
}

public function userlist(){
if(Auth::check()){
        $users = User::all();
        return view('pages.userlist',['users'=>$users]);
    }else{
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
