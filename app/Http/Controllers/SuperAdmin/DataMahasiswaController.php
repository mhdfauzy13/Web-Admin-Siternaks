<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMahasiswaController extends Controller
{
   public function index()
    {
        return view('Superadmin.Pengguna.Datamahasiswa');
    }
}
