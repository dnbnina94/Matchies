<?php

//autori: Petar Djukic 634/13 i Milena Filipovic 73/13

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
