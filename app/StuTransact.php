<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StuTransact extends Model
{
    protected $table = 'stutransacts';
    protected $fillable = ['student_id','transact_id','paid'];
    protected $primaryKey = 'stu_transact_id';
    public $timestamps = false;
}
