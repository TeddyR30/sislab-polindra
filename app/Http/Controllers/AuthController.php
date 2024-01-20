<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    protected $user;
    public function __construct(USER $user)
    {
        $this->user=$user;
    }
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function process(Request $request)
    {
        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            return redirect('/')->with('error', 'user tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect('/')->with('error', 'email & password salah');
        }

        if (Auth::attempt(["email"=> $request->email, "password"=> $request->password])) {
            $request->session()->regenerate();

            if ($user->role_id==1) {
                return redirect('superadmin/dashboard');
            } elseif ($user->role_id==2) {
                return redirect('admin/dashboard');
            } elseif ($user->role_id==3) {
                return redirect('mahasiswa/dashboard');
            }
        } else {
            return back();
        }

    }

    public function logout() {
        Auth::logout();
        return redirect('/');

    }
}
