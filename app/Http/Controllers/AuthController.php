<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Registered_user as Registered_user;

class AuthController extends Controller
{
    //


    public function postLogin(Request $request){

      $username = $request->input('username');
      $password = $request->input('password');

      if (Auth::attempt(['username' => $username, 'password' => $password])) {
         // Authentication passed...
             if(Auth::user()->type == 3){
               return redirect()->route('home');
             }
             if(Auth::user()->type == 2){
               return redirect()->route('moderator');
             }
             if(Auth::user()->type == 1){
               return redirect()->route('admin');
             }


          }

          else {
            return redirect()->route('index');
          }
    }



}
