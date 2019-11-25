<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feetype extends Model
{
    protected $table = 'feetypes';
    protected $fillable = ['fee_type','program_id','fee_type_amount'];
    protected $primaryKey = 'fee_type_id';
    public $timestamps = false;
}
