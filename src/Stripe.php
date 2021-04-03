<?php

namespace HackerESQ\Stripe;

use Stripe\StripeClient;
use Illuminate\Contracts\Foundation\Application;

class Stripe
{
    /** 
     * @var Application
     */
    protected $app;

    /**
     * Stripe secret key
     *
     * @var string
     */
    protected $secret_key;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->secret_key = $app['config']['services.stripe.secret'] ?? $app['config']['cashier.secret'];
    }

    /**
     * Sets the Stripe secret key
     * 
     * @param string $key
     */
    public function setSecretKey(String $key)
    {
        $this->secret_key = $key;

        return $this;
    }

    /**
     * Get a new StripeClient object
     * 
     * @param string|null $key (optional)
     * @return \Stripe\StripeClient
     */
    public function make($key = null)
    {
        return new StripeClient($key ?? $this->secret_key);
    }
}
