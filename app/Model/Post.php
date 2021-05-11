<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Category;
use App\Model\Like;
use App\Model\Comment;
use App\Model\User;

class Post extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $guarded =[];
}
