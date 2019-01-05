<!DOCTYPE html>
<!-- saved from url=(0045)https://passport.tuniu.com/forget/choosenType -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
      找回密码 - 途牛旅游网
    </title>
      <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
    <meta name="description" content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网">
    <meta name="keywords" content="会员注册">

    <link type="text/css" rel="stylesheet" href="/style/home/forget/forget.css">
    <link type="text/css" rel="stylesheet" href="/style/home/forget/layer.css" id="skinlayercss"></head>
    <link rel="stylesheet" type="text/css" href="/style/admin/assets/css/bootstrap.min.css">
  <body id="index1200" class="index1200">
    <!-- user head start -->
    <div class="head_bg">
      <div class="header">
        <div class="logo clearfix">
          <div class="logocon">
            <a href="/">
              <img alt="途牛旅游网" title="途牛旅游网" src="/style/home/forget/logv2.png">
            </a>
          </div>
          <p class="head_tip">
            找回密码
          </p>
          <noscript>
            <h1 class="head_notice_tips">
              您的浏览器禁用了javascript脚本，导致登录功能无法使用，请您先开启以后再使用找回密码功能。
            </h1>
          </noscript>
          <p class="head_notice_tips" style="display: none;">
            您的浏览器禁用了cookie，开启Cookie之后才能找回密码，
            <a href="javascript:void(0)" id="howEnableCookie" style="color:rgb(3, 189, 252);">
              如何开启?
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- user head end -->
    <!-- user center_reg start -->
    <div class="allWrap">
      <div class="main_top clearfix">
        <div class="main_top_l">
        </div>
        <div class="main_top_r">
          已有途牛账号了？
          <a rel="nofollow" target="_self" href="https://passport.tuniu.com/login">
            登录
          </a>
        </div>
      </div>
  <div id="user-reg" class="user-reg">
  <div id="reg-field">
    <div class="a_title title_oneStep clearfix">
      <a class="page_phone page_cur" href="javascript:void(0);" style="width:100%">
        <span>密码找回</span>
        <span class="poptip-arrow poptip-arrow-top">▼</span>
      </a>
    </div>
    <div class="veri_step">
      <div class="veri_step_pic veri_step_pic1">
      </div>
      <ul class="clearfix">
        <li class="light">
          验证身份
        </li>
        <li>
          重置密码
        </li>
        <li>
          完成
        </li>
      </ul>
    </div>
    <div class="veri_con">
      <div class="veri_input">
        <div style="margin-bottom: 16px;">
          <label class="label_radio1"><input type="radio" name="findkind" value="telFind" checked="">手机找回</label>
          <label class="label_radio2"><input type="radio" name="findkind" value="emailFind">邮箱找回</label>
        </div>
        <ul class="input-list">
          <!-- <li>
            <div class="input">
              <label for="email">已验证手机：</label>
              <span class="yh f16 c_333" id="tel">188****4041</span>
            </div>
          </li> -->
          <!-- 账户名 -->
          <li class="li_username" style="display: list-item;">
            <div class="input">
              <label>手机号码：</label>
              <input type="text" tabindex="1" id="phone" name="phone" autocomplete="off" style="ime-mode:disabled" class="txt-m input-list" placeholder="请输入手机号码" maxlength="11">
            </div>
            <div class="input-tip" id="tel-tip" style="display: none;"></div>
          </li>
          <!-- 邮箱 -->
          <li class="li_email" style="display: none;">
            <div class="input">
              <label>邮箱：</label>
              <input type="text" tabindex="1" name="email" id="email" autocomplete="off" style="ime-mode:disabled" class="txt-m input-list" placeholder="请输入邮箱" maxlength="32">
            </div>
            <div class="input-tip" id="email-tip" style="display: none;"></div>
          </li>

          <!-- 验证码 -->
          <li class="li_code">
            <div class="input">
              <label>验证码：</label>
              <input type="text" maxlength="5" placeholder="不区分大小写" name="yzm" id="yzm" class="txt-m  identify_code txt_grey">
              <img style="cursor: pointer;" alt="如验证码无法辨别，点击即可刷新。" id="identify_img" src="/system/code" onclick="this.src='<?php echo e(url('/system/code')); ?>?'+Math.random()" width="85" height="30" />

            </div>
            <div id="codeTip1" class="input-tip">
              <div class="input-tip-inner">
                  <span id="code_err"></span>
                <span>看不清，
                  <a class="green" href="javascript:void(0);" onclick="document.getElementById('identify_img').src = '<?php echo e(url('/system/code')); ?>?'+Math.random()">
                    换一张
                  </a></span>
              </div>
            </div>
            <div class="input-tip" id="yzm-tip" style="display: none;"></div>
          </li>
          <li class="last li_telyzm" style="display: list-item;">
            <div class="input">
              <label>手机验证码：</label>
              <input type="text" placeholder="请输入4位验证码" maxlength="6" id="code" class="txt-m m-verify-code txt_grey" name="code">
              <a href="javascript:void(0)" class="btn btn-success" id="p_code" disabled="false">获取验证码</a>
            </div>
            <div class="input-tip" id="code-tip" style="display: none;"></div>
          </li>
        </ul>
        <div class="ml164 mt20">
          <input type="button" id="info_submit" value="下一步" class="login_btn submit_btn">
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/style/home/forget/jquery-1.7.2.min.js.下载"></script>
<script type="text/javascript" src="/style/home/forget/layer.min.js.下载"></script>
      <script type="text/javascript" src="/style/home/forget/frms-fingerprint.js.下载"></script>
