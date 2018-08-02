<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class continent extends Model
{
    public function getRouteKeyName()
    { //for using slug
        return 'continentslug';
    }

}
