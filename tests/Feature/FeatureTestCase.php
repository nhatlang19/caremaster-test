<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class FeatureTestCase extends TestCase
{
    protected $admin;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate');
        Artisan::call('db:seed');

        $this->admin = User::where('email', 'admin@admin.com')->first();
    }


}
