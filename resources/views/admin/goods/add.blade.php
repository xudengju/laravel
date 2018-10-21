@extends('admin/index/index')
@section('content_header')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">商品添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">商品名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_img" placeholder="请输入商品名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">商品logo</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">请选择图片</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_price" placeholder="请输入商品价格">
                </div>
                    <div class="form-group">
                        <label>商品类型</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option disabled="disabled">California (disabled)</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
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