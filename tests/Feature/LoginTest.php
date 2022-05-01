<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_returns_a_successful_response()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
        
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
            '_token' => csrf_token()
        ]);

        $response->assertRedirect('/home');
    }
}
