# laravel-stripe

This package is a slim Laravel wrapper around the Stripe PHP SDK. It gives direct access to all of the Stripe PHP SDK methods and properties via a Laravel Facade and helper function. 

## Installation
This package can be used in Laravel 5.4 or higher.

You can install the package via composer:

``` bash
composer require hackeresq/laravel-stripe
```

Optionally, you can set the `services.stripe.secret` in the `service.php` config file that is provided with Laravel, like so: 

```php
'stripe' => [
    'secret' => env('STRIPE_SECRET'),
]
```

<b>Success!</b> laravel-stripe is now installed!

## Usage

Stripe can be accessed using the easy-to-remember Facade, `Stripe` or with the convenient helper `stripe()`. You can also set the secret during runtime with the `setSecretKey()` method. 

## Example

### Create a payment intent
```php
    // you can use the global helper function
    $stripe = stripe();

    // or the facade
    $stripe = Stripe::make();

    // get customer payment methods
    $paymentMethods = $stripe->paymentMethods->all([
        'type' => 'card',
        'customer' => 'cus_13374j9a2ff13j0oh8',
    ]);
    
    // create payment intent
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => 2000 // amount is in cents (or the lowest denomination of your currency)
        'currency' => 'usd',
        'payment_method_types' => ['card'],
        'customer' => 'cus_13374j9a2ff13j0oh8',
        'metadata' => []
    ]);

    // confirm payment intent
    $paymentIntent = $stripe->paymentIntents->confirm($paymentIntent['id'], [
        'payment_method' => $paymentMethod[0]['id'],
        'setup_future_usage' => 'off_session',
    ]);
```

## Finally

### Testing
You can run tests with the `composer test` command.

### Contributing
Feel free to create a fork and submit a pull request if you would like to contribute.

### Bug reports
Raise an issue on GitHub if you notice something broken.
