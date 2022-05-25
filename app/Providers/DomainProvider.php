<?php

namespace App\Providers;

use Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Modules\Domain\Entities\Domain;

class DomainProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($domains);
        // dd(Auth::guard('admin')->check());
        // if(Auth::guard('admin')->check()) {
        // }

        if (!isset($_COOKIE['domain'])) {
            setcookie('domain',env('DEFAULT_DOMAIN'), 0, '/');
        }
        
        $domains = Domain::getAll()->orderBy('id', 'DESC')->get();
        View::share('domains', $domains);
    }
}
