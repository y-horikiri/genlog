<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\StringHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $rules = [
            'brand' => 'required',
            'change_date' => 'required|date',
        ];
        $messages = [
            'brand.required' => 'ブランドを入力してください。',
            'change_date.required' => '交換日付を入力してください。',
            'change_date.date' => '交換日付は日付形式で入力してください。',
        ];

        // 弦の本数分バリデーションルール、メッセージを追加
        for ($i = 1; $i <= 12; $i++) {
            if ($request->has('gauge_' . $i)) {
                $rules['gauge_' . $i] = 'regex:/^\d{1,3}$/';
                $messages['gauge_' . $i . '.regex'] = $i . '弦のゲージを入力してください。';
            }
        }

        // バリデーション
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // DBに登録
        $newString = new StringHistory();
        $form = $request->all();
        unset($form['_token']);
        unset($form['action']);
        $newString->user_id = Auth::id();
        $newString->fill($form)->save();

        return redirect()->action('StringController@complete', ['gear_id' => $request->gear_id]);
    }

    public function complete(Request $request)
    {
        $gear = Gear::find($request->gear_id);

        return view('/pages/newstring_complete', ['gear' => $gear]);
    }
}
