<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $appointments =  Appointment::with('patient')->where('is_done',false)->take(5)->get();
        $count = $appointments->count() ;
        $requestNow = Appointment::where('register_date',Carbon::today())->count();
        View::share(['acount'=>$count,'appointmets'=>$appointments,'now'=>$requestNow]);
    }
}
