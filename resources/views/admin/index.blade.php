<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="_token" content="{{ csrf_token() }}"/>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('/layui/css/layui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/global.css')}}">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo" style="font-size: 30px;color: #dedede;">Myblog</div>
    <ul class="layui-nav layui-layout-left">
     <li class="layui-nav-item"><a href="javascript:loadView('KQHD');">考勤</a></li> 
   <li class="layui-nav-item">
     <a href="javascript:;">设置</a>
     <dl class="layui-nav-child">
       <dd><a href="">消息管理</a></dd>
       <dd><a href="">授权管理</a></dd>
     </dl>
   </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img class="layui-nav-img">
          纯洁的哥子
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">注销</a></li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="">用户管理</a>
          <dl class="layui-nav-child">
            <dd><a href="{{url('/admin/user/add')}}">用户添加</a></dd>
            <dd><a href="{{url('/admin/user/list')}}">用户列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="">分类管理</a>
          <dl class="layui-nav-child">
            <dd><a href="{{url('/admin/cate/create')}}">分类添加</a></dd>
            <dd><a href="{{url('/admin/cate/index')}}">分类列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="">标签管理</a>
          <dl class="layui-nav-child">
            <dd><a href="">标签添加</a></dd>
            <dd><a href="">标签列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="">文章管理</a>
          <dl class="layui-nav-child">
            <dd><a href="">文章添加</a></dd>
            <dd><a href="">文章列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="">评论管理</a>
          <dl class="layui-nav-child">
            <dd><a href="">评论添加</a></dd>
            <dd><a href="">评论列表</a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>

  <div class="layui-body" id="contentView">
    <!-- 内容主体区域 -->
    <div style="padding: 30px;font-size: 40px;">
      @if(session('info'))
      <div class="">
        {{ session('info') }}
      </div>
      @endif
      @section('content')
      Welcome to myblog！
      @show
    </div>
  </div>

  <div class="layui-footer">
    <!-- 底部固定区域 -->
    blog
  </div>
</div>
<script src="/layui/layui.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
<script>
  /*
   说明
   在点击左侧的按钮后通过ajax加载相应的视图

<<<<<<< HEAD
function loadView(viewString){

  $("#contentView").html("<i class='layui-icon layui-anim layui-anim-rotate layui-anim-loop' style='font-size:70px;margin-left:48%;margin-top:300px;'>&#xe63d;</i>");

  $.get("/" + viewString,function(data,status){
    if(status == "success")
      $("#contentView").html(data);
    else
      alert("加载失败！");
  });

}
=======
   【伪代码如下】
   js部分：
   $("学期设置").click(funtion(
   response = ajax("/XQSZ");
   $("#contentView").html(response);
   ))
   路由部分：
   Route::get("/XQSZ","XQSZCOntroller@f");
   控制器部分：
   class XQSZController{
   public function f(){
   return view("XQSZ");
   }
   }
   视图部分：
   自己写相应的view，应该是独立的blade.php文件
   注意只需要写内容DIV的内容，不是整个html页面。
   */
  layui.use('element', function(){
    var element = layui.element;
  });

  function loadView(viewString){
    $("#contentView").html("<i class='layui-icon layui-anim layui-anim-rotate layui-anim-loop' style='font-size:70px;margin-left:48%;margin-top:300px;'>&#xe63d;</i>");
    $.get("/" + viewString,function(data,status){
      if(status == "success")
        $("#contentView").html(data);
      else
        alert("加载失败！");
    });
  }

</script>
</body>
</html>