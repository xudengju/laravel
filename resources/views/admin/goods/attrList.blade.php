@extends('admin/index/index')
@section('content_header')
    <div class="box-header">
        <h3 class="box-title">属性列表</h3>

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
                <th>操作</th>
            </tr>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v['attr_id']}}</td>
                    <td>{{$v['attr_name']}}</td>
                    <td><a href="{{url('adminGoods/attrDelete')}}?attr_id={{$v['attr_id']}}"><i class="fa fa-fw fa-trash "></i></a>|<a href="{{url('adminGoods/attrSave')}}?attr_id={{$v['attr_id']}}"><i class="fa fa-fw fa-edit "></i></a>|<a href="{{url('adminGoods/attrValueNode')}}?attr_id={{$v['attr_id']}}"><li class="fa fa-fw fa-user-circle"></li></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop