<?php

use HackerESQ\Stripe\Facades\Stripe;

if (!function_exists('stripe')) {
	/**
	 * Stripe helper function
	 * 
	 * @param mixed|null $secret_key (optional) 
	 * @return \Stripe\StripeClient
	 */
	function stripe($secret_key = null)
	{

		return Stripe::make($secret_key);
	}
}
