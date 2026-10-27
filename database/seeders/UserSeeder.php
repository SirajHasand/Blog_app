<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Create the admin user if not present, then ensure a profile exists for them
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'admin', 'password' => 'admin@123']
        );

        $user->profile()->firstOrCreate([], ['user_pic' => '']);
    }
}
