<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // form đăng nhập
    public function login(){
        return view ('fe.login');
    }
    // form đăng ký
    public function register(){
        return view ('fe.register');
    }
    // xử lý đăng ký
    public function postRegister(Request $request){
        //validate

        //Ma hoa mật khẩu
        $request->merge(['password'=>Hash::make($request->password)]);

        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route('login');
    }

    // xử lý đăng nhập
    public function postLogin(Request $request){
        //validate

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index')->with('success','Đăng nhập thành công');;
        }
            return redirect()->back()->with('error','Đăng nhập thất bại');
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

}
