<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Sentinel;
use App\User;
class ProfileProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( ['student-master', 'tutor-master'], function ($view) {
            $user = User::find(Sentinel::getUser()->id);
            $view->with('User', $user);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
