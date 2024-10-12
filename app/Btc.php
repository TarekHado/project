<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Btc extends Model 
{

    protected $table = 'blood_type_client';
    public $timestamps = true;
    protected $fillable = array('blood_type_id', 'client_id');

}