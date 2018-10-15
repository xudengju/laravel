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

    class GoodsController extends Controller
    {

        /*
         * 列表
         *
         * */
        public function list()
        {
            return view('index\goods\list');
        }

        public function particulars()
        {
            return view('index\goods\particulars');
        }

        public function cart()
        {
            return view('index\goods\cart');
        }

        public function order()
        {
            return view('index\goods\order');
        }

    }