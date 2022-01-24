/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.21 : Database - pos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pos`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` double NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`categoryid`,`category_name`) values (1,'Laptops'),(2,'Desktop PC\'s'),(3,'Tablets');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`userid`,`customer_name`,`address`,`contact`) values (2,'Muhammad ali','house:328 Block A gushan e zeal pak society site area Hyderabad, banglow','+923088337790');

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `inventory` */

insert  into `inventory`(`inventoryid`,`userid`,`action`,`productid`,`quantity`,`inventory_date`) values (3,2,'Purchase',1,99,'2017-09-18 09:32:01'),(7,2,'Purchase',3,12,'2017-09-18 11:09:22'),(11,2,'Purchase',3,2,'2018-11-02 16:01:08');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `supplierid` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`productid`,`categoryid`,`product_name`,`product_price`,`product_qty`,`photo`,`supplierid`) values (1,1,'DELL Inspiron 15 7000 15.6',899,891,'upload/1.jpg',4),(3,2,'DELL Inspiron 15 5000 15.6',599,975,'upload/3.jpg',4),(6,1,'DELL Inspiron 15 5000 15',449.99,1000,'upload/6.jpg',4),(10,2,'DELL Inspiron 5675 Gaming PC - Recon Blue',599.99,1000,'upload/10.jpg',4);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `salesid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_date` datetime NOT NULL,
  PRIMARY KEY (`salesid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

insert  into `sales`(`salesid`,`userid`,`sales_total`,`sales_date`) values (1,2,34,'2017-09-16 16:23:38'),(2,2,18,'2017-09-16 16:25:28'),(3,2,6,'2017-09-16 16:27:31'),(4,2,1014244,'2017-09-16 16:44:01'),(5,2,9588,'2017-09-18 09:06:29'),(6,2,88779,'2017-09-18 09:08:42'),(7,2,15579,'2017-09-18 09:09:34'),(8,2,112361,'2017-09-18 09:32:00'),(9,2,7990,'2017-09-18 09:34:29'),(10,2,18370,'2017-09-18 11:09:21'),(11,2,1198,'2018-11-02 16:01:08'),(12,2,799,'2019-02-10 20:30:04');

/*Table structure for table `sales_detail` */

DROP TABLE IF EXISTS `sales_detail`;

CREATE TABLE `sales_detail` (
  `sales_detailid` int(11) NOT NULL AUTO_INCREMENT,
  `salesid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sales_qty` double NOT NULL,
  PRIMARY KEY (`sales_detailid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `sales_detail` */

insert  into `sales_detail`(`sales_detailid`,`salesid`,`productid`,`sales_qty`) values (1,2,1,12),(2,2,2,10),(3,3,3,11),(4,4,2,50),(5,4,1,106),(6,4,5,1000),(7,5,2,12),(8,6,5,101),(9,7,1,10),(10,7,3,11),(11,8,4,10),(12,8,20,10),(13,8,1,99),(14,8,2,20),(15,9,2,10),(16,10,2,10),(17,10,3,12),(18,10,4,8),(19,11,3,2),(20,12,2,1);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `userid` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`userid`,`company_name`,`company_address`,`contact`) values (4,'Dell Computer Corporation','One Dell WayRound Rock, Texas 78682','1-800-WWW-DELL');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userid`,`username`,`password`,`access`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1),(2,'user','ee11cbb19052e40b07aac0ca060c23ee',2),(4,'supplier','99b0e8da24e29e4ccb5d7d76e677c2ac',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
