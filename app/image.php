<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public function countries(){
        return $this->belongsToMany('App\country','countryimages');
    }
}
