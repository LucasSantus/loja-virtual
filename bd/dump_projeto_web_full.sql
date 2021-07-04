use prova_va3;

DROP TABLE IF EXISTS `formulario`;
CREATE TABLE `formulario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NULL,
  `formacao_academica` varchar(150) NULL,
  `experiencia` varchar(200) NULL,
  `url_linkedin` varchar(255) NOT NULL,
  `url_github` varchar(255) NOT NULL,
  `data_hora_cadastro` datetime DEFAULT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`)
  CONSTRAINT `formulario_FK` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(90) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
);
