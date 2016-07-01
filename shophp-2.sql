-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2016 at 12:56 PM
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

--
-- Dumping data for table `acate`
--

INSERT INTO `acate` (`id`, `pid`, `name`, `intro`) VALUES
(1, 0, '地球武器广告', '地球的本地的'),
(2, 0, '外星武器广告', '地外黑科技'),
(3, 1, '大东亚决战兵器广告', '土共核心科技'),
(4, 2, 'K隆星武器广告', 'KeroKero'),
(5, 1, '元首秘武广告', '元首的秘密武器');

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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `tel`, `qq`, `email`, `regdate`, `status`) VALUES
(1, 'admin', '9fcedc4dd6507a6d29709212abc87805f5ac2e02', '12345678901', '123456789', 'yeking@red54.com', '2016-06-26 14:00:00', 1);

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
  `pubtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='文章信息表';

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `cid`, `title`, `abstract`, `content`, `views`, `pubtime`, `status`) VALUES
(1, 3, '小米加步枪买二送一啦！！', '小米加步枪（小型米加粒子步枪，Compact Mega Particle Rifle）买二送一啦！！', '土共核心科技！土共核心科技！大东亚决战兵器！大东亚决战兵器！小米加步枪！小米加步枪！买二送一啦！买二送一啦！<br><br>小米加步枪（小型米加粒子步枪，Compact Mega Particle Rifle），一种在八年战争阶段，通过未知技术渠道被秘密发展出来的强大小型单兵可携带米加粒子武器。敌后根据地的技术工程师们很巧妙的将从微型核聚变反应炉以及米诺夫斯基粒子冷凝器内置在枪托内，并使用现役步枪的外观进行改造，比如最常见的三八式步枪、中正式步枪，甚至还有很罕见的汉阳造外观改装型。紧凑的设计以及伪装外观，在取得非常优异人机工学的同时，还非常隐蔽，很具有欺骗性，经常达到出奇制胜的效果。<br><br>如今这款土共核心科技，大东亚决战兵器，小米加步枪，买二送一了！！机不可失，失不再来！买了不吃亏，买了不上当！', 0, '2016-07-01 02:07:46', 1),
(2, 4, 'K隆星功能饮料“赤汁”上市！！', 'K隆星功能饮料“赤汁”上市！！', 'K隆星功能饮料“赤汁”上市！！<br><br>“赤汁”，由战斗必须的营养植物混合提取的功能饮料，很难喝但会上瘾，战场上的红魔鬼Giroro亲自代言！', 0, '2016-07-01 02:11:50', 1),
(3, 5, '元首御用便携式超级计算机上市啦！！', '元首御用便携式超级计算机上市啦！！<br>', '元首御用便携式超级计算机上市啦！！<br><br>德国谷科荣誉出品！！<br><br>德国谷科世界第一！！', 0, '2016-07-01 02:47:03', 1);

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

--
-- Dumping data for table `gcate`
--

INSERT INTO `gcate` (`id`, `pid`, `name`, `intro`) VALUES
(1, 0, '地球武器', '地球的本地的'),
(2, 0, '外星武器', '地外黑科技'),
(3, 1, '大东亚决战兵器', '土共核心科技'),
(4, 2, 'K隆星武器', 'KeroKero'),
(5, 1, '元首秘武', '元首的秘密武器');

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
  `pubtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品信息表';

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `cid`, `name`, `spec`, `img`, `intro`, `brand`, `mprice`, `sprice`, `sales`, `stocks`, `views`, `pubtime`, `status`) VALUES
(1, 3, '小米加步枪', '紧凑型', 'uploads/cmpr.jpg', '小米加步枪（小型米加粒子步枪，Compact Mega Particle Rifle），一种在八年战争阶段，通过未知技术渠道被秘密发展出来的强大小型单兵可携带米加粒子武器。敌后根据地的技术工程师们很巧妙的将从微型核聚变反应炉以及米诺夫斯基粒子冷凝器内置在枪托内，并使用现役步枪的外观进行改造，比如最常见的三八式步枪、中正式步枪，甚至还有很罕见的汉阳造外观改装型。紧凑的设计以及伪装外观，在取得非常优异人机工学的同时，还非常隐蔽，很具有欺骗性，经常达到出奇制胜的效果。', '土共', 1000000, 999999, 0, 50, 0, '2016-07-01 11:46:55', 1),
(2, 5, '元首御用便携式超级计算机', '御用型', 'uploads/laptop.jpg', '元首御用便携式超级计算机上市啦！！<br><br>德国谷科荣誉出品！！<br><br>德国谷科世界第一！！', '德国谷科', 800000, 600000, 0, 10, 0, '2016-07-01 11:48:32', 1),
(3, 4, 'K隆星功能饮料“赤汁”', '易拉罐型', 'uploads/redwater.jpg', '“赤汁”，由战斗必须的营养植物混合提取的功能饮料，很难喝但会上瘾，战场上的红魔鬼Giroro亲自代言！', 'K隆山', 500, 450, 0, 1000, 0, '2016-07-01 11:50:10', 1);

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
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `mail` varchar(50) NOT NULL COMMENT '邮箱',
  `address` varchar(200) NOT NULL COMMENT '联系地址',
  `pcode` varchar(20) NOT NULL COMMENT '邮政编码',
  `total` float NOT NULL COMMENT '消费总额',
  `balance` float NOT NULL COMMENT '余额',
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册日期',
  `status` int(11) NOT NULL COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='会员信息表';

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `pass`, `passq`, `passa`, `tel`, `qq`, `mail`, `address`, `pcode`, `total`, `balance`, `regdate`, `status`) VALUES
(1, 'test', '9fcedc4dd6507a6d29709212abc87805f5ac2e02', '1+1=?', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', '12345678902', '1234567890', 'test@test.com', '海南省三沙市曾母暗沙', '573199', 0, 0, '2016-06-30 20:29:05', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别编号', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员编号', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章编号', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gcate`
--
ALTER TABLE `gcate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类别编号', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品编号', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员编号', AUTO_INCREMENT=2;
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
