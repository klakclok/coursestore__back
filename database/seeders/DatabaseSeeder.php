<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
        'name' => 'Admin',
        'email' => env('ADMIN_EMAIL', 'admin@mail.com'),
        'password' => bcrypt(env('ADMIN_PASSWORD', '12345678')),
        'email_verified_at' => now(),
    ]);
    }
}
