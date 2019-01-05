var MainUrl = window.location.protocol +"//"+ window.location.host;
function initSpliPayInfo() {
	$("#orderType").val($("#splitOrderFlag").val() );//订单类型初始化值，防止返回上层页面值没变
	var remainAmount = parseFloat($(".bankOrderInfo .pay_money .fen").html()); 
	//can splitpay ,if not hide split tag, deault display, artificially modify forbid
	//not support split
	if ($("#splitAvailFlag").val()=="0") {
		// has payed before
		if ($("#splitOrderFlag").val()== "2" ) {
			$("#splitAmount").val(remainAmount);//init splitpay amount
		}
		$(".bankOrderInfo .pay_money a").hide();
		return false;
	}
	$(".bankOrderInfo .pay_money a").show();
	$("#splitAmount").val(remainAmount);
	$("#splitAmount").focus(function(){
		var $splitError = $(".bankOrderInfo .pay_money .error_info");
		if ($splitError.is(":visible")) {
			$splitError.html("");
			$splitError.hide();
		}
	});
}

/**
 * 分单支付时，支付金额是否合法
 */
function validSplitPay() {
	if($("#downPaymentFlag").val() == 1){
		return true;
	}
	if ($("#splitAvailFlag").val()=="0") {
		return true;
	}
	if ($("#orderType").val() != "2") {
		return true;
	}
	var $splitError = $(".bankOrderInfo .pay_money .error_info");
	if ($splitError.is(":visible")) {
		return false;
	}
	var value = parseFloat($("#splitAmount").val());
	 if (value=="" || value == "0" ) {
	 	$splitError.html("分次支付金额不能为零");
	 	$splitError.show();
         $(".hasBind_field.active").addClass("no-select");
         $(".pl-item.on").removeClass("on").addClass("disable");
	 	return false;
	 }
	var pat = /^\d+(?:\.\d{1,2})?$/;
	if (pat.exec($("#splitAmount").val()) == null) {
		$splitError.html("请输入有效的金额，整数或两位小数");
		$splitError.show();
        $(".hasBind_field.active").addClass("no-select");
        $(".pl-item.on").removeClass("on").addClass("disable");
		return false;
	}
	var remainAmount = $("#remainAmount").val();
	if (parseFloat(value)>parseFloat(remainAmount)) {
		$splitError.html("您只需支付"+remainAmount+"元");
		$splitError.show();
        $(".hasBind_field.active").addClass("no-select");
        $(".pl-item.on").removeClass("on").addClass("disable");
		return false;
	}
	//剩余金额不得小于信用卡最低分期金额

	//是否当前选中银行卡分期支付
	if($(".card_installment").hasClass("active")){
			if(isPromotion=="true"){
				//银行卡最低分期金额
				var minestPeriod=parseFloat($("#instalment_bind .tips p span").text()||$(".hasBind_field .xy-installment-box li:eq(0) .tips p span").text()).toFixed(2);
				//剩下的待支付金额
				var lastAmount=remainAmount-parseFloat(value);
				//除全额外本此最多支付多少元
				var  mostAmount=(remainAmount-minestPeriod).toFixed(2);
				if(lastAmount!=0&&(lastAmount<minestPeriod)){
					if(mostAmount==minestPeriod){
						$splitError.html("因银行分期存在额度限制，当前只能支付"+minestPeriod+"元或全额");
						$splitError.show();
						$(".hasBind_field.active").addClass("no-select");
						$(".pl-item.on").removeClass("on").addClass("disable");
						return false;
					}else {
						$splitError.html("因银行分期存在额度限制，请输入【"+minestPeriod+"~"+mostAmount+"】或全额");
						$splitError.show();
						$(".hasBind_field.active").addClass("no-select");
						$(".pl-item.on").removeClass("on").addClass("disable");
						return false;
					}
				}
			}else{
                if (parseFloat(remainAmount) >= parseFloat(payMinSingleAmount) && parseFloat(value) <payMinSingleAmount) {
                    $splitError.html("分次金额不能小于"+payMinSingleAmount+"元");
                    $splitError.show();
                    $(".hasBind_field.active").addClass("no-select");
                    $(".pl-item.on").removeClass("on").addClass("disable");
                    return false;
                }
			}
	}else{
        if (parseFloat(remainAmount)>= parseFloat(payMinSingleAmount )&& parseFloat(value) <payMinSingleAmount) {
            $splitError.html("分次金额不能小于"+payMinSingleAmount+"元");
            $splitError.show();
            $(".hasBind_field.active").addClass("no-select");
            $(".pl-item.on").removeClass("on").addClass("disable");
            return false;
        }
	}

	return true;
}
//钱包开户
function kh(bizOrderId, payAmount, isSupportFc) {
   var url = window.location.href;
   var _url = url.split("?")[0];
   var basestr =  Base64.encode(_url);
    window.location.href="http://jr.tuniu.com/account/card/bind/new/"+bizOrderId+"/"+payAmount+"/"+isSupportFc+"/"+basestr.replace(/\//g,'@');
}

function loadTNBPayInfo(){
	var payInfo = $("#tnb_pay");
	$("#payChannel").val(payInfo.attr("pc"));
	$("#payMethod").val(payInfo.attr("pm"));
}

/* 加载快捷绑定卡支付参数 */
function loadQuickPayCardInfo(id){
	var cardInfo = $("#"+id+" .bank-logo");
	var cardType = cardInfo.attr("ct");
	$("#payChannel").val(cardInfo.attr("pc"));
	$("#payMethod").val(cardInfo.attr("pm"));
	$("#cardType").val(cardInfo.attr("ct"));
	$("#bankCode").val(cardInfo.attr("cd"));
	$("#targetBank").val(cardInfo.attr("tbid"));
	$("#phoneNum").val(cardInfo.attr("mb"));
	if(cardType == "1"){
		var year = $("#"+id+"_bindCardYearInput").val().length==2?$("#"+id+"_bindCardYearInput").val():$("#"+id+"_bindCardYearInput").val().substr(2);
		$("#creditValidity").val($("#"+id+"_bindCardMonthInput").val()+year);
		$("#creditCVV").val($("#"+id+"_bindCardCvvInput").val());
	}
}

/* 加载快捷支付表单提交的参数 */
function loadQuickPayInputInfo(id){
	var cardInfo = $("#"+id+"_form_box .card_info .bank-logo");
	var cardType = $(".card_type input:radio[name='tnWalletCardType']:checked").val();
	if(id == "quick_new"){
		cardType = $(".card_type input:radio[name='cardType']:checked").val();
	}
	$("#cardType").val(cardType);
	$("#cardNo").val(trim($("#"+id+"_cardNoInput").val()));
	$("#phoneNum").val($("#"+id+"_phoneNumInput").val());
	if(cardType == "1"){
		//信用卡
		var year = $("#"+id+"_yearInput").val().length==2?$("#"+id+"_yearInput").val():$("#"+id+"_yearInput").val().substr(2);
		$("#payChannel").val(cardInfo.attr("ccm").split("-")[0]);
		$("#payMethod").val(cardInfo.attr("ccm").split("-")[1]);
		$("#creditCVV").val($("#"+id+"_validateInput").val());
		$("#creditValidity").val($("#"+id+"_monthInput").val()+year);
	} else {
		$("#payChannel").val(cardInfo.attr("dcm").split("-")[0]);
		$("#payMethod").val(cardInfo.attr("dcm").split("-")[1]);
	}
	if($("#useCert").val() == "0"){
		$("#accName").val($("#"+id+"_accNameInput").val());
		$("#idType").val(getIdType($("#"+id+"_idTypeInput").val()));
		$("#idCode").val($("#"+id+"_idCodeInput").val());
	}
	$("#bankCode").val(cardInfo.attr("cd"));
	$("#targetBank").val("0");
}

function loadAccountpayInfo(payChannel, payMethod){
	$("#payChannel").val(payChannel);
	$("#payMethod").val(payMethod);
	$("#bankCode").val("");
	$("#cardType").val("");
}

function loadNetbankPayInputInfo(id){
	var cardInfo = $("#"+id+"_form_box .card_info .bank-logo");
	var cardType = $(".card_type input:radio[name='tnWalletCardType']:checked").val();
	if(id == "quick_new"){
		cardType = $(".card_type input:radio[name='cardType']:checked").val();
	}
	$("#cardType").val(cardType);
	if(cardType == "1"){
		//信用卡
		$("#payChannel").val(cardInfo.attr("ccm").split("-")[0]);
		$("#payMethod").val(cardInfo.attr("ccm").split("-")[1]);
	} else {
		$("#payChannel").val(cardInfo.attr("dcm").split("-")[0]);
		$("#payMethod").val(cardInfo.attr("dcm").split("-")[1]);
	}
	$("#bankCode").val(cardInfo.attr("cd"));
}

/* 短信验证码弹出框 */
function smsBoxPopup(){
	var phoneNum = $("#phoneNum").val();
	if(phoneNum.indexOf("*") == -1){
		phoneNum = phoneNum.substring(0,3)+"****"+phoneNum.substring(7);
	}
	var splitMoney = $("#splitAmount").val();
	var htmlActivity = "";
	if($("#activityFlag").val() == "1" && $("#payChannel").val() == "21") {
		discountAmount = parseInt($("#discountAmount").val());
		splitMoney = splitMoney - discountAmount;
	} else if ($("#payMethod").val() == "3" && $("#payChannel").val() != "21") {
		discountAmount = parseInt($("#discountAmountQuickPay").val());
		if (discountAmount > 0) {
			splitMoney = splitMoney - discountAmount;
		}
		if ($("#activityDesc").val() != null && $("#activityDesc").val() != undefined && $("#activityDesc").val() != "") {
			htmlActivity = '<h6 id="activityDesc" style="margin-bottom:10px">'+ $("#activityDesc").val() + '</h6>';
		} else {
			htmlActivity = '<h6 id="activityDesc" style="margin-bottom:10px;display:none"></h6>';
		}
	}
	var smsAmount = (splitMoney!="" &&splitMoney!=null &&splitMoney>0) ? splitMoney : $("#amount").val();
	htmlText = '<div class="head"><span>请输入短信验证码</span><img class="close" src="https://ssl.tuniucdn.com/img/20160308/jinrong/licai2/checkout/pop_close.png" m="点击_立即支付_短信验证码_关闭按钮"></div>' +
					'<div class="sms_box">' +
					'<h3 id="splitAmountSmsTxt">支付'+parseFloat(smsAmount).toFixed(2)+'元</h3>' +
					'<h4 style="margin-bottom:10px">( 已发送至'+phoneNum+' )</h4>' +
					htmlActivity +
					'<input type="text" value="" onkeyup="filter(this)" maxlength="6" style="font-size:28px;letter-spacing:12px;text-align:center;font-family:微软雅黑"/>' +
					'<h5><em>短信验证码已发送，请查收</em><span id="timer"><i></i>秒后重新获取验证码</span></h5>' +
					'<i class="error">验证码输入错误</i><!--错误提醒-->' +
					'<div class="butg"><a class="sms_btn gray mar" href="javascript:void(0);" id="resend" m="点击_立即支付_短信验证码_重新获取">重新获取</a><a class="sms_btn hover" href="javascript:void(0);" id="quickpaycfm" m="点击_立即支付_短信验证码_确认">确认</a></div></div>';
	$(".pop_box .pop_win").html(htmlText);
	$('.butg .sms_btn.mar').attr('disabled',"true");
	$('.butg .sms_btn.mar').addClass("gray");
	$(".pop_box .pop_win").off("click").on("click", ".head img", function () {
        $(".pop_box").hide();
    });
	$(".pop_box").show();
	verticalPop();
    $(".sms_box input").focus();
    //计时器
    timer.init();
    timer.start();
    //快捷支付确认付款
	$("#quickpaycfm").click(postAuthCode);
	//重新发送短信
	$("#resend").click(function(){
		sendSms(SmsResultOption.ResendSmsResult);
	});
}

/* 首付出发零首付短信验证码弹出框 */
function smsBoxSF(){
	var phoneNum = $("#phoneNum").val();
	if(phoneNum.indexOf("*") == -1){
		phoneNum = phoneNum.substring(0,3)+"****"+phoneNum.substring(7);
	}
	var plan =  $(".shoufuchufa .fq-list .fq-item.on");
	var payedAmount = $("#payedAmount").val();
	$(".pop_box .pop_win").html('<div class="head"><span>请确认使用首付出发支付</span><img class="close" src="https://ssl.tuniucdn.com/img/20160308/jinrong/licai2/checkout/pop_close.png" m="点击_立即支付_短信验证码_关闭按钮"></div>' +
            '<div class="sms_box">' +
            '<h4 class="remar">( 已发送至' + phoneNum + ' )</h4>' +
            '<p>您正在使用首付出发完成本次支付，已付<b>'+payedAmount+'</b>元，剩余款项分<b>'+plan.attr("term")+'</b>期还，每期还款<b>'+plan.attr("installment")+'</b>元。</p>' +
            '<input type="text" value="" onkeyup="filter(this)" maxlength="6" style="font-size:28px;letter-spacing:12px;text-align:center;font-family:微软雅黑"/>' +
            '<h5><em>短信验证码已发送，请查收</em><span id="timer"><i></i>秒后重新获取验证码</span></h5>' +
            '<i class="error">验证码输入错误</i><!--错误提醒-->' +
            '<div class="butg"><a class="sms_btn gray mar" href="javascript:void(0);" id="resendSf" m="点击_立即支付_短信验证码_重新获取">重新获取</a><a class="sms_btn hover" href="javascript:void(0);" id="sfpaycfm" m="点击_立即支付_短信验证码_确认">确认</a></div></div>');
	$('.butg .sms_btn.mar').attr('disabled',"true");
	$('.butg .sms_btn.mar').addClass("gray");
	$(".pop_box .pop_win").off("click").on("click", ".head img", function () {
        $(".pop_box").hide();
    });
	$(".pop_box").show();
    verticalPop();
    $(".sms_box input").focus();
    //计时器
    timer.init();
    timer.start();
	//重新发送短信
    $("#sfpaycfm").click(postAuthCode);
	$("#resendSf").click(function(){
		sendSmsSF();
	});
}
// 首付出发验证码弹框
function sfVerifyBox(errorMsg) {
    var phoneNum = $("#phoneNum").val();
    if(phoneNum.indexOf("*") == -1){
        phoneNum = phoneNum.substring(0,3)+"****"+phoneNum.substring(7);
    };
    var tipsInfo="";
    var hasSend="";
    var countNum='';
    if(errorMsg){
        tipsInfo=errorMsg
    }else{
        countNum='<h5 style="margin-bottom: 0"><span id="timer"><i></i>秒后重新获取验证码</span></h5>'
        hasSend="( 已发送至"+phoneNum+")";
        tipsInfo="(请在认证完成后15分钟内完成支付)";
    }
    var htmlText =
        '<div class="head">' +
        '<span>请输入短信验证码</span>' +
        '<img class="close" onclick="closeSfcfVerify()" src="https://ssl.tuniucdn.com/img/20160308/jinrong/licai2/checkout/pop_close.png" m="点击_立即支付_短信验证码_关闭按钮">' +
        '</div>' +
        '<div class="sms_box">' +
        '<h3 style="font-size:18px;">为确保您首付出发账户安全，需短信确认身份</h3>' +
        '<h4 style="margin-bottom:10px">'+hasSend+'</h4>' +
        '<h4 style="margin-bottom:10px;color: red">'+tipsInfo+'</h4>' +
        '<input type="text" value="" onkeyup="filter(this)" maxlength="6" style="font-size:28px;letter-spacing:12px;text-align:center;font-family:微软雅黑"/>' +
        countNum+
        '<i class="error" style="display:inline-block; position: initial;margin: 10px 0;"></i><!--错误提醒-->' +
        '<div class="butg"><a class="sms_btn gray mar" href="javascript:void(0);" id="sfcf-resend" m="点击_立即支付_短信验证码_重新获取">重新获取</a><a class="sms_btn hover" href="javascript:void(0);" id="sfcf-verify" m="点击_立即支付_短信验证码_确认">确认</a></div></div>';
    $(".pop_box .pop_win").html(htmlText);
    $('.butg .sms_btn.mar').attr('disabled',"true");
    $('.butg .sms_btn.mar').addClass("gray");
    $(".pop_box .pop_win").off("click").on("click", ".head img", function () {
        $(".pop_box").hide();
    });
    $(".pop_box").show();
    verticalPop();
    $(".sms_box input").focus();
    //计时器
    timer.init();
    timer.start();
    //确认认证
    $("#sfcf-verify").click(sfcfVerifyCode);
    //重新发送短信
    $("#sfcf-resend").click(function(){
        sfcfVerifySend();
    });
}
// 关闭首付出发验证码弹框
function closeSfcfVerify() {
    $(".shoufuchufa").trigger("click");
}
function postAuthCode(){
	$("#authCode").val($(".sms_box input").val());
	if(!validate4submit()){
		return;
	}
	$(".pop_box").hide();
	$(".loading_box").show();
	if($("#payMethod").val() == "2"){
		//认证支付需要跳转第三方页面
		submitForm(PayResultOption.AccountPayResult);
	} else {
		//提交表单
		submitForm(PayResultOption.QuickPayResult);
	}
}
// 输入首付出发身份短信验证
function sfcfVerifyCode() {
    $("#authCode").val($(".sms_box input").val());
    if(!validate4submit()){
        return;
    }
    $(".loading_box").show();
    $.ajax({
        type:"POST",
        url:MainUrl+contextPath+"/smsservice/verifySFCFSms",
        data:Base64.encode(JSON.stringify({
            "authCode": $("#authCode").val(),
            "payPlatform":platformId,
            "token":$("#smstoken").val(),
            "orderId":$("#orderId").val()
        })),
        async : true,
        dataType:"text",
        success : function(msg){
            $(".loading_box").hide();
            var data=JSON.parse(Base64.decode(msg));
            if(data.success){
                $(".pop_box").hide();
                isVerifySfcf=true;
                setTimeout(function () {
                    isVerifySfcf=false
                },900000)
            }else {
                $(".sms_box .error").text(data.msg);
            }
        },
        error:function (result) {
            $(".loading_box").hide();
            $(".sms_box .error").html(result.msg);
            $(".sms_box .error").show();
        }
    })
    $(".loading_box").hide();
}
function cardNoValidate(cardNo, cardType, bankCode){
	var result = new Object();
	result.success = true;
	result.msg = null;
	cardNo = trim(cardNo);
	var cardBin = queryCardBin(cardNo);
	if(cardBin.success){
		if(cardBin.data.bankCode != bankCode){
			result.success = false;
			result.msg = "卡号与所选银行不匹配，请重新输入";
		}
		if(cardBin.data.cardType != cardType){
			result.success = false;
			result.msg = (cardType == "1" ? "请输入正确的信用卡卡号" : "请输入正确的借记卡卡号");
		}
	}else{
		result.success = false;
		result.msg = "请输入正确的卡号";
	}
	return result;
}

/* 表单检查 */
function validate4submit(){
	if($("#authCode").val() == "" || $("#authCode").val().length != 6){
		$(".sms_box h5 em").html("请输入6位短信验证码");
		return false;
	}
	return true;
}

function postResult(paras, url) {        
	// 用表单来实现跳转链接，并且传递参数，主要是支付结果的参数值和订单详情链接
	var page = document.createElement("form");        
	page.action = url;        
	page.method = "post";        
	page.style.display = "none"; 
	for (var para  in paras) {        
	    var element = document.createElement("input");     
		element.type = "text";
		element.id = para; 
		element.name = para; 
		element.setAttribute("value", paras[para]);
	    page.appendChild(element);        
	}        
	document.body.appendChild(page);        
	page.submit();        
	return page;        
}

//首付出发零首付
function SFSubmit(){
	// 获取当前选中的 li
	
	$("#payChannel").val(5);
	$("#payMethod").val(5);
	$("#payType").val(PayTypeOption.soufuchufa);
	sendSmsSF();
}

//途牛宝支付
function tnbPaySubmit(){
	if (!validSplitPay()) {
		return ; //valid splitpay first
	}
	
	var payInfo = $("#tnb_pay");
	$("#payChannel").val(payInfo.attr("pc"));
	$("#payMethod").val(payInfo.attr("pm"));
	$("#payType").val(PayTypeOption.tnb);
	sendSms(SmsResultOption.NewSmsResult);
}

//快捷新卡支付
function newPaySubmit(id){

	if (id == "quick_new" && checkPayLimit() != 0) {
		return;
	}
	
	if(id == undefined){
		return ;
	}
	if (!validSplitPay()) {
        return ; //valid splitpay first
	}
	
	var flag = quickpayValidate(id);
	if(!flag){
		return;
	}
	
	loadQuickPayInputInfo(id);
	$("#payType").val(PayTypeOption.quickPayNew);
	//发送短信
    sendSms(SmsResultOption.NewSmsResult);
}

function netbankPaySubmit(id){
	if(!validSplitPay()){
        return;
	}
	loadNetbankPayInputInfo(id);
	$("#payType").val(PayTypeOption.netbankPay);
	submitForm(PayResultOption.AccountPayResult);
}

//绑定快捷卡支付
function bindPaySubmit(id){
	if(id == undefined){
		return ;
	}
	if (!validSplitPay()) {
        return ; //valid splitpay first
	}
	
	var cardInfo = $("#"+id+" .bank-logo");
	var cardType = cardInfo.attr("ct");
	
	if(cardType == "1"){
		var result = payCardCheckFormat(id);
		if(result.msg != null){
			showErrorTips(result.obj, result.msg);
			return ;
		}
	}

	loadQuickPayCardInfo(id);
	//smsBoxPopup();
	$("#payType").val(PayTypeOption.quickPayBind);
	
	//支付超限，选择其他支付方式提示
	if (bigPayLines != 0) {
		if (id == 'wallet_bind') {
			var payFlag = $(".tn_wallet_box .choose_pay .hasBind_field .bank_select_box .selected_box .card_info .bank-logo").attr("payFlag");
			if(payFlag == "2"){
				$(".tn_wallet_box .pay-enter .pay-enter-tips").text($("#splitTextForBindCard").val());
				return;
			}
		} else if (id == 'quick_bind') {
			var payFlag = $(".card_pay_box .choose_pay .hasBind_field .bank_select_box .selected_box .card_info .bank-logo").attr("payFlag");
			if(payFlag == "1"){
				$(".card_pay_box .pay-enter .pay-enter-tips").text($("#walletTextForBindCard").val());
				return;
			}else if(payFlag == "2"){
				$(".card_pay_box .pay-enter .pay-enter-tips").text($("#splitTextForBindCard").val());
				return;
			}
		}
	}
    
	sendSms(SmsResultOption.NewSmsResult);
}

//分次支付查询是否可参加优惠
function queryActivity(){
    if (!validSplitPay()) {
        return;
	}
	
	if ($("#activityFlag").attr("_v") == "1" || $("#isQuickPayActivity").attr("_v") == "1"){
		var obj = _queryActivity(); 
		refreshActivityInfo(obj);
	}
}

/* 平台支付 */
function accountpaySubmit(payChannel,payMethod){

	if (!validSplitPay()) {
        return;
	}
	if(payChannel == 24){
		var remainAmount = parseFloat($("#remainAmount").val());
		var splitAmount = parseFloat($("#splitAmount").val());
		if (splitAmount != remainAmount) {
			layer.alert("Paypal暂不支持分次支付，请选择其他支付方式支付订单!");
			return ;
		}
	}
	loadAccountpayInfo(payChannel, payMethod);
	$("#payType").val(PayTypeOption.payPlatform);
	submitForm(PayResultOption.AccountPayResult);
}

function quickpayValidate(id){
	var result = quickpayCheckNull(id);
	if(!result.success){
		showErrorTips(result.obj, null);
		return false;
	}
	result = quickpayCheckFormat(id);
	if(result.msg != null){
		showErrorTips(result.obj, result.msg);
		return false;
	}
	return true;
}
//新卡快捷支付check
function quickpayCheckNull(id){
	var cardType = $(".card_type input:radio[name='tnWalletCardType']:checked").val();
	if(id == "quick_new"){
		cardType = $(".card_type input:radio[name='cardType']:checked").val();
	}
	
	var result = new Object();
	result.success = false;
	result.obj = null;
	result.msg = null;
	if($("#"+id+"_cardNoInput").val() == ""){
		result.obj = $("#"+id+"_cardNoInput");
		return result;
	}
	//信用卡
	if(cardType == "1"){
		if($("#"+id+"_monthInput").val() == ""){
			result.obj = $("#"+id+"_monthInput");
			return result;
		}
		if($("#"+id+"_yearInput").val() == ""){
			result.obj = $("#"+id+"_yearInput");
			return result;
		}
		if($("#"+id+"_validateInput").val() == ""){
			result.obj = $("#"+id+"_validateInput");
			return result;
		}
	}
	if($("#useCert").val()=="0"){
		if($("#"+id+"_accNameInput").val() == ""){
			result.obj = $("#"+id+"_accNameInput");
			return result;
		}
		if($("#"+id+"_idTypeInput").val() == ""){
			result.obj = $("#"+id+"_idTypeInput");
			return result;
		}
		if($("#"+id+"_idCodeInput").val() == ""){
			result.obj = $("#"+id+"_idCodeInput");
			return result;
		}
	}
	if($("#"+id+"_phoneNumInput").val() == ""){
		result.obj = $("#"+id+"_phoneNumInput");
		return result;
	}
	result.success = true;
	return result;
}

function quickpayCheckFormat(id){
	var result = new Object();
	var cardInfo = $("#"+id+"_form_box .card_info .bank-logo");
	var cardType = $(".card_type input:radio[name='tnWalletCardType']:checked").val();
	if(id == "quick_new"){
		if (cardInfo.attr("ct") == "3") {
			cardType = $(".card_type input:radio[name='cardType']:checked").val();
		} else {
			cardType = cardInfo.attr("ct");
		}
	}
	var bankCode = cardInfo.attr("cd");
	var cardNo = $("#"+id+"_cardNoInput").val();
	result.success = false;
	result.obj = null;
	result.msg = null;
	var res = cardNoValidate(cardNo, cardType, bankCode);
	if(!res.success){
		result.obj = $("#"+id+"_cardNoInput");
		result.msg = res.msg;
		return result;
	}
	if(cardType == "1"){
		if($("#"+id+"_monthInput").val().length != 2){
			result.obj = $("#"+id+"_monthInput");
			result.msg = "请输入正确的有效期";
			return result;
		}
		if($("#"+id+"_yearInput").val().length != 4 && $("#"+id+"_yearInput").val().length != 2){
			result.obj = $("#"+id+"_yearInput");
			result.msg = "请输入正确的有效期";
			return result;
		}
		if($("#"+id+"_validateInput").val().length != 3){
			result.obj = $("#"+id+"_validateInput");
			result.msg = "请输入有效的卡验证码";
			return result;
		}
	}
	if($("#useCert").val()=="0"){
		var id_type_value = $("#"+id+"_idTypeInput").val();
		var id_type=getIdType(id_type_value);
		if (id_type===0) {
			result.obj = $("#"+id+"_idTypeInput");
			result.msg = "请选择证件类型";
			return result;
		}
		var id_code_value=$("#"+id+"_idCodeInput").val();
		$("#accName").val($("#"+id+"_accNameInput").val());
		var name=$("#accName").val();
		if(id_type==1&&!idnumValidate(id_code_value)){
			result.obj = $("#"+id+"_idCodeInput");
			result.msg = "请输入有效的身份证号";
			return result;
		} else if (id_type==2 && !checkPassport(id_code_value)) {
			result.obj = $("#"+id+"_idCodeInput");
			result.msg = "请输入有效的护照号";
			return result;
		} else if (id_type ==3 && !checkOfficepass(id_code_value)) {
			result.obj = $("#"+id+"_idCodeInput");
			result.msg = "请输入有效的军官证号";
			return result;
		} else if (id_type==4 && !checkHMVisitor(id_code_value)) {
			result.obj = $("#"+id+"_idCodeInput");
			result.msg = "请输入有效的回乡证号";
			return result;
		} else if (id_type==5 && !checkTaiVisitor(id_code_value)) {
			result.obj = $("#"+id+"_idCodeInput");
			result.msg = "请输入有效的台胞证号";
			return result;
		}
        if(!checkName(id_type,name)){
            result.obj = $("#"+id+"_accNameInput");
            result.msg = "请输入有效的姓名";
            return result;
        }
	}
	if(!checkMoblie($("#"+id+"_phoneNumInput").val())){
		result.obj = $("#"+id+"_phoneNumInput");
		result.msg = "请输入正确的手机号";
		return result;
	}
	result.success = true;
	return result;
}

function getIdType(type) {
	for (var certType in certIdtypes) {
		if (certIdtypes[certType]===type) {
			return certType;
		}
	}
	return 0;
}

function payCardCheckFormat(id){
	var result = new Object();
	result.success = false;
	result.obj = null;
	result.msg = null;
	if($("#"+id+"_bindCardMonthInput").val().length != 2){
		result.obj = $("#"+id+"_bindCardMonthInput");
		result.msg = "请输入正确的有效期";
		return result;
	}
	if($("#"+id+"_bindCardYearInput").val().length != 4 && $("#"+id+"_bindCardYearInput").val().length != 2){
		result.obj = $("#"+id+"_bindCardYearInput");
		result.msg = "请输入正确的有效期";
		return result;
	}
	if($("#"+id+"_bindCardCvvInput").val().length != 3){
		result.obj = $("#"+id+"_bindCardCvvInput");
		result.msg = "请输入有效的卡验证码";
		return result;
	}
	result.success = true;
	return result;
}

function showErrorTips(obj, msg){
	if(msg != null && msg != ""){
		$(obj).addClass("error").parents("ul").find(".ts").text(msg).show();
	} else {
		$(obj).addClass("error").parents("ul").find(".ts").text("请输入"+$(obj).parents("ul").find(".label").text()).show();
	}
}
//短信框 高度计算
function verticalPop(){
   $(".pop_box .pop_win").css("margin-top", -$(".pop_box .pop_win").height()/2);
}
function trim(str){
	return str.replace(/\s/g,"");
}

function filter(obj){ 
	obj.value=obj.value.replace(/[^\d\s]/g,'');
}

function idCodeValidate(idCode){
	var regexp = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/;
	return regexp.test(idCode.toUpperCase());
}

//验证护照是否正确
function checkPassport(number){
	var re1 = /^[a-zA-Z]{5,17}$/;
    var re2 = /^[a-zA-Z0-9]{5,17}$/;
	return (re1.test(number)) || re2.test(number);
}

//验证军官证是否正确
function checkOfficepass(number){
	var expression=/^[a-zA-Z0-9]{7,21}$/;
	return expression.test(number);
}

//验证台湾通行证是否正确
function checkTaiVisitor(number) {
	var re1 = /^[0-9]{8}$/;
    var re2 = /^[0-9]{10}$/;
    return (re1.test(number)) || re2.test(number);
}

//验证港澳通行证是否正确
function checkHMVisitor(number) {
	var re = /^[HMhm]{1}([0-9]{10}|[0-9]{8})$/;
	return re.test(number);
}

//校验手机号
function checkMoblie(mobile){
	var regexp = /^1[3|4|5|6|7|8|9][0-9]\d{8}$/;
	return regexp.test(mobile);
}
//校验实名姓名是否符合规则
function checkName(idType,name) {
	//身份证规则
    var nameReg1=/^[\u4e00-\u9fa5·]{1,32}$/;
    //护照规则
    var nameReg2=/^[·\.a-zA-Z\s\u4e00-\u9fa5]{1,32}$/;
	//其他
	var nameReg3=/[\s\S]{1,32}/;
	if(idType==1){
		return nameReg1.test(name);
	}else if(idType==2){
        return nameReg2.test(name);
	}else {
		return nameReg3.test(name);
	}
}
function refreshActivityInfo(activityObj) {
	$("#activityFlag").val(0);
	$("#fcActivityFlag").val(0);
	$(".scan_pay p").html("金服APP扫码支付");
	$("#discountAmount").val(0);
	
	$("#isQuickPayActivity").val(0);
	$("#yeeEposActivityComment").html("");

	if (activityObj == undefined || activityObj == null || activityObj == "" || !activityObj.success) {
		// 查询出现异常，隐藏促销信息
	} else {
		for (i = 0; i < activityObj.data.length; i++) {
			activity = activityObj.data[i];
			if (activity.isActivity) {
				var activityJSON = activity.activityJSON;
				if (activity.payChannel == 21 && $("#activityFlag").attr("_v") == "1") {
					// 钱包支付
					$(".tn_wallet_box .top-tips .pay-lj").html("<img src='https://ssl.tuniucdn.com/img/20160727/jinrong/pay/pc/paylj.png'>" + parseFloat(activityJSON.discountAmount).toFixed(2) + "元");
					$("#discountAmount").val(activityJSON.discountAmount);
					$("#activityFlag").val(1);
					$("#fcActivityFlag").val(1);
					$(".scan_pay p").html("金服APP扫码立减");
				} else if (activity.payChannel == 23 && activity.payMethod == 3 && $("#isQuickPayActivity").attr("_v") == "1") {
					// 快捷支付
					$("#isQuickPayActivity").val(1);
					$("#yeeEposActivityComment").html(activityJSON.doc);
				}
			}
		}
	}

	refreshWalletActivityInfo();
	refreshQuickPayActivityInfo();
}

function refreshWalletActivityInfo() {
	if ($("#tnWalletFlag").val() == 1) {
		if ($("#activityFlag").val() == 1) {
			if ($("#downPaymentFlag").val() == 1 && $("#splitAmount").val() == 0) {
				$(".order_box .pay_money .fc-tips").hide();
			} else {
			    $(".order_box .pay_money .fc-tips").show();
			}
			$(".tn_wallet_box .top-tips .pay-lj").html("<img src=\"https://ssl.tuniucdn.com/img/20160727/jinrong/pay/pc/paylj.png\">" + $("#discountAmount").val() + "元");
			$(".tn_wallet_box .top-tips .pay-lj").removeClass("hide");
			$(".tn_wallet_box .choose_pay .top_title").css("padding-top","20px");
		} else {
			$(".order_box .pay_money .fc-tips").hide();
			$(".tn_wallet_box .top-tips .pay-lj").addClass("hide");
			if (bigPayLines != 0 && $("#amount").val() < bigPayLines) {
				$(".tn_wallet_box .choose_pay .top_title").css("padding-top","0px");
			}
		}
	} else {
		$(".order_box .pay_money .fc-tips").hide();
	}
}

function refreshQuickPayActivityInfo() {
	quickPayObj = $(".kj-tab");
	if (quickPayObj == undefined || quickPayObj == null) {
		return;
	}
	if ($("#isQuickPayActivity").val() == 1) {
		$(".card_pay_box .choose_pay .top_title #cardPayActivityComment").html("<p>" + $("#yeeEposActivityComment").html() + "<i></i></p>");
		// 优先展示促销系统的文案，将收银台配置的活动文案隐藏
		$(".card_pay_box .choose_pay .top_title #cardPayActivityComment").show();
	} else {
		// 如果存在收银台配置的活动文案，将其显示出来
		if ($("#quickPayActivityComment").html() == "") {
			$(".card_pay_box .choose_pay .top_title #cardPayActivityComment").hide();
		} else {
			$(".card_pay_box .choose_pay .top_title #cardPayActivityComment").html("<p>" + $("#quickPayActivityComment").html() + "<i></i></p>");
			$(".card_pay_box .choose_pay .top_title #cardPayActivityComment").show();
		}
	}
}