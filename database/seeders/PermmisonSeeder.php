<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\DepartamentoController;
use Illuminate\Database\Seeder;
use App\Models\Permissions;


class PermmisonSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $servicio = new Permissions();
       $servicio -> name = 'read';
       $servicio -> description = 'Read';
       $servicio ->save();

       $servicio = new Permissions();
       $servicio -> name = 'create';
       $servicio -> description = 'Create';
       $servicio ->save();

       $servicio = new Permissions();
       $servicio -> name = 'edit';
       $servicio -> description = 'Edit';
       $servicio ->save();

       $servicio = new Permissions();
       $servicio -> name = 'delete';
       $servicio -> description = 'Delete';
       $servicio ->save();

    }
}
