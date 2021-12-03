/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - help_desk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`help_desk` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `help_desk`;

/*Table structure for table `base_conhecimento` */

DROP TABLE IF EXISTS `base_conhecimento`;

CREATE TABLE `base_conhecimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plataforma` int(11) NOT NULL,
  `pergunta` text NOT NULL,
  `resposta` text NOT NULL,
  `anexo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plataforma_fk` (`id_plataforma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `base_conhecimento` */

/*Table structure for table `chamados` */

DROP TABLE IF EXISTS `chamados`;

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `problema` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `data_modif` date DEFAULT NULL,
  `conexao` text DEFAULT NULL,
  `solucao` text DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `tempo` time DEFAULT '00:00:00',
  `anexo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario_fk` (`id_usuario`),
  CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chamados` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pessoa` char(1) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `situacao` char(1) NOT NULL,
  `atualiza` char(1) NOT NULL DEFAULT 'N',
  `observacao` text DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senhas` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

/*Table structure for table `logusuarios` */

DROP TABLE IF EXISTS `logusuarios`;

CREATE TABLE `logusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `data_hora` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_fk` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `logusuarios` */

/*Table structure for table `nivel_acessos` */

DROP TABLE IF EXISTS `nivel_acessos`;

CREATE TABLE `nivel_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_nivel` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `nivel_acessos` */

insert  into `nivel_acessos`(`id`,`nome_nivel`,`created`,`modified`) values 
(1,'Administrador','2015-09-19 00:00:00',NULL),
(2,'Usuario','2015-09-27 17:30:26','2015-09-27 17:34:37');

/*Table structure for table `ordem_servicos` */

DROP TABLE IF EXISTS `ordem_servicos`;

CREATE TABLE `ordem_servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `garantia` varchar(100) DEFAULT NULL,
  `descricao` varchar(250) NOT NULL,
  `defeito` varchar(250) NOT NULL,
  `laudo` text NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ordem_servicos` */

/*Table structure for table `plataforma` */

DROP TABLE IF EXISTS `plataforma`;

CREATE TABLE `plataforma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_plataforma` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `plataforma` */

/*Table structure for table `servicos` */

DROP TABLE IF EXISTS `servicos`;

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` double(10,2) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `servicos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nome`,`email`,`login`,`senha`,`nivel_acesso_id`,`created`,`modified`) values 
(2,'Wellisson Ribeiro','welleh10@gmail.com','wellisson','e803adae1f5acc155699ad43e9b77629',1,'2017-01-16 10:09:24','2017-03-20 14:49:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
