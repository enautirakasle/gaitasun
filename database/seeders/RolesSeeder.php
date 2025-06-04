<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAlumno = Role::create(['name' => 'alumno']);
        $roleProfesor = Role::create(['name' => 'profesor']);

        User::where('name', 'admin')->first()->assignRole($roleAdmin);
        User::where('name', 'alumno')->first()->assignRole($roleAlumno);
        User::where('name', 'profesor')->first()->assignRole($roleProfesor);


    }
}
