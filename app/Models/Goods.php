<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $primaryKey= 'goods_id';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

   //单条查找

    public function getfind($id)
    {
        if($this->where('goods_id',$id)->first()){
            return $this->where('goods_id',$id)->first();
        }else{
            return [];
        }

    }
    //根据type_id查询商品
    public function getGoods($type_id)
    {
        return $this->where(['type_id'=>$type_id])->get()->toArray();
    }
    //查询全部数据
    public function getAll()
    {
        return $this->where(['is_new'=>1])->get()->take(4)->toArray();

    }

    public function goodsType()
    {
        $data = $this->with('type')->get()->take(5)->toArray();
        return $data;
    }
    public function type()
    {
        return $this->hasMany('App\Models\type','type_id');
    }


}
