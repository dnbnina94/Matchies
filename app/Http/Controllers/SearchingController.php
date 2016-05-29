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
          $iteration = -1;

/////////////////////
                      if($gender=='Men and Women'){
                            $reg->interested_in= 'fm';
                      }
                      if($gender=='Men'){
                        $reg->interested_in= 'mm';
                      }

                      if($gender=='Women'){
                          $reg->interested_in= 'ff';
                        }

                        $reg->minimal_age= $ageMin;
                        $reg->max_age= $ageMax;

                        $reg->save();


        //    $nextUser= $regUsers ->first();
        $returnUser= null;
      foreach ($regUsers as $nextUser) {
            $iteration ++ ;

            $dt = Carbon::now();
            $years = $dt->diffInDays($nextUser->birth_date);
            $years = floor($years/365);

                    if($nextUser->id != $reg->id){

                      if( $years <= $ageMax and $years >= $ageMin){

                        if($reg->sex== 'f'){

                          if($nextUser->interested_in == 'ff' or $nextUser->interested_in == 'fm' ){

                                        if($reg->interested_in == 'fm'){
                                          $returnUser=$nextUser;
                                              break;
                                        }

                                        if($reg->interested_in == 'mm'){
                                            if($nextUser->sex == 'm'){
                                              $returnUser=$nextUser;
                                              break;
                                            }
                                        }

                                        if($reg->interested_in == 'ff'){
                                          if($nextUser->sex == 'f'){
                                            $returnUser=$nextUser;
                                            break;
                                          }
                                        }


                                }

                        }
                        /////
                        if($reg->sex== 'm'){
                          if($nextUser->interested_in == 'mm' or $nextUser->interested_in == 'fm' ){

                                      if($reg->interested_in == 'fm'){
                                        $returnUser=$nextUser;
                                            break;
                                      }

                                      if($reg->interested_in == 'mm'){
                                          if($nextUser->sex == 'm'){
                                            $returnUser=$nextUser;
                                            break;
                                          }
                                      }

                                      if($reg->interested_in == 'ff'){
                                        if($nextUser->sex == 'f'){
                                          $returnUser=$nextUser;
                                          break;
                                        }
                                      }

                                }
                              }
                          }
                    }
            }


            $info= array(
              'iteration' => $iteration,
              'returnUser' => $returnUser,
              'years' => $years,
              'user' => $user


            );

/********VEROVATNO BI BILO DOBRO DA ISPISUJE I NEKU PORUKU DA TREBA DA SE PROSIRI KRITERIJUM*******/

            if($returnUser == null){
              return view ('home');
            }

          return view ('searching', $info);
      }




      public function likedUser(Request $request)
      {
          $user = Auth::user();
          $reg = Registered_user::find($user->id);

          $iteration = $request->input('iteration');
          /*

          PROVERA SUPROTNOG MATCH-A, AKO POSTOJI OTVARA SE INTERAKCIJA
          I BRISE TAJ MATCH
          AKO NE OVO SE BELEZI KAO MATCH

          */

          //////////////////////////////////
            $currentIteration = -1;
            $regUsers = Registered_user::all();
            $number = $regUsers->count();
        $returnUser= null;
      foreach ($regUsers as $nextUser) {
            $currentIteration ++ ;
            $returnUser=$nextUser;
            if($currentIteration > $iteration){
              $iteration ++ ;

              $dt = Carbon::now();
              $years = $dt->diffInDays($nextUser->birth_date);
              $years = floor($years/365);

                      if($nextUser->id != $reg->id){

                        if( $years <= $ageMax and $years >= $ageMin){

                          if($reg->sex== 'f'){

                            if($nextUser->interested_in == 'ff' or $nextUser->interested_in == 'fm' ){

                                          if($reg->interested_in == 'fm'){
                                                $returnUser=$nextUser;
                                                break;
                                          }

                                          if($reg->interested_in == 'mm'){
                                              if($nextUser->sex == 'm'){
                                                $returnUser=$nextUser;
                                                break;
                                              }
                                          }

                                          if($reg->interested_in == 'ff'){
                                            if($nextUser->sex == 'f'){
                                              $returnUser=$nextUser;
                                              break;
                                            }
                                          }


                                  }

                          }
                          /////
                          if($reg->sex== 'm'){
                            if($nextUser->interested_in == 'mm' or $nextUser->interested_in == 'fm' ){

                                        if($reg->interested_in == 'fm'){
                                            $returnUser=$nextUser;
                                            break;
                                        }

                                        if($reg->interested_in == 'mm'){
                                            if($nextUser->sex == 'm'){
                                              break;
                                            }
                                        }

                                        if($reg->interested_in == 'ff'){
                                          if($nextUser->sex == 'f'){
                                            $returnUser=$nextUser;
                                            break;
                                          }
                                        }

                                  }
                                }
                            }
                      }

                }

            }


            $info= array(
              'iteration' => $iteration,
              'returnUser' => $returnUser,
              'years' => $years,
              'user' => $user


            );

/********VEROVATNO BI BILO DOBRO DA ISPISUJE I NEKU PORUKU DA TREBA DA SE PROSIRI KRITERIJUM*******/
            if($returnUser == null){
              return view ('home');
            }


          return view ('searching', $info);
      }

