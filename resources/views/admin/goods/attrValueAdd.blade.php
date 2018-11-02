@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">属性添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('attrValueAdd')}}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">属性名称</label><br>
                    @foreach($attr as $k=>$v)
                        <input name="attr_id" type="checkbox" value="{{$v['attr_id']}}" />{{$v['attr_name']}}
                     @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">属性值</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="attr_value">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </form>
    </div>

@stop