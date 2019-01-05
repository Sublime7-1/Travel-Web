<div class="veri_box">
    <div class="veri_step">
        <div class="veri_step_pic veri_step_pic1"></div>
        <ul class="clearfix">
            <li class="light">验证身份</li><li>输入新手机</li><li>完成</li>
        </ul>
    </div>
    <div class="veri_con mt50">
        <div class="veri_input">
            <ul class="input-list">
                <li>
                    <div class="input">
                        <label for="email">已验证手机：</label>
                        <span class="yh f16 c_333" id="intl_code_tel">{{$phone}}</span>
                        <input type="hidden" id="hide_tel" value="{{$phone}}">
                    </div>
                </li>
                <!-- 验证码 -->
                <li class="">
                    <div class="input">
                        <label>验证码：</label>
                        <input type="text" value="" placeholder="不区分大小写" name="identify" id="identify" class="txt-m  identify_code txt_grey" maxlength="5">
                        <img id="identify_img" class="identify_img" alt="如验证码无法辨别，点击即可刷新。" style="cursor: pointer; display: inline;" src="/system/code" onclick="this.src='{{url('/system/code')}}?'+Math.random()" width="81" height="25">
                    </div>
                    <div id="codeTip1" class="input-tip">
                        <div class="input-tip-inner">
                            <span class="mr5" id="code_err" style="display: none">请输入正确的验证码</span>
                            <span>看不清，<a class="green change_identify_code" href="javascript:void(0)">换一张</a></span>
                        </div>
                    </div>
                </li>
                <li class="last">
                    <div class="input">
                        <label>手机验证码：</label>
                        <input type="text" value="" placeholder="请输入4位验证码" name="code" id="code" class="txt-m m-verify-code txt_grey" maxlength="4">
                        <button class="sendToPhone" style="cursor: pointer;" id="p_code">获取手机验证码</button>
                    </div>
                    <div id="codeTip" class="input-tip">
                        <div class="input-tip-inner">
                            <span></span>
                        </div>
                    </div>
                </li>
            </ul>
            <input type="hidden" name="emailFlag" id="emailFlag" value="">
            <div class="ml96 mt20"><input type="button" value="下一步" class="veri_btn veri_yellow_btn plr30" id="changephonestep1submit"></div>
        </div>
        <div class="veri_dess">
            <div class="veri_dess_tit">为什么要进行身份验证？</div>
            <div class="veri_dess_con">
                为保障您的账户信息安全，在变更账户中的重要信息时需要进行身份验证，感谢您的理解和支持。
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // 换一张--验证码
    $('.change_identify_code').click(function(){
        $('#identify_img').attr('src',"{{url('/system/code')}}?"+Math.random());
    })

    // 初始化信息
    var YZM = false;
    var CODE = false;

    // 验证码验证
    $("input[name='identify']").blur(function(){
      var yzm = $(this).val();
      $.get('/system/recode',{'param':yzm},function(data){
          // console.log(data);
          if(data == 1){
            $('#code_err').show().html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
            YZM = true 
          }else{
            $('#code_err').show().css('color','red');
            YZM = false; 
          }
      });        
    })

    //获取发送短信校验码按钮 绑定单击事件
    $("#p_code").click(function(){
        alert(1);
        var s = $(this);
         //获取注册的手机号
        p=$('#hide_tel').val();
        //Ajax     
        $.get("/sendsphone",{'p':p},function(data){
            console.log(data);
            if(data.code==000000){
                m=60;
                //定时器
                mytime=setInterval(function(){
                  m--;
                  //m赋值按钮
                  s.html(m+"秒重新发送");
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
                $('#codeTip span').html("服务器麻烦,请稍后再试").css('color','red');
                CODE=false;
            }
        },'json');
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
          $('#codeTip span').html("<img src='/style/home/register/dui.jpg' with='20' height='20'>");
          CODE=true;
        }else if(data==2){
          //校验码不一致
          $('#codeTip span').html("校验码有误").css('color','red');
          CODE=false;
        }else if(data==3){
          //输入校验码为空
          $('#codeTip span').html("校验码为空").css('color','red');
          CODE=false;
        }else if(data==4){
          //验证码过期
          $('#codeTip span').html("校验码已经过期").css('color','red');
          CODE=false;
        }
      });
   });

      // 点击下一步 表单提交
   $("#changephonestep1submit").click(function(){
      //trigger 某个元素触发某个事件 
      $("input").trigger("blur");
      if(CODE && YZM){
        //成功提交,替换页面
        $.get('/home/personalsecurity/phone_two',{},function(data){
            $('.common_div').html(data); 
        })
        // return true;
      }else{
        return false;
      }  
   });
</script>