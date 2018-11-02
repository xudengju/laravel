<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrValue extends Model
{
    protected $table = 'attr_value';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

//单条查找

    public function getFind($id)
    {
        if($this->where('attr_value_id',$id)->first()){
            return $this->where('attr_value_id',$id)->first()->toArray();
        }else{
            return [];
        }

    }
    /*
     * 全部数据
     * */
    public function getAll($attr_id)
    {
        return $this->where('is_delete',0)->where('attr_id',$attr_id)->get(['attr_value_id','attr_value'])->toArray();
    }
    public function getAttr()
    {
        $data = self::where('is_delete',0)->get();
        return $data;
    }
    public function attrValeOne($attr_value_id)
    {
        $data = $this->with('attr')->where('is_delete',0)->where('attr_value_id',$attr_value_id)->first()->toArray();
        return $data;
    }
    public function attr()
    {
        return $this->hasOne('App\Models\Attr','attr_id','attr_id');
    }

//    public function attrValeOne($attr_value_id)
//    {
//        return self::where('attr_value_id',$attr_value_id)->where('is_delete',0)->first()->toArray();
//    }

    /*
     * 删除
     * */
    public function del($attr_value_id,$data)
    {
        return $this->where('attr_value_id',$attr_value_id)->update($data);
    }

    /*
     * 修改
     * */
    public function attrValueUpdate($data)
    {
        return $this->where('attr_value_id',$data['attr_value_id'])->update($data);
    }
    /*
     * 查询多条
     * */
    public function attrValueMany($attr_value_id)
    {
        return $this->whereIn('attr_value_id',$attr_value_id)->get(['attr_value'])->toArray();
    }


    public function attrValueDelete($attr_id)
    {
        return $this->whereIn('attr_value_id',$attr_id)->delete();
    }

   /*
    *根据attr_id查询attr_calue
    * */
   public function getAttrValues($attr_id)
   {
       return $this->with('attrName')->whereIn('attr_id',$attr_id)->get()->toArray();
   }

    public function attrName()
    {
        return $this->hasOne('App\Models\Attr','attr_id','attr_id');
    }

    /*
     * 查询多条属性值和属性id
     * */
    public function attrValuesMany($attr_value_id)
    {
        return $this->whereIn('attr_value_id',$attr_value_id)->get(['attr_value','attr_id'])->toArray();
    }
}
