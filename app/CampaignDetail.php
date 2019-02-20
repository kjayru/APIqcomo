<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignDetail extends Model
{
    public function campaign()
    {
        return $this->belongsTo('App\Campaing');
    }

    public function personaldetail(){
        return $this->belongsTo('App\PersonalDetail');
    }

    public function customerdetail(){
        return $this->belongsTo('App\CostumerDetail');
    }
}
