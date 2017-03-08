<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
class UserController extends Controller{
	protected $rules_forget = [
        'password_old' => 'required',
        'password_new' => 'required|min:6|confirmed',
        'password_new_confirmation' => 'required|min:6',
    ];
    protected $messages_forget = [
	    'password_old.required' => 'Nhập password cũ của bạn.',
	    'password_new.required' => 'Nhập password mới của bạn.',
	    'password_new_confirmation.required' => 'Nhập lại password mới của bạn.',
	    'password_new.confirmed' => 'Passowrd không khớp.',
	];
	public function logout(Request $request){
		Session::flush();
		Session::flash('info','Hẹn gặp lại.');
		return redirect('/');
	}
	public function edit(Request $request){
		$user = Session::get('user');
		if($request->isMethod('post')){
			
			$user->user_name = $request->input('user_name');
			$user->user_email = $request->input('user_email');
			if($request->hasFile('user_avatar')){
                $file = $request->file('user_avatar');
                $extension = $file->extension();
                $user_avatar = str_slug($user->user_name,'-').'-'.time().'.'.$extension;
                $path = $file->move(public_path().'/img',$user_avatar);
                $user->user_avatar = $user_avatar;
            }
            $user->save();
            Session::flash('success','Sửa thông tin thành công.');
            return back();
		}else{
			$data['user'] = $user;
			return view('user.user.edit',['data'=>$data]);
		}
	}
	public function index(Request $request){
		return view('user.user.index');
	}
	public function password(Request $request){
		$user = Session::get('user');
		if($request->isMethod('post')){
			$this->validate($request,$this->rules_forget,$this->messages_forget);
			if(Hash::check($request->input('password_old'),$user->password)){
				$user->password = Hash::make($request->input('password_new'));
				$user->save();
				Session::flash('success','Đổi password thành công.');
				return back();
			}else{
				Session::flash('error','Password cũ không đúng.');
				return back();
			}
		}	
	}
}