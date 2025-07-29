<?php

namespace App\Providers;

use App\Models\MasterPKPMK\PkPmk;
use App\Models\MasterPKPMK\PkPmkAddendum;
use App\Policies\PrintPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        PkPmk::class => PrintPolicy::class,
        PkPmkAddendum::class => PrintPolicy::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
