<?php


namespace App\Repositories;


use App\Repositories\Contacts\UserProfileRepository;
use App\Repositories\Contacts\UserRepository;
use App\Repositories\Implementations\EloquentUser;
use App\Repositories\Implementations\EloquentUserProfile;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $toRegister = [
            UserRepository::class => EloquentUser::class,
            UserProfileRepository::class => EloquentUserProfile::class
        ];

        foreach ($toRegister as $contract => $implementation) {
            $this->app->bind($contract, $implementation);
        }
    }
}