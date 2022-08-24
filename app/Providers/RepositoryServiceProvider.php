<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Group;
use App\Models\Inventory;
use App\Models\Nursery;
use App\Models\Specie;
use App\Models\Type;
use App\Models\User;
use App\Repositories\Contracts\CityRepository;
use App\Repositories\Contracts\GroupRepository;
use App\Repositories\Contracts\InventoryRepository;
use App\Repositories\Contracts\NurseryRepository;
use App\Repositories\Contracts\SpecieRepository;
use App\Repositories\Contracts\TypeRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\EloquentCityRepository;
use App\Repositories\EloquentGroupRepository;
use App\Repositories\EloquentInventoryRepository;
use App\Repositories\EloquentNurseryRepository;
use App\Repositories\EloquentSpecieRepository;
use App\Repositories\EloquentTypeRepository;
use App\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class  RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( GroupRepository::class, function () {
            return new EloquentGroupRepository( new Group() );
        } );

        $this->app->bind( TypeRepository::class, function () {
            return new EloquentTypeRepository( new Type() );
        } );

        $this->app->bind( InventoryRepository::class, function () {
            return new EloquentInventoryRepository( new Inventory() );
        } );

        $this->app->bind( NurseryRepository::class, function () {
            return new EloquentNurseryRepository( new Nursery() );
        } );

        $this->app->bind( SpecieRepository::class, function () {
            return new EloquentSpecieRepository( new Specie() );
        } );

        $this->app->bind( CityRepository::class, function () {
            return new EloquentCityRepository( new City() );
        } );

        $this->app->bind( UserRepository::class, function () {
            return new EloquentUserRepository( new User() );
        } );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Group::class,
            User::class,
            Specie::class,
            Nursery::class,
            Inventory::class,
            City::class,
            Type::class,
        ];
    }
}
