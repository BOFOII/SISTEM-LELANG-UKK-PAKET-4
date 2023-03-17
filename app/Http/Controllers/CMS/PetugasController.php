<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\PetugasRequest;
use App\Models\Level;
use App\Models\Petugas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index(Petugas $petugas = null)
    {
        $petugas_list = Petugas::all();
        $petugas_detail = $petugas;
        $level_list = Level::all();
        return view('cms.petugas.index', compact('petugas_list', 'petugas_detail', 'level_list'));
    }

    public function _store(PetugasRequest $request)
    {
        $credential = Arr::except($request->validated(), ['image']);
        $image = $request->validated('image');

        try {
            DB::transaction(function () use ($credential, $image) {
                $petugas = Petugas::create($credential);
                $petugas->avatar()->create([
                    'url' => $image
                ]);
            });
            return redirect(route('view.petugas.cms'))->with('success', 'Berhasil menambah petugas baru');
        } catch (Exception $e) {
            return redirect(route('view.petugas.cms'))->with('error', $e->getMessage());
        }
    }

    public function _update(Petugas $petugas, PetugasRequest $request)
    {
        $credential = Arr::except($request->validated(), ['image']);
        $image = $request->validated('image');
        try {
            DB::transaction(function () use ($petugas, $credential, $image) {
                $petugas->update(array_filter($credential));

                if($petugas->avatar() !== null && $image != null) {
                    $petugas->avatar()->update([
                        'url' => $image
                    ]);
                }
                
                if ($petugas->avatar() == null && $image != null) {
                    $petugas->avatar()->create([
                        'url' => $image
                    ]);
                }

            });
            return redirect(route('view.petugas.cms'))->with('success', 'Berhasil meperbaruhi petugas');
        } catch (Exception $e) {
            return redirect(route('view.petugas.cms'))->with('error', $e->getMessage());
        }
    }

    public function _destroy(Petugas $petugas)
    {
        try {
            $petugas->delete();
            return redirect(route('view.petugas.cms'))->with('success', 'Berhasil menghapus petugas');
        } catch (Exception $e) {
            return redirect(route('view.petugas.cms'))->with('error', $e->getMessage());
        }
    }
}
