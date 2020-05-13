<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    // ログイン
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    // コールバック
    public function handleProviderCallback()
    {
        try {
            $twitter_user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        // ログイン処理
        $user = User::where('auth_id', $twitter_user->id)->first();
        if (!$user) {
            $user = User::create([
                'name'=> $twitter_user->getName(),
                'auth_id' => $twitter_user->getId(),
                'avatar'=>$twitter_user->getAvatar(),
            ]);
        }
        Auth::login($user);
        return redirect('/');
    }

    // ログアウト
    public function logout(Request $request)
    {
        // ログアウト処理
        Auth::logout();
        return redirect('/');
    }
}
