<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User as User;
use App\Registered_user as Registered_user;

class MilenaTestLogout extends TestCase
{

    public function testLogoutAdmin()
    {


  /*    $user = factory(App\User::class)->make([
        'username' => 'admin2',
        'type'->1,
       ]);
      $this->actingAs($user);
*/
      $user = new User(array(
        'username' => 'admin1',
        'password'=>'Password1',
        'type'=>1,
        'email'=>'blabla@blalba.com',
      ));
      Auth::login($user);
      $this->actingAs($user)->call('GET', '/index_admin');

    //  $this->call('GET', '/index_admin');
       $this->assertRedirectedTo('/index_admin');
    }
}
