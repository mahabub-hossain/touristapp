<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Query\Expression;
class country extends Model
{
  protected $table = 'countries';
  protected $fillable = ['name'];


//    public function countrygroup(){
//        $rawdata = DB::select('SELECT countries.name,continents.name from countries INNER JOIN continents ON countries.continent_id = continent.id')
//    }


    public function getRouteKeyName()
    { //for using slug
        return 'slug';
    }


}
