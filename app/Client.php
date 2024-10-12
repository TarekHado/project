<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'password', 'name', 'date_of_birth', 'blood_type_id', 'city_id','last_donation_request');



    public function bloodTypes()
    {
        return $this->belongsToMany('App\BloodType');
    }

    public function favourites()
    {
        return $this->belongsToMany('App\Post');
    }


    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Governorate');
    }

    public function requests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function token()
    {
        return $this->hasOne('CreateTokens');
    }



    protected $hidden = [
      'password','api_token'
    ];

}
