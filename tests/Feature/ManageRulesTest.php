<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageRulesTest extends TestCase
{

    use RefreshDatabase;

    public function testEditRequiresAuth()
    {
        $response = $this->get('/manage/rule');
        $response->assertStatus(302);
    }

    public function test_index()
    {
        $auth = factory(\App\User::class)->create();
        $rules = factory(\App\Rule::class,3)->create();
        $response = $this->actingAs($auth)->get('/manage/rule');
        $response->assertStatus(200);
        foreach($rules as $rule){
            $response->assertSee($rule->title);
        }
    }

    public function test_delete()
    {
        $auth = factory(\App\User::class)->create();
        $rule = factory(\App\Rule::class)->create();
        $response = $this->actingAs($auth)->delete('/manage/rule/'.$rule->uuid);
        $response->assertRedirect('/manage/rule');
        $deletedRule = \App\Rule::find($rule->id);
        $this->assertNull($deletedRule);
    }
}
