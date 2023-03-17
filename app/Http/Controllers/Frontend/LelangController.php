<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LelangRequest;
use App\Models\History;
use App\Models\Lelang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    public function index(Lelang $lelang)
    {
        // if($lelang->status == 'ditutup') {
        //     return redirect('/');
        // }

        $barang = $lelang->barang;
        $participans = $lelang->histories()->with('user')->get();
        $submited = null;

        if(Auth::guard('frontend')->check()) {
            $submited = $lelang->isSubmited(Auth::guard('frontend')->user()->id_user)->first();
        };


        return view('frontend.lelang.index', compact('lelang', 'barang', 'participans', 'submited'));
    }

    public function _store(Lelang $lelang, LelangRequest $request)
    {
        if($lelang->tgl_lelang > now()->toDateString()) {
            return back()->with('error', 'Lelang belum dimulai');
        }

        $submited = $lelang->isSubmited(Auth::guard('frontend')->user()->id_user)->first();

        if($submited) {
            return abort(404);
        }

        $harga_awal = $lelang->barang->harga_awal;

        if ($request->validated('penawaran_harga') <= $harga_awal) {
            return back()->withErrors([
                'penawaran_harga' => 'Harga yang anda berikan lebih rendah dari harga awal'
            ])->onlyInput('penawaran_harga');
        }

        try {
            $lelang->histories()->create([
                'id_barang' => $lelang->id_barang,
                'id_user' => Auth::guard('frontend')->user()->id_user,
                'penawaran_harga' => $request->validated('penawaran_harga'),
            ]);
            return back()->with('success', 'Berhasil menambahkan tawaran');
        } catch (Exception $e) {
            return redirect(route('view.barang'))->with('error', $e->getMessage());
        }
    }

    public function _update(Lelang $lelang, History $history, LelangRequest $request) {
        // $harga_awal = $lelang->barang->harga_awal;

        // if ($request->validated('penawaran_harga') <= $harga_awal) {
        //     return back()->withErrors([
        //         'penawaran_harga' => 'Harga yang anda berikan lebih rendah dari harga awal'
        //     ])->onlyInput('penawaran_harga');
        // }

        // try {
        //     $history->update($request->validated());
        //     return back()->with('success', 'Berhasil mengubah tawaran');
        // } catch (Exception $e) {
        //     return redirect(route('view.barang'))->with('error', $e->getMessage());
        // }
    }

    public function _destroy(Lelang $lelang, History $history) {
        // try {
        //     $history->delete();
        //     return back()->with('success', 'Berhasil mengundurkan diri dari lelang');
        // } catch (Exception $e) {
        //     return redirect(route('view.barang'))->with('error', $e->getMessage());
        // }
    }
}
