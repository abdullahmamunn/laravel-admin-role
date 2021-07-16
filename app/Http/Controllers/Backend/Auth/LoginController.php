<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
     protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {
        // return $request->all();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
         // Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Redirect to dashboard
            session()->flash('success', 'Successully Logged in !');
            return redirect()->intended(route('admin.dashboard'));
        } else {
            session()->flash('error', 'Invalid email and password');
            return back();
    } 
}
public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
