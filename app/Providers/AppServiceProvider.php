<?php

namespace App\Providers;


use App\Services\Payments\Factory\Stripe\StipeService;
use Illuminate\Support\ServiceProvider;
use Stripe\StripeClient;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->when(StipeService::class)
            ->needs(StripeClient::class)
            ->give(function () {
                return new StripeClient(config('stripe.api_keys.secret_key'));
            });
    }
}
