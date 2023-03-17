<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index() {
        $lelang_list = null;
        if(Auth::guard('cms')->user()->level->level == 'petugas') {
            $lelang_list = Auth::guard('cms')->user()->lelangs()->with(['barang.images', 'petugas', 'winner'])->where('status', 'ditutup')->get();
        } else {
            $lelang_list = Lelang::with(['barang.images', 'petugas', 'winner'])->where('status', 'ditutup')->get();
        }
        return view('cms.laporan.index', compact('lelang_list'));
    }
}
