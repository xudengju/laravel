@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">角色修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('roleUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="role_id" value="{{$roleData['role_id']}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">角色名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="role_name" value="{{$roleData['role_name']}}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
    </div>

@stop