<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>会员注册 - 途牛旅游网</title>
        <meta name="description" content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网">
        <meta name="keywords" content="会员注册">
        <link rel="stylesheet" href="/style/home/register/register.css" charset="utf-8">
          <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="/style/home/register/layer.css" id="skinlayercss">
        <script type="text/javascript" src="/style/home/register/ga.js" async="" charset="utf-8"></script>
        <script type="text/javascript" src="/style/home/register/lazyloadnew.js" async="" charset="utf-8"></script>
    </head>
    
    <body id="index1200" class="index1200">
        <!-- user head start -->
        <div class="head_bg">
            <div class="header">
                <div class="logo clearfix">
                    <div class="logocon">
                        <a href="http://www.tuniu.com/">
                            <img alt="途牛旅游网" title="途牛旅游网" src="/style/home/register/logv2.png"></a>
                    </div>
                    <p class="head_tip">欢迎注册</p>
                    <noscript>
                        <h1 class="head_notice_tips">您的浏览器禁用了javascript脚本，导致登录功能无法使用，请您先开启以后再使用登录功能。</h1></noscript>
                    <p class="head_notice_tips" style="display: none;">您的浏览器禁用了cookie，开启Cookie之后才能注册，
                        <a href="javascript:void(0)" id="howEnableCookie" style="color:rgb(3, 189, 252);">如何开启?</a></p>
                </div>
            </div>
        </div>
        <!-- user head end -->
        <!-- user center_reg start -->
        <div class="allWrap">
            <div class="main_top clearfix">
                <div class="main_top_l">
                    <span class="decoration"></span>
                </div>
                <div class="main_top_r">已有途牛账号了？
                    <a rel="nofollow" target="_self" href="/login">登录</a></div>
            </div>
            <style type="text/css">.zones_tabcont ul.ul_tabcont li { width:135px }</style>
            <div id="user-reg" class="user-reg">
                <div id="bg_div" class="bg_div" style="display:none;"></div>
                <div id="reg-field">
                    <div class="a_title title_oneStep clearfix">
                        <a class="page_phone page_cur" href="javascript:void(0);" style="width:100%">
                            <span>手机注册</span>
                            <span class="poptip-arrow poptip-arrow-top">▼</span></a>
                        <!--<a class="page_email" id="email_regist" href="/register/email">
                        <span>邮箱注册</span>
                        <span class="poptip-arrow poptip-arrow-top">▼</span></a>-->
                    </div>
                    <div id="reg-wrap" class="reg-wrap">
                        <div id="mainPart" class="mainPart clearfix" style="left: -2400px;">
                          <!--手机注册第一步开始-->
                          <div class="main_item" style="visibility: hidden;"></div>  
                          <!--手机注册第一步结束-->
                          <!--手机注册第二步开始-->
                          <div class="main_item hidden" style="visibility: visible;"></div>
                          <!--手机注册第二步结束-->
                          <!--手机注册第三步开始-->
                          <div class="main_item hidden" style="visibility: visible;">
                                <div class="step step3"></div>
                                <div class="verify-success">
                                    <div class="ziliao">
                                        <img src="/style/home/register/order_success_niu.png" width="90" height="82">
                                        <div class="clearfix mb5">
                                            <span class="fl tit">恭喜，已注册成功！！！</span>
                                            <p class="fl">
                                                <a href="/" class="f_3e7a12">去预订</a>
                                        </div>
                                        <div class="clearfix mb5">
                                            <span class="fl tit" style="font-size: 17px">为了该账户的正常使用，请点击</span>
                                            <p class="fl">
                                                <a href="/sendEmail/{{$id}}-{{$email}}" target="_blank" class="f_3e7a12">邮箱激活！</a>
                                            </p>
                                        </div>
                                        <p>完善个人资料还可获得50积分奖励哦，点击
                                            <a href="/home/coupon" class="f_3e7a12">我要奖励！</a></p>
                                        <p>您还可以下载并打开途牛APP，在【我的】-【我的顾问】</p>
                                        <p>选择自己的专属顾问，随时随地的为您提供贴心的旅游咨询</p>
                                        <p>服务</p>
                                        <div id="invite" style="display: none">
                                            <p class="f_f666">您已成功参与牛拉牛活动，获得首次出游20元优惠券，200</p>
                                            <p class="f_f666">元出行礼包、首次出境游免费wifi。还等什么？快来一场说走</p>
                                            <p class="f_f666">就走的旅行吧!</p>
                                        </div>
                                    </div>
                                    <p class="success_t" style="position: relative;top:110px">
                                        <span id="backTime">120s</span>后自动跳转到首页，您也可以点击
                                        <a href="/">立即跳转</a></p>
                                </div>
                                <!--手机注册第三步结束-->
                                <!--注册失败开始-->
                                <form action="/register/email" method="post" id="reg_fail"></form>
                                <!--注册失败结束-->
                          </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script> 
                <script type="text/javascript">
                    var m = 120;
                    setInterval(function(){
                        m--;
                        $('#backTime').html(m+'s');
                        if(m <= 0){
                          location.href = '/';
                        }
                    },1000)
                    // 防止页面后退
                    $(function() {
                  　　if (window.history && window.history.pushState) {
                    　　$(window).on('popstate', function () {
                      　　window.history.pushState('forward', null, '#');
                      　　window.history.forward(1);
                      　});
                  　　}
                    　　window.history.pushState('forward', null, '#'); //在IE中必须得有这两行
                    　　window.history.forward(1);
                  　})
                </script>

                <script type="text/javascript" src="/style/home/register/jquery-1.js"></script>
                <script type="text/javascript" src="/style/home/register/layer.js"></script>
                <script type="text/javascript">if (!window.navigator.cookieEnabled) {
                        $("#howEnableCookie").parent().show();
                        $("#howEnableCookie").click(function() {
                            $.layer({
                                type: 1,
                                title: "如何启动COOKIE",
                                time: 0,
                                shadeClose: true,
                                maxHeight: 200,
                                page: {
                                    html: "<div style='padding:10px'><p style='font-size: 18px;font: 20px/47px 'microsoft yahei';'>1. ie浏览器：点击浏览器<b>“工具”</b>——<b>“internet选项”</b>——<b>“隐私”</b>——将<b>“阻止所有cookie”</b>调低级别——点击<b>“保存”</b>——重启浏览器即可正常登录。<br><br>2. chrome浏览器：点击浏览器<b>“设置”</b>——<b>“显示高级设置”</b>——<b>“隐私设置”</b>——<b>“内容设置”</b>——取消<b>“阻止第三方cookie和网站数据”</b>——选择<b>“允许设置本地数据（推荐）”</b>——点击<b>“完成”</b>——重启浏览器即可正常登录。<br><br>3. 火狐浏览器：点击浏览器<b>“选项”</b>——选择<b>“隐私”</b>——<b>“自定义历史记录设置”</b>，取消<b>“始终使用隐私浏览模式”</b>，勾选<b>“接受来自站点的cookie”</b>——点击<b>“确定”</b>——重启浏览器即可生效。</p></div>"
                                },
                                offset: ["200px", ""],
                                area: ["700px", "320px"]
                            })
                        })
                    };</script>
                <script type="text/javascript" src="/style/home/register/in-min.js"></script>
                <script type="text/javascript" src="/style/home/register/frms-fingerprint.js"></script>
                <script type="text/javascript" src="/style/home/register/zonesGroup.js"></script>
                <script type="text/javascript" src="/style/home/register/register.js"></script>
                <script type="text/javascript">var u = (("https:" == document.location.protocol) ? "https://analy.tuniu.cn/analysisCollect/": "http://analy.tuniu.cn/analysisCollect/");
                    document.write(unescape("%3Cscript src='" + u + "tac.mini.js' type='text/javascript'%3E%3C/script%3E"));

                    $("#TN-faq").hide();
                    $(".offer_service").hide();

                    var content = "PC:会员:注册";
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
                    var init_page_set_time_out = 0; //页面自动加载标记
                    In.add('gaAndTac', {
                        path: '//ssl1.tuniucdn.com/j/20140612/common/tac.mini.js,common/ga.js',
                        type: 'js',
                        charset: 'utf-8'
                    });
                    In('gaAndTac',
                    function() {
                        tuniuTracker = _tat.getTracker();
                        tuniuTracker.setPageName("PC:会员:注册");
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
                    In.add('TN_common_init', {
                        path: '//ssl.tuniucdn.com/j/2014071517/common/jquery-powerFloat.js,common/lazyloadnew.min.js',
                        type: 'js',
                        charset: 'utf-8'
                    });
                    In('TN_common_init',
                    function() {
                        //图片异步加载。
                        $("img").lazyload({
                            effect: "fadeIn",
                            failurelimit: 50,
                            threshold: 300,
                            skip_invisible: false
                        });
                    });</script>
                <script src="/style/home/register/tac.js" type="text/javascript"></script>
            </div>
        </div>
        <div style="visibility: hidden; position: absolute;" id="userdata_el"></div>
    </body>

</html>