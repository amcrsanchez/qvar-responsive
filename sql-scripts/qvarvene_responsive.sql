SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `clasificacion_automotriz` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `clasificacion_automotriz` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

INSERT INTO `clasificacion_automotriz` (`id`, `clasificacion_automotriz`) VALUES
(1, 'Limpiacristales'),
(2, 'Shampoo y Desengrasantes'),
(3, 'Refrigerantes Base Agua'),
(4, 'Refrigerantes Base Glicol');

CREATE TABLE IF NOT EXISTS `clasificacion_productos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

INSERT INTO `clasificacion_productos` (`id`, `clasificacion`) VALUES
(1, 'Limpiadores y Desengrasantes'),
(2, 'Polimeros para Tratamiento de Aguas'),
(3, 'Productos para Torres de Enfriamiento'),
(4, 'Productos para Calderas'),
(5, 'Linea Automotriz');

CREATE TABLE IF NOT EXISTS `descargas` (
  `cod_producto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `descargas` (`cod_producto`, `descripcion`, `url`) VALUES
('EXRO820LNI', 'Boletin Técnico Rev. 3', 'productos-para-calderas/exro820lni/EXRO820-LNiRev3.pdf'),
('EXRO860L', 'Boletin Técnico Rev. 4', 'productos-para-calderas/exro860l/EXRO860-LRev.4.pdf'),
('EXRO889', 'Boletin Técnico Rev. 2', 'productos-para-calderas/exro889/EXRO889Rev2.pdf'),
('EXRO889', 'Hoja de Seguridad Rev. 1', 'productos-para-calderas/exro889/HDSMEXRO889Rev1.pdf');

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id_pedido` int(11) NOT NULL,
  `cod_producto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `presentacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `act` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `rif_user` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `realizado_por` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `act` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

CREATE TABLE IF NOT EXISTS `presentaciones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `presentacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=23 ;

INSERT INTO `presentaciones` (`id`, `presentacion`) VALUES
(1, 'A Convenir'),
(2, 'Carboya de 20 Kgs'),
(3, 'Carboya de 20 Lts'),
(4, 'Carboya de 21 Kgs'),
(5, 'Carboya de 50 Kgs'),
(6, 'Carboya de 60 Kgs'),
(7, 'Carboya de 60 Lts'),
(8, 'Carboya de 63 Kgs'),
(9, 'Carboya de 67 Kgs'),
(10, 'Carboya de 68 Kgs'),
(11, 'Carboya de 72 Kgs'),
(12, 'Paquete de 4 galones'),
(13, 'Paquete de 12 litros'),
(14, 'Saco de 25 Kgs'),
(15, 'Tambor de 200 Kgs'),
(16, 'Tambor de 200 Lts'),
(17, 'Tambor de 208 Kgs'),
(18, 'Tambor de 214 Kgs'),
(19, 'Tambor de 224 Kgs'),
(20, 'Tambor de 226 Kgs'),
(21, 'Tambor de 250 Kgs'),
(22, 'Maxicubo de 1000 Lts');

CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_corta` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_larga` text COLLATE utf8_spanish_ci NOT NULL,
  `clasificacion` int(5) DEFAULT NULL,
  `clasificacion_automotriz` int(5) DEFAULT NULL,
  `imagen` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `clasificacion` (`clasificacion`),
  KEY `fk_clas_auto` (`clasificacion_automotriz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `productos` (`codigo`, `nombre`, `descripcion_corta`, `descripcion_larga`, `clasificacion`, `clasificacion_automotriz`, `imagen`) VALUES
