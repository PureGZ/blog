@extends('layout.admin')

@section('title','用户列表')

@section('content')
<div class="" style="font-size: 25px;margin-top: 10px;margin-left: 20px;"> 
   
  <div style="font-size: 25px;margin-top: 10px;margin-left: 20px;">
    <i class="layui-icon">&#xe613;</i>用户列表
    <hr>
  </div>

  <form action="/admin/user/list">
    <div class="layui-form-item">
      <label class="layui-form-label">
        <select name="num" lay-verify="" style="font-size: 18px;">
          <option value="5" @if ($request->input('num') == 5) selected @endif>单页5条
          </option>
          <option value="10" @if ($request->input('num') == 10) selected @endif>单页10条
          </option>
          <option value="50" @if ($request->input('num') == 50) selected @endif>单页50条
          </option>
        </select>  
      </label>
      <div id="" style="margin-left: 800px;">
        <label for="">
          <input type="text" name="keyword" value="{{ $request->input('keyword') }}">
          <button class="layui-btn layui-btn-xs">搜索</button>
        </label>
      </div>
  </form>

  <div class="layui-row" style="margin-top: 0px;">
    <div class="layui-col-7" style="padding: 30px;">
      <table class="layui-table-7">
        <colgroup>
          <col width="50">
          <col width="200">
          <col width="200">
          <col width="200">
          <col width="200">
          <col width="200">
          <col width="200">
        </colgroup>
    		<thead class="">
    		  <tr class="layui-table tr">
    		    <th class="">ID</th>
    		    <th class="">用户名</th>
    		    <th class="">邮箱</th>
    		    <th class="">头像</th>
    		    <th class="">创建时间</th>
            <th class="">更新时间</th>
            <th class="">管理</th>
    		  </tr> 
    		</thead>
  	    <tbody class="layui-table tbody,layui-table tbody">
            @foreach($users as $k => $v)
            <tr class="@if($k % 2 == 0) layui-bg-gray @endif">
              <td class="layui-font-color">{{ $v->id }}</td>
              <td class="layui-font-color">{{ $v->username }}</td>
              <td class="layui-font-color">{{ $v->email }}</td>
              <td class="layui-font-color"><img class="layui-table img" src="{{ $v->profile }}" alt=""></td>
              <td class="layui-font-color">{{ $v->created_at }}</td>
              <td class="layui-font-color">{{ $v->updated_at }}</td>
              <td class="layui-font-color">
                <a href="/admin/user/edit/{{ $v->id }}">
                  <button class="layui-btn layui-btn-primary layui-btn-sm">
                    <i class="layui-icon">&#xe642;</i>
                  </button>
                </a>
                <a href="/admin/user/delete/{{ $v->id }}">
                  <button class="layui-btn layui-btn-primary layui-btn-sm">
                    <i class="layui-icon">&#xe640;</i>
                  </button>
                </a>
              </td>
            </tr>
            @endforeach
      	</tbody>
      </table>
      <div id="pages">
        {{ $users->appends($request->only(['num', 'keyword']))->links() }}
      </div>
    </div>
  </div>
</div>
@endsection