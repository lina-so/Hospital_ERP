<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Hospital\Events\Doctor\NotifyDoctorOfNewPatientEvent;
use Modules\Hospital\Listeners\Doctor\NotifyDoctorOfNewPatientListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            NotifyDoctorOfNewPatientEvent::class,
            NotifyDoctorOfNewPatientListener::class,
        );
    }
}
