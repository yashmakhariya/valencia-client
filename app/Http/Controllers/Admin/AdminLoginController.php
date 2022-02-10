<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{  

    use AuthenticatesUsers;
    
    protected $redirectTo = '/admin/dashboard'; //Redirect after authenticate

    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout'); //Notice this middleware
    }

    public function indexLogin() {
        return view('admin.login');
    }

    public function handleLogin(Request $request) {
        $this->validate($request, [
            'email'   => ['required'],
            'password' => ['required']
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
