<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/15
 * Time: 19:51
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Type;

class UserController extends Controller
{
     /*
      * 用户登录
      * */
     public function login()
     {
         return view('admin.user.login');
     }
     /*
      * 用户注册
      * */
     public function register()
     {
         return view('admin.user.register');
     }
}