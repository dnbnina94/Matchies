<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MilenaTestLogin extends TestCase
{

        public function testLoginPostRedirectIndex(){
          Session::start();

          $this->call('POST', 'auth/login', array(
            'username' => 'badUsername',
            'password' => 'badPass',
            '_token' => csrf_token()
          ));
          $this->assertRedirectedTo('/');
          $this->assertSessionHasErrors();

        }


        public function testLoginPostRedirectHome(){
        Session::start();
        $response = $this->call('POST', 'auth/login', [
          'username' => 'PrviKor',
          'password' => 'Password2',
          '_token' => csrf_token()
        ]);

        $this->assertRedirectedTo('/home');
        $this->assertEquals(Auth::user()->type, 3);


      }

      public function testLoginPostRedirectMod(){
      Session::start();
      $response = $this->call('POST', 'auth/login', [
        'username' => 'moderator',
        'password' => 'Password1',
        '_token' => csrf_token()
      ]);

      $this->assertRedirectedTo('/moderator');
      $this->assertEquals(Auth::user()->type, 2);
    }


    public function testLoginPostRedirectAdmin(){
    Session::start();
    $response = $this->call('POST', 'auth/login', [
      'username' => 'admin',
      'password' => 'Password1',
      '_token' => csrf_token()
    ]);
    $this->assertRedirectedTo('/admin');
    $this->assertEquals(Auth::user()->type, 1);
  }





}
