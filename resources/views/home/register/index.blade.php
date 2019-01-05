<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <title>会员注册 - 途牛旅游网</title> 
  <meta name="description" content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网" /> 
  <meta name="keywords" content="会员注册" /> 
  <link rel="stylesheet" href="/style/home/register/register.css" charset="utf-8" /> 
    <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
  <link type="text/css" rel="stylesheet" href="/style/home/register/layer.css" id="skinlayercss" /> 
  <link rel="stylesheet" type="text/css" href="/style/admin/assets/css/bootstrap.min.css">
<!-- <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/style/admin/css/style.css"/>       
<link href="/style/admin/assets/css/codemirror.css" rel="stylesheet"> -->

  <script type="text/javascript" src="/style/home/register/ga.js" async="" charset="utf-8"></script> 
  <script type="text/javascript" src="/style/home/register/lazyloadnew.js" async="" charset="utf-8"></script> 
 </head> 
 <body id="index1200" class="index1200"> 
  <!-- user head start --> 
  <div class="head_bg"> 
   <div class="header"> 
    <div class="logo clearfix"> 
     <div class="logocon"> 
      <a href="http://www.tuniu.com/"> <img alt="途牛旅游网" title="途牛旅游网" src="/style/home/register/logv2.png" /></a> 
     </div> 
     <p class="head_tip">欢迎注册</p> 
     <noscript> 
      <h1 class="head_notice_tips">您的浏览器禁用了javascript脚本，导致登录功能无法使用，请您先开启以后再使用登录功能。</h1>
     </noscript> 
     <p class="head_notice_tips" style="display: none;">您的浏览器禁用了cookie，开启Cookie之后才能注册， <a href="javascript:void(0)" id="howEnableCookie" style="color:rgb(3, 189, 252);">如何开启?</a></p> 
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
    <div class="main_top_r">
     已有途牛账号了？ 
     <a rel="nofollow" target="_self" href="/userlogin">登录</a>
    </div> 
   </div> 
   <style type="text/css">.zones_tabcont ul.ul_tabcont li { width:135px }</style> 
   <div id="user-reg" class="user-reg"> 
    <div id="bg_div" class="bg_div" style="display:none;"></div> 
    <div id="reg-field"> 
     <div class="a_title title_oneStep clearfix"> 
      <a class="page_phone page_cur" href="javascript:void(0);" style="width:100%"> <span>手机注册</span> <span class="poptip-arrow poptip-arrow-top">▼</span></a> 
      <!-- <a class="page_email" id="email_regist" href="/register/email">
        <span>邮箱注册</span>
        <span class="poptip-arrow poptip-arrow-top">▼</span>
      </a>  -->
     </div> 
     <div id="reg-wrap" class="reg-wrap"> 
      <div id="mainPart" class="mainPart clearfix"> 
          <!-- 验证消息 -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <div class="mws-form-message error">
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
        <script>
        setTimeout(function(){
            $('.alert-danger').hide();
        },2000);
        </script>
        @endif
      <!--手机注册第一步开始-->   
       <form method="post" action="/reg_two" id="reg"> 
        {{csrf_field()}}
        <div class="main_item"> 
          <div class="step step1"></div> 
          <ul class="input-list mainCon"> 
              <!-- added by lvsijiang 2013-10-30 pass_verify通过手机验证的提示框 start --> 
              <!-- added by lvsijiang 2013-10-30 通过手机验证的提示框 end --> 
              <li> 
                  <div class="input" style="width: 800px"> 
                    <label class="required_input">手机号码：</label>  
                    <input value="" type="text" tabindex="1" name="phone" id="phone" maxlength="11"  class="txt-m " autocomplete="off" placeholder="请输入手机号码" value="{{old('phone')}}"/>
                    <span id="judge"></span>
                  </div>
              </li> 
              <!-- 验证码 --> 
              <li class="identify_box"> 
                <div class="input" style="width: 800px"> 
                  <label class="required_input">验证码：</label> 
                  <span class="txt-m identify_con"> 
                    <input type="text" class="identify_code txt_grey" id="yzm" name="yzm" placeholder="不区分大小写" maxlength="5" tabindex="2" value="{{old('yzm')}}" style="height: 20px;width: 180px" /> 
                    <img style="cursor: pointer;" alt="如验证码无法辨别，点击即可刷新。" id="identify_img" src="/system/code" onclick="this.src='{{url('/system/code')}}?'+Math.random()" width="85" height="30" />
                  </span>
                  <span id="judge1"></span> 
                </div>    
              </li>  
              <li class="verify-box2_2">
                <div class="input" style="width: 800px">
                  <label class="required_input">校验码：</label>
                  <input type="text" class="txt-m txt_grey" id="code" placeholder="请输入校验码" name="code" maxlength="6" tabindex="3" value="{{old('code')}}">
                  <div class="phone_code_div" style="line-height: 30px;padding: 0px;margin-top: 6px;text-align: center;">
                    <a href="javascript:void(0)" class="btn btn-success" id="p_code">获取验证码</a>
                  </div>
                  <span id="judge2"></span> 
                </div>
                  <div class="input-tip wd155" id="codeTip" style="display:none;">
                  <div class="input-tip-inner">
                  <span></span>
                  </div>
                </div>
                
              </li> 
          </ul> 

          <div class="reg-check"> 
              <input type="submit" value="下一步" tabindex="9" class="login_btn login_btn_gray register_btn" >
          </div> 
        </div>   
       </form> 
       <!--手机注册第一步结束--> 
       </div> 
      </div> 
     </div> 
    </div> 
   
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
 <script> 
  // 初始化信息
    var PHONE = false;
    var YZM = false;
    var CODE = false;

    // 手机验证
    $("input[name='phone']").blur(function(){
      var p = $(this).val();
      if(!(/^1[34578]\d{9}$/.test(p))){ 
          $('#judge').html("手机号码有误，请重填").css('color','red');
          PHONE = false; 
      }else{
          //判断手机号码是否重复
          $.get("/checkphone",{'p':p},function(data){
          // alert(data);
          if(data==1){
            //手机号码已经注册
            $('#judge').html("手机号码已注册").css('color','red');
            //把获取校验码按钮 设置禁用
            $("#p_code").attr('disabled',true);
            PHONE = false;
          }else{
            //手机号码可以使用
            $('#judge').html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
            //把获取校验码按钮 设置激活
            $("#p_code").attr('disabled',false);
            PHONE = true;
          }
        });
      }
    })

    // 验证码验证
    $("input[name='yzm']").blur(function(){
      var yzm = $(this).val();
      $.get('/system/recode',{'param':yzm},function(data){
          // console.log(data);
          if(data == 1){
            $('#judge1').html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
            YZM = true 
          }else{
            $('#judge1').html("验证码有误，请重填").css('color','red');
            YZM = false; 
          }
      });        
    })

   //获取发送短信校验码按钮 绑定单击事件
   $("#p_code").click(function(){
      var s = $(this);
      //获取注册的手机号
      p=$('#phone').val();
      //Ajax
      if(p){      
        $.get("/sendsphone",{'p':p},function(data){
          console.log(data);
          if(data.code==000000){
            m=60;
            //定时器
            mytime=setInterval(function(){
              m--;
              //m赋值按钮
              s.html(m+"秒后重新发送");
              s.attr('disabled',true);
              //判断
              if(m<=0){
                //清除定时器
                clearInterval(mytime);
                s.html("重新发送");
                s.attr('disabled',false);
              }
            },1000);
          }else{
            $('#judge2').html("服务器麻烦,请稍后再试").css('color','red');
            CODE=false;
          }
        },'json');
      }else{
          $('#judge').html("手机号码有误，请重填").css('color','red');
          PHONE = false;
      }
   });

   // 验证校验码
   $("input[name='code']").blur(function(){
      c=$(this);
      //获取输入的校验码
      code=$(this).val();
      // alert(code);
      //执行Ajax
      $.get("/checkcode",{'code':code},function(data){
        // console.log(data);
        if(data==1){
          //校验码一致
          $('#judge2').html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
          CODE=true;
        }else if(data==2){
          //校验码不一致
          $('#judge2').html("校验码有误").css('color','red');
          CODE=false;
        }else if(data==3){
          //输入校验码为空
          $('#judge2').html("校验码为空").css('color','red');
          CODE=false;
        }else if(data==4){
          //验证码过期
          $('#judge2').html("校验码已经过期").css('color','red');
          CODE=false;
        }
      });
   });
 
   // 点击下一步 表单提交
   $("#reg").submit(function(){
      //trigger 某个元素触发某个事件
      $("input").trigger("blur");
      if(PHONE && CODE && YZM){
        //成功提交,将需要的数据存入session
        p = $('#phone').val(); // 值
        k = 'tel'; // 键
        $.get('/save/'+k+'-'+p,{},function(data){
          // alert(data);
          if(data == 1){
            location.href = '/reg_two?tel='+p;
          }
        })
        // return true;
      }else{
        return false;
      }  
   });

 </script>
</html>