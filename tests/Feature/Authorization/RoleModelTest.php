<?php

use App\Exceptions\ProtectedRoleException;
use App\Models\Role;
use Spatie\Permission\PermissionRegistrar;

beforeEach(fn () => seedPermissions());

test('the super-admin role cannot be deleted', function () {
    Role::findByName(Role::SUPER_ADMIN)->delete();
})->throws(ProtectedRoleException::class);

test('the super-admin role cannot be renamed', function () {
    Role::findByName(Role::SUPER_ADMIN)->update(['name' => 'admin']);
})->throws(ProtectedRoleException::class);

test('isSuperAdmin checks the stored name, not a pending change', function () {
    $role = Role::findByName(Role::SUPER_ADMIN);
    $role->name = 'admin';

    expect($role->isSuperAdmin())->toBeTrue();
});

test('other roles can be renamed and deleted', function () {
    $role = Role::create(['name' => 'editor']);

    $role->update(['name' => 'author']);
    expect($role->fresh()->name)->toBe('author');

    $role->delete();
    expect(Role::find($role->id))->toBeNull();
});

test('spatie resolves roles through the app Role model', function () {
    expect(app(PermissionRegistrar::class)->getRoleClass())->toBe(Role::class);
});
