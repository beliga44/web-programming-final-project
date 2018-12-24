<?php

namespace App\Providers;

use App\Policies\ThreadPolicy;
use App\Thread;
use function foo\func;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Thread' => 'App\Policies\ThreadPolicy',
        'App\Comment' => 'App\Policies\CommentPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('profile-edit', 'App\Policies\ProfilePolicy@edit');
        Gate::define('profile-popularity', 'App\Policies\ProfilePolicy@popularity');
        Gate::define('profile-inbox', 'App\Policies\ProfilePolicy@message');
        Gate::define('manage-master', function($user) {
            return $user->is_admin == 1 ? true : false;
        });
    }
}
