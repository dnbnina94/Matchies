<?php
//autor: Milena Filipovic 73/13
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MilenaTestEx extends TestCase
{
    
    public function testRedirectFromHome()
    {
      //  $this->assertTrue(true);
      $this->call('GET', '/');
      $this->assertResponseOk();

      $this->call('GET', 'home');
      $this->assertRedirectedTo('/');

    }

    public function testRedirectFromChat()
    {
      $this->call('GET', 'chat/1');
      $this->assertRedirectedTo('/');

    }

    public function testRedirectFromModHome()
    {
      $this->call('GET', 'index_moderator');
      $this->assertRedirectedTo('/');

    }

    public function testRedirectFromAdminHome()
    {
      $this->call('GET', 'index_admin');
      $this->assertRedirectedTo('/');

    }



}
