<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
    <title>用户退出 - 途牛通行证</title>
    <meta name="description" content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网">
    <meta name="keywords" content="会员登录">
  <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="/style/home/outlogin/siteV2.css">
<script type="text/javascript" src="/style/home/outlogin/lazyloadnew.js" async="" charset="utf-8"></script></head>
<body id="index1200" class="index1200">
<!-- common header start -->
<div class="header">
    <div class="header_common">
        <div class="header_inner">
            <div class="site_logo">
                <a href="http://www.tuniu.com/">
                    <img src="/style/home/outlogin/logo.png" width="150" height="41">
                </a>
            </div>
            <div class="site_phone">
                &nbsp;
                <!--
                <a href="http://www.tuniu.com/corp/searchcompany.shtml">
                    <img height="41" width="145" src="https://ssl2.tuniucdn.com/img/20141206/header/tn_phone.png">
                </a>
                -->
            </div>
            <div>
                <noscript>
                        <h1 class="head_notice_tips">您的浏览器禁用了javascript脚本，导致登录功能无法使用，请您先开启以后再使用登录功能。</h1>
                    </noscript>
                    <p class="head_notice_tips" style="display: none;">
                                                                您的浏览器禁用了cookie，开启Cookie之后才能登录，
                        <a href="javascript:void(0)" id="howEnableCookie" style="color:rgb(3, 189, 252);">
                            如何开启?
                        </a>
                    </p>
            </div>
        </div>
    </div>  </div>
<div id="loginWrap" class="wrap" style="background-image: url(&quot;http://m.tuniucdn.com/fb2/t1/G2/M00/A1/A3/Cii-T1f4lhCITSjhAAMhh0OTedQAADJqwM5SCIAAyGf70.jpeg&quot;);">
    <div id="content" class="content">
        <div id="cent_link" class="cent_link">
            <a style="display:block;" target="_blank" id="bg_img" href="http://tmc.tuniu.com/"></a>
        </div>
        <div id="login-content" class="login-content" style="background-color: #fff;height: 400px;">
    <div id="login-box" class="login-box-inner">
        <ul class="login-tab">
            <li id="login-tab-card" class="cur" style="width: 100%">退出成功<b></b></li>
        </ul>
        <div class="login-tab-content" style="padding:30px 45px 11px 65px;">
            <table class="login-table" style="font-size:14px;">
                <tbody><tr>
                    <td>
                        <p style="color:#39c34c;">您已经成功退出途牛通行证。</p>
                    </td>
                </tr>
                <tr>
                    <td style="color: gray;">
                    <span class="left-time">2</span> 秒后跳转到 <a href="/login" target="_self" class="redirect-url">页面</a>
                    </td>
                </tr>
            </tbody></table>
        </div>
    </div>
</div>

<script type="text/javascript" src="/style/home/outlogin/jquery-1.js"></script>
<script type="text/javascript">
    var timer = setInterval(function(){
        var leftTime = parseInt($('#login-box .left-time').text());
        if ( leftTime > 1 ) {
            $('#login-box .left-time').text(leftTime - 1);
        } else {
            clearInterval(timer);
            window.location.href = $('#login-box .redirect-url').attr('href');
        }
    }, 1000);

    function callback20150511() {
        //pass
    }
</script>

