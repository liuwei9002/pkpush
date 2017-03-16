	/*Start of batch : 1 */
INSERT INTO `dao_admin_access` VALUES ('52', 'PPT标签删除', 'glob/ppt@tags/del', '3', '0', '2017-02-28 14:58:44', '2017-02-28 14:58:44');
INSERT INTO `dao_admin_access` VALUES ('44', 'PPT', '', '1', '2', '2017-02-28 10:52:05', '2017-02-26 17:20:36');
INSERT INTO `dao_admin_access` VALUES ('46', 'PPT添加', 'glob/ppt@index/add', '2', '0', '2017-02-26 18:24:49', '2017-02-26 18:08:19');
INSERT INTO `dao_admin_access` VALUES ('47', 'PPT标签管理', 'glob/ppt@tags/index', '1', '1', '2017-02-28 11:34:14', '2017-02-28 11:33:47');
INSERT INTO `dao_admin_access` VALUES ('48', 'PPT标签添加', 'glob/ppt@tags/add', '2', '0', '2017-02-28 14:40:13', '2017-02-28 14:40:13');
INSERT INTO `dao_admin_access` VALUES ('49', 'PPT标签添加', 'glob/ppt@tags/doadd', '3', '0', '2017-02-28 14:40:29', '2017-02-28 14:40:29');
INSERT INTO `dao_admin_access` VALUES ('50', 'PPT标签编辑', 'glob/ppt@tags/edit', '2', '0', '2017-02-28 14:58:09', '2017-02-28 14:58:09');
INSERT INTO `dao_admin_access` VALUES ('51', 'PPT标签编辑', 'glob/ppt@tags/doedit', '3', '0', '2017-02-28 14:58:24', '2017-02-28 14:58:24');
INSERT INTO `dao_admin_access` VALUES ('45', 'PPT管理', 'glob/ppt@index/index', '1', '1', '2017-02-26 17:20:57', '2017-02-26 17:20:57');
UPDATE `dao_admin_access` SET `id`='12', `name`='权限组编辑', `route`='glob/setting@accessgroup/edit', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:09:54'  WHERE (`id` = 12) ;
UPDATE `dao_admin_access` SET `id`='13', `name`='权限组编辑', `route`='glob/setting@accessgroup/doedit', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:10:07'  WHERE (`id` = 13) ;
UPDATE `dao_admin_access` SET `id`='14', `name`='权限组删除', `route`='glob/setting@accessgroup/del', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:10:26'  WHERE (`id` = 14) ;
UPDATE `dao_admin_access` SET `id`='15', `name`='菜单删除', `route`='glob/setting@menu/del', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:15:46'  WHERE (`id` = 15) ;
UPDATE `dao_admin_access` SET `id`='16', `name`='菜单编辑', `route`='glob/setting@menu/edit', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:16:20'  WHERE (`id` = 16) ;
UPDATE `dao_admin_access` SET `id`='17', `name`='菜单编辑', `route`='glob/setting@menu/doedit', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:16:30'  WHERE (`id` = 17) ;
UPDATE `dao_admin_access` SET `id`='18', `name`='菜单关闭/开启', `route`='glob/setting@menu/updatestatus', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:16:59'  WHERE (`id` = 18) ;
UPDATE `dao_admin_access` SET `id`='19', `name`='权限删除', `route`='glob/setting@access/delete', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-18 15:21:23'  WHERE (`id` = 19) ;
UPDATE `dao_admin_access` SET `id`='20', `name`='权限编辑', `route`='glob/setting@access/edit', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:18:48'  WHERE (`id` = 20) ;
UPDATE `dao_admin_access` SET `id`='21', `name`='权限编辑', `route`='glob/setting@access/doedit', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:18:36'  WHERE (`id` = 21) ;
UPDATE `dao_admin_access` SET `id`='22', `name`='权限组添加用户', `route`='glob/setting@accessgroup/addUser', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-13 17:15:17'  WHERE (`id` = 22) ;
UPDATE `dao_admin_access` SET `id`='11', `name`='权限组添加', `route`='glob/setting@accessgroup/doadd', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:09:35'  WHERE (`id` = 11) ;
UPDATE `dao_admin_access` SET `id`='24', `name`='权限组删除用户', `route`='glob/setting@accessgroup/deluser', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-13 17:16:02'  WHERE (`id` = 24) ;
UPDATE `dao_admin_access` SET `id`='26', `name`='系统设置', `route`='', `ftype`='1', `root_type`='2', `updated_at`='2017-02-06 14:46:14', `created_at`='2017-01-13 04:41:38'  WHERE (`id` = 26) ;
UPDATE `dao_admin_access` SET `id`='10', `name`='权限组添加', `route`='glob/setting@accessgroup/add', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:09:20'  WHERE (`id` = 10) ;
UPDATE `dao_admin_access` SET `id`='1', `name`='权限管理', `route`='glob/setting@access/index', `ftype`='1', `root_type`='1', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-05 00:48:28'  WHERE (`id` = 1) ;
UPDATE `dao_admin_access` SET `id`='9', `name`='权限组管理', `route`='glob/setting@accessgroup/index', `ftype`='1', `root_type`='1', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-11 11:19:42'  WHERE (`id` = 9) ;
UPDATE `dao_admin_access` SET `id`='8', `name`='菜单添加', `route`='glob/setting@menu/doadd', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-09 15:54:27'  WHERE (`id` = 8) ;
UPDATE `dao_admin_access` SET `id`='32', `name`='微信公众号管理', `route`='glob/wx@index/index', `ftype`='1', `root_type`='1', `updated_at`='2017-02-09 15:10:49', `created_at`='2017-02-09 15:10:29'  WHERE (`id` = 32) ;
UPDATE `dao_admin_access` SET `id`='33', `name`='微信公众号自定义菜单', `route`='glob/wx@index/menulist', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 15:22:23', `created_at`='2017-02-09 15:22:23'  WHERE (`id` = 33) ;
UPDATE `dao_admin_access` SET `id`='34', `name`='添加公众号自定义菜单', `route`='glob/wx@index/add', `ftype`='2', `root_type`='0', `updated_at`='2017-02-10 15:15:06', `created_at`='2017-02-10 14:34:52'  WHERE (`id` = 34) ;
UPDATE `dao_admin_access` SET `id`='35', `name`='自定义菜单添加', `route`='glob/wx@index/doadd', `ftype`='3', `root_type`='0', `updated_at`='2017-02-10 15:14:57', `created_at`='2017-02-10 14:56:12'  WHERE (`id` = 35) ;
UPDATE `dao_admin_access` SET `id`='36', `name`='编辑自定义菜单', `route`='glob/wx@index/edit', `ftype`='2', `root_type`='0', `updated_at`='2017-02-10 15:44:20', `created_at`='2017-02-10 15:44:20'  WHERE (`id` = 36) ;
UPDATE `dao_admin_access` SET `id`='37', `name`='编辑自定义菜单', `route`='glob/wx@index/doedit', `ftype`='3', `root_type`='0', `updated_at`='2017-02-10 15:44:40', `created_at`='2017-02-10 15:44:40'  WHERE (`id` = 37) ;
UPDATE `dao_admin_access` SET `id`='38', `name`='删除自定义菜单', `route`='glob/wx@index/delete', `ftype`='3', `root_type`='0', `updated_at`='2017-02-10 15:49:51', `created_at`='2017-02-10 15:49:51'  WHERE (`id` = 38) ;
UPDATE `dao_admin_access` SET `id`='39', `name`='微信公众号', `route`='', `ftype`='1', `root_type`='2', `updated_at`='2017-02-10 15:51:22', `created_at`='2017-02-10 15:51:22'  WHERE (`id` = 39) ;
UPDATE `dao_admin_access` SET `id`='40', `name`='上报自定义菜单', `route`='glob/wx@index/upwx', `ftype`='3', `root_type`='0', `updated_at`='2017-02-10 18:49:40', `created_at`='2017-02-10 18:49:40'  WHERE (`id` = 40) ;
UPDATE `dao_admin_access` SET `id`='7', `name`='添加菜单', `route`='glob/setting@menu/add', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-09 15:50:41'  WHERE (`id` = 7) ;
UPDATE `dao_admin_access` SET `id`='5', `name`='菜单管理', `route`='glob/setting@menu/index', `ftype`='1', `root_type`='1', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-09 13:27:09'  WHERE (`id` = 5) ;
UPDATE `dao_admin_access` SET `id`='4', `name`='添加权限', `route`='glob/setting@access/doadd', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-06 14:34:43'  WHERE (`id` = 4) ;
UPDATE `dao_admin_access` SET `id`='2', `name`='添加权限', `route`='glob/setting@access/add', `ftype`='2', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-05 00:48:22'  WHERE (`id` = 2) ;
UPDATE `dao_admin_access` SET `id`='23', `name`='权限组添加用户', `route`='glob/setting@accessgroup/doadduser', `ftype`='3', `root_type`='0', `updated_at`='2017-02-09 12:21:01', `created_at`='2017-01-13 17:15:41'  WHERE (`id` = 23) ;
	/*End   of batch : 1 */
