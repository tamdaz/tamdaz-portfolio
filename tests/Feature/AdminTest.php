<?php

namespace Tests\Feature;

use App\Models\User;
use Orchid\Support\Testing\ScreenTesting;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use ScreenTesting;

    /**
     * @test
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function test_home_page()
    {
        $screen = $this->screen('platform.main')->actingAs(User::first());

        $screen->display()->assertSeeText('Get Started');
    }

    /**
     * @test
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function test_maintenance_page()
    {
        $screen = $this->screen('platform.maintenance')->actingAs(User::first());
        $screen->display()->assertSeeText('Maintenance');
    }
}
