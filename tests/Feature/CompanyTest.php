<?php

namespace Tests\Feature;

use App\Mail\NewCompanyNotification;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyTest extends FeatureTestCase
{
    public function test_companies_returns_a_successful_response()
    {
        $response = $this->actingAs($this->admin)->get('/companies');

        $response->assertStatus(200);
        $response->assertSee('Create Company');
    }

    public function test_show_a_company_returns_a_successful_response()
    {
        $response = $this->actingAs($this->admin)->get('/companies/1');

        $response->assertStatus(200);
        $response->assertSee('Show Company');
    }

    public function test_edit_a_company_returns_a_successful_response()
    {
        $response = $this->actingAs($this->admin)->get('/companies/1/edit');

        $response->assertStatus(200);
        $response->assertSee('Update Company');
    }

    public function test_store_a_company_returns_a_successful_response()
    {
        Mail::fake();

        $email = Str::random(20) . '@example.com';
        $response = $this->actingAs($this->admin)->post('/companies', [
            'name' => Str::random(20),
            'email' => $email
        ]);

        $response->assertRedirect('/companies');

        $count = Company::count();
        $this->assertEquals(11, $count);

        Mail::assertSent(function (NewCompanyNotification $mail) use ($email) {
            return $mail->company->email === $email;
        });
    }
}
