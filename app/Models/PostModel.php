<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'post';
    protected $fillable = ['title','post','user_id']; 
}