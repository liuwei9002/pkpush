/* Alter table in target */
ALTER TABLE `dao_admin_access`
	ADD KEY `idx_root_type`(`root_type`), COMMENT='';

/* Alter table in target */
ALTER TABLE `dao_admin_menu`
	CHANGE `icon` `icon` varchar(100)  COLLATE utf8_general_ci NULL COMMENT '小图标' after `fsort`;

/* Create table in target */
CREATE TABLE `dao_ppt_main`(
	`id` int(11) NOT NULL  auto_increment ,
	`title` varchar(100) COLLATE utf8_general_ci NOT NULL  ,
	`uid` int(11) NOT NULL  ,
	`filepath` varchar(200) COLLATE utf8_general_ci NOT NULL  ,
	`coin_number` int(11) NOT NULL  ,
	`fcolor` int(11) NOT NULL  COMMENT '色系' ,
	`created_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	`updated_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET='utf8' COMMENT='ppt主表';


/* Create table in target */
CREATE TABLE `dao_ppt_sub`(
	`id` int(11) NOT NULL  auto_increment ,
	`main_id` int(11) NOT NULL  ,
	`view_number` int(11) NOT NULL  ,
	`download_number` int(11) NOT NULL  ,
	`like_number` int(11) NOT NULL  ,
	`created_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	`updated_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET='utf8' COMMENT='ppt子表';


/* Create table in target */
CREATE TABLE `dao_ppt_tag_main`(
	`id` int(11) NOT NULL  auto_increment ,
	`name` varchar(100) COLLATE utf8_general_ci NOT NULL  ,
	`ppt_number` int(11) NOT NULL  DEFAULT '0' ,
	`fsort` int(11) NOT NULL  DEFAULT '0' COMMENT '排序' ,
	`pid` int(11) NOT NULL  DEFAULT '0' COMMENT '根标签' ,
	`created_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	`updated_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET='utf8' COMMENT='ppt主表';


/* Create table in target */
CREATE TABLE `dao_ppt_tag_sub`(
	`id` int(11) NOT NULL  auto_increment ,
	`tag_id` int(11) NOT NULL  ,
	`ppt_id` int(11) NOT NULL  ,
	`created_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	`updated_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET='utf8' COMMENT='ppt标签子表';


/* Create table in target */
CREATE TABLE `dao_ppt_user`(
	`id` int(11) NOT NULL  auto_increment ,
	`uid` int(11) NOT NULL  ,
	`product_number` int(11) NOT NULL  ,
	`created_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	`updated_at` timestamp NOT NULL  DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET='utf8' COMMENT='ppt用户信息';


/* Alter table in target */
ALTER TABLE `dao_users`
	ADD COLUMN `is_lock` tinyint(1)   NOT NULL DEFAULT '0' COMMENT '是否被锁定,0-否,1-是' after `validate`,
	CHANGE `reg_source` `reg_source` varchar(50)  COLLATE utf8_general_ci NOT NULL COMMENT '注册来源' after `is_lock`,
	CHANGE `created_at` `created_at` timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP after `reg_source`,
	CHANGE `updated_at` `updated_at` timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP after `created_at`;
