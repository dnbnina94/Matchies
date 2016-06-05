<?php

//autor: Petar Djukic 634/13

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
  public $timestamps = false;

  public function user(){
      return $this->belongsTo('App\Registered_user', 'id_source_user_reports');
  }
}
