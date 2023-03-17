<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\BarangRequest;
use App\Models\Barang;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Barang $barang = null)
    {
        $barang_list = Barang::with('images')->get();
        $barang_detail = $barang;
        return view('cms.barang.index', compact('barang_list', 'barang_detail'));
    }

    public function _store(BarangRequest $request)
    {
        $credential = Arr::except($request->validated(), ['images']);
        $images = $request->validated('images');

        try {
            DB::transaction(function () use ($credential, $images) {
                $barang = Barang::create($credential);
                foreach ($images as $image) {
                    $barang->images()->create([
                        'url' => $image
                    ]);
                }
            });
            return redirect(route('view.barang'))->with('success', 'Berhasil menambahkan barang');
        } catch (Exception $e) {
            return redirect(route('view.barang'))->with('error', $e->getMessage());
        }
    }

    public function _update(Barang $barang, BarangRequest $request) {
        $credential = Arr::except($request->validated(), ['images']);
        $images = $request->images == null ? [] : $request->validated('images');
        try {
            DB::transaction(function () use ($barang, $credential, $images) {
                $barang->update($credential);
                $barang->images()->whereNotIn('url', $images)->delete();
                foreach ($images as $image) {
                    $barang->images()->create([
                        'url' => $image
                    ]);
                }
            });
            return redirect(route('view.barang'))->with('success', 'Berhasil memperbaruhi barang');
        } catch (Exception $e) {
            return redirect(route('view.barang'))->with('error', $e->getMessage());
        }
    }
    
    public function _destroy(Barang $barang) {
        try {
            $barang->delete();
            return redirect(route('view.barang'))->with('success', 'Berhasil menghapus barang');
        } catch (Exception $e) {
            return redirect(route('view.barang'))->with('error', $e->getMessage());
        }
    }
}
