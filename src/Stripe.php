<?php

namespace HackerESQ\Stripe;

use Stripe\StripeClient;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Foundation\Application;

class Stripe
{
    /**
     * Stripe secret key
     *
     * @var string
     */
    protected $secret_key;

    public function __construct($config)
    {
        // attempt to pre-populate Stripe secret key
        $this->secret_key = Arr::get($config, 'services.stripe.secret', null) ?? Arr::get($config, 'cashier.secret', null);
    }

    /**
     * Set the Stripe secret key
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
