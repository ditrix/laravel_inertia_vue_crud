<?php

namespace App\Providers;

//use Illuminate\Contracts\Session\Session;
use Illuminate\Session\Store;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
    public function boot(Store $session)
    {
        //

        // Inertia::share([
        //     'errors' => function() use ($session) {
        //         return $session->get('errors')
        //         ? $session->get('errors')->getBag('default')->getMessage()
        //         :(object)[];
        //     },

        // ]);

        // Inertia::share('flash', function() {
        //       return [
        //         'message' => 'TODO flasj'
        //         //'message' => Session::get('message'),
        //       ];
        // });


        // Inertia::share('csrf_token', function() {
        //     return csrf_token();
        // } );

       // КОД ОТЛИЧАЕТСЯ ОТ УЧЕБНОГО !!!
        Inertia::share([
            'errors' => function() use ($session) {
                return $session->get('errors')
                    ? $session->get('errors')->getBag('default')->getMessage()
                    : (object) [];
            },
            'flash' => function() use ($session) {
                return [
                    'message' => $session->get('message'),
                ];
            },
            'csrf_token' => function() {
                return csrf_token();
            },
        ]);

    }
}
