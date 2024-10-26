<?php

// Mendefinisikan namespace untuk controller ini
namespace App\Http\Controllers;

// Import class-class yang dibutuhkan
use App\Models\Mustahik;              // Model Mustahik untuk data mustahik
use Illuminate\Http\Request;          // Class untuk menangani HTTP request
use Illuminate\Support\Facades\Auth;  // Facade untuk autentikasi
use App\Models\User;                  // Model User untuk data pengguna
use Illuminate\Support\Facades\Validator;  // Facade untuk validasi
use Illuminate\Validation\Rule;       // Class untuk aturan validasi custom

// Mendefinisikan class UserController yang mewarisi class Controller
class UserController extends Controller
{
    /**
     * Menampilkan daftar user dengan pagination
     */
    public function index()
    {
        // Mengambil data user dengan pagination 10 item per halaman
        $users = User::paginate(10);
        // Mengembalikan view 'user-management' dengan data users
        return view('user-management', compact('users'));
    }
    
    /**
     * Menampilkan form registrasi user baru
     */
    public function create()
    {
        // Mengembalikan view form registrasi
        return view('register');
    }

    /**
     * Menyimpan data user baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required',                  // Nama harus diisi
            'username' => 'required|unique:users', // Username harus unik
            'email' => 'required|email|unique:users', // Email harus valid dan unik
            'password' => 'required|min:8',        // Password minimal 8 karakter
            'confirm-password' => 'required_with:password|same:password|min:8', // Konfirmasi password harus sama
            'level' => 'required',                 // Level user harus diisi
            'isActive' => 'required',             // Status aktif harus diisi
        ]);

        // Membuat user baru dengan data yang sudah divalidasi
        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Mengenkripsi password
            'level' => $validatedData['level'],
            'isActive' => $validatedData['isActive'],
        ]);

        // Redirect ke halaman user-management dengan pesan sukses
        return redirect('/user-management')->with('message', 'Daftar berhasil');
    }

    /**
     * Menampilkan detail user spesifik
     */
    public function show($id)
    {
        // Mencari user berdasarkan ID, jika tidak ada tampilkan 404
        $user = User::findOrFail($id);
        // Menampilkan view detail user
        return view('user-show', compact('user'));
    }

    /**
     * Menampilkan form edit user
     */
    public function edit($id)
    {
        // Mencari user berdasarkan ID untuk diedit
        $user = User::findOrFail($id);
        // Menampilkan form edit dengan data user
        return view('user-edit', compact('user'));
    }

    /**
     * Mengupdate data user yang sudah ada
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diupdate
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes|nullable|confirmed',  // Password optional saat update
            'password_confirmation' => 'sometimes|nullable|same:password|min:8',
            'level' => 'required',
            'isActive' => 'required',
        ]);

        // Cek apakah username atau email berubah
        if ($id !== $validatedData['username'] || $id !== $validatedData['email']) {
          $user = User::findOrFail($id);
          // Validasi tambahan untuk username dan email yang unique
          $validate = $request->validate([
              'username' => Rule::unique('users')->ignore($user->username, 'username'),
              'email' => Rule::unique('users')->ignore($user->username, 'username'),
          ]);
        }

        // Mencari user yang akan diupdate
        $user = User::findOrFail($id);
        // Melakukan update data user
        $user->update([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            // Update password hanya jika ada input password baru
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
            'level' => $validatedData['level'],
            'isActive' => $validatedData['isActive'],
        ]);

        // Redirect berdasarkan level user
        if(Auth::user()->level == 1){
            return redirect()->route('user-profile')->with('message', 'Pengguna berhasil diupdate!');
        }

        return redirect()->route('user-management')->with('message', 'Pengguna berhasil diupdate!');
    }

    /**
     * Menghapus user dari database
     */
    public function destroy($id)
    {
        // Mencari user yang akan dihapus
        $user = User::findOrFail($id);
        // Menghapus user
        $user->delete();

        // Redirect ke halaman user-management dengan pesan sukses
        return redirect()->route('user-management')->with('message', 'Pengguna berhasil dihapus!');
    }

    /**
     * Menampilkan profil user yang sedang login
     */
    public function profile()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Menghitung total survey yang dilakukan oleh user
        $total_survey = Mustahik::selectRaw('users.name, count(*) as total')
            ->leftJoin('users', 'mustahik.user_id', '=', 'users.name')
            ->groupBy('users.name')
            ->where('users.name', $user->name)
            ->first();
            
        // Menampilkan view profil dengan data user dan total survey
        return view('user-profile', compact('user', 'total_survey'));
    }
}