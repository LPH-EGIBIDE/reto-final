<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-attachment', function ($user, $attachment) {
            return $user->id === $attachment->persona_id || $attachment->is_public;
        });

        Gate::define('is-admin', function ($user) {
            return $user->role === 1;
        });

        Gate::define('view-order', function ($user, $order) {
            return $user->id === $order->user_id;
        });
    }
}
