<?php

namespace App\Http\Middleware;
use Closure;
use App\User;
use Session;
use Response;
class CheckUser
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
            if($request->ajax()){
                $html='Bạn chưa đăng nhập';
                $response = Response::make($html, 200);
                $response->header('Content-Type', 'application/json');
                return $response;
            }else{
                Session::flash('msg-info','Thông báo: Bạn chưa đăng nhập !');
                return back();
            }
        }
        return $next($request);
    }
}
