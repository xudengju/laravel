<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/15
 * Time: 20:29
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\Services\AdminIndexService;
use  App\Services\AdminUserService;

class AdminIndexController extends Controller
{
     public function index()
     {
//         $index = new AdminUserService();
//         $data = $index->getUrl('admingoods/add',1);
//         dd($data);
         return view('admin.index.index');
     }

}