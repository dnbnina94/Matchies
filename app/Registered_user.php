<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage as Storage;

class Registered_user extends Model
{
  protected $dates = ['birth_date'];
  public $timestamps = false;
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
/*
    public function getProfileImage(){
      $photo = Photo::where('id_user', $this->id )->first();
      return Storage::disk('uploads')->get(''.$this->id.'/'.$photo->id.'/'.$photo->link.'');
    }*/
}
