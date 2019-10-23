<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    protected $redirectTo = '/login';
    public function username(){
        return 'username';
    }
    public function authenticate(Request $request){
        // $authResult= Auth::attempt(['username'=>$request['username'],'password'=>$request['password']]);
        // if($authResult){
        //     return redirect()->intended();
        // }else{
        //     return redirect()->to(route('login'));
        // }
        $credentials = $request->only('username', 'password');

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return redirect()->to(route('login'));
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            return redirect()->intended();
    }
    public function logout(){
        Auth::logout();
       return redirect()->to(route('login'));
    }
}
