<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class APIMovingEstimatorHTMLTest extends TestCase
{

    use RefreshDatabase;

    public function test_create()
    {
        $response = $this->get('/api/moving-estimator/html/create');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $estimate = factory(\App\Estimate::class)->make();
        $response = $this->post('/api/moving-estimator/html',[
            'first_name' => $estimate->first_name,
            'last_name' => $estimate->last_name,
            'email' => $estimate->email,
            'phone' => $estimate->phone,
            'pickup_address_zipcode' => $estimate->pickup_address_zipcode,
            'destination_address_zipcode' => $estimate->destination_address_zipcode,
            'move_date_month' => $estimate->move_date_month,
            'move_date_day' => $estimate->move_date_day,
            'move_date_year' => $estimate->move_date_year,
            'home_type' => $estimate->home_type,
            'redirect_to' => 'http://website.com/estimator?scroll=10',
        ]);
        $createdEstimate = \App\Estimate::where('email',$estimate->email)->first();
        $this->assertNotNull($createdEstimate);
        $this->assertNotNull($createdEstimate->uuid);
        $response->assertRedirect('http://website.com/estimator?scroll=10&estimateUUID='.$createdEstimate->uuid);
    }

    public function test_edit()
    {
        $estimate = factory(\App\Estimate::class)->create();
        $response = $this->get('/api/moving-estimator/html/'.$estimate->uuid.'/edit');
        $response->assertStatus(200);
        $response->assertSee('No rule found');
    }

    public function test_edit_with_rule()
    {
        $this->withoutExceptionHandling();
        $estimate = factory(\App\Estimate::class)->create();
        $decoyRule = factory(\App\Rule::class)->create();
        $rule = factory(\App\Rule::class)->create();
        $location = factory(\App\Location::class)->create([
            'rule_id' => $rule->id,
            'zipcode' => $estimate->pickup_address_zipcode,
        ]);
        $response = $this->get('/api/moving-estimator/html/'.$estimate->uuid.'/edit');
        $response->assertStatus(200);
        $response->assertSee($rule->uuid);
        $response->assertDontSee($decoyRule->uuid);
    }

}
