<!DOCTYPE html>
<!-- saved from url=(0043)https://i.tuniu.com/ordercomment/1185874927 -->
<html>
 <head lang="en">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/head_divbycat_v6.css" /> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/user_asset.css" /> 
    <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/userordercomment.css" /> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/jquery.fileupload.css" /> 
  <title><?php echo $__env->yieldContent('title'); ?></title> 
  <meta name="keywords" content="会员中心" /> 
  <meta name="description" content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网" /> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/layer.css" /> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/layer/theme/default/layer.css" /> 
  <script type="text/javascript" src="/style/home/member_public/ga.js" async="" charset="utf-8"></script>
  <script type="text/javascript" src="/style/home/member_public/lazyloadnew.min.js" async="" charset="utf-8"></script>
  <script src="/style/home/js/jquery-1.8.3.min.js"></script>
  <link type="text/css" rel="stylesheet" href="/style/home/member_public/layer(1).css" id="skinlayercss" />
 </head> 
 <body id="index1200" class="index1200"> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/reset.css" />
  <!--本页面css-->
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/header.css" />
  <script type="text/javascript" src="/style/home/member_public/in-min.js"></script>
   <script type="text/javascript" src="/style/home/member_public/header_v2.js"></script>
  <link type="text/css" rel="stylesheet" href="/style/home/member_public/header_v2.css" />
  <link href="/style/home/member_public/head_nav_new.css" rel="stylesheet" type="text/css" />
  <!-- 头部start -->
  <div class="header index_1200 header_1200"> 
   <!-- 登陆条start --> 
   <div class="header_top"> 
    <link type="text/css" rel="stylesheet" href="/style/home/member_public/top_map.css" />
    <style type="text/css">.index_top_nav .item_duobao .dropdown_panel {width: 100%; left: -1px; text-align: center;}</style>
    <div class="header_top">
     <div class="header_inner clearfix">
      <ul class="index_top_nav" id="user_login_info">
       <div class="login_menu clearfix" id="login_menu">
       <?php if(session('username')): ?>
        <li><span>您好，</span></li>
        <li id="vipnameBox" class="vipname_box"><a href="/home/personal/index" id="vipname" class="vipname" rel="nofollow"><span class="fl" style="float:left;"><?php echo e(session('username')); ?></span><span class="vip vip0"></span> <span class="poparrow"></span></a>
         <div class="colle_box">
          <div class="colle_top clearfix">
           <div class="right">
            <a href="/home/personal/index">账户管理</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/outlogin">退出</a>
           </div>
          </div>
          <div class="colle_bottom">
           <div class="touxiang">
            <a href="/home/personal/index"><img src="/style/home/member_public/g_touxiang.png" style="" /></a>
           </div>
           <div class="fl">
            <div class="vip_stage mt_10">
             <a style="color:#f60; font-weight:bold; font-size:16px;" class="vip_lel vip_lel0" href="/home/personal/index"></a>
            </div>
            <div>
             <a style="color:#404040; font-weight:bold; font-size:14px;" href="/home/personal/index">查看我的会员特权</a>
            </div>
           </div>
          </div>
         </div></li>
        <?php endif; ?>
        <input type="hidden" value="http://img3.tuniucdn.com/img/2014040901/user_center/g_touxiang.png" id="user_top_img" />
        <input type="hidden" value="0" id="is_user_vip" />
       </div>
      </ul>
      <ul class="index_top_nav nav_right"> 
       <li class="nav_item item_order"><a href="/" style="color: #ff8800;">途牛首页</a></li>
       <li class="nav_item item_order"><a target="_blank" href="http://tmc.tuniu.com/">途牛商旅</a></li>
       <li class="nav_item item_order"><a target="_blank" href="http://www.tuniu.com/web-mall/">旅游百货</a></li>
       <li class="nav_item item_order"><a target="_blank" rel="nofollow" href="http://b.tuniu.com/" style="color: #ff8800;">企业旅游</a></li> 
       <li class="nav_item item_order" id="club"><a target="_blank" rel="nofollow" href="https://i.tuniu.com/club" onclick="tuniuRecorder.push('1_1_1_1_1_2');">会员俱乐部</a></li> 
       <!--<li class="nav_item item_order"><a target="_blank" href="http://www.tuniu.com/u/order" rel="nofollow" class="" onclick="tuniuRecorder.push('1_1_1_2_1_1');">我的订单</a></li>--> 
       <li class="nav_item item_order has_arrow has_dropdown is_order"> 我的订单 <i class="header_icon icon_arrow"></i> 
        <div class="dropdown_panel"> 
         <a target="_blank" href="/home/personal/index" rel="nofollow" class="" onclick="tuniuRecorder.push('1_1_1_2_1_1');">全部订单</a> 
         <a target="_blank" href="https://i.tuniu.com/list/?t=1002" rel="nofollow" class="">我的机票</a> 
         <a target="_blank" href="https://i.tuniu.com/list/?t=1003" rel="nofollow" class="">我的火车票</a> 
         <a target="_blank" href="http://points.tuniu.com/" rel="nofollow" class="">积分商城</a> 
        </div> </li>
       <li class="nav_item item_siteMap has_arrow has_dropdown"><a>网站地图</a><i class="header_icon icon_arrow"></i> 
        <link rel="stylesheet" type="text/css" href="/style/home/member_public/top_map(1).css" />
        <dl class="dropdown_panel siteMap_panel clearfix"> 
         <dt class="tour">
          去旅游
         </dt> 
         <dd> 
          <ul> 
           <li><a href="http://www.tuniu.com/tours/">跟团游</a></li> 
           <li><a href="http://www.tuniu.com/pkg/">自由行</a></li> 
           <li><a href="http://www.tuniu.com/drive/">酒+景</a></li> 
           <li><a href="http://www.tuniu.com/gongsi/">公司旅游</a></li> 
           <li><a href="http://www.tuniu.com/local/">当地玩乐</a></li> 
           <li><a href="http://www.tuniu.com/zt/sfcf/">首付出发<i class="header_icon icon_new"></i></a></li> 
          </ul> 
          <ul> 
           <li><a href="http://www.tuniu.com/niuren/">牛人专线</a></li> 
           <li><a href="http://www.tuniu.com/theme/qinzi/">亲子游</a></li> 
           <li><a href="http://www.tuniu.com/theme/weiaimy/">蜜月游</a></li> 
           <li><a href="http://www.tuniu.com/theme/haidao/">海岛游</a></li> 
           <li><a href="http://temai.tuniu.com/laoyutuijian">老于推荐</a></li> 
           <li><a href="http://super.tuniu.com/">机票+酒店<i class="header_icon icon_hot"></i></a></li> 
          </ul> 
          <ul> 
           <li><a href="http://hotel.tuniu.com/">酒店</a></li> 
           <li><a href="http://menpiao.tuniu.com/">门票</a></li> 
           <li><a href="http://youlun.tuniu.com/">邮轮</a></li> 
           <li><a href="http://www.tuniu.com/visa/">签证</a></li> 
           <li><a href="http://flight.tuniu.com/">机票</a></li> 
           <li><a href="http://lvpai.tuniu.com/">旅拍</a></li> 
          </ul> 
         </dd> 
         <dt class="discount">
          寻优惠
         </dt> 
         <dd> 
          <ul> 
           <li><a href="http://temai.tuniu.com/">特卖</a></li> 
           <li><a href="http://hotel.tuniu.com/">订酒店 返现金</a></li> 
           <li><a href="http://points.tuniu.com/">积分商城</a></li> 
           <li><a href="http://www.tuniu.com/zt/bankactivities/">银行特惠游</a></li> 
          </ul> 
         </dd> 
         <dt class="guide">
          看攻略
         </dt> 
         <dd> 
          <ul> 
           <li><a href="http://go.tuniu.com/">攻略</a></li> 
           <li><a href="http://top.tuniu.com/">途牛风向标</a></li> 
           <li><a href="http://trips.tuniu.com/">游记</a></li> 
           <li><a href="http://www.tuniu.com/way/">达人玩法</a></li> 
          </ul> 
         </dd> 
         <dt class="service">
          查服务
         </dt> 
         <dd> 
          <ul> 
           <li><a href="http://www.tuniu.com/help/">帮助中心</a></li> 
           <li><a href="http://www.tuniu.com/u/club">会员俱乐部</a></li> 
           <li><a href="http://www.tuniu.com/static/sunshine_ensure/">阳光保障</a></li> 
           <li><a href="http://huoche.tuniu.com/">火车时刻表</a></li> 
           <li><a href="http://flight.tuniu.com/">航班查询</a></li> 
          </ul> 
         </dd> 
        </dl> </li>
       <li class="nav_item item_weibo"><a class="header_icon icon_weibo vm" rel="nofollow" target="_blank" href="http://www.weibo.com/tuniulvyou" onclick="tuniuRecorder.push('1_1_1_2_1_4');"></a></li>
       <li class="nav_item item_qrCode has_dropdown"> <i class="header_icon icon_phone" id="isPcOrMobile"><a onclick="tuniuRecorder.push('1_1_1_2_1_3');" class="sitenav_mobile" href="http://www.tuniu.com/static/mobile/" target="_blank" rel="nofollow"></a></i>
        <div class="dropdown_panel qrCode_panel">
         <img src="/style/home/member_public/Cii_J1nIdsOIf-NaAACdnbjvt44AABkXgDIc_sAAJ21864.png" style="" />
        </div></li>
       <li class="nav_item item_weixin has_dropdown"><a class="header_icon icon_weixin vm" rel="nofollow" href="https://i.tuniu.com/ordercomment/1185874927#"></a>
        <div class="dropdown_panel weixin_panel">
         <img src="/style/home/member_public/erweima_v2.gif" style="" />
         <div style="display:none"> 
          <a href="http://www.tuniu.com/?_tuniutnstat=xx"></a> 
          <img src="/style/home/member_public/stat.gif" style="" />
         </div>
        </div></li>
      </ul>
     </div>
    </div>
  <script>
    $('#login_menu').hover(function(){
      $('#vipnameBox').addClass('on');
      $('#vipname').addClass('float_tt');
    },function(){
       $('#vipnameBox').removeClass('on');
      $('#vipname').removeClass('float_tt');
    });
  </script>
   </div> 
   <!-- 登陆条end --> 
   <!-- 会员导航开始 --> 
   <div class="header_panel"> 
    <div class="header_panel_inner clearfix"> 
     <div class="header_nav_logo"> 
      <a href="/"> <img src="/style/home/member_public/Cii-s1qPg1eISn7MAAAFfDTr0owAADlogP_-fEAAAYP080.png" /> </a> 
     </div> 
     <div class="header_nav_menu"> 
      <ul class="nav_menu_list clearfix"> 
       <li class="cur"><a title="会员首页" href="/home/member">会员首页</a></li> 
       <li class="hasMoreMenu"><a title="账户设置">账户设置</a><i class="page_icon icon_arrows"></i>
        <div class="dropdown_menu"> 
         <div class="dropdown_menu_item">
          <a href="/home/personaldata/index" target="_blank">个人资料</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="/home/message/index" target="_blank">站内信息</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="/home/personalpass/index" target="_blank">密码设置</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="/home/personalsecurity/index" target="_blank">账户安全</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="http://jr.tuniu.com/account/mms/wallet/manage/3" target="_blank">我的银行卡</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="https://i.tuniu.com/travelcontact" target="_blank">常用旅客信息</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="https://i.tuniu.com/deliver" target="_blank">常用配送地址</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="https://i.tuniu.com/myinvoice" target="_blank">常用发票信息</a>
         </div> 
         <span class="poptip_arrow_top"><em>◆</em><i>◆</i></span>
        </div></li> 
       <li class="hasMoreMenu"><a title="社区互动">社区互动</a><i class="page_icon icon_arrows"></i>
        <div class="dropdown_menu"> 
         <div class="dropdown_menu_item">
          <a href="/home/member" target="_blank">我的主页</a>
         </div> 
         <div class="dropdown_menu_item">
          <a href="javascript:;" target="_blank">我的游记(0)</a>
         </div> 
         <span class="poptip_arrow_top"><em>◆</em><i>◆</i></span>
        </div></li> 
       <li><a title="会员俱乐部" href="https://i.tuniu.com/club">会员俱乐部</a></li> 
       <li><a title="积分商城" href="http://points.tuniu.com/">积分商城</a></li> 
      </ul> 
     </div> 
     <div class="header_nav_tohome">
      <a href="http://www.tuniu.com/"></a>
     </div> 
    </div> 
   </div> 
   <!-- 会员导航结束 -->
  </div>
  <!-- 头部end --> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/nav_left_2017.css" /> 
  <div class="container"> 
   <div class="left-sidebar"> 
    <div id="left-side-nav"> 
     <ul id="first-nav"> 
      <li id="order"> <span>我的订单</span> <span class="nav-arrow arrow-down"></span> 
       <ul> 
        <li><a target="" href="/home/personal/index">旅游订单</a></li> 
        <li><a target="" href="http://www.tuniu.com/u/ordercoupon">旅游券订单</a></li> 
       </ul> </li> 
      <li id="cash"> <span>我的资产</span> <span class="nav-arrow arrow-down"></span> 
       <ul> 
        <li><a target="" href="/home/coupon">优惠券</a></li> 
        <li><a target="" href="javascript:;">旅游券</a></li> 
        <li><a target="_blank" href="http://jr.tuniu.com/account/ca/myCashAccount">现金账户</a></li> 
        <li><a target="_blank" href="http://jr.tuniu.com/account/mms/wallet/manage/3">我的银行卡</a></li> 
       </ul> </li> 
      <li id="usercenter"> <span>个人中心</span> <span class="nav-arrow arrow-down"></span> 
       <ul> 
        <li><a target="" href="/home/personaldata/index">个人资料</a></li> 
        <li><a target="" href="/home/personalsecurity/index">安全设置</a></li> 
        <li><a target="" href="/home/personalpass/index">密码设置</a></li> 
        <li><a target="" href="/home/message/index">我的信息</a></li> 
       </ul> </li> 
      <li id="message"> <span>常用信息</span> <span class="nav-arrow arrow-down"></span> 
       <ul> 
        <li><a target="" href="https://i.tuniu.com/travelcontact">游客信息</a></li> 
        <li><a target="" href="javascript:;">常用配送地址</a></li> 
        <li><a target="" href="javascript:;">常用发票信息</a></li> 
       </ul> </li> 
      <li id="tools"> <span>常用工具</span> <span class="nav-arrow arrow-down"></span> 
       <ul> 
        <li><a target="" href="/home/collect">我的收藏</a></li> 
        <li><a target="" href="/home/commenton">我的点评</a></li> 
       </ul> </li> 
      <li id="shequ"> <a target="_blank" href="http://www.tuniu.com/person">社区互动</a> </li> 
     </ul> 
    </div> 
    <div id="left-side-service"> 
     <h2 class="service-title">快捷服务</h2> 
     <ul> 
      <li> <a target="_blank" href="http://www.tuniu.com/main.php?do=user_finance_deposit"><img src="/style/home/member_public/prove.png" alt="" /></a> <a target="_blank" href="/home/message/index"><img src="/style/home/member_public/letter.png" alt="" /></a> </li> 
      <li> <a target="_blank" href="http://www.tuniu.com/main.php?do=remittance&amp;fun=orderList"><img src="/style/home/member_public/exchange.png" alt="" /></a> <a target="_blank" href="http://www.tuniu.com/main.php?do=user_consumption_credit"><img src="/style/home/member_public/credit.png" alt="" /></a> </li> 
      <li> <a target="_blank" href="https://i.tuniu.com/membership"><img src="/style/home/member_public/bind.png" alt="" /></a> <a target="_blank" href="https://jr.tuniu.com/exweb/main/"><img src="/style/home/member_public/Cii-s1txFCiINsfWAAATCjsX_-8AAL5lQP-0aAAABMi217.png" alt="" /></a> </li> 
     </ul> 
    </div> 
   </div> 
      <?php $__env->startSection('main'); ?>
      <?php echo $__env->yieldSection(); ?> 
  </div> 
  <script type="text/javascript" src="/style/home/member_public/art-template.js"></script> 
  <script type="text/javascript" src="/style/home/member_public/nav_left_2017.js"></script> 
  <!--start foot--> 
  <!-- siteMap S --> 
  <link rel="stylesheet" type="text/css" href="/style/home/member_public/common_foot_v3.css" /> 
  <div class="trav_sev"> 
   <ul class="ts_box clearfix"> 
    <li class="trav_l_first"> <i class="ts_1"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>去旅游</a>
      </dt> 
      <dd class="tl_w"> 
       <p> <a href="http://www.tuniu.com/tours/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-1']);">跟团游</a> <a href="http://www.tuniu.com/niuren/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-2']);">牛人专线</a> <a href="http://hotel.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-3']);">酒店</a> </p> 
       <p> <a href="http://www.tuniu.com/pkg/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-4']);">自由行</a> <a href="http://www.tuniu.com/theme/qinzi/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-5']);">亲子游</a> <a href="http://menpiao.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-6']);">门票</a> </p> 
       <p> <a href="http://www.tuniu.com/drive/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-7']);">酒+景</a> <a href="http://www.tuniu.com/theme/weiaimy/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-8']);">蜜月游</a> <a href="http://youlun.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-9']);">邮轮</a> </p> 
       <p> <a href="http://www.tuniu.com/gongsi/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-10']);">公司旅游</a> <a href="http://www.tuniu.com/theme/haidao/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-11']);">海岛游</a> <a href="http://www.tuniu.com/visa/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-12']);">签证</a> </p> 
       <p> <a href="http://www.tuniu.com/local/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-13']);">当地玩乐</a> <a href="http://www.tuniu.com/zt/laoyutuijian_pdy/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-14']);">老于推荐</a> <a href="http://flight.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-15']);">机票</a> </p> 
       <p> <a href="http://www.tuniu.com/zt/sfcf/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-16']);">首付出发</a> <a href="http://super.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-17']);">机票+酒店</a> <a href="http://lvpai.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-17']);">旅拍</a> </p> 
      </dd> 
     </dl> </li> 
    <li> <i class="ts_2"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>寻优惠</a>
      </dt> 
      <dd class="tl_w"> 
       <p><a href="http://temai.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_2','2-1']);">特卖</a></p> 
       <p><a href="http://hotel.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_2','2-2']);">订酒店 返现金</a></p> 
       <p><a href="http://points.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_2','2-4']);">积分商城</a></p> 
       <p><a href="http://www.tuniu.com/zt/bankactivities/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_2','2-5']);">银行特惠游</a></p> 
      </dd> 
     </dl> </li> 
    <li> <i class="ts_3"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>看攻略</a>
      </dt> 
      <dd class="tl_w"> 
       <p><a href="http://go.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_3','3-1']);">攻略</a></p> 
       <p><a href="http://top.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_3','3-2']);">途牛风向标</a></p> 
       <p><a href="http://trips.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_3','3-3']);">游记</a></p> 
       <p><a href="http://www.tuniu.com/way/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_3','3-4']);">达人玩法</a></p> 
      </dd> 
     </dl> </li> 
    <li> <i class="ts_4"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>查服务</a>
      </dt> 
      <dd class="tl_w tl_cont"> 
       <p> <a href="http://www.tuniu.com/help/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-1']);">帮助中心</a> </p> 
       <p> <a href="http://www.tuniu.com/u/club" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-2']);">会员俱乐部</a> </p> 
       <p> <a href="http://www.tuniu.com/static/sunshine_ensure/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-3']);">阳光保障</a> </p> 
       <p><a href="http://huoche.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-4']);">火车时刻表</a></p> 
       <p><a href="http://flight.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-6']);">航班查询</a></p> 
      </dd> 
     </dl> </li> 
    <li class="trav_l_last"> <i class="ts_5"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>途牛APP</a>
      </dt> 
      <dd class="tl_w tl_cont"> 
       <p> <a>扫描下载途牛APP</a> </p> 
       <p> <img src="/style/home/member_public/Cii-T1i5FDyICo_LAAAiRTIzF6gAAH84QOOvGEAACJd508.png" /> </p> 
      </dd> 
     </dl> </li>
   </ul> 
  </div>
  <!-- siteMap E --> 
  <!-- three sun S --> 
  <div class="three_trav"> 
   <div class="thr_trav"> 
    <a href="http://www.tuniu.com/static/sunshine_ensure/" target="_blank" style="display:block;width:100%;height:100%;"> <em class="tn_text" id="service_phone_head_text">客户服务电话（免长途费）</em> <em class="tn_phone" id="service_phone_head_phone">4007-999-999</em> </a> 
   </div> 
  </div> 
  <!-- three sun E --> 
  <!-- four_ad S --> 
  <!-- four_ad S --> 
  <div class="fourImgs"> 
   <ul class="clearfix"> 
    <li> <a href="http://www.tuniu.com/zt/brand/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','点击','底部广告图_1_品牌合作']);"> <img src="/style/home/member_public/tn_footer_042.jpg" alt="品牌合作" width="238" height="58" /> </a> </li> 
    <li> <a href="http://temai.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','点击','底部广告图_2_超值特卖-底部']);"> <img src="/style/home/member_public/tn_footer_06.jpg" alt="超值特卖-底部" width="238" height="58" /> </a> </li> 
    <li> <a href="http://super.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','点击','底部广告图_3_超级自由行']);"> <img src="/style/home/member_public/Cii9EFaWDQ2IFdVUAAAaUoTPAnAAABcxwP_x9YAABpq60.jpeg" alt="超级自由行" width="238" height="58" /> </a> </li> 
    <li> <a href="http://points.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','点击','底部广告图_4_积分商城']);"> <img src="/style/home/member_public/Cii_LlmSlsaICijDAABiOObnKkEAAHXXABQ4z0AAGJQ76.jpeg" alt="积分商城" width="238" height="58" /> </a> </li> 
   </ul> 
  </div> 
  <!-- four_ad E --> 
  <!-- img_place S --> 
  <div class="img_place"> 
   <a href="http://www.tuniu.com/niuren/" rel="nofollow" target="_blank" style="display: block;" onclick="_gaq.push(['_trackEvent','common_nj','点击','底部广告图_5_牛人专线']);"> <img src="/style/home/member_public/Cii_J1nIphSIet_kAABV-FnEriEAABk8AAbUSQAAFYQ30.jpeg" alt="牛人专线" width="988" height="58" /> </a> 
  </div> 
  <!-- img_place E --> 
  <!-- four_ad E --> 
  <!--start foot--> 
  <div id="TN-footer" class="tn_footer datalazyload" data-lazyload-type="data" data-lazyload-from="textarea"> 
   <p id="TN-24">途牛客服中心设立在江苏南京及江苏宿迁，来电显示号码请查看：<a rel="nofollow" href="http://www.tuniu.com/help/detail/331" target="_blank">途牛会员中心外呼电话号码汇总</a></p> 
   <p>北京途牛国际旅行社有限公司，旅行社业务经营许可证编号：L-BJ-CJ00144　　上海途牛国际旅行社有限公司，旅行社业务经营许可证编号：L-SH-CJ00107 </p> 
   <p id="TN-links"> <a href="http://www.tuniu.com/corp/aboutus.shtml" target="_blank" rel="nofollow">关于我们</a> <a $nofollow="" href="http://ir.tuniu.com/" target="_blank">Investor Relations</a> <a href="http://www.tuniu.com/corp/contactus.shtml" target="_blank" rel="nofollow">联系我们</a> <a href="http://www.tuniu.com/corp/advise.shtml" target="_blank" rel="nofollow">投诉建议</a> <a rel="nofollow" href="http://www.tuniu.com/corp/advertising.shtml" target="_blank">广告服务</a> <a rel="nofollow" href="http://www.tuniu.com/giftcard/" target="_blank">旅游券</a> <a rel="nofollow" href="http://tuniu.zhiye.com/" target="_blank" style="color: red;">途牛招聘</a> <a href="http://www.tuniu.com/corp/privacy.shtml" target="_blank" rel="nofollow">隐私保护</a> <a href="http://www.tuniu.com/corp/duty.shtml" target="_blank" rel="nofollow">免责声明</a> <a rel="nofollow" href="http://www.tuniu.com/corp/zizhi.shtml" target="_blank">旅游度假资质</a> <a rel="nofollow" href="http://www.tuniu.com/theme/index/" target="_blank">主题旅游</a> <a href="http://www.tuniu.com/corp/agreement.shtml" target="_blank" rel="nofollow">用户协议</a> <a href="http://www.tuniu.com/corp/sitemap.shtml" target="_blank">网站地图</a> <a rel="nofollow" target="_blank" href="http://www.tuniu.com/ueip/">UEIP</a> <a rel="nofollow" href="http://www.tuniu.com/help/" target="_blank">帮助中心</a> </p> 
   <!-- #TN-links --> 
   <p id="copyright">Copyright &copy; 2006-2018 <a rel="nofollow" href="http://www.tuniu.com/">南京途牛科技有限公司</a> <a rel="nofollow" href="http://www.tuniu.com/">Tuniu.com</a> | <a target="_blank" href="http://www.tuniu.com/corp/company.shtml" rel="nofollow">营业执照</a> | <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow">ICP证：苏B2-20130006</a> | <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow">苏ICP备12009060号</a> | <a target="_blank" href="http://nj.tuniu.com/">上海旅游网</a> </p> 
   <!-- thr_ads S --> 
   <div class="thr_img"> 
    <ul class="clearfix"> 
     <li> <a href="http://www.tuniu.com/tours/" target="_blank" onclick="_gaq.push(['_trackEvent','首页_nj','点击','底部广告图_6_跟团']);"> <img src="/style/home/member_public/footer_1.jpg" alt="跟团" width="175" height="38" /> </a> </li> 
     <li> <a href="http://www.tuniu.com/pkg/" target="_blank" onclick="_gaq.push(['_trackEvent','首页_nj','点击','底部广告图_7_自助']);"> <img src="/style/home/member_public/Cii-VVoWgdSIb711AAAQl3qGbAgAADlgQMoMUoAABCv188.png" alt="自助" width="175" height="38" /> </a> </li> 
     <li> <a href="http://www.tuniu.com/merchants/" target="_blank" onclick="_gaq.push(['_trackEvent','首页_nj','点击','底部广告图_8_供应商合作']);"> <img src="/style/home/member_public/bottom.jpg" alt="供应商合作" width="175" height="38" /> </a> </li> 
    </ul> 
   </div> 
   <!-- thr_ads E --> 
   <div class="slide_order clearfix" id="slideOrder"> 
    <span class="fl">最新预订：</span> 
    <div class="fl w_940"> 
     <ul style="width: 17428px; left: -940.439px;"> 
      <li>1分钟前用户***629506预订&lt;海南三亚海棠湾仁恒皇冠假日度假酒店双飞3-8日自由行&gt;一线海景，儿童主题餐厅，空中无边际恒温海景泳池，Minibar免费畅饮，屋顶烧烤自助晚餐&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>2分钟前用户***100310预订&lt;厦门+鼓浪屿双飞4日自由行&gt;1晚鼓浪屿+2晚曾厝垵/环岛路特色客栈，29元换购网红景点门票，万石植物园打卡，高性价比，开启厦门文艺清新之旅&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>2分钟前用户***115909预订[圣诞]&lt;菲律宾长滩岛4晚6日游&gt;机酒接送机，七千人出游，入住天堂花园或避风港酒店或同级酒店，派领队，含接送巡礼，送保险含延误险&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>2分钟前用户***781569预订&lt;福建霞浦-太姥山-牛郎岗-九鲤溪双动3日游&gt;霞浦摄影线，登海上仙都太姥山，九鲤溪漂流，优先宿帝景或金九龙酒店，上海往返&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>5分钟前用户***187512预订&lt;上海东方明珠-透明观光廊-城隍庙-黄浦江-南京路步行街1日游&gt;上万出游 千条好评 , 乘坐浦江游船， 悬空玻璃栈道&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>6分钟前用户***763387预订&lt;克罗地亚-黑山-波黑-塞尔维亚-罗马尼亚-保加利亚15日游&gt;4星或一晚湖区特色酒店十六湖、海边双古城佩雷什夏宫、杜布罗夫尼克免指纹&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>6分钟前用户***预订&lt;安徽九华山2日半自助游&gt;宿山上新东崖宾馆 徽韵禅意房 巴士往返 直达景区 另含50元小交通 畅游山上的明清古镇&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>6分钟前用户***933523预订&lt;日本北海道5晚6日自由行&gt;5晚札幌市区连住，北国春夏赏花，冬季滑雪，Rera奥莱嗨购&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>7分钟前用户***315079预订&lt;常州溧阳天目湖2天1晚酒店+景点套餐&gt;住1晚天目湖豪生/天目湖维景/天目湖御湖半岛温泉酒店（3选1）+自选天目湖山水园/南山竹海/御水温泉门票 亲子度假&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>8分钟前用户***171063预订[春节]&lt;泰国普吉岛-PP岛6或7日游&gt;途牛自营/瑞享五星/1天旅拍0购物0自费,指定海边国际五星,招牌月亮餐厅,芭东夜市,海景骑象,ATV越野,2天free20人团&nbsp;&nbsp;&nbsp;&nbsp;</li> 
      <li>1分钟前用户***629506预订&lt;海南三亚海棠湾仁恒皇冠假日度假酒店双飞3-8日自由行&gt;一线海景，儿童主题餐厅，空中无边际恒温海景泳池，Minibar免费畅饮，屋顶烧烤自助晚餐&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>2分钟前用户***100310预订&lt;厦门+鼓浪屿双飞4日自由行&gt;1晚鼓浪屿+2晚曾厝垵/环岛路特色客栈，29元换购网红景点门票，万石植物园打卡，高性价比，开启厦门文艺清新之旅&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>2分钟前用户***115909预订[圣诞]&lt;菲律宾长滩岛4晚6日游&gt;机酒接送机，七千人出游，入住天堂花园或避风港酒店或同级酒店，派领队，含接送巡礼，送保险含延误险&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>2分钟前用户***781569预订&lt;福建霞浦-太姥山-牛郎岗-九鲤溪双动3日游&gt;霞浦摄影线，登海上仙都太姥山，九鲤溪漂流，优先宿帝景或金九龙酒店，上海往返&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>5分钟前用户***187512预订&lt;上海东方明珠-透明观光廊-城隍庙-黄浦江-南京路步行街1日游&gt;上万出游 千条好评 , 乘坐浦江游船， 悬空玻璃栈道&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>6分钟前用户***763387预订&lt;克罗地亚-黑山-波黑-塞尔维亚-罗马尼亚-保加利亚15日游&gt;4星或一晚湖区特色酒店十六湖、海边双古城佩雷什夏宫、杜布罗夫尼克免指纹&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>6分钟前用户***预订&lt;安徽九华山2日半自助游&gt;宿山上新东崖宾馆 徽韵禅意房 巴士往返 直达景区 另含50元小交通 畅游山上的明清古镇&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>6分钟前用户***933523预订&lt;日本北海道5晚6日自由行&gt;5晚札幌市区连住，北国春夏赏花，冬季滑雪，Rera奥莱嗨购&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>7分钟前用户***315079预订&lt;常州溧阳天目湖2天1晚酒店+景点套餐&gt;住1晚天目湖豪生/天目湖维景/天目湖御湖半岛温泉酒店（3选1）+自选天目湖山水园/南山竹海/御水温泉门票 亲子度假&nbsp;&nbsp;&nbsp;&nbsp;</li>
      <li>8分钟前用户***171063预订[春节]&lt;泰国普吉岛-PP岛6或7日游&gt;途牛自营/瑞享五星/1天旅拍0购物0自费,指定海边国际五星,招牌月亮餐厅,芭东夜市,海景骑象,ATV越野,2天free20人团&nbsp;&nbsp;&nbsp;&nbsp;</li>
     </ul> 
    </div> 
   </div> 
   <div class="trav_corp"> 
    <a id="___szfw_logo___" href="https://credit.szfw.org/CX20160128013521800380.html" rel="nofollow" target="_blank"> <img src="/style/home/member_public/chengxinOne.png" border="0" style="height:41px;" alt="中国互联网诚信示范企业" /> </a> 
    <a href="http://net.china.cn/" rel="nofollow" target="_blank" onclick="tuniuRecorder.push('32_1_1_1_1_1')"> <img src="/style/home/member_public/buliang.png" alt="违法和不良信息举报中心" width="109" height="47" /> </a> 
    <a href="http://js.cyberpolice.cn/webpage/index.jsp" rel="nofollow" target="_blank" onclick="tuniuRecorder.push('32_1_1_1_1_2')"> <img src="/style/home/member_public/wangluo.png" alt="网络110报警服务" width="110" height="47" /> </a> 
    <img src="/style/home/member_public/cata.png" alt="cata航空资质认证" width="110" height="47" /> 
    <a target="_blank" rel="nofollow" href="http://www.isc.org.cn/" onclick="tuniuRecorder.push('32_1_1_1_1_3')"> <img src="/style/home/member_public/Cii-tFpAbkWITEAmAAAF3Gwa3cUAABOHgP_-ZQAAAZs898.png" alt="中国互联网协会" width="110" height="47" /> </a> 
    <a href="http://www.itrust.org.cn/yz/pjwx.asp?wm=1797102919" rel="nofollow" target="_blank" onclick="tuniuRecorder.push('32_1_1_1_1_4')"> <img src="/style/home/member_public/3acomp.png" alt="中国互联网协会信用评价中心" width="110" height="47" /> </a> 
    <a title="可信网站" target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=e14120832010056662smwq000000&amp;ct=df&amp;a=1&amp;pa=0.06350954016670585" rel="nofollow" onclick="tuniuRecorder.push('32_1_1_1_1_5')"> <img src="/style/home/member_public/chengxin.png" alt="诚信网站" width="110" height="47" /> </a> 
    <script id="jsgovicon" src="/style/home/member_public/govicon.js" type="text/javascript" charset="utf-8"></script> 
    <a target="_blank" rel="nofollow" href="http://www.patachina.org/" onclick="tuniuRecorder.push('32_1_1_1_1_7')"> <img src="/style/home/member_public/pata.png" alt="亚太旅游协会会员单位" width="140" height="47" /> </a> 
   </div> 
  </div> 
  <!--end foot--> 
  <script language="javascript" src="/style/home/member_public/zeus.js"></script> 
  <script type="text/javascript">
    var tuniuRecorder = _zeus.getRecorder();
