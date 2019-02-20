<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    public function personal()
    {
        return $this->belongsTo('App\Personal');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    public function campaigndetails()
    {
        return $this->hasMany('App\CampaignDetail');
    }
}
