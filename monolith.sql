-- MySQL dump 10.13  Distrib 5.6.21, for osx10.8 (x86_64)
--
-- Host: localhost    Database: monolith
-- ------------------------------------------------------
-- Server version	5.6.21-log

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
-- Table structure for table `ks_ad`
--

DROP TABLE IF EXISTS `ks_ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `add_time` int(11) NOT NULL,
  `begin_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `forever` tinyint(1) NOT NULL DEFAULT '0',
  `click_time` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '50',
  `ad_pos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_ad`
--

LOCK TABLES `ks_ad` WRITE;
/*!40000 ALTER TABLE `ks_ad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ks_ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_ad_position`
--

DROP TABLE IF EXISTS `ks_ad_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_ad_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(255) NOT NULL,
  `width` decimal(18,2) NOT NULL,
  `height` decimal(18,2) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '1',
  `code` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_ad_position`
--

LOCK TABLES `ks_ad_position` WRITE;
/*!40000 ALTER TABLE `ks_ad_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `ks_ad_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_admin`
--

DROP TABLE IF EXISTS `ks_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_admin` (
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` char(2) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_admin`
--

LOCK TABLES `ks_admin` WRITE;
/*!40000 ALTER TABLE `ks_admin` DISABLE KEYS */;
INSERT INTO `ks_admin` VALUES ('kwanson','a6d0dceb976a69b6d2c39bd8c663544a','support@kwanson.com','君穗科技','M',1);
/*!40000 ALTER TABLE `ks_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_content`
--

DROP TABLE IF EXISTS `ks_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `add_time` int(11) NOT NULL,
  `content` text,
  `wap_content` text,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `original` varchar(255) DEFAULT NULL,
  `order_view` int(11) NOT NULL DEFAULT '50',
  `original_url` varchar(255) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_content`
--

LOCK TABLES `ks_content` WRITE;
/*!40000 ALTER TABLE `ks_content` DISABLE KEYS */;
INSERT INTO `ks_content` VALUES (1,'关于我们','君穗科技',0,'<span style=\"font-size:14px;\">&nbsp;<br>\n&nbsp; &nbsp; 深圳海鹏圆梦壹号财税服务有限公司（简称“<span style=\"color: rgb(255, 0, 0); \"><strong>圆梦壹号</strong></span>”）秉持“让想创业的人轻松创业”的理念，致力为中小微企业提供工商（注册、变更、商标、专利）、会计、税务、法律、金融等360°全方位、一站式企业托管服务，帮助创业者从繁杂的事务中“解放”出来，大大降低初创企业的人力成本、财力成本、时间成本，实现“轻负担”创业。<br>\n&nbsp;<br>\n&nbsp; &nbsp; 多年的从业经历，我们见证并深知创业者的艰辛与不易！他们面临的不仅仅是企业运营经费开支压力，更有来自市场竞争的压力。圆梦壹号的使命就是要为创业者有效“减压”，因此我们隆重出台“帮扶政策”就是：堪称“史上最优惠、最快捷的公司注册解决方案”——<span style=\"color:#0000cd;\">1元</span>注册深圳公司服务：手续全包、费用全免、力求7天办结！其次是成为圆梦壹号的签约客户后，还将享受开业辅导、企业老总专项财税培训、银行开户、一般纳税人申请、商标专利申、法律咨询、财税疑难问题解答等多项免费增值服务。值得强调的是，我们提供给创业者的多项免费增值服务，并非建立在牺牲服务质量基础之上的，相反，我们非常认真对待对每一家客户的每一次服务，因为我们希望与客户建立长期稳固的合作关系，共创辉煌！<br>\n&nbsp;<br>\n&nbsp; &nbsp; 企业财税服务一直是圆梦壹号的专长所在。为中小微企业提供专业规范的代理记账报税服务是我们的价值所在。我们拥有专业稳定的会计做账团队、税务团队及客服团队，我们始终严格按照“您企业三年之后（预计）IPO的标准为您做账”的要求，以负责任的态度给每一家客户做好账报好税，确保客户企业未来选择IPO了无须重新补账、重做账。<br>\n&nbsp;<br>\n&nbsp; &nbsp; 深圳海鹏圆梦壹号财税服务有限公司隶属于深圳海鹏会计事务所。总公司是一家集会计事务所、税务事务所、投资管理咨询有限公司、财税服务公司、前海金融服务公司为一体的大型综合财税工商服务机构，资质全面、技术实力雄厚。公司地处福田车公庙核心商业圈内，人员规模近200人（并持续增长），包括庞大的工商办理团队、会计团队、税务团队、审计团队、客服团队、综合服务团队等，云集一批优秀的注册会计师、注册税务师、资深会计师及公司注册专家等。<br>\n&nbsp;<br>\n&nbsp; &nbsp; 总公司具有良好的社会信誉度和行业公信力，2009年，公司被深圳市福田区财政局评定为最高评级的A＋级代理记账机构，公司不仅是深圳市注册税务师协会会员单位、深圳市注册会计师协会会员单位，而且还是中国机械工业审计学会常务理事单位。中央财经大学还曾在公司建立了“中央财经大学会计税务专业实习就业基地”。<br>\n&nbsp;<br>\n&nbsp; &nbsp; 经营理念：立足深圳、服务全国；恪守诚信、效率、责任的服务理念。<br>\n&nbsp; &nbsp; 服务原则：客观、公正、独立、守信。<br>\n&nbsp; &nbsp; 服务方针：以质量求生存、以信誉求发展。<br>\n<br>\n&nbsp; &nbsp;\n</span>',NULL,'2015-07-30 04:11:11',NULL,NULL,NULL,NULL,50,NULL,1),(2,'联系我们','君穗科技',0,NULL,NULL,'2015-07-30 03:48:13',NULL,NULL,NULL,NULL,50,NULL,1),(3,'深圳公司注册服务','君穗科技',0,NULL,NULL,'2015-07-30 06:39:14',NULL,NULL,NULL,NULL,50,NULL,2),(4,'外商独资企业设立登记','君穗科技',0,NULL,NULL,'2015-07-30 06:39:18',NULL,NULL,NULL,NULL,50,NULL,3),(5,'前海企业所得税优惠政策和目录出台','君穗科技',0,NULL,NULL,'2015-07-30 03:55:37',NULL,NULL,NULL,NULL,50,NULL,4),(6,'公司必须先办理名称预先核准？','君穗科技',0,NULL,NULL,'2015-07-30 03:55:37',NULL,NULL,NULL,NULL,50,NULL,6),(7,'运输公司注册','君穗科技',0,NULL,NULL,'2015-07-30 03:55:37',NULL,NULL,NULL,NULL,50,NULL,8),(8,'货运代理公司注册','君穗科技',0,NULL,NULL,'2015-07-30 03:55:37',NULL,NULL,NULL,NULL,50,NULL,8);
/*!40000 ALTER TABLE `ks_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_friend_link`
--

DROP TABLE IF EXISTS `ks_friend_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_friend_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `no_followed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_friend_link`
--

LOCK TABLES `ks_friend_link` WRITE;
/*!40000 ALTER TABLE `ks_friend_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `ks_friend_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_nav`
--

DROP TABLE IF EXISTS `ks_nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `position` varchar(255) NOT NULL,
  `order_view` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_nav`
--

LOCK TABLES `ks_nav` WRITE;
/*!40000 ALTER TABLE `ks_nav` DISABLE KEYS */;
INSERT INTO `ks_nav` VALUES (1,'首页','index.php',0,'middle',50),(2,'深圳公司注册','article_list.php?id=2',0,'middle',50),(3,'外资公司注册','article_list.php?id=3',0,'middle',50),(4,'前海公司注册','article_list.php?id=4',0,'middle',50),(5,'代理记账报税','article_list.php?id=5',0,'middle',50),(6,'常见问题','article_list.php?id=6',0,'middle',50),(7,'公司新闻','article_list.php?id=7',0,'middle',50),(8,'关于我们','article.php?id=1',0,'middle',50),(9,'联系我们','article.php?id=2',0,'middle',50),(10,'关于我们','article.php?id=1',0,'top',50),(11,'联系我们','article.php?id=2',0,'top',50),(12,'深圳公司注册','article_list.php?id=2',0,'bottom',50),(13,'代理记账报税','article_list.php?id=5',0,'bottom',50),(14,'创业汇','article_list.php?id=9',0,'bottom',50),(15,'联系我们','article.php?id=2',0,'bottom',50);
/*!40000 ALTER TABLE `ks_nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_role`
--

DROP TABLE IF EXISTS `ks_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purview` text NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_role`
--

LOCK TABLES `ks_role` WRITE;
/*!40000 ALTER TABLE `ks_role` DISABLE KEYS */;
INSERT INTO `ks_role` VALUES (1,'[\"pur_section_view\",\"pur_section_add\",\"pur_section_edit\",\"pur_section_del\",\"pur_content_view\",\"pur_content_add\",\"pur_content_edit\",\"pur_content_del\",\"pur_static_view\",\"pur_sysconf_edit\",\"pur_link_view\",\"pur_link_add\",\"pur_link_edit\",\"pur_link_del\",\"pur_sitemap_edit\",\"pur_adpos_view\",\"pur_adpos_add\",\"pur_adpos_edit\",\"pur_adpos_del\",\"pur_ad_view\",\"pur_ad_add\",\"pur_ad_edit\",\"pur_ad_del\",\"pur_nav_view\",\"pur_nav_add\",\"pur_nav_edit\",\"pur_nav_del\",\"pur_role_view\",\"pur_role_add\",\"pur_role_edit\",\"pur_role_del\",\"pur_admin_view\",\"pur_admin_add\",\"pur_admin_edit\",\"pur_admin_del\",\"pur_info_edit\",\"pur_passwd_edit\"]','超级管理员');
/*!40000 ALTER TABLE `ks_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_section`
--

DROP TABLE IF EXISTS `ks_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order_view` int(11) NOT NULL DEFAULT '50',
  `thumb` varchar(255) DEFAULT NULL,
  `original` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_section`
--

LOCK TABLES `ks_section` WRITE;
/*!40000 ALTER TABLE `ks_section` DISABLE KEYS */;
INSERT INTO `ks_section` VALUES (1,'系统保留分类',0,'1,',NULL,NULL,50,NULL,NULL),(2,'深圳公司注册',0,'2,',NULL,NULL,50,NULL,NULL),(3,'外资公司注册',0,'3,',NULL,NULL,50,NULL,NULL),(4,'前海公司注册',0,'4,',NULL,NULL,50,NULL,NULL),(5,'代理记账报税',0,'5,',NULL,NULL,50,NULL,NULL),(6,'常见问题',0,'6,',NULL,NULL,50,NULL,NULL),(7,'公司新闻',0,'7,',NULL,NULL,50,NULL,NULL),(8,'注册公司类型',0,'8,',NULL,NULL,50,NULL,NULL),(9,'创业汇',0,'9,',NULL,NULL,50,NULL,NULL),(10,'客户见证',0,'10,',NULL,NULL,50,NULL,NULL),(11,'客户案例',0,'11,',NULL,NULL,50,NULL,NULL);
/*!40000 ALTER TABLE `ks_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_statistics`
--

DROP TABLE IF EXISTS `ks_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_statistics` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `request_time` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `keep_alive` int(11) DEFAULT NULL,
  `cookie` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `markup` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_statistics`
--

LOCK TABLES `ks_statistics` WRITE;
/*!40000 ALTER TABLE `ks_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `ks_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ks_sysconf`
--

DROP TABLE IF EXISTS `ks_sysconf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ks_sysconf` (
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(255) NOT NULL,
  `options` text,
  `group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ks_sysconf`
--

LOCK TABLES `ks_sysconf` WRITE;
/*!40000 ALTER TABLE `ks_sysconf` DISABLE KEYS */;
INSERT INTO `ks_sysconf` VALUES ('address','地址','广州市萝岗科学城科学大道162号创意大厦B3栋3楼304室','text',NULL,'config'),('compress','压缩输出','0','radio',NULL,'config'),('coriginal_height','内容大图高度','','text',NULL,'themes'),('coriginal_width','内容大图宽度','','text',NULL,'themes'),('cthumb_height','内容缩略图高度','','text',NULL,'themes'),('cthumb_width','内容缩略图宽度','','text',NULL,'themes'),('description','站点描述','','textarea',NULL,'config'),('domain','站点域名','http://localhost/monolith','text',NULL,'config'),('icp','ICP备案号','粤ICP备12345567号','text',NULL,'config'),('keywords','关键词','','text',NULL,'config'),('logo','LOGO图片','','img',NULL,'config'),('owner','站点主体','广州君穗信息科技有限公司','text',NULL,'config'),('phone','联系电话','13929564894','text',NULL,'config'),('section_step','栏目页显示记录数','18','',NULL,'themes'),('server','QQ客服','136090474','textarea',NULL,'config'),('site_name','站点名称','磐石CMS','text',NULL,'config'),('soriginal_height','栏目大图高度','','text',NULL,'themes'),('soriginal_width','栏目大图宽度','','text',NULL,'themes'),('static','伪静态','0','radio',NULL,'config'),('statistics','统计','1','radio',NULL,'config'),('sthumb_height','栏目缩略图高度','','text',NULL,'themes'),('sthumb_width','栏目缩略图宽度','','text',NULL,'themes'),('themes','模板','cs','text',NULL,'themes');
/*!40000 ALTER TABLE `ks_sysconf` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-30 15:15:03
