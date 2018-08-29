@extends('layout.admin')

@section('title','用户修改')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<div style="font-size: 23px;margin-top: 10px;margin-left: 20px;">
    	<i class="layui-icon">&#xe612;</i> 用户修改
  	</div>
	<hr>
	@if (count($errors) > 0)
	<div class="">
		<ul>
		@foreach ($errors -> all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
	@endif

	<form class="layui-form" style="font-size: 20px;margin-top: 10px;margin-left: 20px;" action="{{url('/user/update')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">用户名</label>
			<div class="layui-input-block">
				<input type="text" class="" name="username" placeholder="请输入用户名" value="{{ $user->username }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">邮箱</label>
			<div class="layui-input-block">
				<input type="text" class="" name="email" placeholder="请输入邮箱" value="{{ $user->email }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">个人头像</label>
			<img src="{{ $user->profile }}" alt="">
			<div class="">
				<input type="file" class="" name="profile">
			</div>
		</div>
		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">个人介绍</label>
			<div class="layui-input-block">
				<textarea class="" name="intro">{{ $user->intro }}		
				</textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<input type="hidden" name="id" value="{{ $user->id }}">
				<input type="submit" class="layui-btn" value="更新">
				<input type="reset" class="layui-btn layui-btn-primary" value="重置">
			</div>
		</div>
	</form>
</div>
@endsection