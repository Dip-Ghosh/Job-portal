<?php

namespace App\Repository;

use App\Repository\Base\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('App\Repository\Base\WriteAbleInterface', BaseRepository::class);
        $this->app->bind('App\Repository\Base\ReadAbleInterface', BaseRepository::class);

        $this->app->bind('App\Repository\Backend\OrganizationInterface',
            'App\Repository\Backend\OrganizationRepository');
        $this->app->bind('App\Repository\Backend\IndustryInterface',
            'App\Repository\Backend\IndustryRepository');
        $this->app->bind('App\Repository\Backend\LocationInterface',
            'App\Repository\Backend\LocationRepository');
        $this->app->bind('App\Repository\Backend\JobTitleInterface',
            'App\Repository\Backend\JobTitleRepository');
        $this->app->bind('App\Repository\Backend\CompanyInterface',
            'App\Repository\Backend\CompanyRepository');

        $this->app->bind('App\Repository\Job\JobInterface',
            'App\Repository\Job\JobRepository');
        $this->app->bind('App\Repository\Api\LoginRegistrationInterface',
            'App\Repository\Api\LoginRegistrationRepository');
        $this->app->bind('App\Repository\JobApplication\JobApplicationInterface',
            'App\Repository\JobApplication\JobApplicationRepository');

    }

    public function boot()
    {
        //
    }
}
