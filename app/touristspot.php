<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class touristspot extends Model
{
    protected $table = 'touristspots';
    protected $fillable = ['name', 'country_id'];


    public function getRouteKeyName()
    { //for using slug
        return 'spotslug';
    }
}
