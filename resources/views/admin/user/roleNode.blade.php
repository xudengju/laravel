@extends('admin/index/index')
@section('content_header')
    <form action="{{url('roleMenuAdd')}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="role_id" value="{{$role['role_id']}}">
        为 <b>{{$role['role_name']}}</b>添加权限<br /><br />
        @foreach($data as $ki=>$v)

            <label><input name="is_resource[]" type="checkbox" value="{{$v['menu_id']}}" />{{$v['text']}}</label>


        @endforeach
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">分配</button>
        </div>
    </form>
@stop