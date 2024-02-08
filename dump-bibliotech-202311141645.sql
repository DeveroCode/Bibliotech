-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: bibliotech
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_institucional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio_ingreso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autor_libro`
--

DROP TABLE IF EXISTS `autor_libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor_libro` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `autores_id` bigint unsigned NOT NULL,
  `libros_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `autor_libro_autores_id_foreign` (`autores_id`),
  KEY `autor_libro_libros_id_foreign` (`libros_id`),
  CONSTRAINT `autor_libro_autores_id_foreign` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `autor_libro_libros_id_foreign` FOREIGN KEY (`libros_id`) REFERENCES `libros` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor_libro`
--

LOCK TABLES `autor_libro` WRITE;
/*!40000 ALTER TABLE `autor_libro` DISABLE KEYS */;
INSERT INTO `autor_libro` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,3,2,NULL,NULL),(4,4,3,NULL,NULL),(5,5,3,NULL,NULL),(6,6,4,NULL,NULL),(7,7,5,NULL,NULL),(8,8,6,NULL,NULL),(9,9,6,NULL,NULL),(10,10,7,NULL,NULL),(11,11,8,NULL,NULL),(12,12,9,NULL,NULL),(13,13,10,NULL,NULL);
/*!40000 ALTER TABLE `autor_libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` VALUES (1,'wendell l. french','2023-11-15 03:41:55','2023-11-15 03:41:55'),(2,' cecil h. bell','2023-11-15 03:41:55','2023-11-15 03:41:55'),(3,'jerry n. luftman','2023-11-15 03:46:43','2023-11-15 03:46:43'),(4,'anne sigismund huff','2023-11-15 03:50:09','2023-11-15 03:50:09'),(5,' james oran huff','2023-11-15 03:50:09','2023-11-15 03:50:09'),(6,'rafael guizar montúfar','2023-11-15 03:53:31','2023-11-15 03:53:31'),(7,'allan afuah','2023-11-15 03:56:43','2023-11-15 03:56:43'),(8,'richard l. nolan','2023-11-15 03:59:51','2023-11-15 03:59:51'),(9,' david c. croson','2023-11-15 03:59:51','2023-11-15 03:59:51'),(10,'robert e. quinn','2023-11-15 04:02:39','2023-11-15 04:02:39'),(11,'david r. hampton','2023-11-15 04:12:03','2023-11-15 04:12:03'),(12,'bob guns','2023-11-15 04:16:42','2023-11-15 04:16:42'),(13,'gerard egan','2023-11-15 04:22:45','2023-11-15 04:22:45');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Sistemas computacionales','2023-11-15 03:33:50','2023-11-15 03:33:50'),(2,'Contaduría','2023-11-15 03:33:50','2023-11-15 03:33:50'),(3,'Mecatrónica','2023-11-15 03:33:50','2023-11-15 03:33:50'),(4,'Electromecánica','2023-11-15 03:33:50','2023-11-15 03:33:50'),(5,'Gestión empresarial','2023-11-15 03:33:50','2023-11-15 03:33:50'),(6,'Industrial','2023-11-15 03:33:50','2023-11-15 03:33:50'),(7,'Electrónica','2023-11-15 03:33:50','2023-11-15 03:33:50'),(8,'Revista','2023-11-15 03:33:50','2023-11-15 03:33:50'),(9,'CD o Video','2023-11-15 03:33:50','2023-11-15 03:33:50');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estantes`
--

DROP TABLE IF EXISTS `estantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estantes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estantes`
--

