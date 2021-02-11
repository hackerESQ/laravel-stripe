<?php

use HackerESQ\Stripe\Facades\Stripe;

if ( !function_exists('stripe') )
{
	function stripe($secret_key = null){

		return Stripe::setSecretKey($secret_key)->make();

	}
}