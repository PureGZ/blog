@extends('layout.admin')

@section('title','标签修改')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<div style="font-size: 23px;margin-top: 10px;margin-left: 20px;">
    	<i class="layui-icon">&#xe642;</i> 标签修改
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
	<form action="{{ url('/tag/'.$info->id) }}" method="post" enctype="multipart/form-data" style="font-size: 20px;margin-top: 10px;margin-left: 20px;">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">标签名称</label>
			<div class="layui-input-block">
				<input type="text" class="" name="name" placeholder="请输入标签名" value="{{ $info->name }}">
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $info->id }}">
				<input type="hidden" name="_method" value="PUT">
				<input type="submit" class="layui-btn" value="修改">
				<input type="reset" class="layui-btn layui-btn-primary" value="重置">
			</div>
		</div>
	</form>
</div>
@endsection