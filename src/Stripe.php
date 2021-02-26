<?php 

namespace HackerESQ\Stripe;

use \Stripe\StripeClient;
 
class Stripe {

    public function __construct() {
        $this->secret_key = config('services.stripe.secret',null);
    }

    public function setSecretKey($key) {
        if (!empty($key)) $this->secret_key = $key;

        return $this;
    }

    public function make($secret = null) {
        return new StripeClient($secret ?? $this->secret_key);
    }

}