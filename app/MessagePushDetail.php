<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessagePushDetail extends Model
{
    public function campaignstate()
    {
        return $this->belongsTo('App\CampaingState');
    }

    public function messagepush()
    {
        return $this->belongsTo('App\MessagePush');
    }

    public function customerlocation()
    {
        return $this->belongsTo('App\CustomerLocation');
    }
   
}
            