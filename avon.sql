# Host: localhost  (Version 5.5.5-10.4.11-MariaDB)
# Date: 2020-05-29 09:26:49
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "abono"
#

DROP TABLE IF EXISTS `abono`;
CREATE TABLE `abono` (
  `idabono` int(11) NOT NULL AUTO_INCREMENT,
  `idpedidos` int(11) NOT NULL,
  `monto` double DEFAULT NULL,
  `fechaabono` date DEFAULT NULL,
  PRIMARY KEY (`idabono`),
  KEY `fk_abono_pedidos1_idx` (`idpedidos`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "abono"
#

INSERT INTO `abono` VALUES (15,4,10,'2020-05-21'),(19,5,5,'2020-05-21'),(24,6,1,'2020-05-21'),(29,8,5,'2020-05-23'),(32,21,10,'2020-05-23'),(33,67,0,'2020-05-24'),(34,67,5,'2020-05-24'),(35,68,10,'2020-05-24'),(36,68,10,'2020-05-24'),(37,68,5,'2020-05-24'),(38,71,10,'2020-05-24'),(39,67,1,'2020-05-24'),(40,67,2,'2020-05-24'),(41,73,50,'2020-05-24'),(42,21,10,'2020-05-24'),(43,75,10,'2020-05-24'),(44,22,100,'2020-05-24'),(45,77,15,'2020-05-24'),(46,4,2,'2020-05-24'),(47,14,5,'2020-05-24');

#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (0,'sss'),(1,'FRAGANCIAS'),(2,'HOGAR'),(3,'MODA'),(4,'krwgje'),(5,'lrkgn,drg,d'),(6,'kjwefbkjewbfkjebwkjfbwkjbjkwrf'),(7,'werfewf');

#
# Structure for table "formapago"
#

DROP TABLE IF EXISTS `formapago`;
CREATE TABLE `formapago` (
  `idformapago` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idformapago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "formapago"
#

INSERT INTO `formapago` VALUES (1,'Contado',b'1'),(2,'Credito 15',b'1'),(3,'Crddito 30',b'1');

#
# Structure for table "productos"
#

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stoc` int(4) DEFAULT NULL,
  `imagen` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `categorias` int(11) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idproductos`),
  KEY `fk_productos_categorias1_idx` (`categorias`),
  CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`categorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "productos"
#

INSERT INTO `productos` VALUES (1,'FRG WILD COUNTRY',35,75,'',1,'2020-05-01',b'1'),(2,'VASOS P/NIÑO',4,50,NULL,2,'2020-05-01',b'1'),(3,'CAMISA MICKEY',40,10,NULL,3,'2020-05-01',b'1'),(100238,'EXPLOSIVO 300Kmh',15,10,NULL,1,'2020-05-01',b'1'),(175531,'SENSUS HER ',30,10,NULL,1,'2020-05-01',b'1'),(176547,'SET NIGHT MIGIC',9,10,NULL,1,'2020-05-01',b'1'),(200260,'PIJAMA',24,10,NULL,3,'2020-05-01',b'1'),(202318,'BRASIER DORIS',6,10,NULL,3,'2020-05-01',b'1'),(206813,'PANTY 3PACK',11,10,NULL,3,'2020-05-01',b'1'),(207690,'7 PACK PROTECTOPIE INVISIBLE',10,10,NULL,3,'2020-05-01',b'1'),(208787,'BOXER CONTROL TESA',7,10,NULL,1,'2020-05-01',b'1'),(484426,'SET FAR AWAY ',27,10,NULL,1,'2020-05-01',b'1'),(484781,'SET BUTTERFLY ',12,10,NULL,1,'2020-05-01',b'1'),(502212,'JUEGO MANDALAS',14,10,NULL,2,'2020-05-01',b'1'),(506326,'JUEGO 4 VASOS',4,10,NULL,2,'2020-05-01',b'1'),(513627,'BOTELLA INNO',7,10,NULL,2,'2020-05-01',b'1'),(629597,'WILD COUNTRY FREDOOM',15,10,NULL,1,'2020-05-01',b'1'),(629885,'SET MUSK MARTINE',10,10,NULL,1,'2020-05-01',b'1');

#
# Structure for table "tipo_campania"
#

DROP TABLE IF EXISTS `tipo_campania`;
CREATE TABLE `tipo_campania` (
  `idtipo_campania` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `categorias` int(11) NOT NULL,
  `estado` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idtipo_campania`),
  KEY `fk_tipo_campania_categorias1_idx` (`categorias`),
  CONSTRAINT `fk_tipo_campania_categorias1` FOREIGN KEY (`categorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "tipo_campania"
#

INSERT INTO `tipo_campania` VALUES (1,'FRAGANCIAS',1,'1'),(2,'HOGAR',2,'1'),(3,'MODAS',3,'1');

#
# Structure for table "campania"
#

DROP TABLE IF EXISTS `campania`;
CREATE TABLE `campania` (
  `idcampania` int(11) NOT NULL,
  `tipo_campania` int(11) NOT NULL,
  `codigocampania` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idcampania`),
  KEY `fk_campania_tipo_campania1_idx` (`tipo_campania`),
  CONSTRAINT `fk_campania_tipo_campania1` FOREIGN KEY (`tipo_campania`) REFERENCES `tipo_campania` (`idtipo_campania`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "campania"
#

INSERT INTO `campania` VALUES (1,1,'FRG06','FRAGANCIAS JUNIO','2020-06-01','2020-06-15',b'1'),(2,2,'HGR06','HOGAR JUNIO','2020-06-01','2020-06-15',b'1'),(3,3,'MOD06','MODA JUNIO','2020-06-01','2020-06-15',b'1');

#
# Structure for table "pedidos"
#

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `fechacreacion` date DEFAULT NULL,
  `usuario_add` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `montopedido` double DEFAULT NULL,
  `dui_cliente` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `pedidoscol` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idcampania` int(11) NOT NULL,
  `direccionentrega` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idformapago` int(11) NOT NULL,
  PRIMARY KEY (`idpedidos`),
  KEY `fk_pedidos_campania1_idx` (`idcampania`),
  KEY `fk_pedidos_formapago1_idx` (`idformapago`),
  CONSTRAINT `fk_pedidos_campania1` FOREIGN KEY (`idcampania`) REFERENCES `campania` (`idcampania`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_formapago1` FOREIGN KEY (`idformapago`) REFERENCES `formapago` (`idformapago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "pedidos"
#

INSERT INTO `pedidos` VALUES (1,'2020-12-01','ehernandez',1,'1','2020-12-01',1,NULL,1,'1',1),(2,'2020-05-24','019953820',70,'1','2020-06-08',5,'',1,'NO',2),(3,'2020-05-24','90',65,'90','2020-06-08',1,'',1,'yyyy',2),(4,'2020-05-24','100',76,'007','2020-06-08',2,'',3,'algún lugar de la mancha 123',2),(5,'2020-05-24','1743752001',26,'1743752001','2020-06-08',1,'',2,'jjfff',2),(6,'2020-05-24','100',84,'007','2020-06-08',1,'',2,'algún lugar de la mancha 123',3),(7,'2020-05-24','1743752001',33,'1743752001','2020-06-08',1,'',2,'jjfff',2),(8,'2020-05-24','1743752001',100,'1743752001','2020-06-08',1,'',3,'jjfff',2),(9,'2020-05-24','90',60,'90','2020-06-08',1,'',1,'yyyy',2),(10,'2020-05-24','90',6,'90','2020-06-08',1,'',3,'yyyy',1),(11,'2020-05-24','200',3888,'200','2020-06-08',2,'',1,'San Salvador',1),(12,'2020-05-24','1743752001',4,'1743752001','2020-06-08',1,'',2,'jjfff',2),(13,'2020-05-24','019953820',400,'200','2020-06-08',5,'',3,'San Salvador',2),(14,'2020-05-24','019953820',7,'90','2020-06-08',1,'',1,'yyyy',2);

#
# Structure for table "detallepedido"
#

DROP TABLE IF EXISTS `detallepedido`;
CREATE TABLE `detallepedido` (
  `iddetallepedido` int(11) NOT NULL AUTO_INCREMENT,
  `idpedidos` int(11) NOT NULL,
  `idproductos` int(11) NOT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`iddetallepedido`),
  KEY `fk_detallepedido_pedidos1_idx` (`idpedidos`),
  KEY `fk_detallepedido_productos1_idx` (`idproductos`),
  CONSTRAINT `fk_detallepedido_pedidos1` FOREIGN KEY (`idpedidos`) REFERENCES `pedidos` (`idpedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallepedido_productos1` FOREIGN KEY (`idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "detallepedido"
#

INSERT INTO `detallepedido` VALUES (237,3,175531,1,30),(238,3,1,1,35),(239,4,200260,2,24),(240,4,207690,1,10),(241,4,202318,3,6),(252,6,2,5,4),(253,6,506326,2,4),(254,6,513627,2,7),(255,6,502212,3,14),(258,5,2,1,4),(259,5,502212,1,14),(260,5,506326,2,4),(261,7,2,1,4),(262,7,506326,2,4),(263,7,513627,1,7),(264,7,513627,2,7),(265,8,200260,2,24),(266,8,3,1,40),(267,8,202318,1,6),(268,8,202318,1,6),(269,9,175531,2,30),(270,10,202318,1,6),(271,2,1,2,35),(281,12,2,1,4),(282,11,484781,36,12),(283,11,484781,36,12),(284,11,484781,36,12),(285,11,484781,36,12),(286,11,484781,36,12),(287,11,484781,36,12),(288,11,484781,36,12),(289,11,484781,36,12),(290,11,484781,36,12),(293,13,3,10,40),(294,14,208787,1,7);

#
# Structure for table "tipousuario"
#

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `tipo_usuario` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "tipousuario"
#

INSERT INTO `tipousuario` VALUES (1,'Administra','Administrador'),(2,'Consejero','Consejero'),(3,'Cliente','Cliente');

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `clave` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telcel` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `telfijo` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `fechacreacion` date DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `direccion1` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direccion2` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `usuario_add` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `fk_usuario_tipousuario1_idx` (`idtipousuario`),
  CONSTRAINT `fk_usuario_tipousuario1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (144,'Telmo Estrada','019953820','1307','telmoestrada@gmail.com','78878968','4545',2,'2020-05-20','2020-01-01',b'1','la misma','la misma',NULL),(157,'Lana','46287346-9','','lana@gmail.com','76873456','229044353',3,'2020-05-23','0000-00-00',b'1','col. palmeras','col. almendares','ehernandez'),(158,'Elmer Homero','987654321','7777','erick_7440@hotmail.com','777','7777',3,'2020-05-23','2020-05-24',b'1','yyy','hhhh','ehernandez'),(159,'prueba','1','pxj4012j','telmoestrada@gmail.com','78878968','777777',3,'2020-05-24','0000-00-00',b'1','NO','NO','019953820'),(160,'Elmer Homero','123456789','1234','telmoestrada@gmail.com','7777','8888',2,'2020-05-24','2020-05-24',b'1','jjjjj','jjjj','ehernandez'),(174,'erick moreno','04550154-6','excelente','erick_7440@hotmail.com','7841-6908','2994-7440',3,'2020-05-24','2020-01-01',b'1','col. montecristo','Santa elena','ehernandez'),(175,'Nori Navas','0987789087','1234','telmoestrada@gmail.com','888','8888',3,'2020-05-24','2020-01-01',b'1','jjjj','hhhh','019953820'),(177,'yyy','7','77','telmoestrada@gmail.com','667','777',3,'2020-05-24','2020-05-24',b'1','uuj','njj','019953820'),(178,'TE','89','89','telmoestrada@gmail.com','777','888',2,'2020-05-24','2020-01-01',b'1','uuuu','yuuu','019953820'),(179,'Eduardo Marroquín','100','lala123','eduar.gol07@gmail.com','77','77',2,'2020-05-24','2020-01-01',b'1','uu','jj','019953820'),(180,'Alex Morales','2537362011','bdghwa8q','2537362011@mail.utec.edu.sv','77','77',3,'2020-05-24','0000-00-00',b'1','jj','hh','019953820'),(181,'Roberto Surio','2555302011','159456','2555302011@mail.utec.edu.sv','88','88',3,'2020-05-24','2020-01-01',b'1','jj','jj','019953820'),(182,'David León','2542942016','kurosaki','2542942016@mail.utec.edu.sv','888','888',3,'2020-05-24','2020-01-01',b'1','jjj','hhh','019953820'),(183,'Pánfilo macedonio Krovstoki','007','w782nir6','eduar.gol07@gmail.com','78764343','21000000',3,'2020-05-24','0000-00-00',b'1','algún lugar de la mancha 123','segunda dirección fake 345','100'),(184,'tribilin escapulario lopez','008','o3zpqjmj','eduar.gol07@gmail.com','77890134','21000000',3,'2020-05-24','0000-00-00',b'1','dirección abc','dirección xyz','100'),(187,'Nelson Paiz','2544732011','1234','2544732011@mail.utec.edu.svccccc','877','uuu',2,'2020-05-24','2020-01-01',b'1','uuu','yyyy','019953820'),(188,'Jesús rivera','048931164','xm9lxbw0','nelson.paiz93@gmail.com','61360217','61360217',3,'2020-05-24','0000-00-00',b'1','San Salvador','San Salvador','2544732011'),(189,'Elmer Melada','01020304-9','a5acjmwp','telmoestrada@gmail.com','777','8888',3,'2020-05-24','0000-00-00',b'1','jjjjjjjjj','jjhhhgh','019953820'),(190,'Luis Barrera','1743752001','wg626lzz','1743752001@mail.utec.edu.sv','7777','66555',3,'2020-05-24','2020-01-01',b'1','jjfff','jhgf','019953820'),(191,'Uno','90','90','telmoestrada@gmail.com','87','888',3,'2020-05-24','2020-01-01',b'1','yyyy','yuyy','019953820'),(192,'Jorge Acevedo','200','1234','jorge.acevedo@mail.utec.edu.sv','678','678',3,'2020-05-24','2020-01-01',b'1','San Salvador','San Salvador','019953820');

#
# Structure for table "direccion"
#

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `iddireccion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `direccion` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`iddireccion`),
  KEY `fk_direccion_usuario_idx` (`idusuario`),
  CONSTRAINT `fk_direccion_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

#
# Data for table "direccion"
#