<script type="text/javascript" src="/style/home/forget/zonesGroup.js.下载"></script>
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">

  // 手机/邮箱 radio 点击事件
  $("[name=findkind]").change(function(){
    if( $(this).val() == 'telFind' ){
      $('.li_zones').show();
      $('.li_username').show();
      $('.li_telyzm').show();
      $('.li_code').show();      
      $('.li_email').hide();
      $('#info_submit').val('下一步');
      findKind = 'tel';
    }else{
      $('.li_zones').hide();
      $('.li_code').hide();      
      $('.li_username').hide();
      $('.li_telyzm').hide();
      $('.li_email').show();
      $('#info_submit').val('发送验证邮箱');
      findKind = 'email';
    }
  });

  // 初始化信息
    var PHONE = false;
    var YZM = false;
    var CODE = false;
    var EM = false;
    // 验证邮箱
    $("input[name='email']").blur(function(){
        var v = $(this).val();//获取输入的值
        var rule = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;//定义规则
        if (!v || !rule.test(v)) {
          $("#email-tip").addClass("err").show();
          $("#email-tip").html("非法邮箱格式").css('color','red');
          EM = false;
        } else {
          // 判断数据库中是否存在名字
          $.get('/checkemail',{'email':v},function(data){
            if(data == 1){
              $("#email-tip").removeClass("err");
              $("#email-tip").show().html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
              //把获取校验码按钮 设置激活
              $("#p_code").attr('disabled',false);
              EM = true;
            }else{
              $("#email-tip").addClass("err");          
              $("#email-tip").show().html("该邮箱未注册，不能找回密码。您可以<a class='green' href='/register'>立即注册</a>");
              $("#p_code").attr('disabled',true);
              EM = false;
            }
          })
        }
    })
    // 发送邮件


    // 手机验证
    $("input[name='phone']").blur(function(){
      var p = $(this).val();
      if(!(/^1[34578]\d{9}$/.test(p))){ 
          $("#tel-tip").addClass("err");
          $("#tel-tip").show().html("手机号码有误，请重填").css('color','red');
          PHONE = false; 
      }else{
          //判断手机号码是否已注册
        $.get("/checkphone",{'p':p},function(data){
          // alert(data);
          if(data==1){
            //手机号码可用
            $("#tel-tip").removeClass("err");
            $("#tel-tip").show().html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
            //把获取校验码按钮 设置激活
            $("#p_code").attr('disabled',false);
            PHONE = true;
          }else{
            $("#tel-tip").addClass("err");          
            $("#tel-tip").show().html("该手机未注册，不能找回密码。您可以<a class='green' href='/register'>立即注册</a>");
            $("#p_code").attr('disabled',true);      
            PHONE = false;
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
            $("#yzm-tip").removeClass("err");
            $('#yzm-tip').show().html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
            YZM = true 
          }else{
            $("#yzm-tip").addClass("err");
            $('#yzm-tip').show().html("验证码有误，请重填").css('color','red');
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
            $("#code-tip").addClass("err");
            $('#code-tip').show().html("服务器麻烦,请稍后再试").css('color','red');
            CODE=false;
          }
        },'json');
      }else{
          $("#tel-tip").addClass("err");
          $('#tel-tip').show().html("手机号码有误，请重填").css('color','red');
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
          $("#code-tip").removeClass("err");
          $('#code-tip').show().html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
          CODE=true;
        }else if(data==2){
          //校验码不一致
          $("#code-tip").addClass("err");
          $('#code-tip').show().html("校验码有误").css('color','red');
          CODE=false;
        }else if(data==3){
          //输入校验码为空
          $("#code-tip").addClass("err");
          $('#code-tip').show().html("校验码为空").css('color','red');
          CODE=false;
        }else if(data==4){
          //验证码过期
          $("#code-tip").addClass("err");
          $('#code-tip').show().html("校验码已经过期").css('color','red');
          CODE=false;
        }
      });
   });

   // 点击下一步 表单提交
      // alert(1);
    $("#info_submit").click(function(){
      //trigger 某个元素触发某个事件
      $("input").trigger("blur");
      // 获取数据
      if($('#info_submit').val() == '下一步'){
        // 手机
        condition=$('#phone').val();
        if(PHONE && YZM && CODE){
          location.href = '/forget/forget_two?condition='+condition;
        // return true;
        }else{
          return false;
        }  
      }else{
        // 邮箱
        condition=$('#email').val();
        if(EM){
            $.get('/forget/sendEmail/'+condition,{},function(data){
              if(data == 1){
                alert('邮件发送,请注意邮箱,本页面于3秒后跳转登录页面');
                setTimeout(function() {
                    window.location.href = '/login';
                }, 3000);
              }else{
                alert('服务器异常,请注意邮箱或稍后请重试');
                return;
              }
            })
          // return true;
        }else{
          return false;
        }
      }  
    });


