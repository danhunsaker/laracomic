<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($series, $provider = null)
    {
        if (empty($provider)) {
            $provider = $series;
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($series, $provider = null)
    {
        if (empty($provider)) {
            $provider = $series;
        }

        $user = Socialite::driver($provider)->user();

        $ident = \App\UserIdentity::updateOrCreate([
            'provider' => $provider,
            'identifier' => $user->getId(),
        ], [
            'token' => $user->token,
            'secret' => $user->tokenSecret,
            'nickname' => $user->getNickname(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
        ]);

        if (\Auth::check()) {
            if ($ident->hasUser()) {
                if (\Auth::user()->is($ident->user)) {
                    // Updated
                    return redirect()->intended($this->redirectPath())->with('status', 'Connection updated.');
                } else {
                    // Already in use
                    return redirect()->intended($this->redirectPath())->with('status', 'Connection already in use!');
                }
            } else {
                // Connect
                $ident->user_id = \Auth::id();
                $ident->save;

                return redirect()->intended($this->redirectPath())->with('status', 'Connection established.');
            }
        } else {
            if ($ident->hasUser()) {
                // Log in
                \Auth::login($ident->user, true);

                return redirect()->intended($this->redirectPath())->with('status', 'Welcome back!');
            } else {
                // Register
                return view('auth.social')->with(compact('ident'));
            }
        }
    }
}
