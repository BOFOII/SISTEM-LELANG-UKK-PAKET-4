<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $barangCount = Barang::count();
        $lelangCount = Lelang::count();
        $petugasCount = Petugas::where('id_level', 2)->count();
        $adminCount =  Petugas::where('id_level', 1)->count();
        return view('cms.home.index', compact('barangCount', 'lelangCount', 'petugasCount', 'adminCount'));
    }
}
