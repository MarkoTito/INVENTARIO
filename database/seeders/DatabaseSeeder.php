<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'marko tito',
            'email' => 'markojosheptitopena@gmail.com',
            'tipo_User' => 'Agente',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
                'name' => 'jeremy vega',
                'email' => 'jeremyvega@gmail.com',
                'tipo_User' => 'Agente',
                'password' => bcrypt('87654321'),
           
        ]);
        User::factory()->create([
                'name' => 'ricardo Banda nose',
                'email' => 'rbanda@mdsmp.gob.pe',
                'tipo_User' => 'Jefe',
                'password' => bcrypt('muni*2024'),
           
        ]);

        User::factory()->create([
                'name' => 'SOLEDAD KATIA RIVEROS ORTIZ',
                'email' => 'sriveros@mdsmp.gob.pe',
                'tipo_User' => 'Jefe',
                'password' => bcrypt('muni*2025'),
           
        ]);



        // metodo para correr las areas seeder

        $this->call([
            AreasSeeder::class
        ]);
        $this->call([
            SistemasSeeder::class
        ]);

        $this->call(
            [
                Tiposeeder::class
            ]
            );
    }
}
