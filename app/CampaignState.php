<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignState extends Model
{
    public function campaingdetails()
    {
        return $this->hasMany('App\CampaignDetail');
    }
    public function messagepushdetails()
    {
        return $this->hasMany('App\MessagePushDetail');
    }
}
