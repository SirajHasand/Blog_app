<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds. just for it
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'admin', 'password' => 'admin@123', 'role_id' => $adminRole?->id]
        );

        if (!$user->role_id && $adminRole) {
            $user->update(['role_id' => $adminRole->id]);
        }

        $user->profile()->firstOrCreate([], ['user_pic' => '']);
    }
}
