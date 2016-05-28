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

class SearchingController extends Controller
{
    //
      public function potential_matches(Request $request)
      {
          $user = Auth::user();
          $reg = Registered_user::find($user->id);

          $gender = $request->input('gender');
          $ageMin= $request->input('ageMin');
          $ageMax= $request->input('ageMax');


          //////////////////////////////////
            $regUsers = Registered_user::all();
            $number = $regUsers->count();
            $iteration = 0;

/////////////////////
                      if($gender=='Men and Women'){
                            $regUsers->interested_in= 'fm';
                      }
                      if($gender=='Men'){
                        $regUsers->interested_in= 'mm';
                      }

                      if($gender=='Women'){
                          $regUsers->interested_in= 'ff';
                        }




        //    $nextUser= $regUsers ->first();
        $returnUser= $regUsers ->first();
      foreach ($regUsers as $nextUser) {

            $returnUser=$nextUser;

            if($nextUser->id != $reg->id){

              if($reg->sex== 'f'){

                if($nextUser->interested_in == 'ff' or $nextUser->interested_in == 'fm' ){

                              if($regUsers->interested_in == 'fm'){
                                    break;
                              }

                              if($regUsers->interested_in == 'mm'){
                                  if($nextUser->sex == 'm'){
                                    break;
                                  }
                              }

                              if($regUsers->interested_in == 'ff'){
                                if($nextUser->sex == 'f'){
                                  break;
                                }
                              }


                      }

              }
              /////
              if($reg->sex== 'm'){
                if($nextUser->interested_in == 'mm' or $nextUser->interested_in == 'fm' ){

                            if($regUsers->interested_in == 'fm'){
                                  break;
                            }

                            if($regUsers->interested_in == 'mm'){
                                if($nextUser->sex == 'm'){
                                  break;
                                }
                            }

                            if($regUsers->interested_in == 'ff'){
                              if($nextUser->sex == 'f'){
                                break;
                              }
                            }

                      }
                    }



                }




            }


            $dt = Carbon::now();
            $years = $dt->diffInDays($returnUser->birth_date);
            $years = floor($years/365);
            $user = User::find($returnUser->id);


            $info= array(
              'number' => $number,
              'iteration' => $iteration,
              'returnUser' => $returnUser,
              'years' => $years,
              'user' => $user


            );




          return view ('searching', $info);
      }

}
