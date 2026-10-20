<?php

namespace App\Models;

use App\Exceptions\ProtectedRoleException;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * @property int $id
 * @property string $name
 * @property string $guard_name
 */
class Role extends SpatieRole
{
    /**
     * Users with this role pass every Gate check (see AppServiceProvider).
     */
    public const SUPER_ADMIN = 'super-admin';

    /**
     * Guard the super-admin role at the model level, because Gate::before
     * lets super-admins skip policies entirely.
     */
    protected static function booted(): void
    {
        static::deleting(function (Role $role) {
            if ($role->isSuperAdmin()) {
                throw ProtectedRoleException::cannotDelete($role->name);
            }
        });

        static::updating(function (Role $role) {
            if ($role->isDirty('name') && $role->getOriginal('name') === self::SUPER_ADMIN) {
                throw ProtectedRoleException::cannotRename(self::SUPER_ADMIN);
            }
        });
    }

    public function isSuperAdmin(): bool
    {
        return $this->getOriginal('name', $this->name) === self::SUPER_ADMIN;
    }
}
