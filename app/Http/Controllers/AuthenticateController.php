<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthenticateController extends Controller
{
  
    public function authenticate(Request $request){
        $credentials = $request->only('username', 'password');
        //dd($credentials,Auth::attempt($credentials));
        if (Auth::attempt($credentials)){

            $request->session()->regenerate();
            if(Auth::user()->level == 0){
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/');
        }else{
            return redirect()->back()->with('message-error', 'Login gagal!');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function userManagement(){
        $users = User::all();
        return view('user-management', compact('users'));
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);
    
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'isActive' => true
        ]);

        return redirect()->route('login')->with('message', 'Daftar berhasil, silakan login!');
    }
}
