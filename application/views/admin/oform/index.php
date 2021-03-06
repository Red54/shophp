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
        <nav class="navbar navbar-default">
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
                        <li><a href="<?=site_url('admin/admin')?>">管理员</a></li>
                        <li><a href="<?=site_url('admin/gcate')?>">商品类别</a></li>
                        <li><a href="<?=site_url('admin/goods')?>">商品</a></li>
                        <li class="active"><a href="<?=site_url('admin/oform')?>">订单<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?=site_url('admin/member')?>">会员</a></li>
                        <li><a href="<?=site_url('admin/acate')?>">文章类别</a></li>
                        <li><a href="<?=site_url('admin/article')?>">文章</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><?=$this->session->admin?></a></li>
                        <li><a href="<?=site_url('admin/logout')?>">退出</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
		<div class="panel panel-danger">
		  <div class="panel-heading"><?=$title?></div>
		  <table class="table">
			  <tr>
				  <th>编号</th>
				  <th>会员名</th>
				  <th>商品数量</th>
				  <th>消费金额</th>
				  <th>收货人</th>
				  <th>收货地址</th>
				  <th>联系电话</th>
				  <th>付款方式</th>
				  <th>订单日期</th>
				  <th>状态</th>
				  <th>查看</th>
				  <th>删除</th>
			  </tr>
			  <?php foreach ($oform as $a): ?>
				  <tr>
					  <td><?=$a['id']?></td>
					  <td><?=$a['mname']?></td>
					  <td><?=$a['quantity']?></td>
					  <td><?=$a['amount']?></td>
					  <td><?=$a['receiver']?></td>
					  <td><?=$a['address']?></td>
					  <td><?=$a['tel']?></td>
					  <td><?php if (0 == $a['pmethod']) echo '意念支付';?></td>
					  <td><?=$a['ordate']?></td>
					  <td><?php if (1 == $a['status']) echo '已支付'; else echo '未支付';?></td>
					  <td><a href="<?=site_url('admin/oform/ogoods/'.$a['id'])?>">查看</a></td>
					  <td><a href="<?=site_url('admin/oform/del/'.$a['id'])?>" onclick="return confirm('您确认要删除此订单吗？')">删除</a></td>
				  </tr>
				  <?php endforeach; ?>
		  </table>
		</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url('js/jquery.min.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>

</html>
