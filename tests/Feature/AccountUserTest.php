<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountUserTest extends TestCase
{

    use RefreshDatabase;

    public function testEditRequiresAuth()
    {
        $response = $this->get('/account/user');
        $response->assertStatus(302);
    }

    public function testEdit()
    {
        $auth = factory(\App\User::class)->create();
        $response = $this->actingAs($auth)->get('/account/user');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $auth = factory(\App\User::class)->create();
        $newUser = factory(\App\User::class)->make();
        $response = $this->actingAs($auth)->patch('/account/user',[
            'email' => $newUser->email,
        ]);
        $response->assertStatus(302);
        $auth = $auth->fresh();
        $this->assertEquals($newUser->email,$auth->email);
    }

}
