<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User as User;


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
}
