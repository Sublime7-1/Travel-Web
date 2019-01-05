var MainUrl = window.location.protocol +"//"+ window.location.host;
var PayTypeOption = {
	wallet : 1,
	quickPayNew : 2,
	netbankPay : 3,
	instalment : 4,
	thirdInstalment : 5,
	payPlatform : 6,
	soufuchufa : 7,
	tnb : 8,
	quickPayBind : 9,
	netbankInstalment : 10
};
var PayResultOption = {
	AccountPayResult : 1,
	QuickPayResult : 2
};
var SmsResultOption = {
	NewSmsResult : 1,
	ResendSmsResult : 2
};
var CardBinQueryResult = {
	Success : 0,
	NotDetermined : 1,
    CardNoError : 2,
    NotExists : 3,
    BankNotSupport : 4,
    CardTypeNotSupport : 5,
	SysError : 99
};
var isVerifySfcf=false;
var platformId = 10001;
function queryOrder(orderId, orderType, returnUrl){
	$.ajax({
		type : "post",
		url : MainUrl+contextPath+"/order/getOrderPayStatus",
		dataType:"json",
		data : {
	        "orderId" : orderId,
	        "orderType" : orderType
		},
		async : true,  //.post是异步的，导致同步的全局赋值失败
		success : function(result){
			handleQueryOrderResult(result, orderId, orderType, returnUrl);
		}
	});
}
// 首付出发实名发送短信接口-pc
function sfcfVerifySend() {
    $(".loading_box").show();
    $.ajax({
        type:"post",
        url: MainUrl+contextPath+"/smsservice/sendSFCFSms",
        dataType:"text",
        data:Base64.encode(JSON.stringify({
            "orderId":$("#orderId").val(),
            "orderType": $("#orderType").val(),
            "payChannel":$("#payChannel").val(),
            "payMethod":$("#payMethod").val()||0,
            "payPlatform":platformId,
            "installmentAmount":$("#splitAmount").val(),
            "installmentNum":$("#term").val(),
            "fingerPrint":getFinger(),
            "userIp":""
        })),
        async : false,
        success : function(data){
            $(".loading_box").hide();
            var result=JSON.parse(Base64.decode(data));
            if(result.success){
                if(result.data.phone&&result.data.token){
                    $("#phoneNum").val(result.data.phone);
                    $("#smstoken").val(result.data.token);
                    //首付出发零首付短信发送成功则弹出smsBoxSF
                }
                sfVerifyBox();
            } else  {
                sfVerifyBox(result.msg)
            }
        },
        error : function(error){
            $(".loading_box").show();
            console.log(error);
            $(".sms_box h5 em").html("请求有误,请重新发送");
            return false;
        }
    });
}
function queryCardBin(cardNo){
	var cardBin;
	$.ajax({
		type : "post",
		url : MainUrl+contextPath+"/cardbin/queryBankInfo",
		data : Base64.encode('{"cardNo":'+cardNo+', "isCheckLen":true}'),
		dataType: 'text',
		async : false, //.post是异步的，导致同步的全局赋值失败
		success : function(msg){
			msg = Base64.decode(msg);
			cardBin = eval("(" + msg + ")");
		}
	});
	return cardBin;
}

/* 查询优惠信息 */
function _queryActivity(){
	var obj = null;
	$.ajax({
		url:MainUrl+contextPath+"/cashier/wallet/isActivity",
		type:"post",
        async : false, 
		dataType:"text",
		data: Base64.encode("{\"payAmount\":" + $('#splitAmount').val() + ",\"orderId\":"+$('#orderId').val()+",\"platformId\":10001}"),
		success:function(msg){
			obj = eval("(" + Base64.decode(msg) + ")");
		}
    });
	return obj;
	
}

