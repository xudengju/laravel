@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">属性值修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('attrValueUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="attr_value_id" value="{{$data['attr_value_id']}}">
            <div class="box-body">
                    <div class="form-group">
                        <label>属性名称</label>
                        <select class="form-control select2" style="width: 100%;" name="attr_id">
                            <option value="{{$data['attr_id']}}" selected="selected" >{{$data['attr']['attr_name']}}</option>
                            @foreach($attr as $k=>$v)
                                <option value="{{$v['attr_id']}}">{{$v['attr_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">属性值</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="attr_value" value="{{$data['attr_value']}}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
    </div>

@stop