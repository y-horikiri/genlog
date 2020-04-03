<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gear;

class HomeController extends Controller
{
    /**
     * ルートページ
     * @param Request $request
     */
    public function index(Request $request)
    {
        // TODO セッションのユーザーIDを条件にする
//        $gears = Gear::all();
        $gears = Gear::where('user_id', 1)
            ->get();
        return view('pages/index', ['gears' => $gears]);

    }
}
