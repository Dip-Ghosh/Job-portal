<?php

namespace App\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\Base\BaseInterface',
            'App\Repository\Base\BaseRepository'
        );

        $this->app->bind(
            'App\Repository\JobType\JobTypeInterface',
            'App\Repository\JobType\JobTypeRepository'
        );

        $this->app->bind(
            'App\Repository\Job\JobInterface',
            'App\Repository\Job\JobRepository',

        );

        $this->app->bind(
            'App\Repository\Api\LoginRegistrationInterface',
            'App\Repository\Api\LoginRegistrationRepository'
            ,

        );

        $this->app->bind(
            'App\Repository\JobApplication\JobApplicationInterface',
            'App\Repository\JobApplication\JobApplicationRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
