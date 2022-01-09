<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenderTest extends TestCase
{
   /**
    * @test
    */
    public function get_gender_requests()
    {
        $response = $this->actingAs($this->defaultUser(),'api')
            ->json('GET','/api/genders');

        $response->assertStatus(200);

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
