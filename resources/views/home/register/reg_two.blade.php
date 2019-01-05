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
  <script type="text/javascript" src="/style/home/register/ga.js" async="" charset="utf-8"></script> 
  <script type="text/javascript" src="/style/home/register/lazyloadnew.js" async="" charset="utf-8"></script> 
 </head> 
 <style type="text/css">
   .password_li {
      height: 88px;
      position: relative;
    }

 </style>
 <body id="index1200" class="index1200"> 
  <!-- user head start --> 
  <div class="head_bg"> 
   <div class="header"> 
    <div class="logo clearfix"> 
     <div class="logocon"> 
      <a href="/"> <img alt="途牛旅游网" title="途牛旅游网" src="/style/home/register/logv2.png" /></a> 
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
     <a rel="nofollow" target="_self" href="https://passport.tuniu.com/login">登录</a>
    </div> 
   </div> 
   <style type="text/css">.zones_tabcont ul.ul_tabcont li { width:135px }</style> 
   <div id="user-reg" class="user-reg"> 
    <div id="bg_div" class="bg_div" style="display:none;"></div> 
    <div id="reg-field"> 
     <div class="a_title title_oneStep clearfix"> 
      <a class="page_phone page_cur" href="javascript:void(0);" style="width:100%"> <span>手机注册</span> <span class="poptip-arrow poptip-arrow-top">▼</span></a> 
      <!--<a class="page_email" id="email_regist" href="/register/email">
                        <span>邮箱注册</span>
                        <span class="poptip-arrow poptip-arrow-top">▼</span></a>--> 
     </div> 
     <div id="reg-wrap" class="reg-wrap" style="height: 670px;"> 
      <div id="mainPart" class="mainPart clearfix" style="left: -1200px;"> 
       <!--手机注册第一步开始--> 
       <form method="post" id="registerFrm" autocomplete="off" onsubmit="return false;"> 
            <div class="main_item" style="visibility: hidden;"> 
             <div class="step step1"></div> 
             <ul class="input-list mainCon"> 
              <!-- added by lvsijiang 2013-10-30 pass_verify通过手机验证的提示框 start --> 
              <!-- added by lvsijiang 2013-10-30 通过手机验证的提示框 end --> 
              <li> 
               <div class="input"> 
                <label class="required_input">手机号码：</label>  
                <input value="13169707463" type="text" tabindex="1" name="tel" id="tel" autocomplete="off" maxlength="11" style="ime-mode:disabled" class="txt-m " placeholder="请输入手机号码" />
               </div> 
               <div class="input-tip err" id="tel-tip"> 
                <div class="input-tip-inner"> 
                 <span>恭喜您，该手机可以注册。</span>
                </div> 
               </div> </li> 
              <!-- 验证码 --> 
              <li class="identify_box"> 
               <div class="input"> 
                <label class="required_input">验证码：</label> 
                <span class="txt-m identify_con"> <input type="text" class="identify_code txt_grey" id="identify" name="identify" placeholder="不区分大小写" maxlength="4" tabindex="2" value="dyqy" /> <img style="cursor: pointer;" alt="如验证码无法辨别，点击即可刷新。" id="identify_img" src="/style/home/register/1543835349635.jpg" onclick="this.src = &quot;&quot;;this.src = &quot;/ajax/captcha/v/&quot; + (new Date().getTime() + Math.random());" width="81" height="25" /></span> 
               </div> 
               <div class="input-tip wd350" id="codeTip1"> 
                <div class="input-tip-inner"> 
                 <span id="code_err" class="hide" style="display: none;"></span> 
                 <span>看不清， <a class="green" href="javascript:void(0);" onclick="document.getElementById(&quot;identify_img&quot;).src = &quot;&quot;;document.getElementById(&quot;identify_img&quot;).src = &quot;/ajax/captcha/v/&quot; + (new Date().getTime() + Math.random());">换一张</a></span> 
                </div> 
               </div> </li> 
              <li class="verify-box2_2"> 
               <div class="input"> 
                <label class="required_input">校验码：</label> 
                <input type="text" class="txt-m txt_grey" id="code" placeholder="请输入校验码" name="code" maxlength="6" tabindex="3" value="890752" />
               </div> 
               <div class="input-tip wd155" id="codeTip" style="display: none;"> 
                <div class="input-tip-inner"> 
                 <span></span> 
                </div> 
               </div> 
               <div class="phone_code_div"> 
                <a href="javascript:void(0);" class="sendToPhone get-code" disabled="disabled" style="display: none;">获取动态密码</a> 
                <a href="javascript:void(0);" class="sendToPhone send-code" style="display: none;"> <span>0</span>秒后重新发送</a> 
                <a href="javascript:void(0);" class="sendToPhone send-code-again" style="display: inline-block;" disabled="disabled">重新发送</a>
               </div> </li> 
              <!-- <li>--> 
              <!-- <div class="input" style="padding-left:75px; color:#333;">--> 
              <!-- 我有“--> 
              <!-- <a target="_blank" href="http://www.tuniu.com/zt/niulaniu/" style="border-bottom: 1px dashed #43b313;">牛拉牛</a>--> 
              <!-- ”活动--> 
              <!-- <a href="javascript:void(0);" id="shuru" class="shuru clickBtn">--> 
              <!-- 点击输入邀请码--> 
              <!-- <span class="triangle_left"> <em>◆</em> <i>◆</i>--> 
              <!-- </span>--> 
              <!----> 
              <!-- </a>--> 
              <!-- </div>--> 
              <!-- </li>--> 
              <li id="invitation"> 
               <div class="input"> 
                <label for="invite">邀请码：</label> 
                <input type="text" tabindex="4" name="invite_code" id="invite_code" style="ime-mode:disabled;" class="txt-m txt_grey" placeholder="推荐人手机号码" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="11/" />
               </div> 
               <div class="input-tip" id="inviteTip"> 
                <div class="input-tip-inner"></div> 
               </div> <a href="https://i.tuniu.com/u/inviteCode">了解&quot;推荐有礼&quot;</a></li> 
              <li> 
               <div class="reg-check"> 
                <input type="checkbox" id="travel-info" name="travel-info" checked="checked" /> 
                <label for="">同意 <a class="agreement" id="hy-con" href="javascript:void(0)">途牛会员协议</a>和 <a class="agreement" id="privacy-con" href="javascript:void(0)">途牛隐私政策</a>并且愿意接受旅游咨询免费信息</label> 
                <div class="input-tip" id="travel-info-tip"> 
                 <div class="input-tip-inner"> 
                  <span></span> 
                 </div> 
                </div> 
                <br />
               </div> </li> 
             </ul> 
             <div class="reg-check"> 
              <input type="submit" value="下一步" tabindex="9" class="login_btn register_btn" name="info_submit" id="info_submit" />
             </div> 
            </div> 
            <input type="hidden" name="referer" id="referer" value="" /> 
            <input type="hidden" name="click_num" id="click_num" value="1" /> 
            <!--滚屏次数--> 
            <input type="hidden" name="pwd_s" id="pwd_s" value="2" /> 
            <input type="hidden" name="type" id="type" value="register" /> 
            <input type="hidden" name="p" id="p" value="0" /> 
            <input type="hidden" id="hid_invite_code" name="hid_invite_code" value="" />
       </form> 
       <!--手机注册第一步结束--> 
       <!--手机注册第二步开始--> 
       <div class="main_item hidden" style="visibility: visible;height: 600px;"> 
        <form id="reg" method="post" action="/do_reg_two">
          {{csrf_field()}}
          <input type="hidden" name="tel" value="{{$tel}}">
        <div class="step step2"></div> 
        <ul class="input-list mainCon"> 

          <li class="password_li"> 
            <div class="input"> 
               <label for="username">用户名称：</label> 
               <input placeholder="请确认用户名" type="text" tabindex="6" name="username" id="username" style="ime-mode:disabled;" autocomplete="off" class="txt-m" value="" /> 
               <p class="regist-step2-tip" style="bottom: 20px">提示:用户名不能为空,且用户名小于10位。</p>
            </div> 
            <div class="input-tip wd350" id="username-tip" style="display: none;"> 
               <div class="input-tip-inner"> 
                    <span class="mes_username"></span> 
               </div> 
            </div>
          </li> 

          <li class="password_li" style="height: 60px"> 
            <div class="input"> 
               <label for="username">用户性别：</label>&nbsp;&nbsp;&nbsp; 
               <input type="radio" name="sex" class="txt-m" value="1" style="width: 20px" /> 男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="radio" name="sex" class="txt-m" value="0" style="width: 20px" /> 女&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="radio" checked name="sex" class="txt-m" value="2" style="width: 20px" /> 保密 
            </div> 
          </li> 

          <li class="password_li"> 
            <div class="input"> 
               <label for="email">邮箱地址：</label> 
               <input placeholder="请输入邮箱地址" type="text" tabindex="6" name="email" id="email" style="ime-mode:disabled;" autocomplete="off" class="txt-m" value="" /> 
               <p class="regist-step2-tip" style="bottom: 20px">提示:邮箱地址不能为空。</p>
            </div> 
            <div class="input-tip wd350" id="email-tip" style="display: none;"> 
               <div class="input-tip-inner"> 
                    <span class="mes_email"></span> 
               </div> 
            </div>
          </li> 

         <li class="password_li"> 
            <div class="input"> 
             <label for="password">登录密码：</label> 
             <input placeholder="请输入密码" type="password" id="password" tabindex="5" name="password" autocomplete="off" style="ime-mode:disabled;" class="txt-m" maxlength="16" /> 
             <p class="regist-step2-tip" style="bottom: 20px">提示:密码需由8位以上数字、字母或符号组成，至少含有2种及以上的字符。</p>
            </div> 
            <div class="input-tip wd350" id="password-tip" style="display: none;"> 
             <div class="input-tip-inner"> 
              <span class="mes_pass"></span> 
             </div> 
            </div> 
          <!-- <div id="password-state" class="password-state" style="display: block;"> 
           <div class="input-tip-inner"> 
            <span class="reg_mes mes_pass_in"></span> 
           </div> 
          </div>  -->
         </li> 
         <li class="password_li"> 
            <div class="input"> 
               <label for="password-confirm">确认密码：</label> 
               <input placeholder="请确认输入密码" type="password" tabindex="6" name="repassword" id="repassword" style="ime-mode:disabled;" class="txt-m" value="" /> 
               <p class="regist-step2-tip" style="bottom: 20px">提示:重复以上的密码。</p>
            </div> 
            <div class="input-tip wd350" id="repassword-tip" style="display: none;"> 
               <div class="input-tip-inner"> 
                    <span class="mes_passagain"></span> 
               </div> 
            </div>
          </li> 
        </ul> 
        <div class="reg-check"> 
          <input type="submit" value="下一步" id="input_do_check_password" class="login_btn submit_btn" />
        </div> 
        </form>
       </div> 
       <!--手机注册第二步结束--> 
       <!--手机注册第三步开始--> 
       <div class="main_item hidden"> 
            <div class="step step3"></div> 
            <div class="verify-success"> 
             <div class="ziliao"> 
              <img src="/style/home/register/order_success_niu.png" width="90" height="82" /> 
              <div class="clearfix mb5"> 
               <span class="fl tit">恭喜，已注册成功！</span> 
               <p class="fl"> <a href="http://www.tuniu.com/" class="f_3e7a12">去预订</a> <a href="http://www.tuniu.com/u" class="f_3e7a12" target="_blank">打开会员中心</a></p> 
              </div> 
              <p>为了保障您的账户安全，请尽快完成 <a href="https://i.tuniu.com/change-tel-step1/checkEmail/" class="f_3e7a12">邮箱验证！</a></p> 
              <p>完善个人资料还可获得50积分奖励哦，点击 <a href="https://i.tuniu.com/userinfoconfirm" class="f_3e7a12">我要奖励！</a></p> 
              <p>您还可以下载并打开途牛APP，在【我的】-【我的顾问】</p> 
              <p>选择自己的专属顾问，随时随地的为您提供贴心的旅游咨询</p> 
              <p>服务</p> 
              <div id="invite" style="display: none"> 
               <p class="f_f666">您已成功参与牛拉牛活动，获得首次出游20元优惠券，200</p> 
               <p class="f_f666">元出行礼包、首次出境游免费wifi。还等什么？快来一场说走</p> 
               <p class="f_f666">就走的旅行吧!</p>
              </div> 
             </div> 
             <p class="success_t" style="position: relative;top:110px"> <span id="backTime">60s</span>后自动跳转到您之前浏览得页面，您也可以点击 <a href="https://i.tuniu.com/ssoConnect" id="toReferer" class="clickBtn">立即跳转</a></p> 
            </div> 
            <!--手机注册第三步结束--> 
            <!--注册失败开始--> 
            <form action="/register/email" method="post" id="reg_fail"></form> 
            <!--注册失败结束-->
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="dyPop" class="dyPop"> 
     <div class="dyPop_con"> 
      <div class="logintextarea"> 
       <h3 class="sc_title">途牛会员协议</h3> 
       <p class="sc_list">一、服务条款</p> 
       <p class="sc_con">途牛旅游网提供的服务将完全按照其发布的使用协议、服务条款和操作规则严格执行。为获得途牛服务，服务使用人（以下称&quot;会员&quot;）应当同意本协议的全部条款并按照页面上的提示完成全部的注册程序。</p> 
       <p class="sc_list">二、目的</p> 
       <p class="sc_con">本协议是以规定用户使用途牛旅游网提供的服务时，途牛旅游网与会员间的权利、义务、服务条款等基本事宜为目的。</p> 
       <p class="sc_list">三、遵守法律及法律效力</p> 
       <p class="sc_con">本服务使用协议在向会员公告后，开始提供服务或以其他方式向会员提供服务同时产生法律效力。 <br /> <br />会员同意遵守《中华人民共和国保密法》、《计算机信息系统国际联网保密管理规定》、《中华人民共和国计算机信息系统安全保护条例》、《计算机信息网络国际 联网安全保护管理办法》、《中华人民共和国计算机信息网络国际联网管理暂行规定》及其实施办法等相关法律法规的任何及所有的规定，并对会员以任何方式使用 服务的任何行为及其结果承担全部责任。 <br /> <br />在任何情况下，如果本网站合理地认为会员的任何行为，包括但不限于会员的任何言论和其他行为违反或可能违反上述法律和法规的任何规定，本网站可在任何时候不经任何事先通知终止向会员提供服务。 <br /> <br />本网站可能不时的修改本协议的有关条款，一旦条款内容发生变动，本网站将会在相关的页面提示修改内容。在更改此使用服务协议时，本网站将说明更改内容的执 行日期，变更理由等。且应同现行的使用服务协议一起，在更改内容发生效力前7日内及发生效力前日向会员公告。 <br /> <br />会员需仔细阅读使用服务协议更改内容，会员由于不知变更内容所带来的伤害，本网站一概不予负责。 <br /> <br />如果不同意本网站对服务条款所做的修改，用户有权停止使用网络服务。如果用户继续使用网络服务，则视为用户接受服务条款的变动。 <br /></p> 
       <p class="sc_list">四、服务内容</p> 
       <p class="sc_con">途牛服务的具体内容由本网站根据实际情况提供，本网站保留随时变更、中断或终止部分或全部途牛服务的权利。</p> 
       <p class="sc_list">五、会员的义务</p> 
       <p class="sc_con">用户在申请使用本网站途牛服务时，必须向本网站提供准确的个人资料，如个人资料有任何变动，必须及时更新。 <br /> <br />用户注册成功后，本网站将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户负责保管；用户应当对以其用户帐号进行的所有活动和事件负法律责任。 <br /> <br /> <br /> <br />用户在使用本网站网络服务过程中，必须遵循以下原则： <br /> <br />遵守中国有关的法律和法规； <br />不得为任何非法目的而使用网络服务系统； <br />遵守所有与网络服务有关的网络协议、规定和程序； <br />不得利用途牛服务系统传输任何危害社会，侵蚀道德风尚，宣传不法宗教组织等内容； <br />不得利用途牛服务系统进行任何可能对互联网的正常运转造成不利影响的行为； <br />不得利用途牛服务系统上载、张贴或传送任何非法、有害、胁迫、滥用、骚扰、侵害、中伤、粗俗、猥亵、诽谤、侵害他人隐私、辱骂性的、恐吓性的、庸俗淫秽的及有害或种族歧视的或道德上令人不快的包括其他任何非法的信息资料； <br />不得利用途牛服务系统进行任何不利于本网站的行为； <br />如发现任何非法使用用户帐号或帐号出现安全漏洞的情况，应立即通告本网站。 <br /></p> 
       <p class="sc_list">六、本网站的权利及义务</p> 
       <p class="sc_con">本网站除特殊情况外（例如：协助公安等相关部门调查破案等），致力于努力保护会员的个人资料不被外漏，且不得在未经本人的同意下向第三者提供会员的个人资料。 <br /> <br />本网站根据提供服务的过程，经营上的变化，无需向会员得到同意即可更改，变更所提供服务的内容。 <br /> <br />本网站在提供服务过程中，应及时解决会员提出的不满事宜，如在解决过程中确有难处，可以采取公开通知方式或向会员发送电子邮件寻求解决办法。 <br /> <br />本网站在下列情况下可以不通过向会员通知，直接删除其上载的内容： <br /> <br />有损于本网站，会员或第三者名誉的内容； <br />利用途牛服务系统上载、张贴或传送任何非法、有害、胁迫、滥用、骚扰、侵害、中伤、粗俗、猥亵、诽谤、侵害他人隐私、辱骂性的、恐吓性的、庸俗淫秽的及有害或种族歧视的或道德上令人不快的包括其他任何非法的内容； <br />侵害本网站或第三者的版权，著作权等内容； <br />存在与本网站提供的服务无关的内容； <br />无故盗用他人的ID(固有用户名)，姓名上载、张贴或传送任何内容及恶意更改，伪造他人上载内容。 <br /></p> 
       <p class="sc_list">七、知识产权声明</p> 
       <p class="sc_con">本网站（www.tuniu.com）所有的产品、技术与所有程序及页面（包括但不限于页面设计及内容）均属于知识产权，仅供个人学习、研究和欣赏，未经授权，任何人不得擅自使用，否则，将依法追究法律责任。 <br /> <br />南京途牛科技有限公司拥有本网站内所有资料（包括但不限于本站所刊载的图片、视频、Flash等）的版权，（版权归属有特殊约定的，从其约定），未经授权，任何人不得擅自使用，否则，将依法追究法律责任。 <br /> <br />&quot;途牛旅游网&quot;、牛头（图形）及&quot;tuniu.com&quot;组合为南京途牛科技有限公司注册商标，任何人不得擅自使用，否则，将依法追究法律责任。</p> 
       <p class="sc_list">八、免责声明</p> 
       <p class="sc_con">任何人因使用本网站而可能遭致的意外及其造成的损失（包括因下载本网站可能链接的第三方网站内容而感染电脑病毒），我们对此概不负责，亦不承担任何法律责任。 <br /> <br />本网站禁止制作、复制、发布、传播等具有反动、色情、暴力、淫秽等内容的信息，一经发现，立即删除。若您因此触犯法律，我们对此不承担任何法律责任。 <br /> <br />本网站会员自行上传或通过网络收集的资源，我们仅提供一个展示、交流的平台，不对其内容的准确性、真实性、正当性、合法性负责，也不承担任何法律责任。 <br /> <br />任何单位或个人认为通过本网站网页内容可能涉嫌侵犯其著作权，应该及时向我们提出书面权利通知，并提供身份证明、权属证明及详细侵权情况证明。我们收到上述法律文件后，将会依法尽快处理。 <br /></p> 
       <p class="sc_list">九、服务变更、中断或终止</p> 
       <p class="sc_con">如因系统维护或升级的需要而需暂停途牛服务，本网站将尽可能事先进行通告。 <br /> <br />如发生下列任何一种情形，本网站有权随时中断或终止向用户提供本协议项下的途牛服务而无需通知用户： <br /> <br />用户提供的个人资料不真实； <br />用户违反本协议中规定的使用规则。 <br /> <br />除前款所述情形外，本网站同时保留在不事先通知用户的情况下随时中断或终止部分或全部途牛服务的权利，对于所有服务的中断或终止而造成的任何损失，本网站无需对用户或任何第三方承担任何责任。</p> 
       <p class="sc_list">十、违约赔偿</p> 
       <p class="sc_con">用户同意保障和维护本网站及其他用户的利益，如因用户违反有关法律、法规或本协议项下的任何条款而给本网站或任何其他第三者造成损失，用户同意承担由此造成的损害赔偿责任。</p> 
       <p class="sc_list">十一、修改协议</p> 
       <p class="sc_con">本网站将可能不时的修改本协议的有关条款，一旦条款内容发生变动，本网站将会在相关的页面提示修改内容。 <br /> <br />如果不同意本网站对服务条款所做的修改，用户有权停止使用途牛服务。如果用户继续使用途牛服务，则视为用户接受服务条款的变动。</p> 
       <p class="sc_list">十二、法律管辖</p> 
       <p class="sc_con">本协议的订立、执行和解释及争议的解决均应适用中国法律。 <br /> <br />如双方就本协议内容或其执行发生任何争议，双方应尽量友好协商解决；协商不成时，任何一方均可向本网站所在地的人民法院提起诉讼。</p> 
       <p class="sc_list">十三、其他规定</p> 
       <p class="sc_con">本协议构成双方对本协议之约定事项及其他有关事宜的完整协议，除本协议规定的之外，未赋予本协议各方其他权利。 <br /> <br />如本协议中的任何条款无论因何种原因完全或部分无效或不具有执行力，本协议的其余条款仍应有效并且有约束力。</p> 
       <br /> 
       <br />
      </div> 
     </div> 
     <div class="pc_con"> 
      <div class="logintextarea"> 
       <h3 class="sc_title">途牛隐私政策</h3> 
       <p class="service_top">欢迎您访问途牛旅游网！途牛提醒您：途牛旅游网由南京途牛旅游科技有限公司（以下简称 “途牛”）所有、运营及维护，涉及网站内具体产品服务的，将由产品运营方提供相关服务。如果您您在本网站、途牛关联公司网站或其他途牛提供的移动应用或软 件上（以下简称为“本网站”）访问、预定或使用途牛旅游网展示的产品或服务（以上统称为“服务”），便视为您接受了本隐私政策。请您仔细阅读以下内容，尤 其是其中加粗字体。如果您不同意以下任一内容，请立刻停止访问/使用本网站或其他任何移动应用或软件。 “您”指自愿接受本隐私政策的用户。途牛深知个人信息对您的重要性，也深知为您的个人信息提供有效保护是途牛依据相关法律必须履行的法定义务，也系途牛的 业务健康可持续发展的基石。感谢您对途牛旅游网的信任和使用！途牛致力于维持您对途牛的信任，恪守法律规定和途牛对您的承诺，尽全力保证您的个人信息安全 和在合理范围内的合理使用。同时，途牛郑重承诺：途牛将按业界成熟的安全标准，采取相应的安全保护措施来保护您的个人信息。</p> 
       <p class="sc_list">1、隐私政策的确认和同意</p> 
       <p>尊重用户个人隐私是途牛的一项基本政策。途牛旅游网是将有资质的酒店、机票代理机构、旅行社等提供的旅游服务信息汇集于途牛旅游网 供您查阅，同时帮助您通过途牛旅游网与上述酒店、机票代理机构、旅行社等联系并预订相关旅游服务项目。您在使用途牛的产品与/或服务前仔细阅读并确认您已 经充分理解本隐私政策所写明的内容，并与途牛达成协议且接受所有的服务条款。</p> 
       <p>途牛十分注重保护您的个人信息及隐私安全，途牛理解您通过网络向途牛提供信息是建立在对途牛信任的基础上，途牛重视这种信任，也深知隐私对您的重要性，并尽最大努力全力保护您的隐私。如果您对途牛的隐私政策有任何的疑问或建议，请联系：sec@tuniu.com。</p> 
       <p class="sc_list">2、收集信息</p> 
       <p>（1）为了更好地为您提供服务，途牛将遵循“合理、相关、必要”原则，且以您同意为前提收集信息，不会收集法律法规禁止收集的信息。考虑到途牛会员服务的重要性，您同意，途牛将会收集您在途牛网上输入的或者以其他方式提供给途牛的所有信息：</p> 
       <ul class="rule-list"> 
        <li>在您注册为途牛会员时，需提供姓名、性别、生日、手机号、邮箱等信息。</li> 
        <li>在您后续更新个人信息时，需符合及时、详尽、准确的要求。</li> 
        <li>在您预订机票或火车票时，需提供乘客姓名、性别、生日、证件号以及联系人姓名、手机号、邮箱及配送地址等信息。</li> 
        <li>在您预订酒店、景点门票时，需提供入住人姓名、联系人姓名、手机号、邮件等信息。</li> 
        <li>在您购买产品进行支付结算时，需提供银行卡卡号、银行预留手机号、或者信用卡卡号、持卡人姓名、到期日期等信息。</li> 
        <li>途牛也可能根据您的旅行计划、风格和喜好，包括膳食要求、出行/入离时间、座位选择、票务选择、保险选择以及途牛提供其他服务（如旅游、用车、门票、攻略等），需要您配合提供的其他个人信息。</li>
       </ul> 
       <p>（2）您可以通过途牛为其他人预订，您需要提交该旅客的个人信息，向途牛提供该旅客的个人信息之前，您确保您已经取得其他旅客本人的同意，并确保其已知晓并接受本隐私政策。</p> 
       <p>（3）途牛将在您使用途牛服务过程中，自动收集个人信息：</p> 
       <ul class="rule-list"> 
        <li>日志信息，指您使用途牛的服务时，系统可能通过cookies、web beacon或其他方式自动采集的信息，包括： 
         <ul class="rule-list"> 
          <li>设备信息或软件信息，具体例如您的IP地址和移动设备所用的版本和设备识别码（IDFA/IMEI）、以及通过网页浏览器、移动设备用于接入途牛服务的配置信息。</li> 
          <li>在使用途牛服务时搜索或浏览的信息，具体例如您使用的网页或APP搜索词语、访问页面，以及您在使用途牛服务时浏览或提供的其他信息。</li> 
          <li>您通过途牛的服务分享的内容所包含的信息，例如拍摄或上传的共享照片或评论，以及日期、时间等。</li>
         </ul> </li> 
        <li>位置信息，指您开启设备定位功能并使用途牛基于位置提供的相关服务时，收集的有关您的位置信息，例如通过GPS或 WLAN等方式收集您的地理位置信息，或您提供账户信息中包含的您所在地区信息，您或其他人上传的显示您当前或曾经所处地理位置的共享信息等。您可以通过 关闭定位功能，停止对您的地理位置信息的收集。</li>
       </ul> 
       <p>（4）途牛会从关联公司、业务合作伙伴来源获得您的相关信息。例如当您通过途牛关联公司、业务合作伙伴网站及其移动应用软件等预订 时，您向其提供的预订信息可能会转交给途牛，以便途牛处理您的订单，确保您顺利预订。又如，途牛允许您使用社交媒体帐号关联途牛的帐号进行登录，在您同意 的情况下（您授权给该社交平台），您的相关个人信息会通过社交平台分享给途牛。</p> 
       <p class="sc_list">3、使用信息</p> 
       <p>（1）一般来说，途牛出于以下目的收集、使用您的个人信息：</p> 
       <ul class="rule-list"> 
        <li>向您提供服务：途牛使用您的个人数据完成并管理您的网上预订。另外，途牛也会通过关联公司、业务合作伙伴和第三方为您提供相关的产品和服务。</li> 
        <li>帐号管理：您可以通过途牛网创建帐号，途牛将使用您所提供的信息来管理您的帐号，并为您提供一系列的实用功能，您可以使用您的帐号进行多种操作，如订单管理、调整个人设置、添加常用旅客信息、查看历史订单信息、订单评价、支付管理等。</li> 
        <li>答复您的问询和请求：途牛提供7*24小时及多语言的国际化客户服务，以便在您需要的时候提供咨询。</li> 
        <li>营销活动：途牛也会使用您的信息进行正当合法的营销活动，如向您发送旅行相关的产品或者服务的最新消息、向您提供您可能感兴趣的个性化推荐及其他推广活动信息。</li> 
        <li>与您联系：回复及处理您所提出的疑问或要求、发送与订单相关的信息（如订单提交成功提示、未完成订单的提醒您继续等）、途牛也可能会向您发送问卷调查或邀请您对途牛的服务提供反馈等。</li> 
        <li>市场调研：途牛有时会邀请您参与市场调查，以衡量您对途牛的产品、服务和网站的兴趣。</li> 
        <li>提升服务的安全性和可靠性：途牛可能会检测和预防欺诈行为、不法活动，将您的个人数据用于风险评估和安全目的。</li> 
        <li>数据分析：途牛可能将个人信息用于分析，以便让途牛能够了解您所在的位置、偏好和人口统计信息，或与其他来源（包括第三方）的数据相匹配，从而开发途牛的产品、服务或营销计划，改进途牛的服务。</li> 
        <li>控制信用风险：为了确保交易安全，途牛及关联公司、业务合作伙伴可能对您的信息进行数据分析，并对上述分析结果进行商业利用。</li> 
        <li>日常运营：包括但不限于订单管理、客户验证、技术支持、网络维护、故障排除、内部行政事务及内部政策和程序、生成内部报告等所涉及的个人信息。</li> 
        <li>电话监测：您接听和拨打途牛的客服电话可能会被录音，途牛可能会使用通话录音来监控途牛的客服服务质量，检查您所提供的信息的准确性以防止欺诈，或为了途牛内部人员培训的目的。录音在被保留一段时间后会自动删除，除非由于涉嫌行政执法、司法等合法利益需要为场景的保留。</li> 
        <li>履行义务：处理相关政策下发生的保险索赔和付款，处理支付给合作伙伴的佣金或对服务合作伙伴造成的损失提起索赔或收回付款等。</li> 
        <li>法律目的：途牛可能需要使用您的信息来处理和解决法律纠纷，或遵循对途牛具有约束力的任何法律法规或监管机构颁发的文件规定，以配合国家部门或监管机构调查和遵从法律法规的目的。</li> 
        <li>此外，途牛可能会出于其他目的收集、使用和披露您的个人信息，并通过修订本声明的形式告知您。</li>
       </ul> 
       <p>（2）您在享受途牛提供的各项服务的同时，授权并同意接受途牛向您发送的电子邮件、手机、通信地址等发送商业信息，包括不限于最新的途牛产品信息、促销信息等。若您选择不接受途牛提供的各类信息服务，您可以按照途牛提供的相应设置拒绝该类信息服务。</p> 
       <p>（3）您充分知晓，以下情形中途牛使用个人信息无需征得您的授权同意：</p> 
       <ul class="rule-list"> 
        <li>与国家安全、国防安全有关的；</li> 
        <li>与公共安全、公共卫生、重大公共利益有关的；</li> 
        <li>与犯罪侦查、起诉、审判和判决执行等有关的；</li> 
        <li>出于维护个人信息主体或其他个人的生命、财产等重大合法权益但又很难得到本人同意的；</li> 
        <li>所收集的个人信息是个人信息主体自行向社会公众公开的；</li> 
        <li>从合法公开披露的信息中收集的您的个人信息的，如合法的新闻报道、政府信息公开等渠道；</li> 
        <li>根据您的要求签订合同所必需的；</li> 
        <li>用于维护所提供的产品与/或服务的安全稳定运行所必需的，例如发现、处置产品与/或服务的故障；</li> 
        <li>为合法的新闻报道所必需的；</li> 
        <li>学术研究机构基于公共利益开展统计或学术研究所必要，且对外提供学术研究或描述的结果时，对结果中所包含的个人信息进行去标识化处理的；</li> 
        <li>法律法规规定的其他情形。</li>
       </ul> 
       <p class="sc_list">4、共享、转让和公开披露、传输信息</p> 
       <p>（1）途牛可能会向合作伙伴等第三方共享您的订单信息、账户信息、设备信息以及位置信息，以保障为您提供的服务顺利完成。但途牛仅 会出于合法、正当、必要、特定、明确的目的共享您的个人信息，并且只会共享提供服务所必要的个人信息。途牛的合作伙伴包括以下类型（包含中国境内和中国境 外实体）：</p> 
       <ul class="rule-list"> 
        <li>供应商：包括但不限于为了满足您预订需求的酒店、航空公司、邮轮、汽车租赁、旅行社、景区和活动提供商和代理商。这些供应商可能根据需要与您联系，以完成旅行产品或服务。</li> 
        <li>金融机构和第三方支付机构：当您预订订单、申请退款、购买保险时，途牛会与金融机构或第三方支付机构共享特定的订单信息，当途牛认为用于欺诈检测和预防目的实属必要时，途牛将进一步和相关金融机构共享其他必要信息，如IP地址等。</li> 
        <li>业务合作伙伴：途牛可能与合作伙伴一起为您提供产品或者服务，包括快递业务、通讯服务、客户服务、市场推广、广告投放等。 关联公司：途牛可能会与途牛的关联公司共享您的个人信息，使途牛能够向您提供与旅行相关的或者其他产品及服务的信息，他们会采取不低于本隐私政策同等严格的保护措施。</li>
       </ul> 
       <p>对于途牛与之共享个人信息的公司、组织途牛会要求他们按照本隐私政策以及途牛其他相关的保密和安全措施来处理个人信息。途牛的合作伙伴无权将共享的个人信息用于任何其他用途，如要改变个人信息的处理目的，将再次征求您的授权同意。</p> 
       <p>（2）禁止转让信息</p> 
       <p>途牛不会将您的个人信息转让给任何公司、组织和个人，但以下情况除外：</p> 
       <ul class="rule-list"> 
        <li>事先获得您的明确同意或授权；</li> 
        <li>根据适用的法律法规、法律程序的要求、强制性的行政或司法要求；</li> 
        <li>在涉及合并、收购、资产转让或类似的交易时，如涉及到个人信息转让，途牛会要求新的持有您个人信息的公司、组织继续受本隐私政策的约束，否则,途牛将要求该公司、组织重新向您征求授权同意。</li>
       </ul> 
       <p>（3）公开披露信息</p> 
       <p>途牛仅会在以下情形，公开披露您的个人信息：</p> 
       <ul class="list-style"> 
        <li>根据您的需求，在您明确同意的披露方式下披露您所指定的个人信息；</li> 
        <li>根据法律、法规的要求、强制性的行政执法或司法要求所必须提供您个人信息的情况下，途牛可能会依据所要求的个人信息类型和披露方式公开披露您的个人信息。在符合法律法规的前提下，当途牛收到上述披露信息的请求时，途牛会要求必须出具与之相应的法律文件，如传票或调查函。</li>
       </ul> 
       <p class="sc_list">5、保存及跨境传输信息</p> 
       <p>（1）您的个人信息途牛将保存至您账号注销之日后的三个月，除非需要延长保留期或受到法律或者行政、司法机关的允许或协助行政、司法机关进行查询。</p> 
       <p>（2）如途牛停止运营途牛网产品或服务，途牛将及时停止继续收集您个人信息的活动，将停止运营的通知以逐一送达或公告的形式通知您，对所持有的个人信息进行删除或匿名化处理。</p> 
       <p>（3）途牛在中华人民共和国境内运营中收集和产生的个人信息，存储在中国境内，以下情形除外：</p> 
       <ul class="rule-list"> 
        <li>法律法规有明确规定；</li> 
        <li>获得您的明确授权；</li> 
        <li>您通过互联网进行跨境交易等个人主动行为。</li>
       </ul> 
       <p class="sc_list">6、Cookie的使用</p> 
       <p>Cookie是网页服务器放在您访问设备上的文本文件，会帮助您在后续访问时调用信息，简化记录您填写个人信息的流程。您有权接受 或拒绝Cookie，如果浏览器自动接收Cookie，您可以根据自己的需要修改浏览器的设置以拒绝Cookie。请注意，如果您选择拒绝Cookie， 那么您可能无法完全体验途牛提供的服务。</p> 
       <p class="sc_list">7、个人敏感信息</p> 
       <p>某些特殊的个人信息可能被认为是个人敏感信息，例如您的种族、宗教、个人健康和医疗信息等，这些个人敏感信息将受到严格保护。在此 提醒您，您在使用途牛为您提供的产品及服务中所上传或发布的内容和信息可能会泄露您的个人敏感信息。因此，您需要在使用途牛为您提供的产品或服务前谨慎考 虑。您同意这些个人敏感信息将按照《途牛隐私政策》阐明的目的和方式来进行处理。&nbsp;因此，您需要在使用途牛为您提供的产品或服务前谨慎考虑。您 同意这些个人敏感信息将按照《途牛隐私政策》阐明的目的和方式来进行处理。</p> 
       <p class="sc_list">8、信息安全与保护</p> 
       <p>（1）途牛非常重视信息安全，成立了专门的负责团队。 途牛努力为您提供信息保护，采取了合适的管理、技术以及物理安全措施，参照国内外信息安全标准及最佳实践建立了与业务发展相适应的信息安全保障体系，已获 得ISO27001信息安全管理体系标准认证，及PCI-DSS支付卡行业数据安全标准认证。</p> 
       <p>（2）途牛从数据的生命周期角度出发，在数据收集、存储、显示、处理、使用、销毁等各个环节建立了安全防护措施，根据信息敏感程度 的级别采取不同的控制措施，包括但不限于访问控制、SSL加密传输、AES256bit或以上强度的加密算法进行加密存储、敏感信息脱敏显示等。</p> 
       <p>（3）途牛对可能接触到您信息的员工也采取了严格管理，可监控他们的操作情况，对于数据访问、内外部传输使用、脱敏、解密等重要操 作建立了审批机制，并与上述员工签署保密协议等。与此同时，途牛还定期对员工进行信息安全培训，要求员工在日常工作中形成良好操作习惯，提升数据保护意 识。</p> 
       <p>（4）尽管有前述的安全措施，但同时也请您理解在网络上不存在“完善的安全措施”。途牛会按现有的技术提供相应的安全措施来保护您的信息，提供合理的安全保障，途牛将尽力做到使您的信息不被泄露、损毁或丢失。</p> 
       <p>（5）您的帐户均有安全保护功能，请妥善保管您的帐号及密码信息，切勿将密码告知他人，如果您发现自己的个人信息泄露，特别是您的帐号和密码发生泄露，请您立即与途牛的客服联系，以便途牛采取相应的措施。</p> 
       <p>（6）请您及时保存或备份您的文字、图片等其他信息，您需理解并接受，您接入途牛的服务所用的系统和通讯网络，有可能因途牛可控范围外的因素而出现问题。</p> 
       <p class="sc_list">9、信息事件的处理</p> 
       <p>在不幸发生个人信息安全事件后，途牛将按照法律法规的要求向您告知：安全事件的基本情况和可能的影响、途牛已采取或将要采取的处置 措施、您可自主防范和降低风险的建议、对您的补救措施等。事件相关情况途牛将以邮件、信函、电话、推送通知等方式告知您，难以逐一告知个人信息主体时，途 牛会采取合理、有效的方式发布公告。同时，途牛还将按照监管部门要求，上报个人信息安全事件的处置情况。</p> 
       <p class="sc_list">10、未成年人信息政策</p> 
       <p>途牛非常重视对未成年人个人信息的保护。若您是18周岁以下的未成年人，在使用途牛的服务前，应事先取得您家长或法定监护人的书面同意。</p> 
       <p class="sc_list">11、用户信息管理</p> 
       <p>（1）您可以随时登录“账户管理”个人中心、常用信息等，查询、更正及删除自己的账户信息，修改个人资料、隐私设置、安全设置，修改收货地址等使用途牛服务时您提供的个人信息，如有问题，可以联系途牛客服tuniucs@tuniu.com。</p> 
       <p>（2）您可通过如下路径注销途牛旅游网账户：拨打途牛旅游官网公布的客服电话(如国内：025-86853969)，根据语音提示 转至客服人工服务，由客户验证后完成账号的注销。注销途牛网账户后，您该账户内的个人信息将被立即清空，途牛将不会再收集、使用或共享与该账户相关的个人 信息，但之前的信息途牛仍需按照监管要求的时间进行保存，且在该依法保存的时间内有权机关仍有权依法查询。</p> 
       <p class="sc_list">12、用户信息权益</p> 
       <p>按照中国相关的法律、法规、标准，以及其他国家、地区的通行做法，途牛保障您对自己的个人信息行使以下权利：</p> 
       <p>1.访问您的个人信息</p> 
       <p>您有权访问您的个人信息，法律法规规定的例外情况除外。您可以通过以下方式自行访问您的个人信息：</p> 
       <p>账户信息——您可以通过“账户管理”访问或编辑您的账户中的个人基本资料信息、联系方式信息、更改您的密码、进行账户关联、身份认证等。 如果您无法通过上述链接访问个人信息，您可以通过途牛客服tuniucs@tuniu.com，随时与途牛联系。</p> 
       <p>2. 更正您的个人信息</p> 
       <p>您发现途牛处理的关于您的个人信息有错误时，您有权对错误或不完整的信息作出更正或更新，您可以通过途牛官网公布的客服电话(如国内：025-86853969)随时与途牛联系。为保障安全，途牛将在您行使更正权前对您的身份进行验证。</p> 
       <p>3. 删除您的个人信息</p> 
       <p>在以下情形中，您可以向途牛提出删除个人信息的请求，您可以通过途牛官网公布的客服电话随时与途牛联系：</p> 
       <ul> 
        <li>a). 如果途牛违反法律法规或与您的约定之外的收集、使用、与他人共享或转让您的个人信息；</li> 
        <li>b). 如果途牛违反法律法规规定或与您的约定，公开披露您的个人信息，您有权要求途牛立即停止公开披露的行为，并发布通知要求相关接收方删除相应的信息。</li>
       </ul> 
       <p>当您从途牛的服务中删除信息后，途牛可会立即删除您的个人信息，途牛将不会再收集、使用或共享与该账户相关的个人信息，但之前的信息途牛仍需按照监管要求的时间进行保存，且在该依法保存的时间内有权机关仍有权依法查询。</p> 
       <p>4. 响应您的上述请求</p> 
       <p>为保障安全，您需要提供书面请求，或以其他方式证明您的身份。途牛可能会先要求您验证自己的身份，然后再处理您的请求。</p> 
       <p>对于您合理的请求，途牛原则上不收取费用，但对多次重复、超出合理限度的请求，途牛将视情况收取一定成本费用。对于那些无端重复、 需要过多技术手段（例如，需要开发新系统或从根本上改变现行惯例）、给他人合法权益带来风险或者非常不切实际（例如，涉及备份磁盘上存放的信息）的请求， 途牛可能会予以拒绝。</p> 
       <p>在以下情形中，按照法律法规要求，途牛将无法响应您的上述请求：</p> 
       <ul> 
        <li>a). 与国家安全、国防安全直接相关的；</li> 
        <li>b). 与公共安全、公共卫生、重大公共利益直接相关的；</li> 
        <li>c). 与犯罪侦查、起诉、审判和执行判决等直接相关的；</li> 
        <li>d). 途牛有充分证据表明您存在主观恶意或滥用权利的（如您的请求将危害公共安全和其他人合法权益，或您的请求超出了一般技术手段和商业成本可覆盖的范围）；</li> 
        <li>e). 响应个人信息主体的请求将导致您或其他个人、组织的合法权益受到严重损害的；</li> 
        <li>f). 涉及商业秘密的。</li>
       </ul> 
       <p class="sc_list">12、中国境外对途牛旅游网站的访问</p> 
       <p>如果您从中国大陆以外地区访问途牛网站，请您注意，您的信息可能被传送至、存储于中国大陆，并且在中国大陆进行处理。中国大陆的数 据保护法和其他法律可能与您所在国家/地区的法律不同，但请相信途牛将采取措施保护您的信息。选择使用途牛的服务的同时，您了解并同意您的信息可能被传送 至途牛的网站，并如本隐私政策所诉的与途牛共享信息的第三方。</p> 
       <p class="sc_list">13、特定服务隐私政策的例外适用</p> 
       <p>除某些特定服务外，途牛所有的服务均适用《途牛隐私政策》。特定服务将适用特定的隐私政策。该特定服务的隐私政策构成《途牛隐私政策》的一部分。如任何特定服务的隐私政策与《途牛隐私政策》有不一致之处，则适用特定服务的隐私政策。</p> 
       <p>请您注意，《途牛隐私政策》不适用于以下情况：通过途牛的服务而接入的第三方服务（包括任何第三方网站）收集的信息；通过在途牛服务中进行广告服务的其他公司和机构所收集的信息。</p> 
       <p class="sc_list">14、隐私政策的修订</p> 
       <p>途牛会在必要时修改隐私政策，请您理解，途牛可能会适时修订本隐私政策，途牛将标注本隐私政策最近更新的日期，更新将于发布时生 效。未经您明确同意，途牛不会削减您按照本隐私权政策所应享有的权利。对于重大变更，途牛还会提供更为显著的通知（包括对于某些服务，途牛会通过电子邮件 发送通知，说明隐私权政策的具体变更内容）。请您经常回访本隐私政策，以阅读最新版本，如对最新版本有任何异议，请及时通过上述联系方式与途牛取得联系。</p> 
      </div> 
     </div> 
     <script>var redirectUrl = 'https://i.tuniu.com/ssoConnect';</script>
    </div> 
    <script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript">
        var US = false;
        var PW = false;
        var RP = false;
        var EM = false;
        // 验证用户
        $("input[name='username']").blur(function(){
            var v = $(this).val();//获取输入的值

            if (!v || v.length > 10) {
              $("#username-tip").addClass("err").show();
              $("#username-tip span").html("请输入符合提示规则的用户名");
              US = false;
            } else {
              // 判断数据库中是否存在名字
              $.get('/checkuser',{'user':v},function(data){
                if(data == 1){
                  $("#username-tip").addClass("err").show();
                  $("#username-tip span").html("用户名已存在");
                  US = false;
                }else{
                  $("#username-tip").removeClass("err").show();
                  $("#username-tip span").html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
                  US = true;
                }
              })
            }
        })

        // 验证邮箱
        $("input[name='email']").blur(function(){
            var v = $(this).val();//获取输入的值
            var rule = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;//定义规则
            if (!v || !rule.test(v)) {
              $("#email-tip").addClass("err").show();
              $("#email-tip span").html("非法邮箱格式");
              EM = false;
            } else {
              // 判断数据库中是否存在名字
              $.get('/checkemail',{'email':v},function(data){
                if(data == 1){
                  $("#email-tip").addClass("err").show();
                  $("#email-tip span").html("该邮箱已存在");
                  EM = false;
                }else{
                  $("#email-tip").removeClass("err").show();
                  $("#email-tip span").html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
                  EM = true;
                }
              })
            }
        })

        // 验证密码
        $("input[name='password']").blur(function(){
            var v = $(this).val();//获取输入的值
            var rule = /^(?![\d]+$)(?![a-zA-Z]+$)(?![^\da-zA-Z]+$).{8,16}$/i;//定义规则
            if (!v || v.length < 8 || !rule.test(v)) {
              $("#password-tip").addClass("err").show();
              $("#password-tip span").html("请输入符合提示规则的密码");
              PW = false;
            } else {
              $("#password-tip").removeClass("err").show();
              $("#password-tip span").html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
              PW = true;
            }
        })
        // 确认密码
        $("input[name='repassword']").blur(function(){
            // 获取输入的密码
            var pass = $("input[name='password']").val();
            // 获取当前输入的密码
            var repass = $(this).val();//获取输入的值
            if (pass != repass) {
              $("#repassword-tip").addClass("err").show();
              $("#repassword-tip span").html("两次输入密码不一致");
              RW = false;
            } else {
              $("#repassword-tip").removeClass("err").show();
              $("#repassword-tip span").html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
              RW = true;
            }
        })
          // 点击下一步 表单提交
         $("#reg").submit(function(){
            //trigger 某个元素触发某个事件
            $("input").trigger("blur");
            if(US && PW && RW && EM){
              return true;
            }else{
              return false;
            }  
         });
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
    <!-- <script type="text/javascript" src="/style/home/register/register.js"></script>  -->
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