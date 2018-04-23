/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.31-MariaDB : Database - sushi_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sushi_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sushi_database`;

/*Table structure for table `cookorder` */

DROP TABLE IF EXISTS `cookorder`;

CREATE TABLE `cookorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cooking_status` varchar(20) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cookingorder_fk1` (`order_id`),
  KEY `cookingorder_fk2` (`employee_id`),
  CONSTRAINT `cookingorder_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cookingorder_fk2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cookorder` */

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

insert  into `employees`(`id`,`username`,`password`,`job_title`) values (1,'Jeffry','123','cashier'),(2,'Abam','123','waiter'),(3,'Willy','123','chef');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`price`,`category`) values (1,'Avocado Maki',15000,'reguler'),(2,'California Roll',10000,'reguler'),(3,'Dynamite Roll',13000,'reguler'),(4,'Ginza Roll',20000,'reguler'),(5,'Kaiso Nigiri',14000,'reguler'),(6,'Tamago Nigiri',8000,'reguler'),(7,'Takoyaki',7000,'reguler'),(8,'Pressed Matcha Juice',12000,'reguler'),(9,'Pressed Orange Juice',12000,'reguler'),(10,'Pressed Watermelon Juice',12000,'reguler'),(11,'Albacore Tuna',24000,'promo'),(12,'Albacore Tuna Nigiri',22000,'promo'),(13,'Assorted Nigiri Maki',36000,'promo'),(14,'Blossom Roll',20000,'promo'),(15,'Roll Selection',23000,'promo'),(16,'Salmon Selection',36000,'promo');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_orderfk2` (`menu_id`),
  CONSTRAINT `menu_orderfk2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

/*Table structure for table `paid` */

DROP TABLE IF EXISTS `paid`;

CREATE TABLE `paid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `paid_fk` (`menu_id`),
  CONSTRAINT `paid_fk` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `paid` */

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(20) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_fk1` (`employee_id`),
  CONSTRAINT `payment_fk1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`id`,`date`,`payment_method`,`employee_id`,`guest_id`) values (1,'2018-04-16 20:53:51','cash',1,1),(3,'2018-04-23 14:53:51','cash',1,1);

/* Trigger structure for table `payments` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pay1` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pay1` BEFORE INSERT ON `payments` FOR EACH ROW INSERT INTO paid (guest_id, menu_id, quantity)
  select guest_id, menu_id, quantity from orders where guest_id = new.guest_id */$$


DELIMITER ;

/* Trigger structure for table `payments` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pay2` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pay2` AFTER INSERT ON `payments` FOR EACH ROW delete from orders where guest_id = new.guest_id */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
