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
use App\Models\Goods;
use App\Models\Type;

class IndexController extends Controller
{
     public function index()
     {
         return view('admin.index.index');
     }
}