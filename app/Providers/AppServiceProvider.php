<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // if (\App::environment('production')) {
         // \URL::forceSchema('https');
         //    }
       \View::composer('*', function($view)
        {
           // $view->stateList= \App\State::lists('name','name');
           // $view->stateListID=\App\State::lists('name','id');
            //$view->catList= \App\Cat::lists('name','name');
            //$view->catListID=\APP\Cat::lists('name','id');
             $view->cats = \App\Cat::all();
            $view->subListID=\App\SubCat::lists('name','id');
            $view->featured= \App\Biz::whereFeatured('YES')->paginate(4);
            $view->recent= \App\Biz::orderBy('created_at', 'desc')->paginate(3);
            $view->totalBiz=\App\Biz::count();
            $view->totalCat=\App\Cat::count();
            $view->totalSubCat=\App\SubCat::count();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
