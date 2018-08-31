<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class LoginController extends Controller
{
    /*后台登录界面*/
    public function login()
    {
    	return view('admin.login.login');
    }

    /*执行登录操作*/
    public function dologin(Request $request)
    {
    	// 实例化用户对象
    	$user = User::where('username', $request->username)->firstOrFail();
    	// 获取用户信息
    	if (Hash::check($request->password, $user->password)) {
    		// 写入登录状态
    		session(['uid' => $user->id]);
    		return redirect('/admin');
    	} else {
            return redirect()->back()->with('info', '哦豁用户名和密码总有一个没搞对头');
        }
    }

    /*注销登录*/
    public function logout(Request $request)
    {
    	$request->session()->flush();
    	return redirect('/login');
    }

}
