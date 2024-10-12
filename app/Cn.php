<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cn extends Model 
{

    protected $table = 'client_notifaction';
    public $timestamps = true;
    protected $fillable = array('is_read', 'client_id', 'notifacation_id');

}