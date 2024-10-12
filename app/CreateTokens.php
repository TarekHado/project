<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateTokens extends Model
{
    protected $table = 'create_tokens';
    public $timestamps = true;
    protected $fillable = array('token','api_token','type','client_id');


    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
