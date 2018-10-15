<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email_user extends Model
{
    protected $table = 'user_email';
    public $timestamps = false;

//添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

//单条查找

    public function getfind($id)
    {
        if($this->where('user_email_id',$id)->first()){
            return $this->where('user_email_id',$id)->first()->toArray();
        }else{
            return [];
        }

    }

//查询用户有几个uid,返回数量
    public function countCity($uid){
        if($this->where('uid',$uid)->first()){
            return $this->where('uid',$uid)->count();
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
