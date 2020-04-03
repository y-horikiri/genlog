<?php

namespace App\Http\Controllers;

use App\Models\StringHistory;
use Illuminate\Http\Request;
use App\Models\Gear;
use phpDocumentor\Reflection\Types\Array_;

class HomeController extends Controller
{
    /**
     * ルートページ
     * @param Request $request
     */
    public function index(Request $request)
    {
        // TODO セッションのユーザーIDを条件にする
        $gears = Gear::where('user_id', 1)
            ->get();
        $histories = StringHistory::whereHas('Gear', function ($q) {
            return $q->where('user_id', 1);
        })->get();

        // 交換目安メッセージ
        $indication_messages = [];
        foreach ($histories as $history) {
            $indication_messages[] = [$history->gear_id => $history->indicationMessage];
        }

        return view('pages/index', ['gears' => $gears]);

    }
}
