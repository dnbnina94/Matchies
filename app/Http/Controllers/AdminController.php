<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use App\Registered_user as Registered_user;
use App\Photo as Photo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Hash as Hash;
use Auth;


class AdminController extends Controller
{

  public function getIndex(){

    return view('random');
  }


}

?>
