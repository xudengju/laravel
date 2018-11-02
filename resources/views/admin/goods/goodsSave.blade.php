@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">商品修改</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('goodsUpdate')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="goods_id" value="{{$goods->goods_id}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">商品名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_name" value="{{$goods->goods_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_price" value="{{$goods->goods_price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品库存</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_num" value="{{$goods->goods_num}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否上架</label>
                    <p>
                        @if($goods->is_up ==1)
                            <input name="is_up" type="radio" value="1" checked/>上架
                        @else
                            <input name="is_up" type="radio" value="1" />上架
                        @endif
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if($goods->is_up ==0)
                            <input name="is_up" type="radio" value="0" checked />下架</p>
                    @else
                        <input name="is_up" type="radio" value="0"  />下架</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">商品描述</label>
                <textarea name="describe" id="" cols="60" rows="5" >{{$goods->describe}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">促销商品价格</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="promotion_price" value="{{$goods->promotion_price}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">是否促销</label>
                <p>
                    @if($goods->is_sale ==1)
                        <input name="is_sale" type="radio" value="1" checked/>是
                    @else
                        <input name="is_sale" type="radio" value="1" />是
                    @endif
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    @if($goods->is_sale ==0)
                        <input name="is_sale" type="radio" value="0" checked />否</p>
                @else
                    <input name="is_sale" type="radio" value="0"  />否</p>
                @endif
            </div>
                <div class="form-group">
                    <label>商品类型</label>
                    <select class="form-control select2" style="width: 100%;" name="type_id">
                        <option value="{{$goods->type_id}}" selected="selected" >{{$goods->type_name}}</option>
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
                <div class="form-group">
                    <label for="exampleInputEmail1">是否是新品</label>
                    <p>
                        @if($goods->is_new ==1)
                            <input name="is_new" type="radio" value="1" checked/>是
                        @else
                            <input name="is_new" type="radio" value="1" />是
                        @endif
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if($goods->is_new ==0)
                            <input name="is_new" type="radio" value="0" checked />否</p>
                    @else
                        <input name="is_new" type="radio" value="0"  />否</p>
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