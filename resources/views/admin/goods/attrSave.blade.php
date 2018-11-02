@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">属性修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('attrUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="attr_id" value="{{$data['attr_id']}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">属性名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="attr_name" value="{{$data['attr_name']}}">
                </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">修改</button>
    </div>
    </form>
    </div>

@stop