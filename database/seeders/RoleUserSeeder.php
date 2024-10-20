<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoleUser;


class RoleUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        #1
        $roleuser = new RoleUser();
        $roleuser->user_id = 1;
        $roleuser->role_id = 1;
        $roleuser->save();

        #2
        $role2user = new RoleUser();
        $role2user->user_id = 2;
        $role2user->role_id = 2;
        $role2user->save();

    }
}
