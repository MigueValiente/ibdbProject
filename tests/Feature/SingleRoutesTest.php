<?php

namespace Tests\Feature;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class SingleRoutesTest extends TestCase
{
    /**
     * A basic root test example that checks if the root route loads propertly.
     *
     * @test
     */
    public function check_if_root_route_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     /**
     * A basic root test example that checks if the about route loads propertly.
     *
     * @test
     */
    public function check_if_about_route_loads()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        $response->assertSeeText('About');
    }

    /**
     * A basic root test example that checks if the contact route loads propertly.
     *
     * @test
     */
    public function check_if_contact_route_loads()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        
    }
}
