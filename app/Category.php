<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');


    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
