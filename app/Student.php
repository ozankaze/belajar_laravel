<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'address', 'age', 'email', 'photo'];
}
//bwat biar bisa ngisi data di table