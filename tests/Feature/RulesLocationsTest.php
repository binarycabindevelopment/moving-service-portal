<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RulesLocationsTest extends TestCase
{

    use RefreshDatabase;

    public function test_index()
    {
        $auth = factory(\App\User::class)->create();
        $rule = factory(\App\Rule::class)->create();
        $locations = factory(\App\Location::class,3)->create([
            'rule_id' => $rule->id,
        ]);
        $response = $this->actingAs($auth)->get('/manage/rule/'.$rule->uuid.'/location');
        $response->assertStatus(200);
        foreach($locations as $location){
            $response->assertSee($location->zipcode);
        }
    }

    public function test_delete()
    {
        $auth = factory(\App\User::class)->create();
        $rule = factory(\App\Rule::class)->create();
        $location = factory(\App\Location::class)->create();
        $response = $this->actingAs($auth)->delete('/manage/rule/'.$rule->uuid.'/location/'.$location->uuid);
        $response->assertRedirect('/manage/rule/'.$rule->uuid.'/location');
        $deletedLocation = \App\Location::find($location->id);
        $this->assertNull($deletedLocation);
    }

}
