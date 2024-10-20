<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->name ='admin';
        $user->role_id = 1; // Admin
        $user->email = env('DEFAULT_ADMIN_USER_EMAIL');
        $user->password = bcrypt(env('DEFAULT_ADMIN_USER_PASS'));
        $user->save();

        $user2 = new User();
        $user2->name ='vendor';
        $user2->role_id = 2; // Vendor
        $user2->email = env('DEFAULT_VENDOR_USER_EMAIL');
        $user2->password = bcrypt(env('DEFAULT_VENDOR_USER_PASS'));
        $user2->save();
    }
}
