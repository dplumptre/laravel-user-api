<?php

namespace Tests\Unit;


use Tests\TestCase;

class CheckStatusTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_status_by_post()
    {
        $response = $this->postJson('/api/get-status-by-post', [
            "id"=>1,
            "member"=> "UBAS",
            "refno"=> "9876",
            // "refno"=> "5141999",
        ]);

        $response->dump(); // tells me the error

        $response->assertStatus(200);
    }
}
