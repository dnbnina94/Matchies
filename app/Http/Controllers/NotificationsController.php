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
use App\Message as Message;
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
      $notifications = Notification::where('id_destination_user', '=', $user->id);
      



      $info= array(
        'interactions1' => $interactions1,

      );



      return view('notifications', $info);
    }


}

?>
