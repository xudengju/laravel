<?php
/**
 * Created by PhpStorm.
 * User: xuzhe
 * Date: 2018/9/27
 * Time: 12:09
 */
namespace App\Http\Controllers\Index;

use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Login_info;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /*
     * 使用request接收数据
     * 登录
     *
     * */
    public function login(Request $request)
    {
        $post = $request->all();
        if($post) {
            $userservice = new UserService();
            $user_data = $userservice->login($post);
            if ($user_data) {
                $res['ip'] = $this->getip();
                $res['last_time'] = date("Y-m-d H:s:i");
                $city = $this->getcity($res['ip']);
                $res['city'] = $city['city'];
                $res['login_way'] = "PC端";
                $res['user_id'] = $user_data->user_id;
                $info = new Login_info();
                $info->add($res);
                return view('jump')->with([
                    'message' => '登录成功',
                    'name' => '首页',
                    'url' => '/index.php/index/index',
                    'jumpTime' => '2',
                ]);
            }else{
                return view('jump')->with([
                    'message' => '登录失败，手机号或密码错误',
                    'name' => '登录',
                    'url' => '/index.php/user/user',
                    'jumpTime' => '2',
                ]);
            }
        }
        return view('index\user\login');
    }

    /*
     * 使用邮箱登录
     * Request $request
     * */
    public function emailLogin(Request $request)
    {
        $post = $request->all();
        if ($post){
        $userservice = new UserService();
        $user_data = $userservice->emailLogin($post);
         if($user_data) {
             return view('jump')->with([
                 'message' => '登录成功',
                 'name' => '首页',
                 'url' => '/index.php/index/index',
                 'jumpTime' => '2',
             ]);
         }else{
             return view('jump')->with([
                 'message' => '登录失败，账号或密码错误',
                 'name' => '登录',
                 'url' => '/index.php/user/emailLogin',
                 'jumpTime' => '2',
             ]);
         }
        }
        return view('index\user\emailLogin');
    }
    /*
     * 手机号注册
     * 判断$status为1 则是用户名存在
     * 为2则注册成功
     *为3则为手机号已存在
     * */
    public function register(Request $request)
    {
        $register = $request->all();
        $userservice = new UserService();
        $status = $userservice->register($register);
//        var_dump($status);die;
            if($status==1) {
                return view('jump')->with([
                    'message'=>'用户名已存在',
                    'url' =>'/index.php/user/register',
                    'name'=>'注册',
                    'jumpTime'=>2,
                ]);
            }
        if($status==3) {
            return view('jump')->with([
                'message'=>'手机号已存在',
                'url' =>'/index.php/user/register',
                'name'=>'注册',
                'jumpTime'=>2,
            ]);
        }
            if ($status==2){
                return view('jump')->with([
                   'message'=>'注册成功',
                   'name'=>'首页',
                   'url'=>'/index.php/index/index',
                   'jumpTime'=>2,
                ]);
            }
        return view('index\user\register');
    }

    /*
     * 使用邮箱注册
     * 判断$status为1 则是用户名存在
     * 为2则注册成功
     *为3则为手机号已存在
     * */
    public function emailRegister(Request $request)
    {
        $register = $request->input();
//        var_dump($register);die;
        $userservice = new UserService();
        $status = $userservice->emailRegister($register);
        if($status == 1){
            return view('jump')->with([
                'message'=>'用户名已存在',
                'url' =>'/index.php/user/emailRegister',
                'name'=>'注册',
                'jumpTime'=>2,
            ]);
        }
        if($status == 3){
            return view('jump')->with([
                'message'=>'邮箱已存在',
                'url' =>'/index.php/user/emailRegister',
                'name'=>'注册',
                'jumpTime'=>2,
            ]);
        }
        if ($status != 1 && $status != 3 && $status != ''){
            //发送普通邮件
//             \Mail::send('email.code', [], function ($message) { $message->to(['690953473@qq.com'])->subject('欢迎加入');});
            //发送队列邮件
                return view('jump')->with([
                    'message'=>'注册成功,请查看您的邮件',
                    'name'=>'首页',
                    'url'=>'/index.php/index/index',
                    'jumpTime'=>2,
                ]);

        }
        return view('index\user\emailRegister');
    }

     /*使用淘宝ip库获取IP
      *
      * */
     function getip(){
         $ip_json = @file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=myip");
         $ip_arr=json_decode(stripslashes($ip_json),1);
         if($ip_arr['code']==0)
         {
             return $ip_arr['data']['ip'];
         }
     }

     /*
      * 参数$ip
      * 通过ip来进行获取地址
      *
      * */
    function getcity($ip)
    {
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
             $ip=json_decode(file_get_contents($url));
           if((string)$ip->code=='1'){
             return false;
           }
             $data = (array)$ip->data;
           return $data;
    }
   /*
    * 验证码验证
   */
    public function captcha(Request $request)
    {
        $this->validate($request, [
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => trans('validation.required'),
            'captcha.captcha' => trans('validation.captcha'),
        ]);
        return 1;
    }
    /*
     * 退出
     * */
    public function loginOut()
    {
         Session::forget("user");
        return redirect('index\index');
    }

   /*
    * 用户信息
    * */
    public function userInfo()
    {
        return view('index\user\userInfo');
    }
}