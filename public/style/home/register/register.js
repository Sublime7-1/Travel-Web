(function (window, $, undefined) {
	var identify_codeFlag = false,
		telCodeFlag = false,
		invite_codeFlag = false;
	var emailValue = $("#email").val();
	var telValue = $("#tel").val();
	var invite_codeValue = $("[name='invite_code']").val();
	var identify_code_value = $("#identify").val();
	$('#travel-info').click(function(){
		if($('#travel-info').is(':checked')) {
			$("#travel-info-tip").removeClass("err");
			$("#travel-info-tip span").html("");
		} else {
			$("#travel-info-tip span").html("请同意并勾选用户协议");
			$("#travel-info-tip").addClass("err");
		}
	});
	$("#registerFrm input:text,input:password").keyup(function (e) {
		if (e.keyCode === 13) {
			$("[name='info_submit']", $(this).parents("form")).trigger("click");
		}
	}).focus(function () {
		if (this.name == 'tel') {
			$("#tel-tip .input-tip-inner span").html("");
			$("#tel-tip").removeClass("err");
			$("#tel-tip .input-tip-inner span").addClass('reg_mes mes_phone');
		}
		if (this.name == 'email') {
			$("#email-tip .input-tip-inner span").html("");
			$("#email-tip").removeClass("err");
			$("#email-tip .input-tip-inner span").addClass('reg_mes h40');
		}
		if (this.name == 'invite_code') {
			$("#inviteTip .input-tip-inner").html("");
			$("#inviteTip").removeClass("err");
		}
		if (this.value) {
			if (this.name == "email") {
				if (emailValue == this.value) {
					return true;
				}
				emailValue = this.value;
				checkData(this);
			} else if (this.name == "tel") {
				if (telValue == this.value) {
					return true;
				}
				telValue = this.value;
				checkData(this);
			} else {
				checkData(this);
			}
			return true;
		}
	}).blur(function () {
		if (this.name == "email") {
			if (emailValue == this.value) {
				return true;
			}
			emailValue = this.value;
			checkData(this);
		} else if (this.name == "tel") {
			if (telValue == this.value) {
				return true;
			}
			telValue = this.value;
			checkData(this);
		} else if (this.name == "invite_code") {
			if (invite_codeValue == this.value) {
				return true;
			}
			invite_codeFlag = false;
			invite_codeValue = this.value;
			checkInviteCode(this);
		} else {
			checkData(this);
		}
	}).on('keyup', function () {
		if (this.name == "email") {
			if (emailValue == this.value) {
				return true;
			}
			identify_codeFlag = false;
			telCodeFlag = false;
			emailValue = this.value;
			checkData(this);
		} else if (this.name == "tel") {
			if (telValue == this.value) {
				return true;
			}
			identify_codeFlag = false;
			telCodeFlag = false;
			telValue = this.value;
			checkData(this);
		} else if (this.name == "invite_code") {
			if (invite_codeValue == this.value) {
				return true;
			}
			invite_codeFlag = false;
			invite_codeValue = this.value;
			checkInviteCode(this);
		} else {
			checkData(this);
		}
	});
	$("#shuru").click(function () {
		$("#invitation").toggle();
	});
	function checkInviteCode(ele) {
		if (ele.value && (ele.value.length == 11 || ele.value.length == 6)) {
			if ((ele.value.length == 6 && new RegExp("^([a-zA-Z0-9])+$").test(ele.value)) || (ele.value.length == 11 && new RegExp("^((166|199|13[0-9])|(15[0-9])|(18[0-9])|14[0-9]|17[0-9])[0-9]{8,8}$").test(ele.value)) || (("c" == ele.value[0] || "C" == ele.value[0]) && new RegExp("^([0-9])+$").test(ele.value.substr(1)))) {
				$("#inviteTip .input-tip-inner").html("检查中...");
				$("#inviteTip").addClass("err");
				//ajax校验邀请码或者手机号码
				$.get("/register/isInviteCodeAvailable?invite_code=" + ele.value, function (json) {
					try {
						var json = eval("(" + json + ")");
					} catch (e) {
						$("#inviteTip .input-tip-inner").html("邀请码填写错误");
						$("#inviteTip").addClass("err");
					}
					if (!json.success) {
						invite_codeFlag = false;
						$("#inviteTip .input-tip-inner").html("邀请码填写错误");
						$("#inviteTip").addClass("err");
					} else {
						invite_codeFlag = true;
						$("#inviteTip .input-tip-inner").html("此邀请码可用");
						$("#inviteTip").removeClass("err");
					}
				});
			} else {
				invite_codeFlag = false;
				$("#inviteTip .input-tip-inner").html("邀请码填写错误");
				$("#inviteTip").addClass("err");
			}
		} else {
			invite_codeFlag = false;
			$("#inviteTip .input-tip-inner").html("邀请码填写错误");
			$("#inviteTip").addClass("err");
		}
	}
	//链接里面的邀请码
    /*
	if (window.location.search && window.location.search.slice(1)) {
		var query = window.location.search.slice(1);
		if (query.match('invite_code')) {
			var queryArr = query.split("&"),
				temp;
			for (var i = 0; i < queryArr.length; i++) {
				temp = queryArr[i].split("=");
				if (temp[0] == 'invite_code' && temp[1]) {
					$("#shuru").trigger("click");
					$("#invite_code").val(temp[1]);
					break;
				}
			}
		}
	}
    */
	function btnCheckAgreed() {
		if ($('#travel-info').is(':checked') == false) {
			$("#travel-info").addClass("err").show();
			$("#travelinfoTip").html("请同意并勾选用户协议");
		} else {
			$("#travelinfoTip").html("");
		}
	}
	$('#travel-info').on('click', btnCheckAgreed);
	$("#input_do_check_password").bind("click", function () {
		var pwdFlag = checkData(document.getElementById("password"));
		var pwdAgainFlag = checkData(document.getElementById("passwordagain"));
		if (!pwdFlag || !pwdAgainFlag) {
			return false;
		}
		var data;
		if ($("#email").length) {
			data = {
				email: $.trim($("#email").val()),
				password: $("#password").val(),
				passwordagain: $("#passwordagain").val(),
				invite_code: $.trim($("#invite_code").val()) || '',
				travel_info: $("#travelInfo").attr("checked") ? 1 : 0,
			}
		} else {
			data = {
				countryId: $('.J_zoneVal').data("id"),
				intlCode: $('.J_zoneHid').val(),
				tel: $.trim($("#tel").val()),
				identify_code: $("#identify").val(),
				tel_code: $("#code").val(),
				password: $("#password").val(),
				passwordagain: $("#passwordagain").val(),
				invite_code: $.trim($("#invite_code").val()) || '',
				travel_info: $("#travelInfo").attr("checked") ? 1 : 0,
				p: $('#p').val()
			}
		}

		$.ajax({
			url: "/register/post",
			type: 'post',
			data: data,
			async: false,
			success: function (json) {
				try {
					var json = eval("(" + json + ")");
				} catch (e) {
					layer.msg("注册失败，请检查您的信息填写是否正确。");
				}

				if (json.success) {
					if (json.is_reg_coupon) {
						layerMsg('恭喜成功注册，请至会员中心查看新会员专享出游大礼包。');
					}
					In('gaAndTac', function () {
						tuniuTracker = _tat.getTracker();
						tuniuTracker.trackEvent('注册_成功');
					});
					if ($("#email").length) {
						stepNext(1);
					} else if ($("#tel").length) {
						stepNext(2);
					}
					var i = 60;
					if (json.invite) {
						$("#invite").css("display", "");
					}
					setInterval(function () {
						if (i !== 0) {
							i--;
							$("#backTime").text(i + "s");
						} else {
							window.location.href = redirectUrl != '' ? redirectUrl : "/login";
						}
					}, 1000);
				} else {
					layer.msg(json.errmsg);
				}
			}
		});
	});

	function checkData(ele, blurCheck) {
		if (!ele) {
			return true;
		}
		var value = $.trim(ele.value);
		switch (ele.name) {
			case "tel":
				if (!value || ($('.J_zoneHid').val() == '0086' && new RegExp(/^1\d{10}$/).test(value) == false)
					|| ($('.J_zoneHid').val() != '0086' && new RegExp("^[0-9]{5,13}$").test(value) == false)) {
					$("#info_submit").attr("disabled", "disabled").addClass("login_btn_gray");
					$("#tel-tip .input-tip-inner span").removeClass('reg_mes mes_phone').html("请输入正确的手机号");
					$("#tel-tip").addClass("err");
					return false;
				} else if (!telCodeFlag) {
					$("#info_submit").attr("disabled", "disabled").addClass("login_btn_gray");
					var url = "/register/isPhoneAvailable";
					$("#tel-tip .input-tip-inner").html("检查中...");
					$("#tel-tip").addClass("err");
					$.ajax({
						url: url,
						data: {
							intlCode: $('.J_zoneHid').val(),
							tel: value
						},
						type: 'post',
						success: function (json) {
							try {
								var json = eval("(" + json + ")");
							} catch (e) {
								$("#tel-tip .input-tip-inner").html("检测失败。");
								$("#tel-tip").addClass("err");
							}
							//fab崩溃
							if (json.errno == "-20") {
								$("body").append('<div class="TipBoxHackBot">' +
									'<div class="BackHack"></div>' +
									'<div class="TipBox">' +
									'<img class="imgTipBox" src="assets/images/tipbox.png">' +
									'</div>' +
									'</div>');
								$("body .TipBoxHackBot").fadeIn();
								$("body .TipBoxHackBot .TipBox").animate({
									marginTop: '-324px'
								}, 500);
								$("body").delegate("div.BackHack", "on",'click', btnCheckAgreed, function () {
									$("div.TipBoxHackBot").fadeOut(200);
									window.setTimeout(function () {
										$("div.TipBoxHackBot").remove();
									}, 200);
								});
								$("#tel-tip .input-tip-inner").html("");
								$("#tel-tip").removeClass("err");

							} else if (!json.success) {
								msg = $('<p>该手机号已存在,您可以</p><ul> <li>▪ 用此号码<a href="/login" style="color:#f9651a;" onclick="document.cookie=\'login_user_name=' + value + '\';">直接登录</a></li> <li>▪ 如忘记密码可用手机号<a href="http://passport.tuniu.com/forget?tel=' + value + '" style="color:#f9651a;" onclick="document.cookie=\'login_user_name=' + value + '\';" >找回密码</a></li> </ul>');
								$(".backForm", msg).click(function () {
									var form = $('<form action="/register/PhoneBack" method="POST"></form>').appendTo('body');
									$("<input type='hidden'>").attr("name", 'tel').attr("value", $("#tel").val()).appendTo(form);
									$("<input type='hidden'>").attr("name", 'hid_invite_code').attr("value", $("#hid_invite_code").val()).appendTo(form);
									$("<input type='hidden'>").attr("name", 'referer').attr("value", $("#referer").val()).appendTo(form);
									form.submit();
								});
								$("#tel-tip .input-tip-inner").html(msg);
								$("#tel-tip").removeClass("err");
							} else {
								msg = '<span>恭喜您，该手机可以注册。</span>';
								$("#info_submit").removeAttr("disabled").removeClass("login_btn_gray");
								$("#tel-tip .input-tip-inner").html(msg);
								$("#tel-tip").addClass("err");
							}
							telCodeFlag = true;
						}
					});
					return true;
				}
				return true;
				break;
			case "identify":
				if (!value || value.length < 4 || new RegExp("^([0-9a-zA-Z])+$").test(value) == false) {
					$("#codeTip1").addClass("err");
					$("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
					return false;
				} else if (!identify_codeFlag && value.length == 4) {
					$.ajax({
						url: "/ajax/checkCaptcha?identify_code=" + value,
						type: "GET",
						success: function (json) {
							try {
								var json = eval("(" + json + ")");
							} catch (e) {
								$("#codeTip1").addClass("err");
								$("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
							}
							if (!json.success) {
								identify_codeFlag = false;
								//$(ele).focus();
								$("#codeTip1").addClass("err");
								$("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
							} else {
								$("#codeTip1").removeClass("err");
								$("#code_err").hide().html("");
								identify_codeFlag = true;
							}
						}
					});
				}
				return identify_codeFlag;
				break;
			case "code":
				if (!value || value.length < 6 || new RegExp("^([0-9])+$").test(value) == false) {
					$("#codeTip").addClass("err").show();
					$("#codeTip span").html("请输入正确的校验码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
					return false;
				} else if (value.length == 6) {
					$("#codeTip").removeClass("err").hide();
					$("#codeTip span").html("");
					return true;
				}
				break;
			case "travel-info":
				if (!$('#travel-info').is(':checked')) {
					$("#travel-info-tip").addClass("err").show();
					$("#travel-info-tip span").html("请同意并勾选用户协议");
					return false;
				} else {
					$("#travel-info-tip span").html("");
					return true;

				}
				break;
			case "password":
				var _rule = /^(?![\d]+$)(?![a-zA-Z]+$)(?![^\da-zA-Z]+$).{8,16}$/i,
					pass = $.trim($(ele).val());
				if (!value || value.length < 8 || !_rule.test(pass)) {
					$('#password-state').hide();
					$("#password-tip").addClass("err").show();
					$("#password-tip span").html("请输入符合提示规则的密码");
					return false;
				} else {
					$('#password-state').show();
					var level_score = 0;
					var rating = 0;
					var numericTest = /[0-9]/;
					var lowerCaseAlphaTest = /[a-z]/;
					var upperCaseAlphaTest = /[A-Z]/;
					var symbolsTest = /[\\.,!@#$%^&*()}{:<>|]/;
					if (numericTest.test(pass)) {
						level_score++;
					}
					if (lowerCaseAlphaTest.test(pass) || upperCaseAlphaTest.test(pass)) {
						level_score++;
					}
					if (symbolsTest.test(pass)) {
						level_score++;
					}
					if (pass.length > 0 && pass.length < 6) {
						rating = 1;
					} else if (level_score < 3 && pass.length >= 6) {
						rating = 2;
					} else if (level_score = 3 && pass.length >= 6) {
						rating = 3;
					}
					if (rating == 1) {
						document.getElementById('pwd_s').value = 1;
						$('#password-state .input-tip-inner span').attr('class', '');
						$('#password-state .input-tip-inner span').addClass('reg_mes mes_pass_weak');
					} else if (rating == 2) {
						$('#password-state .input-tip-inner span').attr('class', '');
						$('#password-state .input-tip-inner span').addClass('reg_mes mes_pass_in');
						document.getElementById('pwd_s').value = 2;
					} else if (rating == 3) {
						$('#password-state .input-tip-inner span').attr('class', '');
						$('#password-state .input-tip-inner span').addClass('reg_mes mes_pass_strong');
						document.getElementById('pwd_s').value = 3;
					}
					$("#password-tip").removeClass("err").hide();
					$("#password-tip span").html("");
					return true;
				}
				break;
			case "passwordagain":
				var _rule = /^(?![\d]+$)(?![a-zA-Z]+$)(?![^\da-zA-Z]+$).{8,16}$/i;
				if (!ele.value || ele.value.length < 8 || !_rule.test($.trim(ele.value))) {
					$("#passwordagain-tip").addClass("err").show();
					$("#passwordagain-tip span").html("请输入符合提示规则的密码");
					return false;
				} else if (ele.value != $("#password").val()) {
					$("#passwordagain-tip").addClass("err").show();
					$("#passwordagain-tip span").html("两次输入的密码不一致");
					return false;
				} else {
					$("#passwordagain-tip").removeClass("err").hide();
					$("#passwordagain-tip span").html("");
					return true;
				}
				break;
			case "email":
				$("#email_info_submit").attr("disabled", "disabled").addClass("login_btn_gray");
				if (!value || value.length < 6 || /^([a-zA-Z0-9_\.-]+)@([a-zA-Z0-9\.-]+)\.([a-zA-Z\.]{2,})$/.test(value) == false) {
					$("#email-tip").addClass("err");
					$(".mes_email").removeClass('reg_mes h40').show().html("请输入正确的邮箱，例如：12345678@qq.com");
					return false;
				} else {
					$("#email-tip").removeClass("err");
					$(".mes_email").removeClass('reg_mes h40').hide().html("");
					var emailFlag = true;
					var url = "/register/isEmailAvailable";
					$("#email-tip").addClass("err");
					$(".mes_email").show().html("检查中...");
					$.ajax({
						url: url,
						data: {
							email: value
						},
						type: 'post',
						success: function (json) {
							try {
								var json = eval("(" + json + ")");
							} catch (e) {
								$("#email-tip").addClass("err");
								$(".mes_email").removeClass('reg_mes h40').show().html("检查失败。");
							}
							if (!json.success) {
								$("#email-tip").addClass("err");
								$(".mes_email").removeClass('reg_mes h40').show().html(json.errmsg);
								emailFlag = false;
								return;
							} else {
								$("#email-tip").addClass("err");
								$(".mes_email").show().html("恭喜您，该邮箱可以注册。");
								$("#email_info_submit").removeAttr("disabled").removeClass("login_btn_gray");
								emailFlag = true;
								return;
							}
						}
					});
					return emailFlag;
				}
				break;
			default:
				return false;
				break;
		}
	}
	//手机发送动态码
	$("#hy-con").bind("click", function () {
		$.layer({
			type: 1,
			title: "途牛会员协议",
			time: 0,
			shadeClose: true,
			maxHeight: 500,
			page: {
				html: $("#dyPop .dyPop_con").html()
			},
			offset: ['150px', ''],
			area: ['700px', '350px']
		});
	});
	$("#privacy-con").bind("click", function () {
		$.layer({
			type: 1,
			title: "途牛隐私政策",
			time: 0,
			shadeClose: true,
			maxHeight: 500,
			page: {
				html: $("#dyPop .pc_con").html()
			},
			offset: ['150px', ''],
			area: ['700px', '350px']
		});
	});
	$(".get-code").bind("click", sendCode);
	$("#info_submit").bind("click", function () {
		//		var flagTel = checkData(document.getElementById("tel"));
		var flagIdentify = checkData(document.getElementById("identify"));
		var flagCode = checkData(document.getElementById("code"));
		var isAgree = checkData(document.getElementById('travel-info'))
		if (!telCodeFlag || !flagIdentify || !flagCode ||!isAgree || ($.trim($("#invite_code").val()) != "" && !invite_codeFlag)) {
			return false;
		}
		var data = {
			intlCode: $('.J_zoneHid').val(),
			tel: $.trim($("#tel").val()),
			identify_code: $("#identify").val(),
			tel_code: $("#code").val()
		}
		$.ajax({
			url: "/register/checkInfo",
			data: data,
			async: false,
			success: function (json) {
				try {
					var json = eval("(" + json + ")");
				} catch (e) {
					layer.msg("请检查您填写的信息！");
				}
				if (json.success) {
					stepNext(1);
				} else {
					layer.msg(json.errmsg);
				}
			}
		});

	});

	function sendCode() {
		var flag1 = checkData(document.getElementById("tel"));
		var flag2 = checkData(document.getElementById("identify"));
		if (flag1 && flag2) {
			$("#code").val('').attr("disabled");
			$(".get-code,.send-code-again").attr("disabled", true);
			$(".get-code,.send-code-again").unbind("click");
			var postData = {
				intlCode: $('.J_zoneHid').val(),
				tel: $("#tel").val(),
				identify_code: $("#identify").val(),
				isReg: 1
			}
			$.post('/ajax/sendMobileCode', postData, function (json) {
				try {
					var json = eval("(" + json + ")");
				} catch (e) {
					layerMsg("动态口令发送失败，请稍候重试。", 2);
					return;
				}
				if (json.success) {
					layerMsg("动态口令已发送，15分钟内有效！");
					$("#code").removeAttr("disabled");
					$(".get-code,.send-code-again").hide();
					intervalTime(60);
				} else {
					$(".get-code,.send-code-again").removeAttr("disabled");
					$(".get-code,.send-code-again").bind("click", sendCode);
					switch (json.errno) {
						case -1:
							$("#tel").focus();
							$("#tel-tip .input-tip-inner span").removeClass('reg_mes mes_phone').html("请输入正确的手机号");
							$("#tel-tip").addClass("err");
							return;
							break;
						case -2:
							$("#identify").focus();
							$("#codeTip1").addClass("err");
							$("#code_err").show().html("请输入正确的验证码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
							return;
							break;
						case -3:
							layerMsg("动态口令发送失败，请稍候重试。", 2);
							return;
							break;
						default:
							layerMsg(json.errmsg, 2);
							break;
					}
				}
			});
		}
	}

	//end

	function layerMsg(msg, type) {
		$.layer({
			title: 0,
			closeBtn: 0,
			time: 3,
			shadeClose: true,
			dialog: {
				type: type || 1,
				msg: "&nbsp;&nbsp;&nbsp;&nbsp;" + msg
			},
			offset: ['90px', '']
		});
	}

	function intervalTime(num) {
		var num = parseInt(num);
		var i = 0;
		$(".send-code").css("display", "inline-block");
		$(".send-code span").text(num);
		var inter = setInterval(function () {
			if (i < num) {
				i++;
				$('.send-code span').text(num - i);
			} else {
				clearInterval(inter);
				$(".send-code-again").css("display", "inline-block").bind("click", sendCode);
				$(".send-code").hide();
				$(".send-code span").text(0);
			}
		}, 1000);
	}

	function intervalEmail(num) {
		var num = parseInt(num);
		var i = 0;
		$("#send_again_60_second").show().val(num + "秒重新发送");
		var inter = setInterval(function () {
			if (i < num) {
				i++;
				$('#send_again_60_second').val(num + "秒重新发送");
			} else {
				clearInterval(inter);
				$("#send_link").show();
				$("#send_again_60_second").val('').hide();
			}
		}, 1000);
	}
	$("#send_link").bind("click", function () {
		$("#send_link").hide();
		intervalEmail(60);
		sendMailFn("again");
	});
	$("#email_info_submit").bind("click", sendMailFn);
	$("#input_do_email_check_code").bind("click", function () {
		var url = getEmaillink($("#email").val());
		window.open(url, "_blank");
	});

	function getEmaillink(email) {
		var temp_array = new Array();
		var temp_array = email.split("@");
		var url = "";
		if (temp_array[1].match("21cn") || temp_array[1].match("qq") || temp_array[1].match("sina") || temp_array[1].match("sohu") || temp_array[1].match("163") || temp_array[1].match("tom") || temp_array[1].match("126") || temp_array[1].match("yeah")) {
			url = "mail." + temp_array[1];
		} else if (temp_array[1].match("yahoo")) {
			url = "mail.cn.yahoo.com";
		} else if (temp_array[1].match("tuniu")) {
			url = "mail.google.com/hosted/tuniu.com";
		} else {
			url = "www." + temp_array[1];
		}
		url = "http://" + url;
		return url;
	}

	function sendMailFn(type) {
		var flag1 = checkData(document.getElementById("email"));
		if (flag1) {
			$("#code").val('').attr("disabled");
			var postData = {
				email: $("#email").val()
			}
			$.ajax({
				url: '/register/sendEmail',
				data: postData,
				type: "POST",
				async: false,
				success: function (json) {
					try {
						var json = eval("(" + json + ")");
					} catch (e) {
						layerMsg("邮件发送失败，请稍候重试。", 2);
						return;
					}
					if (json.success) {
						layerMsg("邮件已发送，请登录邮箱验证");
						stepNext(1);
						intervalEmail(60);
					} else {
						layerMsg(json.errmsg, 2);
					}
				}
			});
		}
	}

	function stepNext(i) {
		$(".main_item:eq(" + i + ")").css({
			"visibility": "visible"
		});
		$("#click_num").val(i);
		$("#mainPart").animate({
			left: -i * $("#user-reg").width() + "px"
		}, 500, "swing", function () {
			$(".main_item:eq(0)").css("visibility", "hidden");
		});
	}
	//找回手机
	$("#agree_submit").click(function () {
		var form = $('<form action="/register/phoneCheck" method="POST"></form>').appendTo('body');
		$("<input type='hidden'>").attr("name", 'tel').attr("value", $("#tel").val()).appendTo(form);
		$("<input type='hidden'>").attr("name", 'invite_code').attr("value", $("#hid_invite_code").val()).appendTo(form);
		$("<input type='hidden'>").attr("name", 'referer').attr("value", $("#referer").val()).appendTo(form);
		form.submit();
	});
	// 返回注册
	$("#leave_submit").click(function () {
		var referer = $('#referer');
		var hid_invite_code = $('#hid_invite_code');
		var form = $('<form action="/register/phone" method="POST"></form>').appendTo('body');
		$("<input type='hidden'>").attr("name", 'referer').attr("value", referer.val()).appendTo(form);
		$("<input type='hidden'>").attr("name", 'invite_code').attr("value", hid_invite_code.val()).appendTo(form);
		form.submit();
	});

	$("#unbindTel").click(function () {
		var tel = $("#tel").val();
		var type = $("#type").val();
		var url = "/register/unbindTel";
		var noticeDiv = $('.phone_validate');
		inputCode = $("#code").val();
		inputCode = inputCode.replace(/(^\s*)|(\s*$)/g, '');
		if (inputCode === "") {
			noticeDiv.removeClass('ok').addClass('err').html('请填写手机验证码');
			return;
		}
		var inputData = {
			"intlCode": $('.J_zoneHid').val(),
			"tel": tel,
			"type": $("#type").val(),
			"code": inputCode
		};
		$.post(url, inputData, function (json) {
			try {
				var json = eval("(" + json + ")");
			} catch (e) {
				noticeDiv.removeClass('ok').addClass('err').html("验证失败，请稍后重试。");
				return;
			}
			if (json.success) {
				noticeDiv.removeClass('err').addClass('ok').html('验证成功。');
				var form = $('<form action="/register/phone" method="POST"></form>').appendTo('body');
				$("<input type='hidden'>").attr("name", 'referer').attr("value", $("#referer").val()).appendTo(form);
				$("<input type='hidden'>").attr("name", 'passVerify').attr("value", 1).appendTo(form);
				$("<input type='hidden'>").attr("name", 'tel').attr("value", tel).appendTo(form);
				form.submit();
			} else {
				noticeDiv.removeClass('ok').addClass('err').html(json.errmsg);
			}
		});
	});

	/* 国际手机号码 区号 */
	(function () {

		var tab1 = new window.zonesGroup();
		tab1.init({
			'input_zone': $('.J_zoneHid'),
			'div_zoneVal': $('.J_zoneVal'),
			'div_zones': $('.J_Zones'),
			'ul_title': $('.J_zonesTitle'),
			'div_tabcont': $('.J_zonesTabcont'),
			'limit_size': 8
		});

	})();

	function getCountryCode() {
		$.get('/ajax/countryCode', function (data) {
			$('.zones_tabcont').html(data);
			$(".li_cont").click(function () {
				$('.J_zoneHid').val($(this).attr('data-zone'));
				checkData(document.getElementById("tel"));
			});
		});
	}
	getCountryCode();
	invite_code = $('#invite_code').val();
	if (invite_code) {
		checkInviteCode(document.getElementById('invite_code'));
	}


})(window, jQuery);
