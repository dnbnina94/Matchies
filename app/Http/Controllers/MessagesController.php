<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use App\Registered_user as Registered_user;
use App\Photo as Photo;
use App\Interaction as Interaction;
use App\Match_request as Match_request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Hash as Hash;
use Auth;


class MessagesController extends Controller
{
    //
    public function messages()
    {

      $user = Auth::user();
      $interactionsAll = Interaction::all();
      $interactions1 = Interaction::where('id_user1', '=', $user->id)->get();
      $interactions2 = Interaction::where('id_user2', '=', $user->id)->get();


      $info= array(
        'interactions1' => $interactions1,
        'interactions2' => $interactions2,

      );



      return view('messages', $info);
    }
}

?>
