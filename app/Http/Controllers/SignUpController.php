<?php

//autori: Milena Filipovic 73/13 i Branislava Ivkovic 125/13

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


class SignUpController extends Controller
{

    public function postStep2(Request $request)
    {
      $name = $request->input('fname');
      $surname = $request->input('lname');
      $email = $request->input('email');
      $email2 = $request->input('emailAgain');
      $gender = $request->input('gender');
      $day = $request->input('day');
      $month = $request->input('month');
      $year = $request->input('year');

        if($email == $email2){

            $user = User::where('email', '=',$request->input('email') )->first();
            if ($user === null) {
               // user doesn't exist

                $info= array(
                  'name'=> $name,
                  'surname'=> $surname,
                  'email'=> $email,
                  'gender' => $gender,
                  'day'=> $day,
                  'month' => $month,
                  'year' => $year
                );
                return view('signup_step_2', $info);

            }
        }

           return redirect()->route('signupStep1');
    }


      public function postStep3(Request $request)
      {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');
        $country = $request->input('country');
        $city = $request->input('city');

        $info= array(
          'name'=> $name,
          'surname'=> $surname,
          'email'=> $email,
          'gender' => $gender,
          'day'=> $day,
          'month' => $month,
          'year' => $year,
          'country' => $country,
          'city' => $city
        );
        return view('signup_step_3', $info);

      }

      public function postStep4(Request $request)
      {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');
        $country = $request->input('country');
        $city = $request->input('city');

    //    $file = $request->file('file');
        $username = $request->input('username');
        $password = $request->input('password');
        $passrepeat = $request->input('passrepeat');




        if($password == $passrepeat){

            $user = User::where('username', '=',$request->input('username') )->first();
            if ($user === null) {


                $file = $request->file('file');
                if($file->isValid()){
                    $filename= str_random(40);
                    $filename .= '.jpg';
                    //Storage::disk('tmp')->put($name, $file);
                   $file->move('../public/app/public/tmp', $filename);
                    $file=$filename;

                    $info = array(
                      'name'=> $name,
                      'surname'=> $surname,
                      'email'=> $email,
                      'gender' => $gender,
                      'day'=> $day,
                      'month' => $month,
                      'year' => $year,
                      'country' => $country,
                      'city' => $city,

                      'file'=> $file,
                      'username' => $username,
                      'password' => $password
                    );
                    return view('signup_step_4', $info);

                }


            }

          }
      }

            public function postFinal(Request $request)
            {
              $name = $request->input('name');
              $surname = $request->input('surname');
              $email = $request->input('email');
              $gender = $request->input('gender');
              $day = $request->input('day');
              $month = $request->input('month');
              $year = $request->input('year');
              $country = $request->input('country');
              $city = $request->input('city');

              $file = $request->input('file');
              $username = $request->input('username');
              $password = $request->input('password');

              $relationStatus = $request->input('relationStatus');
              $educationStatus = $request->input('educationStatus');
              $shortBio = $request->input('shortBio');
              $Hobbies = $request->input('Hobbies');
              $Likes = $request->input('Likes');
              $Dislikes = $request->input('Dislikes');
              $interestedArray = $request->input('interested');
              if (isset($interestedArray[0])){
                $interestedMen=  $interestedArray[0];
              }
              else{
                  $interestedMen=  '';
              }

              if (isset($interestedArray[1])) {
                $interestedWomen=  $interestedArray[1];
              }
              else {
                  $interestedWomen=  '';
              }

              $user = new User;
              $user->username = $username;
              $user->email = $email;
              $user->password = Hash::make($password);
              $user->type=3;
              $user->save();
              $id=$user->id;

              $reg= new Registered_user;
              $reg->id = $id;
              $reg->name= $name;
              $reg->surname = $surname;

              $dayN = (int) $day;
              $monthN = (int) $month;
              $yearN = (int) $year;

              $date = Carbon::createFromDate($year, $month, $day);
              $reg->birth_date= $date;

            if($gender=='male'){
                $reg->sex = 'm';
            }
            if($gender=='female'){
                $reg->sex = 'f';
            }

              $reg->country= $country;
              $reg->city = $city;
              $reg->relationship_status= $relationStatus;
              $reg->education = $educationStatus;

              $reg->bio= $shortBio;
              $reg->hobbies = $Hobbies;
              $reg->likes= $Likes;
              $reg->dislikes = $Dislikes;

              if($interestedMen=='men' and $interestedWomen== 'women'){
                $reg->interested_in= 'fm';
              }

              if($interestedMen=='men' and $interestedWomen== ''){
                $reg->interested_in= 'mm';
              }

              if($interestedMen=='' and $interestedWomen== 'women'){
                $reg->interested_in= 'ff';
              }

              $reg->photo_link = $file;


          //    $reg->number_of_warnings = 0;

              $reg->save();


                if(Storage::disk('tmp')->has($file)){

                  $contents = Storage::disk('tmp')->get($file);

                  $filename= (string) $id;
                  $filename .= '/';
                  $filename .= $file;
                  Storage::disk('uploads')->put($filename, $contents);
                  Storage::disk('tmp')->delete($file);
                }

              return view('index');
            }


}