// $(function() {
//   var checkDelay, oldValue;
//   //填写默认的用户名
//   var cookieArr = document.cookie.split(";");
//   var defaultUsername = "";
//   var oldUsername = "";
//   var oldEmail = "";
//   var checkTimeout;

//   var errType = $("[name='errorType']").val();
//   var errorMsg = $("[name='errorMsg']").val();
//   var identifyFlag = false,
//     usernameFlag = false,
//     emailFlag = false,
//     identifyCodeFlag = false;
//   var findKind = 'tel'; // 'tel' 电话验证, 'email' 邮箱验证
//   for (var i = 0; i < cookieArr.length; i++) {
//     if (cookieArr[i].match("login_user_name")) {
//       defaultUsername = cookieArr[i].split("=")[1];
//     }
//   }
//   // 国际区号 下拉框
//   function getCountryCode() {
//     $.get('/ajax/countryCode', function(data) {
//       $('.zones_tabcont').html(data);
//       $(".li_cont").click(function(){
//         $('.J_zoneHid').val($(this).attr('data-zone'));
//         checkTel();
//       });
//     });
//   }

//   var zone = new window.zonesGroup();
//   zone.init({
//     'input_zone': $('.J_zoneHid'),
//     'div_zoneVal': $('.J_zoneVal'),
//     'div_zones': $('.J_Zones'),
//     'ul_title': $('.J_zonesTitle'),
//     'div_tabcont': $('.J_zonesTabcont')
//   });


