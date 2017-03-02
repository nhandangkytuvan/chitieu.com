<?php 
namespace App\Helpers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Term;
use Session;
class MyAPI {
    public static function getUrlPost($post_id){
        $post = Post::find($post_id);
        return url($post->post_alias.'/'.$post->id.'.htm');
    }
    public static function getUrlTerm($term_id){
        $term = Term::find($term_id);
        return url($term->term_alias.'/'.$term->id);
    }
}