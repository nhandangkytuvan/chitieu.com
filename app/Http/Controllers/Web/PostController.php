<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Session;
class PostController extends Controller{
    public function index(Request $request){
    	$users = User::get();
    	$posts = Post::orderBy('id','desc');
        if($request->input('user_id')){
            $posts = $posts->where('user_id',$request->input('user_id'));
        }
        $posts = $posts->get();
        $data['users'] = $users;
        $data['posts'] = $posts;
        $data['request'] = $request;
        return view('web.post.index',['data'=>$data]);
    }
}