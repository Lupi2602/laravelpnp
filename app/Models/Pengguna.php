<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    //
    protected $fillable = ['phone','name','email','password','file_upload'];

}
