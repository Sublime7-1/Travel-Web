<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>联想 后台管理系统</title>
    <link rel="shortcut icon" href="/style/admin/img/1.png">
    <link rel="stylesheet" href="/style/admin/bs/css/bootstrap.min.css">
    <script src="/style/admin/bs/js/jquery.min.js"></script>
    <script src="/style/admin/bs/js/bootstrap.min.js"></script>
    <style>
        .navbar-blue{
            background-color: #ccc;
        }

        .navbar .navbar-brand{
            color:black;
        }

        .navbar .navbar-brand:hover{
            color:black;
        }

        .navbar-default .navbar-nav>li>a{
            color:black;
        }
        .navbar-default .navbar-nav>li>a:hover{
            color:black;

        }
        
        .body{
            margin-top:90px;
        }
        .list-group{
            display:none;
        }
        .panel-primary>.panel-heading{
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- 导航条 -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-blue" role="navigation">
            <div class="container-fluid">
            <!-- 导航logo -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img style="display:inline" width="30px" src="/style/admin/img/1.png" alt="">   联想后台管理系统</a>
                </div>

            <!-- 出logo以外 -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">后台管理<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#editPass">修改密码</a></li>
                            <li><a href="#">前台首页</a></li>
                            <li><a href="#">退出</a></li>
                          </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <!-- 内容区域 -->
        <div class="row body">

            <!-- 菜单 -->
            <div class="col-md-2">

                <!-- 管理员管理-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-user"></span> 管理员管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/admin/admin">管理员列表</a></li>
                        
                    </ul>
                </div>
                <!-- 会员管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-user"></span> 会员管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/admin/user">会员列表</a></li>
                        
                    </ul>
                </div>


                <!-- 分类管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-tasks"></span> 分类管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">分类列表</a></li>    
                    </ul>
                </div>
                <!-- 商品管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-gift"></span> 商品管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">商品列表</a></li>    
                    </ul>
                </div>
                <!-- 订单管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> 订单管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">订单列表</a></li>    
                    </ul>
                </div>
                <!-- 评论管理 -->、
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-envelope"></span> 评论管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">评论列表</a></li>    
                    </ul>
                </div>

                <!-- 系统管理 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-certificate"></span> 系统管理</h2>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="">系统配置</a></li>
                        <li class="list-group-item"><a href="">轮播图管理</a></li>
                        <li class="list-group-item"><a href="">广告管理</a></li>
                        
                    </ul>
                </div>
            </div>
        @yield('main')
            
        </div>
    </div>


    <!-- 修改密码的摸态框 -->
    <div class="modal fade" id="editPass">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">修改密码</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">原密码</label>
                            <input type="password" name="" class="form-control" placeholder="请输入原密码" id="">
                        </div>
                        <div class="form-group">
                            <label for="">新密码</label>
                            <input type="password" name="" class="form-control" placeholder="请输入新密码" id="">
                        </div>
                        <div class="form-group">
                            <label for="">确认密码</label>
                            <input type="password" name="" class="form-control" placeholder="请再次输入密码" id="">
                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" value="提交" class="btn btn-success">
                            <input type="reset" value="重置" class="btn btn-danger">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
<script>
    // 菜单切换
    $(".panel-title").click(function(){
        $(".list-group").hide();
        $(this).parent().next().toggle(500);
    });
    
</script>
</html>