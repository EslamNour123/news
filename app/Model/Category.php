<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Post;

class Category extends Model
{
    public function posts(){
        return $this->hasMany(Post::class);
    }
    protected $guarded =[];
}
