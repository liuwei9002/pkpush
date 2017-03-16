CREATE TABLE IF NOT EXISTS `dao_admin_access` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `route` varchar(100) NOT NULL DEFAULT '',
  `ftype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '权限类型,1-菜单，2-页面，3-服务',
  `root_type` tinyint(1) DEFAULT '0' COMMENT '跟节点类型,1-菜单， 0-不是根节点，2-菜单组节点',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dao_admin_access`
--

INSERT INTO `dao_admin_access` (`id`, `name`, `route`, `ftype`, `root_type`, `updated_at`, `created_at`) VALUES
(1, '权限管理', 'glob/setting@access/index', 1, 1, '2017-02-09 04:21:01', '2017-01-04 16:48:28'),
(2, '添加权限', 'glob/setting@access/add', 2, 0, '2017-02-09 04:21:01', '2017-01-04 16:48:22'),
(4, '添加权限', 'glob/setting@access/doadd', 3, 0, '2017-02-09 04:21:01', '2017-01-06 06:34:43'),
(5, '菜单管理', 'glob/setting@menu/index', 1, 1, '2017-02-09 04:21:01', '2017-01-09 05:27:09'),
(7, '添加菜单', 'glob/setting@menu/add', 2, 0, '2017-02-09 04:21:01', '2017-01-09 07:50:41'),
(8, '菜单添加', 'glob/setting@menu/doadd', 3, 0, '2017-02-09 04:21:01', '2017-01-09 07:54:27'),
(9, '权限组管理', 'glob/setting@accessgroup/index', 1, 1, '2017-02-09 04:21:01', '2017-01-11 03:19:42'),
(10, '权限组添加', 'glob/setting@accessgroup/add', 2, 0, '2017-02-09 04:21:01', '2017-01-11 03:09:20'),
(11, '权限组添加', 'glob/setting@accessgroup/doadd', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:09:35'),
(12, '权限组编辑', 'glob/setting@accessgroup/edit', 2, 0, '2017-02-09 04:21:01', '2017-01-11 03:09:54'),
(13, '权限组编辑', 'glob/setting@accessgroup/doedit', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:10:07'),
(14, '权限组删除', 'glob/setting@accessgroup/del', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:10:26'),
(15, '菜单删除', 'glob/setting@menu/del', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:15:46'),
(16, '菜单编辑', 'glob/setting@menu/edit', 2, 0, '2017-02-09 04:21:01', '2017-01-11 03:16:20'),
(17, '菜单编辑', 'glob/setting@menu/doedit', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:16:30'),
(18, '菜单关闭/开启', 'glob/setting@menu/updatestatus', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:16:59'),
(19, '权限删除', 'glob/setting@access/delete', 3, 0, '2017-02-09 04:21:01', '2017-01-18 07:21:23'),
(20, '权限编辑', 'glob/setting@access/edit', 2, 0, '2017-02-09 04:21:01', '2017-01-11 03:18:48'),
(21, '权限编辑', 'glob/setting@access/doedit', 3, 0, '2017-02-09 04:21:01', '2017-01-11 03:18:36'),
(22, '权限组添加用户', 'glob/setting@accessgroup/addUser', 2, 0, '2017-02-09 04:21:01', '2017-01-13 09:15:17'),
(23, '权限组添加用户', 'glob/setting@accessgroup/doadduser', 3, 0, '2017-02-09 04:21:01', '2017-01-13 09:15:41'),
(24, '权限组删除用户', 'glob/setting@accessgroup/deluser', 3, 0, '2017-02-09 04:21:01', '2017-01-13 09:16:02'),
(26, '系统设置', '', 1, 2, '2017-02-06 06:46:14', '2017-01-12 20:41:38'),
(27, '用户管理', 'glob/setting@account/userlist', 1, 1, '2017-02-09 04:21:01', '2017-02-06 09:51:37'),
(28, '用户添加', 'glob/setting@account/add', 2, 0, '2017-02-09 04:21:01', '2017-02-06 10:58:48'),
(29, '用户添加后台', 'glob/setting@account/doadd', 3, 0, '2017-02-09 04:21:01', '2017-02-06 10:59:12'),
(30, '用户删除', 'glob/setting@account/deluser', 3, 0, '2017-02-09 04:22:07', '2017-02-06 10:59:33'),
(32, '微信公众号管理', 'glob/wx@index/index', 1, 1, '2017-02-09 07:10:49', '2017-02-09 07:10:29'),
(33, '微信公众号自定义菜单', 'glob/wx@index/menulist', 2, 0, '2017-02-09 07:22:23', '2017-02-09 07:22:23'),
(34, '添加公众号自定义菜单', 'glob/wx@index/add', 2, 0, '2017-02-10 07:15:06', '2017-02-10 06:34:52'),
(35, '自定义菜单添加', 'glob/wx@index/doadd', 3, 0, '2017-02-10 07:14:57', '2017-02-10 06:56:12'),
(36, '编辑自定义菜单', 'glob/wx@index/edit', 2, 0, '2017-02-10 07:44:20', '2017-02-10 07:44:20'),
(37, '编辑自定义菜单', 'glob/wx@index/doedit', 3, 0, '2017-02-10 07:44:40', '2017-02-10 07:44:40'),
(38, '删除自定义菜单', 'glob/wx@index/delete', 3, 0, '2017-02-10 07:49:51', '2017-02-10 07:49:51'),
(39, '微信公众号', '', 1, 2, '2017-02-10 07:51:22', '2017-02-10 07:51:22'),
(40, '上报自定义菜单', 'glob/wx@index/upwx', 3, 0, '2017-02-10 10:49:40', '2017-02-10 10:49:40');

-- --------------------------------------------------------

--
-- 表的结构 `dao_admin_access_group`
--

CREATE TABLE IF NOT EXISTS `dao_admin_access_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '群组名称',
  `descr` varchar(100) DEFAULT NULL COMMENT '群组描述',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='权限组信息';

--
-- 转存表中的数据 `dao_admin_access_group`
--

INSERT INTO `dao_admin_access_group` (`id`, `name`, `descr`, `updated_at`, `created_at`) VALUES
(1, '开发人员', '开发人员权限', '2017-02-06 13:16:49', '2017-02-06 08:08:17');

-- --------------------------------------------------------

--
-- 表的结构 `dao_admin_access_group_access`
--

CREATE TABLE IF NOT EXISTS `dao_admin_access_group_access` (
  `id` int(11) NOT NULL,
  `access_id` int(11) DEFAULT NULL COMMENT '权限id',
  `access_group_id` int(11) DEFAULT NULL COMMENT '权限组id',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='权限组权限';

--
-- 转存表中的数据 `dao_admin_access_group_access`
--

INSERT INTO `dao_admin_access_group_access` (`id`, `access_id`, `access_group_id`, `updated_at`, `created_at`) VALUES
(38, 26, 1, '2017-02-06 13:16:49', '2017-02-06 13:16:49'),
(39, 27, 1, '2017-02-06 13:16:49', '2017-02-06 13:16:49'),
(40, 5, 1, '2017-02-06 13:16:49', '2017-02-06 13:16:49'),
(41, 18, 1, '2017-02-06 13:16:49', '2017-02-06 13:16:49'),
(42, 17, 1, '2017-02-06 13:16:49', '2017-02-06 13:16:49'),
(43, 16, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(44, 15, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(45, 8, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(46, 7, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(47, 1, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(48, 19, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(49, 20, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(50, 21, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(51, 4, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50'),
(52, 2, 1, '2017-02-06 13:16:50', '2017-02-06 13:16:50');

-- --------------------------------------------------------

--
-- 表的结构 `dao_admin_access_group_user`
--

CREATE TABLE IF NOT EXISTS `dao_admin_access_group_user` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL COMMENT '用户uid',
  `access_group_id` int(11) DEFAULT NULL COMMENT 'access_group_id',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='权限组用户';

--
-- 转存表中的数据 `dao_admin_access_group_user`
--

INSERT INTO `dao_admin_access_group_user` (`id`, `uid`, `access_group_id`, `updated_at`, `created_at`) VALUES
(1, 2, 1, '2017-02-06 08:52:40', '2017-02-06 08:52:40'),
(2, 3, 1, '2017-02-06 11:07:12', '2017-02-06 11:07:12');

-- --------------------------------------------------------

--
-- 表的结构 `dao_admin_menu`
--

CREATE TABLE IF NOT EXISTS `dao_admin_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '0' COMMENT '名称',
  `access_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `fstatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0关闭,1开启',
  `fsort` int(11) NOT NULL DEFAULT '0' COMMENT '排序，越小越在前',
  `icon` varchar(20) DEFAULT NULL COMMENT '小图标',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='菜单表';

--
-- 转存表中的数据 `dao_admin_menu`
--

INSERT INTO `dao_admin_menu` (`id`, `name`, `access_id`, `pid`, `fstatus`, `fsort`, `icon`, `updated_at`, `created_at`) VALUES
(1, '系统设置', 26, 0, 1, 0, 'fa fa-gear', '2017-02-06 09:25:00', CURRENT_TIMESTAMP),
(2, '权限管理', 1, 1, 1, 0, '0', '2017-02-06 07:30:31', CURRENT_TIMESTAMP),
(3, '菜单管理', 5, 1, 1, 1, '0', '2017-02-06 07:59:25', CURRENT_TIMESTAMP),
(4, '权限组管理', 9, 1, 1, 2, '0', '2017-02-06 07:59:55', CURRENT_TIMESTAMP),
(5, '用户管理', 27, 1, 1, 3, '', '2017-02-06 09:52:45', CURRENT_TIMESTAMP),
(6, '微信公众号', 39, 0, 1, 1, 'fa fa-commenting', '2017-02-10 07:51:47', CURRENT_TIMESTAMP),
(7, '微信公众号管理', 32, 6, 1, 0, '', '2017-02-09 07:11:42', CURRENT_TIMESTAMP);

-- --------------------------------------------------------

--
-- 表的结构 `dao_admin_user`
--

CREATE TABLE IF NOT EXISTS `dao_admin_user` (
  `id` int(11) NOT NULL,
  `email` varchar(88) DEFAULT NULL,
  `display_name` varchar(100) NOT NULL COMMENT '昵称',
  `passwd` varchar(32) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dao_admin_user`
--

INSERT INTO `dao_admin_user` (`id`, `email`, `display_name`, `passwd`, `is_admin`, `updated_at`, `created_at`) VALUES
(1, 'admin@admin.com', '管理员', '26ce1c5ded31354a1426ee9d8b0f0668', 1, '2017-02-09 03:08:32', '2016-12-01 06:31:03'),
(3, 'wangkaihui@admin.com', '汪开辉', '26ce1c5ded31354a1426ee9d8b0f0668', 0, '2017-02-06 10:18:05', '2017-02-06 10:18:05');

-- --------------------------------------------------------

--
-- 表的结构 `dao_users`
--

CREATE TABLE IF NOT EXISTS `dao_users` (
  `id` int(11) NOT NULL,
  `account` varchar(100) NOT NULL COMMENT '账号',
  `account_type` tinyint(2) NOT NULL COMMENT '账号类型',
  `display_name` varchar(100) NOT NULL COMMENT '昵称',
  `passwd` varchar(100) NOT NULL COMMENT '密码',
  `validate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '账号是否验证',
  `reg_source` varchar(50) NOT NULL COMMENT '注册来源',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员列表';

-- --------------------------------------------------------

--
-- 表的结构 `dao_users_thirdpart`
--

CREATE TABLE IF NOT EXISTS `dao_users_thirdpart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `thirdpart` tinyint(4) NOT NULL,
  `open_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='第三方登录';

-- --------------------------------------------------------

--
-- 表的结构 `dao_wxpub_menu`
--

CREATE TABLE IF NOT EXISTS `dao_wxpub_menu` (
  `id` int(11) NOT NULL,
  `pid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0,一级菜单',
  `fname` varchar(100) NOT NULL COMMENT '菜单名称',
  `ftype` varchar(100) NOT NULL COMMENT '按钮类型',
  `fdata` varchar(255) NOT NULL,
  `fsort` int(2) NOT NULL COMMENT '排序',
  `fstatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启，0关闭',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='微信菜单';

--
-- 转存表中的数据 `dao_wxpub_menu`
--

INSERT INTO `dao_wxpub_menu` (`id`, `pid`, `fname`, `ftype`, `fdata`, `fsort`, `fstatus`, `created_at`, `updated_at`) VALUES
(2, 0, '葡萄官网', 'view', 'http://m.putao.com', 0, 1, '2017-02-10 07:54:05', '2017-02-10 07:54:05'),
(4, 2, '说三道四', 'view', 'http://m.putao.com', 0, 1, '2017-02-10 13:31:29', '2017-02-10 13:31:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dao_admin_access`
--
ALTER TABLE `dao_admin_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_admin_access_group`
--
ALTER TABLE `dao_admin_access_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_admin_access_group_access`
--
ALTER TABLE `dao_admin_access_group_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_admin_access_group_user`
--
ALTER TABLE `dao_admin_access_group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_admin_menu`
--
ALTER TABLE `dao_admin_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dao_index_pdi` (`pid`) USING BTREE;

--
-- Indexes for table `dao_admin_user`
--
ALTER TABLE `dao_admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_users`
--
ALTER TABLE `dao_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_users_thirdpart`
--
ALTER TABLE `dao_users_thirdpart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dao_wxpub_menu`
--
ALTER TABLE `dao_wxpub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dao_admin_access`
--
ALTER TABLE `dao_admin_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `dao_admin_access_group`
--
ALTER TABLE `dao_admin_access_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dao_admin_access_group_access`
--
ALTER TABLE `dao_admin_access_group_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `dao_admin_access_group_user`
--
ALTER TABLE `dao_admin_access_group_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dao_admin_menu`
--
ALTER TABLE `dao_admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dao_admin_user`
--
ALTER TABLE `dao_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dao_users`
--
ALTER TABLE `dao_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dao_users_thirdpart`
--
ALTER TABLE `dao_users_thirdpart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dao_wxpub_menu`
--
ALTER TABLE `dao_wxpub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
