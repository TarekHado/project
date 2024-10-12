<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'city_id', 'hospital_name', 'blood_type_id', 'patient_age', 'hospital_address', 'details', 'latitude', 'longitude', 'client_id','bags_num');

    public function notifications()
    {
        return $this->hasOne('App\Notification');
    }

    public function Clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
