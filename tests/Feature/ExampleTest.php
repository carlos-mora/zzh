<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    /**
     * A basic test everything works at home.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Symfony Github Repositories');

    }

    /**
     * A basic test everything works at home.
     *
     * @return void
     */
    public function testCsv()
    {
        $response = $this->get('/csv');

        $response->assertStatus(200);
        $this->assertTrue(strpos($response->headers->get('Content-Type'), 'text/csv') !== false);
    }


}
