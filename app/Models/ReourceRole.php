<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReourceRole extends Model
{
    protected $table = 'resource_role';
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

    //根据role_id查出所有的权限id
    public function getNode($role_id)
    {
        return $this->whereIn('role_id',$role_id)->get(['is_resource'])->toArray();
    }
    //根据role_id查出所有的权限id
    public function getMenu($where)
    {
        return $this->whereIn('role_id',$where)->where(['type_id'=>0])->get(['is_resource'])->toArray();
    }
    //根据role_id查出所有的权限id
    public function getMenuId($role_id)
    {
        return $this->where('role_id',$role_id)->get(['is_resource'])->toArray();
    }

//    根据role_id删除权限
    public function MenuDelete($role_id)
    {
        return $this->where('role_id',$role_id)->delete();
    }

}