//   function showDialog(msg) {
//     $.layer({
//       title: 0,
//       closeBtn: 0,
//       time: 3,
//       shadeClose: true,
//       dialog: {
//         type: 1,
//         msg: msg
//       },
//       offset: ['90px', '']
//     });
//   }

//   //检查手机号是否注册
//   function checkTel(){
//     var telValue = $("#username").val();
//     var intlCode = $('.J_zoneHid').val();console.log(intlCode);
//         if ((intlCode == '0086' && new RegExp(/^1\d{10}$/).test(telValue))
//               ||(intlCode != '0086' && new RegExp("^[0-9]{5,11}$").test(telValue))  ) {
//       var url = "/register/isPhoneAvailable";
//       $("#tel-tip").show().html("检查中...");
//       $("#tel-tip").addClass("err");
//       $.ajax({
//         url: url,
//         data: {
//           intlCode: intlCode,
//           tel: telValue
//         },
//         type: 'post',
//         success: function(json) {
//           try {
//             var json = eval("(" + json + ")");
//           } catch (e) {
//             $("#tel-tip").html("检测失败。");
//             $("#tel-tip").addClass("err");
//           }
//           if( json.errno == "-20"){
//             $("#tel-tip").addClass("err");
//             $("#tel-tip").show().html("服务器遛弯鸟，请稍后再试");
//             usernameFlag = false;
//           } else if (!json.success) {
//             $("#tel-tip").removeClass("err");
//             $("#tel-tip").hide().html("");
//             usernameFlag = true;
//           } else{
//             $("#tel-tip").addClass("err");
//             $("#tel-tip").show().html("该用户未注册，不能找回密码。您可以<a class='green' href='/register/phone'>立即注册</a>");
//             usernameFlag = false;
//           }
//         }
//       });
//     }else if(telValue){
//       usernameFlag = false;
//       $("#tel-tip").addClass("err");
//       $("#tel-tip").show().html("手机号不正确，请输入正确手机号码");
//     }else{
//       usernameFlag = false;
//       $("#tel-tip").removeClass("err");
//       $("#tel-tip").hide().html("");
//     }
//   }


//   // 手机/邮箱 radio 点击事件
//   $("[name=findkind]").change(function(){
//     if( $(this).val() == 'telFind' ){
//       $('.li_zones').show();
//       $('.li_username').show();
//       $('.li_telyzm').show();
//       $('.li_email').hide();
//       $('#info_submit').val('下一步');
//       findKind = 'tel';
//     }else{
//       $('.li_zones').hide();
//       $('.li_username').hide();
//       $('.li_telyzm').hide();
//       $('.li_email').show();
//       $('#info_submit').val('发送验证邮箱');
//       findKind = 'email';
//     }
//   });

//   var identifyCodeFlag, codeFlag, oldValue = [], changeCode = false;
//   $(".get-code").bind("click", sendCode);

//   if (defaultUsername) {
//     $("[name='username']").val(decodeURIComponent(defaultUsername)).trigger("input");
//   }

