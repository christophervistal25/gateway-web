<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Facades\API;


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
     * Override the default login method in
     * AuthenticatesUsers trait
     */
    public function login(Request $request)
    {
        $response = API::post('api/device/login', [
            'primary_phone_number' => $request->phone_number,
            'password' => $request->password
        ]);


        if ($response->getStatusCode() === 401 || $response->getStatusCode() === 422) {
            return back()->withErrors(['message' => 'Invalid Phone number or Password']);
        }
        

        $data = json_decode($response->getBody()->getContents());

        session()->forget(['token', 'token_type', 'expires_in']);
        
        session(['token' => $data->token]);
        session(['token_type' => $data->token_type]);
        session(['expires_in' => $data->expires_in]);

        return redirect()->route('client.dashboard');
    }

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
}
