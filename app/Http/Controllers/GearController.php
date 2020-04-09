<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GearController extends Controller
{
    //
    public function index(Request $request)
    {

        return view('/pages/newgear');
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

        $rules = [
            'name' => 'required',
            'type' => 'required|integer',
            'icon_id' => 'required|integer',
            'color' => 'required',
            'string_count' => 'required|integer|between:1,12',
        ];
        $messages = [
            'name.required' => '名前を入力してください。',
            'type.required' => '種類を選択してください。',
            'icon_id.required' => 'アイコンを選択してください。',
            'color.required' => '色を選択してください。',
            'string_count.required' => '弦の本数を入力してください。',
            'string_count.integer' => '弦の本数は整数で入力してください。',
            'string_count.between' => '弦の本数は1〜12の範囲で入力してください。',
        ];

        // バリデーション
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // DBに登録
        $newGear = new Gear();
        $form = $request->all();
        unset($form['_token']);
        unset($form['action']);
        // TODO セッションからユーザーIDを取得
        $newGear->user_id = '1';
        $newGear->fill($form)->save();

        return redirect()->action('GearController@complete', ['gear_id' => $newGear->id]);
    }

    /**
     * 楽器登録完了画面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function complete(Request $request)
    {
        $gear_id = $request->gear_id;

        return view('/pages/newgear_complete', ['gear_id' => $gear_id]);
    }
}
