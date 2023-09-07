<?php

namespace App\Providers;

use Auth;
use DB;
use Illuminate\Support\ServiceProvider;

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
        //

        view()->composer('*', function ($view){
            if (Auth::check()){
                $broGotAccessMaster = DB::table('access_group_detail')
                    ->join('access_group', 'access_group_detail.access_group_id', '=', 'access_group.id')
                    ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
                    ->select('access_master.name')
                    ->where('access_group.id', '=', Auth::user()->access_group_id)
                    ->get();
            
                $view->with('broGotAccessMaster', $broGotAccessMaster );    
            }
        });  
    }
}
