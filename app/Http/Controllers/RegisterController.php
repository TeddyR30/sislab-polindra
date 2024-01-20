<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    protected $user;
    public function __construct(USER $user)
    {
        $this->user=$user;
    }
    public function index(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 3,
            ]);

           return back()->with('success', 'berhasil');
        }catch(\Throwable $e){
            return back();
        }


    }
}
