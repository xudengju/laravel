
@extends('admin/index/index')
@section('content_header')

    <script type="text/javascript" src="/js/wangEditor.js"></script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">商品添加</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{url('goodsAdd')}}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">商品名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_name" placeholder="请输入商品名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">商品logo</label>
                    <input type="file" id="exampleInputFile" name="goods_img">
                    <p class="help-block">请选择图片</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_price" placeholder="请输入商品价格">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否上下架</label>
                    <p> <input name="is_up" type="radio" value="1" />是
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input name="is_up" type="radio" value="0" />否</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品库存</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="goods_num" placeholder="请输入商品库存">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否新品</label>
                    <p> <input name="is_new" type="radio" value="1" />是
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input name="is_new" type="radio" value="0" />否</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品描述</label>
                    <div id="editor">

                    </div>
                    <textarea id="text1" style="width:100%; height:200px;" name="describe"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">促销商品价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="promotion_price" placeholder="请输入促销商品价格">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否促销</label>
                    <p> <input name="is_sale" type="radio" value="1" />是
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input name="is_sale" type="radio" value="0" />否</p>
                </div>
                    <div class="form-group">
                        <label>商品类型</label>
                        <select id="typeSelect" class="form-control select" style="width: 100%;" name="type_id">
                            <option value="0" selected="selected" >请选择</option>
                            @foreach($data as $k=>$v)
                                <option value="{{$v['type_id']}}" >{{$v['type_name']}}</option>
                                @foreach($v['child'] as $key =>$val)
                                    <option value="{{$val['type_id']}}" >—|—|{{$val['type_name']}}</option>
                                @foreach($val['child'] as $key=>$y)
                                    <option value="{{$y['type_id']}}" >—|—|—|{{$y['type_name']}}</option>
                                    @endforeach
                                    @endforeach
                            @endforeach
                        </select>
                    </div>
                <div class="form-group" hidden id="attrs">
                    <label>属性</label>
                    <select id="selectAttr" class="form-control select2 select2-hidden-accessible" tabindex="-1" multiple="" data-placeholder="请选择" style="width: 100%;" aria-hidden="true" >

                    </select>
                </div>
                <div class="form-group" hidden id="attrValueDiv">
                    <label>属性值</label>
                    <table id="attrValue">

                    </table>
                </div>
            </div>
            <div class="box-footer" id="button" hidden align="right">
                <button type="button" class="btn btn-primary" id="add">添加货品</button>
            </div>
            <div class="row" id="table" hidden>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">货品数据</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-striped">
                                <tbody><tr>
                                    <th>组合类型</th>
                                    <th>货品编号</th>
                                    <th>价格</th>
                                    <th>库存</th>
                                    <th>操作</th>
                                </tr> </tbody>
                                <tbody class="tbody">

                                </tbody>
                               </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function(){
            $('.select2').select2();
            $(".select2").change(function(){
                var attr_id = $(this).val();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "post",
                    url: "/getAttrValue",
                    data: "attr_id="+attr_id,
                    success: function(msg){
                            var attrValue = '';
                            var attrValue1 = '';
                            var attrValue2 = '';
                            for (var i in msg){
                                // console.log(msg);
                                if(msg[i]['attr_id']== 1){
                                    attrValue += "<td>"+"<input class='attr_value_id' type='checkbox' value='"+msg[i]['attr_value_id']+"'>"+msg[i]['attr_value']+"";
                                }
                                if(msg[i]['attr_id'] == 2){
                                    attrValue1 +=  "<td>"+"<input class='attr_value_id' type='checkbox' value='"+msg[i]['attr_value_id']+"'>"+msg[i]['attr_value']+"";
                                }
                                if(msg[i]['attr_id'] == 3){
                                    attrValue2 +=  "<td>"+"<input class='attr_value_id' type='checkbox' value='"+msg[i]['attr_value_id']+"'>"+msg[i]['attr_value']+"";
                                }
                            }
                        $("#attrValue").html("<tr class='tr_attr_val'>"+"<th>{{$attr[0]['attr_name']}}</th>"+attrValue+"</td></tr><tr class='tr_attr_val'>"+"<th>{{$attr[1]['attr_name']}}</th>"+attrValue1+"</td></tr><tr class='tr_attr_val'>"+"<th>{{$attr[2]['attr_name']}}</th>"+attrValue2+"</td></tr>");
                        $('#attrValueDiv').show();
                        $("#button").show();
                    }
                });
            })
        });

        $("#add").click(function(){
            $("#table").show();
            var chk_valId =[];
            var chk_val = [];
            $('.tr_attr_val').each(function(){
                var chk_valId_son = [];
                var chk_val_son = [];
                $(this).find('.attr_value_id').each(function(){
                    if($(this).is(":checked")){//选中
                        chk_valId_son.push($(this).val());
                        chk_val_son.push($(this).parent().text());
                    }
                })
                chk_valId.push(chk_valId_son);
                chk_val.push(chk_val_son);
            });
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post",
                url: "/adminGoods/getAttrAttrValue",
                data: {chk_valId:chk_valId,chk_val:chk_val},
                success: function(msg){
                      // console.log(msg);return;
                      var table = "";
                      var a ='';
                    for (var i in msg[0]){
                        table += "<tr class='attr_value_"+i+"'><td><input type='hidden' name='sku_attrValue_id[]' value='"+msg[0][i]+"' /><input type='text' style=' border-width:0'  name='sku_str[]' value='"+msg[1][i]+"' /><td>"+"<input name='sku_no[]' style=' border-width:0' value='"+msg[0][i].replace(/,/g,'')+Date.parse(new Date())+"'/>"+"</td>"+"<td>"+"<input name='price[]' value='200'>"+"</td>"+"<td>"+"<input name='invoutory[]' value='500'>"+"</td>"+"<td>"+"<button type='button' class='delete'  value='"+i+"'>删除</button>"+"</td>"+"</tr>";
                    }
                    $(".tbody").html(table);

                    $(".delete").click(function(){
                        var id = $(this).val();
                        $(".attr_value_"+id).remove();
                    });
                }
            });
        })



        var E = window.wangEditor
        var editor = new E('#editor')
        var $text1 = $('#text1')
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        }
        editor.create()
        // 初始化 textarea 的值
        $text1.val(editor.txt.html());

        $("#typeSelect").change(function(){
            var type_id = $(this).val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "post",
                url: "/adminGoods/getAttrs",
                data: "type_id="+type_id,
                success: function(msg){
                    var selectAttr = "";
                    for(var i in msg){
                        selectAttr += "<option  value='"+msg[i]["attr_id"]+"'>"+msg[i]["attr_name"]+"</option>";
                    }
                    $("#selectAttr").html(selectAttr);
                  $('#attrs').show();
                }
            });
        });

    </script>
@stop