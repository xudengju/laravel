@extends('admin/index/index')
@section('content_header')
    <div class="box-header">
        <h3 class="box-title">添加货品</h3>

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
                <th>颜色</th>
                <th>内存</th>
                <th>商品价格</th>
                <th>商品库存</th>
                <th>是否上架</th>
                <th>是否新品</th>
                <th>描述</th>
                <th>促销价格</th>
                <th>商品编号</th>
                <th>是否促销</th>
                <th>商品类型</th>
                <th>修改时间</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->goods_id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td><img src="{{$v->goods_img}}" alt="" width="50" height="50"></td>
                    <td>{{$v->goods_price}}</td>
                    <td>{{$v->goods_num}}</td>
                    <td>
                        @if($v->is_up==1)
                            是
                        @endif
                        @if($v->is_up==0)
                            否
                        @endif
                    </td>
                    <td>
                        @if($v->is_new==1)
                            是
                        @endif
                        @if($v->is_new==0)
                            否
                        @endif
                    </td>
                    <td>{{$v->describe}}</td>
                    <td>{{$v->promotion_price}}</td>
                    <td>{{$v->goods_no}}</td>
                    <td>
                        @if($v->is_sale==1)
                            是
                        @endif
                        @if($v->is_sale==0)
                            否
                        @endif
                    </td>
                    <td>{{$v->type_name}}</td>
                    <td>{{$v->update_time}}</td>
                    <td>{{$v->create_time}}</td>
                    <td><a href="{{url('adminGoods/skuAdd')}}?goods_id={{$v->goods_id}}"><i class="fa fa-fw fa-plus "></i></a>|<a href="{{url('adminGoods/delete')}}?goods_id={{$v->goods_id}}"><i class="fa fa-fw fa-trash "></i></a>|<a href="{{url('adminGoods/goodsSave')}}?goods_id={{$v->goods_id}}"><i class="fa fa-fw fa-edit "></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $data->links() }}
@stop