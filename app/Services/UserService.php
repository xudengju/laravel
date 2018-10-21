<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/29
 * Time: 9:58
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\Email_user;
use App\Jobs\SendEmail;
class UserService extends Controller
{
    use DispatchesJobs;
       /*
        * 手机号登录
        * 参数为登录界面的数据
        * */
         public function login($post)
         {
       if ($post){
            $where = [
                'user_tel'=>$post['tel'],
                'user_pwd'=>md5($post['password'])
            ];
            $user_data = DB::table('user')->where($where)->first();
           $username = serialize($user_data);
           session()->put("users", $username);
            return $user_data;
         }
       }
      /*
       * 邮箱登录
       * 参数为登录的数据
       * */
        public function emailLogin($post)
        {
            if ($post){
                $where = [
                    'user_email'=>$post['email'],
                    'user_email_pwd'=>md5($post['password'])
                ];
                $user_data = DB::table('user_email')->where($where)->first();
                $username = serialize($user_data);
                session()->put("users", $username);
                return $user_data;
            }
        }

         /*
          * 手机号注册
          * 参数为注册数据
          * */
        public function register($register)
           {
               if($register){
                   $post['user_name'] =$register['username'] ;
                   $post['user_pwd'] =md5($register['password']) ;
                   $post['user_tel'] =$register['tel'] ;
    //         var_dump($post);die
    //               return $post;
                   $where = [
                       'user_name'=>$post['user_name']
                   ];
                   $where1 = [
                       'user_tel'=>$post['user_tel']
                   ];
                   $login_data = DB::table('user')->where($where)->first();
                   $login1_data = DB::table('user')->where($where1)->first();
    //               return $login_data;
                   if($login_data)
                   {
                       //用户名已存在
                       return 1;
                   }
                   if ($login1_data){
                       //手机号已存在
                       return 3;
                   }
                   $user = new User();
                   $post['create_time'] = date("Y-m-d H:i:s");
                   $id = $user->add($post);
                   if ($id){
                       $post['user_id'] = $id;
                       $post = (object)$post;
                       $username = serialize($post);
                       session()->put("users", $username);
                       //注册成功
                       return 2;
                   }
               }
           }

         /*
          * 邮箱注册
          * 参数为注册信息
          * */
        public function emailRegister($register)
        {
            if($register){
                $post['user_email_name'] =$register['username'] ;
                $post['user_email_pwd'] =md5($register['password']) ;
                $post['user_email'] =$register['email'] ;
    //         var_dump($post);die;
    //               return $post;
                $where = [
                    'user_email_name'=>$post['user_email_name']
                ];
                $where1 = [
                    'user_email'=>$post['user_email']
                ];
                $login_data = DB::table('user_email')->where($where)->first();
                $login_data1 = DB::table('user_email')->where($where1)->first();
    //               return $login_data;
                if($login_data)
                {
                    //用户名已存在
                    return 1;
                }
                if($login_data1)
                {
                    //手机号已存在
                    return 3;
                }
                $user = new Email_user();
                $post['create_time'] = date("Y-m-d H:i:s");
                $id = $user->add($post);
                if ($id){
                    //注册成功
                    $post['user_id'] = $id;
                    $post = (object)$post;
                    $username = serialize($post);
                    session()->put("users", $username);
                    $user =$this->email($id);
                    $this->dispatch(new SendEmail($user));
                    return $id;
                }
            }
        }

        public function email($id)
        {
                $user = new Email_user();
                $user = $user->getFind($id);
                return $user;
        }
}