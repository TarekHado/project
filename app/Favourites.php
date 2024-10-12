<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    protected $table = 'favourites';
    public $timestamps = true;
    protected $fillable = array('post_id','client_id');




    public function posts()
    {
        return $this->BelongsToMany('App\Post');
    }


}
