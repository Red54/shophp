<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?=$this->config->item('title') . $title?>
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
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <br />
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="text-center panel-title"><?=$this->config->item('title') . $title?></div>
                </div>
                <div class="panel-body">
                    <?=validation_errors('<div class="alert alert-warning text-center" role="alert">', '</div>')?>
                        <?=form_open('admin/login')?>
                            <div class="input-group">
                                <span class="input-group-addon">用户</span>
                                <input type="input" name="user" id="name" value="<?=set_value('user')?>" class="form-control">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">密码</span>
                                <input type="password" name="pass" value="<?=set_value('pass')?>" class="form-control">
                            </div>
                            <br />
                            <div class="text-center">
                                <input class="btn btn-warning" type="submit" value="登录">
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
    <script>document.getElementById('name').focus();</script>
</body>

</html>