<img src="http://www.tuniu.com/u/logout?logout_hash=a4d365353b6f14c4001634f47be560bf&amp;callback=callback20150511&amp;_=1544516945" width="0" height="0"></div>
</div>
<script type="text/javascript">
    $.ajax({
        url: '/ajax/getCmsImg',
        success: function (res) {
            var arr
            try {
                arr = eval("(" + res + ")");
            } catch (e) {
                arr = [["http://1.tuniu.com/","https://ssl1.tuniucdn.com/u/mainpic/hycenter/2015/1yuan_1.jpg"],["http://www.tuniu.com/zt/sfcf/","https://img3.tuniucdn.com/site/m2015/images/member/events/sfcf.jpg"],["http://temai.tuniu.com/","https://m.tuniucdn.com/fb2/t1/G2/M00/3F/56/Cii-T1e0DPqIFEsNAASX4HCmiwgAABUAgBhf_EABJf447.jpeg"],["http://www.tuniu.com/tucom/","https://m.tuniucdn.com/fb2/t1/G2/M00/3F/53/Cii-Tle0C4qIIG-HAALyJxscqtYAABT-wMCqQwAAvI_73.jpeg"],["http://www.tuniu.com/niuren/","https://ssl2.tuniucdn.com/u/mainpic/hycenter/2015/niupinzhi.jpg"]];
            }
            $flag = parseInt(Math.random()*arr.length,10);

            $('#loginWrap').css("background-image","url("+arr[$flag][1]+")");
            $('#bg_img').attr('href',arr[$flag][0]);
        }
    });
</script>
<script type="text/javascript">if(!window.navigator.cookieEnabled){$("#howEnableCookie").parent().show();$("#howEnableCookie").click(function(){$.layer({type:1,title:"如何启动COOKIE",time:0,shadeClose:true,maxHeight:200,page:{html:"<div style='padding:10px'><p style='font-size: 18px;font: 20px/47px 'microsoft yahei';'>1. ie浏览器：点击浏览器<b>“工具”</b>——<b>“internet选项”</b>——<b>“隐私”</b>——将<b>“阻止所有cookie”</b>调低级别——点击<b>“保存”</b>——重启浏览器即可正常登录。<br><br>2. chrome浏览器：点击浏览器<b>“设置”</b>——<b>“显示高级设置”</b>——<b>“隐私设置”</b>——<b>“内容设置”</b>——取消<b>“阻止第三方cookie和网站数据”</b>——选择<b>“允许设置本地数据（推荐）”</b>——点击<b>“完成”</b>——重启浏览器即可正常登录。<br><br>3. 火狐浏览器：点击浏览器<b>“选项”</b>——选择<b>“隐私”</b>——<b>“自定义历史记录设置”</b>，取消<b>“始终使用隐私浏览模式”</b>，勾选<b>“接受来自站点的cookie”</b>——点击<b>“确定”</b>——重启浏览器即可生效。</p></div>"},offset:["200px",""],area:["700px","320px"]})})};</script>
<script type="text/javascript" src="/style/home/outlogin/in-min.js"></script>  
        <script type="text/javascript">
            $("#TN-faq").hide();
            $(".offer_service").hide();

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
        </script><!--start foot-->
