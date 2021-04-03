<?php

namespace HackerESQ\Stripe;

use \Stripe\StripeClient;

class Stripe
{

    /**
     * Stripe secret key
     *
     * @var string
     */
    protected $secret_key;

    public function __construct()
    {
        $this->secret_key = config('services.stripe.secret', null) ?? config('cashier.secret', null);
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
