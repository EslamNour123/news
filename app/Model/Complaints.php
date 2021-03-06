<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Complaints extends Model
{
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
