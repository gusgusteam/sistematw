<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesAndPermissions::class);
        $this->call(SubCategoriaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(AlmacenSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
