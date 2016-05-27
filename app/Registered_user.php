<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registered_user extends Model
{
  protected $dates = ['birth_date'];
  public $timestamps = false;
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function registered_user(){
        return $this->hasMany('App\Photo');
    }
}
