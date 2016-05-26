<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //


    public function postLogin(Request $request){

      $name = $request->input('name');
      $password = $request->input('password');

      if (Auth::attempt(['name' => $name, 'password' => $password])) {
         // Authentication passed...
             if(Auth::user()->type == 3){
               return redirect()->route('home');
             }
             if(Auth::user()->type == 2){
               return redirect()->route('moderator');
             }
             if(Auth::user()->type == 1){
               return view ('admin');
             }


          }

          else {
            return redirect()->route('random');
          }
    }



}
