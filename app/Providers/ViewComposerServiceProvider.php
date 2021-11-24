<?php

namespace App\Providers;

use App\Variety;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
   
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('varieties', Variety::orderByRaw('-name ASC')->get());
        });
    }
}