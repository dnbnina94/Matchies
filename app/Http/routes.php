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

Route::get('/', function () {
    return view('index');
});

Route::post('/', function () {
    return view('index');
});


Route::post('/home', function () {
	return view('home');
});

Route::get('/home', function () {
	return view('home');
});

Route::post('/password_sent', function() {
	return view('password_sent');
});

Route::get('/forgot_password', function() {
	return view('forgot_password');
});

Route::get('/signup_step_1', function() {
	return view('signup_step_1');
});

Route::post('/signup_step_2', function() {
	return view('signup_step_2');
});

Route::post('/signup_step_3', function() {
	return view('signup_step_3');
});

Route::post('/signup_step_4', function() {
	return view('signup_step_4');
});

Route::get('/messages', function() {
	return view('messages');
});

Route::get('/notifications', function() {
	return view('notifications');
});

Route::post('/searching', function() {
	return view('searching');
});

Route::get('/chat', function() {
	return view('chat');
});

Route::get('/edit_profile', function () {
	return view('edit_profile');
});

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