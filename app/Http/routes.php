<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware'=>'web'], function(){

Route::get('/', [
      'as' => 'index',
      'uses' => function(){
        return view('index');
      }

  ]);

Route::post('auth/login', 'AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@logout');


//////////////////////


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...


Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');

Route::get('/forgot_password', function() {
  return view('/auth/password');
});


Route::group(['middleware'=>'customMiddleware'], function(){
    Route::get('/home', [
          'as' => 'home',
          'uses' => function(){
            return view('home');
          }

      ]);


      Route::get('/moderator', [
            'as' => 'moderator',
            'uses' => 'ModController@ucitajReportove'

        ]);

        Route::get('/admin', [
              'as' => 'admin',
              'uses' => 'AdminController@ucitajReportove'

          ]);


      /*
      **********************************************
      */



      Route::post('/search/potential_matches','SearchingController@potential_matches');
      Route::post('/search/disliked_user','SearchingController@dislikedUser');
      Route::post('/search/liked_user','SearchingController@likedUser');

      Route::get('/messages', 'MessagesController@messages');

      Route::get('/notifications', function() {
        return view('notifications');
      });

      Route::get('/searching', function() {
        return view('error_page');
      });

      Route::post('/searching', function() {
        return view('searching');
      });

      Route::get('/chat', function() {
        return view('chat');
      });

      /*Route::get('/edit_profile', function () {
        return view('edit_profile');
      });*/

      Route::post('/edit_profile', function () {
        return view('edit_profile');
      });

      Route::get('/edit_location', function () {
        return view('edit_location');
      });

      Route::post('/edit_location', function () {
        return view('edit_location');
      });

      Route::get('/delete_account', function() {
        return view('delete_account');
      });

      Route::post('/delete_account', function() {
        return view('delete_account');
      });

      Route::get('/edit_details', function() {
        return view('edit_details');
      });

      Route::post('/edit_details', function() {
        return view('edit_details');
      });

      Route::get('/profile_x', 'ProfileController@ucitajSvojProfil');
      Route::get('/edit_profile', 'ProfileController@izmeniProfilOsnovno');
      Route::get('/edit_location', 'ProfileController@izmeniLokaciju');
      Route::get('/edit_details', 'ProfileController@izmeniDetalje');
      Route::post('/save_profile', 'ProfileController@sacuvajProfilOsnovno');
      Route::post('/save_location', 'ProfileController@sacuvajLokaciju');
      Route::post('/save_details', 'ProfileController@sacuvajDetalje');
      Route::post('/delete_account', 'ProfileController@obrisiSvojProfil');
      Route::post('/save_picture', 'ProfileController@sacuvajSliku');

      Route::get('/profile/{id}', 'ProfileController@prikaziTudjProfil');

    //  Route::post('/warn_user', 'ModController@warnUser');

      Route::get('/edit_picture', function() {
        return view('edit_picture');
      });

      Route::get('/profile_1', function () {
        return view('profile_1');
      });

      Route::post('/profile_1', function () {
        return view('profile_1');
      });

      Route::get('/profile_2', function () {
        return view('profile_2');
      });

      Route::post('/profile_2', function () {
        return view('profile_2');
      });

      Route::get('/profile_3', function () {
        return view('profile_3');
      });

      Route::post('/profile_3', function () {
        return view('profile_3');
      });


    });

/*****************************KRAJ RUTA OBICNOG KORISNIKA*********************************************/



/*

    Route::get('/admin', function() {
      return view('index_admin');
    });


Route::post('/password_sent', function() {
  return view('password_sent');

});
*/



Route::get('/signup_step_1',[
      'as' => 'signupStep1',
      'uses' => function(){
        return view('signup_step_1');
      }

  ]);



Route::post('/signup/step2','SignUpController@postStep2');
Route::post('/signup/step3','SignUpController@postStep3');
Route::post('/signup/step4','SignUpController@postStep4');
Route::post('/signup/final','SignUpController@postFinal');

Route::get('/index_moderator', 'ModController@ucitajReportove');
/*

Route::post('/signup_step_2', function() {
	return view('signup_step_2');
});

Route::post('/signup_step_3', function() {
	return view('signup_step_3');
});

Route::post('/signup_step_4', function() {
	return view('signup_step_4');
});
*/

/***********************ADMIN RUTE***************************/
    Route::group(['middleware'=>'adminMiddleware'], function(){

          Route::get('/index_admin', 'AdminController@ucitajReportove');
          Route::post('/admin/warn_user', 'AdminController@warnUser');

          Route::post('/index_admin', function() {
            return view('index_admin');
          });

          Route::get('/profile/{id}', 'ProfileController@prikaziTudjProfilAdmin');

          Route::get('/users_admin', function() {
            return view('users_admin');
          });

          Route::get('/moderators_admin', function() {
            return view('moderators_admin');
          });

          Route::post('/moderators_admin', function() {
            return view('moderators_admin');
          });

          Route::get('/moderator_signup', function() {
            return view('moderator_signup');
          });
    });

/***************************************************************************************/


/***************************ADMIN I MOD RUTE****************************************************/

  Route::group(['middleware'=>'modMiddleware'], function(){





  });


/**********************************************************************************************/



/*****************************************MODERATORSKE RUTE************************************/
                  Route::group(['middleware'=>'modMiddleware'], function(){


                  Route::get('/index_moderator', 'ModController@ucitajReportove');

                  Route::get('/users_moderator', function() {
                    return view('users_moderator');
                        });

                        Route::post('/mod/warn_user', 'ModController@warnUser');

                });



 /******************************************************************************************/











});

  /**************************KRAJ IMPLEMENTIRANIH FUNKCIONALNOSTI*************************/



Route::get('/profile_4', function() {
	return view('profile_4');
});

Route::post('/profile_4', function() {
	return view('profile_4');
});


Route::get('/profile_5', function() {
	return view('profile_5');
});

Route::post('/profile_5', function() {
	return view('profile_5');
});


Route::get('/profile_6', function() {
  return view('profile_6');
});

/* nina proba - obrisati posle ispod sve */

/*Route::get('/home', function() {
  return view('home');
});

Route::get('/edit_profile', function() {
  return view('edit_profile');
});

Route::get('/edit_location', function() {
  return view('edit_location');
});

Route::get('/edit_details', function() {
  return view('edit_details');
});

Route::get('/delete_account', function() {
  return view('delete_account');
});

Route::get('/profile_1', function() {
  return view('profile_1');
});

Route::get('/messages', function() {
  return view('messages');
});

Route::get('/notifications', function() {
  return view('notifications');
});

Route::get('/signup_step_1', function() {
  return view('signup_step_1');
});

Route::get('/chat', function() {
  return view('chat');
});*/
