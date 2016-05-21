
CREATE TABLE `cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `addtime` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `descript` varchar(30) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `add_time` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




CREATE TABLE `part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(20) DEFAULT NULL,
  `addtime` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;


CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned DEFAULT NULL,
  `uid` int(10) unsigned DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `add_time` varchar(30) DEFAULT NULL,
  `count` int(11) DEFAULT '1',
  `sta` int(10) DEFAULT '0',
  `paixu` int(10) DEFAULT '0',
  `gaoliang` tinyint(10) DEFAULT '0',
  `jinghua` tinyint(10) DEFAULT '0',
  `del` tinyint(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `content` text,
  `re_time` int(11) DEFAULT NULL,
  `pip` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `level` tinyint(4) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `rtime` int(11) DEFAULT NULL,
  `rip` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `user_detail` (
  `uid` int(11) DEFAULT NULL,
  `t_name` varchar(32) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `edu` tinyint(4) DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `tel` char(11) DEFAULT NULL,
  `qq` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

