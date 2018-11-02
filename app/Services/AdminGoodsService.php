<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/23
 * Time: 13:39
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Type;
use App\Models\Attr;
use App\Models\AttrValue;
use App\Models\TypeAttr;
use App\Models\Cargo;

class AdminGoodsService extends Controller
{
    /*
     * 商品类型获取
     * */
    public function getType()
    {
        $type = new Type();
        $type = $type->getAll();
        return $type;
    }
    /*
     * 商品添加
     * */
    public function goodsAdd($goods)
    {
        $goodsModel = new Goods();
        $id = $goodsModel->add($goods);
        return $id;
    }
    /*
     * 商品删除
     * */
    public function goodsDelete($goods_id)
    {
        $goodsModel = new Goods();
        $data = [
            'is_delete'=>1
        ];
        $id = $goodsModel->del($goods_id,$data);
        return $id;
    }
    /*
     * 商品展示
     * */
    public function goodsList()
    {
        $goods = new Goods();
        $data = $goods->goodsTypes();
//        dd($data);
        return $data;
    }
    /*
     * 商品修改
     * */
    public function goodsSave($goods_id)
    {
        $goods = new Goods();
        $data = $goods->getOne($goods_id);
//        dd($data);
        return $data;
    }
    public function goodsUpdate($data)
    {
        $goods = new Goods();
        $data['update_time'] = date("Y-m-d H:i:s");
        $data = $goods->goodsUpdate($data['goods_id'],$data);
        return $data;
    }
   /*
    *  商品分类列表
    *
    */
    public function typeList()
    {
        $type = new Type();
        $data = $type->getMany();
        return $data;
    }
    /*
     * 假删除
     * */
    public function typeDelete($type_id)
    {
        $type = new Type();
        $data = [
            'is_delete'=> 1
        ];
        $id = $type->del($type_id,$data);
        return $id;
    }
    /*
     * 商品分类的添加
     * */
    public function typeAdd($data)
    {
        $type = new Type();
        $id = $type->add($data);
        return $id;
    }
    /*
     * 分类修改
     * */
    public function typeSave($id)
    {
        $type = new Type();
        $data = $type->typeOne($id);
        return $data;
    }
    /*
     * 执行修改
     * */
    public function typeUpdate($data)
    {
        $type = new Type();
        $id = $type->typeUpdate($data);
        return $id;
    }
    /*
     * 属性列表
     * */
    public function attrList()
    {
        $attr = new Attr();
        $data = $attr->getAll();
        return $data;
    }
    /*
     * 属性删除
     * */
    public function attrDelete($id)
    {
        $attr = new Attr();
        $data = [
            'is_delete'=>1
        ];
        $id = $attr->del($id,$data);
        return $id;
    }
    /*
     * 属性修改
     * */
    public function attrOne($attr_id)
    {
        $attr = new Attr();
        $data = $attr->attrOne($attr_id);
        return $data;
    }

    public function attrUpdate($data)
    {
        $attr = new Attr();
        $id = $attr->attrUpdate($data);
        return $id;
    }
    /*
     * 属性添加
     * */
    public function attrAdd($data)
    {
        $attr = new Attr();
        $data['is_delete'] = 0;
        $id = $attr->add($data);
        return $id;
    }
    /*
     * 属性值添加
     * */
    public function attrValueAdd($data)
    {
          $attrValue = new AttrValue();
          $data['is_delete'] = 0;
          $id = $attrValue->add($data);
          return $id;
    }
    /*
     * 属性值列表
     * */
    public function attrValueList()
    {
        $attrValue = new AttrValue();
        $data = $attrValue->getAttr();
        return $data;
    }
    /*
     * 属性值删除
     * */
    public function attrValueDelete($attr_value_id)
    {
        $attrValue = new AttrValue();
        $data = [
            'is_delete' => 1
        ];
        $id = $attrValue->del($attr_value_id,$data);
        return $id;
    }
    /*
     * 属性值修改
     * */
    public function attrValeOne($id)
    {
        $attr = new AttrValue();
        $data = $attr->attrValeOne($id);
        return $data;
    }

    public function attrValueUpdate($data)
    {
        $attrValue = new AttrValue();
        $id = $attrValue->attrValueUpdate($data);
        return $id;
    }
    /*
     * 获取到所有的类型
     * */
    public function getAttrs()
    {
        $attr = new Attr();
        $data =$attr->getAll();
        return $data;
    }
    /*
     * 获取一条类型
     * */
    public function typeOne($type_id)
    {
        $type = new Type();
        $typeOne = $type->getFind($type_id);
        return $typeOne;
    }
    public function typeAttrDelete($id)
    {
       $typeAttr = new TypeAttr();
       $id = $typeAttr->del($id);
       return $id;
    }
    public function typeAttrAdd($data)
    {
        $typeAttr = new TypeAttr();
        $id = $typeAttr->add($data);
        return $id;
    }
    /*
     * 获取属性值
     * */
    public function attrValueOne($attr_id)
    {
        $attrValue = new AttrValue();
        $attrOne = $attrValue->getAll($attr_id);
        return $attrOne;
    }
    /*
     * 根据attr_value_id查询出attr_value
     * */
    public function attrValueMany($attr_value_id)
    {
        $attrValue = new AttrValue();
        $attr_value = $attrValue->attrValueMany($attr_value_id);
        return $attr_value;
    }
    public function typeAttrValueDelete($attr_id)
    {
        $attrValue = new AttrValue();
        $id = $attrValue->attrValueDelete($attr_id);
        return $id;
    }
    /*
     * 获取商品名称和货号
     * */
    public function skuAdd($goodsw_id)
    {
           $goods = new Goods();
           $data = $goods->skuAdd($goodsw_id);
           return $data;
    }

    /*
     *获取属性
     * */
    public function getAttr($type_id)
    {
        $typeAttr = new TypeAttr();
        $attr_ids = $typeAttr->getAttrs($type_id);
        return $attr_ids;
    }

    /*
     * 获取属性名称
     * */
    public function getAttrValue($attrValuesId)
    {
        $attrValue = new Attr();
        $attr_value = $attrValue->attrValues($attrValuesId);
        return $attr_value;
    }

    /*获取属性值
     *
     * */
    public function getAttrValues($attr_id)
    {
        $attrValues = new AttrValue();
        $data = $attrValues->getAttrValues($attr_id);
        return $data;
    }
   /*
    * 获取属性值和属性id
    * */
   public function getAttrAttrValues($attr_value_id)
   {
       $attrValue = new AttrValue();
       $data = $attrValue->attrValuesMany($attr_value_id);
       return $data;
   }



   /*
    * 笛卡尔计算结果集
    */
   public function processing($data)
   {
       // 保存结果
       $result = array();

       // 循环遍历集合数据
       for($i=0,$count=count($data); $i<$count-1; $i++){

           // 初始化
           if($i==0){
               $result = $data[$i];
           }

           // 保存临时数据
           $tmp = array();
           // 结果与下一个集合计算笛卡尔积
           if(is_array($result)){
               foreach($result as $res){
                   foreach($data[$i+1] as $set){
                       $tmp[] = $res.','.$set;
                   }
               }
           }


           // 将笛卡尔积写入结果
           $result = $tmp;

       }

       return $result;


   }
   public function getGoodsInfo($id)
   {
       $goods = new Goods();
       $data = $goods->getOneGood($id);
       return $data;
   }
   public function AddCargo($data)
   {
       $cargo = new Cargo();
       $res = $cargo->add($data);
       return $res;
   }
}
