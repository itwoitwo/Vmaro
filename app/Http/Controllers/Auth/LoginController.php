<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        $userInfo = Socialite::driver('twitter')->user();

        //ユーザー情報の取得
        $user = User::find($userInfo->user['id_str']);

        if($user){
            if($user->id_name != $userInfo->nickname 
            || $user->avatar != $userInfo->avatar
            || $user->name != $userInfo->name)
                {
                    $user->id_name = $userInfo->nickname;
                    $user->avatar = $userInfo->avatar;
                    $user->name = $userInfo->name;
                    $user->save();
                }
        } else {
        //ユーザー登録
            User::create([
                'id' => $userInfo->user['id_str'],
                'avatar' => $userInfo->avatar,
                'name' => $userInfo->name,
                'id_name' => $userInfo->nickname,
                ]);

            $user = User::find($userInfo->user['id_str']);
        }

        auth()->login($user, true);
        return redirect()->to('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