/*********ZNAM DA JE OVO UZASNO DUPLIRANJE KODA,
          ALI AKO PRORADI U NEKOJ KASNIJOJ FAZI CU SREDITI
          DA BUDE LEPOOOOO***************************************************/

      public function dislikedUser(Request $request)
      {
          $user = Auth::user();
          $reg = Registered_user::find($user->id);
          $iteration = $request->input('iteration');
          $currentIteration = -1;
          $regUsers = Registered_user::all();
          $number = $regUsers->count();
          $returnUser= null;
        foreach ($regUsers as $nextUser) {
            $currentIteration ++ ;
            $returnUser=$nextUser;
            if($currentIteration > $iteration){
              $iteration ++ ;

              $dt = Carbon::now();
              $years = $dt->diffInDays($nextUser->birth_date);
              $years = floor($years/365);

                      if($nextUser->id != $reg->id){

                        if( $years <= $ageMax and $years >= $ageMin){

                          if($reg->sex== 'f'){

                            if($nextUser->interested_in == 'ff' or $nextUser->interested_in == 'fm' ){

                                          if($reg->interested_in == 'fm'){
                                            $returnUser=$nextUser;
                                            break;
                                          }

                                          if($reg->interested_in == 'mm'){
                                              if($nextUser->sex == 'm'){
                                                $returnUser=$nextUser;
                                                break;
                                              }
                                          }

                                          if($reg->interested_in == 'ff'){
                                            if($nextUser->sex == 'f'){
                                              $returnUser=$nextUser;
                                              break;
                                            }
                                          }


                                  }

                          }
                          /////
                          if($reg->sex== 'm'){
                            if($nextUser->interested_in == 'mm' or $nextUser->interested_in == 'fm' ){

                                        if($reg->interested_in == 'fm'){
                                              break;
                                        }

                                        if($reg->interested_in == 'mm'){
                                            if($nextUser->sex == 'm'){
                                              break;
                                            }
                                        }

                                        if($reg->interested_in == 'ff'){
                                          if($nextUser->sex == 'f'){
                                            break;
                                          }
                                        }

                                  }
                                }
                            }
                      }

                }

            }


            $info= array(
              'iteration' => $iteration,
              'returnUser' => $returnUser,
              'years' => $years,
              'user' => $user


            );

/********VEROVATNO BI BILO DOBRO DA ISPISUJE I NEKU PORUKU DA TREBA DA SE PROSIRI KRITERIJUM*******/
            if($returnUser == null){
              return view ('home');
            }


          return view ('searching', $info);
      }

}
