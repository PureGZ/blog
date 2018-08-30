<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class ArticleController extends Controller
{
    /*显示文章列表*/
    public function index(Request $request)
    {        
        // 读取文章
        $articles = article::select(DB::raw('*, concat(path,"_",id) as paths'))->orderBy('paths')->get();
        // 遍历数组，调整文章名
        foreach ($articles as $key => $value) {
            // 判断当前文章等级
            $tmp = count(explode('_', $value->path)) - 1;
            $prefix = str_repeat('$~', $tmp);
            $value -> name = $prefix.$value->name;
        }
        // 解析模板
        return view('admin.article.list', ['articles'=>$articles, 'request'=>$request]);
    }

    /*创建文章页面*/
    public function create()
    {
        // 读取分类信息
        $cates = CateController::getCates();
        //  读取标签信息
        $tags = TagController::getTags();
        // 解析模板
    	return view('admin.article.add', [
            'cates' => $cates,
            'tags' => $tags
        ]);
    }

    /*将文章信息存入数据库*/
    public function store(Request $request)
    {
    	$data = $request -> all();
        // 如果添加的是顶级文章，pid和path都是0
        if ($data['pid'] == 0) {
            $data['path'] = '0';
        }else {
            // 如果不是顶级文章，读取父级文章的信息
            $info = article::find($data['pid']);
            $data['path'] = $info->path.'_'.$info->id;
        }
        // 创建模型
        $article = new article;
        $article -> name = $data['name'];
        $article -> pid = $data['pid'];
        $article -> path = $data['path'];
        //
        if ($article->save()) {
            return redirect('/article')->with('info', '文章添加成功！');
        } else {
            return redirect()->back()->with('info', '文章添加失败！');
        } 
    }

    /**/
    public function show($id)
    {
        # code...
    }

    /*将数据引入文章信息修改界面*/
    public function edit($id)
    {
        // 读取当前文章信息
        $info = article::findOrFail($id);
        // 读取
        $articles = article::get();
        // 解析模板
        return view('admin.article.edit', ['info'=>$info, 'articles'=>$articles]);
    }

    /*文章数据更新*/
    public function update(Request $request, $id)
    {
        $article = article::findOrFail($id);
        $article->name = $request->name;
        $article->pid = $request->pid;
        if ($article->save()) {
            return redirect('/article')->with('info', '文章更新成功！');
        } else {
            return redirect()->back()->with('info', '文章更新失败！');
        }
    }

    /*文章数据删除*/
    public function destroy($id)
    {
        // 删除文章
        $article = article::findOrFail($id);
        // 删除子集文章
        $path = $article->path.'_'.$article->id;
        DB::table('articles')->where('path','like',$path.'%')->delete();
        if ($article->delete()) {
            return redirect()->back()->with('info', '文章删除成功！');
        } else {
            return redirect()->back()->with('info', '文章删除失败！');
        }
    }
}
