-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2016 at 01:45 AM
-- Server version: 10.0.25-MariaDB-1
-- PHP Version: 7.0.5-2+b1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `acate`
--

CREATE TABLE `acate` (
  `id` int(11) NOT NULL COMMENT '类别编号',
  `pid` int(11) NOT NULL COMMENT '父级类别编号',
  `name` varchar(20) NOT NULL COMMENT '类别名称',
  `intro` text NOT NULL COMMENT '类别简介'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='文章类别表';

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT '管理员编号',
  `user` varchar(20) NOT NULL COMMENT '用户名',
  `pass` varchar(50) NOT NULL COMMENT '密码',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `email` varchar(50) NOT NULL COMMENT '邮箱地址',
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册日期',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员信息表';

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT '文章编号',
  `cid` int(11) NOT NULL COMMENT '类别编号',
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `abstract` text NOT NULL COMMENT '摘要',
  `content` text NOT NULL COMMENT '内容',
  `views` int(11) NOT NULL COMMENT '访问量',
  `pubtime` datetime NOT NULL COMMENT '发布时间',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='文章信息表';

-- --------------------------------------------------------

--
-- Table structure for table `gcate`
--

CREATE TABLE `gcate` (
  `id` int(11) NOT NULL COMMENT '类别编号',
  `pid` int(11) NOT NULL COMMENT '父级类别编号',
  `name` varchar(20) NOT NULL COMMENT '类别名称',
  `intro` text NOT NULL COMMENT '类别简介'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品类别表';

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL COMMENT '商品编号',
  `cid` int(11) NOT NULL COMMENT '类别编号',
  `name` varchar(100) NOT NULL COMMENT '商品名称',
  `spec` varchar(300) NOT NULL COMMENT '规格',
  `img` varchar(300) NOT NULL COMMENT '图片',
  `intro` text NOT NULL COMMENT '介绍',
  `brand` varchar(50) NOT NULL COMMENT '品牌',
  `mprice` float NOT NULL COMMENT '市场价',
  `sprice` float NOT NULL COMMENT '商城价',
  `sales` int(11) NOT NULL COMMENT '销售量',
  `stocks` int(11) NOT NULL COMMENT '库存量',
  `views` int(11) NOT NULL COMMENT '访问量',
  `pubtime` int(11) NOT NULL COMMENT '发布时间',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品信息表';

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL COMMENT '会员编号',
  `name` varchar(20) NOT NULL COMMENT '会员名',
  `pass` varchar(50) NOT NULL COMMENT '密码',
  `passq` varchar(50) NOT NULL COMMENT '密码保护问题',
  `passa` varchar(50) NOT NULL COMMENT '密码保护答案',
  `idnum` varchar(30) NOT NULL COMMENT '身份证号',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `mail` varchar(50) NOT NULL COMMENT '邮箱',
  `address` varchar(200) NOT NULL COMMENT '联系地址',
  `pcode` varchar(20) NOT NULL COMMENT '邮政编码',
  `total` float NOT NULL COMMENT '消费总额',
  `balance` float NOT NULL COMMENT '余额',
  `regdate` datetime NOT NULL COMMENT '注册日期',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='会员信息表';

-- --------------------------------------------------------

--
-- Table structure for table `oform`
--

CREATE TABLE `oform` (
  `id` int(11) NOT NULL COMMENT '订单编号',
  `num` varchar(20) NOT NULL COMMENT '订单号',
  `mname` varchar(20) NOT NULL COMMENT '会员名',
  `quantity` int(11) NOT NULL COMMENT '商品数量',
  `amount` float NOT NULL COMMENT '消费金额',
  `receiver` varchar(100) NOT NULL COMMENT '收货人',
  `address` varchar(300) NOT NULL COMMENT '收货地址',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `pmethod` int(11) NOT NULL COMMENT '付款方式',
  `ordate` date NOT NULL COMMENT '订单日期',
  `status` int(11) NOT NULL COMMENT '订单状态',
  `note` text NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单信息表';

-- --------------------------------------------------------

--
-- Table structure for table `ogoods`
--

CREATE TABLE `ogoods` (
  `id` int(11) NOT NULL COMMENT '编号',
  `onum` varchar(20) NOT NULL COMMENT '订单号',
  `gid` int(11) NOT NULL COMMENT '商品编号',
  `price` int(11) NOT NULL COMMENT '单价',
  `quantity` int(11) NOT NULL COMMENT '数量',
  `discount` int(11) NOT NULL COMMENT '折扣',
  `subtotal` int(11) NOT NULL COMMENT '小计价格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单商品信息表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acate`
--
ALTER TABLE `acate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `gcate`
--
ALTER TABLE `gcate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `oform`
--
ALTER TABLE `oform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num` (`num`) USING BTREE,
  ADD KEY `mname` (`mname`) USING BTREE;

--
-- Indexes for table `ogoods`
--
ALTER TABLE `ogoods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onum` (`onum`),
  ADD KEY `gid` (`gid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acate`
--
ALTER TABLE `acate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别编号';
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员编号';
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章编号';
--
-- AUTO_INCREMENT for table `gcate`
--
ALTER TABLE `gcate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别编号';
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品编号';
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员编号';
--
-- AUTO_INCREMENT for table `oform`
--
ALTER TABLE `oform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单编号';
--
-- AUTO_INCREMENT for table `ogoods`
--
ALTER TABLE `ogoods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `acate` (`id`);

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `gcate` (`id`);

--
-- Constraints for table `oform`
--
ALTER TABLE `oform`
  ADD CONSTRAINT `oform_ibfk_1` FOREIGN KEY (`mname`) REFERENCES `member` (`name`);

--
-- Constraints for table `ogoods`
--
ALTER TABLE `ogoods`
  ADD CONSTRAINT `ogoods_ibfk_1` FOREIGN KEY (`onum`) REFERENCES `oform` (`num`),
  ADD CONSTRAINT `ogoods_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `goods` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
