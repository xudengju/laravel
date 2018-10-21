@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">管理员添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('add')}}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">账户名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" placeholder="请输入账户名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">账户密码</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="user_pwd" placeholder="请输入账户密码">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">账户邮箱</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="user_email" placeholder="请输入账户邮箱">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否超级管理员</label>
                   <p> <input name="is_root" type="radio" value="1" />是
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input name="is_root" type="radio" value="0" />否</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">添加人</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="create_user" placeholder="请输入添加人">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">状态</label>
                    <p> <input name="status" type="radio" value="1" />冻结
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input name="status" type="radio" value="0" />正常</p>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>

                <button type="button" class="btn btn-primary" value="reset">重置</button>
            </div>
        </form>
    </div>

@stop