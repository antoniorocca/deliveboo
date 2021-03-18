<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $environment = 'sandbox';
        $braintree = new \Braintree\Gateway([
            'environment' => $environment,
            'merchantId' => 'nfxd2qgr7g2y7qy9',
            'publicKey' => '7kyqy9345n4zc6ck',
            'privateKey' => '3525327d91d9bd1b82fadebf244acd00'
        ]);
        config(['braintree' => $braintree]);
    }
}
