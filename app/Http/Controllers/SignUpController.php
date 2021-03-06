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
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;



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



      $validator = Validator::make($request->all(), [
        'fname'             => 'required|alpha|max:30',
        'lname'             => 'required|alpha|max:30',                        // just a normal required validation
        'email'            => 'required|email|unique:users,email',     // required and must be unique
        'emailAgain' => 'required|same:email',         // required and has to match the email field
        'gender'             => 'required | in:male,female',
        'day'             => 'required',
        'month'             => 'required',
        'year'             => 'required',
          ]);

        if ($validator->fails()) {
            return redirect()->route('signupStep1')
                        ->withErrors($validator)
                        ->withInput();
        }

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

        $validator = Validator::make($request->all(), [
          'country'             => 'required|in:Serbia,Germany',
          'city'             => 'required|in:Beograd,Novi Sad,Subotica,Kraljevo,Uzice,Лопатањ,Kruševac,Berlin,Ulm,Munich,Stuttgart',                        // just a normal required validation

            ]);

          if ($validator->fails()) {
              return view('signup_step_2', $info)
                          ->withErrors($validator);

          }



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


//BACKEND !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $infoOld= array(
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


        $validator = Validator::make($request->all(), [
          'username'             => 'required|min:3|max:16|unique:users,username',
          'password'             => 'required|min:8',
          'passrepeat' => 'required|same:password',
          'file'                 => 'required|image',

            ]);

          if ($validator->fails()) {
              return view('signup_step_3', $infoOld)
                          ->withErrors($validator);

          }

//BACKEND KRAJ !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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


//BACKEND !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                          $infoOld= array(
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


                      $validator = Validator::make($request->all(), [
                        'relationStatus'              => 'required|in:Single,In a relationship,Engaged,Married,It\'s complicated,In an open relationship,Divorced,Widowed,Separated',
                        'educationStatus'             => 'required|in:High school,College,University,Associate degree,Graduate degree,PHD/Post doctorate,Bachelors degree,Masters degree',

                        'shortBio'                    => 'required|min:30|max:160',
                        'Hobbies'                     => 'required|min:30|max:160',
                        'Likes'                       => 'required|min:30|max:160',
                        'Dislikes'                    => 'required|min:30|max:160',
                        'interested'                  => 'required',

                          ]);

                        if ($validator->fails()) {
                            return view('signup_step_4', $infoOld)
                                        ->withErrors($validator);

                        }
//BACKEND KRAJ !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
