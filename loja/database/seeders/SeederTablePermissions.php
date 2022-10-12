<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
   
        $permissions = ['role-list',
                        'role-create',
                        'role-delete',
                        'role-edit',
                        'clienteclientes-list',
                        'clientes-edit',
                        'clientes-create',
                        'clientes-delete',
                        'produtos-list',
                        'produtos-edit',
                        'produtos-create',
                        'produtos-delete',
                        'user-list',
                        'user-edit',
                        'user-create',
                        'user-delete'
        ];



        foreach($permissions as $permission){
                Permission::create(['name' => $permission]);
            }
        }
}
