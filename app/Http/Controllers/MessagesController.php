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
      $interactionsAll = Interaction::all();
      $interactions1 = Interaction::where('id_user1', '=', $user->id)->orWhere('id_user2', '=', $user->id)->get();



      $info= array(
        'interactions1' => $interactions1,

      );



      return view('messages', $info);
    }


    public function readChat( $id)
    {
      $interaction = Interaction::find($id);
      $user = Auth::user();
      if($user->id == $interaction->id_user1){
        $userTo= Registered_user::find($interaction->id_user2);
      }
        else{
          $userTo= Registered_user::find($interaction->id_user1);
        }

        $messages = Message::where('id_interaction', '=', $id)->get();


      $info= array(
        'interaction' => $interaction,
        'userTo' => $userTo,
        'messages' => $messages,

      );



      return view('chat', $info);
    }


    public function sendMessage( $id, Request $request)
    {
      $interaction = Interaction::find($id);
      $user = Auth::user();
      if($user->id == $interaction->id_user1){
        $userTo= Registered_user::find($interaction->id_user2);
      }
        else{
          $userTo= Registered_user::find($interaction->id_user1);
        }
        $messages = Message::where('id_interaction', '=', $id)->get();
        $text = $request->input('Message');
        if ($text == ''){
          $info= array(
            'interaction' => $interaction,
            'userTo' => $userTo,
            'messages' => $messages,

          );
          return redirect()->action('MessagesController@readChat', ['id' => $id]);

        }
        $newMessage= new Message;
        $newMessage->id_interaction= $interaction->id;
        $newMessage->id_source_user= $user->id;
        $newMessage->text= $text;
        $newMessage->save();
        $interaction->messages =   $interaction->messages +1;
          $interaction->save();

        $messages = Message::where('id_interaction', '=', $id)->get();


      $info= array(
        'interaction' => $interaction,
        'userTo' => $userTo,
        'messages' => $messages,

      );




      return redirect()->action('MessagesController@readChat', ['id' => $id]);
    }
}

?>
