<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageTest extends TestCase
{
    public function test_home_page(): void
    {
        $response = $this->get(route('pages.home'));
        $response->assertStatus(200);
    }

    public function test_bts_sio_page(): void
    {
        $response = $this->get(route('pages.bts-sio'));
        $response->assertStatus(200);
    }

    public function test_components_page(): void
    {
        $response = $this->get(route('pages.components'));
        $response->assertStatus(200);
    }

    public function test_blogs_page(): void
    {
        $response = $this->get(route('pages.blogs'));
        $response->assertStatus(200);
    }

    public function test_contact_page(): void
    {
        $response = $this->get(route('pages.contact'));
        $response->assertStatus(200);
    }
}
