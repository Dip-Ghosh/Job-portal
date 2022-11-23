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

        $this->app->bind('App\Repository\Organization\OrganizationInterface', 'App\Repository\Organization\OrganizationRepository');
        $this->app->bind('App\Repository\Industry\IndustryInterface', 'App\Repository\Industry\IndustryRepository');
        $this->app->bind('App\Repository\Location\LocationInterface', 'App\Repository\Location\LocationRepository');
        $this->app->bind('App\Repository\JobTitle\JobTitleInterface', 'App\Repository\JobTitle\JobTitleRepository');

        $this->app->bind('App\Repository\Job\JobInterface', 'App\Repository\Job\JobRepository');
        $this->app->bind('App\Repository\Api\LoginRegistrationInterface', 'App\Repository\Api\LoginRegistrationRepository');
        $this->app->bind('App\Repository\JobApplication\JobApplicationInterface', 'App\Repository\JobApplication\JobApplicationRepository');

    }

    public function boot()
    {
        //
    }
}
