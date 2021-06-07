<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Repositories as RepositoryInterfaces;
use App\Interfaces\Services as ServiceInterfaces;

use App\Repositories as Repositories;
use App\Services as Services;

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
        $this->app->bind(
            RepositoryInterfaces\ClientAppRepositoryInterface::class,
            Repositories\ClientAppRepository::class
        );

        $this->app->bind(
            RepositoryInterfaces\CategoryRepositoryInterface::class,
            Repositories\CategoryRepository::class
        );

        $this->app->bind(
            RepositoryInterfaces\CampaignRepositoryInterface::class,
            Repositories\CampaignRepository::class
        );

        $this->app->bind(
            RepositoryInterfaces\TagRepositoryInterface::class,
            Repositories\TagRepository::class
        );

        $this->app->bind(
            RepositoryInterfaces\PackageRepositoryInterface::class,
            Repositories\PackageRepository::class
        );

        $this->app->bind(
            RepositoryInterfaces\PackageQuestionRepositoryInterface::class,
            Repositories\PackageQuestionRepository::class
        );

        $this->app->bind(
            RepositoryInterfaces\PackageQuestionChoiceRepositoryInterface::class,
            Repositories\PackageQuestionChoiceRepository::class
        );
    }
}