//   $(".input-list input:text").on("keyup", function(e, blur) {
//     var value = this.value;
//     // 手机号码验证
//     if( this.name == 'username' && identifyCodeFlag ){
//       // oldUsername = value;
//       // var self = this;
//       // if (checkTimeout) {
//       //  clearTimeout(checkTimeout);
//       // }
//       // checkTimeout = setTimeout(function(){
//       //  checkTel();
//       // }, 300);
//       if (changeCode) {
//         $('#identify').val('');
//         $("#identify_img").attr('src', '');
//         $("#identify_img").attr('src', "//passport.tuniu.com/ajax/captcha/v/" + (new Date().getTime() + Math.random()));
//         changeCode = !changeCode;
//       }
//     }else if( this.name == 'email' ){
//       oldEmail = value;
//       var self = this;
//       if( checkTimeout ){
//         clearTimeout(checkTimeout);
//       }
//       checkTimeout = setTimeout(function(){
//         if (value && new RegExp(/(?=^.{5,255}$)(^([\w\!\#\$\%\&\'\*\+\-\.\/\?\^\_\`\{\|\}\~]+)@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]+)$)/).test(value)) {
//           usernameFlag = false;
//           var url = "/register/isEmailAvailable";
//           $("#email-tip").addClass("err");
//           $("#email-tip").show().html("检查中...");
//           $.ajax({
//             url: url,
//             data: {
//               email: value
//             },
//             type: 'post',
//             success: function(json) {
//               try {
//                 var json = eval("(" + json + ")");
//               } catch (e) {
//                 $("#email-tip").addClass("err");
//                 $("#email-tip").show().html("检查失败。");
//               }
//               if( json.errno == "-20"){
//                 $("#email-tip").addClass("err");
//                 $("#email-tip").show().html("服务器遛弯鸟，请稍后再试");
//                 usernameFlag = false;
//               } else if (!json.success) {
//                 $("#email-tip").removeClass("err");
//                 $("#email-tip").hide().html("");
//                 usernameFlag = true;
//                 emailFlag = true;
//               } else {
//                 $("#email-tip").addClass("err");
//                 $("#email-tip").show().html("该用户未注册，不能找回密码。您可以<a class='green' href='/register/phone'>立即注册</a>");
//                 usernameFlag = false;
//               }
//             }
//           });
//         }else{
//           emailFlag = false;
//           $("#email-tip").addClass("err");
//           $("#email-tip").show().html("邮箱不正确，请输入正确邮件");
//         }
//       }, 300);
//     }
//     // 验证码
//     if (this.name == "identify") {
//       if (blur != 'blur' && oldValue['identify'] && oldValue['identify'] == value) {
//         return;
//       }
//       identifyCodeFlag = false;
//       oldValue["identify"] = value;
//       if (!value || value.length < 4 || new RegExp("^([0-9a-zA-Z])+$").test(value) == false) {
//         $("#codeTip1").addClass("err");
//         $("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
//         return false;
//       } else if (!identifyCodeFlag && value.length == 4) {
//         $.ajax({
//           url: "/ajax/checkCaptcha?identify_code=" + value,
//           type: "GET",
//           success: function(json) {
//             try {
//               var json = eval("(" + json + ")");
//             } catch (e) {
//               $("#codeTip1").addClass("err");
//               $("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
//             }
//             if (!json.success) {
//               identifyCodeFlag = false;
//               //$(ele).focus();
//               $("#codeTip1").addClass("err");
//               $("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
//             } else {
//               $("#codeTip1").removeClass("err");
//               $("#code_err").hide().html("");
//               identifyCodeFlag = true;
//               changeCode = true;
//               checkTel();
//             }
//           }
//         });
//       }
//       // 手机验证码
//     } else if (this.id == "code") {
//       if (blur != 'blur' && oldValue['code'] && oldValue['code'] == value) {
//         return;
//       }
//       codeFlag = false;
//       oldValue['code'] = value
//       if (!value || value.length < 6 || new RegExp("^([0-9])+$").test(value) == false) {
//         $("#codeTip").addClass("err").show();
//         $("#codeTip span").html("请输入正确的动态密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
//         codeFlag = false;
//       } else if (value.length == 6) {
//         $("#codeTip").removeClass("err").hide();
//         $("#codeTip span").html("");
//         codeFlag = true;
//       }
//     }
//   });

