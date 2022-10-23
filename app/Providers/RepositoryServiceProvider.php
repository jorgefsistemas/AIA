<?php

namespace App\Providers;

use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Support\ServiceProvider;

/**
* Class RepositoryServiceProvider
* @package App\Providers
*/
class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
   {

       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(EloquentRepositoryInterface::class, EloquentBaseRepository::class);
   }
}
