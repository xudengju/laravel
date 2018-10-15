<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/28
 * Time: 9:33
 */
namespace App\Http\Controllers\Index;

use App\Services\IndexService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Goods;
use Illuminate\Support\Facades\Redis;


class IndexController extends Controller
{
    /*
     * 主页
     */
    public function index()
    {
        if(session()->get('user')){
            $user = session()->get('user');
            $user = unserialize($user);
        }
        $username = isset($user->user_name)?$user->user_name:'';
        if (Redis::get('type')&&Redis::get('res')&&Redis::get('result')){
           $type = unserialize(Redis::get('type'));
           $res = unserialize(Redis::get('res'));
           $result = unserialize(Redis::get('result'));
         }else{

//        var_dump($username);die;
            $index = new IndexService();
            $type = $index->type();
            $res = $index->goods();
            $result = $index->parts();
            $types = serialize($type);
            $goods = serialize($res);
            $parts = serialize($result);
            Redis::set('type',$types);
            Redis::set('res',$goods);
            Redis::set('result',$parts);
        }
//        var_dump($result);die;
        return view('index\index\index',['username'=>$username,'type'=>$type,'res'=>$res,'result'=>$result]);
    }
}