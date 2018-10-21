@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">权限添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('nodeAdd')}}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">权限名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="text" placeholder="请输入权限名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">权限地址</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="url" placeholder="请输入权限地址">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">icon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="icon" placeholder="请输入icon">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">p_id</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="p_id" placeholder="请输入p_id">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Path</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="path" placeholder="请输入path">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否是菜单</label>
                    <p> <input name="is_menu" type="radio" value="1" />是
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input name="is_menu" type="radio" value="0" />否</p>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </form>
    </div>

@stop