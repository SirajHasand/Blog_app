<?php

namespace Database\Seeders;

use App\Models\Setting;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::Create(['phone'=>'0773380002','logo'=>'portfilio.png','facebook'=>'https://facebook/sirajhasand']);
    }
}
