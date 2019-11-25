<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['village','post_office','zipcode','upazilla','district'];
    protected $primaryKey = 'address_id';
    public $timestamps = false; 
}
