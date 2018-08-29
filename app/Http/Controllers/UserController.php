<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    /*用户添加页面显示*/
    public function add()
    {
    	return view('admin.user.add');
    }

    /*用户的添加*/
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
    	// 随机字符串标识
    	$user -> remember_token = str_random(50); 	
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
    	// 执行插入--此处如果报错Inflector.php,将php版本更新到最新即可
    	if ($user->save()) {
    		return redirect('admin/user/list')->with('info', '添加成功！');
    	} else {
    		return redirect()->back()->with('info', '添加失败！');
		}
	}

	/*用户的列表显示*/
	public function list(Request $request)
	{
        // 数据分页显示
        $users = User::orderBy('id','desc')
            ->where(function($query) use ($request) {
                // 获取关键字
                $keyword = $request->input('keyword');
                // 检测参数
                if (!empty($keyword)) {
                    $query->where('username', 'like','%'.$keyword.'%');
                }
            })
            ->paginate($request->input('num', 5));
        
		// 分配变量 解析模板
		return view('admin.user.list', ['users' => $users,'request' => $request]);
	}

    /*用户的修改*/
    public function show($id)
    {
        return view('admin.user.edit', ['user' => User::findOrFail($id)]);
    }
    
    /*用户的更新*/
    public function update(Request $request)
    {
        // 读取用户模型
        $user = User::findOrFail($request->input('id'));
        $user -> username = $request -> input('username');
        $user -> email= $request -> input('email');
        $user -> intro= $request -> input('intro');

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

        if ($user->save()) {
            return redirect('admin/user/list')->with('info', '更新成功！');
        } else {
            return redirect()->back()->with('info', '更新失败！');
        }
    }

    /*用户的删除*/
    public function destroy($id)
    {
        $user = User::find($id);
        // 读取用户头像信息，存在则会删除
        $path = $user -> profile;
        if (file_exists($path)) {
            unlink($path);
        }

        // $user -> delete();
        /*如果上面这行代码不注释掉，则在此处已经删除数据，再执行下面判断时则无数据可删除，所以结果是删除了，但是却显示删除失败！*/

        if ($user->delete()) {
            return redirect()->back()->with('info', '删除成功！');
        } else {
            return redirect()->back()->with('info', '删除失败！');
        }
        // 使用的软删除，但是头像文件不会恢复，需要重新上传
    }

}