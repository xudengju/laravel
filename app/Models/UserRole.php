<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_role';
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

    //查询出user_id对应的role_id
    public function getRole($user_id)
    {
        return $this->where('user_id',$user_id)->get(['role_id'])->toArray();
    }

    public function del($user_id)
    {
        return $this->where('user_id',$user_id)->delete();
    }

}
