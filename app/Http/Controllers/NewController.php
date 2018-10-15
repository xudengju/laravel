<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/27
 * Time: 12:09
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
      public function new()
        {
//            echo "hello word";
            return view('new');
        }
       public function show()
       {
            $user = DB::select("select * from new");
            return view('show',compact('user'));
       }
}