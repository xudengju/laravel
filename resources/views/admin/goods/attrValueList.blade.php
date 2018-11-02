@extends('admin/index/index')
@section('content_header')
    <div class="box-header">
        <h3 class="box-title">属性值列表</h3>

        <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>属性名称</th>
                <th>属性值名称</th>
                <th>操作</th>
            </tr>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v['attr_value_id']}}</td>
                    <td>{{$v['attr']['attr_name']}}</td>
                    <td>{{$v['attr_value']}}</td>
                    <td><a href="{{url('adminGoods/attrValueDelete')}}?attr_value_id={{$v['attr_value_id']}}"><i class="fa fa-fw fa-trash "></i></a>|<a href="{{url('adminGoods/attrValueSave')}}?attr_value_id={{$v['attr_value_id']}}"><i class="fa fa-fw fa-edit "></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop