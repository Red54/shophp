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
                        <li class="active"><a href="<?=site_url('admin/goods')?>">商品<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?=site_url('admin/oform')?>">订单</a></li>
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
		  <div class="panel-heading"><?=$title?></small><a class="pull-right" href="<?=site_url('admin/goods/add')?>">新增商品</a></div>
		  <table class="table">
			  <tr>
				  <th>编号</th>
				  <th>类别</th>
				  <th>名称</th>
				  <th>规格</th>
				  <th>图片</th>
				  <th>品牌</th>
				  <th>市场价</th>
				  <th>商城价</th>
				  <th>库存量</th>
				  <th>发布时间</th>
				  <th>状态</th>
				  <th>编辑</th>
				  <th>删除</th>
			  </tr>
			  <?php foreach ($goods as $a): ?>
				  <tr>
					  <td><?=$a['id']?></td>
					  <td><?=$a['cname']?></td>
					  <td><?=$a['name']?></td>
					  <td><?=$a['spec']?></td>
					  <td><img src="<?=base_url($a['img'])?>" class="smallimg"></td>
					  <td><?=$a['brand']?></td>
					  <td><?=$a['mprice']?></td>
					  <td><?=$a['sprice']?></td>
					  <td><?=$a['stocks']?></td>
					  <td><?=$a['pubtime']?></td>
					  <td><?php if (1 == $a['status']) echo '上架'; else echo '下架';?></td>
					  <td><a href="<?=site_url('admin/goods/edit/'.$a['id'])?>">编辑</a></td>
					  <td><a href="<?=site_url('admin/goods/del/'.$a['id'])?>" onclick="return confirm('您确认要删除此商品吗？')">删除</a></td>
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
