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


class ProfileController extends Controller
{
    //
      public function ucitajSvojProfil()
      {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $dt = Carbon::now();
        $years = $dt->diffInDays($reg->birth_date);
        $years = floor($years/365);
        $photos = App\Photo::where('link', $user->id )->first();
        $info= array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years,
          'photo' => $photo
        );

          return view('profile_6', $info);
      }

      public function izmeniProfilOsnovno()
      {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $info = array(
          'user' => $user,
          'reg' => $reg

        );

          return view('edit_profile', $info);
      }
}

?>
