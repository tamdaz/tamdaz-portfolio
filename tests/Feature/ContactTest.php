<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactTest extends TestCase
{
    public function test_send_message(): void
    {
        Mail::fake();

        $response = $this->post(route('pages.contact_send'), [
            'name' => "John Doe",
            'email' => getenv('MAIL_FROM_ADDRESS'),
            'message' => "This is a test"
        ]);

        $response->assertRedirectToRoute('pages.contact');

        Mail::assertSent(ContactMail::class);
    }

    public function test_verify_informations_before_sending(): void
    {
        $this->post(route('pages.contact_send'), [
            'name' => "",
            'email' => "",
            'message' => ""
        ])->assertSessionHasErrors();

        $this->post(route('pages.contact_send'), [
            'name' => "",
            'email' => getenv('MAIL_FROM_ADDRESS'),
            'message' => "This is a test"
        ])->assertSessionHasErrors();

        $this->post(route('pages.contact_send'), [
            'name' => "John Doe",
            'email' => "",
            'message' => "This is a test"
        ])->assertSessionHasErrors();

        $this->post(route('pages.contact_send'), [
            'name' => "",
            'email' => "",
            'message' => "This is a test"
        ])->assertSessionHasErrors();

        $this->post(route('pages.contact_send'), [
            'name' => "John Doe",
            'email' => getenv('MAIL_FROM_ADDRESS'),
            'message' => ""
        ])->assertSessionHasErrors();
    }
}
