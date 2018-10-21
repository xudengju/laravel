@extends('admin/index/index')
@section('content_header')
    <form action="{{url('userRoleAdd')}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="user_id" value="{{$user['user_id']}}">
        为 <b>{{$user['user_name']}}</b>分配角色<br /><br />
        @foreach($role as $ki=>$v)
        <label><input name="role_id[]" type="checkbox" value="{{$v['role_id']}}" />{{$v['role_name']}}</label>
        @endforeach
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">分配</button>
        </div>
    </form>
@stop