('102LGL', 'DEGRAS L', 'DEGRAS L, Es un producto neutro, biodegradable, desarrollado especialmente para remover grasa de las manos y brazos de mecánicos y empleados de talleres , tambien puede ser empleado en la limpieza de carroceria de vehiculos, tapiceria, alfombras y otras superficies.', '<p>DEGRAS L, Es un producto neutro, biodegradable, desarrollado especialmente para remover grasa de las manos y brazos de mecanicos y empleados de talleres , tambien puede ser empleado en la limpieza de la carroceria de vehículos ,tapicería, alfombras y otras superficies.</p>\r\n<p>DEGRAS L, Ha sido formulado con materias primas de alta calidad, que hacen de el un limpiador perfecto, protegiendo la piel, textiles, plásticos y metales desengrasados con este producto.</p>', 5, 2, 'productos/img/automotriz/galon_degras.png'),
('103G', 'SHAMPOO CAR''S', 'SHAMPOO CAR''S Es un producto neutro, biodegradable, desarrollado para lavar carrocería de vehículos expuestos a diferentes tipos de suciedad de origen organico e inorganico.\n', '<p>SHAMPOO CAR''S Es un producto neutro, biodegradable, desarrollado para lavar la carrocería de vehículos expuestos a diferentes tipos de suciedad de origen organico e inorganico.</p><p>SHAMPOO CAR''S Ha sido formulado con las cantidades precisas de materias primas de alta calidad que protegen la piel y aseguran la limpieza de la carrocería de vehiculos automotores, sin dejar residuos que manchen o ataquen la pintura del automotor.</p><p>SHAMPOO CAR''S Es un producto industrialmente seguro, que no daña pinturas ,metales, empacaduras, gomas, ni fibras textiles, por lo cual puede ser empleado para remover eficazmente la suciedad y la grasa de tapiceria, tapetes y partes plásticas del vehículo dejando una agradable fragancia floral.</p>', 5, 2, 'productos/img/automotriz/galon_shampoo.png\r\n'),
('105J5FRG', 'REFRIGERANTE FIAT', 'REFRIGERANTE FIAT, Anticongelante de motor tipo glicol inhibido. Es un refrigerante de motor, anticorrosivo y elevador del punto de ebullición. desarrollado especialmente para ser utilizado en motores de gasolina. REFRIGERANTE FIAT, usa como fluido base glicoles y como inhibidores de corrosión sales inorgánicas.', '<p>REFRIGERANTE FIAT, Anticongelante de motor tipo glicol inhibido. Es un refrigerante de motor, anticorrosivo y elevador del punto de ebullición. desarrollado especialmente para ser utilizado en motores de gasolina. </p>\r\n<p>REFRIGERANTE FIAT, usa como fluido base glicoles y como inhibidores de corrosión sales inorgánicas que prolongan y mejoran la protección sobre metales usados frecuentemente en el sistema de enfriamiento del motor, incluido el aluminio, cobre, estaño, bronce, acero, hierro.</p>\r\n<p>REFRIGERANTE FIAT, cumple con las normas ASTM D-1384, ASTM D-4340, ASTM D-2570, ASTM D-3306.</p>', 5, 4, 'productos/img/automotriz/galon_fiat.png'),
('110J5RG', 'RADIOX HEAVY-DUTY', 'RADIOX HEAVY DUTY 50, Es un refrigerante de motor premezclado al 50% con agua previamente tratada, ha sido desarrollado especialmente para ser empleado en el circuito de enfriamiento de motores de equipos pesados accionados con gasolina, diesel o gas.', '<p>RADIOX HEAVY DUTY-50 VERDE Es un refrigerante de motor premezclado al 50% con agua previamente tratada. </p>\r\n<p>RADIOX HEAVY DUTY-50 Ha sido desarrollado especialmente para ser empleado en el circuito de enfriamiento de motores de equipos pesados accionados con gasolina diesel o gas.</p>\r\n<p>RADIOX HEAVY DUTY-50 VERDE Ha sido formulado empleando como liquido base glicoles, como inhibidores de corrosión compuestos orgánicos e inorgánicos , ademas de dispersantes y estabilizantes que le confieren caracteristicas excepcionales, tales como tener un punto de ebullición superior al del agua, un punto de congelación inferior al del agua, asi como proteger contra la corrosión y la incrustación los metales expuestos a este producto.</p>\r\n<p>Radiox Heavy Duty-50, cumple con las normas ASTM D-6210, ASTM D-4985, ASTM D-1384, ASTM D-4340 e ICONTEC NTC 3592, al igual que con las normas japonesas JIS K-2234 y TMC RP-329 A.</p>', 5, 4, 'productos/img/automotriz/galon_heavyduty.png'),
('112J4UG', 'REFRIGERANTE UNIVERSAL', 'REFRIGERANTE UNIVERSAL, Anticongelante de motor tipo glicol inhibido. Es un refrigerante de motor, anticorrosivo y elevador del punto de ebullición. Desarrollado especialmente para ser usado en motores de gasolina.', '<p>REFRIGERANTE UNIVERSAL es refrigerante de motor, anticorrosivo y elevador del punto de ebullición. Desarrollado especialmente para ser utilizado en motores de gasolina y diesel, UNIVERSAL usa como fluido base glicoles y como inhibidores de corrosión sales orgánicas y fosfatos que prolongan y mejoran la protección sobre los metales usados frecuentemente en el sistema de enfriamiento del motor, incluido el aluminio, cobre, estaño, bronce, acero, hierro.</p>\r\n<p>REFRIGERANTE UNIVERSAL no contiene boratos, ni silicatos. REFRIGERANTE UNIVERSAL cumple con las normas ASTM D-1384, ASTM D-4340, ASTM D-2570, ASTM D-3306.</p>', 5, 4, 'productos/img/automotriz/galon_universal.png'),
('130LRTG', 'REFRI TAXI', 'REFRITAXI, Es un inhibidor de corrosión especialmente desarrollado para ser usado en lugar de agua en el circuito de refrigeración del sistema de enfriamiento de motores de gasolina y diesel.', '<p>REFRITAXI Es un inhibidor de corrosión especialmente desarrollado para ser usado en lugar de agua, en el circuito de refrigeración del sistema de enfriamiento de motores de gasolina y motores diesel.</p>\r\n<p>REFRITAXI usa como fluido base agua-glicol y como inhibidores de corrosión sales orgánicas e inorgánicas que protegen los metales usados con mayor frecuencia en el sistema de enfriamiento del motor, incluidos, aluminio, cobre, estaño, bronce, hierro y acero.</p>\r\n<p>REFRITAXI cumple con las normas ASTM D-1384, ASTM D-4340, ASTM D-2570, ASTM D-3306</p>', 5, 3, 'productos/img/automotriz/galon_refritaxi.png'),
('135LRCG', 'REFRI CARGA', 'REFRICARGA, Es un inhibidor de corrosión especialmente desarrollado para ser usado en lugar de agua en el circuito de refrigeración del sistema de enfriamiento de motores de gasolina y diesel.', '<p>REFRICARGA Es un inhibidor de corrosión especialmente desarrollado para ser usado en lugar de agua, en el circuito de refrigeración del sistema de enfriamiento de motores de gasolina y motores diesel.</p>\r\n<p>REFRICARGA usa como fluido base agua-glicol y como inhibidores de corrosión sales orgánicas e inorgánicas que protegen los metales usados con mayor frecuencia en el sistema de enfriamiento del motor, incluidos, aluminio, cobre, estaño, bronce, hierro y acero.</p>\r\n<p>REFRICARGA cumple con las normas ASTM D-1384, ASTM D-4340, ASTM D-2570</p>', 5, 3, 'productos/img/automotriz/galon_refricarga.png'),
('135LXCG', 'FREEDOX COOLANT', 'FREEDOX COOLANT, Es un aditivo desarrollado con tecnología de punta, en el que se emplean ácidos organicos como inhibidores de corrosión, que protegen contra los efectos nocivos de la oxidación.', '<p>FREEDOX COOLANT, Es un aditivo desarrollado con tecnología de punta, en el que se emplean ácidos orgánicos como inhibidores de corrosión, que protegen contra los efectos nocivos de la oxidación a los metales más emmpleados en el sistema de enfriamiento del motor, incluidos aluminio, cobre, estaño, bronce, acero, hierro.</p>\r\n<p>FREEDOX COOLANT, Puede ser empleado en el sistema de enfriamiento de motores estacionarios o automotores que funcionen con gasolina o diesel.</p>\r\n<p>FREEDOX COOLANT, Cubre los requerimientos de servicio establecidos en las normas ASTM D-1384, ASTM D-1881, ASTM D-1882, ASTM D-2570, ASTM D-4340</p>\r\n<p>FREEDOX COOLANT, Protege durante 25.000 Kilometros, prolongando la vida útil del sistema de enfriamiento del motor de su vehiculo.</p>', 5, 3, 'productos/img/automotriz/galon_freedox.png'),
('142AG', 'LIMPIACRISTALES VIDRIOX', 'VIDRIOX, Es un producto neutro desarrollado, principalmente para limpiar y desengrasar el parabrisas de cualquier tipo de vehiculo. Ha sido formulado con dispersantes que evitan el taponamiento de las boquillas.', '<p>VIDRIOX, Es un producto neutro desarrollado, principalmente para limpiar y desengrasar el parabrisas de cualquier tipo de vehículo.</p>\r\n<p>VIDRIOX, Ha sido formulado con dispersantes que evitan el taponamiento de las boquillas, con tenso activos que facilitan la limpieza, con microbicidas que evita la descomposición del líquido dentro del tanque de almacenamiento del limpiaparabrisas, con acondicionadores de pH que lo mantienen neutro, con el fin de evitar daños en la pintura y otras autopartes expuestas al líquido.</p>\r\n<p>VIDRIOX, Puede ser empleado en la limpieza de ventanas, espejos y superficies de vidrio,fórmica y porcelana.</p>\r\n', 5, 1, 'productos/img/automotriz/galon_vidriox.png'),
('EXRO222', 'EXRO 222', 'EXRO 222, Es un detergente a base de agua, totalmente neutro, lo que permite su aplicacion en cualquier tipo de superficie o material sin afectarlo ni atacarlo.', '<p>EXRO 222, Es un detergente a base de agua, totalmente neutro lo que permite su aplicacion en cualquier tipo de superficie o material sin afectarlo ni atacarlo. EXRO 222, No afecta los metales, no daña la pintura, cauchos, empaques. Remueve eficazmente la suciedad.</p>', 1, NULL, ''),
('EXRO223', 'EXRO 223', 'El limpiador y desengrasante EXRO 223, es un producto liquido a base de agua de facíl manejo y aplicación.', '<p>El limpiador y desengrasante EXRO 223, es un producto liquido a base de agua de facil manejo y aplicación.</p>', 1, NULL, ''),
('EXRO290', 'EXRO 290', 'EXRO 290, Es un producto que emplea como liquido base agua, este producto fue desarrollado con el proposito de limpiar y remover depositos de grasas carbonatadas, adheridas sobre camaras y bloques cámaras de automotores y motores estacionarios.', '<p>EXRO 290, Es un producto que emplea como liquido base agua, este producto fue desarrollado con el proposito de limpiar y remover depositos de grasas carbonatadas, adheridas sobre bloques y cámaras de automotores y motores estacionarios</p> <p>Tambien es empleado con exito en la limpieza de áreas de trabajo que se ensucian con aceites y grasas.</p>', 1, NULL, ''),
('EXRO614', 'EXRO 614', 'EXRO 614, Es un coagulante cationico no viscoso, utilizado como coagulante primario en el tratamiento de aguas potables e industriales hasta una concentracion de 100ppm.', '<p>EXRO 614, Es un coagulante catiónico no viscoso, utilizado como coagulante primario en el tratamiento de aguas potables e industriales hasta una concentración de 100ppm.</p>\r\n<p>EXRO 614, Es especialmente efectivo en la clarificación de aguas de baja turbulencia y alta coloración.</p>', 2, NULL, ''),
('EXRO660', 'EXRO 660', 'EXRO 660, Es empleado eficientemente en los procesos de espesamiento y deshidratacion de lodos, asi como el tratamiento de aguas residuales, en especial cuando el floc esta expuesto a alto rompimiento.', '<p>EXRO 660, Es una poliacrilamida no iónica de alto peso molecular.</p>\r\n<p>EXRO 660, Es empleado eficientemente en los procesos de espesamiento y deshidratacion de lodos, asi como en el tratamiento de aguas residuales , en especial cuando el floc está expuesto a alto rompimiento.</p>\r\n<p>EXRO 660 Presenta una excelente retención coloidal y máxima fortaleza del floc. Tiene aplicación en efluentes de las industrias avícolas ,pulpa de papel, minería y gravilleras.</p>', 2, NULL, ''),
('EXRO663MA', 'EXRO 663MA', 'EXRO 663MA, Es una poliacrilamida de muy alto peso molecular de caracter aniónico, utilizado eficientemente en los procesos de espesamiento y deshidratacion de lodos, aguas residuales y como floculante en la clarificación para aguas potables.', '<p>EXRO 663MA, Es una poliacrilamida de muy alto peso molecular de carácter aniónico, utilizado eficientemente en los procesos de espesamiento y deshidratación de lodos, aguas residuales y como floculante en la clarificación para aguas potables, en especial cuando el floc está expuesto a alto rompimiento.</p>\r\n<p>EXRO 663MA, Presenta una excelente retención coloidal y máxima fortaleza del floc. Tiene aplicación en efluentes de las industrias avícolas, pulpa de papel, imprentas, mineras, entre otros.</p>', 2, NULL, ''),
('EXRO740', 'EXRO 740', 'EXRO 740, HIPOCLORITO DE SODIO, es un producto especialmente formulado, para controlar el crecimiento de los microorganismos y depositos de algas en los sistemas de recirculacion de agua de enfriamiento en la industria.', '<p>HIPOCLORITO DE SODIO, es un producto especialmente formulado para controlar el crecimiento de los microorganismos y el depósito de algas en los sistemas de recirculación de agua de enfriamiento en la industria.</p>', 3, NULL, ''),
('EXRO748', 'EXRO 748', 'EXRO 748, Es un producto alcalino con base glutaraldeído utilizado como microbicida y alguicida en sistemas de enfriamiento, en el tratamiento de aguas de tanques y piscinas de almacenamiento donde es necesario controlar el desarrollo de algas y microorganismos.', '<p>EXRO 748, Es un producto alcalino con base glutaraldeído utilizado como microbicida y alguicida en sistemas de enfriamiento.</p>\r\n<p>EXRO 748, también es usado en el tratamiento de aguas de tanques y piscinas de almacenamiento donde es necesario controlar el desarrollo de algas y microorganismos.</p>\r\n<p>EXRO 748, funciona en un amplio rango de pH y temperatura. Es especialmente eficiente en el control de algas y de bacterias sulforeductoras.</p>\r\n<p>EXRO 748, controla el desarrollo de organismos anaeróbicos. Su utilizacion permite limpiar sistemas que se encuentran biológicamente sucios.</p>', 3, NULL, ''),
('EXRO760', 'EXRO 760', 'EXRO 760, Es un producto multifuncional que provee un buen control de los solidos en suspensión en los sistemas de enfriamiento y evita la formación de incrustaciones. Está formulado con inhibidores de corrosión que protege el cobre y sus aleaciones.', '<p>EXRO 760, Es un producto multifuncional que provee un buen control de los sólidos y evita la formación de incrustaciones. Está formulado con inhibidores de corrosión, que ofrece un buen control de los depósitos de incrustación y corrosión bajo condiciones severas de operación.</p><p>EXRO 760, Es una mezcla sinergética de polímeros aniónicos e inhibidores de corrosión, que ofrece un buen control de los depósitos de incrustación y corrosión bajo condiciones severas de operación.</p>\r\n<p>EXRO 760 Está recomendado para ser usado en sistemas de alto contenido de sólidos en suspensión, los cuales ataquen.</p>\r\n<p>EXRO 760, No debe ser usado en sistemas de aguas potables.</p>', 3, NULL, ''),
('EXRO770', 'EXRO 770', 'EXRO 770, Es un producto desarrollado especialmente para ser empleado en sistemas de enfriamiento; como dispersante de solidos en suspension y como inhibidor en la formacion de incrustaciones minerales.', '<p>EXRO 770, Es un producto desarrollado especialmente para ser empleado en sistemas de enfriamiento; como dispersante de sólidos en suspensión y como inhibidor en la formación de incrustaciones minerales.</p>\r\n<p>EXRO 770, Mantiene limpia las superficies metálicas, permitiendo una eficiente transferencia de calor. Es especialmente efectivo para dispersar hidróxido de hierro precipitado.</p>\r\n<p>EXRO 770, Debe ser empleado solamente en el tratamiento de aguas industriales, no debe ser usado para tratar aguas potables.</p><p>EXRO 770 no causa corrosión sobre las superficies de los metales comúnmente empleados en la fabricación de sistemas de enfriamiento convencionales.</p>', 3, NULL, ''),
('EXRO820LNI', 'EXRO 820L(Ni)', 'EXRO 820-L(Ni), Ha sido desarrollado para controlar la corrosión causada por el oxigeno disuelto presente en el agua empleada en sistemas de producción de vapor.', '<p>EXRO820-L(Ni) Es un secuestrante de oxígeno, del tipo sulfito de sodio catalizado y estabilizado.</p>\r\n<p>EXRO820-L(Ni) Reacciona 500 veces más rápido que el sulfito de sodio comercial.</p>\r\n<p>EXRO820-L(Ni) Ha sido desarrollado para controlar la corrosión causada por el oxigeno disuelto presente en el agua empleada en sistemas de producción de vapor.</p>\r\n<p>EXRO820-L(Ni) Ayuda a controlar la corrosión causada por el oxigeno en los sistemas de condensado.</p>', 4, NULL, ''),
('EXRO840', 'EXRO 840', 'EXRO 840, Es una combinacion de polifosfatos orgánicos que se utiliza en el tratamiento de agua de alimentación de calderas, con contenidos de dureza no mayores de 60ppm, y concentraciones de sílice por encima de 20ppm.', '<p>EXRO 840, Es un producto desarrollado para ser utilizado en calderas que operen por debajo de 600 libras de presión.</p>\r\n<p>EXRO 840, Ha sido formulado con polifosfatos orgánicos, con acondicionadores de de lodos y sílice, los cuales proveen un efectivo control en aguas de alimentación de calderas, con contenido de sílice mayores a 20ppm.</p>\r\n<p>EXRO 840, Es una combinación de polifosfatos orgánicos que se utiliza en el tratamiento de agua de alimentación de calderas, con contenidos de dureza no mayores de 60ppm y concentraciones de sílice por encima de 20ppm.</p>\r\n<p>EXRO 840, Contiene acondicionadores orgánicos de lodos y de pH. por sus caracteristicas EXRO 840 reduce la formación de incrustaciones , haciendo que estas se presenten como lodos muy blandos que pueden ser fácilmente removidos con las purgas.</p>', 4, NULL, ''),
('EXRO840L', 'EXRO 840-L', 'EXRO 840-L, Es un producto en base a polifosfatos organicos , formulado especialmente con acondicionadores de dureza y sílice, los cuales proveen un efectivo control en aguas de alimentacion de calderas, con alto contenido de silicatos, mayor a 20ppm como SiO2', '<p>EXRO 840-L, Es un producto en base a polifosfatos organicos, formulado especialmente con acondicionadores de dureza y sílice, los cuales proveen un efectivo control en aguas de alimentación de calderas, con alto contenido de silicatos, mayor a 20ppm como SiO2.</p>\r\n<p>EXRO 840-L, Debe ser utilizado en calderas que operen por debajo de 600 libras de presión.</p>\r\n<p>EXRO 840-L, Es una combinación de polifosfatos orgánicos que se utilizan para el tratamiento de agua de alimentación de calderas, que tengan una dureza maxima de 100ppm, una concentración de sílice por encima de 20ppm y donde el vapor se usa en forma directa. Por sus caracteristicas EXRO 840-L, acondiciona los sólidos formados durante la operación de la caldera, permitiendo que sean fácilmente removidos con las purgas.</p>', 4, NULL, ''),
('EXRO860', 'EXRO 860', 'EXRO 860, Es un producto en base a polifosfatos organicos, formulado especialmente con acondicionadores de dureza y sílice, los cuales proveen un efectivo control en aguas de alimentación de calderas con alto contenido de silicatos 30ppm', '<p>EXRO 860, Es un producto en base a polifosfatos organicos, formulado especialmente con acondicionadores de dureza y sílice, los cuales proveen un efectivo control en aguas de alimentación de calderas, con alto contenido de silicatos(30ppm)</p>\r\n<p>EXRO 860, Debe ser utilizado en calderas que operen por debajo de 600 libras de presión.</p>\r\n<p>EXRO 860, Es una combinación de polifosfatos orgánicos que se utilizan para el tratamiento de agua de alimentación de calderas, que tengan una dureza maxima de 60ppm, una concentración de sílice por encima de 20ppm y donde el vapor se usa en forma directa. Por sus caracteristicas EXRO 860, Hace que las incrustaciones sean blandas permitiendo que sean removidas con las purgas.</p>', 4, NULL, ''),
('EXRO860L', 'EXRO 860-L', 'EXRO 860-L, Es un producto en base a polifosfatos organicos, formulado especialmente con acondicionadores de dureza y sílice, los cuales proveen un efectivo control en aguas de alimentación de calderas, con alto contenido de silicatos, mayor a 20ppm como SiO2', '<p>EXRO 860-L, Es un producto en base a polifosfatos organicos, formulado especialmente con acondicionadores de dureza y sílice, los cuales proveen un efectivo control en aguas de alimentación de calderas, con alto contenido de silicatos, mayor a 20ppm como SiO2.</p>\r\n<p>EXRO 860-L, Debe ser utilizado en calderas que operen por debajo de 600 libras de presión.</p>\r\n<p>EXRO 860-L, Es una combinación de polifosfatos orgánicos que se utilizan para el tratamiento de agua de alimentación de calderas, que tengan una dureza maxima de 100ppm, una concentración de sílice por encima de 20ppm y donde el vapor se usa en forma directa. Por sus caracteristicas EXRO 860-L, acondiciona los sólidos formados durante la operación de la caldera, permitiendo que sean fácilmente removidos con las purgas.</p>', 4, NULL, ''),
('EXRO889', 'EXRO 889', 'EXRO 889, Es un producto desarrollado con una mezcla selecta de agentes acondicionadores de silice, dureza .Ph y secustrante de oxígeno, para usar en calderas que operan a presiones no mayores a 150psig.', '<p>EXRO 889, Es un producto desarrollado con una mezcla selecta de agentes acondicionadores de sílice, dureza pH y secuestrante de oxígeno, para ser utilizado en calderas que operan a presiones no mayores a 150psig y cuya función es producir agua caliente o vapor sobresaturado.</p>\r\n<p>EXRO 889, Secuestra la dureza y el oxigeno presente en el agua, acondiciona la sílice, el pH y mantiene limpias las superficies metálicas del sistema de producción de vapor.</p>', 4, NULL, '');