</script> 
  <script src="/style/home/member_public/getdata_v4.js"></script> 
  <script type="text/javascript" src="/style/home/member_public/jquery_autoSlide.js"></script> 
  <script type="text/javascript">
    $(function(){
        $("#slideOrder").autoSlide();
    })
</script> 
  <!--end foot--> 
  <!--end foot--> 
  <script src="/style/home/member_public/usercenter_head.js"></script> 
  <script type="text/javascript">
            var content = "";
            //ga数据准备
            var _gaq = _gaq || [];
            _gaq.push(["_setAllowHash", false]);
            _gaq.push(["_setAllowAnchor", true]);
            _gaq.push(["_addOrganic", "baidu", "wd"]);
            _gaq.push(["_addOrganic", "baidu", "word"]);
            _gaq.push(["_addOrganic", "google", "q"]);
            _gaq.push(["_addOrganic", "118114", "kw"]);
            _gaq.push(["_addOrganic", "bing", "q"]);
            _gaq.push(["_addOrganic", "soso", "w"]);
            _gaq.push(["_addOrganic", "youdao", "q"]);
            _gaq.push(["_addOrganic", "sogou", "query"]);
            _gaq.push(["_addOrganic", "360", "q"]);
            _gaq.push(["_addOrganic", "baidu", "w"]);
            _gaq.push(["_addOrganic", "baidu", "q1"]);
            _gaq.push(["_addOrganic", "baidu", "q2"]);
            _gaq.push(["_addOrganic", "baidu", "q3"]);
            _gaq.push(["_addOrganic", "baidu", "q4"]);
            _gaq.push(["_addOrganic", "baidu", "q5"]);
            _gaq.push(["_addOrganic", "baidu", "q6"]);
            _gaq.push(["_addOrganic", "baidu", "q6"]);
            _gaq.push(["_setDomainName", "tuniu.com"]);
            _gaq.push(["_setAccount", "UA-4782081-5"]);
            _gaq.push(["_trackPageview", content]);
            var tuniuTracker = '';
            var init_page_set_time_out = 0;//页面自动加载标记
            In.add('gaAndTac', {path: '//ssl1.tuniucdn.com/j/20140612/common/tac.mini.js,common/ga.js', type: 'js', charset: 'utf-8'});
            In('gaAndTac', function() {
                tuniuTracker = _tat.getTracker();
                tuniuTracker.setPageName("");
                tuniuTracker.addOrganic("360", "q");
                tuniuTracker.addOrganic("baidu", "w");
                tuniuTracker.addOrganic("baidu", "q1");
                tuniuTracker.addOrganic("baidu", "q2");
                tuniuTracker.addOrganic("baidu", "q3");
                tuniuTracker.addOrganic("baidu", "q4");
                tuniuTracker.addOrganic("baidu", "q5");
                tuniuTracker.addOrganic("baidu", "q6");
                tuniuTracker.trackPageView();
                tuniuTracker.enableLinkTracking();
            });
            In.add('TN_common_init', {path: '//ssl.tuniucdn.com/j/2014071517/common/jquery-powerFloat.js,common/lazyloadnew.min.js', type: 'js', charset: 'utf-8'});
            In('TN_common_init', function() {
                //图片异步加载。
                $("img").lazyload({
                    effect: "fadeIn",
                    failurelimit: 50,
                    threshold: 300,
                    skip_invisible: false
                });
            });
            var PageName = "";
        </script> 
  <!--start baidu_share--> 
  <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=643059"></script> 
  <script type="text/javascript" id="bdshell_js"></script> 
  <script type="text/javascript">var bds_config = {"snsKey": {'tsina': 'a8311fe10852f090', 'tqq': '43956772b6ae82e5', 't163': '', 'tsohu': ''}}</script> 
  <!-- <script type="text/javascript" src="/style/home/member_public/layer.min.js"></script>  -->
  <script src="/style/home/member_public/layer/layer.js"></script>
  <script type="text/javascript" src="/style/home/member_public/user_center_lxl.js"></script> 
  <script type="text/javascript" src="/style/home/member_public/jquery.ui.widget.js"></script> 
  <script type="text/javascript" src="/style/home/member_public/jquery.iframe-transport.js"></script> 
  <script type="text/javascript" src="/style/home/member_public/jquery.fileupload.js"></script> 
 </body>
</html>