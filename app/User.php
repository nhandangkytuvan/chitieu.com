<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'user';
    public function post(){
    	return $this->hasmany('App\Post','user_id','id');
    }
}
