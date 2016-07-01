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
                        <li><a href="<?=site_url()?>">主页</a></li>
                        <li class="active"><a href="<?=site_url('gcate')?>">商品<span class="sr-only">(current)</span></a></li>
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
        	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="panel panel-info">
		  <div class="panel-heading">
                    <div class="text-center panel-title"><?=$title?></div>
		  </div>
 		 <ul class="list-group">
		   <li class="list-group-item">
				<div class="text-center">
                   <a href="<?=site_url('acate/index/'.$cid)?>"><?=$cname?></a>
                   <?=$a['pubtime']?>
					访问量:<?=$a['views']?>
				</div>
			</li>
		</ul>
        <div class="panel-body">
                    <?=validation_errors('<div class="alert alert-warning text-center" role="alert">', '</div>')?>
                        <?=form_open('goods/index/'.$id)?>
			<div class="col-lg-6">
				<div class="image">
					<img src="<?=base_url($a['img'])?>" class="img-responsive center-block">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="col-xs-6 col-lg-12">
				<S><h5>市场价：<?=$a['mprice']?></h5></S>
				</div>
				<div class="col-xs-6 col-lg-12">
				<h5>商城价：<?=$a['sprice']?></h5>
				</div>
				<div class="col-xs-6 col-lg-12">
				<h5>销售量：<?=$a['sales']?></h5>
				</div>
				<div class="col-xs-6 col-lg-12">
				<h5>库存量：<?=$a['stocks']?></h5>
				</div>
				<div class="col-xs-6 col-lg-12">
                            <p class="input-group">
                                <span class="input-group-addon input-group-addon-sm">数量</span>
                                <input type="input" name="num" value="<?=set_value('num', 1)?>" class="form-control">
                            </p>
				</div>
				<div class="col-xs-6 col-lg-12">
                                <input class="btn btn-primary" type="submit" value="加入购物车">
				</div>
			</div>
             </div>
			 <table class="table">
				 <tr>
				 <th>规格</th>
				 <td><?=$a['spec']?></td>
				 <th>品牌</th>
				 <td><?=$a['brand']?></td>
			 </tr>
			 </table>
        <div class="panel-body">
                    <?=$a['intro']?>
             </div>
                            </form>
		</div>
		</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url('js/jquery.min.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>

</html>
