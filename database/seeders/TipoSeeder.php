<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\TipoCalzado;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Moda Femenina
        Tipo::create([
            'nombre' =>  'Moda Femenina',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Camisetas',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Blusas y camisas',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Sudadera',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Conjuntos de mujer',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Trajes',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Bodis',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Tanques y camisolas',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Abrigos y chaquetas',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' =>  'Suéteres',
            'idCategoria' => 1
        ]);


        // fondos 
        Tipo::create([
            'nombre' => 'Polainas',
            'idCategoria' => 2
        ]);
        Tipo::create([
            'nombre' => 'Faldas',
            'idCategoria' => 2
        ]);
        Tipo::create([
            'nombre' => 'Pantalones cortos',
            'idCategoria' => 2
        ]);
        Tipo::create([
            'nombre' => 'Pantalones',
            'idCategoria' => 2
        ]);
        Tipo::create([
            'nombre' => 'Pantalones y capri',
            'idCategoria' => 2
        ]);

        // Ropa interior Femenina
        Tipo::create([
            'nombre' => 'Conjuntos de pijama',
            'idCategoria' => 3
        ]);
        Tipo::create([
            'nombre' => 'Sujetadores',
            'idCategoria' => 3
        ]);
        Tipo::create([
            'nombre' => 'Bragas',
            'idCategoria' => 3
        ]);
        Tipo::create([
            'nombre' => 'Calcetines de mujer',
            'idCategoria' => 3
        ]);
        Tipo::create([
            'nombre' => 'Sujetador y conjuntos breves',
            'idCategoria' => 3
        ]);
        Tipo::create([
            'nombre' => 'fajas',
            'idCategoria' => 3
        ]);

        // Traje de baño
        Tipo::create([
            'nombre' => 'Conjuntos de biquini',
            'idCategoria' => 4
        ]);
        Tipo::create([
            'nombre' => 'Cubrirlos',
            'idCategoria' => 4
        ]);

        // Ropa de talla grande
        Tipo::create([
            'nombre' => 'Vestidos de talla grande',
            'idCategoria' => 5
        ]);
        Tipo::create([
            'nombre' => 'Camisetas Tallas Grandes',
            'idCategoria' => 5
        ]);
        Tipo::create([
            'nombre' => 'Conjuntos de tallas grandes',
            'idCategoria' => 5
        ]);
        Tipo::create([
            'nombre' => 'Pantalones y capri de talla grande',
            'idCategoria' => 5
        ]);
        Tipo::create([
            'nombre' => 'Ropa de abrigo de talla grande',
            'idCategoria' => 5
        ]);
        Tipo::create([
            'nombre' => 'Blusas y camisas tallas grandes',
            'idCategoria' => 5
        ]);


        Tipo::create([
            'nombre' => 'Accesorios para el cabello',
            'idCategoria' => 6
        ]);
        Tipo::create([
            'nombre' => 'Gafas de sol',
            'idCategoria' => 6
        ]);
        Tipo::create([
            'nombre' => 'Gafas de bloqueo de luz azul',
            'idCategoria' => 6
        ]);
        Tipo::create([
            'nombre' => 'Gorras de béisbol',
            'idCategoria' => 6
        ]);
        Tipo::create([
            'nombre' => 'Sombreros de pescador',
            'idCategoria' => 6
        ]);
        Tipo::create([
            'nombre' => 'Cinturones',
            'idCategoria' => 6
        ]);

        // Moda Musulmana
        Tipo::create([
            'nombre' => 'Abaya',
            'idCategoria' => 7
        ]);
        Tipo::create([
            'nombre' => 'Hiyab de mujer',
            'idCategoria' => 7
        ]);
        Tipo::create([
            'nombre' => 'conjuntos musulmanes',
            'idCategoria' => 7
        ]);
        Tipo::create([
            'nombre' => 'Sombreros de oración',
            'idCategoria' => 7
        ]);
        Tipo::create([
            'nombre' => '         Vestidos',
            'idCategoria' => 7
        ]);

        // Bodas y eventos
        Tipo::create([
            'nombre' =>  'Vestidos de novia',
            'idCategoria' => 8
        ]);
        Tipo::create([
            'nombre' =>  'Trajes de gala',
            'idCategoria' => 8
        ]);
        Tipo::create([
            'nombre' =>  'Vestidos de noche',
            'idCategoria' => 8
        ]);
        Tipo::create([
            'nombre' =>  'Ropa de África',
            'idCategoria' => 8
        ]);
        Tipo::create([
            'nombre' =>  'Disfraces Cosplay',
            'idCategoria' => 8
        ]);

        // Moda de hombres
        Tipo::create([
            'nombre' => '        Sudadera',
            'idCategoria' => 9
        ]); 
        Tipo::create([
            'nombre' => '        Camisetas',
            'idCategoria' => 9
        ]); 
        Tipo::create([
            'nombre' => '        Camisas',
            'idCategoria' => 9
        ]); 
        Tipo::create([
            'nombre' => '        Pantalones cortos casuales',
            'idCategoria' => 9
        ]); 
        Tipo::create([
            'nombre' => '        Conjuntos de hombres',
            'idCategoria' => 9
        ]); 
        Tipo::create([
            'nombre' => '        Chaquetas',
            'idCategoria' => 9
        ]); 

        //Ropa de abrigos y chaquetas',
        Tipo::create([
            'nombre' => 'Chaquetas',
            'idCategoria' => 10
        ]);
        Tipo::create([
            'nombre' => 'Suéteres',
            'idCategoria' => 10
        ]);
        Tipo::create([
            'nombre' => 'Piel sintética informal.',
            'idCategoria' => 10
        ]);
        Tipo::create([
            'nombre' => 'piel genuina',
            'idCategoria' => 10
        ]);
        Tipo::create([
            'nombre' => 'Parque',
            'idCategoria' => 10
        ]);
        Tipo::create([
            'nombre' => 'Chaquetas de plumas',
            'idCategoria' => 10
        ]);
        Tipo::create([
            'nombre' => 'Trajes y chaqueta',
            'idCategoria' => 10
        ]);


        //Accesorios',

        Tipo::create([
            'nombre' => 'Bufandas',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'Gorros y calaveras',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'Gafas graduadas',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'guantes y mitones',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'Cinturones',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'Sombreros de bombardero',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'Sombreros de fieltro',
            'idCategoria' => 11
        ]);
        Tipo::create([
            'nombre' => 'boinas',
            'idCategoria' => 11
        ]);

        Tipo::create([
            'nombre' => 'Gorras de béisbol',
            'idCategoria' => 11
        ]);


        //Fondos',

        Tipo::create([
            'nombre' => 'Pantalones casuales',
            'idCategoria' => 12
        ]);
        Tipo::create([
            'nombre' => 'Pantalones deportivos',
            'idCategoria' => 12
        ]);
        Tipo::create([
            'nombre' => 'Cargo Pants',
            'idCategoria' => 12
        ]);
        Tipo::create([
            'nombre' => 'Pantalones',
            'idCategoria' => 12
        ]);
        Tipo::create([
            'nombre' => 'Pantalones bombachos',
            'idCategoria' => 12
        ]);
        Tipo::create([
            'nombre' => 'Pantalones cortos',
            'idCategoria' => 12
        ]);


        //Ropa interior',

        Tipo::create([
            'nombre' => 'boxeadores',
            'idCategoria' => 13
        ]);

        Tipo::create([
            'nombre' => 'Bragas',
            'idCategoria' => 13
        ]);

        Tipo::create([
            'nombre' => 'Calzoncillos largos',
            'idCategoria' => 13
        ]);

        Tipo::create([
            'nombre' => 'Dormir y descansar para hombres',
            'idCategoria' => 13
        ]);

        Tipo::create([
            'nombre' => 'Conjuntos de pijama',
            'idCategoria' => 13
        ]);


        //Novedad y uso especial',

        Tipo::create([
            'nombre' => 'Disfraces Cosplay',
            'idCategoria' => 14
        ]);

        Tipo::create([
            'nombre' => 'Desgaste de la etapa y de la danza',
            'idCategoria' => 14
        ]);

        Tipo::create([
            'nombre' => 'Ropa Exótica',
            'idCategoria' => 14
        ]);



        //Telefonos Moviles',

        Tipo::create([
            'nombre' => 'Teléfonos Android',
            'idCategoria' => 15
        ]);

        Tipo::create([
            'nombre' => 'iPhones',
            'idCategoria' => 15
        ]);

        Tipo::create([
            'nombre' => 'Teléfonos con funciones',
            'idCategoria' => 15
        ]);

        Tipo::create([
            'nombre' => 'Teléfonos reacondicionados',
            'idCategoria' => 15
        ]);

        Tipo::create([
            'nombre' => 'RAM de 8GB',
            'idCategoria' => 15
        ]);

        Tipo::create([
            'nombre' => 'Teléfonos 5G',
            'idCategoria' => 15
        ]);


        //Accesorios de telefono',
        Tipo::create([
            'nombre' => 'Estuches y fundas',
            'idCategoria' => 16
        ]);

        Tipo::create([
            'nombre' => 'cabos',
            'idCategoria' => 16
        ]);

        Tipo::create([
            'nombre' => 'Cargadores',
            'idCategoria' => 16
        ]);

        Tipo::create([
            'nombre' => 'Banco de energía',
            'idCategoria' => 16
        ]);

        Tipo::create([
            'nombre' => 'Soportes y Soportes',
            'idCategoria' => 16
        ]);

        Tipo::create([
            'nombre' => 'Protectores de pantalla',
            'idCategoria' => 16
        ]);


        //Accesorios destacados',

        Tipo::create([
            'nombre' => 'Cargadores inalámbricos',
            'idCategoria' => 17
        ]);

        Tipo::create([
            'nombre' => 'Cargadores de coche',
            'idCategoria' => 17
        ]);

        Tipo::create([
            'nombre' => 'Lentes',
            'idCategoria' => 17
        ]);

        Tipo::create([
            'nombre' => 'Adaptadores y convertidores',
            'idCategoria' => 17
        ]);


        //Marcas calientes',

        Tipo::create([
            'nombre' => 'reino',
            'idCategoria' => 18
        ]);

        Tipo::create([
            'nombre' => 'oneplus',
            'idCategoria' => 18
        ]);

        Tipo::create([
            'nombre' => 'HUAWEI',
            'idCategoria' => 18
        ]);

        Tipo::create([
            'nombre' => 'infinito',
            'idCategoria' => 18
        ]);

        Tipo::create([
            'nombre' => 'POCO',
            'idCategoria' => 18
        ]);

        Tipo::create([
            'nombre' => 'MIDIGI',
            'idCategoria' => 18
        ]);


        //Caliente casos y cubiertas',
        Tipo::create([
            'nombre' => 'Casos para iPhone',
            'idCategoria' => 19
        ]);

        Tipo::create([
            'nombre' => 'Casos para Samsung',
            'idCategoria' => 19
        ]);

        Tipo::create([
            'nombre' => 'Casos para Huawei',
            'idCategoria' => 19
        ]);

        Tipo::create([
            'nombre' => 'Casos para Xiaomi',
            'idCategoria' => 19
        ]);

        Tipo::create([
            'nombre' => 'Casos para Meizu',
            'idCategoria' => 19
        ]);

        Tipo::create([
            'nombre' => 'Casos para OPPO',
            'idCategoria' => 19
        ]);


        //Pieza de telefonos moviles',
        Tipo::create([
            'nombre' => 'Teléfono LCD',
            'idCategoria' => 20
        ]);

        Tipo::create([
            'nombre' => 'Baterías de teléfono',
            'idCategoria' => 20
        ]);

        Tipo::create([
            'nombre' => 'Carcasas y Marcos',
            'idCategoria' => 20
        ]);


        //Equipos de comunicacion',
        Tipo::create([
            'nombre' => 'Walkie-talkies',
            'idCategoria' => 21
        ]);

        Tipo::create([
            'nombre' => 'Equipos de fibra óptica',
            'idCategoria' => 21
        ]);

        Tipo::create([
            'nombre' => 'Antenas de comunicaciones',
            'idCategoria' => 21
        ]);



        //Componentes y periféricos', 
        Tipo::create([
            'nombre' => 'CPU',
            'idCategoria' => 22
        ]);

        Tipo::create([
            'nombre' => 'placas base',
            'idCategoria' => 22
        ]);

        Tipo::create([
            'nombre' => 'Tarjetas gráficas',
            'idCategoria' => 22
        ]);

        Tipo::create([
            'nombre' => 'Ratones',
            'idCategoria' => 22
        ]);

        Tipo::create([
            'nombre' => 'Teclados',
            'idCategoria' => 22
        ]);


        //Protección de seguridad', 
        Tipo::create([
            'nombre' => 'Artículos de vigilancia',
            'idCategoria' => 23
        ]);

        Tipo::create([
            'nombre' => 'Sistemas de control de acceso',
            'idCategoria' => 23
        ]);

        Tipo::create([
            'nombre' => 'Detectores de humo',
            'idCategoria' => 23
        ]);

        Tipo::create([
            'nombre' => 'Equipo de seguridad',
            'idCategoria' => 23
        ]);

        Tipo::create([
            'nombre' => 'Alarmas y sensores',
            'idCategoria' => 23
        ]);

        Tipo::create([
            'nombre' => 'Sistemas de intercomunicación de puerta',
            'idCategoria' => 23
        ]);



        //Electrónica de oficina', 
        Tipo::create([
            'nombre' => 'Impresoras 3D',
            'idCategoria' => 24
        ]);

        Tipo::create([
            'nombre' => 'Piezas y accesorios para impresoras 3D',
            'idCategoria' => 24
        ]);

        Tipo::create([
            'nombre' => 'Impresoras',
            'idCategoria' => 24
        ]);

        Tipo::create([
            'nombre' => 'Piezas de la impresora',
            'idCategoria' => 24
        ]);

        Tipo::create([
            'nombre' => 'Escáneres',
            'idCategoria' => 24
        ]);

        Tipo::create([
            'nombre' => 'Cartuchos de tinta',
            'idCategoria' => 24
        ]);

        Tipo::create([
            'nombre' => 'Materiales de impresión 3D',
            'idCategoria' => 24
        ]);


        //Portatiles', 
        Tipo::create([
            'nombre' => 'Portátiles para juegos',
            'idCategoria' => 25
        ]);

        Tipo::create([
            'nombre' => 'Portátiles ultradelgados',
            'idCategoria' => 25
        ]);

        Tipo::create([
            'nombre' => 'tabletas',
            'idCategoria' => 25
        ]);

        Tipo::create([
            'nombre' => 'Accesorios para portátiles',
            'idCategoria' => 25
        ]);

        Tipo::create([
            'nombre' => 'Accesorios para tabletas',
            'idCategoria' => 25
        ]);

        Tipo::create([
            'nombre' => 'Bolsas y estuches para portátiles',
            'idCategoria' => 25
        ]);


        //Dispositivos de almacenamiento', 
        Tipo::create([
            'nombre' => 'Unidades flash USB',
            'idCategoria' => 26
        ]);

        Tipo::create([
            'nombre' => 'Tarjetas de memoria',
            'idCategoria' => 26
        ]);

        Tipo::create([
            'nombre' => 'Discos duros externos',
            'idCategoria' => 26
        ]);

        Tipo::create([
            'nombre' => 'Cajas de caja HDD',
            'idCategoria' => 26
        ]);

        Tipo::create([
            'nombre' => 'SSD',
            'idCategoria' => 26
        ]);


        //Redes de computadoras', 
        Tipo::create([
            'nombre' => 'Enrutadores inalámbricos',
            'idCategoria' => 27
        ]);

        Tipo::create([
            'nombre' => 'Tarjetas de red',
            'idCategoria' => 27
        ]);

        Tipo::create([
            'nombre' => 'módems 3G',
            'idCategoria' => 27
        ]);

        Tipo::create([
            'nombre' => 'Combinaciones de módem-router',
            'idCategoria' => 27
        ]);

        Tipo::create([
            'nombre' => 'Herramientas de red',
            'idCategoria' => 27
        ]);




        //Accesorios y piezas',

        Tipo::create([
            'nombre' => 'Cables y adaptadores',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Cigarrillos electrónicos',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Baterías',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Cargadores',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Accesorios electrónicos para el hogar',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Bolsas y estuches',
            'idCategoria' => 28
        ]);


        //Cámara y foto ',
        Tipo::create([
            'nombre' => 'Cámaras digitales',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Videocámaras',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Drones con cámara',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Cámaras de acción',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Suministros de estudio fotográfico',
            'idCategoria' => 28
        ]);

        Tipo::create([
            'nombre' => 'Accesorios para cámaras y fotos',
            'idCategoria' => 28
        ]);


        //Electrónica inteligente ',

        Tipo::create([
            'nombre' => 'Dispositivos portátiles',
            'idCategoria' => 29
        ]);

        Tipo::create([
            'nombre' => 'Electrodomésticos inteligentes',
            'idCategoria' => 29
        ]);

        Tipo::create([
            'nombre' => 'Accesorios portátiles inteligentes',
            'idCategoria' => 29
        ]);

        Tipo::create([
            'nombre' => 'Controles remotos inteligentes',
            'idCategoria' => 29
        ]);

        Tipo::create([
            'nombre' => 'Relojes inteligentes',
            'idCategoria' => 29
        ]);

        Tipo::create([
            'nombre' => 'Pulseras inteligentes',
            'idCategoria' => 29
        ]);


        //Audio y vídeo domestico ',

        Tipo::create([
            'nombre' => 'Televisores',
            'idCategoria' => 30
        ]);

        Tipo::create([
            'nombre' => 'Receptores de TV',
            'idCategoria' => 30
        ]);

        Tipo::create([
            'nombre' => 'Proyectores',
            'idCategoria' => 30
        ]);

        Tipo::create([
            'nombre' => 'Tableros amplificadores de audio',
            'idCategoria' => 30
        ]);

        Tipo::create([
            'nombre' => 'palos de televisión',
            'idCategoria' => 30
        ]);


        //Audio y vídeo portátil ',
        Tipo::create([
            'nombre' => 'Auriculares y auriculares',
            'idCategoria' => 31
        ]);

        Tipo::create([
            'nombre' => 'Altavoces',
            'idCategoria' => 31
        ]);

        Tipo::create([
            'nombre' => 'Reproductores de mp3',
            'idCategoria' => 31
        ]);

        Tipo::create([
            'nombre' => 'Micrófonos',
            'idCategoria' => 31
        ]);

        Tipo::create([
            'nombre' => 'Dispositivos VR/AR',
            'idCategoria' => 31
        ]);


        //Video juegos ',
        Tipo::create([
            'nombre' => 'Consolas de juegos',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Jugadores de juegos portátiles',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Controladores de juegos',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Cargadores',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Volante',
            'idCategoria' => 32
        ]);



        //Joyería fina',

        Tipo::create([
            'nombre' => '925 joyas de plata',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'joyas de diamantes',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Joyería de perlas',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'piedras preciosas',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'K-joyas de oro',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Aretes Finos',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Conjuntos de joyería fina',
            'idCategoria' => 32
        ]);

        Tipo::create([
            'nombre' => 'Joyería fina para hombres',
            'idCategoria' => 32
        ]);


        //Relojes de hombre ',
        Tipo::create([
            'nombre' => 'Relojes mecánicos',
            'idCategoria' => 33
        ]);

        Tipo::create([
            'nombre' => 'Relojes de cuarzo',
            'idCategoria' => 33
        ]);

        Tipo::create([
            'nombre' => 'Relojes digitales',
            'idCategoria' => 33
        ]);

        Tipo::create([
            'nombre' => 'Relojes de doble pantalla',
            'idCategoria' => 33
        ]);

        Tipo::create([
            'nombre' => 'Relojes deportivos',
            'idCategoria' => 33
        ]);


        //Joyería de moda ',

        Tipo::create([
            'nombre' => 'Collares y Pendientes',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Anillos de moda',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Pendientes de moda',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Pulseras y brazaletes',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Gemelos para hombre',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Conjuntos de joyería de moda',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Encantos',
            'idCategoria' => 35
        ]);

        Tipo::create([
            'nombre' => 'Joyas para el cuerpo',
            'idCategoria' => 35
        ]);


        //Boda y compromiso',
        Tipo::create([
            'nombre' => 'Conjuntos de joyería nupcial',
            'idCategoria' => 36
        ]);

        Tipo::create([
            'nombre' => 'Anillos de compromiso',
            'idCategoria' => 36
        ]);

        Tipo::create([
            'nombre' => 'Joyas para el cabello de la boda',
            'idCategoria' => 36
        ]);


        //Relojes de mujer',

        Tipo::create([
            'nombre' => 'Relojes de pulsera para mujer',
            'idCategoria' => 37
        ]);

        Tipo::create([
            'nombre' => 'Relojes elegantes',
            'idCategoria' => 37
        ]);

        Tipo::create([
            'nombre' => 'Relojes Románticos',
            'idCategoria' => 37
        ]);

        Tipo::create([
            'nombre' => 'Relojes deportivos',
            'idCategoria' => 37
        ]);

        Tipo::create([
            'nombre' => 'Relojes innovadores',
            'idCategoria' => 37
        ]);


        //Cuentas y joyerias',
        Tipo::create([
            'nombre' => 'Rosario',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Hallazgos y componentes de joyería',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Empaques y expositores de joyas',
            'idCategoria' => 1
        ]);



        //Artes, Manualidades y Costura ',

        Tipo::create([
            'nombre' => 'Suministros de tela y costura',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Artes y manualidades con agujas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Álbumes de recortes y sellos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pintar por número',
            'idCategoria' => 1
        ]);


        //Celebraciones ',
        Tipo::create([
            'nombre' => 'Eventos y fiestas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Globos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Flores artificiales y secas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Suministros de boda',
            'idCategoria' => 1
        ]);


        //Cocina ',
        Tipo::create([
            'nombre' => 'Utensilios para hornear',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Vasos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Utensilios de cocina y artilugios',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Vajilla',
            'idCategoria' => 1
        ]);


        //Decoraciones del hogar',
        Tipo::create([
            'nombre' => 'Decoración de pared',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'jarrones',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Figuras y miniaturas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Velas y titulares',
            'idCategoria' => 1
        ]);


        //Almacenamiento en el hogar',
        Tipo::create([
            'nombre' => 'Cajas y contenedores de almacenamiento',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Soportes y bastidores',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Organizadores de cocina',
            'idCategoria' => 1
        ]);


        //Jardin y Mascota',
        Tipo::create([
            'nombre' => 'Suministros para gatos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Muebles y Rascadores',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Suministros inteligentes para mascotas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Juguetes para perros',
            'idCategoria' => 1
        ]);


        //Casa de textiles',
        Tipo::create([
            'nombre' => 'Juegos de cama',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Mantas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Fundas de sofá',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Alfombras',
            'idCategoria' => 1
        ]);


        //Articulo para el hogar',
        Tipo::create([
            'nombre' => 'Paraguas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Juegos de accesorios de baño',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas de limpieza',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cubiertas antipolvo',
            'idCategoria' => 1
        ]);


        //Muebles',
        Tipo::create([
            'nombre' => 'Mueble del salón',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Muebles de oficina',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Mueble para exteriores',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Muebles de cocina',
            'idCategoria' => 1
        ]);



        //Maletas y bolsos de mujer',
        Tipo::create([
            'nombre' => 'Mochilas con estilo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Todas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Bolsas de hombro',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Carteras',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Bolsos de noche',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Embragues',
            'idCategoria' => 1
        ]);


        //Maletas y bolsos de hombre ',

        Tipo::create([
            'nombre' => 'Mochilas para hombre',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Bolsos cruzados',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Maletines',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Equipaje y bolsas de viaje',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Carteras',
            'idCategoria' => 1
        ]);


        //Otras bolsas y accesorios ',
        Tipo::create([
            'nombre' => 'Bolsos para niños y bebés',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Bolsas de cosméticos y estuches',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Carteras y tarjeteros',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Fundas para equipaje',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Fundas para pasaporte',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Piezas y accesorios para bolsas',
            'idCategoria' => 1
        ]);


        //Zapatos de mujer ',
        Tipo::create([
            'nombre' => 'Sandalias de mujer',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pisos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Tacones altos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas Vulcanizadas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas de casa',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Botas',
            'idCategoria' => 1
        ]);


        //Zapatos de hombre ',
        Tipo::create([
            'nombre' => 'Zapatos casuales',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas Vulcanizadas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sandalias de hombre',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Mocasines',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Chancletas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Botas',
            'idCategoria' => 1
        ]);


        //Zapatos más vendidos ',
        Tipo::create([
            'nombre' => 'Sandalias de cuña',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Tacones Clásicos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pisos Grandes',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas de interior',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas de deporte de moda',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sandalias cómodas',
            'idCategoria' => 1
        ]);



        //Categorías calientes',
        Tipo::create([
            'nombre' => 'Vestidos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'juegos de ropa',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Trajes familiares a juego',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sudadera',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Ropa de dormir y batas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatos de niños',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cochecitos de bebé',
            'idCategoria' => 1
        ]);


        //Para chicas ',
        Tipo::create([
            'nombre' => 'Vestidos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Camisetas y tops',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Abrigos y chamarras',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Ropa de dormir y batas',
            'idCategoria' => 1
        ]);


        //Control remoto ',
        Tipo::create([
            'nombre' => 'Helicópteros RC',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Coches RC',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cuadricóptero RC',
            'idCategoria' => 1
        ]);


        //Bebé (0-3 años)',
        Tipo::create([
            'nombre' => 'Mamelucos de bebé',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Conjunto de ropa de bebé',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Los primeros andadores del bebé',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Accesorios para bebés',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Alimentación',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Lecho',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Artículos para la dentición del bebé',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Juguetes para bebés y niños pequeños',
            'idCategoria' => 1
        ]);


        //Para chicos ',
        Tipo::create([
            'nombre' => 'Camisetas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Abrigos y chamarras',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pantalones',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sudadera',
            'idCategoria' => 1
        ]);


        //Juguetes de construcción y construcción ',
        Tipo::create([
            'nombre' => 'bloques',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Juguetes de construcción modelo',
            'idCategoria' => 1
        ]);


        //Artículos para madre y bebé',
        Tipo::create([
            'nombre' => 'Ropa de maternidad',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'extractores de leche eléctricos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Recuerdos de bebé',
            'idCategoria' => 1
        ]);


        //Juguetes y Pasatiempos',
        Tipo::create([
            'nombre' => 'Juguetes para apretar',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Figuras de acción y juguete',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'muñecas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Animales de peluche y felpa',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Diecast y vehículos de juguete',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Tarjetas de colección de juegos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pegatinas',
            'idCategoria' => 1
        ]);



        //Natación ',
        Tipo::create([
            'nombre' => 'Natación',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Trajes de una pieza',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Trajes de dos piezas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cubrirlos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Trajes de baño para hombres',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Trajes de baño para niños',
            'idCategoria' => 1
        ]);


        //Zapatillas ',
        Tipo::create([
            'nombre' => 'Zapatos para correr',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatos de senderismo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatos de soccer',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas para skateboard',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatos de baile',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatos de baloncesto',
            'idCategoria' => 1
        ]);


        //Ropa de deporte ',
        Tipo::create([
            'nombre' => 'camisetas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Chaquetas de senderismo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pantalones',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pantalones cortos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Bolsas de deporte',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Accesorios deportivos',
            'idCategoria' => 1
        ]);


        //Ciclismo ',
        Tipo::create([
            'nombre' => 'Bicicletas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'cuadros de bicicleta',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Luces de bicicleta',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cascos de bicicleta',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Maillots de ciclismo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Gafas de ciclismo',
            'idCategoria' => 1
        ]);


        //Pescar ',
        Tipo::create([
            'nombre' => 'Carretes de pesca',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Señuelos de pesca',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Líneas de pesca',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cañas de pescar',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Combinaciones de varillas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cajas de aparejos de pesca',
            'idCategoria' => 1
        ]);


        //Otros equipos deportivos ',
        Tipo::create([
            'nombre' => 'Campamento y Senderismo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Caza',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Golf',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Fitness y culturismo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Esquí y Snowboard',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Instrumentos musicales',
            'idCategoria' => 1
        ]);



        //        Tejidos para el cabello ',
        Tipo::create([
            'nombre' => 'Paquetes Con Cierre',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => '3/4 paquetes',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Tejidos precoloreados',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cierres',
            'idCategoria' => 1
        ]);


        //        pelucas ',
        Tipo::create([
            'nombre' => ' Pelucas delanteras de encaje',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Pelucas de máquina completa',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => '360 pelucas de encaje',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pelucas de encaje parcial',
            'idCategoria' => 1
        ]);


        //        cabello sintético ',
        Tipo::create([
            'nombre' => 'Pelucas de encaje sintético',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pelucas desde US $1
                ]);0',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'trenzas de pelo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Pelo De Ganchillo',
            'idCategoria' => 1
        ]);


        //        Maquillaje ',
        Tipo::create([
            'nombre' => ' Ojos',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Labios',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cara',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas de maquillaje',
            'idCategoria' => 1
        ]);


        //        Cuidado de la salud ',
        Tipo::create([
            'nombre' => ' Monitores de salud domésticos',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Lentes de contacto',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Atención médica personal',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Audífonos',
            'idCategoria' => 1
        ]);


        //        Protección de la piel ',
        Tipo::create([
            'nombre' => 'Cara',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Ojos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cuerpo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas para el cuidado de la piel',
            'idCategoria' => 1
        ]);


        //        Arte de uñas y herramientas ',
        Tipo::create([
            'nombre' => 'Esmalte de uñas de gel',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Taladros de uñas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Secadores de uñas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'brillo de uñas',
            'idCategoria' => 1
        ]);


        //        Cuidado personal ',
        Tipo::create([
            'nombre' => 'Cuidado del cabello y peinado',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Afeitado y Depilación',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Higiene oral',
            'idCategoria' => 1
        ]);


        //        Masaje y Relajación ',
        Tipo::create([
            'nombre' => 'Diadema de pistola',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Equipo de masaje de piernas',
            'idCategoria' => 1
        ]);


        //        Artículos para adultos ',
        Tipo::create([
            'nombre' => ' condones',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Lubricantes',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Vibradores',
            'idCategoria' => 1
        ]);



        //Piezas de repuesto para automóviles ',
        Tipo::create([
            'nombre' => 'Luces del coche',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Piezas interiores',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Piezas exteriores',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Bujías y sistemas de encendido',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sensores de vehículos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sistemas de frenos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Limpia parabrisas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Otras piezas de repuesto',
            'idCategoria' => 1
        ]);


        //Herramientas, mantenimiento y cuidado ',
        Tipo::create([
            'nombre' => 'Lectores de código y herramientas de escaneo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas diagnosticas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas de lavado de autos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cuidado de pintura y pulimentos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Otros productos de mantenimiento',
            'idCategoria' => 1
        ]);


        //Electrónica del coche ',
        Tipo::create([
            'nombre' => 'Reproductores multimedia para coche',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'DVR/cámaras de tablero',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sistemas de alarma y seguridad',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Rastreadores GPS',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Autoradios',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Monitores de coche',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Calentadores y refrigeradores para automóviles',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cámaras de vehículos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sistemas GPS para vehículos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Arrancadores',
            'idCategoria' => 1
        ]);


        //Exterior Accessories ',
        Tipo::create([
            'nombre' => 'Pegatinas de coche',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cubiertas de coche',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Otros accesorios exteriores',
            'idCategoria' => 1
        ]);


        //Accesorios y repuestos para motocicletas ',
        Tipo::create([
            'nombre' => 'Piezas de carrocería y bastidor',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cascos y equipo de protección',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Encendiendo',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sistemas de frenado',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sistemas de escape',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cascos y Auriculares',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Fundas para asientos de motocicletas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Otros accesorios para motocicletas',
            'idCategoria' => 1
        ]);



        //Interior Accessories ',
        Tipo::create([
            'nombre' => ' Cubre asientos',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Soluciones de almacenamiento',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Estuches para llaves de autos',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Cubiertas de volante',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Alfombras de piso',
            'idCategoria' => 1
        ]);



        //Instrumentos 1
        Tipo::create([
            'nombre' => 'Herramientas eléctricas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas manuales',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Herramientas de jardín',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Piezas de herramientas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Juegos de herramientas',
            'idCategoria' => 1
        ]);


        //Iluminación interior ',
        Tipo::create([
            'nombre' => ' Luces de techo',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Luces colgantes',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Downlights',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'candelabros',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Lámparas de pared',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Luces nocturnas',
            'idCategoria' => 1
        ]);


        //Instrumentos 2 ',
        Tipo::create([
            'nombre' => 'Herramientas de medición y análisis',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Máquinas herramientas y accesorios',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Maquinaria para trabajar la madera',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Equipo de soldadura',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Suministros para soldar y soldar',
            'idCategoria' => 1
        ]);


        //Sistemas familiares inteligentes ',
        Tipo::create([
            'nombre' => 'Sistema de control de temperatura inteligente',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sistema de control automático de cortinas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Control de hogar inteligente',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Sensores inteligentes del cuerpo humano',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Riego inteligente',
            'idCategoria' => 1
        ]);


        //Mejoras para el hogar ',
        Tipo::create([
            'nombre' => ' Equipos y suministros eléctricos',
            'idCategoria' => 1
        ]);
        Tipo::create([
            'nombre' => 'Energía solar',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Hardware',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Accesorios de cocina',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Fuentes de energía alternativas',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Zapatillas',
            'idCategoria' => 1
        ]);


        //Iluminación exterior ',
        Tipo::create([
            'nombre' => ' linternas',
            'idCategoria' => 1
        ]);;
        Tipo::create([
            'nombre' => 'Lámparas solares',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Proyectores',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'luces de cadena',
            'idCategoria' => 1
        ]);

        Tipo::create([
            'nombre' => 'Luces subacuáticas',
            'idCategoria' => 1
        ]);


        Tipo::create([
            'nombre' => 'Vino',
            'idCategoria' => 91
        ]);

        Tipo::create([
            'nombre' => 'Cerveza',
            'idCategoria' => 91
        ]);

        Tipo::create([
            'nombre' => 'Ron',
            'idCategoria' => 91
        ]);

        Tipo::create([
            'nombre' => 'Wisky',
            'idCategoria' => 91
        ]);

    }
}
