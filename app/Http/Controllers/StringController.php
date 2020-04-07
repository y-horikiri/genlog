<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\StringHistory;
use Illuminate\Http\Request;

class StringController extends Controller
{
    //
    public function index(Request $request)
    {
        $gear = Gear::find($request->gear_id);
        $data = ['gear' => $gear];

        return view('/pages/newstring', $data);
    }

    /**
     * 登録処理
     * @param Request $request
     */
    public function create(Request $request)
    {
        // キャンセルボタンが押された場合、何もせずトップページに戻る
        if ($request->get('action') === 'キャンセル') {
            return redirect('/');
        }

        $newString = new StringHistory();
        $form = $request->all();
        unset($form['_token']);
        $newString->user_id = '1';
        $newString->fill($form)->save();

        return redirect('/');
    }
}
