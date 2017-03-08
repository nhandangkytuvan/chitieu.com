<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
class UserController extends Controller{
    public $rules_login = [
        'username'=>'required|min:6',
        'password'=>'required|min:6|confirmed',
        'user_name'=>'required',
        'user_email'=>'required|unique:user,user_email',
        'password_confirmation'=>'required|min:6',
    ];
    public function create(Request $request){
    	if($request->isMethod('post')){
            $this->validate($request,$this->rules_login);
            $user = new User;
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->user_name = $request->input('user_name');
            $user->save();
            Session::flash('success','Đăng ký thành công.');
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
                    Session::flash('success','Đăng nhập thành công.');
                    return redirect('user/post/index');
                }else{
                    Session::flash('error','Đăng nhập sai password.');
                    return back();
                }
            }else{
                Session::flash('error','Không tồn tại username.');
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