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
        $info = array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years
        );

          return view('profile_6', $info);
      }

      public function obrisiSvojProfil(Request $request) {
        $password = $request->input('currentPass');

        if (Auth::attempt(['password' => $password])) {
               $user = Auth::user();
               $user->delete();
               return redirect()->route('index');
            }
            else {
              return view('delete_account');
            }


      }

      public function izmeniProfilOsnovno()
      {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $info = array(
          'user' => $user,
          'reg' => $reg,
        );

          return view('edit_profile', $info);
      }

      public function sacuvajProfilOsnovno(Request $request)
      {

        $name = $request->input('fname');
        $surname = $request->input('lname');
        $email = $request->input('email');
        $emailAgain = $request->input('emailAgain');
        $sex = $request->input('gender');

        if ($sex == 'male')
          $sex = 'm';
        else $sex = 'f';

        $user = Auth::user();
        $reg = Registered_user::find($user->id);


//sve provere ovde
        if ($email == $emailAgain) {
          $user->email = $email;
          $reg->name = $name;
          $reg->surname= $surname;
          $reg->sex = $sex;

          $user->save();
          $reg->save();
        }

        $info = array(
          'user' => $user,
          'reg' => $reg,
        );

        return view('edit_profile', $info);
      }

      public function izmeniLokaciju()
      {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $info= array(
          'user' => $user,
          'reg' => $reg,
        );

          return view('edit_location', $info);
      }

      public function sacuvajLokaciju(Request $request)
      {
        $cntry = $request->input('country');
        $cty = $request->input('city');

        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $reg->country = $cntry;
        $reg->city = $cty;

        //ovde provere

        $reg->save();

        $dt = Carbon::now();
        $years = $dt->diffInDays($reg->birth_date);
        $years = floor($years/365);
        $info= array (
          'user' => $user,
          'reg' => $reg,
          'years' => $years
        );

        return view('profile_6', $info);
      }

      public function izmeniDetalje()
      {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $info = array(
          'user' => $user,
          'reg' => $reg,
        );

          return view('edit_details', $info);
      }

      public function sacuvajDetalje(Request $request)
      {

        $relStatus = $request->input('relationStatus');
        $eduStatus = $request->input('educationStatus');
        $bio = $request->input('shortBio');
        $hobbies = $request->input('Hobbies');
        $likes = $request->input('Likes');
        $dislikes = $request->input('Dislikes');
        $firstDate = $request->input('PerfFirstDate');
        $quote = $request->input('FavQuote');
        $song = $request->input('FavSong');
        $rel = $request->input('LongestRel');
        $best = $request->input('BestQuality');
        $worst = $request->input('WorstQuality');
        $work = $request->input('fieldOfWork');

        //ovde sve provere

        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $reg->relationship_status = $relStatus;
        $reg->education = $eduStatus;
        $reg->bio = $bio;
        $reg->hobbies = $hobbies;
        $reg->likes = $likes;
        $reg->dislikes = $dislikes;
        $reg->first_date = $firstDate;
        $reg->quote = $quote;
        $reg->song = $song;
        $reg->longest_relationship = $rel;
        $reg->best_quality = $best;
        $reg->worst_quality = $worst;
        $reg->work = $work;

        $reg->save();

        $dt = Carbon::now();
        $years = $dt->diffInDays($reg->birth_date);
        $years = floor($years/365);
        $info= array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years
        );

        return view('profile_6', $info);
      }
}

?>
