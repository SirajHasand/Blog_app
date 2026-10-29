<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// Seeder to create default roles and permissions
class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define all permissions in the system
        $permissions = [
            'post create',   // Create posts
            'post update',   // Update posts
            'post delete',   // Delete posts
            'post restore',  // Restore deleted posts
            'post view',     // View posts
            'user create',   // Create users
            'user update',   // Update users
            'user delete',   // Delete users
            'user view',     // View users
            'role manage',   // Manage roles and permissions
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        // Create admin role with all permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(Permission::all());

        // Create user role with limited permissions
        $user = Role::firstOrCreate(['name' => 'user']);
        $user->syncPermissions(['post create', 'post view']);
    }
}
