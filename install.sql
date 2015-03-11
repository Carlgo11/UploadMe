CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `file-name` text,
  `removalcode` text,
  `encryption` text,
  `salt` text,
  PRIMARY KEY (`id`)
);

CREATE TABLE `transparencyreport` (
  `name` text NOT NULL,
  `accepted` int(11) NOT NULL,
  `total` int(11) NOT NULL
); 
