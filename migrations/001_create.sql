
CREATE TABLE IF NOT EXISTS `secured_urls` (
  `id` int(11) NOT NULL auto_increment,
  `is_authentication_required` tinyint(1) NOT NULL default '0',
  `regex` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `secured_url_roles` (
  `id` int(11) NOT NULL auto_increment,
  `role_id` int(11) NOT NULL,
  `secured_url_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
