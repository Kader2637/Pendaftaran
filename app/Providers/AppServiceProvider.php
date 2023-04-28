<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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


        Gate::define('admin', function(User $user){
            return $user->jabatan === 'admin';
        });

        Gate::define('guru', function(User $user){
            return $user->jabatan === 'guru';
        });

        Gate::define('siswa', function(User $user){
            return $user->jabatan === 'siswa';
        });


    }
}
