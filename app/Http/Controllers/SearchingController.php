<?php

//autor: Milena Filipovic 73/13

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
use App\Interaction as Interaction;
use App\Match_request as Match_request;
use App\Notification as Notification;

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
          if ($ageMax == 80) $ageMax = 110;

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

                      $interakcija1 = Interaction::where('id_user1', '=', $reg->id)->where('id_user2', '=',$nextUser->id )->first();
                      $interakcija2 = Interaction::where('id_user1', '=', $nextUser->id)->where('id_user2', '=', $reg->id)->first();

                      $interakcija = null;

                      if (!is_null($interakcija1)) $interakcija = $interakcija1;
                      else $interakcija = $interakcija2;

                      $match_request =null;
                      $match_request = Match_request::where('id_source_user', '=', $reg->id)->where('id_destination_user', '=', $nextUser->id)->first();
                      if( is_null($interakcija) and is_null($match_request)){

                        if( $years <= $ageMax and $years >= $ageMin){





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





                          /////
                        /*  if($reg->sex== 'm'){
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
                                }*/
                            }
                      }


                    }
            }


            $info = array(
              'iteration' => $iteration,
              'returnUser' => $returnUser,
              'years' => $years,
              'user' => $user


            );

/********VEROVATNO BI BILO DOBRO DA ISPISUJE I NEKU PORUKU DA TREBA DA SE PROSIRI KRITERIJUM*******/

            if($returnUser == null){
              return redirect()->route('home');
            }

          return view ('searching', $info);
      }




      public function likedUser(Request $request)
      {
          $user = Auth::user();
          $reg = Registered_user::find($user->id);

          $iteration = $request->input('iteration');
          $currentUserString = $request->input('currentUser');
          $currentUserId= (int) $currentUserString;
          $currentUser = Registered_user::find($currentUserId);
          /*

          PROVERA SUPROTNOG MATCH-A, AKO POSTOJI OTVARA SE INTERAKCIJA
          I BRISE TAJ MATCH
          AKO NE OVO SE BELEZI KAO MATCH

          */
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




          //////////////////////////////////
            $currentIteration = -1;
            $regUsers = Registered_user::all();
            $number = $regUsers->count();
            $returnUser= null;
            $years=null;
            foreach ($regUsers as $nextUser) {
              $currentIteration ++ ;

              if($currentIteration > $iteration){
                $iteration ++ ;

                $dt = Carbon::now();
                $years = $dt->diffInDays($nextUser->birth_date);
                $years = floor($years/365);

                if($nextUser->id != $reg->id){

                  $interakcija1 = Interaction::where('id_user1', '=', $reg->id)->where('id_user2', '=',$nextUser->id )->first();
                  $interakcija2 = Interaction::where('id_user1', '=', $nextUser->id)->where('id_user2', '=', $reg->id)->first();

                  $interakcija = null;

                  if (!is_null($interakcija1)) $interakcija = $interakcija1;
                  else $interakcija = $interakcija2;

                  $match_request =null;
                  $match_request = Match_request::where('id_source_user', '=', $reg->id)->where('id_destination_user', '=', $nextUser->id)->first();
                  if( is_null($interakcija) and is_null($match_request)){

                    if( $years <= $reg->max_age and $years >= $reg->minimal_age){

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





                      /////
                    /*  if($reg->sex== 'm'){
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
                            }*/
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
              return redirect()->route('home');
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
          $years=null;
        foreach ($regUsers as $nextUser) {
            $currentIteration ++ ;

            if($currentIteration > $iteration){
              $iteration ++ ;

              $dt = Carbon::now();
              $years = $dt->diffInDays($nextUser->birth_date);
              $years = floor($years/365);

              if($nextUser->id != $reg->id){

                $interakcija1 = Interaction::where('id_user1', '=', $reg->id)->where('id_user2', '=',$nextUser->id )->first();
                $interakcija2 = Interaction::where('id_user1', '=', $nextUser->id)->where('id_user2', '=', $reg->id)->first();

                $interakcija = null;

                if (!is_null($interakcija1)) $interakcija = $interakcija1;
                else $interakcija = $interakcija2;

                $match_request =null;
                $match_request = Match_request::where('id_source_user', '=', $reg->id)->where('id_destination_user', '=', $nextUser->id)->first();
                if( is_null($interakcija) and is_null($match_request)){

                  if( $years <= $reg->max_age and $years >= $reg->minimal_age){





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

                    /////
                  /*  if($reg->sex== 'm'){
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
                          }*/
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
              return redirect()->route('home');
            }


          return view ('searching', $info);
      }

}
