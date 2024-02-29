<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Control;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\returnSelf;

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
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('user', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('arabic', function (User $user) {
            return Control::where('key', 'ARABIC')->first()->enable;
        });
        Gate::define('role', function (User $user) {
            return ($user->role_id == 1) && Control::where('key','ROLE')->first()->enable;
        });
        Gate::define('gallery', function (User $user) {
            return $user->role->permissions()->where('key', 'gallery')->first() || $user->role_id == 1;
        });
        Gate::define('news', function (User $user) {
            return $user->role->permissions()->where('key', 'news')->first() || $user->role_id == 1;
        });
        Gate::define('product', function (User $user) {
            return $user->role->permissions()->where('key', 'product')->first() || $user->role_id == 1;
        });
        Gate::define('aboutUs', function (User $user) {
            return $user->role->permissions()->where('key', 'aboutUs')->first() || $user->role_id == 1;
        });
        Gate::define('contactUs', function (User $user) {
            return $user->role->permissions()->where('key', 'contactUs')->first() || $user->role_id == 1;
        });
        Gate::define('contact', function (User $user) {
            return $user->role->permissions()->where('key', 'contact')->first() || $user->role_id == 1;
        });
        Gate::define('slider', function (User $user) {
            return $user->role->permissions()->where('key', 'slider')->first() || $user->role_id == 1;
        });
        Gate::define('home', function (User $user) {
            return $user->role->permissions()->where('key', 'home')->first() || $user->role_id == 1;
        });
        Gate::define('ticket', function (User $user) {
            return ($user->role->permissions()->where('key', 'ticket')->first() || $user->role_id == 1) && Control::where('key', 'TICKET')->first()->enable;
        });
        Gate::define('userTicket', function (User $user) {
            return Control::where('key', 'TICKET')->first()->enable;
        });
        Gate::define('environment', function (User $user) {
            return $user->role->permissions()->where('key', 'environment')->first() || $user->role_id == 1;
        });
        Gate::define('auction', function (User $user) {
            return $user->role->permissions()->where('key', 'auction')->first() || $user->role_id == 1;
        });
        Gate::define('admin', function (User $user) {
            return $user->role_id;
        });
        Gate::define('control', function (User $user) {
            return $user->email == 'samanmax2003@gmail.com';
        });
        $this->registerPolicies();

        //
    }
}
