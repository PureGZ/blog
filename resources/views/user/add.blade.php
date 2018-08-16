@extends('layout.admin')

@section('title','用户添加')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<p style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<i class="layui-icon">&#xe613;</i> 用户添加
	</p>
	@if (count($errors) > 0)
	<div class="">
		<ul>
		@foreach ($errors -> all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
	@endif

	<form class="layui-form" style="font-size: 20px;margin-top: 10px;margin-left: 20px;" action="{{url('/user/insert')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">用户名</label>
			<div class="layui-input-block">
				<input type="text" class="" name="username" placeholder="请输入用户名" value="{{ old('username') }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">邮箱</label>
			<div class="layui-input-block">
				<input type="text" class="" name="email" placeholder="请输入邮箱" value="{{ old('email') }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">密码</label>
			<div class="layui-input-inline">
				<input type="password" class="" name="password">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">确认密码</label>
			<div class="layui-input-inline">
				<input type="password" class="" name="repassword">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">个人头像</label>
			<div class="">
				<input type="file" class="" name="profile" value="{{ old('profile') }}">
			</div>
		</div>
		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">个人介绍</label>
			<div class="layui-input-block">
				<textarea class="" name="intro" value="{{ old('intro') }}">		
				</textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<input type="submit" class="layui-btn" value="添加">
				<input type="reset" class="layui-btn layui-btn-primary" value="重置">
			</div>
		</div>
	</form>
</div>
@endsection

	<!--   <form class="layui-form" action="{{url('/user/insert')}}" method="post" enctype="multipart/form-data">
	  <div class="layui-form-item">
		  <label class="layui-form-label">用户名</label>
		  <div class="layui-input-block">
		    <input type="text" name="username" value="{{ old('username') }}" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
		  </div>
	  </div>
		<div class="layui-form-item">
		  <label class="layui-form-label">邮箱</label>
		  <div class="layui-input-block">
			 <input type="text" name="email" value="{{ old('email') }}" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
		  </div>
		</div>
	 	<div class="layui-form-item">
	    <label class="layui-form-label">密码</label>
	    <div class="layui-input-inline">
	    	<input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
	    </div>
		</div>
	 	<div class="layui-form-item">
	    <label class="layui-form-label">确认密码</label>
	    <div class="layui-input-inline">
	    	<input type="password" name="repassword" required lay-verify="required" placeholder="请确认密码" autocomplete="off" class="layui-input">
	    </div>
		</div>
		<div class="layui-form-item layui-form-text">
	    <label class="layui-form-label">个人介绍</label>
	    <div class="layui-input-block">
			<textarea name="intro" placeholder="请输入个人介绍" class="layui-textarea"></textarea>
	    </div>
		</div>
	  <div class="layui-form-item">
	    <div class="layui-input-block">
	      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
	      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
	    </div>
	  </div>
	</form>
	</div>

	<script>
	//Demo
	layui.use('form', function(){
	var form = layui.form;

	//监听提交
	form.on('submit(formDemo)', function(data){
	  layer.msg(JSON.stringify(data.field));
	  return false;
	});
	});
	</script>
	 -->


