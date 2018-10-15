<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login_info extends Model
{
    protected $table = 'login_info';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

//单条查找

    public function getFind($id)
    {
        if($this->where('id',$id)->first()){
            return $this->where('id',$id)->first()->toArray();
        }else{
            return [];
        }

    }


//查询全部数据

    public function getAll()
    {
        return $this->get()->toArray();

    }


}
