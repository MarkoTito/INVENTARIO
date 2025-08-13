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

        
        
       

        // metodo para correr las areas seeder

        $this->call(DeterminacionSeeder::class);

        $this->call([
            AreasSeeder::class
        ]);
        $this->call([
            SistemasSeeder::class
        ]);
        $this->call([
            EstadoSeeder::class
        ]);
        $this->call([
            RoleSeeder::class
        ]);

        $this->call(
            [
                Tiposeeder::class
            ]
            );
    }
}
