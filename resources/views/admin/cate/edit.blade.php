@extends('layout.admin')

@section('title','分类修改')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<div style="font-size: 23px;margin-top: 10px;margin-left: 20px;">
    	<i class="layui-icon">&#xe642;</i> 分类修改
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
	<form action="{{ url('/cate/'.$info->id) }}" method="post" enctype="multipart/form-data" style="font-size: 20px;margin-top: 10px;margin-left: 20px;">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">分类名称</label>
			<div class="layui-input-block">
				<input type="text" class="" name="name" placeholder="请输入分类名" value="{{ $info->name }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">父级分类</label>
			<select name="pid" lay-verify="" style="font-size: 20px;">
				<option value="0">请选择</option>
				@foreach($cates as $k => $v)
				<option value="{{ $v->id }}" @if($v->id == $info['pid']) selected @endif>{{ $v->name }}</option>
				@endforeach
			</select>
		</div>     
		<div class="layui-form-item">
			<div class="layui-input-block">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<input type="submit" class="layui-btn" value="修改">
				<input type="reset" class="layui-btn layui-btn-primary" value="重置">
			</div>
		</div>
	</form>
</div>
@endsection