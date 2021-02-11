<?php

namespace HackerESQ\Stripe\Tests;

use Orchestra\Testbench\TestCase;

class StripeTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function defineEnvironment($app)
    {
        // environment specific
        $app['config']->set('app.debug', env('APP_DEBUG', true));
    }

    /** @test */
    public function stripe_instance_is_created()
    {
        
    }
}