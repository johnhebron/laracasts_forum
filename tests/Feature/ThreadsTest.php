<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
    @test
     * A basic test example.
     *
     * @return void
     */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    /** @test **/
    public function a_user_can_view_a_specific_thread()
    {
        $thread = factory('App\Thread')->create();
        
        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }
}
