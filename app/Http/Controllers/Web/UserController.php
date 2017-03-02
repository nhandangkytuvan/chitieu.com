<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
class UserController extends Controller{
    public function create(Request $request){
    	if($request->isMethod('post')){
            $user = new User;
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->user_name = $request->input('user_name');
            $user->save();
            Session::flash('msg-success','Đăng ký thành công.');
            return redirect('web/user/login');
        }else{
            return view('web.user.create');
        }
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $user = User::where('username',$request->input('username'))->first();
            if($user){
                if(Hash::check($request->input('password'),$user->password)){
                    Session::put('user',$user);
                    Session::flash('msg-success','Đăng nhập thành công.');
                    return redirect('user/post/index');
                }else{
                    Session::flash('msg-error','Đăng nhập sai password.');
                    return back();
                }
            }else{
                Session::flash('msg-error','Không tồn tại username.');
                return back();
            }
        }else{
            return view('web.user.login');
        }
    }
    public function forget(Request $request){
        if($request->isMethod('post')){

        }else{
            return view('web.user.forget');
        }
    }
}