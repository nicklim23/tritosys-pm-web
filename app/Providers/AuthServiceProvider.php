<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Models\AuthClient;
use App\Models\AuthCode;
use App\Models\AuthPersonalAccessClient;
use App\Models\AuthRefreshTokenModel;
use App\Models\AuthToken;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::useClientModel(AuthClient::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::usePersonalAccessClientModel(AuthPersonalAccessClient::class);
        Passport::useTokenModel(AuthToken::class);
        Passport::useRefreshTokenModel(AuthRefreshTokenModel::class);
    }
}
