<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;



class SeederUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
{

    $user = User::create([  'name' => 'Admin',
                            'email' => 'admin@sp.senac.br',
                            'password' => bcrypt('123456789')]);

    $permissions = Permission::pluck('is','id')->all();
    $role = Role::create(['name'=>'Administrador']);

    $role ->syncPermissions($permissions);
    $user -> assignRole([$role->id]);

        
    }
}
