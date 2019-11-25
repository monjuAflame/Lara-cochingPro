<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gurdian extends Model
{
    protected $table = 'gurdians';
    protected $fillable = ['father_name','mother_name','gurdian_name','gurdian_phone'];
    protected $primaryKey = 'gurdian_id';
    public $timestamps = false; 
}
