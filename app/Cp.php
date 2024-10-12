<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cp extends Model 
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = array('post_id', 'client_id');

}