//   //手机发送动态码
//   function sendCode() {
//         // 暂时关闭发送动态密码前的验证码校验
//       if (identifyCodeFlag) {
//         $(".get-code,.send-code-again").attr("disabled", true);
//         $(".get-code,.send-code-again").unbind("click");
//         var postData = {
//           intlCode: $('.J_zoneHid').val(),
//           tel: $("[name='username']").val(),
//           identify_code: $("[name='identify']").val(),
//           is_login: 1
//         }
//         if (window.location.href.match("bind/weixin")) {
//           postData.is_login = 0;
//         }
//         $.post('/ajax/sendMobileCode', postData, function(json) {
//           try {
//             var json = eval("(" + json + ")");
//           } catch (e) {
//             showDialog('动态口令发送失败，请稍候重试。');
//             return;
//           }
//           if (json.success) {
//             showDialog("动态口令已发送，15分钟内有效！");
//             $(".get-code,.send-code-again").hide();
//             intervalTime(60);
//           } else {
//             $(".get-code,.send-code-again").removeAttr("disabled");
//             $(".get-code,.send-code-again").bind("click", sendCode);
//             switch (json.errno) {
//               case -1:
//                 showDialog("手机号未注册");
//                 return;
//                 break;
//               case -2:
//                 $("[name='identify']").focus();
//                 $("#captcha").show();
//                 showDialog("请输入正确的验证码");
//                 document.getElementById("identify_img").src = "";
//                 document.getElementById("identify_img").src = "/ajax/captcha/v/" + (new Date().getTime() + Math.random());
//                 return;
//                 break;
//               case -3:
//                 showDialog("动态口令发送失败，请稍候重试。");
//                 return;
//                 break;
//               default:
//                 showDialog(json.errmsg);
//                 return;
//                 break;
//             }
//           }
//         });
//       } else {
//         $("#identify").trigger("input");
//       }
//     }
//     //end

//   function intervalTime(num) {
//     var num = parseInt(num);
//     var i = 0;
//     $(".send-code").css("display", "inline-block");
//     $(".send-code span").text(num);
//     var inter = setInterval(function() {
//       if (i < num) {
//         i++;
//         $('.send-code span').text(num - i);
//       } else {
//         clearInterval(inter);
//         $(".send-code-again").css("display", "inline-block").bind("click", sendCode).removeAttr("disabled");
//         $(".send-code").hide();
//         $(".send-code span").text(0);
//       }
//     }, 1000);
//   }
//   $("#info_submit").on("click", function() {
//     switch(findKind){
//       case 'tel':
//         if( identifyCodeFlag && codeFlag && usernameFlag ){
//           $.ajax({
//             type: "POST",
//             data: {
//               intlCode: $('.J_zoneHid').val(),
//               tel: $("[name='username']").val(),
//               identifyCode: $("[name='identify']").val(),
//               verifyCode: $("#code").val()
//             },
//             url: "/forget/verTel",
//             success: function(json) {
//               try {
//                 var json = eval("(" + json + ")");
//               } catch (e) {
//                 showDialog('请检查填写的信息');
//               }
//               if (!json.success) {
//                             document.getElementById("identify_img").src = "";document.getElementById("identify_img").src = "/ajax/captcha/v/" + (new Date().getTime() + Math.random());
//                 $("[name='identify']").val("");
//                 $("#code").val("");
//                 showDialog(json.errmsg);
//               } else {
//                 window.location.href = "/forget/pSetPassword";
//               }
//             }
//           });
//         }else{
//           $(".input-list input:text").each(function(i, item) {
//             $(item).trigger("input");
//           });
//         }
//         break;
//       case 'email':
//         if( identifyCodeFlag && emailFlag ){
//           var postData = {
//             'email': $("[name='email']").val(),
//             'identifyCode': $("[name='identify']").val(),
//             'pc':1
//           };
//           $.ajax({
//             url: '/forget/sendEmail',
//             data: postData,
//             type: "POST",
//             async: false,
//             success: function(json) {
//               try {
//                 var json = eval("(" + json + ")");
//               } catch (e) {
//                 showDialog("邮件发送失败，请稍候重试。", 2);
//                 return;
//               }
//               if (json.success) {
//                 showDialog("邮件已发送，请登录邮箱验证");
//                 setTimeout(function() {
//                   window.location.href = "/forget/getByEmailSend";
//                 }, 2000);
//               } else {
//                 showDialog(json.errmsg);
//               }
//             }
//           });
//         }else{
//           $(".input-list input:text").each(function(i, item) {
//             $(item).trigger("input");
//           });
//         }
//         break;
//       default:
//         break;
//     }
//   });
//   getCountryCode();
//   checkTel();
// });
</script>

</div><div id="userdata_el" style="visibility: hidden; position: absolute;"></div></body></html>