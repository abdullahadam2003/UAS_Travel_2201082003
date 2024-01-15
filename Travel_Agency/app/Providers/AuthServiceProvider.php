<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
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

        $user = auth()->user();

        if (!app()->runningInConsole()) {
            $roles = Role::with('permissions')->get();

            // Definisikan $permissionArray sebelum loop
            $permissionArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $title = $permission->title;

                    // Periksa apakah kunci sudah ada di $permissionArray sebelum menambahkannya
                    if (!array_key_exists($title, $permissionArray)) {
                        $permissionArray[$title] = [];
                    }

                    $permissionArray[$title][] = $role->id;
                }
            }

            foreach ($permissionArray as $title => $roles) {
                Gate::define($title, function (User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles));
                });
            }
        }
    }
}