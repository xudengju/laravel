@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">商品分类修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('typeUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="type_id" value="{{$data['type_id']}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">分类名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="type_name" value="{{$data['type_name']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">分类地址</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="url" value="{{$data['url']}}">
                </div>
            </div>
            <div class="form-group">
                <label>商品类型父级</label>
                <select class="form-control select2" style="width: 100%;" name="p_id">
                    <option value="{{$data['p_id']}}" selected="selected" >{{$data['type_name']}}</option>
                    @foreach($type as $k=>$v)
                        <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                        @foreach($v['child'] as $key =>$val)
                            <option value="{{$val['type_id']}}">—|—|{{$val['type_name']}}</option>
                            @foreach($val['child'] as $key=>$y)
                                <option value="{{$y['type_id']}}">—|—|—|{{$y['type_name']}}</option>
                            @endforeach
                        @endforeach
                    @endforeach
                </select>
            </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">修改</button>
    </div>
    </form>
    </div>

@stop