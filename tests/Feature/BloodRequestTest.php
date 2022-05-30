<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BloodRequestTest extends TestCase
{

    /**
     * @test
     */
    public function get_blood_requests()
    {
        $response = $this->actingAs($this->defaultUser(),'api')
            ->json('GET','/api/blood-requests');

        $response->assertStatus(200);

        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    /**
     * @test
     */
    public function get_blood_approved_total()
    {
        $response = $this->actingAs($this->defaultUser(),'api')
            ->json('GET','/api/blood-requests/total-approved');

        $response->assertStatus(200);

        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    /**
     * @test
     */
    public function get_blood_approved_requests()
    {
        $response = $this->actingAs($this->defaultUser(),'api')
            ->json('GET','/api/blood-requests/total-approved-req');

        $response->assertStatus(200);

        echo json_encode($response, JSON_PRETTY_PRINT);
    }


}
