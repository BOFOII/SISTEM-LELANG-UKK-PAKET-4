<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:frontend');
    }

    public function _all() {
        $notifications = Auth::guard('frontend')->user()->notifications()->where('status', 'belum_dibaca')->get(['id', 'message', 'status']);
        return response()->json([
            'data' => $notifications
        ]);
    }

    public function  _readall()
    {
        try {
            $notifications = Auth::guard('frontend')->user()->notifications;

            foreach ($notifications as $notif) {
                $notif->update([
                    'status' => 'dibaca'
                ]);
            }

            return back()->with('success', 'Berhasil membaca semua notifikasi');
        } catch (Exception $e) {
            return redirect(route('view.barang'))->with('error', $e->getMessage());
        }
    }
}
