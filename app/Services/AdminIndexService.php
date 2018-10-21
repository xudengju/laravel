<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/16
 * Time: 10:50
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use http\Env\Request;
use App\Models\Menu;
use App\Models\UserRole;
use App\Models\ReourceRole;

class AdminIndexService extends Controller
{
    //左侧菜单
    public function menu()
    {
        $menu = new Menu();
        $role = new UserRole();
        $resource = new ReourceRole();
        $user = session()->get('user');
        if($user){
             $user_id = $user['user_id'];
        }
        $role_id = $role->getRole($user_id);
        $menu_id = $resource->getNode($role_id);
        $data = $menu->getMenu($menu_id);
        $res = $this->getCid($data);
        return $res;
    }
    /*
     * 无限极分类
     * */
    public function getCid($cate, $name = 'submenu', $p_id = 0)
    {
        $arr = array();
        foreach ($cate as $v)
        {
                if ($v['p_id'] == $p_id)
                {
                    $v["$name"] = $this->getCid($cate, $name, $v['menu_id']);
                    $arr[]    = array_filter($v);
                }
        }
        return $arr;
    }
}