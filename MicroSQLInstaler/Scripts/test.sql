/*
SQLyog Community Edition- MySQL GUI v5.21
Host - 5.0.27-community-nt : Database - rc
*********************************************************************
Server version : 5.0.27-community-nt
*/


SET NAMES utf8;

SET SQL_MODE='';
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE demodb;
USE demodb;
/*Table structure for table `specificproblems` */

CREATE TABLE `demo1` (
  `ERRORID` int(11) default NULL,
  `ERRORIDDESCR` varchar(150) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `demo2` (
  `ERRORID` int(11) default NULL,
  `ERRORIDDESCR` varchar(150) default NULL
);

CREATE TABLE `config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `phpbb_config` */

insert  into `config`(`config_name`,`config_value`) values ('allow_avatar_local','0');
insert  into `config`(`config_name`,`config_value`) values ('allow_avatar_remote','0');
insert  into `config`(`config_name`,`config_value`) values ('allow_avatar_upload','0');
insert  into `config`(`config_name`,`config_value`) values ('allow_bbcode','1');
insert  into `config`(`config_name`,`config_value`) values ('allow_html','0');
insert  into `config`(`config_name`,`config_value`) values ('allow_html_tags','b,i,u,pre');
insert  into `config`(`config_name`,`config_value`) values ('allow_namechange','0');
insert  into `config`(`config_name`,`config_value`) values ('allow_sig','1');
insert  into `config`(`config_name`,`config_value`) values ('allow_smilies','1');
insert  into `config`(`config_name`,`config_value`) values ('allow_theme_create','0');
insert  into `config`(`config_name`,`config_value`) values ('avatar_filesize','6144');

SET SQL_MODE=@OLD_SQL_MODE;