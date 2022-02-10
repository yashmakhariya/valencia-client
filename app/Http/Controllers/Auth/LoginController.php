<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;
use Exception;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function indexLogin() { // Show login form
        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');
        if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
            session()->put('url.intended', $urlPrevious);
        }
        return view('auth.login');
    }

    public function handleLogin(Request $request) { // Login user

        $validator = Validator::make($request->all(), [
            'email' => ['required','bail' ,'string', 'max:255','exists:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            if (Auth::user()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                $urlPrevious = url()->previous();
                $urlBase = url()->to('/');

                if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
                    session()->put('url.intended', $urlPrevious);
                }
            }
            return back()->withInput($request->only('email', 'remember'));
        }
    }
    
    public function handleGoogleRedirect() { // Redirect to google accounts
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() { // Get google account details
        try {
    
            $account = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $account->id)->first();
     
            if($finduser){
                Auth::login($finduser);
                if(session()->has('url.intended'))
                {
                    return redirect()->to(session()->get('url.intended'));
                }
                else {
                    return redirect()->to('dashboard');
                }
            }
            else {

                $user = new User();
                $user->name = $account->name;
                $user->email = $account->email;
                $user->cart = "a:0:{}";
                $user->wishlist = "a:0:{}";
                $user->password = encrypt($account->id);
                $user->google_id = $account->id;
                $user->save();

                Auth::login(User::where('google_id', $account->id)->first());
                if(session()->has('url.intended'))
                {
                    return redirect()->to(session()->get('url.intended'));
                }
                else {
                    return redirect()->to('dashboard');
                }
            }
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }
}
