<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport; // <-- L'importation INDISPENSABLE

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPolicies();
        \Laravel\Passport\Passport::enablePasswordGrant();

    }
}
