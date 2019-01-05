<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
 <head> 
  <meta charset="utf-8" /> 
  <title>网站后台管理系统  </title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" /> 
  <!--[if IE 7]> <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
    <![endif]--> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace-rtl.min.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace-skins.min.css" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <link rel="icon" href="/uploads/<?php echo e($info->pic); ?>" type="image/x-icon"  />
  <!--[if lte IE 8]>
      <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
    <![endif]--> 
  <script src="/style/admin/assets/js/ace-extra.min.js"></script> 
  <!--[if lt IE 9]>
    <script src="/style/admin/assets/js/html5shiv.js"></script>
    <script src="/style/admin/assets/js/respond.min.js"></script>
    <![endif]--> 
  <!--[if !IE]> --> 
  <script src="/style/admin/js/jquery-1.9.1.min.js"></script> 
  <!-- <![endif]--> 
  <!--[if IE]>
         <script type="text/javascript">window.jQuery || document.write("<script src='/style/admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");</script>
        <![endif]--> 
  <script type="text/javascript">
      if("ontouchend" in document) document.write("<script src='/style/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
    </script> 
  <script src="/style/admin/assets/js/bootstrap.min.js"></script> 
  <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script> 
  <!--[if lte IE 8]>
      <script src="/style/admin/assets/js/excanvas.min.js"></script>
    <![endif]--> 
  <script src="/style/admin/assets/js/ace-elements.min.js"></script> 
  <script src="/style/admin/assets/js/ace.min.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script> 
  <script src="/style/admin/js/jquery.nicescroll.js" type="text/javascript"></script> 
  <script type="text/javascript"> 
 $(function(){ 
 var cid = $('#nav_list> li>.submenu');
    cid.each(function(i){ 
       $(this).attr('id',"Sort_link_"+i);
    })  
 })
 jQuery(document).ready(function(){   
    $.each($(".submenu"),function(){
  var $aobjs=$(this).children("li");
  var rowCount=$aobjs.size();
  var divHeigth=$(this).height();
    $aobjs.height(divHeigth/rowCount);      
  }); 
    //初始化宽度、高度

    $("#main-container").height($(window).height()-76); 
  $("#iframe").height($(window).height()-140); 
   
  $(".sidebar").height($(window).height()-99); 
    var thisHeight = $("#nav_list").height($(window).outerHeight()-173); 
  $(".submenu").height();
  $("#nav_list").children(".submenu").css("height",thisHeight);
  
    //当文档窗口发生改变时 触发  
    $(window).resize(function(){
  $("#main-container").height($(window).height()-76); 
  $("#iframe").height($(window).height()-140);
  $(".sidebar").height($(window).height()-99); 
  
  var thisHeight = $("#nav_list").height($(window).outerHeight()-173); 
  $(".submenu").height();
  $("#nav_list").children(".submenu").css("height",thisHeight);
  });
    $(document).on('click','.iframeurl',function(){
                var cid = $(this).attr("name");
        var cname = $(this).attr("title");
                $("#iframe").attr("src",cid).ready();
        $("#Bcrumbs").attr("href",cid).ready();
        $(".Current_page a").attr('href',cid).ready();  
                $(".Current_page").attr('name',cid);
        $(".Current_page").html(cname).css({"color":"#333333","cursor":"default"}).ready(); 
        $("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display","none").ready(); 
        $("#parentIfour").html(''). css("display","none").ready();    
      });
   
    
    
});
 /******/
  $(document).on('click','.link_cz > li',function(){
  $('.link_cz > li').removeClass('active');
  $(this).addClass('active');
});
/*******************/
//jQuery( document).ready(function(){
//    $("#submit").click(function(){
//  // var num=0;
//     var str="";
//     $("input[type$='password']").each(function(n){
//          if($(this).val()=="")
//          {
//              // num++;
//         layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
//                title: '提示框',       
//        icon:0,       
//          }); 
//             // layer.msg(str+=""+$(this).attr("name")+"不能为空！\r\n");
//             layer.close(index);
//          }     
//     });    
//})    
//  });

/*********************点击事件*********************/
$( document).ready(function(){
  $('#nav_list,.link_cz').find('li.home').on('click',function(){
  $('#nav_list,.link_cz').find('li.home').removeClass('active');
  $(this).addClass('active');
  });                       
//时间设置
  function currentTime(){ 
    var d=new Date(),str=''; 
    str+=d.getFullYear()+'年'; 
    str+=d.getMonth() + 1+'月'; 
    str+=d.getDate()+'日'; 
    str+=d.getHours()+'时'; 
    str+=d.getMinutes()+'分'; 
    str+= d.getSeconds()+'秒'; 
    return str; 
} 

setInterval(function(){$('#time').html(currentTime)},1000); 
//修改密码
$('.change_Password').on('click', function(){
    layer.open({
    type: 1,
  title:'修改密码',
  area: ['300px','300px'],
  shadeClose: true,
  content: $('#change_Pass'),
  btn:['确认修改'],
  yes:function(index, layero){    
       if ($("#password").val()==""){
        layer.alert('原密码不能为空!',{
              title: '提示框',       
        icon:0,
          
       });
      return false;
          } 
      if ($("#Nes_pas").val()==""){
        layer.alert('新密码不能为空!',{
              title: '提示框',       
        icon:0,
          
       });
      return false;
          } 
       
      if ($("#c_mew_pas").val()==""){
        layer.alert('确认新密码不能为空!',{
              title: '提示框',       
        icon:0,
          
       });
      return false;
          }
        if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',       
        icon:0,
          
       });
       return false;
        }   
     else{        
        layer.alert('修改成功！',{
               title: '提示框',        
      icon:1,   
        }); 
        layer.close(index);      
      }  
  }
    });
});
  $('#Exit_system').on('click', function(){
      layer.confirm('是否确定退出系统？', {
     btn: ['是','否'] ,//按钮
   icon:2,
    }, 
  function(){
    location.href="/admin/loginout";
        
    });
});
});
function link_operating(name,title){
                var cid = $(this).name;
        var cname = $(this).title;
                $("#iframe").attr("src",cid).ready();
        $("#Bcrumbs").attr("href",cid).ready();
        $(".Current_page a").attr('href',cid).ready();  
                $(".Current_page").attr('name',cid);
        $(".Current_page").html(cname).css({"color":"#333333","cursor":"default"}).ready(); 
        $("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display","none").ready(); 
        $("#parentIfour").html(''). css("display","none").ready();    
      
    
}
</script> 
 </head> 
 <body> 
  <div class="navbar navbar-default" id="navbar"> 
   <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script> 
   <div class="navbar-container" id="navbar-container"> 
    <div class="navbar-header pull-left"> 
     <a href="#" class="navbar-brand"> <small> <img src="/style/admin/images/logo.png" width="470px" /> </small> </a>
     <!-- /.brand --> 
    </div>
    <!-- /.navbar-header --> 
    <div class="navbar-header operating pull-left"> 
    </div> 
    <div class="navbar-header pull-right" role="navigation"> 
     <ul class="nav ace-nav"> 
      <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <span class="time"><em id="time"></em></span><span class="user-info"><small>欢迎光临,</small><?php echo e($level); ?></span> <i class="icon-caret-down"></i> </a> 
       <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close"> 
        <li><a href="javascript:void(0" name="/admin/system_set" title="系统设置" class="iframeurl"><i class="icon-cog"></i>网站设置</a></li> 
        <li><a href="javascript:void(0)" name="/admin/personal" title="个人信息" class="iframeurl"><i class="icon-user"></i>个人资料</a></li> 
        <li class="divider"></li> 
        <li><a href="javascript:ovid(0)" id="Exit_system"><i class="icon-off"></i>退出</a></li> 
       </ul> </li> 
      <li class="purple"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-bell-alt"></i><span class="badge badge-important"><?php echo e($real_num + $num1); ?></span></a> 
       <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close"> 
        <li class="dropdown-header"><i class="icon-warning-sign"></i><?php echo e($real_num + $num1); ?>条通知</li> 
        <li> <a href="#" onclick="news()"> 
          <div class="clearfix"> 
           <span class="pull-left"> <i class="btn btn-xs no-hover btn-pink icon-comments-alt"></i> 最新消息 </span> 
           <span class="badge badge-danger dingdanreal"><?php echo e($real_num + $num1); ?></span>
          </div> </a> </li> 
        <li> <a href="/admin/loginout"> <i class="btn btn-xs btn-primary icon-user"></i> 切换为编辑登录.. </a> </li> 
        <li> <a href="#" onclick="dingdan()"> 
          <div class="clearfix"> 
           <span class="pull-left"> <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i> 新订单 </span> 
           <span class="badge badge-danger dingdanreal"><?php echo e($real_num); ?></span>
          </div> </a> </li> 
        <li> <a href="#" onclick="yonghu()"> 
          <div class="clearfix"> 
           <span class="pull-left"> <i class="btn btn-xs no-hover btn-info icon-twitter"></i> 用户消息 </span> 
           <span class="badge badge-danger servicenews"><?php echo e($num1); ?></span>
          </div> </a> </li> 
        <li> <a href="/admin/message"> 查看所有通知 <i class="icon-arrow-right"></i> </a> </li> 
       </ul> </li> 
     </ul> 
     <script>
      function dingdan(){
        $('#dingdan').click();
      }
      function yonghu(){
        $('#yong').click();

      }
      function news(){
        $('#dingdan').click();

      }
        
     </script>
     <!-- <div class="right_info">
                 
                   <div class="get_time" ><span id="time" class="time"></span>欢迎光临,管理员</span></div>
          <ul class="nav ace-nav">  
            <li><a href="javascript:ovid(0)" class="change_Password">修改密码</a></li>
                        <li><a href="javascript:ovid(0)" id="Exit_system">退出系统</a></li>
                       
          </ul>
        </div>--> 
    </div> 
   </div> 
  </div> 
  <div class="main-container" id="main-container"> 
   <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script> 
   <div class="main-container-inner"> 
    <a class="menu-toggler" id="menu-toggler" href="#"> <span class="menu-text"></span> </a> 
    <div class="sidebar" id="sidebar"> 
     <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
          </script> 
     <div class="sidebar-shortcuts" id="sidebar-shortcuts"> 
      <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large"> 
       <a class="btn btn-success"> <i class="icon-signal"></i> </a> 
       <a class="btn btn-info"> <i class="icon-pencil"></i> </a> 
       <a class="btn btn-warning"> <i class="icon-group"></i> </a> 
       <a class="btn btn-danger"> <i class="icon-cogs"></i> </a> 
      </div> 
      <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini"> 
       <span class="btn btn-success"></span> 
       <span class="btn btn-info"></span> 
       <span class="btn btn-warning"></span> 
       <span class="btn btn-danger"></span> 
      </div> 
     </div>
     <!-- #sidebar-shortcuts --> 
     <div id="menu_style" class="menu_style"> 
      <ul class="nav nav-list" id="nav_list"> 
       <li class="home"><a href="javascript:void(0)" name="/admin/admin/index" class="iframeurl" title=""><i class="icon-home"></i><span class="menu-text"> 系统首页 </span></a></li> 
       <li><a href="#" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text"> 管理员管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
          <li class="home"><a href="javascript:void(0)" name="/admin/admin" title="管理员列表" class="iframeurl"><i class="icon-double-angle-right"></i>管理员列表</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/personal" title="个人信息" class="iframeurl"><i class="icon-double-angle-right"></i>个人信息</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/level" title="权限管理" class="iframeurl"><i class="icon-double-angle-right"></i>权限管理</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/leveltype" title="权限分类管理" class="iframeurl"><i class="icon-double-angle-right"></i>权限分类管理</a></li>
        
        </ul> </li>
        <li> <a href="#" class="dropdown-toggle"><i class="icon-user"></i><span class="menu-text"> 会员管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/user" title="会员列表" class="iframeurl"><i class="icon-double-angle-right"></i>会员列表</a></li> 
         
        </ul> </li> 
       <li><a href="#" class="dropdown-toggle"><i class="icon-desktop"></i><span class="menu-text"> 产品管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/GoodsLabel" title="商品分类" class="iframeurl"><i class="icon-double-angle-right"></i>商品分类表</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/coupontype" title="优惠劵分类" class="iframeurl"><i class="icon-double-angle-right"></i>优惠劵分类表</a></li>
         <li class="home"><a href="javascript:void(0)" name="/admin/NavigateFirst/" title="导航一分类管理" class="iframeurl"><i class="icon-double-angle-right"></i>导航一分类管理</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/NavigateSecond/" title="导航二分类管理" class="iframeurl"><i class="icon-double-angle-right"></i>导航二分类管理</a></li> 
          
         <li class="home"><a href="javascript:void(0)" name="/admin/insurance/" title="保险管理" class="iframeurl"><i class="icon-double-angle-right"></i>保险管理</a></li> 
        </ul> </li> 
       <li> <a href="#" class="dropdown-toggle"><i class="icon-picture "></i><span class="menu-text"> 图片管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/advert" title="广告管理" class="iframeurl"><i class="icon-double-angle-right"></i>广告管理</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/adverttype" title="分类管理" class="iframeurl"><i class="icon-double-angle-right"></i>分类管理</a></li>  
        </ul> </li> 
       <li> <a href="#" class="dropdown-toggle"><i class="icon-list"></i><span class="menu-text"> 订单管理<span class="badge badge-danger dingdanall "><?php echo e($sum); ?></span> </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
        <li class="home"><a href="javascript:void(0)" name="/admin/order/success_order" title="完成的订单" class="iframeurl"><i class="icon-double-angle-right"></i>完成的订单</a></li> 
         <li class="home"><a href="javascript:void(0)" id="dingdan" name="/admin/order/loading_order" title="交易信息" class="iframeurl"><i class="icon-double-angle-right"></i>待处理<span class="badge badge-danger dingdanreal"><?php echo e($real_num); ?></span></a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/order/return" title="退款管理" class="iframeurl"><i class="icon-double-angle-right"></i>退款管理<span class="badge badge-danger dingdanreturn"><?php echo e($return_num); ?></span></a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/order/form/chartinfo" title="交易订单" class="iframeurl"><i class="icon-double-angle-right"></i>交易信息</a></li> 
         
         
        </ul> </li> 
       <li> <a href="#" class="dropdown-toggle"><i class="icon-credit-card"></i><span class="menu-text"> 支付管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/accounts" title="账户管理" class="iframeurl"><i class="icon-double-angle-right"></i>账户管理</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/pay" title="支付方式" class="iframeurl"><i class="icon-double-angle-right"></i>支付方式</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/payconfig" title="支付配置" class="iframeurl"><i class="icon-double-angle-right"></i>支付配置</a></li> 
        </ul> </li> 
       <li> <a href="#" class="dropdown-toggle"><i class="icon-book"></i><span class="menu-text"> 评论管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/comment_type" title="评论分类" class="iframeurl"><i class="icon-double-angle-right"></i>评论分类</a></li>         
         <li class="home"><a href="javascript:void(0)" name="/admin/comment" title="评论信息" class="iframeurl"><i class="icon-double-angle-right"></i>评论信息</a></li>   
        </ul> </li> 
       <li> <a href="#" class="dropdown-toggle"><i class="icon-sun"></i><span class="menu-text"> 友情链接管理<span class="badge badge-danger linksnum"><?php echo e($links_num); ?></span> </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/links" title="友情链接列表" class="iframeurl"><i class="icon-double-angle-right"></i>友情链接列表<span class="badge badge-danger linksnum"><?php echo e($links_num); ?></span></a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/links_contacts" title="负责人列表" class="iframeurl"><i class="icon-double-angle-right"></i>负责人列表</a></li> 
        </ul> </li> 
       <li><a href="#" class="dropdown-toggle"><i class="icon-laptop"></i><span class="menu-text"> 客服管理<span class="badge badge-danger servicenum"><?php echo e($service_num); ?></span> </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/servicelist" title="店铺列表" class="iframeurl"><i class="icon-double-angle-right"></i>客服列表</a></li> 
         <li class="home"><a href="javascript:void(0)" name="admin/servicesend" title="店铺审核" class="iframeurl"><i class="icon-double-angle-right"></i>客服审核<span class="badge badge-danger servicenum"><?php echo e($service_num); ?></span></a></li> 
        </ul> </li> 


        <li><a href="#" class="dropdown-toggle"><i class="icon-desktop"></i><span class="menu-text"> 商品管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/Goods" title="发布商品" class="iframeurl"><i class="icon-double-angle-right"></i>发布商品</a></li>
         <li class="home"><a href="javascript:void(0)" name="/admin/discountActive" title="发布优惠活动" class="iframeurl"><i class="icon-double-angle-right"></i>发布优惠活动</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/coupon/indexs" title="发布优惠券" class="iframeurl"><i class="icon-double-angle-right"></i>发布优惠券</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/goodsinfo/travel" title="查看旅程时间" class="iframeurl"><i class="icon-double-angle-right"></i>查看旅程时间</a></li>
         <li class="home"><a href="javascript:void(0)" name="/admin/goodsinfo/city" title="查看旅程交通" class="iframeurl"><i class="icon-double-angle-right"></i>查看旅程交通</a></li> 
       
        </ul> </li>

        <li><a href="#" class="dropdown-toggle"><i class="icon-laptop"></i><span class="menu-text"> 聊天室 <span class="badge badge-danger servicenews"><?php echo e($num1); ?></span> </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" id="yong" name="/admin/servicenews" title="用户消息" class="iframeurl"><i class="icon-double-angle-right"></i>用户消息<span class="badge badge-danger servicenews"><?php echo e($num1); ?></span> </a></li> 
        </ul> </li>


        <li><a href="#" class="dropdown-toggle"><i class="icon-comments-alt"></i><span class="menu-text"> 站内信管理 <span class="badge badge-danger message"><?php echo e($message_num); ?></span></span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/message" title="消息列表" class="iframeurl"><i class="icon-double-angle-right"></i>已发消息<span class="badge badge-danger message"><?php echo e($message_num); ?></span></a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/message/create" title="发布单条消息" class="iframeurl"><i class="icon-double-angle-right"></i>发布单条消息</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/message/add" title="发布单条消息" class="iframeurl"><i class="icon-double-angle-right"></i>发布全站消息</a></li> 
        </ul> </li>

       <li><a href="#" class="dropdown-toggle"><i class="icon-comments-alt"></i><span class="menu-text"> 意见反馈管理 <span class="badge badge-danger advicesnum"><?php echo e($advices_num); ?></span></span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/advicestype" title="意见类型" class="iframeurl"><i class="icon-double-angle-right"></i>意见类型</a></li> 
         <li class="home"><a href="javascript:void(0)" name="/admin/advices" title="意见列表" class="iframeurl"><i class="icon-double-angle-right"></i>意见列表<span class="badge badge-danger advicesnum"><?php echo e($advices_num); ?></span></a></li> 
        </ul> </li> 

       <li><a href="#" class="dropdown-toggle"><i class="icon-bookmark"></i><span class="menu-text"> 文章管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/article" title="文章列表" class="iframeurl"><i class="icon-double-angle-right"></i>文章列表</a></li> 
        </ul> </li> 
       <li><a href="#" class="dropdown-toggle"><i class="icon-cogs"></i><span class="menu-text"> 系统管理 </span><b class="arrow icon-angle-down"></b></a> 
        <ul class="submenu"> 
         <li class="home"><a href="javascript:void(0)" name="/admin/system_set" title="系统设置" class="iframeurl"><i class="icon-double-angle-right"></i>系统设置</a></li> 
       
         <li class="home"><a href="javascript:void(0)" name="/admin/system_log" title="系统日志" class="iframeurl"><i class="icon-double-angle-right"></i>系统日志</a></li> 
        </ul> </li> 
        
      </ul> 
     </div> 
     <script type="text/javascript">
           $("#menu_style").niceScroll({  
          cursorcolor:"#888888",  
          cursoropacitymax:1,  
          touchbehavior:false,  
          cursorwidth:"5px",  
          cursorborder:"0",  
          cursorborderradius:"5px"  
            }); 
          </script> 
     <div class="sidebar-collapse" id="sidebar-collapse"> 
      <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i> 
     </div> 
     <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
          </script> 
    </div> 
    <div class="main-content"> 
     <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script> 
     <div class="breadcrumbs" id="breadcrumbs"> 
      <ul class="breadcrumb"> 
       <li> <i class="icon-home home-icon"></i> <a href="index.html">首页</a> </li> 
       <li class="active"><span class="Current_page iframeurl"></span></li> 
       <li class="active" id="parentIframe"><span class="parentIframe iframeurl"></span></li> 
       <li class="active" id="parentIfour"><span class="parentIfour iframeurl"></span></li> 
      </ul> 
     </div> 
     <iframe id="iframe" style="border:0; width:100%; background-color:#FFF;" name="iframe" frameborder="0" src="/admin/admin/index"> </iframe> 
     <!-- /.page-content --> 
    </div>
    <!-- /.main-content --> 
    <div class="ace-settings-container" id="ace-settings-container"> 
     <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn"> 
      <i class="icon-cog bigger-150"></i> 
     </div> 
     <div class="ace-settings-box" id="ace-settings-box"> 
      <div> 
       <div class="pull-left"> 
        <select id="skin-colorpicker" class="hide"> <option data-skin="default" value="#438EB9">#438EB9</option> <option data-skin="skin-1" value="#222A2D">#222A2D</option> <option data-skin="skin-2" value="#C6487E">#C6487E</option> <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option> </select> 
       </div> 
       <span>&nbsp; 选择皮肤</span> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" /> 
       <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" /> 
       <label class="lbl" for="ace-settings-rtl">切换到左边</label> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" /> 
       <label class="lbl" for="ace-settings-add-container"> 切换窄屏 <b></b> </label> 
      </div> 
     </div> 
    </div>
    <!-- /#ace-settings-container --> 
   </div>
   <!-- /.main-container-inner --> 
  </div> 
  <!--底部样式--> 
  <div class="footer_style" id="footerstyle"> 
   <script type="text/javascript">try{ace.settings.check('footerstyle' , 'fixed')}catch(e){}</script> 
   <p class="l_f">版权所有：<?php echo e($info->copyright); ?></p> 
   <p class="r_f">地址：<?php echo e($info->record); ?> 更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p> 
  </div> 
  <!--修改密码样式--> 
  <div class="change_Pass_style" id="change_Pass"> 
   <ul class="xg_style"> 
    <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class="" id="password" /></li> 
    <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="" id="Nes_pas" /></li> 
    <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas" /></li> 
   </ul> 
  </div> 
  <!-- /.main-container --> 
  <!-- basic scripts -->   
 </body>
</html>

<script>

  // 定时器,进行刷新
    setInterval(function(){
        $.get('/admin/admin/index/servicelist',{},function(data){
            $('.servicenum').html(data);
        });
        $.get('/admin/admin/index/linkslist',{},function(data){
            $('.linksnum').html(data);
          })
        $.get('/admin/admin/index/servicenews',{},function(data){
            $('.servicenews').html(data);
        });
        $.get('/admin/admin/index/message',{},function(data){
            $('.message').html(data);
        });
        $.get('/admin/admin/index/adviceslist',{},function(data){
            $('.advicesnum').html(data);
        }); 
        $.get('/admin/admin/index/order',{},function(data){
            $('.dingdanall').html(data.sum);
            $('.dingdanreal').html(data.real_num);
            $('.dingdanreturn').html(data.return_num);
        }); 
        
    },10000);
     
</script>