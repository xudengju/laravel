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
use App\Services\AdminUserService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AdminUserController extends Controller
{
     /*
      * 用户登录
      * */
     public function login(Request $request)
     {
         $data = $request->all();
//         dd($data);
         if($data){
             array_shift($data);
             $adminUser = new AdminUserService();
             $userData = $adminUser->login($data);
             if ($userData){
                 return view('jump')->with([
                     'message' => '登录成功',
                     'name' => '首页',
                     'url' => '/adminindex/index',
                     'jumpTime' => '2',
                 ]);
             }else{
                 return view('jump')->with([
                     'message' => '登录邮箱或密码错误',
                     'name' => '登录',
                     'url' => '/adminuser/login',
                     'jumpTime' => '2',
                 ]);
             }
         }
         return view('admin.user.login');
     }
     /*
      * 退出
      * */
     public function loginout(Request $request)
     {
         Session::forget("username");
         return redirect('adminuser\login');
     }
     /*
      * 管理员添加
      * */
     public function add(Request $request)
     {
         $data = $request->all();
//         dd($data);
         array_shift($data);
         if($data){
             $adminUser = new AdminUserService();
             $id = $adminUser->userAdd($data);
             if($id){
                 return view('jump')->with([
                     'message' => '添加成功',
                     'name' => '管理员列表',
                     'url' => '/adminuser/list',
                     'jumpTime' => '2',
                 ]);
             }
         }
         return view('admin.user.add');
     }
     /*
      * 管理员删除
      * */
     public function delete(Request $request)
     {
          $id = $request->get('id');
          $adminuser = new AdminUserService();
          $id = $adminuser->userdelete($id);
          if($id){
              return view('jump')->with([
                  'message' => '删除成功',
                  'name' => '管理员列表',
                  'url' => '/adminuser/list',
                  'jumpTime' => '2',
              ]);
          }
     }
     /*
      * 管理员修改
      * */
     public function userSave(Request $request)
     {
         $id = $request->get('id');
         $adminuser = new AdminUserService();
         $data = $adminuser->userSav($id);
//         dd($data);
         return view('admin.user.usersave',['data'=>$data]);
     }

     public function userUpdate(Request $request)
     {
        $data = $request->all();
        array_shift($data);
         $adminuser = new AdminUserService();
         $result = $adminuser->userUp($data);
         if ($result){
             return view('jump')->with([
                 'message' => '修改成功',
                 'name' => '管理员列表',
                 'url' => '/adminuser/list',
                 'jumpTime' => '2',
             ]);
         }
     }
     /*
      * 管理员列表*/
     public function list()
     {
         $userData = new AdminUserService();
         $user = $userData->list();
//         dd($user);
         return view('admin.user.list',['user'=>$user]);
     }
     /*
      * 角色添加
      * */
     public function roleAdd(Request $request)
     {
         $role = $request->all();
//         dd($role);
         array_shift($role);
         if($role){
             $adminUser = new AdminUserService();
             $id = $adminUser->roleAdd($role);
             if($id){
                 return view('jump')->with([
                     'message' => '添加成功',
                     'name' => '角色列表',
                     'url' => '/adminuser/roleList',
                     'jumpTime' => '2',
                 ]);
             }
         }
         return view('admin.user.roleadd');
     }
     /*
      * 角色删除
      * */
     public function roleDelete(Request $request)
     {
         $id = $request->get('id');
         $adminUser = new AdminUserService();
         $data = $adminUser->roleDel($id);
//         dd($data);
         if($data){
             return view('jump')->with([
                 'message' => '删除成功',
                 'name' => '角色列表',
                 'url' => '/adminuser/roleList',
                 'jumpTime' => '2',
             ]);
         }
     }
     /*
      * 角色修改
      * */
     public function roleSave(Request $request)
     {
         $id = $request->get('id');
         $adminUser = new AdminUserService();
         $roleData = $adminUser->roleSav($id);
         return view('admin.user.rolesave',['roleData'=>$roleData]);
     }

     public function roleUpdate(Request $request)
     {
         $data = $request->all();
         array_shift($data);
//         dd($data);
         $adminUser = new AdminUserService();
         $result = $adminUser->roleUp($data);
         if($result){
             return view('jump')->with([
                 'message' => '修改成功',
                 'name' => '角色列表',
                 'url' => '/adminuser/roleList',
                 'jumpTime' => '2',
             ]);
         }
     }
     /*
      * 角色列表
      * */
     public function roleList()
     {
         $roleData = new AdminUserService();
         $role = $roleData->rolelist();
//         dd($user);
         return view('admin.user.rolelist',['role'=>$role]);
     }
     /*
      * 添加权限
      * */
     public function nodeAdd(Request $request)
     {
         $data = $request->all();
         array_shift($data);
//         dd($data);
         if($data){
             $node = new AdminUserService();
             $id = $node->nodeCreate($data);
             if($id){
                 return view('jump')->with([
                     'message' => '添加成功',
                     'name' => '权限列表',
                     'url' => '/adminuser/nodeList',
                     'jumpTime' => '2',
                 ]);
             }
         }

         return view('admin.user.nodeadd');
     }
     /*
      * 权限删除
      * */
     public function nodeDelete(Request $request)
     {
         $id = $request->get('id');
         $adminUser = new AdminUserService();
         $data = $adminUser->nodeDel($id);
         if($data){
             return view('jump')->with([
                 'message' => '删除成功',
                 'name' => '权限列表',
                 'url' => '/adminuser/nodeList',
                 'jumpTime' => '2',
             ]);
         }
     }
     /*
      * 权限修改
      * */
     public function nodeSave(Request $request)
     {
         $id = $request->get('id');
         $adminUser = new AdminUserService();
         $data = $adminUser->nodeSav($id);
         return view('admin.user.nodeSave',['data'=>$data]);
     }
     /*
      * 权限修改
      * */
     public function nodeUpdate(Request $request)
     {
         $data = $request->all();
         array_shift($data);
//         dd($data);
         $adminUser = new AdminUserService();
         $result = $adminUser->nodeUp($data);
//         dd($result);
         if($result){
             return view('jump')->with([
                 'message' => '修改成功',
                 'name' => '权限列表',
                 'url' => '/adminuser/nodeList',
                 'jumpTime' => '2',
             ]);
         }
     }
     /*
      * 权限列表
      * */
     public function nodeList()
     {
         $nodeData = new AdminUserService();
         $node = $nodeData->nodelist();
//         dd($node);
        return view('admin.user.nodelist',['node'=>$node]);
     }

     /*
      * 给用户添加角色
      * */
     public function userRole(Request $request)
     {
         $user_id = $request->get('user_id');
//        dd($user_id);
         $adminUser = new AdminUserService();
         $role = $adminUser->rolelist();
         $user = $adminUser->userFirst($user_id);
         return view('admin.user.userRole',['role'=>$role,'user'=>$user]);
     }
     /*
      * 分配用户角色
      * */
     public function userRoleAdd(Request $request)
     {
         $data = $request->all();
         array_shift($data);
         $adminUser = new AdminUserService();
         $deleteId = $adminUser->userRoleDelete($data['user_id']);
         $result = $adminUser->getRoleIds($data['user_id']);
//         dd($deleteId);
         if($deleteId){
             $arr = $data['role_id'];
             $num = count($data['role_id']);
//         var_dump($result);
             //数据库里没有用户的权限的时候
             if($result==''){
                 $arr = [];
//         dd($num);
                 for ($i=0;$i<$num;$i++)
                 {
                     $arr['user_id']=$data['user_id'];
                     $arr['role_id']=$data['role_id'][$i];
                     $userRole = $adminUser->userRolesAdd($arr);
                 }
             }else{
                 $res = [];
                 foreach ($result as $k=>$v)
                 {
                     $res[] = $v['role_id'];
                 }
                 $role_id = array_diff($arr, $res);
                 $num = count($role_id);
                 $role_id = array_values($role_id);
                 $arr = [];
                 for ($i=0;$i<$num;$i++)
                 {
                     $arr['user_id']=$data['user_id'];
                     $arr['role_id']=$role_id[$i];
                     $userRole = $adminUser->userRolesAdd($arr);
                 }
             }
             if($userRole==0){
                 return view('jump')->with([
                     'message' => '分配角色成功',
                     'name' => '权限列表',
                     'url' => '/adminuser/list',
                     'jumpTime' => '2',
                 ]);
             }
         }else{
             $num = count($data['role_id']);
             $num = count($data['role_id']);
             $arr = [];
//         dd($num);
             for ($i=0;$i<$num;$i++)
             {
                 $arr['user_id']=$data['user_id'];
                 $arr['role_id']=$data['role_id'][$i];
                 $userRole = $adminUser->userRolesAdd($arr);
             }
             if($userRole==0) {
                 return view('jump')->with([
                     'message' => '分配角色成功',
                     'name' => '权限列表',
                     'url' => '/adminuser/list',
                     'jumpTime' => '2',
                 ]);
             }
         }

     }

     public function roleNode(Request $request)
     {
         $role_id = $request->get('id');
         $adminUser = new AdminUserService();
         $data = $adminUser->nodelist();
         $role = $adminUser->getRole($role_id);
//         dd($data);
         return view('admin.user.roleNode',['data'=>$data,'role'=>$role]);
     }

     public function roleMenuAdd(Request $request)
     {
         $data = $request->all();
         array_shift($data);
         $adminUser = new AdminUserService();
         $roleDel = $adminUser->userMenuDelete($data['role_id']);
         $result = $adminUser->getMenuIds($data['role_id']);
         if ($roleDel){
             $num = count($data['is_resource']);
             if($result==''){
                 $arr = [];
//         dd($num);
                 for ($i=0;$i<$num;$i++)
                 {
                     $arr['role_id']=$data['role_id'];
                     $arr['is_resource']=$data['is_resource'][$i];
                     $arr['type_id']=1;
                     $ids = $adminUser->roleMenuAdd($arr);
                 }
             }else{
                 $arr = $data['is_resource'];
//         var_dump($result);
                 $res = [];
                 foreach ($result as $k=>$v)
                 {
                     $res[] = $v['is_resource'];
                 }
                 $is_resource = array_diff($arr, $res);
                 $num = count($is_resource);
//         echo $num;die;
                 $is_resource = array_values($is_resource);
//         dd($is_resource);
                 $arr = [];
                 for ($i=0;$i<$num;$i++)
                 {
                     $arr['role_id']=$data['role_id'];
                     $arr['is_resource']=$is_resource[$i];
                     $arr['type_id']=1;
                     $ids = $adminUser->roleMenuAdd($arr);
                 }
//             dd($ids);
             }
             if($ids){
                 return view('jump')->with([
                     'message' => '分配权限成功',
                     'name' => '权限列表',
                     'url' => '/adminuser/roleList',
                     'jumpTime' => '2',
                 ]);
             }
         }else{
             $num = count($data['is_resource']);
             for ($i=0;$i<$num;$i++)
             {
                 $arr['role_id']=$data['role_id'];
                 $arr['is_resource']=$data['is_resource'][$i];
                 $arr['type_id']=1;
                 $ids = $adminUser->roleMenuAdd($arr);
             }
         }
     }




}