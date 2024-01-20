<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\password;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','password']; 
}