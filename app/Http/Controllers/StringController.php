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
            'brand' => 'required|max:255',
        ];
        $messages = [
            'brand.required' => 'ブランドを入力してください。',
            'brand.max' => 'ブランドは255文字以内で入力してください。',
        ];

        // 弦の本数分バリデーションルール、メッセージを追加
        for ($i = 1; $i <= 12; $i++) {
            if ($request->has('gauge_' . $i)) {
//                $rules['gauge_' . $i] = 'regex:/^\d{1,3}$/';
                $rules['gauge_' . $i] = 'required|regex:/^\d+$/|max:3';
                $messages['gauge_' . $i . '.required'] = $i . '弦のゲージを入力してください。';
                $messages['gauge_' . $i . '.regex'] = $i . '弦のゲージは数値で入力してください。';
                $messages['gauge_' . $i . '.max'] = $i . '弦のゲージは3桁以内で入力してください。';
            }
        }

        $rules['change_date'] = 'required|date';
        $rules['comment'] = 'max:255';
        $messages['change_date.required'] = '交換日付を入力してください。';
        $messages['change_date.date'] = '交換日付は日付形式で入力してください。';
        $messages['comment.max'] = 'コメントは255文字以内で入力してください。';

        // バリデーション
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // DBに登録
        $new_string = new StringHistory();
        $form = $request->all();
        unset($form['_token']);
        unset($form['action']);
        $new_string->user_id = Auth::id();
        $new_string->fill($form)->save();

        return redirect()->action('StringController@complete', ['gear_id' => $request->gear_id]);
    }

    public function complete(Request $request)
    {
        $gear = Gear::find($request->gear_id);

        return view('/pages/newstring_complete', ['gear' => $gear]);
    }
}