/* SYNC TABLE : `dao_admin_access_group` */

	/*Start of batch : 1 */
UPDATE `dao_admin_access_group` SET `id`='1', `name`='开发人员', `descr`='开发人员权限', `updated_at`='2017-02-06 21:16:49', `created_at`='2017-02-06 16:08:17'  WHERE (`id` = 1) ;
	/*End   of batch : 1 */
/* SYNC TABLE : `dao_admin_access_group_access` */

	/*Start of batch : 1 */
UPDATE `dao_admin_access_group_access` SET `id`='38', `access_id`='26', `access_group_id`='1', `updated_at`='2017-02-06 21:16:49', `created_at`='2017-02-06 21:16:49'  WHERE (`id` = 38) ;
UPDATE `dao_admin_access_group_access` SET `id`='39', `access_id`='27', `access_group_id`='1', `updated_at`='2017-02-06 21:16:49', `created_at`='2017-02-06 21:16:49'  WHERE (`id` = 39) ;
UPDATE `dao_admin_access_group_access` SET `id`='40', `access_id`='5', `access_group_id`='1', `updated_at`='2017-02-06 21:16:49', `created_at`='2017-02-06 21:16:49'  WHERE (`id` = 40) ;
UPDATE `dao_admin_access_group_access` SET `id`='41', `access_id`='18', `access_group_id`='1', `updated_at`='2017-02-06 21:16:49', `created_at`='2017-02-06 21:16:49'  WHERE (`id` = 41) ;
UPDATE `dao_admin_access_group_access` SET `id`='42', `access_id`='17', `access_group_id`='1', `updated_at`='2017-02-06 21:16:49', `created_at`='2017-02-06 21:16:49'  WHERE (`id` = 42) ;
UPDATE `dao_admin_access_group_access` SET `id`='43', `access_id`='16', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 43) ;
UPDATE `dao_admin_access_group_access` SET `id`='44', `access_id`='15', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 44) ;
UPDATE `dao_admin_access_group_access` SET `id`='45', `access_id`='8', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 45) ;
UPDATE `dao_admin_access_group_access` SET `id`='46', `access_id`='7', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 46) ;
UPDATE `dao_admin_access_group_access` SET `id`='47', `access_id`='1', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 47) ;
UPDATE `dao_admin_access_group_access` SET `id`='48', `access_id`='19', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 48) ;
UPDATE `dao_admin_access_group_access` SET `id`='49', `access_id`='20', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 49) ;
UPDATE `dao_admin_access_group_access` SET `id`='50', `access_id`='21', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 50) ;
UPDATE `dao_admin_access_group_access` SET `id`='51', `access_id`='4', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 51) ;
UPDATE `dao_admin_access_group_access` SET `id`='52', `access_id`='2', `access_group_id`='1', `updated_at`='2017-02-06 21:16:50', `created_at`='2017-02-06 21:16:50'  WHERE (`id` = 52) ;
	/*End   of batch : 1 */
