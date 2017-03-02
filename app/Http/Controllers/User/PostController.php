<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use File;
use Gate;
use Session;
class PostController extends Controller{
    protected $rules = [
        'post_money' => 'required',
        'post_detail' => 'required',
    ];
    protected $messages = [
        'post_money.required' => 'Số tiền cần nhập.',
        'post_detail.required' => 'Chi tiết cần nhập.',
    ];
    public function create(Request $request){
        $user = Session::get('user');
        if($request->isMethod('post')){
            $this->validate($request,$this->rules,$this->messages);
            $post = new Post;
            $post->user_id = $user->id;
            $post->post_money = $request->input('post_money'); 
            $post->post_money = str_replace(',00','',$post->post_money);
            $post->post_money = str_replace('.','',$post->post_money);
            $post->post_detail = $request->input('post_detail');            
            if($post->save()){
                Session::flash('msg-success','Thêm thành công.');
                return redirect('user/post/edit/'.$post->id);
            }else{
                Session::flash('msg-error','Thêm lỗi.');
                return back();
            }
        }else{
            $data['user'] = $user;
            return view('user.post.create',['data'=>$data]); 
        }
    }
    public function edit($post_id,Request $request){
    	$user = Session::get('user');
        $post = Post::find($post_id);
        if($request->isMethod('post')){
            if (Gate::forUser($user)->denies('edit-post', $post)) {
                Session::flash('msg-error','Không phải của bạn.');
                return back();
            }
            $this->validate($request,$this->rules,$this->messages);
            $post->post_money = $request->input('post_money');
            $post->post_money = str_replace(',00','',$post->post_money);
            $post->post_money = str_replace('.','',$post->post_money);
            $post->post_detail = $request->input('post_detail');
            if($post->save()){
                Session::flash('msg-success','Sửa thành công.');
                return redirect('user/post/edit/'.$post->id);
            }else{
                Session::flash('msg-error','Sửa lỗi.');
                return back();
            }
        }else{
            $data['user'] = $user;
        	$data['post'] = $post;
            return view('user.post.edit',['data'=>$data]); 
        }
    }
    public function index(Request $request){
        $user = Session::get('user');
        $users = User::get();
        $posts = Post::orderby('id','desc');
        if($request->input('user_id')){
            $posts = $posts->where('user_id',$request->input('user_id'));
        }
        $posts = $posts->get();
        $data['user'] = $user;
        $data['users'] = $users;
        $data['request'] = $request;
        $data['posts'] = $posts; 
        return view('user.post.index',['data'=>$data]);
    }
    public function delete($post_id,Request $request){
        $user = Session::get('user');
        $post = Post::find($post_id);
        if($request->isMethod('post')){
            if (Gate::forUser($user)->denies('delete-post', $post)) {
                Session::flash('msg-error','Không phải của bạn.');
                return back();
            }
            if($post->delete()){
                Session::flash('msg-success','Xóa thành công.');
                return redirect('user/post/index');
            }else{
                Session::flash('msg-error','Xóa lỗi.');
                return back();
            }
        }else{
            $data['post'] = $post;
            return view('user.post.delete',['data'=>$data]); 
        }
    }
}