CREATE TABLE IF NOT EXISTS `producto_presentacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_presentacion` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codigo_producto` (`codigo_producto`),
  KEY `id_presentacion` (`id_presentacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=66 ;

INSERT INTO `producto_presentacion` (`id`, `codigo_producto`, `id_presentacion`) VALUES
(1, 'EXRO222', 4),
(2, 'EXRO222', 8),
(3, 'EXRO222', 17),
(4, 'EXRO223', 3),
(5, 'EXRO223', 7),
(6, 'EXRO223', 16),
(7, 'EXRO223', 22),
(8, 'EXRO290', 4),
(9, 'EXRO290', 8),
(10, 'EXRO290', 18),
(11, '102LGL', 13),
(12, '102LGL', 12),
(13, '103G', 13),
(14, '103G', 12),
(15, '103G', 3),
(16, '103G', 7),
(17, '103G', 16),
(18, '105J5FRG', 13),
(19, '105J5FRG', 12),
(20, '110J5RG', 13),
(21, '110J5RG', 12),
(22, '110J5RG', 7),
(23, '110J5RG', 16),
(24, '112J4UG', 12),
(25, '112J4UG', 7),
(26, '112J4UG', 16),
(27, '130LRTG', 12),
(28, '130LRTG', 7),
(29, '130LRTG', 16),
(30, '135LRCG', 12),
(31, '135LRCG', 7),
(32, '135LRCG', 16),
(33, '135LXCG', 12),
(34, '135LXCG', 3),
(35, '135LXCG', 7),
(36, '135LXCG', 16),
(37, '135LXCG', 22),
(38, '142AG', 13),
(39, '142AG', 12),
(40, '142AG', 3),
(41, '142AG', 7),
(42, '142AG', 16),
(43, '142AG', 22),
(44, 'EXRO614', 7),
(45, 'EXRO614', 16),
(46, 'EXRO614', 22),
(47, 'EXRO660', 14),
(48, 'EXRO663MA', 14),
(49, 'EXRO740', 11),
(50, 'EXRO740', 21),
(51, 'EXRO748', 1),
(52, 'EXRO760', 18),
(53, 'EXRO760', 20),
(54, 'EXRO770', 9),
(55, 'EXRO770', 19),
(56, 'EXRO820LNI', 7),
(57, 'EXRO820LNI', 16),
(58, 'EXRO840', 5),
(59, 'EXRO840L', 7),
(60, 'EXRO840L', 16),
(61, 'EXRO860', 5),
(62, 'EXRO860L', 7),
(63, 'EXRO860L', 16),
(64, 'EXRO889', 7),
(65, 'EXRO889', 16);

