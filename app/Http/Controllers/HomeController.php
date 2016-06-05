<?php

//autor: Nina Grujic 177/13

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use App\Report as Report;
use App\Registered_user as Registered_user;
use App\Photo as Photo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Hash as Hash;
use Auth;



class HomeController extends Controller
{

  public function ucitaj() {
    $user = Auth::user();
    $id = $user->id;

    $reg_user = Registered_user::where('id', '=', $id)->first();
    $pol = $reg_user->interested_in;
    $birthday = $reg_user->birth_date;

    $niz = array('pol' => $pol, 'birthday' => $birthday);

    return view('home',$niz);
  }
}

?>
