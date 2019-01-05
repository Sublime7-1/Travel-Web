<div class="veri_box">
    <div class="veri_step">
        <div class="veri_step_pic veri_step_pic2" style="background-position: 0 -24px;"></div>
        <ul class="clearfix">
            <li class="light">验证身份</li><li class="light">输入新邮箱</li><li>进入原始邮箱重置</li>
        </ul>
    </div>
    <div class="veri_con mt30">
        <!-- <form id="registerFrm" onsubmit="return false;" autocomplete="off" method="post"> -->
            <div class="veri_input">
                <ul class="input-list">
                    <li>
                        <!-- 旧邮箱 -->
                        <input type="hidden" id="old_email" value="{{$email}}">
                        <div class="input">
                            <label for="email">我的新邮箱：</label>
                            <input id="email" class="txt-m " type="text" placeholder="请输入邮箱地址" style="ime-mode:disabled" autocomplete="off" name="email" tabindex="1" value="">
                        </div>
                        <div id="email-tip" class="input-tip" style="width: 214px;">
                            <div class="input-tip-inner">
                                <span></span>
                            </div>
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
                </ul>
                <div class="ml96 mt20"><input type="button" value="发送重置邮件" class="veri_btn veri_yellow_btn plr30" id="changephonestep2submit"></div>
            </div>
        <!-- </form> -->
        <div class="veri_dess">
            <div class="veri_dess_tit">为什么要验证邮箱？</div>
            <div class="veri_dess_con">
                1.验证邮箱可加强账户安全，您可以使用已验证邮箱快速找回密码；<br>
                2.已验证邮箱可用于订单信息、账户资产变动提醒。
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
    var EMAIL = false;

    // 验证邮箱
    $("input[name='email']").blur(function(){
      // 获取新邮箱
      var email = $(this).val();
      // 获取旧邮箱
      var old_email = $('#old_email').val();
      // 判断
      if(!(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/.test(email))){ 
          $('#email-tip span').html("邮箱有误,请重填").css('color','red');
          EMAIL = false; 
      }else if(email == old_email){
          $('#email-tip span').html("新邮箱不能与原始邮箱相同,请重填").css('color','red');
          EMAIL = false;
      }else{
        //判断邮箱是否重复
          $.get('/checkemail',{'email':email},function(data){
          // alert(data);
          if(data==1){
            //邮箱已经注册
            $('#email-tip span').html("邮箱已注册,请重填").css('color','red');
            //把获取校验码按钮 设置禁用
            $("#p_code").attr('disabled',true);
            EMAIL = false;
          }else{
            //邮箱可以使用
            $('#email-tip span').html("<img src='/style/home/register/dui.jpg' with='20' height='20'>恭喜您，该邮箱可以使用").css('color','#666');
            //把获取校验码按钮 设置激活
            $("#p_code").attr('disabled',false);
            EMAIL = true;
          }
        });
      }
    })

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

      // 点击下一步 表单提交
    $("#changephonestep2submit").click(function(){
        //trigger 某个元素触发某个事件
        $("input").trigger("blur");
        // 获取当前用户
        var id = "{{session('userid')}}";
        // 获取输入的邮箱
        var new_email = $("input[name='email']").val();
        // 获取原始邮箱
        var email = $("#old_email").val();
        // 判断
        if(EMAIL && YZM){
          //成功提交,替换页面
          $.get('/home/personalsecurity/sendEmail',{'id':id,'new_email':new_email,'email':email},function(data){
              if(data != 1){
                location.href='/home/personalsecurity/send_success';
              }
          })
          // return true;
        }else{
          return false;
        }  
    });
</script>