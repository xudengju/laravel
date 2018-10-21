<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/10/16
 * Time: 10:50
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Menu;
use App\Models\ReourceRole;
use App\Models\UserRole;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminUser;
use App\Models\Role;


use App\Models\Email_user;

class AdminUserService extends Controller
{
       public function login($data)
       {
            $adminUser = new AdminUser();
            $where = [
                'user_email'=>$data['email'],
                'user_pwd'=>$data['password']
            ];
            $userData = $adminUser->getData($where);
            if($userData){
                $arr['login_time'] =date("Y-m-d H:i:s");
                $adminUser->upUser($userData['user_id'],$arr);
                session()->put("user", $userData);
            }
            return $userData;
       }
       /*
        * 管理员列表
        * */
      public function list()
      {
          $adminUser = new AdminUser();
          $userData = $adminUser->getAll();
          return $userData;
      }

      /*
       * 角色列表
       * */
    public function rolelist()
    {
        $role = new Role();
        $roleData = $role->getAll();
        return $roleData;
    }
    /*
     * 角色添加
     * */
    public function roleAdd($data)
    {
        $role = new Role();
        $id = $role->add($data);
        return $id;
    }

    /*
     * 角色删除
     * */
    public function roleDel($id)
    {
        $role = new Role();
        $data = $role->del($id);
        return $data;
    }
    /*
     * 角色修改
     * */
    public function roleSav($id)
    {
        $role = new Role();
        $data = $role->getfind($id);
        return $data;
    }

    public function roleUp($data)
    {
        $role = new Role();
        $up['role_name'] = $data['role_name'];
        $data = $role->upRole($data['role_id'],$up);
        return $data;
    }
    /*
     * 权限列表
     * */
    public function nodelist()
    {
        $menu = new Menu();
        $menuData = $menu->getAll();
        return $menuData;
    }

    /*
     * 权限添加
     * */
    public function nodeCreate($data)
    {
        $menu = new Menu();
        $id = $menu->add($data);
        return $id;
    }
    /*
     * 权限删除
     * */
    public function nodeDel($id)
    {
        $menu = new Menu();
        $res = $menu->del($id);
        return $res;
    }
    /*
     * 权限修改
     * */
    public function nodeSav($id)
    {
        $menu = new Menu();
        $data = $menu->getfind($id);
        return $data;
    }

    public function nodeUp($data)
    {
        $menu = new Menu();
        $id = $data['menu_id'];
//        return $data;
        $res = $menu->nodeUpdate($id,$data);
        return $res;
    }
    /*
     * 用户添加
     * */
    public function userAdd($data)
    {
        $adminUser = new AdminUser();
        $data['create_time'] = date("Y-m-d H:i:s");
        $data['login_time'] = date("Y-m-d H:i:s");
        $id = $adminUser->add($data);
        return $id;
    }
    /*
     * 用户删除
     * */
    public function userdelete($id)
    {
        $adminUser = new AdminUser();
        $id = $adminUser->del($id);
        return $id;
    }
    /*
     * 用户修改
     * */
    public function userSav($id)
    {
        $adminUser = new AdminUser();
        $data = $adminUser->getfind($id);
        return $data;
    }
    public function userUp($data)
    {
        $adminUser = new AdminUser();
        $id = $data['user_id'];
        $res = $adminUser->userUp($id,$data);
       return $res;
    }
    /*
     * 给用户添加角色
     * */
    public function userFirst($id)
    {
        $adminUser = new AdminUser();
        $data = $adminUser->getfind($id);
        return $data;
    }
    //查出role_id
    public function getRoleIds($user_id)
    {
        $userRole = new UserRole();
        $role_id = $userRole->getRole($user_id);
        return $role_id;
    }
    /*
     * 用户角色添加
     * */
    public function userRolesAdd($data)
    {
        $userRole = new UserRole();
        $id = $userRole->add($data);
        return $id;
    }
    /*
     * 用户角色删除
     * */
    public function userRoleDelete($user_id)
    {
        $userRole = new UserRole();
        $id = $userRole->del($user_id);
        return $id;
    }
    /*
     * 根据role_id查出role_name
     * */
    public function getRole($role_id)
    {
        $role = new Role();
        $roleData = $role->getfind($role_id);
        return $roleData;
    }
    /*
     * 根据role_id查出权限id
     * */
    public function getMenuIds($role_id)
    {
        $menu = new ReourceRole();
        $ids = $menu->getMenuId($role_id);
        return $ids;
    }
    /*
     * 给角色分配权限
     * */
    public function roleMenuAdd($data)
    {
        $reourse = new ReourceRole();
        $id = $reourse->add($data);
        return $id;
    }
    /*
     * 删除角色权限
     * */
    public function userMenuDelete($role_id)
    {
        $reourse = new ReourceRole();
        $id =$reourse->MenuDelete($role_id);
        return $id;
    }
    /*
     * 控制按钮
     * */
    public function getUrl($url,$user_id)
    {
        $role = new UserRole();
        $resource = new ReourceRole();
        $menu = new Menu();
        $role_id = $role->getRole($user_id);
        $num = count($role_id);
        for ($i=0;$i<$num;$i++){
            $where[] = $role_id[$i]['role_id'];
        }
//        return $where;
        $is_resource = $resource->getMenu($where);
//        return $is_resource;
        if ($is_resource){
            $urls = $menu->getUrl($is_resource);
            $num1 = count($urls);
            for ($i=0;$i<$num1;$i++){
                $url1[] = $urls[$i]['url'];
            }
            $urlSubstr = substr($url,1);
//         dd($urlSubstr);
            if (in_array($urlSubstr,$url1)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

}