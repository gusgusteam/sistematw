<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'descripcion' => 'Vino Tinto Viña de valbo',
            'idTipo' => 466,
            'imagen' => 'imagenes/binotinto.png',
        ]);

        Producto::create([
            'descripcion' => 'Vino Blanco Viña de valbo',
            'imagen' => 'imagenes/binoblanco.png',
            'idTipo' => 466,
        ]);

        Producto::create([
            'descripcion' => 'Huari Lata',
            'idTipo' => 467,
            'imagen' => 'imagenes/huari.png',
        ]);

        Producto::create([
            'descripcion' => 'Paceña Lata pequeña',
            'idTipo' => 467,
            'imagen' => 'imagenes/Paceña_en_Lata.png',
        ]);

        Producto::create([
            'descripcion' => 'Paceña Lata grande',
            'idTipo' => 467,
            'imagen' => 'imagenes/lata_grande.png',
        ]);

        Producto::create([
            'descripcion' => 'Heiniken Lata Grande',
            'idTipo' => 467,
            'imagen' => 'imagenes/heneyken.jpg',
        ]);
    }
}
