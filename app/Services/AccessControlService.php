<?php

namespace App\Services;

use App\Models\User;

class AccessControlService
{
    private array $cache = [];

    public function hasPermission(User $user, string $permissionName): bool
    {
        $cacheKey = $user->id . '_' . $permissionName;

        // 1. Check if we already looked this up during this page load (Singleton Cache)
        if (isset($this->cache[$cacheKey])) {
            return $this->cache[$cacheKey];
        }

        // 2. Look it up in the Database (Eager load permissions to be fast)
        $roles = $user->roles()->with('permissions')->get();

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name === $permissionName) {
                    $this->cache[$cacheKey] = true; // Save to cache
                    return true;
                }
            }
        }

        $this->cache[$cacheKey] = false; // Save failure to cache
        return false;
    }
}
