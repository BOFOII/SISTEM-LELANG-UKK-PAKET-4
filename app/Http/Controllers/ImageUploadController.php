<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function _upload(Request $request) {
        $request->validate([
            'file' => ['required', 'file', 'mimes:png,jpg,jpeg']
        ]);

        $image = $request->file('file');
        $store = $image->store('images', 'public');
        $url = Storage::disk('public')->url($store);
        return response()->json([
            'url' => $url
        ]);
    }
}
