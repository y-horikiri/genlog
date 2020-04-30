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
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        // ログイン処理
        $user = User::where('auth_id', $twitterUser->id)->first();
        if (!$user) {
            $user = User::create([
                'name'=> $twitterUser->getName(),
                'auth_id' => $twitterUser->getId(),
                'avatar'=>$twitterUser->getAvatar(),
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
