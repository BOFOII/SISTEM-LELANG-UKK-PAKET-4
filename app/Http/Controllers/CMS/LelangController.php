<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\LelangRequest;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Notification;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LelangController extends Controller
{

    public function __construct()
    {
        $this->middleware('petugas.verify');
    }

    public function index(Lelang $lelang = null)
    {

        $lelang_list = Auth::guard('cms')->user()->lelangs()->with(['barang.images', 'petugas', 'winner'])->get();
        $barang_list = Barang::with('images')->get();
        $lelang_detail = $lelang;
        return view('cms.lelang.index', compact('lelang_list', 'lelang_detail', 'barang_list'));
    }

    public function _store(LelangRequest $request)
    {
        $credential = $request->validated();
        try {
            Auth::guard('cms')->user()->lelangs()->create($credential);
            return redirect(route('view.lelang.cms'))->with('success', 'Berhasil menambahkan lelang');
        } catch (Exception $e) {
            return redirect(route('view.lelang.cms'))->with('error', $e->getMessage());
        }
    }

    public function _update(Lelang $lelang, LelangRequest $request)
    {
        try {
            $lelang->update(array_filter($request->validated()));
            return redirect(route('view.lelang.cms'))->with('success', 'Berhasil memperbaruhi lelang');
        } catch (Exception $e) {
            return redirect(route('view.lelang.cms'))->with('error', $e->getMessage());
        }
    }

    public function _open(Lelang $lelang)
    {
        try {
            $data = [
                'harga_akhir' => null,
                'id_user' => null,
                'status' => 'dibuka',
            ];

            $lelang->update($data);
            return redirect(route('view.lelang.cms'))->with('success', 'Berhasil membuka lelang');
        } catch (Exception $e) {
            return redirect(route('view.lelang.cms'))->with('error', $e->getMessage());
        }
    }

    public function _close(Lelang $lelang)
    {
        try {
            // $history = $lelang->histories;

            // if (empty($history)) {
            //     return redirect(route('view.lelang.cms'))->with('error', 'Lelang tidak memiliki peserta');
            // }

            $winner = $lelang->histories()->limit(1)->first();
            
            if ($winner == null) {
                return redirect(route('view.lelang.cms'))->with('error', 'Lelang tidak memiliki peserta');
            }

            DB::transaction(function () use ($winner, $lelang) {
                $lelang->update([
                    'harga_akhir' => $winner->penawaran_harga,
                    'id_user' => $winner->id_user,
                    'status' => 'ditutup',
                ]);

                $winner->user->notifications()->create([
                    'message' => 'Selamat, Tawaran anda berhasil terpilih sebagai pemenang'
                ]);
            });

            return redirect(route('view.lelang.cms'))->with('success', 'Berhasil menutup lelang');
        } catch (Exception $e) {
            return redirect(route('view.lelang.cms'))->with('error', $e->getMessage());
        }
    }

    public function _destroy(Lelang $lelang)
    {
        try {
            $lelang->delete();
            return redirect(route('view.lelang.cms'))->with('success', 'Berhasil menghapus lelang');
        } catch (Exception $e) {
            return redirect(route('view.lelang.cms'))->with('error', $e->getMessage());
        }
    }
}
