@extends('layout.admin')

@section('title','标签添加')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<div style="font-size: 23px;margin-top: 10px;margin-left: 20px;">
    	<i class="layui-icon">&#xe60b;</i> 标签添加
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
	<form action="{{ url('/tag') }}" method="post" enctype="multipart/form-data" style="font-size: 20px;margin-top: 10px;margin-left: 20px;">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">标签名</label>
			<div class="layui-input-block">
				<input type="text" class="" name="name" placeholder="请输入标签名" value="{{ old('name') }}">
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