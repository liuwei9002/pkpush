INSERT INTO `dao_admin_access` VALUES ('43', '用户锁定', 'glob/user@index/lock', '3', '0', '2017-02-23 15:52:37', '2017-02-23 15:52:37');
INSERT INTO `dao_admin_access` VALUES ('41', '用户管理', 'glob/user@index/index', '1', '1', '2017-02-23 11:14:09', '2017-02-23 11:14:09');
INSERT INTO `dao_admin_access` VALUES ('42', '用户管理', '', '1', '2', '2017-02-23 11:24:56', '2017-02-23 11:24:56');
UPDATE `dao_admin_access` SET `id`='30', `name`='管理员账户删除', `route`='glob/setting@account/deluser', `ftype`='3', `root_type`='0', `updated_at`='2017-02-23 11:15:28', `created_at`='2017-02-06 18:59:33'  WHERE (`id` = 30) ;
UPDATE `dao_admin_access` SET `id`='28', `name`='管理员账户添加', `route`='glob/setting@account/add', `ftype`='2', `root_type`='0', `updated_at`='2017-02-23 11:15:48', `created_at`='2017-02-06 18:58:48'  WHERE (`id` = 28) ;
UPDATE `dao_admin_access` SET `id`='27', `name`='管理员账户管理', `route`='glob/setting@account/userlist', `ftype`='1', `root_type`='1', `updated_at`='2017-02-23 11:15:16', `created_at`='2017-02-06 17:51:37'  WHERE (`id` = 27) ;
UPDATE `dao_admin_access` SET `id`='29', `name`='管理员账户添加后台', `route`='glob/setting@account/doadd', `ftype`='3', `root_type`='0', `updated_at`='2017-02-23 11:15:36', `created_at`='2017-02-06 18:59:12'  WHERE (`id` = 29) ;
	/*End   of batch : 1 */
/* SYNC TABLE : `dao_admin_access_group` */

/* SYNC TABLE : `dao_admin_access_group_access` */

/* SYNC TABLE : `dao_admin_access_group_user` */

/* SYNC TABLE : `dao_admin_menu` */

	/*Start of batch : 1 */
INSERT INTO `dao_admin_menu` VALUES ('8', '用户管理', '42', '0', '1', '0', 'fa fa-user', '2017-02-23 11:26:39', CURRENT_TIMESTAMP);
INSERT INTO `dao_admin_menu` VALUES ('9', '用户管理', '41', '8', '1', '0', '', '2017-02-23 11:27:05', CURRENT_TIMESTAMP);
UPDATE `dao_admin_menu` SET `id`='5', `name`='管理员账户管理', `access_id`='27', `pid`='1', `fstatus`='1', `fsort`='3', `icon`='', `updated_at`='2017-02-23 11:24:25', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 5) ;