LOCK TABLES `estantes` WRITE;
/*!40000 ALTER TABLE `estantes` DISABLE KEYS */;
INSERT INTO `estantes` VALUES (1,'Diccionarios A','2023-11-15 03:33:50','2023-11-15 03:33:50'),(2,'Enciclopedia A','2023-11-15 03:33:50','2023-11-15 03:33:50'),(3,'Ética BJ','2023-11-15 03:33:50','2023-11-15 03:33:50'),(4,'Economía HB','2023-11-15 03:33:50','2023-11-15 03:33:50'),(5,'Calidad HD','2023-11-15 03:33:50','2023-11-15 03:33:50'),(6,'Estadística','2023-11-15 03:33:50','2023-11-15 03:33:50'),(7,'Mercadotecnia','2023-11-15 03:33:50','2023-11-15 03:33:50'),(8,'Recursos Humanos HF','2023-11-15 03:33:50','2023-11-15 03:33:50'),(9,'Contaduría HF','2023-11-15 03:33:50','2023-11-15 03:33:50'),(10,'Auditoria HF','2023-11-15 03:33:50','2023-11-15 03:33:50'),(11,'Matemáticas Financieras HF','2023-11-15 03:33:50','2023-11-15 03:33:50'),(12,'Finanzas HG','2023-11-15 03:33:50','2023-11-15 03:33:50'),(13,'Sociología HM','2023-11-15 03:33:50','2023-11-15 03:33:50'),(14,'Derecho KFG','2023-11-15 03:33:50','2023-11-15 03:33:50'),(15,'Derecho KGF','2023-11-15 03:33:50','2023-11-15 03:33:50'),(16,'Metodología de la investigación Q','2023-11-15 03:33:50','2023-11-15 03:33:50'),(17,'Matemáticas Discretas QA','2023-11-15 03:33:50','2023-11-15 03:33:50'),(18,'Calculo QA','2023-11-15 03:33:50','2023-11-15 03:33:50'),(19,'Física QD','2023-11-15 03:33:50','2023-11-15 03:33:50'),(20,'Seguridad Industrial T','2023-11-15 03:33:50','2023-11-15 03:33:50'),(21,'Investigación de Operaciones T','2023-11-15 03:33:50','2023-11-15 03:33:50'),(22,'Auto Cad T','2023-11-15 03:33:50','2023-11-15 03:33:50'),(23,'Ingeniería Economica','2023-11-15 03:33:50','2023-11-15 03:33:50'),(24,'Ciencias de Materiales TA','2023-11-15 03:33:50','2023-11-15 03:33:50'),(25,'Mecatrónica TJ','2023-11-15 03:33:50','2023-11-15 03:33:50'),(26,'Guía Para Mediciones Eléctricas TK','2023-11-15 03:33:50','2023-11-15 03:33:50'),(27,'Circuitos Eléctricos TK','2023-11-15 03:33:50','2023-11-15 03:33:50'),(28,'Dispositivos Electrónicos TK','2023-11-15 03:33:50','2023-11-15 03:33:50'),(29,'Refrigeración TP','2023-11-15 03:33:50','2023-11-15 03:33:50'),(30,'Manual de Ingeniería Industrial TS','2023-11-15 03:33:50','2023-11-15 03:33:50'),(31,'Administración de operaciones TS','2023-11-15 03:33:50','2023-11-15 03:33:50'),(32,'Calidad TS','2023-11-15 03:33:50','2023-11-15 03:33:50'),(33,'Diseño digital TK','2023-11-15 03:33:50','2023-11-15 03:33:50'),(34,'Clasificación Pendiente','2023-11-15 03:33:50','2023-11-15 03:33:50');
/*!40000 ALTER TABLE `estantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headers`
--

DROP TABLE IF EXISTS `headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `headers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headers`
--

LOCK TABLES `headers` WRITE;
/*!40000 ALTER TABLE `headers` DISABLE KEYS */;
/*!40000 ALTER TABLE `headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro_prestamo`
--

DROP TABLE IF EXISTS `libro_prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libro_prestamo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `alumno_id` bigint unsigned NOT NULL,
  `libro_id` bigint unsigned NOT NULL,
  `prestamo_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `libro_prestamo_alumno_id_foreign` (`alumno_id`),
  KEY `libro_prestamo_libro_id_foreign` (`libro_id`),
  KEY `libro_prestamo_prestamo_id_foreign` (`prestamo_id`),
  CONSTRAINT `libro_prestamo_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `libro_prestamo_libro_id_foreign` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`) ON DELETE CASCADE,
  CONSTRAINT `libro_prestamo_prestamo_id_foreign` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro_prestamo`
--

LOCK TABLES `libro_prestamo` WRITE;
/*!40000 ALTER TABLE `libro_prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `libro_prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edicion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paginas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicado` int NOT NULL DEFAULT '1',
  `user_id` bigint unsigned NOT NULL,
  `estante_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libros_isbn_unique` (`isbn`),
  KEY `libros_categoria_id_foreign` (`categoria_id`),
  KEY `libros_user_id_foreign` (`user_id`),
  KEY `libros_estante_id_foreign` (`estante_id`),
  CONSTRAINT `libros_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `libros_estante_id_foreign` FOREIGN KEY (`estante_id`) REFERENCES `estantes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `libros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES (1,'2023-11-15 03:41:55','2023-11-15 03:41:55','desarrollo organizacional','méxico pearson educación','5','375',2,'2023-11-14',12,'968-880-584-X','esta obra de fácil comprensión ofrece una moderna exploración de la base teórica y de las aplicaciones prácticas del desarrollo organizacional. totalmente revisada y actualizada, refleja las tendencias recientes en el empleo del do, su expansión hacia nuevas áreas, las investigaciones actuales y una evaluación de las capacidades y limitaciones del do.','L5Q11tb9U0R9U1ixkeB563SQK7rAEkecMclH2Yg5.jpg',1,1,5),(2,'2023-11-15 03:46:43','2023-11-15 03:46:43','la competencia en la era de la información','méxico oxford','1','418',2,'2023-11-14',3,'970-613-551-0','la competencia en la era de la información\n\nla nueva habilidad determinante del ejecutivo del siglo xxi será comprender la forma como agrega valor la tecnología de información. Éste es un hecho axiomático hoy día, y en esta obra los gerentes y eje- cutivos encontrarán conceptos que constituyen una significativa contribución para comprender el valor que proporciona la inversión en sistemas de información.\n\njoseph f. movizzo, gerente general, grupo consultor de ibm','0jQovjozVIqhMcafDSHfxrGBxJBNKPehZ62V78rO.jpg',1,1,5),(3,'2023-11-15 03:50:09','2023-11-15 03:50:09','el cambio estratégico','méxico oxford','1','380',2,'2023-11-14',5,'970-613-635-5','esta obra es el resultado del empeño de los autores por integrar, en un solo marco conceptual, las demandas y manifestaciones tanto del cambio como de la continuidad. en sus diversos capítu- los se examinan, en secuencia, los procesos de cambio en los ni- veles individual, grupal, de la empresa y de la industria. en suma, se ofrece una visión integral del momento y los objetivos por los cuales las compañías cambian de orientación estratégica, de la dirección que seguirán y del grado en el que habrán de cambiar.\n\nel libro se escribió teniendo presentes distintos públicos que comparten intereses. en términos muy generales los autores consideran que, en el ámbito de la estrategia, las teorías cognos- citivas deben colocarse junto a las teorías económicas y del comportamiento como base de ese campo de conocimiento.','2wpBHhEiDzpavp57amOz5LW0nsuDLSjHfxeUwjgX.jpg',1,1,5),(4,'2023-11-15 03:53:31','2023-11-15 03:53:31','desarrollo organizacional','méxico mc graw hill','2','405',2,'2023-11-14',1,'970-10-4239-5','la segunda edición de desarrollo organizacional, presenta un claro horizonte del novedoso campo de esta materia, considerado ahora en su segunda generación como administración del cambio, o transfor- mación organizacional, en las empresas latinoamericanas','sXyLvZ3bJSnqIigmsA0OgXEUaqUrMz4qT5Sp7BoB.jpg',1,1,5),(5,'2023-11-15 03:56:43','2023-11-15 03:56:43','la dinámica de la innovación organizacional','méxico oxford','1','496',2,'2023-11-14',3,'970-618-448-8','\neste libro es excelente y llena una gran laguna en la bibliografia, puesto que tiende un puente entre las publicaciones sobre economia y sobre dirección. será un libro sumamente útil para los estudiantes en todas partes.\n\nchris freeman, university of sussex afuah ha escrito un texto excelente, que es ejemplar por su base de investigación académica y envergadura. es notable la amplitud de los temas tratados, que abarcan desde modelos de innovación hasta la globalización. los conceptos se explican con claridad y se ilustran con excelentes ejemplos.\n\nconstance e. helfat, university of pennsylvania','Pf8tvtSssxGbe2C3YjnEBP611dh6Xs47KzxDewVJ.jpg',1,1,5),(6,'2023-11-15 03:59:51','2023-11-15 03:59:51','destrucción creativa','méxico mc graw hill','1','256',2,'2023-11-14',1,'970-10-1260-7','rico en detalles y una conceptualización rigurosa en extremo. los autores han estat un bestseller. la destrucción creativa nos lleva del aniquilamiento de las jerarquías la creación de redes.\n\nahora, en un solo libro, encontrará el lector una guía completa para los especialistas los estudiantes, un modelo completo de la transformación y el cambio','KHWN9rDnmBFRwKvhGVsrfmO0OWu5amPVavAaI4dw.jpg',1,1,5),(7,'2023-11-15 04:02:39','2023-11-15 04:02:39','sabiduría para el cambio','méxico jossey-bass','1','236',2,'2023-11-14',2,'968-880-910-1','si desea que afloren sus dotes de líder, si anhela motivar a quienes lo rodean o si sueña con una vida laboral llena de satisfacciones, este libro es para usted.\n\n\"el control es lo fundamental en todo gerente de éxito, pero para lograrlo es necesario efectuar cambios tanto en lo personal como en lo relacionado con la empresa en la que se trabaja. sabiduría para el cambio llega al meollo de cómo cambiar para tal fin y guía lector por la senda de la transformación personal.\"\n\nal -jerry l. porras, catedrático de cambio y comportamiento organizacional de la escuela de administración de stanford. es autor del libro built to last','jotKXmPWy1rpRN3yGVhxTzPh2F65AV8kPtmqEnJU.jpg',1,1,5),(8,'2023-11-15 04:12:03','2023-11-15 04:12:03','conceptos de comportamiento en administración','méxico ediciones contables y administrativas','1','183',2,'2023-11-14',1,'S/N','es de todos conocido el creciente desarrollo ha experimentado la administración desde la segunda guerra mundial. sin embargo, duran- te mucho tiempo la enseñanza de la administración ha girado en torno a la presentación de un conjunto de principios administrativos. estos principios fueron resumidos en forma de receta, para que los estudian que tes memorizaran las funciones de los administradores: planeación, organización, integración, dirección, coordinación, información y presupuestos.la mayoría de los textos populares sobre administración todavía están estructurados con alguna variante de esas funciones.','8dAc7I53XZAfygTSAoUxHWLAMsu7iYtA2yO0W0tI.jpg',1,1,5),(9,'2023-11-15 04:16:42','2023-11-15 04:16:42','aprendizaje organizacional','méxico prentice-hall hispanoamerica','1','130',2,'2023-11-14',2,'968-880-733-8','en el mes de mayo de 1961, tres años después que la unión soviética pusiera en órbita el primer satélite artificial, el presidente john f. kennedy se presentó ante el congreso de estados unidos y manifestó algo inimaginable: \"creo que antes de que termine esta década, nuestra nación debe hacer el compromiso de poner un hombre en la luna...\" inspirada por estas palabras, la nasa aceleró su jornada hacia ese reto tecnológico sin paralelo y, durante algún tiempo, se volvió una organización de rápido aprendizaje.','vF5PVmlSVxH5wp1bfZUmXO4KkUjQ9QAJQ8ouHRjf.jpg',1,1,5),(10,'2023-11-15 04:22:45','2023-11-15 04:22:45','el valor agregado de los empleados en las organizaciones','méxico prentice-hall hispanoamerica','1','276',2,'2023-11-14',8,'968-880-785-0','gerard egan identifica las tÉcnicas y las estrategias que se requieren para sacar ventajas econÓmicas del lado oculto y fuerte de la competencia\n\n\"gerry egan se enfoca en el lado oculto de cualquier empresa u organización: aquellas prácticas y creencias informales e implicitas que distinguen a una compañía de las otras. su lúcida aportación es valiosa para todos aquellos que piensan de verdad en el cambio fundamental.\"','iPvWcq2osxyLua4o1kIrEFNHbRkHhv8apLnbD9SR.jpg',1,1,5);
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_03_17_024429_add_rol_to_users_table',1),(6,'2023_03_18_232922_create_libro_table',1),(7,'2023_03_19_033515_create_categorias_table',1),(8,'2023_03_19_043624_add_columns_to_libros_table',1),(9,'2023_03_22_044712_create_table_autor',1),(10,'2023_03_23_031856_create_autor_libro_table',1),(11,'2023_04_21_024213_create_headers_table',1),(12,'2023_04_29_192055_create_estantes_table',1),(13,'2023_04_29_192924_add_columns_to_libros_table',1),(14,'2023_06_12_024247_create_alumnos_table',1),(15,'2023_09_29_000955_create_prestamos_table',1),(16,'2023_09_29_001122_add_columns_to_prestamos',1),(17,'2023_10_02_003350_create_libro_prestamo_table',1),(18,'2023_10_09_230609_create_tipo_prestamos_table',1),(19,'2023_10_09_235354_add_columns_to_prestamos',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestamos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `cantidad` int NOT NULL,
  `folio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_prestamo_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prestamos_user_id_foreign` (`user_id`),
  KEY `prestamos_tipo_prestamo_id_foreign` (`tipo_prestamo_id`),
  CONSTRAINT `prestamos_tipo_prestamo_id_foreign` FOREIGN KEY (`tipo_prestamo_id`) REFERENCES `tipo_prestamos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `prestamos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamos`
--

LOCK TABLES `prestamos` WRITE;
/*!40000 ALTER TABLE `prestamos` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_prestamos`
--

DROP TABLE IF EXISTS `tipo_prestamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_prestamos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_prestamos`
--

LOCK TABLES `tipo_prestamos` WRITE;
/*!40000 ALTER TABLE `tipo_prestamos` DISABLE KEYS */;
INSERT INTO `tipo_prestamos` VALUES (1,'Primer préstamo','2023-11-15 03:33:50','2023-11-15 03:33:50'),(2,'Renovación','2023-11-15 03:33:50','2023-11-15 03:33:50');
/*!40000 ALTER TABLE `tipo_prestamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mari Sanchez','msanchez@code.com','$2y$10$usgFs4TSgH8vF.T9J297zuHjhwBdfsisLhBzgABv30yqB2ZxX38w.',NULL,'2023-11-15 03:33:50','2023-11-15 03:33:50',1),(2,'Meli Gameros','gmeli@code.com','$2y$10$xfgU6dawJqbbJYfTIxyHk.jWBoih.DK/An5ZnJulzXghZktY5/jpi',NULL,'2023-11-15 03:33:50','2023-11-15 03:33:50',1),(3,'Carlos Martinez','devero@code.com','$2y$10$Joord77E5wEPVj6spHAIouJAwBlpcQn1uy7wKU9L2UW7t5YUgOd3O',NULL,'2023-11-15 03:33:50','2023-11-15 03:33:50',1),(4,'Edgar Devero','edgar@devero.com','$2y$10$sP9l0W4zvil871opm33Qf.eBDW.NCehBAm5OAWcz6W41ArWBE5rxu',NULL,'2023-11-15 03:33:50','2023-11-15 03:33:50',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bibliotech'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-14 16:45:36
