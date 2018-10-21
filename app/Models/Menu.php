<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;

    //添加 返回id
    public function add($data)
    {
        return $this->insertGetId($data);
    }

//单条查找

    public function getFind($id)
    {
        if($this->where('menu_id',$id)->first()){
            return $this->where('menu_id',$id)->first()->toArray();
        }else{
            return [];
        }

    }
    //修改权限
    public function nodeUpdate($id,$data)
    {
        if($this->where('menu_id',$id)->first()){
            return $this->where('menu_id',$id)->update($data);
        }else{
            return false;
        }
    }
    //删除
    public function del($id)
    {
        return $this->where('menu_id',$id)->delete();
    }



//查询全部数据 无限极分类
    public function getAll()
    {
        $cate = $this->paginate(5);
//        $type = $this->getCid($cate);
        return $cate;
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
                $v["$name"] = $this->getCid($cate, $name, $v['menu_id']);
                $arr[]    = $v;
            }
        }
        return $arr;
    }

   public function getMenu($menu_id)
   {
       return $this->whereIn('menu_id',$menu_id)->get()->toArray();
   }

   public function getUrl($menu_id)
   {
       return $this->whereIn('menu_id',$menu_id)->get(['url'])->toArray();
   }


}
