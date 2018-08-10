-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-08-10 03:09:03
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xqb`
--

-- --------------------------------------------------------

--
-- 表的结构 `xqb_article`
--

CREATE TABLE `xqb_article` (
  `id` int(10) NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章标题',
  `type` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文章类型',
  `link` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章链接',
  `cover` varchar(32) CHARACTER SET utf8mb4 NOT NULL COMMENT '封面',
  `state` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态0-下架1-上架',
  `use_times` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分享次数',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章表';

-- --------------------------------------------------------

--
-- 表的结构 `xqb_article_type`
--

CREATE TABLE `xqb_article_type` (
  `id` int(10) NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `state` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态0-下架1-上架',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章分类';

-- --------------------------------------------------------

--
-- 表的结构 `xqb_location`
--

CREATE TABLE `xqb_location` (
  `id` int(11) NOT NULL,
  `uid` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户id',
  `locate_for` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '定位谁',
  `people_ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '被定位的人的ip',
  `people_point` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '被定位的人的坐标',
  `share_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分享文章的时间',
  `read_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '阅读文章的时间',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='定位表';

-- --------------------------------------------------------

--
-- 表的结构 `xqb_recharge`
--

CREATE TABLE `xqb_recharge` (
  `id` int(10) NOT NULL,
  `uid` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户id',
  `code_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '密钥id',
  `origin_amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '原始金额',
  `current_amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '充值后金额',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='充值记录表';

-- --------------------------------------------------------

--
-- 表的结构 `xqb_recharge_code`
--

CREATE TABLE `xqb_recharge_code` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '卡密',
  `is_used` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否使用',
  `used_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '使用时间',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='卡密表';

-- --------------------------------------------------------

--
-- 表的结构 `xqb_users`
--

CREATE TABLE `xqb_users` (
  `id` int(11) NOT NULL,
  `phone` int(15) UNSIGNED NOT NULL DEFAULT '0' COMMENT '手机号',
  `passwd` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '金额',
  `reg_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '注册时间',
  `login_times` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户表';

-- --------------------------------------------------------

--
-- 表的结构 `xqb_user_log`
--

CREATE TABLE `xqb_user_log` (
  `id` int(10) NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户id',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1-注册2-登陆',
  `login_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '登陆时间',
  `login_ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '登陆ip',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户log';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xqb_article`
--
ALTER TABLE `xqb_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `xqb_article_type`
--
ALTER TABLE `xqb_article_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `xqb_location`
--
ALTER TABLE `xqb_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `xqb_recharge`
--
ALTER TABLE `xqb_recharge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `code_id` (`code_id`);

--
-- Indexes for table `xqb_recharge_code`
--
ALTER TABLE `xqb_recharge_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_used` (`is_used`),
  ADD KEY `amount` (`amount`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `xqb_users`
--
ALTER TABLE `xqb_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone` (`phone`);

--
-- Indexes for table `xqb_user_log`
--
ALTER TABLE `xqb_user_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `xqb_article`
--
ALTER TABLE `xqb_article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `xqb_article_type`
--
ALTER TABLE `xqb_article_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `xqb_location`
--
ALTER TABLE `xqb_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `xqb_recharge`
--
ALTER TABLE `xqb_recharge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `xqb_recharge_code`
--
ALTER TABLE `xqb_recharge_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `xqb_users`
--
ALTER TABLE `xqb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `xqb_user_log`
--
ALTER TABLE `xqb_user_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
