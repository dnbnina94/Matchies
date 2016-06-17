<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User as User;

class TestMod extends TestCase
{
  //ima vec
  /*
    public function testIndexMod()
    {
      $user = User::where('type','=',2)->first();
      Auth::login($user);

      $this->call('GET', '/index_moderator');
      $this->assertResponseOk();

    }
    */

    public function testUsersMod()
    {
      $user = User::where('type','=',2)->first();
      Auth::login($user);
      $this->call('GET', '/mod/users');
      $this->assertResponseOk();
    }



    public function testHomeRedirectMod()
    {
      $user = User::where('type','=',2)->first();
      Auth::login($user);
      $this->call('GET', '/home');
      $this->assertRedirectedTo('/moderator');
    }

}
