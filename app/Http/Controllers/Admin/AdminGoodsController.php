<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/17
 * Time: 18:47
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\Services\AdminIndexService;

class AdminGoodsController extends Controller
{
     public function add()
     {
         return view('admin.goods.add');
     }
     public function list()
     {
         return view('admin.goods.list');
     }
}