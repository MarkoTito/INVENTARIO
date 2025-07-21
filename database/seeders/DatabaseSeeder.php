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
            'password' => bcrypt('12345678'),
        ]);
        // metodo para correr las areas seeder

        $this->call([
            AreasSeeder::class
        ]);

        $this->call(
            [
                Tiposeeder::class
            ]
            );
    }
}
