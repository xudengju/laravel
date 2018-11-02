@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">属性添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('attrAdd')}}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">属性名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="attr_name" placeholder="请输入属性名称">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </form>
    </div>

@stop