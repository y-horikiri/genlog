<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gear;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * ルートページ
     * @param Request $request
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $gears = Gear::where('user_id', Auth::id())
                ->paginate(10);

            return view('pages/index', ['gears' => $gears]);
        } else {
            // 未ログイン時
            return view('pages/index_beforeLogin');
        }
    }
}
