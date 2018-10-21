@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">管理员修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('userUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="user_id" value="{{$data['user_id']}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">账户名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" value="{{$data['user_name']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">账户密码</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="user_pwd" value="{{$data['user_pwd']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">账户邮箱</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_email" value="{{$data['user_email']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否超级管理员</label>
                    <p>
                        @if($data['is_root']==1)
                        <input name="is_root" type="radio" value="1" checked/>是
                         @else
                            <input name="is_root" type="radio" value="1" />是
                        @endif

                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                         @if($data['is_root']==0)
                        <input name="is_root" type="radio" value="0" checked/>否</p>
                        @else
                        <input name="is_root" type="radio" value="0" />否</p>
                        @endif

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">添加人</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="create_user" value="{{$data['create_user']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">状态</label>
                    <p>
                        @if($data['status']==1)
                        <input name="status" type="radio" value="1" checked />冻结
                        @else
                        <input name="status" type="radio" value="1"  />冻结
                        @endif
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if($data['status']==0)
                         <input name="status" type="radio" value="0"  checked/>正常</p>
                        @else
                          <input name="status" type="radio" value="0" />正常</p>
                         @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">创建时间</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="create_time" value="{{$data['create_time']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">最后一次登录时间</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="login_time" value="{{$data['login_time']}}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
    </div>

@stop