<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Create the default super-admin account (see config/permission.php).
     */
    public function run(): void
    {
        /** @var array{name: string, email: string, password: string} $admin */
        $admin = config('permission.default_admin');

        $user = User::firstOrCreate(
            ['email' => $admin['email']],
            [
                'name' => $admin['name'],
                'password' => $admin['password'],
                'email_verified_at' => now(),
            ],
        );

        $user->assignRole(Role::SUPER_ADMIN);
    }
}
