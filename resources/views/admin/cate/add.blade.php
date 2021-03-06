@extends('layout.admin')

@section('title','分类添加')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<div style="font-size: 23px;margin-top: 10px;margin-left: 20px;">
    	<i class="layui-icon">&#xe655;</i> 分类添加
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
	<form action="{{ url('/cate') }}" method="post" enctype="multipart/form-data" style="font-size: 20px;margin-top: 10px;margin-left: 20px;">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">分类名</label>
			<div class="layui-input-block">
				<input type="text" class="" name="name" placeholder="请输入分类名" value="{{ old('name') }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">父级分类</label>
			<select name="pid" lay-verify="" style="font-size: 20px;">
				<option value="0">请选择</option>
				@foreach($cates as $k => $v)
				<option value="{{ $v->id }}">{{ $v->name }}</option>
				@endforeach
			</select>
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