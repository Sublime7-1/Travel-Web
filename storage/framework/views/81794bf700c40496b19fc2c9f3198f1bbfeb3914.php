<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript">var NREUMQ = NREUMQ || [];
            NREUMQ.push(["mark", "firstbyte", new Date().getTime()]);</script>
        <title>用户登录 - 途牛通行证</title>
        <meta name="description" content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网">
        <meta name="keywords" content="会员登录">
        <link type="text/css" rel="stylesheet" href="/style/home/login/siteV2.css">
          <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="/style/home/login/layer.css" id="skinlayercss">
        <script type="text/javascript" src="/style/home/login/ga_002.js" async="" charset="utf-8"></script>
        <script type="text/javascript" src="/style/home/login/lazyloadnew.js" async="" charset="utf-8"></script>


        <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> -->

    </head>
    
    <body id="index1200" class="index1200">
        <!-- common header start -->
        <div class="header">
            <div class="header_common">
                <div class="header_inner">
                    <div class="site_logo">
                        <a href="http://www.tuniu.com/">
                            <img src="/style/home/login/logo.png" width="150" height="41"></a>
                    </div>
                    <div class="site_phone">&nbsp;
                        <!-- <a href="http://www.tuniu.com/corp/searchcompany.shtml">
                        <img height="41" width="145" src="https://ssl2.tuniucdn.com/img/20141206/header/tn_phone.png"></a>
                        --></div>
                    <div>
                        <noscript>
                            <h1 class="head_notice_tips">您的浏览器禁用了javascript脚本，导致登录功能无法使用，请您先开启以后再使用登录功能。</h1></noscript>
                        <p class="head_notice_tips" style="display: none;">您的浏览器禁用了cookie，开启Cookie之后才能登录，
                            <a href="javascript:void(0)" id="howEnableCookie" style="color:rgb(3, 189, 252);">如何开启?</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="loginWrap" class="wrap" style="background-image: url(&quot;http://m.tuniucdn.com/fb2/t1/G2/M00/A1/A3/Cii-T1f4lhCITSjhAAMhh0OTedQAADJqwM5SCIAAyGf70.jpeg&quot;);">
            <div id="content" class="content">
                <div id="cent_link" class="cent_link">
                    <a style="display:block;" target="_blank" id="bg_img" href="http://tmc.tuniu.com/"></a>
                </div>
                <input type="hidden" id="errLoginType" value="P-N">
                <input type="hidden" id="errLoginMsg" value="">
                <div id="login-content" class="login-content" style="background-color: #fff;">
                    <div id="login-box" class="login-box-inner">
                        <ul id="login-tab" class="login-tab">
                            <li id="login-tab-user" class="login-tab-li cur">账户登录
                                <b></b>
                            </li>
                            <!-- <li id="login-tab-pass" class="login-tab-li">扫码登录
                                <b></b>
                            </li> -->
                        </ul>
                        <!-- <div id="qr-login" class="qr-login login-table hidden">
                            <div class="qr-title">
                                <img class="sweep-img" src="/style/home/login/sweep.png" style="">扫码登录，更快，更安全</div>
                            <div class="login-tip">
                                <div id="login_error3" class="error login_error"></div>
                            </div>
                            <div class="qr-content">
                                <div class="qr-img-div">
                                    <img class="qr-img" style="">
                                    <div class="re_btn hidden">点击刷新</div></div>
                                <img src="/style/home/login/qrTips.png" class="tip-img" style=""></div>
                            <div class="qr-text">打开途牛app扫二维码登录</div>
                            <div class="action-box">
                                <a class="app-btn" style="float:left;">下载途牛app</a>
                                <a href="https://passport.tuniu.com/register" class="reg_btn qr-rg-btn">新用户送礼，
                                    <span class="reg_type">立即注册 &gt;</span></a>
                            </div>
                        </div> -->
                        
                        <div id="account-login" class="account-login">
                            <!-- 途牛会员登录 form start -->
                            
                              
                            <?php if(count($errors) > 0): ?>
                                    <table class="login-table " id="alert-danger">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          
                                            <tr>
                                                <td class="login-tip">
                                                    <div id="login_error"  class="error login_error" style="display: block;width:325px"><?php echo $error; ?></div>
                                                </td>
                                            </tr>      
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </table>
                                    
                                <script>
                                setTimeout(function(){
                                    $('#alert-danger').hide();
                                },3000);
                                </script>
                            <?php endif; ?>
                            
                            <form action="/login" method="post" id="loginNormal" onsubmit="">
                                <?php echo e(csrf_field()); ?>

                                
                                <input type="hidden" id="pwd-strength" name="isWeak" value="0">
                                <input id="nor_login_type" name="login_type" value="P-N" type="hidden">
                                <div class="login-tab-content" id="login-tab-content0">
                                    <table class="login-table">
                                        <tbody>
                                            <tr>
                                                <td class="login-tip">
                                                    <div id="login_error"  class="error login_error" style="display: none;width:325px"></div>
                                                </td>
                                            </tr>
                                            <tr id="line_1" class="line_1 hover">
                                                <td>
                                                            
                                                    <div class="input_div J_input_right">
                                                        <!-- 国际登录: .input_div_right -->
                                                        <input id="normal_tel" type="text" name="username" autocomplete="off" tabindex="1" class="txt txt-m txt-focus cgrey2 tel" placeholder="手机号/会员名/昵称/邮箱">
                                                        </div>
                                                </td>
                                            </tr>
                                            <tr id="line_2" class="line_2">
                                                <td>
                                                    <div class="input_div">
                                                        <input type="password" name="password"  placeholder="密码"></div>
                                                </td>
                                            </tr>
                                            <tr class="line_4">
                                                <td class="cgrey2 line2">
                                                    <label style="vertical-align:middle;float:left;">
                                                        <input type="checkbox" class="remember_me" tabindex="4" name="remember_me" id="rememberme2" value="1" style="vertical-align:middle">&nbsp;两周内自动登录</label>
                                                    <a href="javascript:void(0)" id="goDynamic" class="search_psw">
                                                        <img class="switchTab" src="/style/home/login/mobile.png">手机动态密码登录？</a></td>
                                            </tr>
                                            <tr>
                                                <td class="line2">
                                                    <input type="button" value="登录" name="submit_login" tabindex="5" class="sub"></td>
                                            </tr>
                                            <tr>
                                                <td class="cgrey2 line2">
                                                    <a href="/forget/index" style="float:left;" target="_self">忘记密码</a>
                                                    <a href="/register" class="reg_btn">新用户送礼，
                                                        <span class="reg_type">立即注册 &gt;</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- 途牛会员登录 form end -->
                            <!-- 动态密码登录 form start -->
                            <form action="/login/post" method="post" id="loginTel" onsubmit="return false;">
                                <input type="hidden" name="login_type" value="P-M">
                                <div class="login-tab-content hidden" id="login-tab-content1">
                                    <table class="login-table">
                                        <tbody>
                                            <tr>
                                                <td class="login-tip">
                                                    <div id="login_error3" class="error login_error" style="display: none ;"></div>
                                                </td>
                                            </tr>
                                            <tr id="line_8" class="line_8">
                                                <td>
                                                    <!-- 变成了 国际 手机号码 + 区号 -->
                                                    <div class="input_div input_div_left J_input_left_2">
                                                        <input class="J_zoneHid" id="intlCode" type="hidden" name="intlCode" value="0086">
                                                        <div class="zone_val J_zoneVal_2" data-country="中国" data-zone="0086">中国 0086</div>
                                                        <div class="zone_tri J_zoneVal_2" data-country="中国" data-zone="0086"></div>
                                                        <div class="zones J_Zones_2" style="display: none;">
                                                            <div class="zones_title">
                                                                <ul class="ul_zones_title J_zonesTitle_2">
                                                                    <li class="li_active">HOT</li>
                                                                    <li>A</li>
                                                                    <li>B</li>
                                                                    <li>C</li>
                                                                    <li>D</li>
                                                                    <li>E</li>
                                                                    <li>F</li>
                                                                    <li>G</li>
                                                                    <li>H</li>
                                                                    <li>I</li>
                                                                    <li>J</li>
                                                                    <li>K</li>
                                                                    <li>L</li>
                                                                    <li>M</li>
                                                                    <li>N</li>
                                                                    <li>O</li>
                                                                    <li>P</li>
                                                                    <li>Q</li>
                                                                    <li>R</li>
                                                                    <li>S</li>
                                                                    <li>T</li>
                                                                    <li>U</li>
                                                                    <li>V</li>
                                                                    <li>W</li>
                                                                    <li>X</li>
                                                                    <li>Y</li>
                                                                    <li>Z</li></ul>
                                                            </div>
                                                            <div class="zones_tabcont J_zonesTabcont_2">
                                                                <ul class="ul_tabcont ul_clicked" style="display:none">
                                                                    <li class="li_cont" data-country="澳大利亚" data-zone="0061" data-id="31">澳大利亚 0061</li>
                                                                    <li class="li_cont" data-country="澳门" data-zone="00853" data-id="151">澳门 00853</li>
                                                                    <li class="li_cont" data-country="德国" data-zone="0049" data-id="21">德国 0049</li>
                                                                    <li class="li_cont" data-country="法国" data-zone="0033" data-id="9">法国 0033</li>
                                                                    <li class="li_cont" data-country="韩国" data-zone="0082" data-id="38">韩国 0082</li>
                                                                    <li class="li_cont" data-country="加拿大" data-zone="001" data-id="1">加拿大 001</li>
                                                                    <li class="li_cont" data-country="美国" data-zone="001" data-id="2">美国 001</li>
                                                                    <li class="li_cont" data-country="马来西亚" data-zone="0060" data-id="30">马来西亚 0060</li>
                                                                    <li class="li_cont" data-country="日本" data-zone="0081" data-id="37">日本 0081</li>
                                                                    <li class="li_cont" data-country="泰国" data-zone="0066" data-id="36">泰国 0066</li>
                                                                    <li class="li_cont" data-country="新西兰" data-zone="0064" data-id="34">新西兰 0064</li>
                                                                    <li class="li_cont" data-country="新加坡" data-zone="0065" data-id="35">新加坡 0065</li>
                                                                    <li class="li_cont" data-country="香港" data-zone="00852" data-id="150">香港 00852</li>
                                                                    <li class="li_cont" data-country="意大利" data-zone="0039" data-id="12">意大利 0039</li>
                                                                    <li class="li_cont" data-country="英国" data-zone="0044" data-id="16">英国 0044</li>
                                                                    <li class="li_cont" data-country="中国" data-zone="0086" data-id="40">中国 0086</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="埃及" data-zone="0020" data-id="4">埃及 0020</li>
                                                                    <li class="li_cont" data-country="奥地利" data-zone="0043" data-id="15">奥地利 0043</li>
                                                                    <li class="li_cont" data-country="阿根廷" data-zone="0054" data-id="25">阿根廷 0054</li>
                                                                    <li class="li_cont" data-country="澳大利亚" data-zone="0061" data-id="31">澳大利亚 0061</li>
                                                                    <li class="li_cont" data-country="阿富汗" data-zone="0093" data-id="44">阿富汗 0093</li>
                                                                    <li class="li_cont" data-country="阿尔及利亚" data-zone="00213" data-id="49">阿尔及利亚 00213</li>
                                                                    <li class="li_cont" data-country="安哥拉" data-zone="00244" data-id="74">安哥拉 00244</li>
                                                                    <li class="li_cont" data-country="埃塞俄比亚" data-zone="00251" data-id="78">埃塞俄比亚 00251</li>
                                                                    <li class="li_cont" data-country="爱尔兰" data-zone="00353" data-id="100">爱尔兰 00353</li>
                                                                    <li class="li_cont" data-country="阿尔巴尼亚" data-zone="00355" data-id="102">阿尔巴尼亚 00355</li>
                                                                    <li class="li_cont" data-country="爱沙尼亚" data-zone="00372" data-id="109">爱沙尼亚 00372</li>
                                                                    <li class="li_cont" data-country="安道尔共和国" data-zone="00376" data-id="113">安道尔共和国 00376</li>
                                                                    <li class="li_cont" data-country="澳门" data-zone="00853" data-id="151">澳门 00853</li>
                                                                    <li class="li_cont" data-country="阿曼" data-zone="00968" data-id="164">阿曼 00968</li>
                                                                    <li class="li_cont" data-country="阿拉伯联合酋长国" data-zone="00971" data-id="165">阿拉伯联合酋长国 00971</li>
                                                                    <li class="li_cont" data-country="阿塞拜疆" data-zone="00994" data-id="173">阿塞拜疆 00994</li>
                                                                    <li class="li_cont" data-country="安圭拉岛" data-zone="001264" data-id="177">安圭拉岛 001264</li>
                                                                    <li class="li_cont" data-country="安提瓜和巴布达" data-zone="001268" data-id="178">安提瓜和巴布达 001268</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="比利时" data-zone="0032" data-id="8">比利时 0032</li>
                                                                    <li class="li_cont" data-country="波兰" data-zone="0048" data-id="20">波兰 0048</li>
                                                                    <li class="li_cont" data-country="秘鲁" data-zone="0051" data-id="22">秘鲁 0051</li>
                                                                    <li class="li_cont" data-country="巴西" data-zone="0055" data-id="26">巴西 0055</li>
                                                                    <li class="li_cont" data-country="巴基斯坦" data-zone="0092" data-id="43">巴基斯坦 0092</li>
                                                                    <li class="li_cont" data-country="布基纳法索" data-zone="00226" data-id="57">布基纳法索 00226</li>
                                                                    <li class="li_cont" data-country="贝宁" data-zone="00229" data-id="60">贝宁 00229</li>
                                                                    <li class="li_cont" data-country="布隆迪" data-zone="00257" data-id="84">布隆迪 00257</li>
                                                                    <li class="li_cont" data-country="博茨瓦纳" data-zone="00267" data-id="93">博茨瓦纳 00267</li>
                                                                    <li class="li_cont" data-country="冰岛" data-zone="00354" data-id="101">冰岛 00354</li>
                                                                    <li class="li_cont" data-country="保加利亚" data-zone="00359" data-id="106">保加利亚 00359</li>
                                                                    <li class="li_cont" data-country="白俄罗斯" data-zone="00375" data-id="112">白俄罗斯 00375</li>
                                                                    <li class="li_cont" data-country="伯利兹" data-zone="00501" data-id="122">伯利兹 00501</li>
                                                                    <li class="li_cont" data-country="巴拿马" data-zone="00507" data-id="128">巴拿马 00507</li>
                                                                    <li class="li_cont" data-country="玻利维亚" data-zone="00591" data-id="130">玻利维亚 00591</li>
                                                                    <li class="li_cont" data-country="巴拉圭" data-zone="00595" data-id="134">巴拉圭 00595</li>
                                                                    <li class="li_cont" data-country="巴布亚新几内亚" data-zone="00675" data-id="141">巴布亚新几内亚 00675</li>
                                                                    <li class="li_cont" data-country="巴林" data-zone="00973" data-id="167">巴林 00973</li>
                                                                    <li class="li_cont" data-country="巴哈马" data-zone="001242" data-id="175">巴哈马 001242</li>
                                                                    <li class="li_cont" data-country="巴巴多斯" data-zone="001246" data-id="176">巴巴多斯 001246</li>
                                                                    <li class="li_cont" data-country="百慕大群岛" data-zone="001441" data-id="180">百慕大群岛 001441</li>
                                                                    <li class="li_cont" data-country="波多黎各" data-zone="001787" data-id="186">波多黎各 001787</li></ul>
                                                                <ul class="ul_tabcont" style="display:none"></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="丹麦" data-zone="0045" data-id="17">丹麦 0045</li>
                                                                    <li class="li_cont" data-country="德国" data-zone="0049" data-id="21">德国 0049</li>
                                                                    <li class="li_cont" data-country="多哥" data-zone="00228" data-id="59">多哥 00228</li>
                                                                    <li class="li_cont" data-country="多米尼加共和国" data-zone="001890" data-id="190">多米尼加共和国 001890</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="俄罗斯" data-zone="007" data-id="3">俄罗斯 007</li>
                                                                    <li class="li_cont" data-country="厄瓜多尔" data-zone="00593" data-id="132">厄瓜多尔 00593</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="法国" data-zone="0033" data-id="9">法国 0033</li>
                                                                    <li class="li_cont" data-country="菲律宾" data-zone="0063" data-id="33">菲律宾 0063</li>
                                                                    <li class="li_cont" data-country="芬兰" data-zone="00358" data-id="105">芬兰 00358</li>
                                                                    <li class="li_cont" data-country="法属圭亚那" data-zone="00594" data-id="133">法属圭亚那 00594</li>
                                                                    <li class="li_cont" data-country="斐济" data-zone="00679" data-id="144">斐济 00679</li>
                                                                    <li class="li_cont" data-country="法属玻利尼西亚" data-zone="00689" data-id="148">法属玻利尼西亚 00689</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="古巴" data-zone="0053" data-id="24">古巴 0053</li>
                                                                    <li class="li_cont" data-country="哥伦比亚" data-zone="0057" data-id="28">哥伦比亚 0057</li>
                                                                    <li class="li_cont" data-country="冈比亚" data-zone="00220" data-id="52">冈比亚 00220</li>
                                                                    <li class="li_cont" data-country="刚果" data-zone="00242" data-id="72">刚果 00242</li>
                                                                    <li class="li_cont" data-country="哥斯达黎加" data-zone="00506" data-id="127">哥斯达黎加 00506</li>
                                                                    <li class="li_cont" data-country="圭亚那" data-zone="00592" data-id="131">圭亚那 00592</li>
                                                                    <li class="li_cont" data-country="格鲁吉亚" data-zone="00995" data-id="174">格鲁吉亚 00995</li>
                                                                    <li class="li_cont" data-country="关岛" data-zone="001671" data-id="183">关岛 001671</li>
                                                                    <li class="li_cont" data-country="格林纳达" data-zone="001809" data-id="187">格林纳达 001809</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="荷兰" data-zone="0031" data-id="7">荷兰 0031</li>
                                                                    <li class="li_cont" data-country="韩国" data-zone="0082" data-id="38">韩国 0082</li>
                                                                    <li class="li_cont" data-country="哈萨克斯坦" data-zone="00327" data-id="95">哈萨克斯坦 00327</li>
                                                                    <li class="li_cont" data-country="洪都拉斯" data-zone="00504" data-id="125">洪都拉斯 00504</li>
                                                                    <li class="li_cont" data-country="海地" data-zone="00509" data-id="129">海地 00509</li></ul>
                                                                <ul class="ul_tabcont" style="display:none"></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="加拿大" data-zone="001" data-id="1">加拿大 001</li>
                                                                    <li class="li_cont" data-country="几内亚" data-zone="00224" data-id="55">几内亚 00224</li>
                                                                    <li class="li_cont" data-country="加纳" data-zone="00233" data-id="64">加纳 00233</li>
                                                                    <li class="li_cont" data-country="加蓬" data-zone="00241" data-id="71">加蓬 00241</li>
                                                                    <li class="li_cont" data-country="吉布提" data-zone="00253" data-id="80">吉布提 00253</li>
                                                                    <li class="li_cont" data-country="津巴布韦" data-zone="00263" data-id="89">津巴布韦 00263</li>
                                                                    <li class="li_cont" data-country="吉尔吉斯坦" data-zone="00331" data-id="96">吉尔吉斯坦 00331</li>
                                                                    <li class="li_cont" data-country="捷克" data-zone="00420" data-id="119">捷克 00420</li>
                                                                    <li class="li_cont" data-country="柬埔寨" data-zone="00855" data-id="152">柬埔寨 00855</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="科特迪瓦" data-zone="00225" data-id="56">科特迪瓦 00225</li>
                                                                    <li class="li_cont" data-country="喀麦隆" data-zone="00237" data-id="69">喀麦隆 00237</li>
                                                                    <li class="li_cont" data-country="肯尼亚" data-zone="00254" data-id="81">肯尼亚 00254</li>
                                                                    <li class="li_cont" data-country="库克群岛" data-zone="00682" data-id="145">库克群岛 00682</li>
                                                                    <li class="li_cont" data-country="科威特" data-zone="00965" data-id="161">科威特 00965</li>
                                                                    <li class="li_cont" data-country="卡塔尔" data-zone="00974" data-id="168">卡塔尔 00974</li>
                                                                    <li class="li_cont" data-country="开曼群岛" data-zone="001345" data-id="179">开曼群岛 001345</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="罗马尼亚" data-zone="0040" data-id="13">罗马尼亚 0040</li>
                                                                    <li class="li_cont" data-country="利比亚" data-zone="00218" data-id="51">利比亚 00218</li>
                                                                    <li class="li_cont" data-country="利比里亚" data-zone="00231" data-id="62">利比里亚 00231</li>
                                                                    <li class="li_cont" data-country="留尼旺" data-zone="00262" data-id="88">留尼旺 00262</li>
                                                                    <li class="li_cont" data-country="莱索托" data-zone="00266" data-id="92">莱索托 00266</li>
                                                                    <li class="li_cont" data-country="卢森堡" data-zone="00352" data-id="99">卢森堡 00352</li>
                                                                    <li class="li_cont" data-country="立陶宛" data-zone="00370" data-id="107">立陶宛 00370</li>
                                                                    <li class="li_cont" data-country="拉脱维亚" data-zone="00371" data-id="108">拉脱维亚 00371</li>
                                                                    <li class="li_cont" data-country="列支敦士登" data-zone="00423" data-id="121">列支敦士登 00423</li>
                                                                    <li class="li_cont" data-country="老挝" data-zone="00856" data-id="153">老挝 00856</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="美国" data-zone="001" data-id="2">美国 001</li>
                                                                    <li class="li_cont" data-country="墨西哥" data-zone="0052" data-id="23">墨西哥 0052</li>
                                                                    <li class="li_cont" data-country="马来西亚" data-zone="0060" data-id="30">马来西亚 0060</li>
                                                                    <li class="li_cont" data-country="摩洛哥" data-zone="00212" data-id="48">摩洛哥 00212</li>
                                                                    <li class="li_cont" data-country="马里" data-zone="00223" data-id="54">马里 00223</li>
                                                                    <li class="li_cont" data-country="毛里求斯" data-zone="00230" data-id="61">毛里求斯 00230</li>
                                                                    <li class="li_cont" data-country="莫桑比克" data-zone="00258" data-id="85">莫桑比克 00258</li>
                                                                    <li class="li_cont" data-country="马达加斯加" data-zone="00261" data-id="87">马达加斯加 00261</li>
                                                                    <li class="li_cont" data-country="马拉维" data-zone="00265" data-id="91">马拉维 00265</li>
                                                                    <li class="li_cont" data-country="马耳他" data-zone="00356" data-id="103">马耳他 00356</li>
                                                                    <li class="li_cont" data-country="摩尔多瓦" data-zone="00373" data-id="110">摩尔多瓦 00373</li>
                                                                    <li class="li_cont" data-country="摩纳哥" data-zone="00377" data-id="114">摩纳哥 00377</li>
                                                                    <li class="li_cont" data-country="马提尼克" data-zone="00596" data-id="135">马提尼克 00596</li>
                                                                    <li class="li_cont" data-country="孟加拉国" data-zone="00880" data-id="154">孟加拉国 00880</li>
                                                                    <li class="li_cont" data-country="马尔代夫" data-zone="00960" data-id="156">马尔代夫 00960</li>
                                                                    <li class="li_cont" data-country="蒙古" data-zone="00976" data-id="169">蒙古 00976</li>
                                                                    <li class="li_cont" data-country="蒙特塞拉特岛" data-zone="001664" data-id="181">蒙特塞拉特岛 001664</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="南非" data-zone="0027" data-id="5">南非 0027</li>
                                                                    <li class="li_cont" data-country="挪威" data-zone="0047" data-id="19">挪威 0047</li>
                                                                    <li class="li_cont" data-country="尼日尔" data-zone="00227" data-id="58">尼日尔 00227</li>
                                                                    <li class="li_cont" data-country="尼日利亚" data-zone="00234" data-id="66">尼日利亚 00234</li>
                                                                    <li class="li_cont" data-country="纳米比亚" data-zone="00264" data-id="90">纳米比亚 00264</li>
                                                                    <li class="li_cont" data-country="尼加拉瓜" data-zone="00505" data-id="126">尼加拉瓜 00505</li>
                                                                    <li class="li_cont" data-country="黎巴嫩" data-zone="00961" data-id="157">黎巴嫩 00961</li>
                                                                    <li class="li_cont" data-country="尼泊尔" data-zone="00977" data-id="170">尼泊尔 00977</li></ul>
                                                                <ul class="ul_tabcont" style="display:none"></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="葡萄牙" data-zone="00351" data-id="98">葡萄牙 00351</li></ul>
                                                                <ul class="ul_tabcont" style="display:none"></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="瑞士" data-zone="0041" data-id="14">瑞士 0041</li>
                                                                    <li class="li_cont" data-country="瑞典" data-zone="0046" data-id="18">瑞典 0046</li>
                                                                    <li class="li_cont" data-country="日本" data-zone="0081" data-id="37">日本 0081</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="斯里兰卡" data-zone="0094" data-id="45">斯里兰卡 0094</li>
                                                                    <li class="li_cont" data-country="塞内加尔" data-zone="00221" data-id="53">塞内加尔 00221</li>
                                                                    <li class="li_cont" data-country="塞拉利昂" data-zone="00232" data-id="63">塞拉利昂 00232</li>
                                                                    <li class="li_cont" data-country="圣多美和普林西比" data-zone="00239" data-id="70">圣多美和普林西比 00239</li>
                                                                    <li class="li_cont" data-country="塞舌尔" data-zone="00248" data-id="76">塞舌尔 00248</li>
                                                                    <li class="li_cont" data-country="苏丹" data-zone="00249" data-id="77">苏丹 00249</li>
                                                                    <li class="li_cont" data-country="索马里" data-zone="00252" data-id="79">索马里 00252</li>
                                                                    <li class="li_cont" data-country="塞浦路斯" data-zone="00357" data-id="104">塞浦路斯 00357</li>
                                                                    <li class="li_cont" data-country="斯洛文尼亚" data-zone="00386" data-id="118">斯洛文尼亚 00386</li>
                                                                    <li class="li_cont" data-country="斯洛伐克" data-zone="00421" data-id="120">斯洛伐克 00421</li>
                                                                    <li class="li_cont" data-country="萨尔瓦多" data-zone="00503" data-id="124">萨尔瓦多 00503</li>
                                                                    <li class="li_cont" data-country="苏里南" data-zone="00597" data-id="136">苏里南 00597</li>
                                                                    <li class="li_cont" data-country="所罗门群岛" data-zone="00677" data-id="143">所罗门群岛 00677</li>
                                                                    <li class="li_cont" data-country="沙特阿拉伯" data-zone="00966" data-id="162">沙特阿拉伯 00966</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="泰国" data-zone="0066" data-id="36">泰国 0066</li>
                                                                    <li class="li_cont" data-country="土耳其" data-zone="0090" data-id="41">土耳其 0090</li>
                                                                    <li class="li_cont" data-country="突尼斯" data-zone="00216" data-id="50">突尼斯 00216</li>
                                                                    <li class="li_cont" data-country="坦桑尼亚" data-zone="00255" data-id="82">坦桑尼亚 00255</li>
                                                                    <li class="li_cont" data-country="汤加" data-zone="00676" data-id="142">汤加 00676</li>
                                                                    <li class="li_cont" data-country="台湾省" data-zone="00886" data-id="155">台湾省 00886</li>
                                                                    <li class="li_cont" data-country="塔吉克斯坦" data-zone="00992" data-id="171">塔吉克斯坦 00992</li>
                                                                    <li class="li_cont" data-country="土库曼斯坦" data-zone="00993" data-id="172">土库曼斯坦 00993</li>
                                                                    <li class="li_cont" data-country="特立尼达和多巴哥" data-zone="001809" data-id="188">特立尼达和多巴哥 001809</li></ul>
                                                                <ul class="ul_tabcont" style="display:none"></ul>
                                                                <ul class="ul_tabcont" style="display:none"></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="委内瑞拉" data-zone="0058" data-id="29">委内瑞拉 0058</li>
                                                                    <li class="li_cont" data-country="乌兹别克斯坦" data-zone="00998" data-id="65">乌兹别克斯坦 00998</li>
                                                                    <li class="li_cont" data-country="乌干达" data-zone="00256" data-id="83">乌干达 00256</li>
                                                                    <li class="li_cont" data-country="乌克兰" data-zone="00380" data-id="116">乌克兰 00380</li>
                                                                    <li class="li_cont" data-country="危地马拉" data-zone="00502" data-id="123">危地马拉 00502</li>
                                                                    <li class="li_cont" data-country="乌拉圭" data-zone="00598" data-id="137">乌拉圭 00598</li>
                                                                    <li class="li_cont" data-country="文莱" data-zone="00673" data-id="139">文莱 00673</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="希腊" data-zone="0030" data-id="6">希腊 0030</li>
                                                                    <li class="li_cont" data-country="西班牙" data-zone="0034" data-id="10">西班牙 0034</li>
                                                                    <li class="li_cont" data-country="匈牙利" data-zone="0036" data-id="11">匈牙利 0036</li>
                                                                    <li class="li_cont" data-country="新西兰" data-zone="0064" data-id="34">新西兰 0064</li>
                                                                    <li class="li_cont" data-country="新加坡" data-zone="0065" data-id="35">新加坡 0065</li>
                                                                    <li class="li_cont" data-country="香港" data-zone="00852" data-id="150">香港 00852</li>
                                                                    <li class="li_cont" data-country="叙利亚" data-zone="00963" data-id="159">叙利亚 00963</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="意大利" data-zone="0039" data-id="12">意大利 0039</li>
                                                                    <li class="li_cont" data-country="英国" data-zone="0044" data-id="16">英国 0044</li>
                                                                    <li class="li_cont" data-country="印度尼西亚" data-zone="0062" data-id="32">印度尼西亚 0062</li>
                                                                    <li class="li_cont" data-country="越南" data-zone="0084" data-id="39">越南 0084</li>
                                                                    <li class="li_cont" data-country="印度" data-zone="0091" data-id="42">印度 0091</li>
                                                                    <li class="li_cont" data-country="伊朗" data-zone="0098" data-id="47">伊朗 0098</li>
                                                                    <li class="li_cont" data-country="亚美尼亚" data-zone="00374" data-id="111">亚美尼亚 00374</li>
                                                                    <li class="li_cont" data-country="约旦" data-zone="00962" data-id="158">约旦 00962</li>
                                                                    <li class="li_cont" data-country="伊拉克" data-zone="00964" data-id="160">伊拉克 00964</li>
                                                                    <li class="li_cont" data-country="也门" data-zone="00967" data-id="163">也门 00967</li>
                                                                    <li class="li_cont" data-country="以色列" data-zone="00972" data-id="166">以色列 00972</li>
                                                                    <li class="li_cont" data-country="牙买加" data-zone="001876" data-id="189">牙买加 001876</li></ul>
                                                                <ul class="ul_tabcont" style="display:none">
                                                                    <li class="li_cont" data-country="智利" data-zone="0056" data-id="27">智利 0056</li>
                                                                    <li class="li_cont" data-country="中国" data-zone="0086" data-id="40">中国 0086</li>
                                                                    <li class="li_cont" data-country="乍得" data-zone="00235" data-id="67">乍得 00235</li>
                                                                    <li class="li_cont" data-country="中非共和国" data-zone="00236" data-id="68">中非共和国 00236</li>
                                                                    <li class="li_cont" data-country="赞比亚" data-zone="00260" data-id="86">赞比亚 00260</li>
                                                                    <li class="li_cont" data-country="直布罗陀" data-zone="00350" data-id="97">直布罗陀 00350</li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input_div input_div_right">
                                                        <input id="telNum" maxlength="11" type="text" autocomplete="off" tabindex="1" name="username" class="txt txt-m txt-focus cgrey2 tel" placeholder="手机号码"></div>
                                                </td>
                                            </tr>
                                            <tr id="line_9" class="line_9" style="display: none">
                                                <td>
                                                    <div class="input_div">
                                                        <input type="text" maxlength="4" style="ime-mode:disabled;" class="txt txt-m" tabindex="2" name="identify_code" id="identify" placeholder="验证码">
                                                        <div class="identify_box">
                                                            <img class="loadingImg" src="/style/home/login/loading1.gif" style="display: none;" width="24" height="24">
                                                            <a onclick="return false;" title="如验证码无法辨别，点击即可刷新。" href="javascript:void(0);">
                                                                <img style="" alt="如验证码无法辨别，点击即可刷新。" class="identify_img" src="/style/home/login/1543835151331.jpg" width="80" height="24" align="absmiddle"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="line_10" class="line_10">
                                                <td>
                                                    <div class="input_div">
                                                        <input type="text" class="txt txt-s tel" tabindex="3" autocomplete="off"  maxlength="6" placeholder="动态密码">
                                                        <a href="javascript:;" class="code-len get-code">获取动态密码</a>
                                                        <a href="javascript:;" class="code-len send-code">
                                                            <span>60</span>秒后重新发送</a>
                                                        <a href="javascript:;" class="code-len send-code-again">重新发送</a></div>
                                                </td>
                                            </tr>
                                            <tr class="line_4">
                                                <td class="cgrey2 line2">
                                                    <label style="vertical-align:middle;float:left">
                                                        <input type="checkbox" class="remember_me" tabindex="4" name="remember_me" id="rememberme2" value="1" style="vertical-align:middle;">&nbsp;两周内自动登录</label>
                                                    <a class="search_psw" href="javascript:void(0)" id="goAccount">
                                                        <img class="switchTab" src="/style/home/login/account.png" style="">账户登录</a></td>
                                            </tr>
                                            <tr>
                                                <td class="line2">
                                                    <input type="button" class="sub" tabindex="5" onclick="" name="submit_login" value="登录"></td>
                                            </tr>
                                            <tr>
                                                <td class="cgrey2 line2">
                                                    <a href="https://passport.tuniu.com/forget/choosenType" style="float:left;" target="_self">忘记密码</a>
                                                    <a href="https://passport.tuniu.com/register" class="reg_btn">新用户送礼，
                                                        <span class="reg_type">立即注册 &gt;</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- 动态密码登录 form end --></div>
                        <div class="partner-login">
                            <div class="partner-title">其它方式登录</div>
                            <div id="weixin" class="partner-box partner-weixin">
                                <img src="/style/home/login/weixinv2.png">
                                <span>微信</span></div>
                            <a href="https://passport.tuniu.com/login/partner/tencent">
                                <div class="partner-box partner-qq">
                                    <img src="/style/home/login/qqv2.png">
                                    <span>QQ</span></div>
                            </a>
                            <a href="https://passport.tuniu.com/login/partner/sina">
                                <div class="partner-box partner-weibo">
                                    <img src="/style/home/login/weibov2.png">
                                    <span>微博</span></div>
                            </a>
                            <div class="partner-box partner-card partner-last">
                                <img src="/style/home/login/cardv2.png">
                                <span>合作卡</span></div>
                        </div>
                    </div>
                </div>
                <!--合作卡弹出层start-->
                <div id="login-card-wrap" class="login-pop-wrap login-card-wrap">
                    <div class="login-box-inner">
                        <ul class="login-tab" id="card-login">
                            <li id="login-tab-card" class="cur">合作卡登录
                                <b></b>
                            </li>
                        </ul>
                        <form action="/login/post" method="post" id="loginMemship" onsubmit="return false;">
                            <input type="hidden" name="login_type" value="P-C">
                            <div class="login-tab-content">
                                <table class="login-table card-table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0)" id="J-card-help" class="card-help">如何添加合作卡？</a></td>
                                        </tr>
                                        <tr>
                                            <td class="login-tip">
                                                <div id="login_error2" class="error login_error" style="display: none ;"></div>
                                            </td>
                                        </tr>
                                        <tr id="line_5" class="line_5">
                                            <td>
                                                <div class="input_div">
                                                    <input type="text" autocomplete="off" tabindex="1" name="username" class="txt txt-m txt-focus cgrey2" style="font-size:13px;" placeholder="会籍卡号"></div>
                                            </td>
                                        </tr>
                                        <tr id="line_6" class="line_6">
                                            <td>
                                                <div class="input_div">
                                                    <input type="password" placeholder="密码"  tabindex="2" ></div>
                                            </td>
                                        </tr>
                                        <tr class="line_4">
                                            <td class="cgrey2 line2">
                                                <label style="vertical-align:middle float:left;">
                                                    <input type="checkbox" class="remember_me" tabindex="4" name="remember_me" id="rememberme2" value="1" style="vertical-align:middle">&nbsp;两周内自动登录</label>
                                                <a class="search_psw" href="javascript:void(0)" id="cardToAccont">
                                                    <img class="switchTab" src="/style/home/login/account.png" style="">返回账户登录</a></td>
                                        </tr>
                                        <tr>
                                            <td class="line2">
                                                <input type="button" class="sub" tabindex="5" onclick="" name="submit_login" value="登录"></td>
                                        </tr>
                                        <tr>
                                            <td class="cgrey2 line2">
                                                <a href="https://passport.tuniu.com/forget/choosenType" style="float:left;" target="_self">忘记密码</a>
                                                <a href="https://passport.tuniu.com/register" class="reg_btn">新用户送礼，
                                                    <span class="reg_type">立即注册 &gt;</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="partner-login">
                            <div class="partner-title">其它方式登录</div>
                            <div id="weixin" class="partner-box partner-weixin">
                                <img src="/style/home/login/weixinv2.png" style="">
                                <span>微信</span></div>
                            <a href="https://passport.tuniu.com/login/partner/tencent">
                                <div class="partner-box partner-qq">
                                    <img src="/style/home/login/qqv2.png" style="">
                                    <span>QQ</span></div>
                            </a>
                            <a href="https://passport.tuniu.com/login/partner/sina">
                                <div class="partner-box partner-weibo partner-last">
                                    <img src="/style/home/login/weibov2.png" style="">
                                    <span>微博</span></div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="change-btn wx-change-btn"></div> --></div>
                <!--合作卡弹出层end-->
                <!-- start 合作卡添加流程 -->
                <div class="df_hezuokahelp_bg">
                    <div class="hezuokahelp_bg"></div>
                    <div class="d_hezuokahelp">
                        <img class="img_niutou" src="/style/home/login/niu.png" style="">
                        <div class="d_helpclose"></div>
                        <img class="helpimg_liucheng" src="/style/home/login/progress.png" style="">
                        <table class="help_table">
                            <tbody>
                                <tr>
                                    <td>登录账户，点击首页左上方
                                        <br>“账户管理”</td>
                                    <td>进入我的途牛会员首页
                                        <br>在左侧导航栏底部点击“我的合作卡”</td>
                                    <td>在合作卡页面点击添加
                                        <br>合作卡</td></tr>
                            </tbody>
                        </table>
                        <a class="abtn_helpiknow"></a>
                    </div>
                </div>
                <!-- end 合作卡添加流程 -->
                <!-- start app下载弹窗 -->
                <div class="app-mask hidden"></div>
                <div class="app-bgm hidden">
                    <div class="app-content">
                        <div class="app-title">
                            <span class="">下载</span>
                            <img class="app-close" src="/style/home/login/close.png" style=""></div>
                        <div class="app-tips">扫码下载途牛APP，立享
                            <span class="reg_type">超多优惠！</span></div>
                        <div class="app-img">
                            <img src="/style/home/login/app_niu.png" style="">
                            <img src="/style/home/login/app_down.png" style=""></div>
                    </div>
                </div>
                <!-- end app下载弹窗 -->
                <script type="text/javascript" src="/style/home/login/jquery-1.js"></script>
                <script type="text/javascript" src="/style/home/login/layer.js"></script>
                <script type="text/javascript" src="/style/home/login/zonesGroup.js"></script>
                <script type="text/ecmascript" src="/style/home/login/md5.js"></script>
                <script type="text/javascript" src="/style/home/login/frms-fingerprint.js"></script>
                <script type="text/javascript" src="/style/home/login/login_checkV2.js"></script>
                <script type="text/javascript">$(function() {
                        //判断fab是否崩溃
                        var isCrash = 0;
                        if (isCrash) {
                            ShowCrash();
                        }
                        function ShowCrash() {
                            $("body").append('<div class="TipBoxHackBot">' + '<div class="BackHack"></div>' + '<div class="TipBox">' + '<img class="imgTipBox" src="/assets/images/tipbox.png">' + '</div>' + '</div>');
                            $("body .TipBoxHackBot").fadeIn();
                            $("body .TipBoxHackBot .TipBox").animate({
                                marginTop: '-324px'
                            },
                            500);
                        }

                        $("body").delegate("div.BackHack", "click",
                        function() {
                            $("div.TipBoxHackBot").fadeOut(200);
                            window.setTimeout(function() {
                                $("div.TipBoxHackBot").remove();
                            },
                            200);
                        });

                        $("#codeToNormal").bind("click",
                        function() {
                            $("#login-code-wrap").hide();
                            $("#login-content").show();
                        });
                        $("#login-code-wrap .login-card-close").click(function() {
                            $("#codeToNormal").trigger("click");
                        });
                        $("#normalToCode").click(function() {
                            $("#login-code-wrap").show();
                            $("#login-content").hide();
                            changeCodeImg();
                            checkLogin();
                        });

                        //微信扫码登录
                        var url = 'https://open.weixin.qq.com/connect/qrconnect?appid=wxd22498dfe03aa2f5&redirect_uri=' + 'http://passport.tuniu.com/partner/weixin&response_type=code&scope=snsapi_login&state=3d6be0a4035d839573b04816624a415e#wechat_redirect';
                        //url ='http://passport.tuniu.com/partner/weixin';
                        $("#weixin").live("click",
                        function() {
                            window.open(url, '微信登录', 'left=500,top=300,height=550,width=700')
                        })
                    });</script>
                <script src="/style/home/login/fta.js"></script>
                <script type="text/javascript" src="/style/home/login/ga.js"></script>
                <script>window.FTA && window.FTA("", "会员中心:passport:登录", "", "/会员中心/passport/登录");</script></div>
        </div>
        <script type="text/javascript">$.ajax({
                url: '/ajax/getCmsImg',
                success: function(res) {
                    var arr
                    try {
                        arr = eval("(" + res + ")");
                    } catch(e) {
                        arr = [["http://1.tuniu.com/", "https://ssl1.tuniucdn.com/u/mainpic/hycenter/2015/1yuan_1.jpg"], ["http://www.tuniu.com/zt/sfcf/", "https://img3.tuniucdn.com/site/m2015/images/member/events/sfcf.jpg"], ["http://temai.tuniu.com/", "https://m.tuniucdn.com/fb2/t1/G2/M00/3F/56/Cii-T1e0DPqIFEsNAASX4HCmiwgAABUAgBhf_EABJf447.jpeg"], ["http://www.tuniu.com/tucom/", "https://m.tuniucdn.com/fb2/t1/G2/M00/3F/53/Cii-Tle0C4qIIG-HAALyJxscqtYAABT-wMCqQwAAvI_73.jpeg"], ["http://www.tuniu.com/niuren/", "https://ssl2.tuniucdn.com/u/mainpic/hycenter/2015/niupinzhi.jpg"]];
                    }
                    $flag = parseInt(Math.random() * arr.length, 10);

                    $('#loginWrap').css("background-image", "url(" + arr[$flag][1] + ")");
                    $('#bg_img').attr('href', arr[$flag][0]);
                }
            });</script>
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
        <script type="text/javascript" src="/style/home/login/in-min.js"></script>
        <script type="text/javascript">$("#TN-faq").hide();
            $(".offer_service").hide();

            var content = "PC:会员:登录";
            //ga数据准备
            var _gaq = _gaq || [];
           
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
                tuniuTracker.setPageName("PC:会员:登录");
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
        <!--start foot-->
        <div id="TN-footer">
            <p id="TN-24">24小时客户服务电话(免长途费)：4007-999-999 途牛呼叫中心位于南京来电将统一显示为 025-86859999</p>
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
                <a rel="nofollow" href="http://www.tuniu.com/help/" target="_blank" onclick="tuniuRecorder.push('33_1_2_1_2_4')">帮助中心</a></p>
            <!-- #TN-links -->
            <p id="copyright">Copyright © 2006-2014
                <a rel="nofollow" href="http://www.tuniu.com/" onclick="tuniuRecorder.push('33_1_5_1_1_1')">途牛旅游网</a>
                <a rel="nofollow" href="http://www.tuniu.com/" onclick="tuniuRecorder.push('33_1_5_1_1_2')">Tuniu.com</a>|
                <a target="_blank" href="http://www.tuniu.com/corp/company.shtml" rel="nofollow" onclick="tuniuRecorder.push('33_1_5_1_1_3')">营业执照</a>|
                <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow" onclick="tuniuRecorder.push('33_1_5_1_1_4')">ICP证：苏B2-20130006</a>&nbsp;&nbsp;
                <a target="_blank" href="http://www.tuniu.com/" onclick="tuniuRecorder.push('33_1_5_1_1_5')">上海旅游网</a></p>
        </div>
        <!--end foot-->
        <!-- common footer end -->
        <!-- pop start -->
        <div id="card-box" class="card-box hidden">
            <div id="card-box-inner">
                <a href="javascript:void(0);" id="card-close">x</a>
                <table id="card-table">
                    <tbody>
                        <tr>
                            <td>请选择合作商家:</td></tr>
                        <tr>
                            <td>
                                <select id="sel_membcard_name" name="membcard_name" onchange="change_card_tpl();">
                                    <option selected="selected">请选择合作卡类型</option>
                                    <option>建行途牛联名信用卡</option>
                                    <option>中信途牛联名信用卡（2016.6.3之前发卡）</option>
                                    <option>江苏银行途牛联名信用卡</option>
                                    <option>建行途牛龙卡借记卡普卡</option>
                                    <option>建行途牛龙卡借记卡白金卡</option>
                                    <option>中信途牛联名信用卡（银联金卡，2016.6.3之后发卡）</option>
                                    <option>中信途牛联名信用卡（银联白金卡，2016.6.3之后发卡）</option>
                                    <option>中信VISA途牛联名卡经典版</option>
                                    <option>中信VISA途牛联名卡中美旅游限量版</option>
                                    <option>工银途牛牛人信用卡金卡</option>
                                    <option>工银途牛牛人信用卡普卡</option>
                                    <option>工银途牛牛人信用卡白金卡</option>
                                    <option>中行途牛白金联名借记卡</option>
                                    <option>中行途牛联名卡借记卡普卡</option>
                                    <option>途牛龙卡金卡</option>
                                    <option>途牛龙卡白金卡</option></select>
                            </td>
                        </tr>
                        <tr>
                            <td id="card_id">请输入您的会籍卡号:</td></tr>
                        <tr>
                            <td>
                                <input type="text" id="txt_membcard_id" name="membcard_id" class="txt txt-mm"></td>
                        </tr>
                        <tr>
                            <td class="cdyellow f13">
                                <div id="errmsg" name="errmsg"></div>
                            </td>
                        </tr>
                        <tr>
                            <td id="register">
                                <input type="image" src="/style/home/login/next.png" onclick="active_membcard();"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- #card box -->
        <!-- pop end -->
        <div style="visibility: hidden; position: absolute;" id="userdata_el"></div>
    </body>

</html>