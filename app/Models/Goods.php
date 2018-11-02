<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function getOne($id)
    {
        $data = Db::table('goods')
            ->join('type','goods.type_id','=','type.type_id')
            ->where('goods_id',$id)->first();
        return $data;
    }
    //删除
    public function del($id,$data)
    {
        return $this->where('goods_id',$id)->update($data);
    }
    //根据type_id查询商品
    public function getGoods($type_id)
    {
        return $this->where(['type_id'=>$type_id])->get()->toArray();
    }
    //查询is_new=1d的全部数据
    public function getAll()
    {
        return $this->where(['is_new'=>1])->get()->take(4)->toArray();

    }
    /*
     * 查询全部商品
     * */
    public function getGoodsAll()
    {
        return $this->get()->toArray();
    }

    public function goodsType()
    {
        $data = $this->with('type')->get()->take(5)->toArray();
        return $data;
    }
    /*
     * 两表联查
     * */
    public function goodsTypes()
    {
        $data = Db::table('goods')
            ->join('type','goods.type_id','=','type.type_id')
            ->paginate(10);
//        $data = $this->with('type')->get()->take(5)->toArray();
       return $data;
    }
    public function type()
    {
        return $this->hasOne('App\Models\type','type_id','goods_id');
    }
    //修改数据
    public function goodsUpdate($id,$data)
    {
        if($this->find($id)){
            return $this->where('goods_id',$id)->update($data);
        }else{
            return false;
        }
    }
    //查询出商品名称和货号
    public function skuAdd($goods_id)
    {
        return $this->where('goods_id',$goods_id)->get(['goods_name','goods_no'])->first()->toArray();
    }

    public function getOneGood($id)
    {
        return $this->where('goods_id',$id)->get(['goods_name','goods_id'])->first()->toArray();
    }
}
