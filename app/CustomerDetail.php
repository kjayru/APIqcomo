<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function resturantdetails()
    {
        return $this->hasMany('App\RestaurantDetails');
    }

    public function packagestates()
    {
        return $this->hasMany('App\PackageStates');
    }

    public function campaigndetails()
    {
        return $this->hasMany('App\CampaignDetail');
    }

    public function bookingdetails(){
        return $this->hasMany('App\BookingDetail');
    }

}
