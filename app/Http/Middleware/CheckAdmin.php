<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Session;
class CheckAdmin
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
        if(!Session::has('user')){
            Session::flash('msg-info','Thông báo: Bạn chưa đăng nhập !');
            return back();
        }else{
            $user = Session::get('user');
            if($user->user_group!=='admin'){
                Session::flash('msg-info','Thông báo: Bạn không phải là Admin !');
                return back();
            }
        }
        return $next($request);
    }
}
