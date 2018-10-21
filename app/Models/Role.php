<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey= 'role_id';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }
    //删除
    public function del($id)
    {
        return $this->where('role_id',$id)->delete();
    }
    //单条查找

    public function getfind($id)
    {
        if($this->where('role_id',$id)->first()){
            return $this->where('role_id',$id)->first()->toArray();
        }else{
            return [];
        }

    }
    //条件查询
    public function getData($where)
    {
        if($this->where($where)->first()){
            return $this->where($where)->first()->toArray();
        }else{
            return [];
        }

    }

    //查询全部数据
    public function getAll()
    {
        return $this->paginate(5);

    }
    //修改
    public function upUser($id,$data)
    {
        if($this->find($id)){
            return $this->where('user_id',$id)->update($data);
        }else{
            return false;
        }
    }
    public function upRole($id,$data)
    {
        if($this->find($id)){
            return $this->where('role_id',$id)->update($data);
        }else{
            return false;
        }
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
