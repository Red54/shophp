<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		text-align: center;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1 align="left" style="float:left"><?=$title?></h1>
	<h1 align="right" style="float:right"><a href="<?=site_url('admin/logout')?>">退出</a></h1>
	<h1>
		<a href="<?=site_url('admin/')?>">商品类别管理</a> |
		<a href="<?=site_url('admin/')?>">商品信息管理</a> |
		<a href="<?=site_url('admin/')?>">订单管理</a> |
		<a href="<?=site_url('admin/')?>">会员信息管理</a> |
		<a href="<?=site_url('admin/')?>">管理员信息管理</a> |
		<a href="<?=site_url('admin/')?>">文章类别管理</a> |
		<a href="<?=site_url('admin/')?>">文章信息管理</a>
	</h1>
	<div id="body">
		<p><a href="<?=site_url('a')?>">商品类别管理</a></p>
		<p><a href="<?=site_url('a')?>">商品信息管理</a></p>
		<p><a href="<?=site_url('a')?>">订单管理</a></p>
		<p><a href="<?=site_url('a')?>">会员信息管理</a></p>
		<p><a href="<?=site_url('a')?>">管理员信息管理</a></p>
		<p><a href="<?=site_url('a')?>">文章类别管理</a></p>
		<p><a href="<?=site_url('a')?>">文章信息管理</a></p>
	</div>

	<p class="footer">
		<em>
			&copy;
			<a href="https://github.com/Red54/shophp">Shophp</a>
			2016
		</em>
	</p>
</div>

</body>
</html>

