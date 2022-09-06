<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL', 'admin@mail.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', '12345678')),
            'email_verified_at' => now(),
            'status_id' => User::active()
        ]);
        $user->assignRole(Role::ADMIN);

    }
}
