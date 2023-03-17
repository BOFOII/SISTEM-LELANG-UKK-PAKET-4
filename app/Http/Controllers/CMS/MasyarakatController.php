<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.verify');
    }

    public function index() {
        $user_list = Masyarakat::with('avatar')->get();
        return view('cms.masyarakat.index', compact('user_list'));
    }
}
