<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  
    public function index()
    {
        $users = User::paginate(10);
        return view('user-management', compact('users'));
    }
    

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm-password' => 'required_with:password|same:password|min:8',
            'level' => 'required',
            'isActive' => 'required',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'level' => $validatedData['level'],
            'isActive' => $validatedData['isActive'],
        ]);

        return redirect('/user-management')->with('message', 'Daftar berhasil');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user-show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes|nullable|confirmed',
            'password_confirmation' => 'sometimes|nullable|same:password|min:8',
            'level' => 'required',
            'isActive' => 'required',
        ]);
        //dd($validatedData);
        if ($id !== $validatedData['username'] || $id !== $validatedData['email']) {
          $user = User::findOrFail($id);
          $validate = $request->validate([
              'username' => Rule::unique('users')->ignore($user->username, 'username'),
              'email' => Rule::unique('users')->ignore($user->username, 'username'),
          ]);
        }

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'level' => $validatedData['level'],
            'isActive' => $validatedData['isActive'],
        ]);

        if(Auth::user()->level == 1){
            return redirect()->route('user-profile')->with('message', 'Pengguna berhasil diupdate!');
        }

        return redirect()->route('user-management')->with('message', 'Pengguna berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user-management')->with('message', 'Pengguna berhasil dihapus!');
    }

public function profile()
{
    $user = Auth::user();

    $total_survey = Mustahik::selectRaw('users.name, count(*) as total')->leftJoin('users', 'mustahik.user_id', '=', 'users.name')->groupBy('users.name')->where('users.name', $user->name)->first();
    return view('user-profile', compact('user', 'total_survey'));
}

}
