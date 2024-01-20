<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PeminjamanController;

class PeminjamanController extends Controller
{
    public function index() {

        return view('peminjaman.index');
    }
}
