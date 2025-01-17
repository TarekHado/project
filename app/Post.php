<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function favored()
    {
        return $this->belongsToMany('App\Favourites');
    }
}
