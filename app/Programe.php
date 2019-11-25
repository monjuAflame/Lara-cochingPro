<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programe extends Model
{
    protected $table = 'Programes';
    protected $fillable = ['program','description'];
    protected $primaryKey = 'program_id';
    public $timestamps = false;
}
