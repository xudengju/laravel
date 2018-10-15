<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/29
 * Time: 9:58
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Type;

use App\Models\Email_user;

class IndexService extends Controller
{
      public function type()
      {
          $type = new Type();
          $data = $type->getAll();
          return $data;
      }
      public function goods()
      {
        $goods = new Goods();
        $res = $goods->goodsType();
        return $res;
      }
      public function parts()
      {
          $parts = new Goods();
          $result = $parts->getAll();
          return $result;
      }
}