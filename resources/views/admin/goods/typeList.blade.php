@extends('admin/index/index')
@section('content_header')
    <div class="box-header">
        <h3 class="box-title">商品分类列表</h3>

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
                <th>分类名称</th>
                <th>分类地址</th>
                <th>操作</th>
            </tr>
            @foreach($type as $k=>$v)
                <tr>
                    <td>{{$v['type_id']}}</td>
                    <td>{{$v['type_name']}}</td>
                    <td>{{$v['url']}}</td>
                    <td><a href="{{url('adminGoods/typeDelete')}}?type_id={{$v['type_id']}}"><i class="fa fa-fw fa-trash "></i></a>|<a href="{{url('adminGoods/typeSave')}}?type_id={{$v['type_id']}}"><i class="fa fa-fw fa-edit "></i></a>|<a href="{{url('adminGoods/typeAttr')}}?type_id={{$v['type_id']}}"><li class="fa fa-fw fa-user-circle"></li></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $type->links() }}
@stop