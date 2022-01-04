<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Enrollment extends Model
{
    public $table = 'enrollments';
    public $fillable = ['name','email','phone','address','city','state','pincode','receipt_id'];
}