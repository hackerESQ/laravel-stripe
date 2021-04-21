<?php

use HackerESQ\Stripe\Stripe;
// use HackerESQ\Stripe\Facades\Stripe;

if (!function_exists('stripe')) {
	/**
	 * Stripe helper function
	 * 
	 * @param mixed|null $secret_key (optional) 
	 * @return \Stripe\StripeClient
	 */
	function stripe($secret_key = null)
	{
		// tries to guess secret key
		$config = app()->make('config')->get(['services.stripe', 'cashier']);

		// returns stripe client
		return app(Stripe::class, ['config' => $config])->make($secret_key);

		// return Stripe::make($secret_key);
	}
}
