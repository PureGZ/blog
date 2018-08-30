@extends('layout.admin')

@section('title','文章添加')

@section('content')
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
	<div style="font-size: 23px;margin-top: 10px;margin-left: 20px;">
    	<i class="layui-icon">&#xe705;</i> 文章添加
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

	<form style="font-size: 20px;margin-top: 10px;margin-left: 20px;" action="{{url('/article')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="layui-form-item">
			<label class="layui-form-label">文章标题</label>
			<div class="layui-input-block">
				<input type="text" class="" name="title" placeholder="请输入文章标题" value="{{ old('title') }}">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">文章分类</label>
			<select name="cate_id" lay-verify="" style="font-size: 20px;">
				<option value="0">请选择</option>
				@foreach($cates as $k => $v)
				<option value="{{ $v->id }}">{{ $v->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">文章标签</label>
		    <div class="layui-input-block">
		    	@foreach($tags as $k => $v)
		    	<label for="">
		    		<input type="checkbox" name="tag_id[write]" value="{{ $v->id }}">
				{{ $v->name }}
		    	</label>			
				@endforeach
		    </div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">文章主图</label>
			<div class="">
				<input type="file" class="" name="img" value="{{ old('img') }}">
			</div>
		</div>
		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">文章内容</label>
			<div class="layui-input-block">
				<textarea id="editor" style="width: 900px;height: 300px;"  name="content" value="{{ old('content') }}">		
				</textarea>
			</div>
		</div>
		<script type="text/javascript">
			var ue = UE.getEditor('editor');
		</script>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<input type="submit" class="layui-btn" value="添加">
				<input type="reset" class="layui-btn layui-btn-primary" value="重置">
			</div>
		</div>
	</form>
</div>
@endsection