/* SYNC TABLE : `dao_admin_access_group_user` */

	/*Start of batch : 1 */
UPDATE `dao_admin_access_group_user` SET `id`='2', `uid`='3', `access_group_id`='1', `updated_at`='2017-02-06 19:07:12', `created_at`='2017-02-06 19:07:12'  WHERE (`id` = 2) ;
UPDATE `dao_admin_access_group_user` SET `id`='1', `uid`='2', `access_group_id`='1', `updated_at`='2017-02-06 16:52:40', `created_at`='2017-02-06 16:52:40'  WHERE (`id` = 1) ;
	/*End   of batch : 1 */
/* SYNC TABLE : `dao_admin_menu` */

	/*Start of batch : 1 */
INSERT INTO `dao_admin_menu` VALUES ('10', 'PPT', '44', '0', '1', '3', 'fa fa-file-powerpoint-o', '2017-02-26 17:24:26', CURRENT_TIMESTAMP);
INSERT INTO `dao_admin_menu` VALUES ('11', 'PPT管理', '45', '10', '1', '0', '', '2017-02-26 17:25:10', CURRENT_TIMESTAMP);
INSERT INTO `dao_admin_menu` VALUES ('12', 'PPT标签管理', '47', '10', '1', '0', '', '2017-02-28 11:34:39', CURRENT_TIMESTAMP);
UPDATE `dao_admin_menu` SET `id`='4', `name`='权限组管理', `access_id`='9', `pid`='1', `fstatus`='1', `fsort`='2', `icon`='0', `updated_at`='2017-02-06 15:59:55', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 4) ;
UPDATE `dao_admin_menu` SET `id`='6', `name`='微信公众号', `access_id`='39', `pid`='0', `fstatus`='1', `fsort`='1', `icon`='fa fa-commenting', `updated_at`='2017-02-10 15:51:47', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 6) ;
UPDATE `dao_admin_menu` SET `id`='7', `name`='微信公众号管理', `access_id`='32', `pid`='6', `fstatus`='1', `fsort`='0', `icon`='', `updated_at`='2017-02-09 15:11:42', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 7) ;
UPDATE `dao_admin_menu` SET `id`='3', `name`='菜单管理', `access_id`='5', `pid`='1', `fstatus`='1', `fsort`='1', `icon`='0', `updated_at`='2017-02-06 15:59:25', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 3) ;
UPDATE `dao_admin_menu` SET `id`='2', `name`='权限管理', `access_id`='1', `pid`='1', `fstatus`='1', `fsort`='0', `icon`='0', `updated_at`='2017-02-06 15:30:31', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 2) ;
UPDATE `dao_admin_menu` SET `id`='1', `name`='系统设置', `access_id`='26', `pid`='0', `fstatus`='1', `fsort`='0', `icon`='fa fa-gear', `updated_at`='2017-02-06 17:25:00', `created_at`=CURRENT_TIMESTAMP  WHERE (`id` = 1) ;
	/*End   of batch : 1 */
