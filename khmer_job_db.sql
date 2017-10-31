/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.11 : Database - khmer_job_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`khmer_job_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `khmer_job_db`;

/*Table structure for table `tbl_account` */

DROP TABLE IF EXISTS `tbl_account`;

CREATE TABLE `tbl_account` (
  `acc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acc_code` varchar(50) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_pass` varchar(100) NOT NULL,
  `acc_company` varchar(100) DEFAULT NULL,
  `acc_gender` char(1) NOT NULL,
  `acc_email` varchar(100) DEFAULT NULL,
  `acc_phone` char(15) DEFAULT NULL,
  `acc_addr` text,
  `acc_website` char(100) DEFAULT NULL,
  `acc_status` tinyint(1) NOT NULL,
  `acc_photo` varchar(150) DEFAULT NULL,
  `acc_desc` text,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` decimal(10,0) NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`acc_id`),
  UNIQUE KEY `acc_code` (`acc_code`,`acc_email`,`acc_phone`,`acc_website`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_account` */

insert  into `tbl_account`(`acc_id`,`acc_code`,`acc_name`,`acc_pass`,`acc_company`,`acc_gender`,`acc_email`,`acc_phone`,`acc_addr`,`acc_website`,`acc_status`,`acc_photo`,`acc_desc`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (28,'KJ-000001','Choumeng','7c222fb2927d828af22f592134e8932480637c0d','company','m','choumengit@gmail.com','086830867','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','www.webtech-solution.com',1,'myAvatar Meng.png','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','N/A',2017,'admin','2017-05-17'),(30,'KJ-000002','Boy','7c222fb2927d828af22f592134e8932480637c0d','company','m','nharboy99@gmail.com','070834493','zvz','www.webtech.com',0,'1.png','zxcvzcvz','N/A',2017,'N/A','2017-05-19'),(44,'KJ-000003','ff','7c4a8d09ca3762af61e59520943dc26494f8941b','individual','m','nharboy9d9@gmail.com','4435453242','zxczxc','sdd',1,'','zxczC','N/A',2017,NULL,NULL),(45,'KJ-000004','cheata','a9ff894aba806726ab4ee6fea3df09b66ac4fe87','individual','f','socheatayi@gmail.com','070700129','phomn penh','',1,'house-icon-green-hi.png','student','N/A',2017,NULL,NULL),(46,'KJ-000005','Hang Samnang','2fb5e13419fc89246865e7a324f476ec624e8740','individual','m','hang.samnang@gmail.com','017356865','Chbar Ampov, Meanchey, Phnom Peng, Cambodia.','',1,'tiger-1.jpg','Hello my name is Hang Samnang.','N/A',2017,NULL,NULL),(47,'KJ-000006','BoyNhor','7c222fb2927d828af22f592134e8932480637c0d','individual','m','nhorboy90@gmail.com','070834493','PP','Amppil.com',1,'myAvatar Boy.png','hi Boy','N/A',2017,NULL,NULL),(48,'KJ-000007','sophea','20eabe5d64b0e216796e834f52d61fd0b70332fc','individual','m','sophea79bo@gmail.com','0969742547','sfsdffffffffffffffffffffffffffffffffff','',1,'5069.png','fdsssssssssssssssssssssssssssssss','N/A',2017,NULL,NULL),(51,'KJ-000008','chheng samnang','40bd001563085fc35165329ea1ff5c5ecbdbbeef','company','m','samnang164@gmail.com','070893164','Phnom Penh, Cambodia.','www.amppil.com',0,'identicon.png','This is a sample description.','N/A',2017,'N/A','2017-07-26'),(52,'KJ-000009','nhar boy','7c4a8d09ca3762af61e59520943dc26494f8941b','company','m','nharboy98@gmail.com','0123123120','This is a sample address.','www.website.com',1,'github-mark.png','This is a sample description','N/A',2017,NULL,NULL);

/*Table structure for table `tbl_bundle_package` */

DROP TABLE IF EXISTS `tbl_bundle_package`;

CREATE TABLE `tbl_bundle_package` (
  `bp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bp_code` varchar(50) DEFAULT NULL,
  `acc_id` int(10) unsigned NOT NULL,
  `key_id` int(11) DEFAULT NULL,
  `ads_id` int(11) DEFAULT NULL,
  `type` char(4) NOT NULL DEFAULT '0',
  `date_from` date NOT NULL,
  `bp_status` varchar(50) NOT NULL,
  `bp_action` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`bp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_bundle_package` */

insert  into `tbl_bundle_package`(`bp_id`,`bp_code`,`acc_id`,`key_id`,`ads_id`,`type`,`date_from`,`bp_status`,`bp_action`,`date_crea`,`date_update`) values (60,'KJBP-000001',51,111,NULL,'0','2017-10-11','Published','Done','2017-10-13',NULL);

/*Table structure for table `tbl_captcha` */

DROP TABLE IF EXISTS `tbl_captcha`;

CREATE TABLE `tbl_captcha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cap_id` tinyint(100) NOT NULL,
  `cap_code` char(100) NOT NULL,
  `cap_name` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_captcha` */

insert  into `tbl_captcha`(`id`,`cap_id`,`cap_code`,`cap_name`) values (1,100,'H9RS','capt.jpg'),(2,101,'BNR5','capt1.jpg'),(3,102,'Y896','capt2.jpg'),(4,103,'SW9J','capt3.jpg'),(5,104,'ND9T','capt4.jpg'),(6,105,'A4HY','capt5.jpg'),(7,106,'XR94','capt6.jpg'),(8,108,'85E9','capt8.jpg'),(9,109,'HRDX8','capt9.jpg'),(10,110,'HSB9W','capt10.jpg'),(11,111,'9T4JW','capt11.jpg'),(12,112,'SREMD','capt12.jpg'),(13,113,'AWRTB','capt13.jpg'),(14,107,'9Y548','capt7.jpg');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_type` char(4) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_name_kh` varchar(100) DEFAULT NULL,
  `cat_desc` text,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`cat_id`,`cat_type`,`cat_name`,`cat_name_kh`,`cat_desc`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (33,'cv','Account & Finance','គណនេយ្យ និង ហិរញ្ញវត្ថុ','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(32,'cv','Sale & marketing','ការលក់ និង​ ទីផ្សារ','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(34,'cv','Clinic & Hospital','អ្នកឯកទេសពេទ្យធ្មេញ និង ពេទ្យទូទៅ ','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(39,'jb','Business & Trading','ជំនួួួញ និង ការជួញដូរ','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(40,'jb','Beauty & Fashion','ការរក្សាសម្ភស៏ និង រចនាម៉ូត','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(41,'jb','Arts & Tradition','សិល្បះ និង ប្រពៃណី','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(42,'sk','Language translation','អ្នកបកប្រែភាសា','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(43,'sk','Tourism & Travel agent','អ្នកបកប្រែ និង នៃភ្ញៀវ','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(44,'sk','IT(Information Technology)','ពត៏មានវិទ្យា','<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL);

/*Table structure for table `tbl_contact_us` */

DROP TABLE IF EXISTS `tbl_contact_us`;

CREATE TABLE `tbl_contact_us` (
  `cnt_us_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `phone1` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `phone3` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `addr` text,
  `fb_messager` varchar(100) DEFAULT NULL,
  `whatApp` varchar(100) DEFAULT NULL,
  `line` varchar(100) DEFAULT NULL,
  `viber` varchar(100) DEFAULT NULL,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`cnt_us_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contact_us` */

insert  into `tbl_contact_us`(`cnt_us_id`,`phone1`,`phone2`,`phone3`,`email`,`addr`,`fb_messager`,`whatApp`,`line`,`viber`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (6,'086830867','098765432','0987654321','choumengit@gmail.com','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','choumeng/fb','choumeng/whatapp','choumeng/line','choumeng/viber','admin','2017-03-20','admin','2017-05-17');

/*Table structure for table `tbl_cv_paid_search` */

DROP TABLE IF EXISTS `tbl_cv_paid_search`;

CREATE TABLE `tbl_cv_paid_search` (
  `cps_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cps_code` varchar(50) DEFAULT NULL,
  `acc_id` int(10) unsigned NOT NULL,
  `type` char(4) NOT NULL DEFAULT '0',
  `bp_id` int(11) DEFAULT NULL,
  `ads_id` int(11) DEFAULT NULL,
  `hour` int(10) unsigned DEFAULT NULL,
  `remain_hour` datetime NOT NULL,
  `date_from` date NOT NULL,
  `cps_status` varchar(50) DEFAULT NULL,
  `cps_action` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cps_id`),
  FULLTEXT KEY `cps_status` (`cps_status`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cv_paid_search` */

insert  into `tbl_cv_paid_search`(`cps_id`,`cps_code`,`acc_id`,`type`,`bp_id`,`ads_id`,`hour`,`remain_hour`,`date_from`,`cps_status`,`cps_action`) values (51,'KJCPS-000001',28,'0',NULL,NULL,1,'0000-00-00 00:00:00','2017-05-18','Expired','Renew'),(48,NULL,28,'Free',47,NULL,8,'0000-00-00 00:00:00','2017-05-18','Published','Done'),(47,NULL,28,'Free',47,NULL,8,'0000-00-00 00:00:00','2017-05-18','Published','Done'),(46,NULL,28,'Free',47,NULL,8,'0000-00-00 00:00:00','2017-05-18','Published','Done'),(63,NULL,30,'Free',51,NULL,8,'0000-00-00 00:00:00','2017-05-23','Submited','Pending'),(53,NULL,30,'Free',48,NULL,8,'0000-00-00 00:00:00','2017-05-19','Submited','Pending'),(54,NULL,30,'Free',49,NULL,8,'0000-00-00 00:00:00','2017-05-19','Submited','Pending'),(55,NULL,30,'Free',NULL,55,8,'0000-00-00 00:00:00','2017-05-20','Submited','Pending'),(56,NULL,30,'Free',49,NULL,8,'0000-00-00 00:00:00','2017-05-20','Submited','Pending'),(57,NULL,30,'Free',49,NULL,8,'0000-00-00 00:00:00','2017-05-20','Submited','Pending'),(58,NULL,30,'Free',50,NULL,8,'0000-00-00 00:00:00','2017-05-20','Submited','Pending'),(59,NULL,30,'Free',NULL,56,8,'0000-00-00 00:00:00','2017-05-20','Submited','Pending'),(60,NULL,30,'Free',50,NULL,8,'0000-00-00 00:00:00','2017-05-20','Submited','Pending'),(61,NULL,30,'Free',50,NULL,8,'0000-00-00 00:00:00','2017-05-21','Submited','Pending'),(62,NULL,30,'Free',51,NULL,8,'0000-00-00 00:00:00','2017-05-22','Submited','Pending'),(64,NULL,30,'Free',52,NULL,8,'0000-00-00 00:00:00','2017-05-23','Submited','Pending'),(67,'KJCPS-000002',30,'0',NULL,NULL,1,'0000-00-00 00:00:00','2017-05-23','Submited','Pending'),(66,NULL,30,'Free',52,NULL,8,'0000-00-00 00:00:00','2017-05-23','Submited','Pending'),(68,NULL,30,'Free',52,NULL,8,'0000-00-00 00:00:00','2017-05-24','Submited','Pending'),(69,'KJCPS-000003',46,'0',NULL,NULL,1,'0000-00-00 00:00:00','2017-05-27','Submited','Pending'),(70,'KJCPS-000004',49,'0',NULL,NULL,8,'2017-06-25 05:54:34','2017-06-24','Published','Done'),(71,NULL,51,'Free',NULL,59,8,'2017-10-18 00:19:56','2017-07-12','Expired','Renew'),(84,'KJCPS-000005',51,'0',NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00','Published','Done'),(85,NULL,51,'Free',55,NULL,8,'2017-10-18 00:19:56','2017-10-02','Expired','Renew'),(86,NULL,51,'Free',56,NULL,8,'2017-10-18 00:19:56','2017-10-02','Expired','Renew'),(87,NULL,51,'Free',57,NULL,8,'2017-10-18 00:19:56','2017-10-11','Expired','Renew'),(88,NULL,51,'Free',58,NULL,8,'2017-10-18 00:19:56','2017-10-11','Expired','Renew'),(89,NULL,51,'Free',59,NULL,8,'2017-10-18 00:19:56','2017-10-11','Expired','Renew'),(90,NULL,51,'Free',59,NULL,8,'2017-10-18 00:19:56','2017-10-11','Expired','Renew'),(91,NULL,51,'Free',60,NULL,8,'2017-10-18 00:19:56','2017-10-13','Expired','Renew');

/*Table structure for table `tbl_location` */

DROP TABLE IF EXISTS `tbl_location`;

CREATE TABLE `tbl_location` (
  `loc_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(100) NOT NULL,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_location` */

insert  into `tbl_location`(`loc_id`,`loc_name`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (1,'Phnom Penh','admin','2017-03-20','admin','2017-03-20'),(2,'Kompong Cham','admin','2017-03-28',NULL,NULL),(3,'Batombong','admin','2017-04-24',NULL,NULL);

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acc_id` int(10) unsigned NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `VAT` int(10) unsigned DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL,
  `pay_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_payment` */

insert  into `tbl_payment`(`pay_id`,`acc_id`,`type`,`VAT`,`pay_date`,`pay_by`) values (122,30,'job',0,'2017-05-19 08:35:31','walk_in'),(123,30,'job',0,'2017-05-19 13:19:04','walk_in'),(124,30,'skill',0,'2017-05-21 18:00:02','walk_in'),(125,30,'skill',0,'2017-05-21 18:08:14','walk_in'),(126,30,'skill',0,'2017-05-21 18:10:44','walk_in'),(127,30,'cv',0,'2017-05-21 18:13:11','walk_in'),(128,30,'ads',0,'2017-05-21 18:15:38','walk_in'),(129,30,'job',0,'2017-05-21 18:30:32','walk_in'),(130,30,'bp',0,'2017-05-21 18:39:07','walk_in'),(131,51,'cv',0,'2017-08-14 13:35:08','walk_in');

/*Table structure for table `tbl_payment_detail` */

DROP TABLE IF EXISTS `tbl_payment_detail`;

CREATE TABLE `tbl_payment_detail` (
  `pay_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_id` int(11) NOT NULL,
  `post_code` varchar(50) DEFAULT NULL,
  `price` decimal(18,2) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  `ads_location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pay_det_id`,`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_payment_detail` */

insert  into `tbl_payment_detail`(`pay_det_id`,`pay_id`,`post_code`,`price`,`duration`,`discount`,`priority`,`ads_location`) values (93,122,'KJJB-000001',7.50,15,0,'Standard',NULL),(94,123,'KJJB-000002',7.50,15,0,'Standard',NULL),(95,124,'KJSK-000002',35.00,365,0,NULL,NULL),(96,125,'KJSK-000002',35.00,365,0,NULL,NULL),(97,126,'KJSK-000002',35.00,365,0,NULL,NULL),(98,127,'KJCV-000001',25.00,365,0,'Premium',NULL),(99,128,'KJAD-000002',250.00,90,0,NULL,'Side'),(100,128,'KJAD-000003',100.00,30,0,NULL,'Side'),(101,129,'KJJB-000003',10.00,30,0,'Standard',NULL),(102,130,'KJBP-000002',150.00,30,NULL,NULL,NULL),(103,131,'KJCV-000001',25.00,365,0,'Premium',NULL);

/*Table structure for table `tbl_payment_info` */

DROP TABLE IF EXISTS `tbl_payment_info`;

CREATE TABLE `tbl_payment_info` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `key_id` tinyint(4) DEFAULT NULL,
  `file` varbinary(200) DEFAULT NULL,
  `description` text,
  `date_crea` date DEFAULT NULL,
  `user_crea` varbinary(50) DEFAULT NULL,
  `date_upt` date DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_payment_info` */

insert  into `tbl_payment_info`(`pay_id`,`key_id`,`file`,`description`,`date_crea`,`user_crea`,`date_upt`) values (5,116,'wing.png','<br /><strong>1</strong>. Dial *989#,press send<br /><br /><strong>2</strong>. Enter \"Wing account number\", press send<br /><br /><strong>3</strong>. Enter \"5. Bill Payment\", press send<br /><br /><strong>4.</strong> Select the Company Type (i.e: select 2. Utilities for EDC Bill or Water Bills, Select 3. Finance for AEON bill, First Finance&hellip;etc), Press send<br /><br /><strong>5</strong>. Choose the Company&rsquo;s Name (i.e EDC, AEON, first Finance, Manulife, Digi&hellip;etc), press send<br /><br /><strong>6</strong>. Enter Unique ID (i.e: invoice #, Customer ID, account Number&hellip;etc), press send<br /><br /><strong>7</strong>. Enter Amount to pay<br /><br /><strong>8</strong>. Enter \"PIN\", press Send<br /><br /><strong>9.</strong> Success.','2017-05-24','admin','2017-05-25'),(9,117,'truemoney.png','Sender:<br /><br />1. Go to the nearest TrueMoney Agent<br /><br />2. Tell the TrueMoney Agent you want to transfer money<br /><br />3. Write down sender&rsquo;s phone number, recipient&rsquo;s phone number, and amount you want to transfer<br /><br />4. Give the money to the TrueMoney Agent<br /><br />5. Get a receipt from the TrueMoney agent<br /><br />6. Communicate the 8-digit code &amp; the recipient phone number to the receiver to withdraw the money at any nearest TrueMoney agent.<br /><br />Receiver:<br /><br />1. Bring 8-digit code and recipient&rsquo;s phone number to the nearest TrueMoney agent.<br /><br />2. Tell the TrueMoney Agent that you want to withdraw money. Please ensure you have your 8 digit code <br /><br />3. Write down sender&rsquo;s phone number, recipient&rsquo;s phone number, 8-digit code and amount <br /><br />4. Give the phone to the TrueMoney Agent for verification <br /><br />5. Get the receipt and the money from the TrueMoney Agent and count it carefully before leaving','2017-05-24','admin',NULL);

/*Table structure for table `tbl_payment_transaction` */

DROP TABLE IF EXISTS `tbl_payment_transaction`;

CREATE TABLE `tbl_payment_transaction` (
  `pay_tra_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_id` int(10) unsigned NOT NULL,
  `cash` decimal(18,2) NOT NULL,
  `exchange` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  PRIMARY KEY (`pay_tra_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_payment_transaction` */

insert  into `tbl_payment_transaction`(`pay_tra_id`,`pay_id`,`cash`,`exchange`,`total`) values (19,122,32.00,24.50,7.50),(20,123,7.50,0.00,7.50),(21,124,40.00,5.00,35.00),(22,125,54.00,19.00,35.00),(23,126,36.00,1.00,35.00),(24,127,43.00,18.00,25.00),(25,128,456.00,106.00,350.00),(26,129,21.00,11.00,10.00),(27,130,544.00,394.00,150.00),(28,131,26.00,1.00,25.00);

/*Table structure for table `tbl_post_ads` */

DROP TABLE IF EXISTS `tbl_post_ads`;

CREATE TABLE `tbl_post_ads` (
  `post_ads_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acc_id` int(10) unsigned NOT NULL,
  `ads_code` varchar(20) DEFAULT NULL,
  `ads_type` int(11) unsigned DEFAULT NULL,
  `post_ads_date` date NOT NULL,
  `ads_img` text,
  `ads_url` text,
  `post_ads_status` varchar(50) NOT NULL,
  `post_ads_action` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  PRIMARY KEY (`post_ads_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_post_ads` */

insert  into `tbl_post_ads`(`post_ads_id`,`acc_id`,`ads_code`,`ads_type`,`post_ads_date`,`ads_img`,`ads_url`,`post_ads_status`,`post_ads_action`,`date_crea`) values (58,51,'KJAD-000001',168,'2017-07-12','advertising.png','','Published','Done','2017-07-12'),(59,51,'KJAD-000002',169,'2017-07-12','Brown_Shoe_logo.svg.png','','Expired','Renew','2017-07-12');

/*Table structure for table `tbl_post_cv` */

DROP TABLE IF EXISTS `tbl_post_cv`;

CREATE TABLE `tbl_post_cv` (
  `post_cv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cv_code` varchar(50) DEFAULT NULL,
  `acc_id` int(10) unsigned NOT NULL,
  `priority` int(10) unsigned NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `year_exp` varchar(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text,
  `addr` text,
  `phone` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fb` varchar(100) NOT NULL,
  `linkedIn` varchar(150) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `G1` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `pob` text NOT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `work_exp` text,
  `edu` text,
  `lang` text NOT NULL,
  `computer` text,
  `other_skill` text,
  `short_course` text,
  `ref` text,
  `hobby` text,
  `about_me` text,
  `post_cv_status` varchar(50) NOT NULL,
  `cv_status` tinyint(1) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`post_cv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_post_cv` */

insert  into `tbl_post_cv`(`post_cv_id`,`cv_code`,`acc_id`,`priority`,`position`,`salary`,`cat_id`,`year_exp`,`name`,`photo`,`addr`,`phone`,`tel2`,`email`,`fb`,`linkedIn`,`twitter`,`G1`,`dob`,`pob`,`marital_status`,`nationality`,`gender`,`work_exp`,`edu`,`lang`,`computer`,`other_skill`,`short_course`,`ref`,`hobby`,`about_me`,`post_cv_status`,`cv_status`,`date_crea`,`date_update`,`notify`) values (75,'KJCV-000001',51,174,'web developer','750,1000',34,'5,7','chheng samnang','FullStack-Image.jpg','Phnom Penh, Cambodia','070893164','092212205','samnang164@gmail.com','chheng.samnang','LinkedIn','twitter','g+','2017-08-23','Phnom Penh, Cambodia','Married','khmer','m','<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>Nunc porta mauris in pretium lacinia.</li>\r\n<li>Mauris sollicitudin felis ultrices molestie consectetur.&nbsp;<br />\r\n<ul>\r\n<li>Quisque ac erat vel dolor pellentesque consectetur in nec neque.</li>\r\n<li>Suspendisse tempor magna sit amet enim facilisis ullamcorper.</li>\r\n<li></li>\r\n</ul>\r\n</li>\r\n</ul>','<ol>\r\n<li>Quisque ac erat vel dolor pellentesque consectetur in nec neque.</li>\r\n<li>Suspendisse tempor magna sit amet enim facilisis ullamcorper.</li>\r\n</ol>','<ol>\r\n<li>Quisque ac erat vel dolor pellentesque consectetur in nec neque.</li>\r\n<li>Suspendisse tempor magna sit amet enim facilisis ullamcorper.\r\n<ol>\r\n<li>Quisque ac erat vel dolor pellentesque consectetur in nec neque.</li>\r\n<li>Suspendisse tempor magna sit amet enim facilisis ullamcorper.</li>\r\n<li></li>\r\n</ol>\r\n</li>\r\n</ol>','computer','other skill','short course training','reference','hobby','about me','Submited',1,'2017-10-17','2017-10-25 03:42:26',1);

/*Table structure for table `tbl_post_job` */

DROP TABLE IF EXISTS `tbl_post_job`;

CREATE TABLE `tbl_post_job` (
  `post_job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_code` varchar(50) NOT NULL,
  `acc_id` int(10) unsigned DEFAULT NULL,
  `bp_id` int(10) unsigned DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `addr` text,
  `priority` int(10) unsigned DEFAULT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` text,
  `job_requirement` text,
  `other_benefit` text,
  `posting_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contract` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `age` varchar(50) DEFAULT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `year_exp` varchar(50) DEFAULT NULL,
  `edu` varbinary(50) DEFAULT NULL,
  `lang1` varchar(50) DEFAULT NULL,
  `lang2` varchar(50) DEFAULT NULL,
  `lang3` varchar(50) DEFAULT NULL,
  `lang4` varchar(50) DEFAULT NULL,
  `hiring_qty` int(10) unsigned DEFAULT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `loc_id` tinyint(3) unsigned DEFAULT NULL,
  `post_job_status` varchar(50) NOT NULL,
  `post_job_action` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '1',
  `send_mail` int(1) NOT NULL DEFAULT '0',
  `process_payment` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=295 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_post_job` */

insert  into `tbl_post_job`(`post_job_id`,`job_code`,`acc_id`,`bp_id`,`contact_name`,`phone`,`phone2`,`email`,`addr`,`priority`,`job_title`,`job_desc`,`job_requirement`,`other_benefit`,`posting_date`,`end_date`,`contract`,`gender`,`age`,`salary_range`,`year_exp`,`edu`,`lang1`,`lang2`,`lang3`,`lang4`,`hiring_qty`,`cat_id`,`loc_id`,`post_job_status`,`post_job_action`,`date_crea`,`notify`,`send_mail`,`process_payment`) values (284,'KJJB-000001',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',200,'Web Analyst','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Published','Done',NULL,1,0,0),(285,'KJJB-000002',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',202,'Senior Web Developer','j','j','j','2017-10-15','2017-10-22','full_time','m','18,25','<150','0,1','PhD','Khmer','English','','',1,39,1,'Published','Done',NULL,1,0,0),(286,'KJJB-000003',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',202,'Web Designer','j','j','j','2017-10-15','2017-10-22','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Published','Done',NULL,1,0,0),(287,'KJJB-000004',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',202,'Database Administrator','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Published','Done',NULL,1,0,0),(288,'KJJB-000005',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',203,'Web Developer','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Submited','Pending','2017-10-14',1,0,1),(289,'KJJB-000006',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',200,'Search Engine Optimization','j','j','j','2017-10-22','2017-10-29','full_time','m','18,25','<150','0,1','PhD','Khmer','English','','',1,39,1,'Submited','Pending','2017-10-14',1,0,1),(290,'KJJB-000007',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',202,'Administrator','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','English','','',1,39,1,'Submited','Pending','2017-10-14',1,0,1),(291,'KJJB-000008',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',200,'Senior Web Developer','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Published','Done',NULL,1,0,0),(292,'KJJB-000009',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',202,'Web Designer','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Submited','Pending','2017-10-14',1,0,1),(293,'KJJB-000010',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',200,'Administrator','j','j','j','2017-10-15','2017-10-15','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Published','Done',NULL,1,0,0),(294,'KJJB-000011',51,NULL,'chheng samnang','070893164','','samnang164@gmail.com','Phnom Penh, Cambodia.',203,'Senior Web Developer','j','j','j','2017-10-15','2017-10-22','full_time','m','18,25','<150','0,1','PhD','Khmer','','','',1,39,1,'Submited','Pending','2017-10-14',1,0,1);

/*Table structure for table `tbl_post_skill` */

DROP TABLE IF EXISTS `tbl_post_skill`;

CREATE TABLE `tbl_post_skill` (
  `post_skill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acc_id` int(10) unsigned NOT NULL,
  `skill_code` varchar(50) DEFAULT NULL,
  `priority` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `loc_id` int(10) unsigned NOT NULL,
  `post_skill_status` varchar(50) NOT NULL,
  `service_provider` tinyint(1) unsigned DEFAULT NULL,
  `employee` tinyint(1) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `addr` text,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `line` varchar(100) DEFAULT NULL,
  `whatApp` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `about_me` text,
  `img` varchar(100) DEFAULT NULL,
  `googleMap` varchar(500) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`post_skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_post_skill` */

insert  into `tbl_post_skill`(`post_skill_id`,`acc_id`,`skill_code`,`priority`,`cat_id`,`loc_id`,`post_skill_status`,`service_provider`,`employee`,`name`,`addr`,`phone`,`email`,`line`,`whatApp`,`website`,`about_me`,`img`,`googleMap`,`date_crea`,`date_update`) values (17,28,'KJSK-000001',207,44,2,'Published',1,1,'Choumeng','Hello world','086830867','choumengit@gmail.com','line','whatapp','www.facebook.com','Hello','Burger2.png','Plz input google map are here...','2017-05-21','2017-05-21'),(18,30,'KJSK-000002',209,42,1,'Published',1,1,'adfdsf','fsdf','4545454545','sophea@gmail.com','fad','fadfdasf','dfdsf','fdf','canon_xc10_01_fsl_c_0x250.jpg','adfdfdf',NULL,NULL);

/*Table structure for table `tbl_post_skill_detail` */

DROP TABLE IF EXISTS `tbl_post_skill_detail`;

CREATE TABLE `tbl_post_skill_detail` (
  `skill_det_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_skill_id` int(10) unsigned NOT NULL,
  `skill_det_name` varchar(100) DEFAULT NULL,
  KEY `skill_det_id` (`skill_det_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_post_skill_detail` */

insert  into `tbl_post_skill_detail`(`skill_det_id`,`post_skill_id`,`skill_det_name`) values (26,17,'Networking'),(27,17,'Design'),(28,18,'dfsad'),(29,18,'adfasd');

/*Table structure for table `tbl_rate` */

DROP TABLE IF EXISTS `tbl_rate`;

CREATE TABLE `tbl_rate` (
  `rate_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rate_type` varchar(50) NOT NULL,
  `rate_desc` text,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_rate` */

insert  into `tbl_rate`(`rate_id`,`rate_type`,`rate_desc`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (88,'search_cv','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','admin','2017-05-17',NULL,NULL),(87,'cv','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','admin','2017-05-17',NULL,NULL),(86,'ads','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','admin','2017-05-17',NULL,NULL),(93,'skill','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','admin','2017-05-17',NULL,NULL),(92,'job','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','admin','2017-05-17',NULL,NULL);

/*Table structure for table `tbl_rate_detail` */

DROP TABLE IF EXISTS `tbl_rate_detail`;

CREATE TABLE `tbl_rate_detail` (
  `rate_det_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate_id` int(10) unsigned NOT NULL,
  `rate_det_type` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT '0',
  `price` decimal(18,2) DEFAULT NULL,
  `homepage_display` tinyint(1) unsigned DEFAULT NULL,
  `toprow_display` tinyint(1) unsigned DEFAULT NULL,
  `free_per_month` varchar(100) DEFAULT NULL,
  `free_per_month_job` int(11) DEFAULT NULL,
  `photo_space_display` tinyint(1) unsigned DEFAULT NULL,
  `ads_size` varchar(50) DEFAULT NULL,
  `ads_discount` int(11) DEFAULT NULL,
  `scv_see_app_position` tinyint(1) unsigned DEFAULT NULL,
  `scv_full_app_det` tinyint(1) unsigned DEFAULT NULL,
  `scv_print_app_cv` tinyint(1) unsigned DEFAULT NULL,
  `scv_send_email_app` tinyint(1) unsigned DEFAULT NULL,
  `bp_for_job` int(11) DEFAULT NULL,
  `job_2post_discount` int(10) unsigned DEFAULT NULL,
  `job_alert_job_to_cv` tinyint(1) unsigned DEFAULT NULL,
  `job_receive_cv_app` tinyint(1) unsigned DEFAULT NULL,
  `job_alert_job_to_register` int(1) unsigned DEFAULT NULL,
  `job_fb_boosting` tinyint(1) unsigned DEFAULT NULL,
  `job_com_logo_display` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`rate_det_id`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_rate_detail` */

insert  into `tbl_rate_detail`(`rate_det_id`,`rate_id`,`rate_det_type`,`duration`,`price`,`homepage_display`,`toprow_display`,`free_per_month`,`free_per_month_job`,`photo_space_display`,`ads_size`,`ads_discount`,`scv_see_app_position`,`scv_full_app_det`,`scv_print_app_cv`,`scv_send_email_app`,`bp_for_job`,`job_2post_discount`,`job_alert_job_to_cv`,`job_receive_cv_app`,`job_alert_job_to_register`,`job_fb_boosting`,`job_com_logo_display`) values (209,93,'Premium','365',35.00,1,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(207,93,'Standard','0',0.00,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(208,93,'Premium','180',20.00,1,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(206,92,'Bundle',NULL,NULL,0,1,NULL,108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,112,0,1,1,1,1,0),(205,92,'Bundle',NULL,NULL,0,1,NULL,108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,111,0,1,1,1,1,0),(204,92,'Bundle',NULL,NULL,0,1,NULL,108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,110,0,1,1,1,1,0),(203,92,'Premium','30',20.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,1,1,1,1,1),(202,92,'Premium','15',15.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,25,1,1,1,1,1),(201,92,'Standard','30',10.00,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,1,1,1,1,0),(200,92,'Standard','15',7.50,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,1,1,1,1,0),(178,88,'Paid_search','109',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(177,88,'Paid_search','108',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,88,'Paid_search','107',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(175,88,'Normal_search','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(174,87,'Premium','365',25.00,1,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,87,'Premium','180',15.00,1,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,87,'Standard','730',0.00,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,86,'Side','180',450.00,NULL,NULL,'108',NULL,NULL,'300x250',10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,86,'Side','90',250.00,NULL,NULL,'108',NULL,NULL,'300x250',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,86,'Side','30',100.00,NULL,NULL,'108',NULL,NULL,'300x250',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(168,86,'Top','180',2500.00,NULL,NULL,'112',NULL,NULL,'728x90',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(167,86,'Top','90',1300.00,NULL,NULL,'111',NULL,NULL,'728x90',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(166,86,'Top','30',450.00,NULL,NULL,'110',NULL,NULL,'728x90',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_sysdata` */

DROP TABLE IF EXISTS `tbl_sysdata`;

CREATE TABLE `tbl_sysdata` (
  `key_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_type` varchar(100) NOT NULL,
  `key_code` text,
  `key_data` varchar(100) DEFAULT NULL,
  `key_data1` varchar(100) DEFAULT NULL,
  `key_data2` text,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sysdata` */

insert  into `tbl_sysdata`(`key_id`,`key_type`,`key_code`,`key_data`,`key_data1`,`key_data2`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (114,'search_job',NULL,NULL,NULL,'<h4 class=\"text_space\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</h4>','admin','2017-05-17',NULL,NULL),(115,'search_skill',NULL,NULL,NULL,'<h4 class=\"text_space\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</h4>','admin','2017-05-17',NULL,NULL),(111,'bundle_package','90','400',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(112,'bundle_package','180','750',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(103,'VAT','5',NULL,NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(104,'about_us',NULL,NULL,NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(105,'FAQ','What is Khmer job?',NULL,NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(106,'promotion','Computer Shop','minyuan.gif',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17','admin','2017-05-17'),(107,'cv_paid_search','1','10',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(108,'cv_paid_search','8','30',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(109,'cv_paid_search','24','50',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(110,'bundle_package','30','150',NULL,'<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','admin','2017-05-17',NULL,NULL),(116,'Wing','payment',NULL,NULL,'','admin','2017-05-24',NULL,NULL),(117,'Truemoney','payment',NULL,NULL,'','admin','2017-05-24',NULL,NULL);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_code` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` tinyint(1) unsigned NOT NULL,
  `user_desc` text,
  `user_crea` varchar(50) NOT NULL,
  `date_crea` date NOT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_code` (`user_code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`user_code`,`user_name`,`user_pass`,`user_type`,`user_status`,`user_desc`,`user_crea`,`date_crea`,`user_updt`,`date_updt`) values (4,'KJ-000001','admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef','admin',1,'<p>This Account for Genderal user can log in after complete you can delete it.</p>','Choumeng','2017-05-04','admin','2017-05-17'),(5,'user001','chheng samnang','123','general',1,NULL,'admin','2017-07-23',NULL,NULL);

/*Table structure for table `tbl_visitor` */

DROP TABLE IF EXISTS `tbl_visitor`;

CREATE TABLE `tbl_visitor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_view` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_visitor` */

insert  into `tbl_visitor`(`id`,`ip`,`date_view`) values (166,'::1','2017-05-15'),(168,'::1','2017-05-16'),(171,'127.0.0.1','2017-05-16'),(172,'192.168.123.7','2017-05-16'),(173,'::1','2017-05-17'),(174,'::1','2017-05-18'),(175,'::1','2017-05-19'),(176,'::1','2017-05-21'),(177,'::1','2017-05-24'),(178,'::1','2017-05-25'),(179,'114.134.184.7','2017-05-25'),(180,'114.134.184.63','2017-06-12'),(181,'43.255.115.75','2017-06-14'),(182,'114.134.184.11','2017-06-15'),(183,'43.255.115.34','2017-06-18'),(184,'::1','2017-06-24'),(185,'::1','2017-07-01'),(186,'::1','2017-07-10'),(187,'::1','2017-07-15'),(188,'::1','2017-07-16'),(189,'::1','2017-07-17'),(190,'::1','2017-07-20'),(191,'::1','2017-07-21'),(192,'::1','2017-07-23'),(193,'::1','2017-07-24'),(194,'::1','2017-07-25'),(195,'::1','2017-07-26'),(196,'::1','2017-07-28'),(197,'::1','2017-08-01'),(198,'::1','2017-08-02'),(199,'::1','2017-08-03'),(200,'::1','2017-08-06'),(201,'::1','2017-08-08'),(202,'::1','2017-08-09'),(203,'::1','2017-08-14'),(204,'::1','2017-08-23'),(205,'::1','2017-10-02'),(206,'::1','2017-10-11'),(207,'::1','2017-10-14'),(208,'::1','2017-10-15'),(209,'::1','2017-10-17'),(210,'::1','2017-10-25');

/*Table structure for table `tbl_weekly_mail_transaction` */

DROP TABLE IF EXISTS `tbl_weekly_mail_transaction`;

CREATE TABLE `tbl_weekly_mail_transaction` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_type` varchar(150) DEFAULT NULL,
  `tran_desc` varchar(250) DEFAULT NULL,
  `tran_status` int(1) DEFAULT NULL,
  `tran_date` date DEFAULT NULL,
  `user_crea` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `user_updt` varchar(50) DEFAULT NULL,
  `date_updt` date DEFAULT NULL,
  PRIMARY KEY (`tran_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tbl_weekly_mail_transaction` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
