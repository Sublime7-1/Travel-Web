@extends('home.member_public.index')
@section('title','密码设置')
@section('main')
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/style/home/p_pass/user_person.css">
<style type="text/css">
	.container {
	    width: 1190px;
	    margin: 14px auto;
	    overflow: visible;
	    padding: 0 !important;
	    background-color: transparent;
	}
</style>
<!--主体内容开始--> 
<div class="mainDiv"> 
   	<input id="id" type="hidden" value="{{session('userid')}}" name="id" /> 
   	<div class="detail_sub_title">
    	<i></i>密码设置
  	 </div> 
    <!-- <img src="/style/home/p_pass/loadv2.gif" class="loading-img hide" style="margin: 100px;" />  -->
    <div class="common_div password-event change_password"> 
	    <table class="form-table" cellspacing="0" cellpadding="0" border="0"> 
		    <tbody>
			    <tr> 
			       	<td width="80" align="right">当前密码：</td> 
			       	<td width="200"><input type="password" class="txt-m txt-grey" onblur="check_oldpwd();" name="old_pwd" id="old_pwd" tabindex="1" placeholder="请输入当前使用密码" /></td> 
			       	<td>
				        <div id="oldpwd-tip" class="input-tip">
				         <div class="input-tip-inner"></div>
				        </div>
			    	</td> 
			    </tr> 
		        <tr> 
			        <td height="50" align="right">新密码：</td> 
			      	<td height="50"> <input placeholder="请输入新密码" type="password" class="txt-m" style="ime-mode:disabled;" onblur="check_password();" name="password" tabindex="2" id="password" maxlength="16" /></td> 
			        <td height="50"> 
				        <div id="password-tip" class="input-tip"> 
				        	<div class="input-tip-inner"></div> 
				        </div> 
					    <div id="pass_tip" class="pass_tip"> 
					        <span class="page_icon icon_pass_tip">如何设置安全密码</span> 
					        <div class="icon_pass_tip_con">
					         	 建议采用数字和字母混合
					          	<br />避免使用有规律的数字和字母
					          	<br /> 避免与账户名、手机号、生日等部分或完全相同 
					          	<span class="z">◆</span> 
					          	<span class="y">◆</span> 
					        </div> 
				        </div> 
			    	</td> 
		        </tr> 
			    <tr> 
			       <td></td> 
			       <td colspan="2"> 
				        <div class="password-state" id="password-state"> 
					        <div class="password-state-inner txt-grey">
					          	<span>密码由8—16位数字、字母或符号组成，至少含有2种及以上的字符</span>
					        </div> 
				        </div> 
			    	</td> 
			    </tr> 
		      	<tr> 
			        <td align="right">确认密码：</td> 
			        <td>
			       		<input type="password" class="txt-m txt-grey" onblur="check_passwordagain();" id="passwordagain" name="passwordagain" tabindex="3" placeholder="请输入新密码" />
			        </td> 
			        <td>
			        	<div id="passwordagain-tip" class="input-tip">
			         		<div class="input-tip-inner"></div>
			        	</div>
			    	</td> 
		      	</tr> 
			    <tr> 
			        <td></td> 
			        <td> 
			       		<input type="button" class="yellow_btn mt10" onclick="change_pwd();" value="确认" /> 
			       		<span style="color:#ff6600; position:relative; top:1px; display:none;" id="tel_submit_ing">&nbsp;&nbsp;提交中 <img src="/style/home/p_pass/movie.gif" style="" /></span> 
			       	</td> 
			     </tr> 
		    </tbody> 
	    </table> 
    </div> 
    <script type="text/javascript">
   	// 验证旧密码
    function check_oldpwd() {	
	    var old_pwd = $("#old_pwd").val();// 获取当前密码
	    if (old_pwd.indexOf(" ") >= 0) {
	        $('#oldpwd-tip').removeClass('ok');
	        $('#oldpwd-tip').addClass('err');
	        $('#oldpwd-tip .input-tip-inner').html('<p>密码中请不要包含空格</p>');
	        $('#oldpwd-tip .input-tip-inner').show();
	        return false;
	    }

	    old_pwd = old_pwd.replace(/(^\s*)|(\s*$)/g, '');//把密码首尾的空格去掉
	    if (old_pwd == '') {
	        $('#oldpwd-tip').removeClass('ok');
	        $('#oldpwd-tip').addClass('err');
	        $('#oldpwd-tip .input-tip-inner').html('<p>请输入原密码</p>');
	        $('#oldpwd-tip .input-tip-inner').show();
	        return false;
	    }

	    if (old_pwd.length < 8) {
	        $('#oldpwd-tip').removeClass('ok');
	        $('#oldpwd-tip').addClass('err');
	        $('#oldpwd-tip .input-tip-inner').html('<p>请输入符合提示规则的密码</p>');
	        $('#oldpwd-tip .input-tip-inner').show();
	        return false;
	    }

	    var old_pwd = $("#old_pwd").val();// 获取当前密码
	    var id = $('#id').val();// 获取当前登录的用户
	    $.post('/home/personalpass/checkpass',{'id':id,'old_pwd':old_pwd,'_token':"{{ csrf_token() }}"},function(data){
	    	if(data == 1){
	    		$('#oldpwd-tip').addClass('ok');
                $('#oldpwd-tip').removeClass('err');
                $('#oldpwd-tip .input-tip-inner').html("<p><img src='/style/home/register/dui.jpg' with='20' height='20'></p>");
                $('#oldpwd-tip .input-tip-inner').show();
                return true;
	    	}else{
	    		$('#oldpwd-tip').removeClass('ok');
                $('#oldpwd-tip').addClass('err');
                $('#oldpwd-tip .input-tip-inner').html('<p>请输入符合提示规则的密码</p>');
                $('#oldpwd-tip .input-tip-inner').show();
                return false;
	    	}
	    })

	}

	//验证新密码
	function check_password() {
	    var old_pwd = $("#old_pwd").val();//获取旧密码
	    var password = $("#password").val();//获取新密码
	    var password_tip = $('#password-tip');//提示信息
	    var password_tip_inner = $('#password-tip .input-tip-inner');//提示信息
	    var rule = /^(?![\d]+$)(?![a-zA-Z]+$)(?![^\da-zA-Z]+$).{8,16}$/i;//规则

	    // 判断新密码是否存在空格
	    if (password.indexOf(" ") >= 0) {
	        password_tip.removeClass('ok');
	        password_tip.addClass('err');
	        password_tip_inner.html('<p>密码中请不要包含空格</p>');
	        password_tip_inner.show();
	        $('#password-state .password-state-inner').html('<span>密码需由8位数字、字母或符号组成，至少含有2种及以上的字符</span>');
	        return false;
	    }

	    password = password.replace(/(^\s*)|(\s*$)/g, '');
	    // 判断新密码是否为空
	    if (password == '') {
	        password_tip.removeClass('ok');
	        password_tip.addClass('err');
	        password_tip_inner.html('<p>请输入密码</p>');
	        password_tip_inner.show();
	        $('#password-state .password-state-inner').html('<span>密码需由8位数字、字母或符号组成，至少含有2种及以上的字符</span>');
	        return false;
	    }

	    // 判断密码长度和密码是否符合规则
	    if (password.length < 8 || !rule.test(password) || password.length > 16) {
	        $('#password-tip').removeClass('ok');
	        $('#password-tip').addClass('err');
	        password_tip_inner.html('<p>请输入符合提示规则的密码</p>');
	        password_tip_inner.show();
	        return false;
	    }

	    // 判断新旧密码是否一致
	    if (old_pwd == password) {
	        password_tip.removeClass('ok');
	        password_tip.addClass('err');
	        password_tip_inner.html('<p>新密码不能与原密码相同</p>');
	        ;
	        password_tip_inner.show();
	        return false;
	    }

	    // 上面判断都没问题则执行下面的
	    password_tip.removeClass('ok');
	    password_tip.removeClass('err');
	    password_tip_inner.html("<p><img src='/style/home/register/dui.jpg' with='20' height='20'></p>");
	    password_tip_inner.show();
	    return true;
	}

	// 验证确认密码
	function check_passwordagain() {
	    var password = $("#password").val();
	    password = password.replace(/(^\s*)|(\s*$)/g, '');
	    var passwordagain = $("#passwordagain").val();
	    if (passwordagain.indexOf(" ") >= 0) {
	        $('#passwordagain-tip').removeClass('ok');
	        $('#passwordagain-tip').addClass('err');
	        $('#passwordagain-tip .input-tip-inner').html('<p>密码中请不要包含空格</p>');
	        $('#passwordagain-tip .input-tip-inner').show();
	        return false;
	    }
	    passwordagain = passwordagain.replace(/(^\s*)/g, "");
	    if (passwordagain == '') {
	        $('#passwordagain-tip').removeClass('ok');
	        $('#passwordagain-tip').addClass('err');
	        $('#passwordagain-tip .input-tip-inner').html('<p>请输入确认密码</p>');
	        $('#passwordagain-tip .input-tip-inner').show();
	        return false;
	    }
	    if (password != '') {
	        if (passwordagain != password) {
	            $('#passwordagain-tip').removeClass('ok');
	            $('#passwordagain-tip').addClass('err');
	            $('#passwordagain-tip .input-tip-inner').html('<p>两次密码输入不一致，请重新输入</p>');
	            $('#passwordagain-tip .input-tip-inner').show();
	            return false;
	        }
	    }
	    // 上面判断都没问题则执行下面的
	    $('#passwordagain-tip').addClass('ok');
	    $('#passwordagain-tip').removeClass('err');
	    $('#passwordagain-tip .input-tip-inner').html("<p><img src='/style/home/register/dui.jpg' with='20' height='20'></p>").show();
	    return true;
	}

	// 执行确认按钮-->修改密码
	function change_pwd() {
		// 执行检查密码
	    if (!check_password()) {
	        return false;
	    }
	    // 执行检查新密码
	    if (!check_passwordagain()) {
	        return false;
	    }

	    // 获取旧密码
    	var old_pswd = $("#old_pwd").val();
	    // 获取新密码
	    var new_pswd = $("#password").val();
	    // 获取要修改的用户ID
	    var id = $('#id').val();
	    // 路由
	    var url = "/home/personalpass/dopass";
	    $("#tel_submit_ing").show();
	    $.ajax({
	        url: url,
	        type: 'get',
	        dataType: 'json',
	        data: {
	        	old: old_pswd,
	            new: new_pswd,
	            id: id
	        },
	        success: function(data) {
	        	// console.log(data);
	            $("#tel_submit_ing").hide();
	            $("#old_pwd").val('');
	            $("#password").val('');
	            $("#passwordagain").val('');
	            switch (data) {
	                case 1:
	                    layer.alert("恭喜，您的密码修改成功，可能需要等待1到2分钟生效！");
	                    break;
	                case 2:
	                    layer.alert("对不起，密码修改失败，请重试！");
	                    break;
	                default:
	                    layer.alert("原密码填写错误，请重试！");
	                    break;
	            }
	            $('#oldpwd-tip').removeClass('ok');
	            $('#oldpwd-tip').removeClass('err');
	            $('#oldpwd-tip .input-tip-inner').html("<p><img src='/style/home/register/dui.jpg' with='20' height='20'></p>");
	            $('#passwordagain-tip').removeClass('ok');
	            $('#passwordagain-tip').removeClass('err');
	            $('#password-tip').removeClass('ok');
	            $('#password-tip').removeClass('err');
	            $('#passwordagain-tip .input-tip-inner').html('<p></p>');
	            $('#password-state .password-state-inner').html('<span>密码需由8位数字、字母或符号组成，至少含有2种及以上的字符</span>');
	        }
	    });
	}

	//密码强度
	jQuery.fn.passwordStrength = function(options) {
	    var pass = document.getElementById("password");
	    if (pass == null) {
	        return;
	    }
	    document.getElementById("password").maxLength = 16;
	    //var element = this;
	    $(this).live(
	            'keyup',
	            function() {
	                var pass = $.trim($(this).val());
	                var level_score = 0;
	                var rating = 0;
	                var numericTest = /[0-9]/;
	                var lowerCaseAlphaTest = /[a-z]/;
	                var upperCaseAlphaTest = /[A-Z]/;
	                var symbolsTest = /[\\.,!@#$%^&*()}{:<>|]/;
	                if (numericTest.test(pass)) {
	                    level_score++;
	                }
	                if (lowerCaseAlphaTest.test(pass)
	                        || upperCaseAlphaTest.test(pass)) {
	                    level_score++;
	                }
	                if (symbolsTest.test(pass)) {
	                    level_score++;
	                }
	                if (pass.length > 0 && pass.length <= 8) {
	                    rating = 1;
	                } else if (level_score < 3 && pass.length > 8) {
	                    rating = 2;
	                } else if (level_score = 3 && pass.length > 8) {
	                    rating = 3;
	                }
	                if (rating == 1) {
	                    document.getElementById('pwd_s').value = 1;
	                    $('#password-state .password-state-inner span')
	                            .attr('class', '');
	                    $('#password-state .password-state-inner span').text(" ").addClass(
	                            'reg_mes mes_pass_weak').text(" ");
	                } else if (rating == 2) {
	                    $('#password-state .password-state-inner span')
	                            .attr('class', '');
	                    $('#password-state .password-state-inner span').text(" ").addClass(
	                            'reg_mes mes_pass_in');
	                    document.getElementById('pwd_s').value = 2;
	                } else if (rating == 3) {
	                    $('#password-state .password-state-inner span')
	                            .attr('class', '');
	                    $('#password-state .password-state-inner span').text(" ").addClass(
	                            'reg_mes mes_pass_strong');
	                    document.getElementById('pwd_s').value = 3;
	                }
	            });

	    $(this).live('blur', function() {
	        var psw = $("#password").val();
	        if (psw.indexOf(" ") >= 0) {
	            $('#password-tip').removeClass('ok');
	            $('#password-tip').addClass('err');
	            $('#password-tip .input-tip-inner').html('<p>密码中请不要包含空格</p>');
	            $('#password-tip .input-tip-inner').show();
	        }

	        if (psw === '') {
	            $('#password-tip').removeClass('ok');
	            $('#password-tip').addClass('err');
	            $('#password-tip .input-tip-inner').html('<p>请输入密码</p>');
	            $('#password-tip .input-tip-inner').show();
	        }
	        else if (psw.length < 8) {
	            $('#password-tip').removeClass('ok');
	            $('#password-tip').addClass('err');
	            $('#password-tip .input-tip-inner').html('<p>请输入符合提示规则的密码</p>');
	            $('#password-tip .input-tip-inner').show();
	        }
	        else if (psw.length > 16) {
	            $('#password-tip').removeClass('ok');
	            $('#password-tip').addClass('err');
	            $('#password-tip .input-tip-inner').html('<p>请输入16位以下的密码</p>');
	            $('#password-tip .input-tip-inner').show();
	        }
	    });

	    /*Observe KeyDown event to clear the result*/
	    $(this).live('keydown', function() {
	    });

	    return this;
	};
	//页面自动就执行
	$(document).ready(function() {
	    $("#password").passwordStrength();

	    //当前密码和确认密码输入框点击去掉灰色
	    $('.txt-grey').each(function() {
	        $(this).data("txt", $.trim($(this).val()));
	    }).focus(function() {
	        if ($.trim($(this).val()) === $(this).data("txt")) {
	            $(this).val("");
	            $(this).css("color", "#666");
	        }
	    }).blur(function() {
	        if ($.trim($(this).val()) === "" && !$(this).hasClass("txt-grey")) {
	            $(this).val($(this).data("txt"));
	            $(this).css("color", "#bbb");
	        }
	    });
	});
    </script> 
</div> 
<!--主体内容结束--> 
@endsection