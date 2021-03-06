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
                        <li><a href="<?=site_url('oform')?>">订单</a></li>
                        <li class="active"><a href="<?=site_url('member')?>">会员<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?=site_url('admin/admin')?>">管理员</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=site_url('cart')?>">购物车</a></li>
                        <li><a><?=$this->session->member?></a></li>
                        <li><a href="<?=site_url('logout')?>">退出</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel panel-warning">
                <div class="panel-heading"><?=$title?> <small><?=$subtitle?></small></div>
                <div class="panel-body">
                    <?=validation_errors('<div class="alert alert-warning text-center" role="alert">', '</div>')?>
                        <?=form_open('member/passpt')?>
                            <div class="input-group">
                                <span class="input-group-addon">密保问题</span>
                                <input type="input" name="passq" value="<?=set_value('passq', $a['passq'])?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">密保答案</span>
                                <input type="input" name="passa" value="<?=set_value('passa')?>" class="form-control">
                            </div>
                            <br />
                            <div class="text-center">
                                <input class="btn btn-warning" type="submit" value="提交">
                            </div>
                            </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url('js/jquery.min.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>

</html>
