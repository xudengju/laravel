<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $table = 'attr';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

//单条查找

    public function getFind($id)
    {
        if($this->where('attr_id',$id)->first()){
            return $this->where('attr_id',$id)->first()->toArray();
        }else{
            return [];
        }

    }
    /*
     * 全部数据
     * */
    public function getAll()
    {
        return $this->where('is_delete',0)->get()->toArray();
    }

    public function attrOne($attr_id)
    {
        return $this->where('attr_id',$attr_id)->first()->toArray();
    }

    /*
     * 删除
     * */
    public function del($attr_id,$data)
    {
        return $this->where('attr_id',$attr_id)->update($data);
    }

    /*
     * 修改
     * */
    public function attrUpdate($data)
    {
        return $this->where('attr_id',$data['attr_id'])->update($data);
    }
    /*
     * 根据attr_id查询attr_value
     * */
    public function attrValues($attr_id)
    {
        return $this->whereIn('attr_id',$attr_id)->get(['attr_id','attr_name'])->toArray();
    }
   public function getAttrId()
   {
       return $this->get(['attr_id'])->toArray();
   }
}
