<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/28
 * Time: 9:44
 */
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Type;

    class GoodsController extends Controller
    {

        /*
         * 列表
         *
         * */
        public function list(Request $request)
        {
            $type_id = $request->get('type_id');
            $good = new Goods();
            $goods = $good->getGoods($type_id);
            $type = new Type();
            $p_type = $type->getType($type_id);
            $p_id = $p_type['p_id'];
            $type_parent= $type->getFind($p_id);
            $p_name = $type_parent['type_name'];
            $parent = $type->getFind($type_parent['p_id']);
//            dd($type_parent);
             return view('index.goods.list',['goods'=>$goods,'p_name'=>$p_name,'parent_name'=>$parent['type_name']]);
        }
        /*
         *  商品详情
         * */
        public function particulars()
        {
            return view('index\goods\particulars');
        }
        /*
         * 购物车
         * */
        public function cart()
        {
            return view('index\goods\cart');
        }
        /*
         * 订单
         * */
        public function order()
        {
            return view('index\goods\order');
        }

    }