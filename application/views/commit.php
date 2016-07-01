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
                        <li><a href="<?=site_url('gcate')?>">商品</a></li>
                        <li><a href="<?=site_url('acate')?>">文章</a></li>
                        <li class="active"><a href="<?=site_url('oform')?>">订单<span class="sr-only">(current)</span></a></li>
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
		<div class="panel panel-primary">
		  <div class="panel-heading">
                    <div class="text-center panel-title"><?=$title?></div>
		  </div>
                  <?=form_open('oform/commit')?>
		  <table class="table">
			  <tr>
				  <th>名称</th>
				  <th>图片</th>
				  <th>市场价</th>
				  <th>商城价</th>
				  <th>库存量</th>
				  <th>数量</th>
			  </tr>
			  <?php foreach ($goods as $a): ?>
				  <tr>
					  <td><?=$a['name']?></td>
					  <td><img src="<?=base_url($a['img'])?>" class="smallimg"></td>
					  <td><S><?=$a['mprice']?></S></td>
					  <td><?=$a['sprice']?></td>
					  <td><?=$a['stocks']?></td>
					  <td><?=$a['num']?></td>
				  </tr>
				  <?php endforeach; ?>
		  </table>
                    <?=validation_errors('<div class="alert alert-warning text-center" role="alert">', '</div>')?>
          <div class="panel-body">
                            <div class="input-group">
                                <span class="input-group-addon">总金额</span>
                                <label class="form-control"><?=$amount?></label>
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">收货人</span>
                                <input type="input" name="receiver" value="<?=set_value('receiver')?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">收货地址</span>
                                <input type="input" name="address" value="<?=set_value('address')?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">联系电话</span>
                                <input type="input" name="tel" value="<?=set_value('tel')?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">付款方式</span>
								<?=form_dropdown('pmethod', $pmethod, set_value('pmethod', 0), 'class="form-control"')?>
                            </div>
                            <br />
                            <div class="text-center">
                                <input class="btn btn-warning" type="submit" value="下单">
                            </div>
		  </div>
                  </form>
		</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url('js/jquery.min.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>

</html>
