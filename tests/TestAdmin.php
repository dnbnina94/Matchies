<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User as User;
use App\Registered_user as Registered_user;

class TestAdmin extends TestCase
{


  public function testIndexAdmin()
  {
    $user = User::where('type','=',1)->first();
    Auth::login($user);

    $this->call('GET', '/index_admin');
    $this->assertResponseOk();

  }

  public function testUsersAdmin()
  {
    $user = User::where('type','=',1)->first();
    Auth::login($user);
    $this->call('GET', '/admin/users');
    $this->assertResponseOk();
  }

  public function testModsAdmin()
  {
    $user = User::where('type','=',1)->first();
    Auth::login($user);
    $this->call('GET', '/moderators_admin');
    $this->assertResponseOk();
  }


  public function testHomeRedirectAdmin()
  {
    $user = User::where('type','=',1)->first();
    Auth::login($user);
    $this->call('GET', '/home');
    $this->assertRedirectedTo('/admin');
  }

  use DatabaseTransactions;

  public function testMakeModAdmin()
  {
    $user = User::where('type','=',1)->first();
    Auth::login($user);
    $this->call('GET', '/moderator_signup');
    $this->assertResponseOk();

    Session::start();

    $this->call('POST', '/moderators_admin', array(
      'username' => 'moderator2',
      'password' => 'Password1',
      'passrepeat' => 'Password1',
      'email' => 'moderator2@mod.com',
      'emailAgain' => 'moderator2@mod.com',
      '_token' => csrf_token()
    ));
    $this->assertRedirectedTo('/moderators_admin');

  }
}
