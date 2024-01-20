<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function SuperAdmin() {
        return view('Superadmin.pages.dashboard');
    }
    public function Admin() {
        return view('Admin.pages.dashboard');
    }
    public function Mahasiswa() {

        $userCount = User::count();
        $productCount = Product::count();
        // $peminjamanCount = Peminjaman::count();

        return view('Mahasiswa.pages.dashboard', ['user_count' => $userCount, 'product_count' => $productCount,]);

    }
}
