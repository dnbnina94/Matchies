<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User as User;
use App\Registered_user as Registered_user;

class TestHomes extends TestCase
{

    public function testHomeAdmin()
    {
      $user = User::where('type','=',1)->first();
      Auth::login($user);
      $this->call('GET', '/index_admin');
      $this->assertResponseOk();
    }

    public function testHomeModerator()
    {
      $user = User::where('type','=',2)->first();
      Auth::login($user);
      $this->call('GET', '/index_moderator');
      $this->assertResponseOk();
    }

    public function testHomeReg()
    {
      $user = User::where('type','=',3)->first();
      Auth::login($user);
      $this->call('GET', '/home');
      $this->assertResponseOk();
    }
}
