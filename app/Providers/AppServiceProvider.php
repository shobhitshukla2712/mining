<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Dealer;
use DB;

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
        Schema::defaultStringLength(191);

        // Callback is used here as in the normal way we are not getting the session value
        view()->composer('*', function ($view) 
        {
        	$userData 	= array();
        	if( Auth::check() )
        	{
	            $userId = Auth::id();
	            $userData = User::find($userId);
        	}

            View::share(['userData' => $userData]);

        });
    }
}
