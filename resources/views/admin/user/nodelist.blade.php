@extends('admin/index/index')
@section('content_header')
    <div class="box-header">
        <h3 class="box-title">权限展示</h3>

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
                <th>权限名称</th>
                <th>权限地址</th>
                <th>icon</th>
                <th>父级id</th>
                <th>path</th>
                <th>是否是菜单</th>
                <th>操作</th>
            </tr>
            @foreach($node as $k=>$v)
            <tr>
                 <td>{{$v['menu_id']}}</td>
                 <td>@if($v['p_id']!=0)—|—|@endif{{$v['text']}}</td>
                 <td>{{$v['url']}}</td>
                 <td>{{$v['icon']}}</td>
                 <td>{{$v['p_id']}}</td>
                 <td>{{$v['path']}}</td>
                 <td>
                   @if($v['is_menu']==1)
                       是
                   @endif
                   @if($v['is_menu']==0)
                      不是
                   @endif
                 </td>
                <td><a href="{{url('adminuser/nodeDelete')}}?id={{$v['menu_id']}}"><i class="fa fa-fw fa-trash "></i></a>|<a href="{{url('adminuser/nodeSave')}}?id={{$v['menu_id']}}"><i class="fa fa-fw fa-edit "></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $node->links() }}
@stop