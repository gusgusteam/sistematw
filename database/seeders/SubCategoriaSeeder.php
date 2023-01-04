<?php

namespace Database\Seeders;

use App\Models\SubCategoria;
use Illuminate\Database\Seeder;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategoria::create([
            'nombre' => 'Moda femenina'
        ]);
        SubCategoria::create([
            'nombre' => 'Moda de Hombres'
        ]);
        SubCategoria::create([
            'nombre' => 'Teléfonos y Telecomuniciones'
        ]);
        SubCategoria::create([
            'nombre' => 'Informática , Oficina y Seguridad'
        ]);
        SubCategoria::create([
            'nombre' => 'Electrónica de consumo'
        ]);
        SubCategoria::create([
            'nombre' => 'Joyas y relojes'
        ]);
        SubCategoria::create([
            'nombre' => 'Hogar , mascotas y electrodomesticos'
        ]);
        SubCategoria::create([
            'nombre' => 'Bolsos y Zapatos'
        ]);

        SubCategoria::create([
            'nombre' => 'Juguetes , Niños y Bebés'
        ]);

        SubCategoria::create([
            'nombre' => 'Diversión al aire libre y deportes'
        ]);

        SubCategoria::create([
            'nombre' => 'Belleza, Salud y Cabello'
        ]);

        SubCategoria::create([
            'nombre' => 'Automoviles y motocicletas'
        ]);
        SubCategoria::create([
            'nombre' => 'Herramientas y mejoras para el hogar'
        ]);
        SubCategoria::create([
            'nombre' => 'Bebidas Gaseosas y Lacteos'
        ]);
    }
}