/* SYNC TABLE : `dao_admin_user` */

	/*Start of batch : 1 */
UPDATE `dao_admin_user` SET `id`='3', `email`='wangkaihui@admin.com', `display_name`='汪开辉', `passwd`='26ce1c5ded31354a1426ee9d8b0f0668', `is_admin`='0', `updated_at`='2017-02-06 18:18:05', `created_at`='2017-02-06 18:18:05'  WHERE (`id` = 3) ;
UPDATE `dao_admin_user` SET `id`='1', `email`='admin@admin.com', `display_name`='管理员', `passwd`='26ce1c5ded31354a1426ee9d8b0f0668', `is_admin`='1', `updated_at`='2017-02-09 11:08:32', `created_at`='2016-12-01 14:31:03'  WHERE (`id` = 1) ;
	/*End   of batch : 1 */

/* SYNC TABLE : `dao_ppt_tag_main` */

insert into `dao_ppt_tag_main`(`id`, `name`, `ppt_number`, `fsort`, `pid`, `created_at`, `updated_at`) values ('1', '用途', '0', '0', '0', '2017-02-28 15:02:03', '2017-02-28 15:02:03');
/* SYNC TABLE : `dao_ppt_tag_sub` */

/* SYNC TABLE : `dao_ppt_user` */

/* SYNC TABLE : `dao_users` */

insert into `dao_users`(`id`, `account`, `account_type`, `display_name`, `passwd`, `validate`, `is_lock`, `reg_source`, `created_at`, `updated_at`) values ('1', 'wangkaihui', '1', '汪汪', '1easdasdasdasdasda', '0', '0', 'web', '2017-02-23 15:52:55', '2017-02-23 00:00:00');
/* SYNC TABLE : `dao_users_thirdpart` */

/* SYNC TABLE : `dao_wxpub_menu` */

	/*Start of batch : 1 */
UPDATE `dao_wxpub_menu` SET `id`='4', `pid`='2', `fname`='说三道四', `ftype`='view', `fdata`='http://m.putao.com', `fsort`='0', `fstatus`='1', `created_at`='2017-02-10 21:31:29', `updated_at`='2017-02-10 21:31:29'  WHERE (`id` = 4) ;
UPDATE `dao_wxpub_menu` SET `id`='2', `pid`='0', `fname`='葡萄官网', `ftype`='view', `fdata`='http://m.putao.com', `fsort`='0', `fstatus`='1', `created_at`='2017-02-10 15:54:05', `updated_at`='2017-02-10 15:54:05'  WHERE (`id` = 2) ;
	/*End   of batch : 1 */

