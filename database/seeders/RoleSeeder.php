<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =[
            //hardware
            'create-hardware',
            'read-hardware',
            'update-hardware',
            'delete-hardware',
            'bajar-hardware',
            //software
            'create-software',
            'read-software',
            'update-software',
            'delete-software',
            'bajar-software',
            //comentario
            'create-comentario',
            'read-comentario',
            'update-comentario',
            'delete-comentario',
            'bajar-comentario'
            
        ];
        foreach ($permissions as $permiso) {
            Permission::create(
                [
                    'name' =>$permiso
                ]
                );
        }

        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'soporte1'])->givePermissionTo(
            //TODOS LOS PERMISOS DE SOPORTE
            'create-hardware',
            'read-hardware',
            'update-hardware',
            'delete-hardware',
            'bajar-hardware',

            'create-comentario',
            'read-comentario',
            'update-comentario',
            'delete-comentario',
            'bajar-comentario'
            
        );
        Role::create(['name' => 'soporte2'])->givePermissionTo(
            //ALGUNOS PERMISOS DE SOPORTE
            'create-hardware',
            'read-hardware',
            //'update-hardware',
            //'delete-hardware',
            //'bajar-hardware',
            'create-comentario',
            'read-comentario',
            //'update-comentario',
            //'delete-comentario',
            //'bajar-comentario'
            
        );
        Role::create(['name' => 'desarrollo'])->givePermissionTo(
            //TODOS LOS PERMISOS DE SOPORTE
            'read-hardware',

            'create-software',
            'read-software',
            'update-software',
            'delete-software',
            'bajar-software',

            'read-comentario',
        );
        User::factory()->create([
            'name' => 'marko tito',
            'email' => 'markojosheptitopena@gmail.com',
        
            'password' => bcrypt('12345678'),
        ])->assignRole('admin'); //esto es gracias al metodo has role q se agrego con la descarga

        User::factory()->create([
                'name' => 'jeremy vega',
                'email' => 'jeremyvega@gmail.com',
                'password' => bcrypt('87654321'),
           
        ])->assignRole('soporte2');
        

    }
}
