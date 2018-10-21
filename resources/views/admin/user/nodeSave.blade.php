@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">权限修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('nodeUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="menu_id" value="{{$data['menu_id']}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">权限名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="text" value="{{$data['text']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">权限地址</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="url" value="{{$data['url']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">icon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="icon" value="{{$data['icon']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">p_id</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="p_id" value="{{$data['p_id']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Path</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="path" value="{{$data['path']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否是菜单</label>
                    <p>
                        @if($data['is_menu']==1)
                        <input name="is_menu" type="radio" value="1" checked/>是
                        @else
                            <input name="is_menu" type="radio" value="1" />是
                        @endif
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if($data['is_menu']==0)
                        <input name="is_menu" type="radio" value="0" checked />否</p>
                        @else
                        <input name="is_menu" type="radio" value="0"  />否</p>
                        @endif
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
    </div>

@stop