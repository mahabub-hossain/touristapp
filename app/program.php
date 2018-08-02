<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    public function package(){
        return $this->belongsTo('App\package');
    }
}
