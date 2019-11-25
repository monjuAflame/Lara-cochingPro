<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['batch_id','academic_id','shift_id','time_id','group_id','batch_id','start_date','end_date','active'];
    protected $primaryKey = 'course_id';
    public $timestamps = false;
}
