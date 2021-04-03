<?php

namespace HackerESQ\Stripe;

use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{

    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('stripe', function ($app) {
            // pass relevant config to Stripe
            $config = $app->make('config')->get(['services.stripe', 'cashier']);

            return new \HackerESQ\Stripe\Stripe($config);
        });
    }
}
