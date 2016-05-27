<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;
use Illuminate\Support\Facades\Input;


class SignUpController extends Controller
{
    //



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
                $dayN = (int) $day;
                $monthN = (int) $month;
                $yearN = (int) $year;

                $date = Carbon::createFromDate($year, $month, $day);
                $info= array(
                  'name'=> $name,
                  'surname'=> $surname,
                  'email'=> $email,
                  'gender' => $gender,
                  'date'=> $date
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
        $date = $request->input('date');
        $country = $request->input('country');
        $city = $request->input('city');

        $info= array(
          'name'=> $name,
          'surname'=> $surname,
          'email'=> $email,
          'gender' => $gender,
          'date'=> $date,
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
        $date = $request->input('date');
        $country = $request->input('country');
        $city = $request->input('city');

        $file = $request->file('file');
        $username = $request->input('username');
        $password = $request->input('password');
        $passrepeat = $request->input('passrepeat');

        if($password == $passrepeat){

            $user = User::where('username', '=',$request->input('username') )->first();
            if ($user === null) {

              $info= array(
                'name'=> $name,
                'surname'=> $surname,
                'email'=> $email,
                'gender' => $gender,
                'date'=> $date,
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



            public function postFinal(Request $request)
            {
              $name = $request->input('name');
              $surname = $request->input('surname');
              $email = $request->input('email');
              $gender = $request->input('gender');
              $date = $request->input('date');
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

              if (isset($interestedArray[1])){
                $interestedWomen=  $interestedArray[1];
              }
              else{
                  $interestedWomen=  '';
              }



              $info= array(
                'name'=> $name,
                'surname'=> $surname,
                'email'=> $email,
                'gender' => $gender,
                'date'=> $date,
                'country' => $country,
                'city' => $city,

                'file'=> $file,
                'username' => $username,
                'password' => $password,

                'relationStatus'=> $relationStatus,
                'educationStatus' => $educationStatus,
                'shortBio' => $shortBio,
                'Hobbies'=> $Hobbies,
                'Likes' => $Likes,
                'Dislikes' => $Dislikes,
                'interestedMen' => $interestedMen,
                'interestedWomen' => $interestedWomen
              );


              return view('nesto', $info);



            }


}
