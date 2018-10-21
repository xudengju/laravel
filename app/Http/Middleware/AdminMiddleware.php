<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\AdminUserService;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!session()->get('user')){
            return redirect("adminuser/login");
        }
        if($_SERVER['REQUEST_URI'] != '/adminindex/index'){
            $user = session()->get('user');
            $user_id = $user['user_id'];
            $adminUser = new AdminUserService();
           $data = $adminUser->getUrl($_SERVER['REQUEST_URI'],$user_id);
           if (!$data){
               return redirect('/prompt')->with([
                   'message'=>'你没有此权限！',
                   'url' =>'/adminindex/index',
                   'jumpTime'=>3,
                   'status'=>false
               ]);
           }
        }
        return $next($request);

    }
}
