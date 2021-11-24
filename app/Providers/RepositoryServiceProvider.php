<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Contracts\VarietyContract;
use App\Repositories\VarietyRepository;
use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;
use App\Contracts\AttributeValueContract;
use App\Repositories\AttributeValueRepository;



class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
         VarietyContract::class            =>          VarietyRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        AttributeValueContract::class        =>         AttributeValueRepository::class,
    ];
    
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}