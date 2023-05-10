<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Contracts\Services\Gates\Permission;
use App\Contracts\Services\Gates\Role;
use App\Contracts\Services\Gates\SystemMonitor;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];
    // @todo has duplicated codes for crud gates !!!
    protected $gates = [
        'see-ram-usage' => [SystemMonitor::class,'ramUsage'] ,
        'see-disk-usage' => [SystemMonitor::class,'diskUsage'] ,
        'view-all-permissions' => [Permission::class,'viewAll'] ,
        'create-permission' => [Permission::class , 'create'] ,
        'delete-permission' => [Permission::class , 'delete'] ,
        'edit-permission' => [Permission::class , 'edit'] ,
        'view-all-roles' => [Role::class , 'viewAll'] ,
        'create-role' => [Role::class , 'create'] ,
        'edit-role' => [Role::class , 'edit'] ,
        'delete-role' => [Role::class , 'delete'] ,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(Gate $gateManager): void
    {
        foreach ($this->gates as $gateName=>$gateAction)
            $gateManager->define($gateName,$gateAction);
    }
}
