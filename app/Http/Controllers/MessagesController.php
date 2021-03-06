<?php

//autor: Milena Filipovic 73/13

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use App\Registered_user as Registered_user;
use App\Photo as Photo;
use App\Interaction as Interaction;
use App\Match_request as Match_request;
use App\Notification as Notification;
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
      /*


      $number = floor(($interaction->messages/20)*100);
      return response()->json(['interaction' => $interaction,
      'userTo' => $userTo,
      'messages' => $messages,
        'number'=> $number]);
        */

  //    return view('chat', $info);
    }


    public function ucitajPoruke($chatId)
    {
      $interaction = Interaction::find($chatId);
      $user = Auth::user();
      if($user->id == $interaction->id_user1){
        $userTo= Registered_user::find($interaction->id_user2);
      }
        else{
          $userTo= Registered_user::find($interaction->id_user1);
        }

        $messages = Message::where('id_interaction', '=', $chatId)->get();


      $info= array(
        'interaction' => $interaction,
        'userTo' => $userTo,
        'messages' => $messages,

      );
      $number = floor(($interaction->messages/20)*100);
      return response()->json(['interaction' => $interaction,
      'userTo' => $userTo,
      'messages' => $messages,
    'number'=> $number]);

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
        $text = $request->input('message');
        if ($text == ''){
          $info= array(
            'interaction' => $interaction,
            'userTo' => $userTo,
            'messages' => $messages,

          );
          return redirect()->action('MessagesController@readChat', ['id' => $id]);

        }
        $newMessage= new Message;
        $newMessage->id_interaction = $interaction->id;
        $newMessage->id_source_user = $user->id;
        $newMessage->text = $text;
        $newMessage->save();
        $interaction->messages = $interaction->messages +1;
        $interaction->save();

        if($interaction->messages == 20)
        {
          $notification = new Notification;
          $notification->id_destination_user = $userTo->id;
          $notification->type = 2;
          $notification->id_source_user = $user->id;
          $notification->save();

          $notification1 = new Notification;
          $notification1->id_destination_user = $user->id;
          $notification1->type = 2;
          $notification1->id_source_user = $userTo->id;
          $notification1->save();
        }

        $messages = Message::where('id_interaction', '=', $id)->get();

/*
      $info= array(
        'interaction' => $interaction,
        'userTo' => $userTo,
        'messages' => $messages,

      );

    return redirect()->action('MessagesController@readChat', ['id' => $id]);
    */
    $info= array(
      'interaction' => $interaction,
      'userTo' => $userTo,
      'messages' => $messages,

    );
    $number = floor(($interaction->messages/20)*100);
    return response()->json(['interaction' => $interaction,
    'userTo' => $userTo,
    'messages' => $messages,
    'number'=> $number]);
    }
}

?>
