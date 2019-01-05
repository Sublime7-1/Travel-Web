<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" /> 
  <!--[if IE 7]>
	  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
	<![endif]--> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace-rtl.min.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace-skins.min.css" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <!--[if lte IE 8]>
	  <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
	<![endif]--> 
  <script src="/style/admin/assets/js/ace-extra.min.js"></script> 
  <!--[if lt IE 9]>
	<script src="/style/admin/assets/js/html5shiv.js"></script>
	<script src="/style/admin/assets/js/respond.min.js"></script>
	<![endif]--> 
  <script src="/style/admin/js/jquery-1.9.1.min.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <title>登录</title> 
 </head> 
 <body class="login-layout Reg_log_style"> 
  <div class="logintop"> 
   <span>欢迎后台管理界面平台</span> 
   <ul> 
	<li><a href="#">返回首页</a></li> 
	<li><a href="#">帮助</a></li> 
	<li><a href="#">关于</a></li> 
   </ul> 
  </div> 
  <div class="loginbody"> 
   <div class="login-container"> 
	<div class="center"> 
	 <img src="/style/admin/images/logo1.png" /> 
	</div> 
	<div class="space-6"></div> 
	<div class="position-relative"> 
	 <div id="login-box" class="login-box widget-box no-border visible"> 
	  <div class="widget-body"> 
	   <div class="widget-main"> 
       <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <ul> 
                <li><?php echo e($error); ?></li>
            </ul>
        </div>
        <script>
            setTimeout(function(){
                $('.alert-danger').hide();
            },2000);
        </script>
        <?php endif; ?>
		<h4 class="header blue lighter bigger"> <i class="icon-coffee green"></i> 管理员登录 </h4> 
		<div class="login_icon">
		 <img src="/style/admin/images/login.png" />
		</div> 
		<form  action="<?php echo e(url('admin/dologin')); ?>" method="post" id="codeform"> 
		 <fieldset> 
         
		  <ul> 
          <?php if(count($errors) > 0): ?>
                <script> top1 = '1';</script>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <script>
                            if(top1 == "1"){
                                top1="2";
                                layer.alert("<?php echo e($error); ?>",{
                                    title: '提示框',       
                                    icon:0,               
                                }); 
                                
                            }

                        </script>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
            <?php endif; ?>
		   <li class="frame_style form_error"><label class="user_icon"></label><input name="name" type="text" id="username" placeholder="用户名" value="<?php echo e(old('name')); ?>"/><i></i></li> 
		   <li class="frame_style form_error"><label class="password_icon"></label><input name="pass" type="password" id="userpwd" placeholder="密码" /><i></i></li> 
		   <li class="frame_style form_error"><label class="Codes_icon"></label><input name="code" type="text" placeholder="验证码" id="Codes_text" value="" /><i></i>
           
			<div class="Codes_region"><img style="width:100px;height:100%" src="<?php echo e(url('/system/code')); ?>" onclick="this.src='<?php echo e(url('/system/code')); ?>?'+Math.random()"></div></li> 
		  </ul> 
		  <div class="space"></div> 
		  <div class="clearfix"> 
		   <label class="inline"> <input type="checkbox" class="ace" /> <span class="lbl">保存密码</span> </label> 
           <?php echo e(csrf_field()); ?>

		   <button type="submit" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn"> <i class="icon-key"></i> 登录 </button> 
		  </div> 
		  <div class="space-4"></div> 
		 </fieldset> 
		</form> 
		<div class="social-or-login center"> 
		 <span class="bigger-110">通知</span> 
		</div> 
		<div class="social-login center">
		  本网站系统不再对IE8以下浏览器支持，请见谅。 
		</div> 
	   </div>
	   <!-- /widget-main --> 
	   <div class="toolbar clearfix"> 
	   </div> 
	  </div>
	  <!-- /widget-body --> 
	 </div>
	 <!-- /login-box --> 
	</div>
	<!-- /position-relative --> 
   </div> 
  </div> 
  <div class="loginbm">
   版权所有 2016 
   <a href="">南京思美软件系统有限公司</a> 
  </div>
  <strong></strong>   
  <script>

$('#login_btn').on('click', function(){
	   var num=0;
	 var str="";
	 $("input[type$='text'],input[type$='password']").each(function(n){
		  if($(this).val()=="")
		  {
			   
    		 layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
        		  title: '提示框',       
        		  icon:0,               
		  }); 

		    num++;
			return false;            
		  } 
	 });
     
        
	  if(num>0){ return false;}
      else{
            
		
		location.href="index.html";
		 layer.close(index);  
	  }                         
	
  });
  $(document).ready(function(){
   $("input[type='text'],input[type='password']").blur(function(){
		var $el = $(this);
		var $parent = $el.parent();
		$parent.attr('class','frame_style').removeClass(' form_error');
		if($el.val()==''){
			$parent.attr('class','frame_style').addClass(' form_error');
		}
	});
  $("input[type='text'],input[type='password']").focus(function(){    
	var $el = $(this);
		var $parent = $el.parent();
		$parent.attr('class','frame_style').removeClass(' form_errors');
		if($el.val()==''){
			$parent.attr('class','frame_style').addClass(' form_errors');
		} else{
	   $parent.attr('class','frame_style').removeClass(' form_errors');
	}
	});
	})


</script>
 </body>
</html>