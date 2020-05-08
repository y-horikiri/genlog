<?php

namespace App\Http\Controllers;

use App\Models\StringHistory;
use Illuminate\Http\Request;
use App\Models\Gear;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

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
            $histories = StringHistory::whereHas('Gear', function ($q) {
                return $q->where('user_id', Auth::id());
            })->get();

            // 交換目安メッセージ
            $indication_messages = [];
            foreach ($histories as $history) {
                $indication_messages[] = [$history->gear_id => $history->indicationMessage];
            }

            return view('pages/index', ['gears' => $gears]);
        } else {
            // 未ログイン時
            return view('pages/index_beforeLogin');
        }
    }
}
