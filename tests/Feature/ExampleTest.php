<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login()
    {
        $response =$this->withHeaders(
            ['X-Header'=>'Value',]
            )->post('/login',[
                'email'=>'aaa@mail.com',
                'password'=>'asdasdasd',
            ]);
        $response->assertStatus(200);
    }


}
