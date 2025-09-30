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
            'bajar-comentario',
            //movimientos
            'read-movimientos',
            //agrregar
            'create-agregar',
            
            
        ];
        foreach ($permissions as $permiso) {
            Permission::create(
                [
                    'name' =>$permiso
                ]
                );
        }



        Role::create(['name' => 'nivel1'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'nivel2'])->givePermissionTo(
            //TODOS LOS PERMISOS DE SOPORTE
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
            'bajar-comentario',
          

            
        );
        Role::create(['name' => 'nivel3'])->givePermissionTo(
            'create-hardware',
            'read-hardware',
            
            //software
            'create-software',
            'read-software',
            
            //comentario
            'create-comentario',
            'read-comentario',            
        );
    
        User::factory()->create([
            'name' => 'marko',
            'lastname'=> 'tito',
            'email' => 'markojosheptitopena@gmail.com',
        
            'password' => bcrypt('12345678'),
        ])->assignRole('nivel1'); //esto es gracias al metodo has role q se agrego con la descarga

        User::factory()->create([
                'name' => 'JEREMY',
                'lastname' => 'VEGA',
                'email' => 'jeremy22vb@gmail.com',
                'password' => bcrypt('Muni*2025'),
           
        ])->assignRole('nivel2');

        User::factory()->create([
                'name' => 'CLAUDIO',
                'lastname' => 'VILCHEZ',
                'email' => 'cj72929740@gmail.com',
                'password' => bcrypt('Muni*2025'),
           
        ])->assignRole('nivel2');

        User::factory()->create([
                'name' => 'MIGUEL',
                'lastname' => 'ARANDA',
                'email' => 'mcardenasakm7@gmail.com',
                'password' => bcrypt('Muni*2025'),
           
        ])->assignRole('nivel2');

        User::factory()->create([
                'name' => 'ALVARO',
                'lastname' => 'ALBA',
                'email' => 'caracino63@gmail.com',
                'password' => bcrypt('Muni*2025'),
           
        ])->assignRole('nivel3');
        

    }
}
