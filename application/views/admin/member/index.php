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
                        <li><a href="<?=site_url('admin/oform')?>">订单</a></li>
                        <li class="active"><a href="<?=site_url('admin/member')?>">会员<span class="sr-only">(current)</span></a></li>
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
		  <div class="panel-heading"><?=$title?></small><a class="pull-right" href="<?=site_url('admin/member/add')?>">新建会员</a></div>
		  <table class="table">
			  <tr>
				  <th>编号</th>
				  <th>会员名</th>
				  <th>联系电话</th>
				  <th>QQ</th>
				  <th>邮箱</th>
				  <th>联系地址</th>
				  <th>邮政编码</th>
				  <th>注册日期</th>
				  <th>状态</th>
				  <th>编辑资料</th>
				  <th>修改密码</th>
				  <th>修改密保</th>
				  <th>删除</th>
			  </tr>
			  <?php foreach ($member as $a): ?>
				  <tr>
					  <td><?=$a['id']?></td>
					  <td><?=$a['name']?></td>
					  <td><?=$a['tel']?></td>
					  <td><?=$a['qq']?></td>
					  <td><?=$a['mail']?></td>
					  <td><?=$a['address']?></td>
					  <td><?=$a['pcode']?></td>
					  <td><?=$a['regdate']?></td>
					  <td><?php if (1 == $a['status']) echo '正常'; else echo '冻结';?></td>
					  <td><a href="<?=site_url('admin/member/edit/'.$a['id'])?>">编辑资料</a></td>
					  <td><a href="<?=site_url('admin/member/passwd/'.$a['id'])?>">修改密码</a></td>
					  <td><a href="<?=site_url('admin/member/passpt/'.$a['id'])?>">修改密保</a></td>
					  <td><a href="<?=site_url('admin/member/del/'.$a['id'])?>" onclick="return confirm('您确认要删除此会员吗？')">删除</a></td>
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
