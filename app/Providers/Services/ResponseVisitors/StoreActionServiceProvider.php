<?php

namespace App\Providers\Services\ResponseVisitors;

use App\Contracts\Services\ResponseVisitors\StoreAction;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\ResponseVisitors\StoreAction as Contract;
use App\Services\ResponseVisitors\StoreAction as Visitor;
class StoreActionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(Contract::class , Visitor::class);
    }
    public function provides():array
    {
        return [Contract::class];
    }
}
