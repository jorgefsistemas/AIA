<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use App\Repositories\BaseRepository;
use Illuminate\Support\ServiceProvider;
use app\Repositories\Cancelacion\CancelacionRepository;
use App\Repositories\Cancelacion\CancelaciondosRepository;
use App\Repositories\Cancelacion\ICancelaciondosRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICancelaciondosRepository::class, CancelaciondosRepository::class);
        // $this->app->bind(CancelacionRepository::class, BaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') == 'production') {
            URL::forceScheme('https');
        }
    }
}
