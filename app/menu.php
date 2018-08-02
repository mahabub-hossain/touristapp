<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected  $fillable =['menuname'];
   public function submenu(){
       return $this->hasMany('App\submenu');
   }
}
