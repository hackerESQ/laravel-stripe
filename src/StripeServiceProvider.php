<?php

namespace HackerESQ\Stripe;

use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider {

    protected $defer = false;

	/**
     * Register services.
     *
     * @return void
     */
    public function register () 
    {
        $this->app->singleton('stripe','HackerESQ\Stripe\Stripe');

    }
}
