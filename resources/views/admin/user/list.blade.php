@extends('admin/index/index')
@section('content_header')
    <div class="box-header">
        <h3 class="box-title">管理员展示</h3>

        <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>账户名称</th>
                <th>账户邮箱</th>
                <th>是否是超级管理员</th>
                <th>添加人</th>
                <th>状态</th>
                <th>添加时间</th>
                <th>登录时间</th>
                <th>操作</th>
            </tr>
            @foreach($user as $k=>$v)
            <tr>
                  <td>{{$v['user_id']}}</td>
                  <td>{{$v['user_name']}}</td>
                  <td>{{$v['user_email']}}</td>
                  <td>
                        @if($v['is_root']==1)
                              是
                        @endif
                        @if($v['is_root']==0)
                                否
                         @endif
                  </td>
                <td>{{$v['create_user']}}</td>
                <td>
                    @if($v['status']==1)
                        <a href="{{url('manage')}}?status={{$v['status']}}" style="color: red">冻结</a>
                    @endif
                    @if($v['status']==0)
                            <a href="{{url('manage')}}?status={{$v['status']}}" style="color: green">正常</a>
                    @endif
                </td>
                <td>{{$v['create_time']}}</td>
                <td>{{$v['login_time']}}</td>
                <td><a href="{{url('adminuser/delete')}}?id={{$v['user_id']}}"><i class="fa fa-fw fa-trash "></i></a>|<a href="{{url('adminuser/userSave')}}?id={{$v['user_id']}}"><i class="fa fa-fw fa-edit "></i></a>
                    |<a href="{{url('adminuser/userRole')}}?user_id={{$v['user_id']}}"><li class="fa fa-fw fa-user-circle"></li></a></td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $user->links() }}
@stop