CREATE TABLE IF NOT EXISTS `propiedades` (
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apariencia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `olor` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ph` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gravedad_especifica` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alcalinidad_de_reserva` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `punto_de_ebullicion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `punto_de_congelacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `formacion_de_espuma` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `volumen_de_espuma` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo_de_ruptura` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `caracter_ionico` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `solubilidad_en_agua` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contenido_de` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `refraccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contenido_de_fosfatos` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `propiedades` (`codigo`, `color`, `apariencia`, `olor`, `ph`, `gravedad_especifica`, `alcalinidad_de_reserva`, `punto_de_ebullicion`, `punto_de_congelacion`, `formacion_de_espuma`, `volumen_de_espuma`, `tiempo_de_ruptura`, `caracter_ionico`, `solubilidad_en_agua`, `contenido_de`, `refraccion`, `contenido_de_fosfatos`) VALUES
('102LGL', 'Azúl', 'Liquido Traslúcido', 'Limón', '25° C 1.04 a 1.06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('103G', 'Amarillo', 'Liquido Traslúcido', 'Floral', '25°C 7.0 a 1.0', '20°C 1.03 a 0.005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('105J5FRG', 'Verde Esmeralda / Naranja', 'Liquido Traslúcido', NULL, '7.5 a 8.5', '15°C 1.071 a 0.005', 'ml Min. 105', '°C 760 mmHg Min. 105', 'Max. -37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('110J5RG', 'Verde Esmeralda / Naranja Fluorescente', 'Liquido Traslúcido', NULL, '50:50 H2O, 25°C 8.5 a 0.5', '15°C 1.07 a 0.01', '5.0 a 8.8', '°C 760 mmHg 109.0 a 1.0', '°C Max. -37', NULL, 'Max. 50', 'Max. 5', NULL, NULL, NULL, NULL, NULL),
('112J4UG', 'Verde Esmeralda / Naranja Fluorescente', 'Liquido Traslúcido', 'Floral', '25°C 4.5 a 9.0', '20°C ml: Min. 5.0', 'Min. 1.05', '°C 760 mmHg: Min. 105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('130LRTG', 'Verde Fluorescente', 'Liquido Traslúcido', NULL, '25°C 8.0 a 10.0', '15°C 1.005 a 1.015', 'Min. 10.0', '°C 760 mmHg: Min. 102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('135LRCG', 'Verde Fluorescente', 'Liquido Traslúcido', NULL, '25°C 8.0 a 10.0', '15°C 1.005 a 1.017', 'Min. 10.0', '°C 760 mmHg: Min. 102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('135LXCG', 'Naranja Fluorescente', 'Líquido Traslúcido', NULL, '25°C 8.0 a 10.0', '15°C 1.005 a 1.015', 'Min. 10.0', '°C 760 mmHg: Min. 102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('142AG', 'Azul Claro', 'Líquido Traslúcido', 'Floral', '25°C 7.0 a 0.5', '20°C 1.005 a 0.005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO222', 'Azul', 'Liquido', NULL, '25° C 7.0 + 1.0', '20 grados C 1.035 + 0.005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO223', 'Beige', 'Liquido', NULL, '25°C 12.0 a 13.0', '20 grados C 1.060 a 1.100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO290', 'Blanco', 'Liquido Opalescente', NULL, '25°C 10.00 a 12.00', '1.045 a 1.085', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO614', NULL, 'Líquido', NULL, '25°C 3.5 a 4.5', '20°C 1.332 a 1.341', NULL, NULL, NULL, NULL, NULL, NULL, 'Catiónico', '100%', NULL, NULL, NULL),
('EXRO660', NULL, 'Sólido Granular', NULL, '(sol. 0.1%) 5.0 a 7.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No iónico', 'LImitada por la viscosidad', NULL, NULL, NULL),
('EXRO663MA', NULL, 'Sólido Granular', 'Blanco', '(sol. 0.5%) 4 a 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aniónico Medio', NULL, NULL, NULL, NULL),
('EXRO740', 'Amarillo', 'Líquido Traslúcido', NULL, '25°C 13.5 a 0.5', '20°C 1.12 a 0.01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO748', 'Incoloro ó Amarillo Tenue', 'Líquido Traslúcido', NULL, '25°C 2.5 a 5.0', '20°C 1.02 a 1.04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO760', 'Ambar', NULL, NULL, '25°C 11.5 a 13.0', '20°C 1.11 a 1.125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO770', 'Amarillo', 'Líquido', NULL, '25°C 6.5 a 8.5', '20°C 1.115 a 1.125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('EXRO820LNI', 'Amarillo Verdoso', 'Líquido Traslúcido', NULL, '25°C 7.5 a 1.0', '20°C 1.19 a 1.22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100%', 'Na2 SO3 Minimo 20.0%', 'Mínimo 27.0%', NULL),
('EXRO840', 'Marrón', 'Sólido', NULL, 'Solución al 1% 12.5 a 0.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Min. 40%'),
('EXRO840L', 'Incoloro', NULL, NULL, '25°C 12.0 13.0', '20°C 1.115 a 1.125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Min. 10%'),
('EXRO860', 'Blanco', NULL, NULL, '25° C Solución al 1%: 13.0 a 0.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Min. 40%'),
('EXRO860L', 'Incoloro', NULL, NULL, '25°C 12.0 a 1.16', '20°C 1.12 a 1.16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20°C: Min. 15%', 'Min. 10%'),
('EXRO889', 'Incoloro / Amarillo', 'Líquido Traslúcido', NULL, '25°C 10.5 a 12.5', '20°C 1.165 a 1.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `users` (
  `rif` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vendedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `act` tinyint(1) NOT NULL,
  PRIMARY KEY (`rif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `vendedores` (
  `id_vendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `act` int(1) NOT NULL,
  `telefono` int(12) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_vendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

INSERT INTO `vendedores` (`id_vendedor`, `nombre`, `act`, `telefono`, `email`) VALUES
(1, 'Adriana Sanchez', 1, NULL, 'asanchez.qvarca@gmail.com'),
(2, 'Andres Martinez', 1, NULL, 'amartinez.qvarca@gmail.com'),
(3, 'Grecia Marin', 1, NULL, 'gmarin.qvarca@gmail.com'),
(4, 'Francys Veloz', 1, NULL, 'fveloz.qvarca@gmail.com');


ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`clasificacion`) REFERENCES `clasificacion_productos` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`clasificacion_automotriz`) REFERENCES `clasificacion_automotriz` (`id`);

ALTER TABLE `producto_presentacion`
  ADD CONSTRAINT `producto_presentacion_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo`),
  ADD CONSTRAINT `producto_presentacion_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `presentaciones` (`id`);

ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `productos` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
