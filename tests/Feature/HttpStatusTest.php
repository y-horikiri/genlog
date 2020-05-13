<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function GuzzleHttp\Psr7\str;


class HttpStatusTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testNewString()
    {
        $response = $this->get('/newstring?gear_id=1');

        $response->assertStatus(200);
    }

    public function testGearsNew()
    {
        $response = $this->get('/gears/new');

        $response->assertStatus(200);
    }

    public function testGearsNewPost()
    {
        $response = $this->get('/gears/new');

        $response->assertStatus(200);
    }
}
