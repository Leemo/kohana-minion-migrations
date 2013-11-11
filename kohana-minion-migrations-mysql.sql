/* Don't forget about prefixes */
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` TEXT NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `migrations_uniq_filename` (`filename`),
  KEY `migrations_date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;