<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GearController extends Controller
{

    private $rules = [
        'name' => 'required',
        'type' => 'required|integer',
        'icon_id' => 'required|integer',
        'color' => 'required',
        'string_count' => 'required|integer|between:1,12',
    ];
    private $messages = [
        'name.required' => '名前を入力してください。',
        'type.required' => '種類を選択してください。',
        'icon_id.required' => 'アイコンを選択してください。',
        'color.required' => '色を選択してください。',
        'string_count.required' => '弦の本数を入力してください。',
        'string_count.integer' => '弦の本数は整数で入力してください。',
        'string_count.between' => '弦の本数は1〜12の範囲で入力してください。',
    ];

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
//        global $rules, $messages;

        // キャンセルボタンが押された場合、何もせずトップページに戻る
        if ($request->get('action') === 'キャンセル') {
            return redirect('/');
        }

        // バリデーション
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
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

    /** 詳細画面表示
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {

        $gear = Gear::find($id);
        $data = ['gear' => $gear];

        return view('/pages/detail', $data);
    }

    /** 更新画面表示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $gear = Gear::find($id);
        return view("pages/edit", ['gear' => $gear]);
    }

    /** 更新処理実施
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        // キャンセルボタンが押された場合、何もせず詳細画面に戻る
        if ($request->get('action') === 'キャンセル') {
            return redirect("gears/$id");
        }

        // バリデーション
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // DBに登録
        $newGear = Gear::find($id);
        $form = $request->all();
        unset($form['_token']);
        unset($form['action']);
        // TODO セッションからユーザーIDを取得
        $newGear->user_id = '1';
        $newGear->fill($form)->save();

        return redirect("gears/$id");
    }

    /** 削除処理実施
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Gear::find($id)->delete();

        return redirect('/');
    }
}
