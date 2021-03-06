<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?=$this->config->item('title')?> <?=$title?>
    </title>

    <!-- Bootstrap -->
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('css/shophp.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?=base_url('js/html5shiv.min.js')?>"></script>
      <script src="<?=base_url('js/respond.min.js')?>"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=site_url()?>"><?=$this->config->item('title')?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?=site_url()?>">主页<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?=site_url('gcate')?>">商品</a></li>
                        <li><a href="<?=site_url('acate')?>">文章</a></li>
                        <li><a href="<?=site_url('oform')?>">订单</a></li>
                        <li><a href="<?=site_url('member')?>">会员</a></li>
                        <li><a href="<?=site_url('admin/admin')?>">管理员</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=site_url('cart')?>">购物车</a></li>
						<?php if ($this->member_model->vsession()): ?>
                        <li><a href="<?=site_url('login')?>">登录</a></li>
                        <li><a href="<?=site_url('reg')?>">注册</a></li>
							<?php else: ?>
                        <li><a><?=$this->session->member?></a></li>
                        <li><a href="<?=site_url('logout')?>">退出</a></li>
					<?php endif; ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
		<div class="col-sm-12 col-md-6">
		<div class="panel panel-info">
		  <div class="panel-heading">最新商品<a class="pull-right" href="<?=site_url('gcate')?>">查看所有</a></div>
		  <div class="panel-body">
			  <?php foreach ($goods as $a): ?>
		  		<div class="col-xs-12 col-sm-6 text-center">
					<a href="<?=site_url('goods/index/'.$a['id'])?>">
					<div class="image">
					<img src="<?=base_url($a['img'])?>" class="img-responsive">
					</div>
					<p><?=$a['name']?></p>
					</a>
				</div>
				<?php endforeach; ?>
		</div>
		</div>
		</div>
		<div class="col-sm-12 col-md-6">
		<div class="panel panel-success">
		  <div class="panel-heading">最新文章<a class="pull-right" href="<?=site_url('acate')?>">查看所有</a></div>
  			<table class="table">
			  <?php foreach ($article as $a): ?>
		  		<tr><td><a href="<?=site_url('article/index/'.$a['id'])?>"><?=$a['title']?></a>
					<span class="pull-right"><?=$a['pubtime']?></span>
					<div class="well well-sm"><?=$a['abstract']?></div>
				</td></tr>
				<?php endforeach; ?>
  		  	</table>
		</div>
		</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url('js/jquery.min.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>

</html>
