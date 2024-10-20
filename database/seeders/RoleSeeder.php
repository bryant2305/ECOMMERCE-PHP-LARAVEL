<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\RolePermission;
use App\Models\Modulos;
use App\Models\Permissions;


class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        #1
        $role1 = new Roles();
        $role1->name = "Admin";
        $role1->description = "Administrator";
        $role1->save();

        foreach (Permissions::all() as $permiso) {
            if ($permiso->id <=4) {
                $rp = new RolePermission();
                $rp->role_id = $role1->id;
                $rp->permission_id = $permiso->id;
                $rp->save();
            }
        }

         #2
         $role2 = new Roles();
         $role2->name = "Vendor";
         $role2->description = "Vendor";
         $role2->save();

         foreach (Permissions::all() as $permiso) {
             if ($permiso->id <= 4 ) {
                 $rp = new RolePermission();
                 $rp->role_id = $role2->id;
                 $rp->permission_id = $permiso->id;
                 $rp->save();
             }
         }
           #3
           $role3 = new Roles();
           $role3->name = "Customer";
           $role3->description = "Customer";
           $role3->save();

           foreach (Permissions::all() as $permiso) {
               if ($permiso->id <= 4 ) {
                   $rp = new RolePermission();
                   $rp->role_id = $role3->id;
                   $rp->permission_id = $permiso->id;
                   $rp->save();
               }
           }
    }
}
