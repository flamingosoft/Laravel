-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: laravel5.8    Database: laravel
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Nemo.','vel',NULL,NULL),(2,'Ab optio.','et',NULL,NULL),(3,'Et deleniti.','voluptas',NULL,NULL),(4,'Dolor.','est',NULL,NULL),(5,'Est autem.','autem',NULL,NULL),(6,'Sint.','quis',NULL,NULL),(7,'Asperiores nesciunt.','aut',NULL,NULL),(8,'Dolore sequi.','non',NULL,NULL),(9,'Debitis voluptatem.','molestiae',NULL,NULL),(10,'Officia et.','ut',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (85,'2014_10_12_000000_create_users_table',1),(86,'2014_10_12_100000_create_password_resets_table',1),(87,'2020_10_18_054131_init_news',1),(88,'2020_10_20_103117_init_categories',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` int(10) unsigned DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Sunt vero est.','Qui dolores ut aut. Et aperiam molestias minima accusantium cumque recusandae ratione. Fugiat assumenda eum commodi dolor rerum. Facilis consequatur provident voluptatem ipsa est et. Quas ipsum laborum aut consequuntur. Reiciendis deserunt laborum eos ad autem in sunt. Voluptatem molestias voluptatem perspiciatis recusandae laborum quas. Aut nesciunt dignissimos enim laboriosam dolore. Magnam eum ratione rerum qui non. Ut ad et vel id. Commodi reprehenderit non odit atque totam. Ab et qui ab nam rerum nulla labore. Et repellat quis quis. Accusamus tempore distinctio est quaerat aut eligendi rerum neque. Labore ea consequatur rerum odio. Quo quisquam fugit repellat. Similique quia hic explicabo quia similique velit veritatis. Non et animi voluptate dignissimos id. Voluptatem mollitia natus molestias. Molestiae laboriosam ut eveniet fuga suscipit impedit quam.',7,0,NULL,NULL,NULL),(2,'Minima consequatur provident.','Perferendis earum voluptatem a odio soluta aut. Provident eum aspernatur ut officiis vero quae reprehenderit. Eos alias harum itaque velit quaerat similique. Culpa sint sed nihil quae deleniti qui dignissimos. Qui aut est adipisci vel. Non odit quia qui animi cupiditate rerum in. Ut minus tenetur omnis voluptas perspiciatis itaque deserunt. Voluptas qui dolor occaecati vel. Est sed eos voluptas blanditiis consequatur suscipit placeat. Ut ducimus magni deserunt nostrum inventore qui. Eum voluptatibus non veniam deleniti eveniet possimus aut vel. Consequatur illo expedita dignissimos rerum. Modi veritatis non harum maxime voluptates totam animi eos. Praesentium est amet sit voluptatem id. Adipisci ut alias et harum. In tempore quia soluta aut occaecati iste laborum. Quo quia dolorem excepturi quos mollitia dolores voluptatibus. Fugiat eum minus expedita a.',5,0,NULL,NULL,NULL),(3,'Rerum exercitationem est consectetur sint.','Qui et est voluptas iste enim excepturi quas quo. Quia dolorum dolore iure sunt numquam vitae porro. Est et qui corporis qui non ipsa earum. Deserunt voluptate est fugit nostrum. Corrupti ratione cum eos recusandae. In commodi eum maxime delectus corporis. Maxime illum quo provident ab voluptatem unde. Mollitia eos perferendis quia officiis vitae. Dolore dolores dolores veritatis. Quas illum fugit illo aliquam. Quia animi quam rerum aut. Accusamus suscipit debitis quo et. Et aut nostrum placeat quod et incidunt perferendis ex. Facere et qui quidem nihil consequatur repudiandae quia. Aliquam voluptatum sed necessitatibus maxime. Accusamus ducimus voluptates eum id. Officiis sed autem et ad facilis velit expedita. Ea voluptate et unde vitae laborum nisi. Pariatur et id rerum aliquid tenetur. Aspernatur sit est aut ut eos voluptatum atque. Sapiente vitae facere placeat ut facilis et. Eum dolor et voluptate ipsam.',2,1,NULL,NULL,NULL),(4,'Saepe id eum.','Nihil ab molestias aliquam ex. Minus quis alias eos ut ut perferendis. Autem aut autem maxime corrupti nihil sed. Voluptatum quibusdam iusto consequatur harum et omnis eum. Nostrum quisquam aut sint recusandae doloremque eos dolorem ea. Accusantium et est voluptatum aut. Cumque vitae laboriosam quia tempore. Rem ipsam accusamus impedit et nihil ipsa distinctio. Iusto qui ad minima eaque qui. Autem est ipsam et eius. Praesentium unde culpa aut omnis illum. Velit est quibusdam ipsum explicabo dolorum mollitia. Quia quae sunt necessitatibus neque. Ab non omnis ea libero delectus qui suscipit. Quae est odit reprehenderit sint. Enim non facilis et sed enim cupiditate enim. Est id eum provident exercitationem ut in repellendus. Voluptas exercitationem in ad optio dicta qui rerum. Dolores beatae veniam consequatur impedit soluta dignissimos fuga quia.',0,0,NULL,NULL,NULL),(5,'Aliquid sit.','Eveniet totam totam ut. Consectetur accusamus repudiandae aliquid veritatis error et vitae laudantium. Ea est est molestiae porro. Asperiores necessitatibus officia aut ratione consequatur provident. Quam sunt nostrum veniam magnam dolorum cumque. Ratione pariatur eaque iusto voluptates quam. Nobis qui ut aperiam exercitationem minus nostrum. Doloribus qui atque eaque alias. Qui cum porro suscipit tempora sint repudiandae. Voluptate fugit blanditiis molestiae quibusdam dolorum et accusamus quia. Eveniet possimus amet necessitatibus quia aut sit sit ut. Minus deserunt eveniet alias. Quo voluptatem cum libero aliquam suscipit. Mollitia et ducimus magni est. Voluptate qui sed assumenda eos illo sint esse. Et sapiente asperiores eos et et. Eveniet aperiam rerum ab explicabo optio. Enim voluptatibus adipisci modi facilis magni rerum voluptatem. Ad nobis enim quasi et. In incidunt et voluptatem consequatur.',3,0,NULL,NULL,NULL),(6,'Pariatur expedita soluta.','Quisquam labore quisquam maiores adipisci tenetur. Aut molestiae nemo nostrum dignissimos dolorem quia. Iusto aut odio vitae. At deserunt doloribus voluptatem nisi non. Est dolorem illo esse ducimus. Suscipit pariatur deleniti voluptas id quia omnis. Dolorem aut incidunt atque pariatur minus. Earum quibusdam explicabo architecto voluptatem. Maiores debitis dolores est id sit. Officia voluptatem earum quos nemo dolores minima maiores. Repellat asperiores consequatur occaecati dolore. Et at ipsum aperiam nulla facilis esse. Quisquam ipsum quia nobis ratione et delectus libero omnis. Sint voluptate rem occaecati illo. Inventore non ut dolor et est velit. Velit dolor corporis repellat corporis. Quia praesentium quae architecto hic officiis enim iste. Quia dolorem maiores aliquam a et quibusdam eum velit. Ut unde alias et est. Cupiditate commodi nostrum a quos. Perferendis quia facilis mollitia neque. Deleniti molestiae veritatis accusantium incidunt.',7,0,NULL,NULL,NULL),(7,'Error non perspiciatis.','In sed dolorem eligendi alias vel atque exercitationem soluta. Ullam occaecati provident minus mollitia. Rerum cumque velit quia dolor consectetur earum sed atque. Modi odit et labore unde non et. Qui quod inventore enim ducimus iure. Sunt sed autem sit quasi quia voluptas. Veniam veritatis deserunt blanditiis earum. Ipsam officia quae modi fugit architecto odio asperiores. Unde quo ratione nihil minima. Explicabo rerum suscipit dicta aspernatur quos sequi rem alias. Sit laboriosam possimus quis ea provident. Voluptas debitis quis veritatis quibusdam. Illo explicabo blanditiis non molestias nostrum dolorem et. Nulla maxime autem perferendis. Excepturi repudiandae cum libero perspiciatis eligendi dolor vero ipsum. Nostrum suscipit sint occaecati voluptatem. Commodi delectus pariatur est sapiente iste dolore eum nostrum. Ad dignissimos vel esse rerum rem consequuntur. Omnis quasi quod dolore voluptatem.',5,0,NULL,NULL,NULL),(8,'Dolor dolorem et.','Eum eveniet quis quis dolores. Atque aliquam temporibus nihil. Facere dignissimos id voluptatem atque. Rem molestiae sed voluptas odio quae minus non corrupti. Velit fugit molestiae in quam veritatis dolor labore. Ab velit vel nihil aut enim quia. Quasi est veniam quibusdam dolorem dignissimos hic. Occaecati et corrupti voluptates inventore et architecto aut. Et omnis et et dolorum dolore repudiandae. Asperiores quas sit occaecati iste. Qui explicabo mollitia quos totam. Quo eum consequuntur asperiores iste cumque. Eum similique aut blanditiis consectetur non. Ullam et eius voluptatem itaque sapiente. Facilis illum cumque dolorem repellat nobis sed recusandae mollitia. Non ut nisi deleniti velit. Ut suscipit aut itaque rerum ut molestiae. Magni eos adipisci sunt veritatis vel a illum ut. Quasi consectetur repellat dolores aut. Omnis qui libero ducimus adipisci voluptatem eum. Ut officiis cupiditate voluptate nesciunt consectetur iste. Cum nostrum cupiditate atque.',8,1,NULL,NULL,NULL),(9,'Eos magnam magnam.','Voluptas asperiores aut est voluptas aperiam autem. Praesentium pariatur nobis reiciendis praesentium qui. Sit quia et blanditiis suscipit. Modi iusto beatae itaque consequatur. Qui qui laborum minima commodi ipsa adipisci reprehenderit. Eos a ipsam in eos tempora. Ad aut quam voluptatem dolor doloremque et. Eveniet velit nostrum qui velit aut tenetur cum. Eveniet quibusdam natus magnam cum. Sint provident sunt et officiis eos. Occaecati veritatis a facere reiciendis. Voluptatibus alias rerum culpa dignissimos amet ut. Consequatur voluptas cupiditate sed non aut assumenda. Voluptas facilis enim at eos in quo omnis. Architecto quo quia modi consequatur non. Modi sed qui veniam. Dolorem officia ducimus velit quasi accusamus voluptatem est sequi. Harum esse enim harum accusamus eius ullam. Dolor vitae non sint officiis ab ea velit. Sit ab voluptates sunt sed eum. Ea quas omnis voluptas pariatur. Et eligendi deserunt tenetur et omnis iste.',6,0,NULL,NULL,NULL),(10,'Voluptates ad.','Totam et quia fugit nulla non. Qui eaque autem corporis cupiditate nobis sint fuga. Fugiat numquam voluptatibus et. Occaecati in optio id dolorem ex quia. Unde qui rerum perferendis tempora consequatur dolorem aspernatur nihil. Sint reiciendis ullam nesciunt explicabo sit adipisci est nam. Nesciunt adipisci quia quia amet nisi et. Qui ea enim accusamus optio dignissimos. Consequuntur enim ea sed itaque voluptas aut. Praesentium adipisci ea nisi eligendi. Consequatur magni harum sit sit expedita et quaerat. Ut voluptas ut illum modi tenetur qui fuga. Ipsum et quisquam eveniet. Ex iusto sed odio beatae voluptatem vitae. Velit tempora accusantium non consequuntur aspernatur. Ipsum quasi enim libero pariatur at est ea. Eveniet cum ut quae debitis fugit. Eaque autem ipsam fugiat quasi et ratione. Quasi ea magnam consequatur in inventore alias qui. Adipisci quis dolorem est ut.',9,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laravel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-22  0:57:51
