<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'dashboard.view',
            'queries.view',
            'queries.reply',
            'queries.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => User::ROLE_ADMIN,
            'guard_name' => 'web',
        ]);
        $adminRole->syncPermissions($permissions);

        $admin = User::updateOrCreate(
            ['email' => 'admin@obtainsolutions.com'],
            [
                'name' => 'ObtainSolutions Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        $admin->syncRoles([User::ROLE_ADMIN]);

        ContactMessage::firstOrCreate(
            [
                'email' => 'hello@startup.example',
                'subject' => 'Need a Laravel SaaS MVP',
            ],
            [
                'name' => 'Ayesha Khan',
                'phone' => '+92 300 1234567',
                'message' => "We want to build a multi-tenant SaaS for clinic appointments. Looking for a discovery call this week and a 6–8 week MVP estimate.",
                'status' => 'unread',
            ]
        );

        $this->command?->info('Admin login ready.');
        $this->command?->info('Email: admin@obtainsolutions.com');
        $this->command?->info('Password: admin123');
    }
}