<div id="TN-footer">
    <p id="TN-24">24小时客户服务电话(免长途费)：4007-999-999  途牛呼叫中心位于南京来电将统一显示为 025-86859999</p>
    <p id="TN-links">
        <a href="http://www.tuniu.com/corp/aboutus.shtml" target="_blank" rel="nofollow" onclick="tuniuRecorder.push('33_1_2_1_1_1')">关于我们</a>
        <a href="http://ir.tuniu.com/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_2')">Investor Relations</a>
        <a href="http://www.tuniu.com/corp/contactus.shtml" target="_blank" rel="nofollow" onclick="tuniuRecorder.push('33_1_2_1_1_3')">联系我们</a>
        <a href="http://www.tuniu.com/corp/advise.shtml" target="_blank" rel="nofollow" onclick="tuniuRecorder.push('33_1_2_1_1_4')">投诉建议</a>
        <a rel="nofollow" href="http://www.tuniu.com/corp/advertising.shtml" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_5')">广告服务</a>
        <a rel="nofollow" href="http://www.tuniu.com/giftcard/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_6')">旅游券</a>
        <a rel="nofollow" href="http://tuniu.zhiye.com/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_7')" style="color:red;">途牛招聘</a>
        <a href="http://www.tuniu.com/corp/privacy.shtml" target="_blank" rel="nofollow" onclick="tuniuRecorder.push('33_1_2_1_1_8')">隐私保护</a>
        <a href="http://www.tuniu.com/corp/duty.shtml" target="_blank" rel="nofollow" onclick="tuniuRecorder.push('33_1_2_1_1_9')">免责声明</a>
        <a rel="nofollow" href="http://www.tuniu.com/corp/zizhi.shtml" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_10')">旅游度假资质</a>
        <a rel="nofollow" href="http://www.tuniu.com/merchants/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_11')">供应商合作</a>
        <a href="http://www.tuniu.com/corp/agreement.shtml" target="_blank" rel="nofollow" onclick="tuniuRecorder.push('33_1_2_1_1_12')">用户协议</a>
        <a href="http://www.tuniu.com/corp/sitemap.shtml" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_1_13')">网站地图</a>
        <br>
        <a rel="nofollow" href="http://team.tuniu.com/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_2_1')">团队博客</a>
        <a rel="nofollow" href="http://union.tuniu.com/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_2_2')">网站联盟</a>
        <a rel="nofollow" target="_blank" href="http://www.tuniu.com/ueip/index.html" onclick="tuniuRecorder.push('33_1_2_1_2_3')">UEIP</a>
        <a rel="nofollow" href="http://www.tuniu.com/help/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_2_4')">帮助中心</a>
    </p>
    <!-- #TN-links -->
    <p id="copyright">Copyright © 2006-2014
        <a rel="nofollow" href="http://www.tuniu.com/" onclick="tuniuRecorder.push('33_1_5_1_1_1')">途牛旅游网</a>
        <a rel="nofollow" href="http://www.tuniu.com/" onclick="tuniuRecorder.push('33_1_5_1_1_2')">Tuniu.com</a> |
        <a target="_blank" href="http://www.tuniu.com/corp/company.shtml" rel="nofollow" onclick="tuniuRecorder.push('33_1_5_1_1_3')">营业执照</a> |
        <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow" onclick="tuniuRecorder.push('33_1_5_1_1_4')">ICP证：苏B2-20130006</a>&nbsp;&nbsp;
        <a target="_blank" href="http://www.tuniu.com/" onclick="tuniuRecorder.push('33_1_5_1_1_5')">上海旅游网</a>
    </p>
</div>
<!--end foot-->

<!-- common footer end -->

<!-- pop start -->
<div id="card-box" class="card-box hidden">
    <div id="card-box-inner">
        <a href="javascript:void(0);" id="card-close">x</a>
        <table id="card-table">
            <tbody><tr>
                <td>请选择合作商家:</td>
            </tr>
            <tr>
                <td>
                    <select id="sel_membcard_name" name="membcard_name" onchange="change_card_tpl();">
                        <option selected="selected">请选择合作卡类型</option>
                        <option>建行途牛联名信用卡</option><option>中信途牛联名信用卡（2016.6.3之前发卡）</option><option>江苏银行途牛联名信用卡</option><option>建行途牛龙卡借记卡普卡</option><option>建行途牛龙卡借记卡白金卡</option><option>中信途牛联名信用卡（银联金卡，2016.6.3之后发卡）</option><option>中信途牛联名信用卡（银联白金卡，2016.6.3之后发卡）</option><option>中信VISA途牛联名卡经典版</option><option>中信VISA途牛联名卡中美旅游限量版</option><option>工银途牛牛人信用卡金卡</option><option>工银途牛牛人信用卡普卡</option><option>工银途牛牛人信用卡白金卡</option><option>中行途牛白金联名借记卡</option><option>中行途牛联名卡借记卡普卡</option><option>途牛龙卡金卡</option><option>途牛龙卡白金卡</option>                    </select>
                </td>
            </tr>
            <tr>
                <td id="card_id">请输入您的会籍卡号:</td>
            </tr>
            <tr>
                <td><input type="text" id="txt_membcard_id" name="membcard_id" class="txt txt-mm"></td>
            </tr>
            <tr>
                <td class="cdyellow f13"><div id="errmsg" name="errmsg"></div></td>
            </tr>
            <tr>
                <td id="register"><input type="image" src="/style/home/outlogin/next.png" onclick="active_membcard();"></td>
            </tr>
        </tbody></table>
    </div>
</div><!-- #card box -->
<!-- pop end -->

</body></html>