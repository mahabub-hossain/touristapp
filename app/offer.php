<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    public function getRouteKeyName()
    { //for using slug
        return 'offerslug';
    }
    public function package(){
        return $this->belongsTo('App\package');
    }
}
