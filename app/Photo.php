<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
      public $timestamps = false;

      public function user(){
          return $this->belongsTo('App\Registered_user');
      }
}
