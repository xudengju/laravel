<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAttr extends Model
{
    protected $table = 'type_attr';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

//单条查找

    public function getFind($id)
    {
        if($this->where('type_id',$id)->first()){
            return $this->where('type_id',$id)->first()->toArray();
        }else{
            return [];
        }

    }

    //根据type_id查到父级id
    public function getType($type_id)
    {
        return $this->where('type_id',$type_id)->first()->toArray();
    }
    public  function getMany()
    {
        $cate = $this->where('is_delete',0)->paginate(10);
        return $cate;
    }
    public function typeOne($type_id)
    {
        return $this->where('type_id',$type_id)->first()->toArray();
    }
//查询全部数据 无限极分类
    public function getAll()
    {
        $cate = $this->where('is_delete',0)->get()->toArray();
        $type = $this->getCid($cate);
        return $type;
    }

    /**
     *$cate laravel查询出来的一个结果集 对象形式
     *$name 这里是给分组起名
     *$pid  0 代表的是顶级菜单
     */
    public function getCid($cate, $name = 'child', $p_id = 0)
    {
        $arr = array();
        foreach ($cate as $v)
        {
            if ($v['p_id'] == $p_id)
            {
                $v["$name"] = $this->getCid($cate, $name, $v['type_id']);
                $arr[]    = $v;
            }
        }
        return $arr;
    }

    /*
     * 删除
     * */
    public function del($type_id)
    {
        return $this->where('type_id',$type_id)->delete();
    }

    /*
     * 修改
     * */
    public function typeUpdate($data)
    {
        return $this->where('type_id',$data['type_id'])->update($data);
    }
    /*
     * 获取所有
     * */
    public function getAlls()
    {
        return $this->where('is_delete',0)->get()->toArray();
    }
    /*
     * 根据type_id查询出attr_id
     * */
    public function getAttrs($type_id)
    {
        return $this->where('type_id',$type_id)->get(['attr_id'])->toArray();
    }
}