/* 发送短信 */
function sendSmsSF(){
	$(".loading_box").show();
	$.ajax({
		type:"post",
		url: MainUrl+contextPath+"/smsservice/sendsms",//手机校验地址做了修改
		dataType:"json",
		data:{
			"orderId":$("#orderId").val(),
			"payPlatform":$("#payPlatform").val(),
			"payChannel":$("#payChannel").val(),
			"payMethod":$("#payMethod").val(),
			"idCode":$("#idCode").val(),
			"useCert":$("#useCert").val(),
			"orderType":$("#orderType").val(),
			"fingerPrint":getFinger(),
			"requestNo":$("#tradeRequestNo").val()
		},
		async : true,
		success : function(result){
			$(".loading_box").hide();
			if (dealOrderNotAction(result)) {
				return ;
			}
			 if(result.success){
		    	if($("#phoneNum").val() == ""){
		    		$("#phoneNum").val(result.data.phone);
		    	}
				//首付出发零首付短信发送成功则弹出smsBoxSF
		    	smsBoxSF();
				$("#smstoken").val(result.data.token);
				if (result.data.channelSmsId) {
					$("#channelSmsId").val(result.data.channelSmsId);
				}
			} else if (!dealOrderNotAction(result)) {
				layer.alert(result.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown){
			$(".sms_box h5 em").html("请求有误,请重新发送");
			return false;
		}  
	});
}

/* 发送短信 */
function sendSms(option){
	var activityFlag = 0;
	if ($("#activityFlag").val() == 1 || $("#isQuickPayActivity").val() == 1) {
		activityFlag = 1;
	}
	$(".loading_box").show();
	$.ajax({
		type:"post",
		url: MainUrl+contextPath+"/smsservice/sendsms",//手机校验地址做了修改
		dataType:"json",
		data:{
			"cardNo":$("#cardNo").val(),
			"targetBank":$("#targetBank").val(),
			"phoneNum":$("#phoneNum").val(),
			"orderId":$("#orderId").val(),
			"payPlatform":$("#payPlatform").val(),
			"payChannel":$("#payChannel").val(),
			"payMethod":$("#payMethod").val(),
			"accName":$("#accName").val(),
			"idType": $("#idType").val(),
			"idCode":$("#idCode").val(),
			"activityFlag" : activityFlag,
			"creditValidity":$("#creditValidity").val(),
			"creditCVV":$("#creditCVV").val(),
			"useCert":$("#useCert").val(),
			"amount":$("#splitAmount").val(),
			"orderType":$("#orderType").val(),
			"fingerPrint":getFinger(),
			"requestNo":$("#tradeRequestNo").val()
		},
		async : true,
		success : function(result){
			$(".loading_box").hide();
			if (dealOrderNotAction(result)) {
				return ;
			}
			if(option == SmsResultOption.NewSmsResult){
				handleSmsResult(result);
			} else if(option == SmsResultOption.ResendSmsResult){
				handleResendSmsResult(result);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown){
			$(".sms_box h5 em").html("请求有误,请重新发送");
			return false;
		}  
	});
}

/*提交支付*/
function submitForm(option){
	var isSaveCard = 0;
	if ($("#payType").val() == PayTypeOption.quickPayNew) {
		if ($("#keepCommon").attr("checked")=="checked") {
		    isSaveCard = 1;
		} else {
			isSaveCard = 2;
		}
	} else if ($("#payType").val() == PayTypeOption.instalment) {
		if($("#install_keepcommon").attr("checked")=="checked"){
			isSaveCard=1
		}else{
			isSaveCard=2
		}
	}
	var activityFlag = 0;
	if ($("#activityFlag").val() == 1 || $("#isQuickPayActivity").val() == 1) {
		activityFlag = 1;
	}
	$(".loading_box").show();
	$.ajax({
		type : "post",
		url : MainUrl+contextPath+"/cashier/confirm",
		dataType:"json",
		data : {
			"bizOrderId" : $("#bizOrderId").val(),
	        "payChannel" : $("#payChannel").val(),
	        "payMethod":$("#payMethod").val(),
	        "cardType":$("#cardType").val(),
	        "bankCode":$("#bankCode").val(),
	        "cardNo": $("#cardNo").val(),
	        "targetBank":$("#targetBank").val(),
	        "orderToken":$("#orderToken").val(),
	        "orderType":$("#orderType").val(),
	        "splitAmount":$("#splitAmount").val(),
	        "orderId":$("#orderId").val(),
	        "phoneNum": $("#phoneNum").val(),
	        "accName": $("#accName").val(),
	        "idType": $("#idType").val(),
	        "idCode": $("#idCode").val(),
	        "authCode":$("#authCode").val(),
	        "token":$("#smstoken").val(),
	        "requestNo":$("#tradeRequestNo").val(),
	        "channelSmsId":$("#channelSmsId").val(),
	        "activityFlag" : activityFlag,
	        "creditValidity" : $("#creditValidity").val(),
	        "creditCVV" : $("#creditCVV").val(),
	        "useCert" : $("#useCert").val(),
	        "fingerPrint":getFinger(),
	        "downPaymentFlag":$("#downPaymentFlag").val(),
			"downPayment":$("#downPayment").val(),
			"needDownpayment":$("#needDownpayment").val(),
			"term":$("#term").val(),
			"installment":$("#installment").val(),
			"fee":$("#fee").val(),
			"bizType":$("#bizType").val(),
	        "platformId":platformId,
			"instalmentNum":$("#instalmentNum").val(),
			"applicant":$("#applicant").val(),//第三方分期支付申请人姓名
			"applicantIdCard":$("#applicantIdCard").val(),//第三方分期支付申请人身份证号
			"tourPath":$("#tourPath").val(),
			"isSaveCard":isSaveCard
		    },
		async : false, //.post是异步的，导致同步的全局赋值失败
		success : function(result){
            $(".loading_box").hide();
            if(result.errorCode==2046){
                $(".mask").show();
            }else{
				var orderType = $("#orderType").val();
				if (result.success) {
					orderType = result.data.orderType;
				} else if (dealOrderNotAction(result)) {
					return;
				}
				if(option == PayResultOption.AccountPayResult){
					handleAccountpayResult(result, $("#payChannel").val(), orderType);
				} else if(option == PayResultOption.QuickPayResult){
					handleQuickpayResult(result, orderType);
				}
            }
		}
	});
    $(".loading_box").hide();
}

/*提交支付*/
function paypalConfirm(orderId, orderType){
	$.ajax({
		type : "post",
		url : MainUrl+contextPath+"/paypal/confirm",
		dataType:"json",
		data : {
			"token" : $("#token").val(),
	        "PayerID" : $("#PayerID").val()
		    },
		async : true, //.post是异步的，导致同步的全局赋值失败
		success : function(result){
			if(result.success){
				if(result.data.orderStatus == 0 || result.data.orderStatus == 3){
					paypalTimer.init(orderId, orderType);
					paypalTimer.setReturnUrl(MainUrl+contextPath+"/cashier/"+orderId+"/"+orderType+"/paypalresult");
					paypalTimer.start();
				} else if(result.data.orderStatus == 1){
					window.location.href = MainUrl+contextPath+"/cashier/"+orderId+"/"+orderType+"/paypalresult";
				}
			} else {
				$("#errTip").html(result.msg);
			}
		}
	});
}

function handleSmsResult(result){
    if(result.success){
    	if($("#phoneNum").val() == ""){
    		$("#phoneNum").val(result.data.phone);
    	}
    	if ($("#payMethod").val() == "3" && $("#payChannel").val() != "21") {
    		$("#discountAmountQuickPay").val(result.data.discountAmount);
    		$("#activityDesc").val(result.data.activityDesc);
    	}
		//短信发送成功则弹出smsbox
		smsBoxPopup();
		$("#smstoken").val(result.data.token);
		if (result.data.channelSmsId) {
			$("#channelSmsId").val(result.data.channelSmsId);
		}
	} else {
		layer.alert(result.msg);
	}
}

function handleResendSmsResult(result){
	if(result.success){
    	//重新发送按钮置灰、不可用
    	$('.butg .sms_btn.mar').attr('disabled',"true");
    	$('.butg .sms_btn.mar').addClass("gray");
    	if($('#quickpaycfm').attr("class").indexOf("gray") > 0){
    		//提交按钮恢复
    		$('#quickpaycfm').click(postAuthCode);
    		$('#quickpaycfm').removeClass("gray");
    	}
        $(".sms_box input").focus();
		$("#smstoken").val(result.data.token);
		$("#timer").html("<i></i>秒后重新获取验证码");
		if (result.data.channelSmsId) {
			$("#channelSmsId").val(result.data.channelSmsId);
		}
		
		var splitMoney = $("#splitAmount").val();
		if ($("#payMethod").val() == "3" && $("#payChannel").val() != "21") {
			if (result.data.discountAmount > 0) {
				splitMoney = splitMoney - result.data.discountAmount;
			}
			$('#splitAmountSmsTxt').html('支付' + parseFloat(splitMoney).toFixed(2) + '元');

			if (result.data.activityDesc != null && result.data.activityDesc!= undefined && result.data.activityDesc != '') {
				$('#activityDesc').html(result.data.activityDesc);
				$('#activityDesc').show();
			} else {
				$('#activityDesc').html("");
				$('#activityDesc').hide();
			}
		}
		//计时器开始
		timer.init();
		timer.start();
	} else {
		$(".pop_box").hide();
		layer.alert(result.msg);
	}
}

function handleQuickpayResult(result, orderType){
	if(result.success){
		queryOrderStatusTimer.init(result.data.finalOrderId, 5);
		queryOrderStatusTimer.setOrderType(orderType);
		var resultPath = result.data.finalOrderId;
		if ($("#tradeRequestNo").val()!=null && $("#tradeRequestNo").val()!=undefined && $("#tradeRequestNo").val()!="") {
			resultPath = result.data.finalOrderId+"-"+$("#tradeRequestNo").val();
		}
		queryOrderStatusTimer.setReturnUrl(MainUrl+contextPath+"/cashier/"+resultPath+"/"+orderType+"/payResult");
		queryOrderStatusTimer.start();
	}else{
		$(".loading_box").hide();
		if (result.msg.indexOf("短信") !=-1 || result.msg.indexOf("验证码") != -1) {
			$(".pop_box").show();
			if (result.msg.indexOf("错误次数过多") != -1) {
				$('#quickpaycfm').unbind("click");
				$('#quickpaycfm').addClass("gray");
			}
			//$(".sms_box .error").html(result.msg);
			//$(".sms_box .error").show();
			$(".sms_box h5 em").html(result.msg);
		}else{
			$(".loading_box").hide();
			layer.alert(result.msg);
		}
	}
}

function handleAccountpayResult(result, payChannel, orderType){
	$(".loading_box").hide();
	if(result.success){
		if(payChannel != 12&&payChannel != 103 && payChannel != 112){
			//微信扫码不弹框
			payTipBoxPopup(result.data.finalOrderId, orderType);
		}
		if(payChannel == 24){
			$('body').append(payFormDo(result.data.url));
		}else {
			$('body').append(result.data.url);
		}
	}else{
		if (result.msg.indexOf("短信") !=-1 || result.msg.indexOf("验证码") != -1) {
			$(".pop_box").show();
			if (result.msg.indexOf("错误次数过多") != -1) {
				$('#quickpaycfm').unbind("click");
				$('#quickpaycfm').addClass("gray");
			}
			$(".sms_box .error").html(result.msg);
			$(".sms_box .error").show();
		} else {
			layer.alert(result.msg);
		}
	}
}

function handleQueryOrderResult(result, orderId, orderType, returnUrl){
	if(result.success && (result.data.payStatus==1 || result.data.payStatus == 5)){
		if(returnUrl != ""){
			window.location.href = returnUrl;
		} else {
			var MainUrl = window.location.protocol +"//"+ window.location.host;
			// 显示支付结果页面
			if($("#downPaymentFlag").val() == "1"){
				setTimeout(function() {
					window.location.href = MainUrl+contextPath+"/cashier/"+orderId+"/"+orderType+"/payResult";
				}, 5000);
			}else {
				window.location.href = MainUrl+contextPath+"/cashier/"+orderId+"/"+orderType+"/payResult";
			}
		}
		return true;
	}
}

function payFormDo(urlFrom){
	var form = "<form target=\"_blank\" id=\"paypalsubmit\" name=\"paypalsubmit\" action=\"" +urlFrom + "\" method=\"post\"></form><script>document.forms['paypalsubmit'].submit();</script>";
    return form;
}

function payTipBoxPopup(orderId, orderType){
	var orderIdPath = orderId;
	if ($("#tradeRequestNo").val()!=null && $("#tradeRequestNo").val()!=undefined && $("#tradeRequestNo").val()!="") {
		orderIdPath = orderId+"-"+$("#tradeRequestNo").val();
	}
	$(".pop_box .pop_win").html('<div class="head"><span>登录网上银行支付</span><img class="close" src="https://ssl.tuniucdn.com/img/20160308/jinrong/licai2/checkout/pop_close.png"></div>' +
            '<p>请您在新打开的网上银行页面进行支付，<br>支付完成前不要关闭该窗口</p>' +
            '<div class="butg"><a class="pop_btn confirm mar hover" href="'+MainUrl+contextPath+"/cashier/"+orderIdPath+"/"+orderType+'/payResult">已完成支付</a><a class="pop_btn other hover" href="javascript:window.location.reload()">用其他支付方式</a></div>');
	$(".pop_box .pop_win").off("click").on("click", ".head img", function () {
        location.reload();
    });
	$(".pop_box").show();
	verticalPop();
}

function getCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}

function refreshToPayAmount() {

	if ($("#splitFlag").val() == 0) {
		if ($("#downPaymentFlag").val() == 1) {
			toPayAmount = $("#needDownpayment").val();
		} else {
			toPayAmount = $("#remainAmount").val();

		}
		$("#splitAmount").val(toPayAmount);
		$(".bankOrderInfo .pay_money .fen").html(toPayAmount);
	}
}

function showerma(){
    if($(".order_box .scan_pay").length){
        $(".order_box .pay_money").removeClass("noerma");
    }else{
        $(".order_box .pay_money").addClass("noerma");
    }
}

//输银行卡号获取银行信息
function getCardInfo(obj){
	var cardNo  = obj.value.replace(/\s+/g, "");
	if (cardNo.length < 10) {
		resetCardBin(CardBinQueryResult.SysError, "", false);
	} else if ($("#cardBinQueryResult").val() == -1 || $("#cardBinQueryResult").val() == 99 || $(".input-card-bind .card_info").css('display') == "none") {
		queryBankInfo(cardNo, false);
	}
}

function queryBankInfo(cardNo, isCheckLen){
	var ret = false;
	$.ajax({
		type : "post",
		url : MainUrl+contextPath+"/cardbin/queryBankInfo",
		data : Base64.encode('{"cardNo":'+cardNo+', "isCheckLen":' + isCheckLen + '}'),
		dataType: 'text',
		async : false,
		success : function(msg){
			msg = Base64.decode(msg);
			var cardBin = eval("(" + msg + ")");
			if(cardBin.success){
				bankCode = cardBin.data.bankCode;
				cardType = cardBin.data.cardType;
				bankList = $(".card_pay_box .kj-box .bank-logo");
				for (i=0; i<bankList.length; i++) {
					if (bankList[i].getAttribute("cd") == bankCode) {
						if ((bankList[i].getAttribute("ct") == "3") || (bankList[i].getAttribute("ct") == cardType)) {
							var cardTypeText = "";
							if (cardType == 1) {
								cardTypeText = "信用卡";
								payLimit = bankList[i].getAttribute("cpdl");
							} else {
								cardTypeText = "借记卡";
								payLimit = bankList[i].getAttribute("dpdl");
							}
							payLimits = payLimit.split("-");
							$(".input-card-bind .card_info").html("<span class=\"z\">◆</span><span class=\"y\">◆</span>" +
									"<span cpdl=\"" + bankList[i].getAttribute("cpdl") + "\" " +
									"dpdl=\"" + bankList[i].getAttribute("dpdl") + "\" " +
									"ct=\"" + cardType + "\" " +
									"cd=\"" + bankCode + "\" " +
									"ccm=\"" + bankList[i].getAttribute("ccm") + "\" " +
									"dcm=\"" + bankList[i].getAttribute("dcm") + "\" " +
									"class=\"bank-logo bank-" + bankCode.toLowerCase() + "\"></span>" +
									"<em class=\"xy-bg card-type-check\">" + cardTypeText + "</em>单笔限额 " + payLimits[0] + " 单日限额 " + payLimits[1]);
							$(".input-card-bind .card_info").show();
					        $(".input-card-bind a").addClass("active");
					        $(".input-card-bind .ts").text("").hide();
					        $("#bankCode").val(bankCode);
					        $("#cardBinQueryResult").val(CardBinQueryResult.Success);
					        ret = true;
					        return ;
						} else {
							resetCardBin(CardBinQueryResult.CardTypeNotSupport, "暂不支持此银行卡类型", isCheckLen);
						    ret = false;
						    return ;
						}
					}
				}
				resetCardBin(CardBinQueryResult.BankNotSupport, "暂不支持此银行", isCheckLen);
			    ret = false;
			    return ;
			} else {
				errorMsg = "";
				if (cardBin.errorCode == 21) {
					queryResult = CardBinQueryResult.SysError;
					if (isCheckLen) {
						errorMsg = "卡号格式错误";
						queryResult = CardBinQueryResult.CardNoError;
					} else {
						errorMsg = "暂不支持此银行";
						queryResult = CardBinQueryResult.NotExists;
					}
				} else if (cardBin.errorCode == 38) {
					queryResult = CardBinQueryResult.NotDetermined;
					resetCardBin(CardBinQueryResult.NotDetermined, "", isCheckLen);
				};
				resetCardBin(queryResult, errorMsg, isCheckLen);
				ret = false;
				return ;
			}
		},
	});
	return ret;
}

function resetCardBin(cardBinQueryResult, errorMsg, isSetActive) {
	if (isSetActive || cardBinQueryResult == CardBinQueryResult.NotDetermined
			|| cardBinQueryResult == CardBinQueryResult.CardNoError) {
		$(".input-card-bind a").addClass("active");
	} else {
		$(".input-card-bind a").removeClass("active");
		$(".input-card-bind .card_info").hide();
	}
	if (errorMsg == "") {
		$(".input-card-bind .ts").text("").hide();
	} else {
		$(".input-card-bind .ts").text(errorMsg).show();
	}
	if ((!isSetActive) && ($("#bankCode").val() != "")) {
		$(".input-card-bind .card_info .bank-logo").removeClass("bank-" + $("#bankCode").val().toLowerCase());
	}
	$("#cardBinQueryResult").val(cardBinQueryResult);
}
//分次支付跳转
function setTurnSplitpy(){
    $(".linkInstalments").unbind('click').click(function(e){
        e.stopPropagation();
        if(!$("#splitpay").hasClass("cancle")){
            $("#splitpay").click();
        }
    })
}
/**
 * 检查支付限额
 * @returns 0:没有超出限额、1:无其它可用支付、2:可使用钱包、3:可使用分次
 */
function checkPayLimit() {
	bankCardType = 1;
	cardTypeSel = $(".card_pay_box .card_type input");
	if (cardTypeSel[0].checked) {
		bankCardType = 2;
	} else if (cardTypeSel[1].checked) {
		bankCardType = 1;
	}
	if (bankCardType == 1) {
		payLimit = $(".card_pay_box #quick_new_form_box .card_info .bank-logo").attr("cpdl");
	} else {
		payLimit = $(".card_pay_box #quick_new_form_box .card_info .bank-logo").attr("dpdl");
	}
	payLimits = payLimit.split("-");
	singlePayLimit = parseInt(payLimits[0]);
	payAmount = parseInt($("#splitAmount").val());
	if (singlePayLimit >= payAmount) {
		$(".card_pay_box .btn_box .pay-enter-tips").html("");
		return 0;
	}

	if ((isWalletBindCard && $(".tn_wallet_box .hasBind_field .bank_select_list .card_info:not(.disable)").length) || (!isWalletBindCard && payAmount <= walletMaxLimit)) {
        $(".shoufuchufa").hasClass("active")?$(".card_pay_box .btn_box .pay-enter-tips").html('不满足限额要求，请更换银行卡'):$(".card_pay_box .btn_box .pay-enter-tips").html('不满足限额要求，请更换银行卡或<span class="link_instalments linkInstalments">分次支付</span>');
        //分次支付跳转
        setTurnSplitpy();
		return 2;
	} else if (isSupportFc && !$(".shoufuchufa").hasClass("active")) {
		$(".card_pay_box .btn_box .pay-enter-tips").html('不满足限额要求，请更换银行卡或<span class="link_instalments linkInstalments">分次支付</span>');
        //分次支付跳转
        setTurnSplitpy();
		return 3;
	} else {
		$(".card_pay_box .btn_box .pay-enter-tips").html($("#otherTextForBank").val());
		return 1;
	}
}

function dealOrderNotAction(data) {
	if (data.errorCode == 2041) {
		$(".loading_box").hide();
		$(".pop_box .pop_win").html(
				'<div class="head"><span>订单失效</span></div>' +
				'<p>此订单已为不可支付状态，请重新下单支付</p>' +
				'<div class="butg"><a class="pop_btn confirm hover" href="' + $("#orderInfoUrl").val() + '">确认</a></div>');
		$(".pop_box").show();
		$(".pop_box .pop_win").css("margin-top", -$(".pop_box .pop_win").height()/2);
		return true;
	} else {
		return false;
	}
}

function getFinger() {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == "BSFIT_DEVICEID") {
            return unescape(y);
        }
    }
}