/* 计时器 */
var timer = {
	seconds : 60,
	timerId : 0,
	start : function(){
		if (timer.seconds == 0) {
			timer.stop();
		} else {
			timer.processing();
			timer.seconds--;
			timer.timerId = setTimeout(function() {timer.start();},1000);
		}
	},
	init : function(){
		timer.seconds = 60;
		clearTimeout(timer.timerId);
	},
	processing : function(){
		$("#timer i").html(timer.seconds);
	},
	stop : function(){
		$("#timer").html("");
		$('.butg .sms_btn.gray.mar').removeAttr("disabled");
		$('.butg .sms_btn.gray.mar').removeClass("gray");
	}
};

var clearedTimer = {
	seconds : 60,
	timerId : 0,
	orderId : 0,
	orderType : 1,
	start : function(){
		if (clearedTimer.seconds == 0) {
			clearedTimer.stop();
		} else {
			clearedTimer.processing();
			clearedTimer.seconds--;
			clearedTimer.timerId = setTimeout(function() {clearedTimer.start();},1000);
		}
	},
	init : function(time, orderId){
		clearedTimer.seconds = time+2;
		clearedTimer.orderId = orderId;
		clearTimeout(clearedTimer.timerId);
	},
	processing : function(){
		$("#orderPayLimitTime").html(clearedTimer.timeRemain(clearedTimer.seconds));
	},
	stop : function(){
		$("#orderPayLimitTime").html("0秒");
		/*
		$(".pop_box .pop_win").html(
				'<div class="head"><span>订单超时</span></div>' +
                '<p>此订单已超时，请重新下单支付</p>' +
                '<div class="butg"><a class="pop_btn confirm hover" href="' + $("#orderInfoUrl").val() + '">确认</a></div>');
        $(".pop_box").show();
        $(".pop_box .pop_win").css("margin-top", -$(".pop_box .pop_win").height()/2);
        */
	},
	timeRemain : function(time) {
		var day = parseInt(time/(24*3600));
	    var hour = parseInt(time%(24*3600)/3600);
	    var minute = parseInt(time%3600/60);  
	    var second = time - day*24*3600 - hour*3600 - minute*60;
	    if(day > 0){
			return day+"天"+hour+"小时"+minute+"分钟"+second+"秒";
		} else if(hour >0) {
			return hour+"小时"+minute+"分钟" + second+"秒";
		} else if (minute >0)  {
			return minute+"分钟"+second+"秒";
		}else if(second > 0){
			return second+"秒";
		}
		return "";
	},
	setOrderType : function(orderType){
		clearedTimer.orderType = orderType;
	}
};

var queryOrderStatusTimer = {
	interval : [500,500,1000,3000],
	timerId : 0,
	times : 0,
	count : 0,
	orderId : 0,
	orderType : 1,
	returnUrl : "",
	init : function(orderId, times){
		queryOrderStatusTimer.orderId = orderId;
		queryOrderStatusTimer.times = times;
		clearTimeout(queryOrderStatusTimer.timerId);
	},
	start : function(){
		queryOrderStatusTimer.processing();
		if(queryOrderStatusTimer.times > 0){
			queryOrderStatusTimer.count++;
			if(queryOrderStatusTimer.count >= queryOrderStatusTimer.times){
				queryOrderStatusTimer.stop();
				return;
			}
			queryOrderStatusTimer.timerId = setTimeout(function() {queryOrderStatusTimer.start();},queryOrderStatusTimer.interval[queryOrderStatusTimer.count-1]);
		} else {
			queryOrderStatusTimer.timerId = setTimeout(function() {queryOrderStatusTimer.start();},2000);
		}
	},
	processing : function(){
		queryOrder(queryOrderStatusTimer.orderId, queryOrderStatusTimer.orderType, queryOrderStatusTimer.returnUrl);
	},
	setReturnUrl : function(returnUrl){
		queryOrderStatusTimer.returnUrl = returnUrl;
	},
	setOrderType : function(orderType){
		queryOrderStatusTimer.orderType = orderType;
	},
	stop : function(){
		if(queryOrderStatusTimer.returnUrl != ""){
			window.location.href = queryOrderStatusTimer.returnUrl;
		} else {
			window.location.href = MainUrl+contextPath+"/cashier/"+queryOrderStatusTimer.orderId+"/"+queryOrderStatusTimer.orderType+"/payResult";
		}
	}
	
};

var paypalTimer = {
	interval : [500,500,1000,3000],
	timerId : 0,
	times : 5,
	count : 0,
	orderId : 0,
	orderType : 1,
	returnUrl : "",
	init : function(orderId, orderType){
		paypalTimer.orderId = orderId;
		paypalTimer.orderType = orderType;
		clearTimeout(paypalTimer.timerId);
	},
	start : function(){
		paypalTimer.processing();
		if(paypalTimer.times > 0){
			paypalTimer.count++;
			if(paypalTimer.count >= paypalTimer.times){
				paypalTimer.stop();
				return;
			}
			paypalTimer.timerId = setTimeout(function() {paypalTimer.start();},paypalTimer.interval[paypalTimer.count-1]);
		}
	},
	processing : function(){
		queryOrder(paypalTimer.orderId, paypalTimer.orderType, paypalTimer.returnUrl);
	},
	setReturnUrl : function(returnUrl){
		paypalTimer.returnUrl = returnUrl;
	},
	stop : function(){
		clearTimeout(paypalTimer.timerId);
		$("#errTip").html("若页面长时间未跳转，请及时联系客服4007-999-999处理。");
	}
	
};