<?php

//autori: Branislava Ivkovic 125/13 i Petar Djukic 634/13

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use App\Registered_user as Registered_user;
use App\Photo as Photo;
use App\Report as Report;
use App\Interaction as Interaction;
use App\Notification as Notification;
use App\Match_request as Match_request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Hash as Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{

      public function likedUser(Request $request){
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $currentUserString = $request->input('currentUser');
        $currentUserId= (int) $currentUserString;
        $currentUser = Registered_user::find($currentUserId);

        $match_to_me =null;
        $match_to_me = Match_request::where('id_source_user', '=', $currentUser->id )->where('id_destination_user', '=', $reg->id)->first();
        if( !is_null($match_to_me)){
            $match_to_me->delete();
            $newInteraction =  new Interaction;
            $newInteraction->id_user1 = $reg->id;
            $newInteraction->id_user2 = $currentUser->id;
            $newInteraction->save();

            $notification = new Notification;
            $notification->id_destination_user = $currentUser->id;
            $notification->type = 1;
            $notification->id_source_user = $user->id;
            $notification->save();

        }else{

          $match = new Match_request;
          $match->id_source_user = $reg->id;
          $match->id_destination_user = $currentUser->id;

          $match->save();
        }

        return redirect()->action('ProfileController@prikaziTudjProfil', ['id' => $currentUser->id]);
      }

      public function reportUser(Request $request) {
        //backend provereeee
        $report = new Report;
        $description = $request->input('OtherReason');
        $type = $request->input('reportType');
        $reportedUser = $request->input('reportedUser');

        $report->description = $description;
        $report->type = $type;
        $report->id_source_user = $reportedUser;

        $report->save();

        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $targetUser = User::find($reportedUser);
        $targetRegUser = Registered_user::find($reportedUser);

        $dt = Carbon::now();
        $years = $dt->diffInDays($targetRegUser->birth_date);
        $years = floor($years/365);

        $interakcija1 = Interaction::where('id_user1', '=', $user->id)->where('id_user2', '=', $reportedUser)->first();
        $interakcija2 = Interaction::where('id_user1', '=', $reportedUser)->where('id_user2', '=', $user->id)->first();

        $interakcija = null;

        if (!is_null($interakcija1)) $interakcija = $interakcija1;
        else $interakcija = $interakcija2;

        $procenat = 0;

        if (!is_null($interakcija)) {
          $procenat = $interakcija->messages/20;
          $procenat *= 100;
          $procenat = floor($procenat);
        }

        if ($procenat > 100) $procenat = 100;

        $match_request = Match_request::where('id_source_user', '=', $user->id)->where('id_destination_user', '=', $reportedUser)->first();

        $info = array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years,
          'targetUser' => $targetUser,
          'targetRegUser' => $targetRegUser,
          'interakcija' => $interakcija,
          'match_request'=> $match_request,
          'procenat' => $procenat

        );

          return view('profile', $info);
      }

      public function dislikedUser(Request $request){
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $currentUserString = $request->input('currentUser');
        $currentUserId= (int) $currentUserString;
        $currentUser = Registered_user::find($currentUserId);


        $match_from_me =null;
        $match_from_me = Match_request::where('id_source_user', '=', $reg->id )->where('id_destination_user', '=', $currentUser->id)->first();
        if( !is_null($match_from_me)){
            $match_from_me->delete();
        }else{
          $interakcija1 = Interaction::where('id_user1', '=', $reg->id)->where('id_user2', '=', $currentUser->id)->first();
          $interakcija2 = Interaction::where('id_user1', '=', $currentUser->id)->where('id_user2', '=', $reg->id)->first();

          $interakcija = null;

          if (!is_null($interakcija1)) $interakcija = $interakcija1;
          else $interakcija = $interakcija2;

          if(!is_null($interakcija)){
            $interakcija->delete();
            $match = new Match_request;
            $match->id_source_user = $currentUser->id;
            $match->id_destination_user = $reg->id;

            $match->save();

          }


        }

          return redirect()->action('ProfileController@prikaziTudjProfil', ['id' => $currentUser->id]);

      }

    //
      public function ucitajSvojProfil()
      {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $dt = Carbon::now();
        $years = $dt->diffInDays($reg->birth_date);
        $years = floor($years/365);
      //  $photo = Photo::where('id_user', $user->id )->first();
      //  $number = $photo->count();
      //  $path = Storage::disk('uploads')->get(''.$user->id.'/'.$photo->id.'/'.$photo->link.'');

    //    $path= str_replace('\\', '/', $path);

        $info= array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years,

        );

          return view('profile', $info);
      }

      public function obrisiSvojProfil(Request $request) {
        $password = $request->input('currentPass');

        if (Auth::attempt(['password' => $password])) {
               $user = Auth::user();
               $user->delete();
               return redirect()->route('index')->withErrors(['You have successfully deleted your account.']);
            }
            else {
              return view('delete_account')->withErrors(['Please enter the corrcet password.']);
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

        //BACKEND !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                                  $infoOld= array(
                                    'user' => $user,
                                    'reg' => $reg,
                                  );


                              $validator = Validator::make($request->all(), [
                                'fname'             => 'required|alpha|max:30',
                                'lname'             => 'required|alpha|max:30',                        // just a normal required validation
                                'email'            => 'required|email',     // required and must be unique
                                'emailAgain' => 'required|same:email',
                                'gender'             => 'required | in:male,female',

                                  ]);

                                if ($validator->fails()) {
                                    return view('edit_profile', $infoOld)
                                                ->withErrors($validator);

                                }
        //BACKEND KRAJ !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




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

          return view('edit_location', $info);
      }

      public function sacuvajSliku(Request $request)
      {

        $user = Auth::user();
        $reg = Registered_user::find($user->id);
        $file = $request->file('file');

        if($file->isValid()) {
          $file->move('../public/app/public/uploads/' . $reg->id, $reg->photo_link);
        }

        $dt = Carbon::now();
        $years = $dt->diffInDays($reg->birth_date);
        $years = floor($years/365);
        $info = array (
          'user' => $user,
          'reg' => $reg,
          'years' => $years
        );

      return view('edit_picture', $info);
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

        return view('edit_details', $info);
      }

      public function prikaziTudjProfil($id) {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $targetUser = User::find($id);

        if (is_null($targetUser) || $targetUser->type != 3) {
          return view('error_page');
        }

        $targetRegUser = Registered_user::find($id);

        $dt = Carbon::now();
        $years = $dt->diffInDays($targetRegUser->birth_date);
        $years = floor($years/365);

      //  $photo = Photo::where('id_user', $user->id )->first();
      //  $number = $photo->count();
      //  $path = Storage::disk('uploads')->get(''.$user->id.'/'.$photo->id.'/'.$photo->link.'');

    //    $path= str_replace('\\', '/', $path);

        $interakcija1 = Interaction::where('id_user1', '=', $user->id)->where('id_user2', '=', $id)->first();
        $interakcija2 = Interaction::where('id_user1', '=', $id)->where('id_user2', '=', $user->id)->first();

        $interakcija = null;

        if (!is_null($interakcija1)) $interakcija = $interakcija1;
        else $interakcija = $interakcija2;

        $procenat = 0;

        if (!is_null($interakcija)) {
          $procenat = $interakcija->messages/20;
          $procenat *= 100;
          $procenat = floor($procenat);
        }

        if ($procenat > 100) $procenat = 100;

        $match_request = Match_request::where('id_source_user', '=', $user->id)->where('id_destination_user', '=', $id)->first();

        /*$interakcija = Interaction::where(function($query) {
          $query->where('id_user1', '=', $user->id)->where('id_user2', '=', $id);
        })->orWhere(function($query) {
          $query->where('id_user1', '=', $id)->where('id_user2', '=', $user->id);
        })->first();*/

        $info = array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years,
          'targetUser' => $targetUser,
          'targetRegUser' => $targetRegUser,
          'interakcija' => $interakcija,
          'match_request'=> $match_request,
          'procenat' => $procenat

        );

          return view('profile', $info);
      }

      public function prikaziTudjProfilAdmin($id) {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $targetUser = User::find($id);

        if (is_null($targetUser) || $targetUser->type != 3) {
          return view('error_page');
        }

        $targetRegUser = Registered_user::find($id);

        $dt = Carbon::now();
        $years = $dt->diffInDays($targetRegUser->birth_date);
        $years = floor($years/365);

        $info = array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years,
          'targetUser' => $targetUser,
          'targetRegUser' => $targetRegUser
        );

          return view('profile_admin', $info);
      }

      public function prikaziTudjProfilMod($id) {
        $user = Auth::user();
        $reg = Registered_user::find($user->id);

        $targetUser = User::find($id);

        if (is_null($targetUser) || $targetUser->type != 3) {
          return view('error_page');
        }

        $targetRegUser = Registered_user::find($id);

        $dt = Carbon::now();
        $years = $dt->diffInDays($targetRegUser->birth_date);
        $years = floor($years/365);

        $info = array(
          'user' => $user,
          'reg' => $reg,
          'years' => $years,
          'targetUser' => $targetUser,
          'targetRegUser' => $targetRegUser
        );

          return view('profile_moderator', $info);
      }
}

?>
