<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lelang;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $search = request()->query('search');

        $lelang_list = Lelang::with(['barang.images', 'winner'])->when($search, function($query, $search) {
            return $query->whereHas('barang', function($query) use ($search) {
                $query->where('nama_barang', 'like', "%{$search}%");
            });
        });

        $lelang_count = $lelang_list->count();
        $lelang_list = $lelang_list->paginate(10);
        return view('frontend.dashboard.index', compact('lelang_list', 'lelang_count'));
    }
}
