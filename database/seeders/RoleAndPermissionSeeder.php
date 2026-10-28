<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'post create',
            'post update',
            'post delete',
            'post restore',
            'post view',
            'user create',
            'user update',
            'user delete',
            'user view',
            'role manage',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->permissions()->sync(Permission::all()->pluck('id'));

        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->permissions()->sync(Permission::whereIn('name', [
            'post view', 'post create', 'post update', 'post delete', 'post restore',
        ])->pluck('id'));

        $author = Role::firstOrCreate(['name' => 'author']);
        $author->permissions()->sync(Permission::whereIn('name', [
            'post view', 'post create',
        ])->pluck('id'));
    }
}
