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
       \View::composer('*', function($view)
        {
            $view->stateList= \App\State::lists('name','name');
            $view->stateListID=\App\State::lists('name','id');
            $view->catList= \App\Cat::lists('name','name');
            $view->catListID=\APP\Cat::lists('name','id');
            $view->subListID=\App\Subcat::lists('name','id');
            $view->featured= \App\Biz::whereFeatured('YES')->paginate(4);
            $view->recent= \App\Biz::orderBy('created_at', 'desc')->paginate(3);
            $view->cats = \App\Cat::all();
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
