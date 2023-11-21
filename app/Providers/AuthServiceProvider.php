<?php

namespace App\Providers;

use App\Models\ProjectFormMeta;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function($user) {
            return $user->admin == 1;
        });
        Gate::define('Enabled', function($user) {
            return $user->enabled == 1;
        });

        Gate::define('IsTheOwnerOfTheProject', function (User $user, $id) {
            return ProjectFormMeta::find(Auth::id())->exists();
        });

        Gate::define('ProjectSharedWithCurrentUser', function (User $user, $id) {
            return Share::where('shared_user_id', $userId = Auth::id()
            )->where('projectform', '=', Auth::id())->exists();
        });
    }
}
