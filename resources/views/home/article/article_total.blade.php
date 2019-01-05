<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="/style/home/article_public/menu.css" rel="stylesheet" /> 
  <link href="/style/home/article_public/common_foot_v3.css" rel="stylesheet" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <title>旅游攻略</title>
  <style type="text/css">
    .search-result {
        font-size: 14px;
        color: #999;
        margin: 30px 0px;
    }
    .search-result span.result-poi {
        color: #f90;
        padding: 0px 5px;
    }
    .search-null {
        background-image: url(/style/home/article_total/search-null.png);
        height: 337px;
        width: 700px;
        margin-top: 40px;
    }
    #list{
        padding-left:415px;
    }
    .pagination {
        clear: both;
        color: #404040;
        font-size: 12px;
        font-weight: 400;
        height: 40px;
        margin: 0 auto 8px;
        padding-right: 0;
        padding-top: 15px;
    }
     .pagination li{
          display:inline-block;
          float:left;
          
     }  
     .pagination li span {
        width: 28px;
        height: 29px;
        display: block;
        line-height: 29px;
    }
  </style> 
</head> 
 <body class="index1200"> 
  <script>
    if (document.documentElement.clientWidth >= 1240) {
        document.body.className = 'index1200';
    } else {
        document.body.className = 'index1000';
    }
  </script> 
  <div class="basic-menu-wrap basic-menu-dark"> 
   <div class="basic-menu-con clearfix"> 
    <div class="tn-logo"> 
     <a href="/" target="_blank"> <img src="/style/home/article_public/basic-logo-dark.png"/> </a> 
    </div> 
    <div class="basic-menu"> 
     <ul class="basic-menu-main clearfix"> 
      <li class=""> <a href="/" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '首页']);">首页</a> </li> 
      <li class=""> <a href="javascript:;" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '跟团']);">跟团</a> </li> 
      <li class=""> <a href="javascript:;" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '自由行']);">自由行</a> </li> 
      <li class=""> <a href="javascript:;" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '邮轮']);">邮轮</a> </li> 
      <li class=""> <a href="javascript:;" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '机票']);">机票</a> </li> 
      <li class=""> <a href="javascript:;" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '酒店']);">酒店</a> </li> 
      <li class=""> <a href="/home/article/total" onclick="_gaq.push(['_trackEvent', 'common_sz','pd', '攻略']);">旅游攻略</a> </li> 
     </ul> 
    </div> 
    @if(session('userid') && count($userinfo))
    <div class="basic-login basic-logged">
        <a rel="nofollow" class="uesr-name clearfix" href="http://www.tuniu.com/u">
            <span class="s-face">
              @if($userinfo->pic)
              <img alt="用户头像" src="{{$userinfo->pic}}" width="35px" height="35px">
              @else
              <img alt="用户头像" src="/style/home/article_public/touxiang.png" width="35px" height="35px">
              @endif
            </span>
            <span class="s-id">您好,<i>@if($userinfo->realname) {{$userinfo->realname}} @elseif($userinfo->nickname) $userinfo->nickname @else{{$userinfo->username}}@endif</i></span>
            <span class="poparrow"></span>
        </a>
        <div class="basic-colle-box clearfix">
            <span class="arrow-top"></span>
            <div class="basic-touxiang">
                <a href="/home/comment">
                @if($userinfo->pic)
                    <img alt="用户头像" src="{{$userinfo->pic}}" id="user_head" width="90px" height="90px">
                @else
                    <img alt="用户头像" src="/style/home/article_public/touxiang.png" id="user_head" width="90px" height="90px">
                @endif
                </a>
            </div>
            <div class="basic-vip">
                <a href="/home/member" class="vip-lel vip-lel0"></a>
                <a href="/home/member" class="vip-tequan">查看我的会员中心</a>
            </div>
            <div class="basic-colle-right">
                <a href="/home/personaldata/index">账户管理</a>
                &nbsp;|&nbsp;
                <a href="/outlogin">退出</a>
            </div>
        </div>
    </div>
    @else
    <div class="basic-login"> 
     <a href="/login" target="_blank">登录</a> 
     <span class="tag"></span> 
     <a href="/register" target="_blank">注册</a> 
    </div> 
    @endif
    <div class="J_basicRight basic-right"> 
     <div class="basic-phone"> 
      <p class="J_PhoneText basic-phone-text">客户服务电话</p> 
      <p class="J_PhoneTel basic-phone-tel">1597-636-2499</p> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- 内容start -->

  <link rel="stylesheet" type="text/css" href="/style/home/article_total/slides.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/style/home/article_total/yj_2016.css" /> 
  <link rel="stylesheet" href="/style/home/article_total/pub_mod.css" /> 
  <!-- 游记新版轮播 start --> 
  <div id="full-screen-slider" class="head"> 
    <!-- 游记banner 大图 start --> 
    <ul id="slides"> 
        <li style="background: url(/style/home/article_total/1508216919797.jpg) center top no-repeat; z-index: 800; display: block;"><a href="javascript:;" target="_blank" rel="nofollow"></a></li> 
        <li style="background: url(/style/home/article_total/109951163512427136.jpg) center top no-repeat; z-index: 800; display: block;"><a href="javascript:;" target="_blank" rel="nofollow"></a></li> 
    </ul> 
    <!-- 游记banner 大图 end --> 
    <div class="slide-center"> 
          <!-- 游记banner 小图 start --> 
          <ul id="pagination" style="margin-left: 341px;"> 
            <li class="current"> 
              <div class="slide-bg" style="display: none;"></div> <a href="javascript:void(0)"><img src="/style/home/article_total/1508216919797.jpg" /></a> 
            </li> 
            <li class=""> 
              <div class="slide-bg" style="display: none;"></div> <a href="javascript:void(0)"><img src="/style/home/article_total/109951163512427136.jpg" /></a> 
            </li>
          </ul> 
          <!-- 游记banner 小图 end --> 
          <!-- 游记作者描述 start --> 
          <ul id="description"> 
            <li style="display: list-item; z-index: 800;"> <a href="http://www.tuniu.com/trips/30082515"> 
             <div class="yj-name">
                【记录精彩旅程】
             </div> </a> 
            </li>
            <li style="display: list-item; z-index: 800;"> <a href="http://www.tuniu.com/trips/30082515"> 
             <div class="yj-name">
                【 途 H 牛 】
             </div> </a> 
            </li> 
          </ul> 
          <!-- 游记作者描述 end --> 
    </div> 
   <!-- 游记搜索框 start --> 
   <div class="dd_search"> 
    <div class="d_search"> 
      <form id="yjsearch_form" method="get" action="/home/article/total"> 
        <input class="input_search J_input" type="text" name="search" placeholder="搜索游记" value="{{$request->search}}" autocomplete="off" /> 
        <input class="search_btn J_sub_btn" type="submit" value="" /> 
       </form> 
    </div> 
   </div> 
   <!-- 游记搜索框 end --> 
  </div>
  <!-- 游记新版轮播 end --> 
  <!-- 游记内容 start --> 
  <div class="yj-content"> 
    <!-- 左侧内容 start--> 
    <div class="yj-left-show"> 
    <!-- 广告位  --> 
    <div class="yj-left-top"> 
     <!-- 游记tab start--> 
        <ul class="yj-tab"> 
            <li class="current">游记攻略</li> 
        </ul> 
    </div> 
    <!-- 游记tab end--> 
    <!-- 游记列表 start--> 
    <div class="yj-list-show"> 
        <div class="commen-loadding" style="display: none;"></div> 
        <ul class="yj-list" style="display: block;">
            @if(count($article_total))
            @foreach($article_total as $k=>$v) 
            <li> 
                <a class="list-img" target="_blank" rel="nofollow" href="/home/article/index/{{$v->id}}"> 
                    <img src="{{$v->thumb}}" alt="" /> 
                    <div class="list-recommend gl-jh" style="background-position: -100px 0px;"></div> 
                </a> 
                <div class="list-show"> 
                    <a target="_blank" rel="nofollow" href="/home/article/index/{{$v->id}}"> 
                        <div class="list-name">{{$v->title}}</div> 
                        <div class="list-des">{!!$v->content!!}</div> 
                    </a> 
                    <div class="list-auther"> 
                        <div class="list-auther-left"> 
                            <a target="_blank" rel="nofollow" href="/home/article/index/{{$v->id}}"> 
                                <img src="/style/home/article/Cii9EVdzO1mIUpbgAAMdNRR5P2wAAGzHADBGMoAAx1N033_w90_h90_c1_t0.jpg" alt="" /> 
                               <div class="list-auther-name">来源 : {{$v->source}}</div> 
                            </a> 
                            <div class="list-scan">
                               <i></i>999+ &nbsp;
                            </div>  
                        </div> 
                    </div> 
                </div> 
            </li> 
            @endforeach
            @else
            <div class="search-result">为您找到<span class="result-poi">翻噶发嘎嘎嘎嘎嘎</span>优先相关结果约<span class="result-count">0</span>个。<div class="search-null"></div></div>
            @endif
        </ul> 
         <ul class="yj-list"></ul> 
         <ul class="yj-list"></ul> 
         <ul class="yj-list"></ul> 
    </div> 
    <!-- 游记列表 end--> 
    <!-- 分页 --> 
    <div class="pager pagination" data-init="pager" style="display: block;" data-pager-inited="true" data-curpage="1">
        <div style="margin:0 auto;text-align:center;height: 100px" id="list">{{$article_total->links()}}</div>
    </div> 
    <div class="pager pagination" data-init="pager" style="display:none"></div> 
    <div class="pager pagination" data-init="pager" style="display:none"></div> 
    <div class="pager pagination" data-init="pager" style="display:none"></div> 
    <!-- 交互数据 --> 
    <script>
        window.$render_data={
            count: 1099    }
    </script> 
   </div> 
   <!-- 左侧内容 end--> 
   <!-- 右侧内容 start--> 
   <div class="yj-right-show"> 
    <div class="right-traverler"> 
     <div class="right-commen-tit"> 
      <p class="right-tit">管理员</p> 
      <a href="javascript:;" class="right-more" target="_blank" rel="nofollow">小代码</a> 
     </div> 
     <div class="traverler-auther"> 
      <div class="traverler-img"> 
       <div class="traverler-sex  sex-women"></div> 
       <a href="javascript:;" target="_blank" rel="nofollow"><img src="/style/home/article_total/head_tel.png" alt="" class="traverler-title-img" /></a> 
      </div> 
      <div class="traverler-name">
       Slimth
      </div> 
      <div class="traverler-des">
       游记攻略管理员
      </div> 
      <ul class="traverler-label"> 
       <li>管理员</li> 
       <li>萌妹子</li> 
      </ul> 
      <a href="/home/advices" class="master-btn" target="_blank">反馈建议</a> 
     </div> 
    </div> 
   </div> 
   <!-- 右侧内容 end--> 
  </div> 
  <!-- 新版编辑器弹框入口 --> 
  <!-- 游记内容 end --> 
  <script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script> 
  <script type="text/javascript" src="/style/home/article_total/slides.js"></script>


  <!-- 内容end -->
  <!--topNavigator部分(第一栏)--> 
  <div class="trav_sev"> 
   <ul class="ts_box clearfix"> 
    <li class="trav_l_first"> <i class="ts_1"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>去旅游</a>
      </dt> 
      <dd class="tl_w"> 
       <p> <a href="http://www.tuniu.com/tours/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-1']);">跟团游</a> <a href="http://www.tuniu.com/pkg/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-2']);">自由行</a> <a href="http://www.tuniu.com/drive/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-3']);">自驾游</a> </p> 
       <p> <a href="http://www.tuniu.com/theme/haidao/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-2']);">海岛游</a> <a href="http://www.tuniu.com/flight/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-3']);">机票</a> <a href="http://youlun.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-4']);">邮轮</a> </p> 
       <p> <a href="http://menpiao.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-3']);">门票</a> <a href="http://www.tuniu.com/theme/qinzi/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-4']);">亲子游</a> <a href="http://www.tuniu.com/visa/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-5']);">签证</a> </p> 
       <p> <a href="http://super.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-4']);">机票+酒店</a> <a href="http://www.tuniu.com/theme/miyue/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-5']);">蜜月游</a> <a href="http://hotel.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-6']);">酒店</a> </p> 
       <p> <a href="http://temai.tuniu.com/laoyutuijian" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-5']);">老于推荐</a> <a href="http://www.tuniu.com/gongsi/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-6']);">公司旅游</a> <a href="http://www.tuniu.com/niuren/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-7']);">牛人专线</a> </p> 
       <p> <a href="http://www.tuniu.com/zt/sfcf/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-6']);">首付出发</a> <a href="http://www.tuniu.com/local/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-7']);">当地玩乐</a> <a href="http://www.tuniu.com/zt/love/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_1','1-8']);">旅拍</a> </p> 
       <p> </p> 
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
       <p><a href="http://www.tuniu.com/bank/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_2','2-3']);">银行特惠游</a></p> 
       <p><a href="http://www.tuniu.com/gt/guangfacxqq" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_2','2-4']);">银行分期游</a></p> 
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
      <dd class="tl_w"> 
       <p><a href="http://www.tuniu.com/help/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-1']);">帮助中心</a></p> 
       <p><a href="http://www.tuniu.com/u/club" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-2']);">积分俱乐部</a></p> 
       <p><a href="http://www.tuniu.com/static/sunshine_ensure/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-3']);">阳光保障</a></p> 
       <p><a href="http://train.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-4']);">火车时刻表</a></p> 
       <p><a href="http://metro.tuniu.com/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-5']);">地铁路线图</a></p> 
       <p><a href="http://www.tuniu.com/flight/" target="_blank" onclick="_gaq.push(['_trackEvent','common_nj','tydb_wzdt_4','4-6']);">航班查询</a></p> 
      </dd> 
     </dl> </li> 
    <li class="trav_l_last"> <i class="ts_5"></i> 
     <dl class="trav_l "> 
      <dt class="tl_tt">
       <a>途牛APP</a>
      </dt> 
      <dd class="tl_w tl_cont"> 
       <p> <a>扫描下载途牛APP</a> </p> 
       <p> <img src="/style/home/article_public/Cii-T1i5FDyICo_LAAAiRTIzF6gAAH84QOOvGEAACJd508.png" /> </p> 
      </dd> 
     </dl> </li> 
   </ul> 
  </div> 
  <!--topGreenBar部分(第二栏)--> 
  <div class="three_trav"> 
   <div class="thr_trav"> 
    <a href="http://www.tuniu.com/static/sunshine_ensure/" target="_blank" style="display:block;width:100%;height:100%;"> <em class="tn_text" id="service_phone_head_text">客户服务电话 (免长途费) </em> <em class="tn_phone" id="service_phone_head_phone">1597-636-2497</em> </a> 
   </div> 
  </div> 
  <!--topPictureNavigator部分(第三栏)--> 
  <div class="fourImgs">
     <ul class="clearfix">
        <li>
            <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','home_gz','点击','底部广告图_1_品牌合作']);"><img src="/adverts/2018-12-07/1544172997.jpg" alt="品牌合作" width="238" height="58"></a>
        </li>
                        <li>
            <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','home_gz','点击','底部广告图_1_品牌合作']);"><img src="/adverts/2018-12-07/1544177794.jpg" alt="品牌合作" width="238" height="58"></a>
        </li>
                        <li>
            <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','home_gz','点击','底部广告图_1_品牌合作']);"><img src="/adverts/2018-12-07/1544178222.jpg" alt="品牌合作" width="238" height="58"></a>
        </li>
                        <li>
            <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','home_gz','点击','底部广告图_1_品牌合作']);"><img src="/adverts/2018-12-07/1544170400.jpg" alt="品牌合作" width="238" height="58"></a>
        </li>
      </ul>
  </div>
  <!--topNiurenAd部分(第四栏)--> 
  <div class="img_place">
      <a href="" rel="nofollow" target="_blank" style="display: block;" onclick="_gaq.push(['_trackEvent','home_gz','点击','底部广告图_5_牛人专线']);"><img src="/adverts/2018-12-07/1544176629.jpg" alt="牛人专线" width="988" height="58"></a>
  </div> 
  <!--第五栏~第十二栏数据--> 
  <div id="TN-footer" class="tn_footer datalazyload" data-lazyload-type="data" data-lazyload-from="textarea"> 
   <!--phoneInformation部分(第五栏)--> 
   <p id="TN-24">途牛客服中心位于南京市 来电显示为 025-86859999 、025-86259999 、025-85029999 、025-69609987 、025-69609986 、025-57629999 或 025-52339999</p> 
   <!--companyInformation部分(第六栏)--> 
   <p>&gt;北京途牛国际旅行社有限公司，旅行社业务经营许可证编号：L-BJ-CJ00144　　上海途牛国际旅行社有限公司，旅行社业务经营许可证编号：L-SH-CJ00107</p> 
   <!--siteLinks部分(第七栏)--> 
   <p id="TN-links"> <a href="http://www.tuniu.com/corp/aboutus.shtml" target="_blank" rel="nofollow">关于我们</a> <a href="http://ir.tuniu.com/" target="_blank" rel="nofollow">Investor Relations</a> <a href="http://www.tuniu.com/corp/contactus.shtml" target="_blank" rel="nofollow">联系我们</a> <a href="http://www.tuniu.com/corp/advise.shtml" target="_blank" rel="nofollow">投诉建议</a> <a href="http://www.tuniu.com/corp/advertising.shtml" target="_blank" rel="nofollow">广告服务</a> <a href="http://www.tuniu.com/giftcard/" target="_blank" rel="nofollow">旅游券</a> <a href="http://tuniu.zhiye.com/" target="_blank" rel="nofollow" style="color: red;">途牛招聘</a> <a href="http://www.tuniu.com/corp/privacy.shtml" target="_blank" rel="nofollow">隐私保护</a> <a href="http://www.tuniu.com/corp/duty.shtml" target="_blank" rel="nofollow">免责声明</a> <a href="http://www.tuniu.com/corp/zizhi.shtml" target="_blank" rel="nofollow">旅游度假资质</a> <a href="http://www.tuniu.com/theme/index/" target="_blank" rel="nofollow">主题旅游</a> <a href="http://www.tuniu.com/corp/agreement.shtml" target="_blank" rel="nofollow">用户协议</a> <a href="http://www.tuniu.com/corp/sitemap.shtml" target="_blank" rel="nofollow">网站地图</a> <a href="http://www.tuniu.com/ueip/" target="_blank" rel="nofollow">UEIP</a> <a href="http://www.tuniu.com/help/" target="_blank" rel="nofollow">帮助中心</a> </p> 
   <!--siteInformation部分(第八栏)--> 
   <p id="copyright">Copyright &copy; 2006-2018 <a target="_blank" href="http://www.tuniu.com/" rel="nofollow">南京途牛科技有限公司</a> | <a target="_blank" href="http://www.tuniu.com/" rel="nofollow">Tuniu.com</a> | <a target="_blank" href="http://www.tuniu.com/corp/company.shtml" rel="nofollow">营业执照</a> | <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow">ICP证：苏B2-20130006</a> | <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow">苏ICP备12009060号</a> | <a target="_blank" href="http://shz.tuniu.com/" rel="nofollow">深圳旅游网</a> </p> 
   <!--bottomPictureNavigator部分(第九栏)--> 
   <div class="thr_img">
        <ul class="clearfix">
            <li>
                <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','首页_gz','点击','底部广告图_6_跟团']);"><img src="/adverts/2018-12-07/1544181737.jpg" alt="跟团" width="175" height="38"></a>
            </li>
                                <li>
                <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','首页_gz','点击','底部广告图_6_跟团']);"><img src="/adverts/2018-12-07/1544180201.jpeg" alt="跟团" width="175" height="38"></a>
            </li>
                                <li>
                <a href="" target="_blank" onclick="_gaq.push(['_trackEvent','首页_gz','点击','底部广告图_6_跟团']);"><img src="/adverts/2018-12-07/1544177936.jpg" alt="跟团" width="175" height="38"></a>
            </li>
        </ul>
    </div>
   <!--newOrders部分(第十栏)--> 
   <div class="slide_order clearfix" id="slideOrder"> 
    <span class="fl">最新预订：</span> 
    <div class="fl w_940"> 
     <ul style="width: 4548px; left: -1385px;"> 
      <li>[2分钟前]用户***085398预定&lt;张家界-天门山-玻璃栈道-凤凰古城双高3日游&gt;长沙进怀化出，返程从怀化坐高铁节省7小时，心跳玻璃栈道，坐高空长索道，赏凤凰夜景，宿江边客栈</li> 
      <li>[6分钟前]用户***919127预定&lt;上海自由行&gt;</li> 
      <li>[9分钟前]用户***919127预定&lt;深圳自由行&gt;</li> 
      <li>[15分钟前]用户***636613预定&lt;俄罗斯莫斯科+圣彼得堡+摩尔曼斯克9日游&gt;深圳往返，追寻极光，俄罗斯传统桑拿汗蒸，喂驯鹿，冰上垂钓</li> 
      <li>[16分钟前]用户***633932预定成都自由行</li> 
      <li>[18分钟前]用户***291713预定&lt;越南芽庄五星酒店5晚6日自由行&gt;珍珠岛酒店/喜来登/哈瓦那/洲际/阿南度假村等精选房型任选，预定45天外团期含旅程取消险</li> 
      <li>[21分钟前]用户***905836预定[春节]&lt;埃及9-10日游&gt;五星酒店，四城全景游，纯玩0购物，金字塔景观特色餐，马车游卢克索，卡纳克神庙，亚力山大地中海，风帆船游尼罗河</li> 
      <li>[21分钟前]用户***208363预定&lt;成都-新都桥-稻城亚丁三飞5日游&gt;真纯玩0购物，不走回头路，奢享高品酒店/均带供暖/电梯，品特色餐野生鳕鱼，配备氧气/旅游三宝</li> 
      <li>[28分钟前]用户***867267预定&lt;俄罗斯莫斯科+圣彼得堡+摩尔曼斯克9日游&gt;深圳往返，追寻极光，俄罗斯传统桑拿汗蒸，喂驯鹿，冰上垂钓</li> 
      <li>[28分钟前]用户***531032预定&lt;全国出发机票+迪拜-阿布扎比5或6日游&gt;途牛自营，2到10人小团，纯玩无购物，全程国五，轻轨观棕榈岛，迪拜一天自由活动，含法拉利公园游玩</li> 
     </ul> 
    </div> 
   </div> 
   <!--partnerLinks部分(第十一栏)--> 
   <div class="trav_corp"> 
    <a id="___szfw_logo___" href="https://credit.szfw.org/CX20160128013521800380.html" rel="nofollow" target="_blank"> <img src="/style/home/article_public/chengxinOne.png" border="0" style="height:41px;" alt="中国互联网诚信示范企业" /> </a> 
    <a id="___szfw_logo___" href="http://net.china.cn/" rel="nofollow" target="_blank"> <img src="/style/home/article_public/buliang.png" border="0" style="height:41px;" alt="违法和不良信息举报中心" /> </a> 
    <a id="___szfw_logo___" href="http://js.cyberpolice.cn/webpage/index.jsp" rel="nofollow" target="_blank"> <img src="/style/home/article_public/wangluo.png" border="0" style="height:41px;" alt="网络110报警服务" /> </a> 
    <a id="___szfw_logo___" href="http://www.tuniu.com/trips/30348018" rel="nofollow" target="_blank"> <img src="/style/home/article_public/cata.png" border="0" style="height:41px;" alt="cata航空资质认证" /> </a> 
    <a id="___szfw_logo___" href="http://www.isc.org.cn/" rel="nofollow" target="_blank"> <img src="/style/home/article_public/Cii-tFpAbkWITEAmAAAF3Gwa3cUAABOHgP_-ZQAAAZs898.png" border="0" style="height:41px;" alt="中国互联网协会" /> </a> 
    <a id="___szfw_logo___" href="http://www.itrust.org.cn/yz/pjwx.asp?wm=1797102919" rel="nofollow" target="_blank"> <img src="/style/home/article_public/3acomp.png" border="0" style="height:41px;" alt="中国互联网协会信用评价中心" /> </a> 
    <a id="___szfw_logo___" href="https://ss.knet.cn/verifyseal.dll?sn=e14120832010056662smwq000000&amp;ct=df&amp;a=1&amp;pa=0.06350954016670585" rel="nofollow" target="_blank"> <img src="/style/home/article_public/chengxin.png" border="0" style="height:41px;" alt="诚信网站" /> </a> 
    <a id="___szfw_logo___" href="http://www.jsgsj.gov.cn:60101/keyLicense/verifKey.jsp?serial=320000163820121119100000009204&amp;signData=LvIMjwILeOCOnIt65a1kGAk+FxZKCnAoexteChdi5LEEvVGY5TUoYBJ15zmxNW1dwAE4U4mMREXkWocqMPODoh+IfB2ojCxtCvMF4gVdgsMXKTbkhemenyjWlproKM0XWYyPNEYxgn8H1kxvUgCWX35ExI1xLVWA3Zuw7ZiLdYM=" rel="nofollow" target="_blank"> <img src="/style/home/article_public/dianziyingye.png" border="0" style="height:41px;" alt="营业执照" /> </a> 
    <a id="___szfw_logo___" href="http://www.patachina.org/" rel="nofollow" target="_blank"> <img src="/style/home/article_public/pata.png" border="0" style="height:41px;" alt="亚太旅游协会会员单位" /> </a> 
   </div> 
  </div> 
 </body>
</html>