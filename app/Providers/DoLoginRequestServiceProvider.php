<?php

namespace App\Providers;

use App\Contracts\Requests\DoLogin as Contract;
use App\Http\Requests\DoLoginRequest as Request;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class DoLoginRequestServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(Contract::class,Request::class);
    }
    public function provides():array
    {
        return [Contract::class,Request::class];
    }
}
