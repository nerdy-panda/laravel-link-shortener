<?php

namespace App\Services;
use App\Contracts\PermissionsFlyWeightContract as Contract;
use App\Contracts\UserableContract as User;
use Illuminate\Database\Eloquent\Collection;

class PermissionsFlyWeightService implements Contract
{
    protected array $permissions;
    /**
     * @var \App\Models\User $user
     */
    protected User $user;

    public function getPermissions(): array
    {
        $isLoadedPermissions = $this->user->relationLoaded('permissions');
        if (!$isLoadedPermissions){
            if (!isset($this->permissions))
                return $this->permissions = [];
            else
                return $this->permissions;
        }
        /** @var Collection $permissions */
        $permissions = $this->user->permissions;
        if ($permissions->isEmpty()){
            if (isset($this->permissions))
                return $this->permissions;
            else
                return $this->permissions = [];
        }
        if (isset($this->permissions) and !empty($this->permissions))
            return $this->permissions;
        return $this->permissions = $permissions->map->name->toArray();
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}