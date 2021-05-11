<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Post;
use App\Model\User;

class Like extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
