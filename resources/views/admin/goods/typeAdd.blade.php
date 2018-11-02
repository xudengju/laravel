@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">商品分类添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('typeAdd')}}" method="post" >
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">分类名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="type_name" placeholder="请输入分类名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">url</label>
                    <input type="text" id="exampleInputFile" name="url" placeholder="请输入分类地址">
                </div>
                <div class="form-group">
                    <label>商品类型父级</label>
                    <select class="form-control select2" style="width: 100%;" name="p_id">
                        <option value="0" selected="selected" >请选择</option>
                        @foreach($data as $k=>$v)
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
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </form>
    </div>

@stop