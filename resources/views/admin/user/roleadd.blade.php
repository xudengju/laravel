@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">角色添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('roleAdd')}}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">角色名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="role_name" placeholder="请输入角色名称">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </form>
    </div>

@stop