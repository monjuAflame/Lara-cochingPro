<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    protected $fillable = ['school_name','school_roll','school_code'];
    protected $primaryKey = 'school_id';
    public $timestamps = false;
}
