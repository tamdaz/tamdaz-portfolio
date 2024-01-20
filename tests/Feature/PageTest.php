<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * @test
     */
    public function test_home_page(): void
    {
        $response = $this->get(route('pages.home'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_bts_sio_page(): void
    {
        $response = $this->get(route('pages.bts-sio'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_certifications_page(): void
    {
        $response = $this->get(route('pages.certifications'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_technology_watch_page(): void
    {
        $response = $this->get(route('pages.tw'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_components_page(): void
    {
        $response = $this->get(route('pages.components'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_reports_page(): void
    {
        $response = $this->get(route('pages.reports'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_blogs_page(): void
    {
        $response = $this->get(route('pages.blogs'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_contact_page(): void
    {
        $response = $this->get(route('pages.contact'));
        $response->assertStatus(200);
    }
}
