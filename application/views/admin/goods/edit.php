<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?=$this->config->item('title')?>
            <?=$title?>
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
                        <li><a href="<?=site_url('admin/admin')?>">管理员<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?=site_url('admin/gcate')?>">商品类别</a></li>
                        <li class="active"><a href="<?=site_url('admin/goods')?>">商品</a></li>
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
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <?=$title?> <small><?=$subtitle?></small></div>
                <div class="panel-body">
                    <?=validation_errors('<div class="alert alert-warning text-center" role="alert">', '</div>')?>
                        <?=form_open('admin/goods/edit/'.$id, array('onsubmit'=>'return copyContent()'))?>
                            <input type="hidden" name="intro" id="intro">
                            <div class="input-group">
                                <span class="input-group-addon">类别</span>
                                <?=form_dropdown('cid', $cname, set_value('cid', $a['cid']), 'class="form-control"')?>
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">名称</span>
                                <input type="input" name="name" value="<?=set_value('name', $a['name'])?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">规格</span>
                                <input type="input" name="spec" value="<?=set_value('spec', $a['spec'])?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">图片</span>
                                <input type="file" name="userfile">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">介绍</span>
                                <div contentEditable="true" id="introdiv" class="form-control"><?=set_value('intro', $a['intro'], false)?></div>
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">品牌</span>
                                <input type="input" name="brand" value="<?=set_value('brand', $a['brand'])?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">市场价</span>
                                <input type="input" name="mprice" value="<?=set_value('mprice', $a['mprice'])?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">商城价</span>
                                <input type="input" name="sprice" value="<?=set_value('sprice', $a['sprice'])?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">库存量</span>
                                <input type="input" name="stocks" value="<?=set_value('stocks', $a['stocks'])?>" class="form-control">
                            </div>
                            <div class="text-center">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="1" <?php if (1==set_value('status', $a['status'])) { echo 'checked'; }?>> 上架
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="0" <?php if (0==set_value('status', $a['status'])) { echo 'checked'; }?>> 下架
                                    </label>
                                </div>
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
    <script>
        function copyContent() {
            document.getElementById("intro").value = document.getElementById("introdiv").innerHTML;
            return true;
        }
    </script>
</body>

</html>