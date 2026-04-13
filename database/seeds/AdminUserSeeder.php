<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@zerimar.com'],
            [
                'name' => 'Admin Zerimar',
                'password' => bcrypt('zerimar2021'),
            ]
        );
    }
}