<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    // 用户添加页面显示
    public function add()
    {
    	return view('user.add');
    }
    // 用户的添加
    public function insert(Request $request)
    {
    	// 表单验证
    	$this->validate($request, [
    		'username' => 'required|regex:/\w{8,20}/',
    		'email' => 'required|email',
    		'password' => 'required|same:repassword',
    		'repassword' => 'required'
    	],[
    		'username.required' => '用户名不能为空',
    		'username.regex' => '用户名为8-20位字符',
    		'email.required' => '邮箱不能为空',
    		'email.email' => '邮箱格式不正确',
    		'password.required' => '密码不能为空',
    		'repassword.required' => '校验密码不能为空',
    		'password.same' => '两次密码不一致'
    	]);
    	// 数据插入
    	$user = new User;
    	$user -> username = $request ->input('username');
    	$user -> email = $request ->input('email');
    	$user -> password = Hash::make($request ->input('password'));
    	$user -> intro = $request ->input('intro');   	
    	// 处理图片上传
		if ($request->hasFile('profile')) {
		    // 文件的存放目录
		    $path = './uploads/'.date('Ymd');
		    // 获取文件后缀名
			$extension = $request->profile->extension();
			// 文件的名称
			$fileName = time().rand(1000, 9999).'.'.$extension;		
			$request -> file('profile')->move($path, $fileName);
			$user -> profile = $path.'/'.$fileName;
		}
		/*---------------------------bug分割线-----------------------*/
    	// 执行插入
    	if ($user->save()) {
    		return redirect('user/index')->with('info', '添加成功');
    	} else {
    		return redirect()->back()->with('info', '添加失败');
		}
	}
	// 用户的列表显示
	public function index(Request $request)
	{
		echo "6666";
	}

}