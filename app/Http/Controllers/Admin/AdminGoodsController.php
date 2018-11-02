<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/17
 * Time: 18:47
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\Services\AdminGoodsService;

class AdminGoodsController extends Controller
{
    /*
     * 商品添加
     * */
    public function add(Request $request)
    {
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->getType();
        $attr = $adminGoods->getAttrs();
//         dd($data);
        if ($request->all()) {
            $goods = $request->input();
            array_shift($goods);
            $cargo["sku_attrValue_id"] = $goods["sku_attrValue_id"];
            $cargo["sku_str"] = $goods["sku_str"];
            $cargo["sku_no"] = $goods["sku_no"];
            $cargo["price"] = $goods["price"];
            $cargo["invoutory"] = $goods["invoutory"];
            unset($goods["sku_attrValue_id"],$goods["sku_str"],$goods["sku_no"],$goods["price"],$goods["invoutory"]);
//            dd($goods);
//            dd($cargo);
            $goods_no = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);;
            $file = $request->file('goods_img');
            if ($file) {
                $destinationPath = 'uploads/';
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(10) . '.' . $extension;
//              dd($fileName);
                $file->move($destinationPath, $fileName);
                $filePath = asset($destinationPath . $fileName);
                $goods['goods_img'] = $filePath;
                $goods['goods_no'] = $goods_no;
                $goods['create_time'] = date("Y-m-d H:i:s");
                $goods['update_time'] = date("Y-m-d H:i:s");
                $goods['views'] = 0;
                $goods['is_delete'] = 0;
                $goods['salues_num'] = 0;
                $goods['commet_num'] = 0;
                $id = $adminGoods->goodsAdd($goods);
                $good = $adminGoods->getGoodsInfo($id);
                if ($id) {
                    $res = [];
                    $num = count($cargo["sku_attrValue_id"]);
//            dd($num);

                    for($i=0;$i<$num;$i++){
                        $color = explode(",",$cargo["sku_str"][$i]);
                        $res['goods_id'] = $good['goods_id'];
                        $res['name'] = $color['0'].$color['1'].$color['2'].$good['goods_name'];
                        $res['sku_attrValue_id'] = $cargo["sku_attrValue_id"][$i];
                        $res['sku_str'] = $cargo["sku_str"][$i];
                        $res['sku_no'] = $cargo["sku_no"][$i];
                        $res['price'] = $cargo["price"][$i];
                        $res['invoutory'] = $cargo["invoutory"][$i];
                        $res['update_time'] = date("Y-m-d H:i:s");
                        $res['create_time'] = date("Y-m-d H:i:s");
                        $cargo_id = $adminGoods->AddCargo($res);
                    }
                }
                if($cargo_id){
                    return view('jump')->with([
                        'message' => '添加成功',
                        'name' => '列表',
                        'url' => '/admingoods/list',
                        'jumpTime' => '2',
                    ]);
                }
            }
        }
        return view('admin.goods.add', ['data' => $data,'attr'=>$attr]);
    }

    /*
     * 商品删除
     * */
    public function delete(Request $request)
    {
        $goods_id = $request->get('goods_id');
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->goodsDelete($goods_id);
        if ($id) {
            return view('jump')->with([
                'message' => '商品删除成功',
                'name' => '列表',
                'url' => '/admingoods/list',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 商品列表
     * */
    public function list()
    {
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->goodsList();
//         dd($data);
        return view('admin.goods.list', ['data' => $data]);
    }

    /*
     * 商品修改
     * */
    public function goodsSave(Request $request)
    {
        $goods_id = $request->get('goods_id');
        $adminGoods = new AdminGoodsService();
        $goods = $adminGoods->goodsSave($goods_id);
        $data = $adminGoods->getType();
//         dd($goods);
        return view('admin.goods.goodsSave', ['goods' => $goods, 'data' => $data]);
    }

    public function goodsUpdate(Request $request)
    {
        $data = $request->input();
        array_shift($data);
        $adminGoods = new AdminGoodsService();
        $goods = $adminGoods->goodsUpdate($data);
        if ($goods) {
            return view('jump')->with([
                'message' => '商品修改成功',
                'name' => '列表',
                'url' => '/admingoods/list',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 商品分类列表
     * */
    public function typeList()
    {
        $adminGoods = new AdminGoodsService();
        $type = $adminGoods->typeList();
//         dd($type);
        return view('admin.goods.typeList', ['type' => $type]);
    }

    /*
     * 商品分类删除
     * */
    public function typeDelete(Request $request)
    {
        $type_id = $request->get('type_id');
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->typeDelete($type_id);
        if ($id) {
            return view('jump')->with([
                'message' => '删除成功',
                'name' => '分类列表',
                'url' => '/adminGoods/typeList',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 商品分类添加
     * */
    public function typeAdd(Request $request)
    {
        $adminGoods = new AdminGoodsService();
        $data = $request->input();
        array_shift($data);
        if ($data) {
            $data['is_delete'] = 0;
            $id = $adminGoods->typeAdd($data);
            if ($id) {
                return view('jump')->with([
                    'message' => '分类添加成功',
                    'name' => '分类列表',
                    'url' => '/adminGoods/typeList',
                    'jumpTime' => '2',
                ]);
            }
        }

        $data = $adminGoods->getType();
        return view('admin.goods.typeAdd', ['data' => $data]);
    }

    /*
     * 商品分类的修改
     * */
    public function typeSave(Request $request)
    {
        $type_id = $request->get('type_id');
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->typeSave($type_id);
        $type = $adminGoods->getType();
        return view('admin.goods.typeSave', ['data' => $data, 'type' => $type]);
    }

    public function typeUpdate(Request $request)
    {
        $data = $request->input();
        array_shift($data);
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->typeUpdate($data);
        if ($id) {
            return view('jump')->with([
                'message' => '分类修改成功',
                'name' => '分类列表',
                'url' => '/adminGoods/typeList',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 属性列表
     * */
    public function attrList()
    {
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->attrList();
        return view('admin.goods.attrList', ['data' => $data]);
    }

    /*
     * 属性删除
     * */
    public function attrDelete(Request $request)
    {
        $attr_id = $request->get('attr_id');
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->attrDelete($attr_id);
        if ($id) {
            return view('jump')->with([
                'message' => '删除成功',
                'name' => '属性列表',
                'url' => '/adminGoods/attrList',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     *属性修改
     * */
    public function attrSave(Request $request)
    {
        $id = $request->get('attr_id');
        $adminGoods = new AdminGoodsService();
        $attr = $adminGoods->attrOne($id);
        return view('admin.goods.attrSave', ['data' => $attr]);
    }

    public function attrUpdate(Request $request)
    {
        $data = $request->input();
        array_shift($data);
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->attrUpdate($data);
        if ($id) {
            return view('jump')->with([
                'message' => '修改成功',
                'name' => '属性列表',
                'url' => '/adminGoods/attrList',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 属性添加
     * */
    public function attrAdd(Request $request)
    {
        $data = $request->input();
        if ($data) {
            array_shift($data);
            $adminGoods = new AdminGoodsService();
            $id = $adminGoods->attrAdd($data);
            if ($id) {
                return view('jump')->with([
                    'message' => '添加成功',
                    'name' => '属性列表',
                    'url' => '/adminGoods/attrList',
                    'jumpTime' => '2',
                ]);
            }
        }

        return view('admin.goods.attrAdd');
    }

    /*
     * 属性值添加
     * */
    public function attrValueAdd(Request $request)
    {
        $data = $request->input();
        $adminGoods = new AdminGoodsService();
        $attr = $adminGoods->attrList();
//         dd($attr);
        if ($data) {
            array_shift($data);
            $id = $adminGoods->attrValueAdd($data);
            if ($id) {
                return view('jump')->with([
                    'message' => '添加成功',
                    'name' => '属性值列表',
                    'url' => '/adminGoods/attrValueList',
                    'jumpTime' => '2',
                ]);
            }
        }
        return view('admin.goods.attrValueAdd', ['attr' => $attr]);
    }

    /*
     * 属性值列表
     * */
    public function attrValueList()
    {
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->attrValueList();
//         dd($data);
        return view('admin.goods.attrValueList', ['data' => $data]);
    }

    /*
     * 属性值删除
     * */
    public function attrValueDelete(Request $request)
    {
        $attr_value_id = $request->get('attr_value_id');
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->attrValueDelete($attr_value_id);
        if ($id) {
            return view('jump')->with([
                'message' => '删除成功',
                'name' => '属性值列表',
                'url' => '/adminGoods/attrValueList',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 属性值修改
     * */
    public function attrValueSave(Request $request)
    {
        $attr_value_id = $request->get('attr_value_id');
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->attrList();
        $attr = $adminGoods->attrValeOne($attr_value_id);
//         dd($attr);
        return view('admin.goods.attrValueSave', ['data' => $attr, 'attr' => $data]);
    }

    /*
     * 执行属性值修改
     * */
    public function attrValueUpdate(Request $request)
    {
        $attrValues = $request->input();
        array_shift($attrValues);
        $adminGoods = new AdminGoodsService();
        $id = $adminGoods->attrValueUpdate($attrValues);
        if ($id) {
            return view('jump')->with([
                'message' => '修改成功',
                'name' => '属性值列表',
                'url' => '/adminGoods/attrValueList',
                'jumpTime' => '2',
            ]);
        }
    }

    /*
     * 分类属性
     * */
    public function typeAttr(Request $request)
    {
        $type_id = $request->get('type_id');
        $adminGoods = new AdminGoodsService();
        $attrData = $adminGoods->getAttrs();
        $typeOne = $adminGoods->typeOne($type_id);
        return view('admin.goods.typeAttr', ['attrData' => $attrData, 'typeOne' => $typeOne]);
    }
    /*
     * 执行分配
     * */
    public function typeAttrAdd(Request $request)
    {
        $data = $request->input();
        array_shift($data);
        $adminGoods = new AdminGoodsService();
        $deleteId = $adminGoods->typeAttrDelete($data['type_id']);
//         dd($deleteId);
        if ($deleteId) {
            $arr = $data['attr_id'];
            $num = count($data['attr_id']);
            $arr = [];
//            dd($data);
            for ($i = 0; $i < $num; $i++) {
                $arr['type_id'] = $data['type_id'];
                $arr['attr_id'] = $data['attr_id'][$i];
                $id = $adminGoods->typeAttrAdd($arr);
            }
            if ($id==0) {
                return view('jump')->with([
                    'message' => '分配成功',
                    'name' => '属性值列表',
                    'url' => '/adminGoods/typeList',
                    'jumpTime' => '2',
                ]);
            }
        }else{
            $arr = $data['attr_id'];
            $num = count($data['attr_id']);
            $arr = [];
//            dd($data);
            for ($i = 0; $i < $num; $i++) {
                $arr['type_id'] = $data['type_id'];
                $arr['attr_id'] = $data['attr_id'][$i];
                $id = $adminGoods->typeAttrAdd($arr);
            }
            if ($id==0) {
                return view('jump')->with([
                    'message' => '分配成功',
                    'name' => '属性值列表',
                    'url' => '/adminGoods/typeList',
                    'jumpTime' => '2',
                ]);
            }
        }
    }
    /*
     * 属性分配属性值
     * */
    public function attrValueNode(Request $request)
    {
        $attr_id = $request->get('attr_id');
        $adminGoods = new AdminGoodsService();
        $attrOne = $adminGoods->attrOne($attr_id);
       $attrValue = $adminGoods->attrValueOne($attr_id);
       return view('admin.goods.attrValueNode',['attrOne'=>$attrOne,'attrValue'=>$attrValue]);
    }
    /*
     * 执行分配属性值
     * */
    public function attrValueNodeAdd(Request $request)
    {
        $data = $request->input();
        array_shift($data);
        $adminGoods = new AdminGoodsService();
        $attr_value = $adminGoods->attrValueMany($data['attr_value_id']);
            $num = count($data['attr_value_id']);
            $arr = [];
            for ($i = 0; $i < $num; $i++) {
                $arr['attr_id'] = $data['attr_id'];
                $arr['attr_value'] = $attr_value[$i]['attr_value'];
                $id = $adminGoods->attrValueAdd($arr);
            }
          $id = $adminGoods->typeAttrValueDelete($data['attr_value_id']);
            if ($id) {
                return view('jump')->with([
                    'message' => '分配成功',
                    'name' => '属性值列表',
                    'url' => '/adminGoods/typeList',
                    'jumpTime' => '2',
                ]);
            }
    }

    /*
     * 添加sku
     * */
    public function skuAdd(Request $request)
    {
        $goods_id = $request->get('goods_id');
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->skuAdd($goods_id);

        return view('admin.goods.skuAdd',['data'=>$data]);
    }
    /*
     * ajax获取属性
     * */
    public function getAttrs(Request $request)
    {
        $type_id = $request->post("type_id");
        $adminGoods = new AdminGoodsService();
        $attr_ids = $adminGoods->getAttr($type_id);
        $attr_vlue = $adminGoods->getAttrValue($attr_ids);
        return $attr_vlue;
    }
    /*
     * ajax获取属性值
     * */
    public function getAttrValue(Request $request)
    {
        $attr_id  = $request->post('attr_id');
        $attr_ids = explode(",",$attr_id);
        $adminGoods = new AdminGoodsService();
        $data = $adminGoods->getAttrValues($attr_ids);
        return $data;
    }
    /*
     * ajax获取属性值对应的属性值
     * */
    public function getAttrAttrValue(Request $request)
    {
        $input = $request->input();
//        return $input;

        $adminGoods = new AdminGoodsService();
        foreach ($input as $key => $value) {
            $data[] = $adminGoods->processing($value);
        }
        return $data;
    }
}