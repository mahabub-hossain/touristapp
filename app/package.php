<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    public function getRouteKeyName()
    { //for using slug
        return 'packageslug';
    }
    public function program(){
        return $this->hasMany('App\program');
    }
    public function offer(){
        return $this->hasOne('App\offer');
    }
}
