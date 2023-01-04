<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Moda Femenina
        Categoria::create([
            'nombre' => 'Moda femenina',
            'idSubCategoria' => 1
        ]);
        Categoria::create([
            'nombre' => 'Fondos',
            'idSubCategoria' => 1
        ]);
        Categoria::create([
            'nombre' => 'Ropa interior femenina',
            'idSubCategoria' => 1
        ]);
        Categoria::create([
            'nombre' => 'Traje de baño',
            'idSubCategoria' => 1
        ]);
        Categoria::create([
            'nombre' => 'Ropa de talla grande',
            'idSubCategoria' => 1
        ]);
        Categoria::create([
            'nombre' => 'Accesorios',
            'idSubCategoria' => 1 
        ]);
        Categoria::create([
            'nombre' => 'Moda Musulmana',
            'idSubCategoria' => 1
        ]);
        Categoria::create([
            'nombre' => 'Bodas y eventos',
            'idSubCategoria' => 1
        ]);

        // Moda de hombres
        Categoria::create([
            'nombre' => 'Gran venta',
            'idSubCategoria' => 2


        ]);
        Categoria::create([
            'nombre' => 'Ropa de abrigos y chaquetas',
            'idSubCategoria' => 2
            // Chaquetas
            // Suéteres
            // Piel sintética informal.
            // piel genuina
            // Parque
            // Chaquetas de plumas
            // Trajes y chaqueta
        ]);
        Categoria::create([
            'nombre' => 'Accesorios',
            'idSubCategoria' => 2

            // Bufandas
            // Gorros y calaveras
            // Gafas graduadas
            // guantes y mitones
            // Cinturones
            // Sombreros de bombardero
            // Sombreros de fieltro
            // boinas
            // Gorras de béisbol
        ]);
        Categoria::create([
            'nombre' => 'Fondos',
            'idSubCategoria' => 2

            // Pantalones casuales
            // Pantalones deportivos
            // Cargo Pants
            // Pantalones
            // Pantalones bombachos
            // Pantalones cortos
        ]);
        Categoria::create([
            'nombre' => 'Ropa interior',
            'idSubCategoria' => 2

            // boxeadores
            // Bragas
            // Calzoncillos largos
            // Dormir y descansar para hombres
            // Conjuntos de pijama
        ]);
        Categoria::create([
            'nombre' => 'Novedad y uso especial',
            'idSubCategoria' => 2

            // Disfraces Cosplay
            // Desgaste de la etapa y de la danza
            // Ropa Exótica
        ]);

        // Telefonos y telecomunicaciones
        Categoria::create([
            'nombre' => 'Telefonos Moviles',
            'idSubCategoria' => 3

            // Teléfonos Android
            // iPhones
            // Teléfonos con funciones
            // Teléfonos reacondicionados
            // RAM de 8GB
            // Teléfonos 5G
        ]);
        Categoria::create([
            'nombre' => 'Accesorios de telefono',
            'idSubCategoria' => 3
            // Estuches y fundas
            // cabos
            // Cargadores
            // Banco de energía
            // Soportes y Soportes
            // Protectores de pantalla
        ]);
        Categoria::create([
            'nombre' => 'Accesorios destacados',
            'idSubCategoria' => 3

            // Cargadores inalámbricos
            // Cargadores de coche
            // Lentes
            // Adaptadores y convertidores
        ]);
        Categoria::create([
            'nombre' => 'Marcas calientes',
            'idSubCategoria' => 3

            // reino
            // oneplus
            // HUAWEI
            // infinito
            // POCO
            // MIDIGI
        ]);
        Categoria::create([
            'nombre' => 'Caliente casos y cubiertas',
            'idSubCategoria' => 3
            // Casos para iPhone
            // Casos para Samsung
            // Casos para Huawei
            // Casos para Xiaomi
            // Casos para Meizu
            // Casos para OPPO
        ]);
        Categoria::create([
            'nombre' => 'Pieza de telefonos moviles',
            'idSubCategoria' => 3
            // Teléfono LCD
            // Baterías de teléfono
            // Carcasas y Marcos
        ]);
        Categoria::create([
            'nombre' => 'Equipos de comunicacion',
            'idSubCategoria' => 3
            // Walkie-talkies
            // Equipos de fibra óptica
            // Antenas de comunicaciones
        ]);

        //Informacion oficina y seguridad  
        Categoria::create([
            'nombre' => 'Componentes y periféricos', 
            'idSubCategoria' => 4
            // CPU
            // placas base
            // Tarjetas gráficas
            // Ratones
            // Teclados
        ]);
        Categoria::create([
            'nombre' => 'Protección de seguridad', 
            'idSubCategoria' => 4
            // Artículos de vigilancia
            // Sistemas de control de acceso
            // Detectores de humo
            // Equipo de seguridad
            // Alarmas y sensores
            // Sistemas de intercomunicación de puerta

        ]);
        Categoria::create([
            'nombre' => 'Electrónica de oficina', 
            'idSubCategoria' => 4
            // Impresoras 3D
            // Piezas y accesorios para impresoras 3D
            // Impresoras
            // Piezas de la impresora
            // Escáneres
            // Cartuchos de tinta
            // Materiales de impresión 3D
        ]);
        Categoria::create([
            'nombre' => 'Portatiles', 
            'idSubCategoria' => 4
            // Portátiles para juegos
            // Portátiles ultradelgados
            // tabletas
            // Accesorios para portátiles
            // Accesorios para tabletas
            // Bolsas y estuches para portátiles
        ]);
        Categoria::create([
            'nombre' => 'Dispositivos de almacenamiento', 
            'idSubCategoria' => 4
            // Unidades flash USB
            // Tarjetas de memoria
            // Discos duros externos
            // Cajas de caja HDD
            // SSD
        ]);
        Categoria::create([
            'nombre' => 'Redes de computadoras', 
            'idSubCategoria' => 4
            // Enrutadores inalámbricos
            // Tarjetas de red
            // módems 3G
            // Combinaciones de módem-router
            // Herramientas de red
        ]);


        // Electronica y consumo
        Categoria::create([
            'nombre' => 'Accesorios y piezas',
            'idSubCategoria' => 5

            // Cables y adaptadores
            // Cigarrillos electrónicos
            // Baterías
            // Cargadores
            // Accesorios electrónicos para el hogar
            // Bolsas y estuches
        ]); 
        Categoria::create([
            'nombre' => 'Cámara y foto ',
            'idSubCategoria' => 5
            // Cámaras digitales
            // Videocámaras
            // Drones con cámara
            // Cámaras de acción
            // Suministros de estudio fotográfico
            // Accesorios para cámaras y fotos
        ]);  
        Categoria::create([
            'nombre' => 'Electrónica inteligente ',
            'idSubCategoria' => 5

            // Dispositivos portátiles
            // Electrodomésticos inteligentes
            // Accesorios portátiles inteligentes
            // Controles remotos inteligentes
            // Relojes inteligentes
            // Pulseras inteligentes
        ]);  
        Categoria::create([
            'nombre' => 'Audio y vídeo domestico ',
            'idSubCategoria' => 5

            // Televisores
            // Receptores de TV
            // Proyectores
            // Tableros amplificadores de audio
            // palos de televisión
        ]);  
        Categoria::create([
            'nombre' => 'Audio y vídeo portátil ',
            'idSubCategoria' => 5
            // Auriculares y auriculares
            // Altavoces
            // Reproductores de mp3
            // Micrófonos
            // Dispositivos VR/AR
        ]);  
        Categoria::create([
            'nombre' => 'Video juegos ',
            'idSubCategoria' => 5
            // Consolas de juegos
            // Jugadores de juegos portátiles
            // Controladores de juegos
            // Cargadores
            // Volante
        ]);  

        // Cuentas y joyería de bricolaje 
        Categoria::create([
            'nombre' => 'Joyería fina',
            'idSubCategoria' => 6

            // 925 joyas de plata
            // joyas de diamantes
            // Joyería de perlas
            // piedras preciosas
            // K-joyas de oro
            // Aretes Finos
            // Conjuntos de joyería fina
            // Joyería fina para hombres
        ]);
        Categoria::create([
            'nombre' => 'Relojes de hombre ',
            'idSubCategoria' => 6
            // Relojes mecánicos
            // Relojes de cuarzo
            // Relojes digitales
            // Relojes de doble pantalla
            // Relojes deportivos
        ]);
        Categoria::create([
            'nombre' => 'Joyería de moda ',
            'idSubCategoria' => 6

            // Collares y Pendientes
            // Anillos de moda
            // Pendientes de moda
            // Pulseras y brazaletes
            // Gemelos para hombre
            // Conjuntos de joyería de moda
            // Encantos
            // Joyas para el cuerpo
        ]);
        Categoria::create([
            'nombre' => 'Boda y compromiso',
            'idSubCategoria' => 6
            // Conjuntos de joyería nupcial
            // Anillos de compromiso
            // Joyas para el cabello de la boda
        ]);
        Categoria::create([
            'nombre' => 'Relojes de mujer',
            'idSubCategoria' => 6

            // Relojes de pulsera para mujer
            // Relojes elegantes
            // Relojes Románticos
            // Relojes deportivos
            // Relojes innovadores
        ]);
        Categoria::create([
            'nombre' => 'Cuentas y joyerias',
            'idSubCategoria' => 6
            // Rosario
            // Hallazgos y componentes de joyería
            // Empaques y expositores de joyas
        ]);

        // Hogar, mascotas y electrodomésticos
        Categoria::create([
            'nombre' => 'Artes, Manualidades y Costura ',
            'idSubCategoria' => 7

            // Suministros de tela y costura
            // Artes y manualidades con agujas
            // Álbumes de recortes y sellos
            // Pintar por número
        ]); 
        Categoria::create([
            'nombre' => 'Celebraciones ',
            'idSubCategoria' => 7
            // Eventos y fiestas
            // Globos
            // Flores artificiales y secas
            // Suministros de boda
        ]); 
        Categoria::create([
            'nombre' => 'Cocina ',
            'idSubCategoria' => 7
            // Utensilios para hornear
            // Vasos
            // Utensilios de cocina y artilugios
            // Vajilla
        ]); 
        Categoria::create([
            'nombre' => 'Decoraciones del hogar',
            'idSubCategoria' => 7
            // Decoración de pared
            // jarrones
            // Figuras y miniaturas
            // Velas y titulares
        ]); 
        Categoria::create([
            'nombre' => 'Almacenamiento en el hogar',
            'idSubCategoria' => 7
            // Cajas y contenedores de almacenamiento
            // Soportes y bastidores
            // Organizadores de cocina
        ]); 
        Categoria::create([
            'nombre' => 'Jardin y Mascota',
            'idSubCategoria' => 7
            // Suministros para gatos
            // Muebles y Rascadores
            // Suministros inteligentes para mascotas
            // Juguetes para perros
        ]); 
        Categoria::create([
            'nombre' => 'Casa de textiles',
            'idSubCategoria' => 7
            // Juegos de cama
            // Mantas
            // Fundas de sofá
            // Alfombras
        ]); 
        Categoria::create([
            'nombre' => 'Articulo para el hogar',
            'idSubCategoria' => 7
            // Paraguas
            // Juegos de accesorios de baño
            // Herramientas de limpieza
            // Cubiertas antipolvo
        ]); 
        Categoria::create([
            'nombre' => 'Muebles',
            'idSubCategoria' => 7
            // Mueble del salón
            // Muebles de oficina
            // Mueble para exteriores
            // Muebles de cocina
        ]); 

        // Bolsos y zapatos
        Categoria::create([
            'nombre' => 'Maletas y bolsos de mujer',
            'idSubCategoria' => 8
            // Mochilas con estilo
            // Todas
            // Bolsas de hombro
            // Carteras
            // Bolsos de noche
            // Embragues
        ]);  
        Categoria::create([
            'nombre' => 'Maletas y bolsos de hombre ',
            'idSubCategoria' => 8
        
            // Mochilas para hombre
            // Bolsos cruzados
            // Maletines
            // Equipaje y bolsas de viaje
            // Carteras
        ]); 
        Categoria::create([
            'nombre' => 'Otras bolsas y accesorios ',
            'idSubCategoria' => 8
            // Bolsos para niños y bebés
            // Bolsas de cosméticos y estuches
            // Carteras y tarjeteros
            // Fundas para equipaje
            // Fundas para pasaporte
            // Piezas y accesorios para bolsas
        ]); 
        Categoria::create([
            'nombre' => 'Zapatos de mujer ',
            'idSubCategoria' => 8
            // Sandalias de mujer
            // Pisos
            // Tacones altos
            // Zapatillas Vulcanizadas
            // Zapatillas de casa
            // Botas
        ]); 
        Categoria::create([
            'nombre' => 'Zapatos de hombre ',
            'idSubCategoria' => 8
            // Zapatos casuales
            // Zapatillas Vulcanizadas
            // Sandalias de hombre
            // Mocasines
            // Chancletas
            // Botas
        ]); 
        Categoria::create([
            'nombre' => 'Zapatos más vendidos ',
            'idSubCategoria' => 8
            // Sandalias de cuña
            // Tacones Clásicos
            // Pisos Grandes
            // Zapatillas de interior
            // Zapatillas de deporte de moda
            // Sandalias cómodas
        ]); 

        // Juguetes , Niños y Bebes
        Categoria::create([
            'nombre' => 'Categorías calientes',
            'idSubCategoria' => 9
            // Vestidos
            // juegos de ropa
            // Trajes familiares a juego
            // Sudadera
            // Ropa de dormir y batas
            // Zapatos de niños
            // Cochecitos de bebé
        ]);
        Categoria::create([
            'nombre' => 'Para chicas ',
            'idSubCategoria' => 9
            // Vestidos
            // Camisetas y tops
            // Abrigos y chamarras
            // Ropa de dormir y batas
        ]);
        Categoria::create([
            'nombre' => 'Control remoto ',
            'idSubCategoria' => 9
            // Helicópteros RC
            // Coches RC
            // Cuadricóptero RC
        ]);
        Categoria::create([
            'nombre' => 'Bebé (0-3 años)',
            'idSubCategoria' => 9
            // Mamelucos de bebé
            // Conjunto de ropa de bebé
            // Los primeros andadores del bebé
            // Accesorios para bebés
            // Alimentación
            // Lecho
            // Artículos para la dentición del bebé
            // Juguetes para bebés y niños pequeños
        ]);
        Categoria::create([
            'nombre' => 'Para chicos ',
            'idSubCategoria' => 9
            // Camisetas
            // Abrigos y chamarras
            // Pantalones
            // Sudadera
        ]);
        Categoria::create([
            'nombre' => 'Juguetes de construcción y construcción ',
            'idSubCategoria' => 9
            // bloques
            // Juguetes de construcción modelo
        ]);
        Categoria::create([
            'nombre' => 'Artículos para madre y bebé',
            'idSubCategoria' => 9
            // Ropa de maternidad
            // extractores de leche eléctricos
            // Recuerdos de bebé
        ]);
        Categoria::create([
            'nombre' => 'Juguetes y Pasatiempos',
            'idSubCategoria' => 9
            // Juguetes para apretar
            // Figuras de acción y juguete
            // muñecas
            // Animales de peluche y felpa
            // Diecast y vehículos de juguete
            // Tarjetas de colección de juegos
            // Pegatinas
        ]);

        // Diversion al aire libre y deportes
        Categoria::create([
            'nombre' => 'Natación ',
            'idSubCategoria' => 10
            // Natación
            // Trajes de una pieza
            // Trajes de dos piezas
            // Cubrirlos
            // Trajes de baño para hombres
            // Trajes de baño para niños
        ]); 
        Categoria::create([
            'nombre' => 'Zapatillas ',
            'idSubCategoria' => 10
            // Zapatos para correr
            // Zapatos de senderismo
            // Zapatos de soccer
            // Zapatillas para skateboard
            // Zapatos de baile
            // Zapatos de baloncesto
        ]); 
        Categoria::create([
            'nombre' => 'Ropa de deporte ',
            'idSubCategoria' => 10
            // camisetas
            // Chaquetas de senderismo
            // Pantalones
            // Pantalones cortos
            // Bolsas de deporte
            // Accesorios deportivos
        ]); 
        Categoria::create([
            'nombre' => 'Ciclismo ',
            'idSubCategoria' => 10
            // Bicicletas
            // cuadros de bicicleta
            // Luces de bicicleta
            // Cascos de bicicleta
            // Maillots de ciclismo
            // Gafas de ciclismo
        ]); 
        Categoria::create([
            'nombre' => 'Pescar ',
            'idSubCategoria' => 10
            // Carretes de pesca
            // Señuelos de pesca
            // Líneas de pesca
            // Cañas de pescar
            // Combinaciones de varillas
            // Cajas de aparejos de pesca
        ]); 
        Categoria::create([
            'nombre' => 'Otros equipos deportivos ',
            'idSubCategoria' => 10
            // Campamento y Senderismo
            // Caza
            // Golf
            // Fitness y culturismo
            // Esquí y Snowboard
            // Instrumentos musicales
        ]);

        // Belleza Salud y Cabello
        Categoria::create([
            'nombre' => '        Tejidos para el cabello ',
            'idSubCategoria' => 11
            // Paquetes Con Cierre
            // 3/4 paquetes
            // Tejidos precoloreados
            // Cierres
        ]); 
        Categoria::create([
            'nombre' => '        pelucas ',
            'idSubCategoria' => 11
             // Pelucas delanteras de encaje
            // Pelucas de máquina completa
            // 360 pelucas de encaje
            // Pelucas de encaje parcial
        ]); 
        Categoria::create([
            'nombre' => '        cabello sintético ',
            'idSubCategoria' => 11
            // Pelucas de encaje sintético
            // Pelucas desde US $10
            // trenzas de pelo
            // Pelo De Ganchillo
        ]); 
        Categoria::create([
            'nombre' => '        Maquillaje ',
            'idSubCategoria' => 11
             // Ojos
            // Labios
            // Cara
            // Herramientas de maquillaje
        ]); 
        Categoria::create([
            'nombre' => '        Cuidado de la salud ',
            'idSubCategoria' => 11
             // Monitores de salud domésticos
            // Lentes de contacto
            // Atención médica personal
            // Audífonos
        ]); 
        Categoria::create([
            'nombre' => '        Protección de la piel ',
            'idSubCategoria' => 11
            // Cara
            // Ojos
            // Cuerpo
            // Herramientas para el cuidado de la piel
        ]); 
        Categoria::create([
            'nombre' => '        Arte de uñas y herramientas ',
            'idSubCategoria' => 11
            // Esmalte de uñas de gel
            // Taladros de uñas
            // Secadores de uñas
            // brillo de uñas
        ]); 
        Categoria::create([
            'nombre' => '        Cuidado personal ',
            'idSubCategoria' => 11
            // Cuidado del cabello y peinado
            // Afeitado y Depilación
            // Higiene oral
        ]); 
        Categoria::create([
            'nombre' => '        Masaje y Relajación ',
            'idSubCategoria' => 11
            // Diadema de pistola
            // Equipo de masaje de piernas
        ]); 
        Categoria::create([
            'nombre' => '        Artículos para adultos ',
            'idSubCategoria' => 11
             // condones
            // Lubricantes
            // Vibradores
        ]);

        // Automoviles y motocicletas
        Categoria::create([
            'nombre' => 'Piezas de repuesto para automóviles ',
            'idSubCategoria' => 12
            // Luces del coche
            // Piezas interiores
            // Piezas exteriores
            // Bujías y sistemas de encendido
            // Sensores de vehículos
            // Sistemas de frenos
            // Limpia parabrisas
            // Otras piezas de repuesto
        ]);
        Categoria::create([
            'nombre' => 'Herramientas, mantenimiento y cuidado ',
            'idSubCategoria' => 12
            // Lectores de código y herramientas de escaneo
            // Herramientas diagnosticas
            // Herramientas de lavado de autos
            // Cuidado de pintura y pulimentos
            // Otros productos de mantenimiento
        ]);
        Categoria::create([
            'nombre' => 'Electrónica del coche ',
            'idSubCategoria' => 12
            // Reproductores multimedia para coche
            // DVR/cámaras de tablero
            // Sistemas de alarma y seguridad
            // Rastreadores GPS
            // Autoradios
            // Monitores de coche
            // Calentadores y refrigeradores para automóviles
            // Cámaras de vehículos
            // Sistemas GPS para vehículos
            // Arrancadores
        ]);
        Categoria::create([
            'nombre' => 'Exterior Accessories ',
            'idSubCategoria' => 12
            // Pegatinas de coche
            // Cubiertas de coche
            // Otros accesorios exteriores
        ]);
        Categoria::create([
            'nombre' => 'Accesorios y repuestos para motocicletas ',
            'idSubCategoria' => 12
            // Piezas de carrocería y bastidor
            // Cascos y equipo de protección
            // Encendiendo
            // Sistemas de frenado
            // Sistemas de escape
            // Cascos y Auriculares
            // Fundas para asientos de motocicletas
            // Otros accesorios para motocicletas

        ]);
        Categoria::create([
            'nombre' => 'Interior Accessories ',
            'idSubCategoria' => 12
             // Cubre asientos
            // Soluciones de almacenamiento
            // Estuches para llaves de autos
            // Cubiertas de volante
            // Alfombras de piso
        ]);

        // Herramientas y mejoras para el hogar
        Categoria::create([
            'nombre' => 'Instrumentos 1',
            'idSubCategoria' => 13
            // Herramientas eléctricas
            // Herramientas manuales
            // Herramientas de jardín
            // Piezas de herramientas
            // Juegos de herramientas
        ]);
        Categoria::create([
            'nombre' => 'Iluminación interior ',
            'idSubCategoria' => 13
             // Luces de techo
            // Luces colgantes
            // Downlights
            // candelabros
            // Lámparas de pared
            // Luces nocturnas
        ]);
        Categoria::create([
            'nombre' => 'Instrumentos 2 ',
            'idSubCategoria' => 13
            // Herramientas de medición y análisis
            // Máquinas herramientas y accesorios
            // Maquinaria para trabajar la madera
            // Equipo de soldadura
            // Suministros para soldar y soldar
        ]);
        Categoria::create([
            'nombre' => 'Sistemas familiares inteligentes ',
            'idSubCategoria' => 13
            // Sistema de control de temperatura inteligente
            // Sistema de control automático de cortinas
            // Control de hogar inteligente
            // Sensores inteligentes del cuerpo humano
            // Riego inteligente
        ]);
        Categoria::create([
            'nombre' => 'Mejoras para el hogar ',
            'idSubCategoria' => 13
             // Equipos y suministros eléctricos
            // Energía solar
            // Hardware
            // Accesorios de cocina
            // Fuentes de energía alternativas
            // Zapatillas
        ]);
        Categoria::create([
            'nombre' => 'Iluminación exterior ',
            'idSubCategoria' => 13
             // linternas
            // Lámparas solares
            // Proyectores
            // luces de cadena
            // Luces subacuáticas

        ]);

        Categoria::create([
            'nombre' => 'Bebidas Alcoholicas',
            'idSubCategoria' => 14
        ]);

        Categoria::create([
            'nombre' => 'Jugos',
            'idSubCategoria' => 14
        ]);

        Categoria::create([
            'nombre' => 'Lacteos',
            'idSubCategoria' => 14
        ]);

        Categoria::create([
            'nombre' => 'Gaseosas',
            'idSubCategoria' => 14
        ]);


    }
}
