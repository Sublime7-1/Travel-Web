/*  
* @description: 会员中心  
* @author: anzengjun  
* @update:   
*/

var user_center_lxl = {

	//浏览器兼容性
	myBrowser: function (){
	    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
	    var isOpera = userAgent.indexOf("Opera") > -1; //判断是否Opera浏览器
	    var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera; //判断是否IE浏览器
	    if (isIE) {
	        var IE7 = IE8 = false;
	        var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
	        reIE.test(userAgent);
	        var fIEVersion = parseFloat(RegExp["$1"]);
	        IE7 = fIEVersion == 7.0;
	        IE8 = fIEVersion == 8.0;
	        if (IE7) {
	            return "IE7";
	        }
	        if (IE8) {
	            return "IE8";
	        }
	    }
	},
	
	changeTab : function(){
		// 出游类型 
		var noborder = $("dl.noborder");
			noborder.find("dd span").not(".error_map").each(function(i,n){
				$(n).click(function(){
					$(n).siblings().removeClass("current").end().addClass("current");
				})
			
			})
	},

	//出游类型切换
	changeTabNew : function () {
		$(".travel_type").find("span").click(function () {
			var obj = $(this);
			obj.addClass("travelTypeAdd").siblings().removeClass("travelTypeAdd");
		})
	},
	//总评
	totalEvaluation: function () {
		$(".evaluation").find("img").click(function (){
			var o = $(this);
			o.addClass("totEvaluation").siblings().removeClass("totEvaluation");
			var index = o.index();
			$('.synthesis_tip').html(user_center_lxl.eva[index]);
			o.parents(".wrap").find("dd").attr("data",index);
		});

		$(".evaluation").find(".bad").click(function () {
			var  o = $(this);
			o.parents(".travel_box").find(".first").removeClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
			o.parents(".travel_box").find(".second").addClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G1/M00/A1/52/Cii9EVkdBw2ISBoGAAAEQ6wIz6oAAIt0QP_-6UAAARb220.png");
			o.parents(".travel_box").find(".third").addClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G1/M00/A1/52/Cii9EVkdBw2ISBoGAAAEQ6wIz6oAAIt0QP_-6UAAARb220.png");
		});
		$(".evaluation").find(".normal").click(function () {
			var  o = $(this);
			o.parents(".travel_box").find(".second").removeClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
			o.parents(".travel_box").find(".first").removeClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
			o.parents(".travel_box").find(".third").addClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G1/M00/A1/52/Cii9EVkdBw2ISBoGAAAEQ6wIz6oAAIt0QP_-6UAAARb220.png");
		});
		$(".evaluation").find(".good").click(function () {
			var  o = $(this);
			o.parents(".travel_box").find(".third").removeClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
			o.parents(".travel_box").find(".second").removeClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
			o.parents(".travel_box").find(".first").removeClass("grey_s").attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
		});
	},
	//评价hover效果
	evaluation: function  (obj) {
		$(obj).find("dl dd").each(function(i,n){
			var s_data = $(n).parent();
			$(n).find("img.star").hover(function(){
				var _this_num = $(this).index();
					user_center_lxl.hoverBeforeChangedHight($(n).find("img.star"),$(this),_this_num);
					$(n).find(".synthesis_tip").html(user_center_lxl.safLevel(s_data,_this_num));
			},function(){
				var _this_num = $(this).index();
					if($(n).attr("data") >= 0){
						user_center_lxl.hoverBeforeChangedHight($(n).find("img.star"),$(this),$(n).attr("data"));
						$(n).find(".synthesis_tip").html(user_center_lxl.safLevel(s_data,parseInt($(n).attr("data"))));
					}
					else{
						$(n).find("img.star").addClass("grey_s");
						$(n).find('img').attr("src","https://m.tuniucdn.com/fb2/t1/G1/M00/A1/52/Cii9EVkdBw2ISBoGAAAEQ6wIz6oAAIt0QP_-6UAAARb220.png");
						$(n).find(".synthesis_tip").html("");
					}
			});
			$(n).find("img.star").click(function(){
				var _this_num = $(this).index();
					$(n).attr("data",_this_num);
			});
		});
	},
	score : function(){
		user_center_lxl.evaluation($(".ticketEvaluation"));
		user_center_lxl.evaluation($(".HotelEvaluation"));
		user_center_lxl.evaluation($("#travelType"));
	},
	hoverBeforeChangedHight : function(_this_siblings,_this,n){
		//hover 之前变为高亮
		_this_siblings.attr("src","https://m.tuniucdn.com/fb2/t1/G1/M00/A1/52/Cii9EVkdBw2ISBoGAAAEQ6wIz6oAAIt0QP_-6UAAARb220.png");
		_this_siblings.addClass("grey_s");
		for(var j=0;j<=n;j++){
			if(_this_siblings.attr("src") == "https://m.tuniucdn.com/fb2/t1/G1/M00/A1/52/Cii9EVkdBw2ISBoGAAAEQ6wIz6oAAIt0QP_-6UAAARb220.png" || _this_siblings.eq(j).hasClass("grey_s")){
				_this_siblings.eq(j).attr("src","https://m.tuniucdn.com/fb2/t1/G2/M00/81/89/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png");
				_this_siblings.eq(j).removeClass("grey_s");
			}
		}
	},
	getSafLevel : function(s){
		var s_data = new Array();
		    s_data = s.attr("data").split(",");
			return s_data;

	},
	safLevel : function(s,n){
		//满意度等级
		var s_data = new Array();
		    s_data = s.attr("data").split(",");
			//return s_data;
			if(s_data.length > 0 && s_data.length < 4){
				switch (n){
					case 0: return s_data[0];break;
					case 1: return s_data[1];break;
					case 2: return s_data[2];break;
					//case 3: return "满意";break;
					//case 4: return "非常满意";break;
				}
			}else{
				switch (n){
					case 0: return s_data[0];break;
					case 1: return s_data[1];break;
					case 2: return s_data[2];break;
					case 3: return s_data[3];break;
					case 4: return s_data[4];break;
				}
			}
		
	},
	TextareaWord : function(){
		//textarea 字数判断
		var reg = /\s*/g;
		$(".fi_textarea").each(function(i,n){
			var t_val = "";
			$(n).parent().click(function(){
				t_val = $(n).attr("data");
				$(this).find(".fi_t_cont").addClass("hide");
				$(this).find(".fi_word").removeClass("hide");
				$(n).removeClass("txt_grey").addClass("hover");
				$(n).focus();
			});	
			
			$(n).blur(function(){
				$(n).removeClass("hover");
				$(n).parent().find(".fi_word").addClass("hide");
				if($(n).val() == ""){
					$(n).parent().find(".fi_t_cont").removeClass("hide");
				}
			}); 
			$(n).keyup(function(){
				var word_num = $(n).val();
				var limit = $(n).attr("limit").split(",");
					//word_num = word_num.replace(reg,"");
					word_num = word_num.length;
					if(word_num < parseInt(limit[0])){
						$(n).nextAll(".fi_word").html("还差"+(limit[0]-word_num)+"字");
					}else if(word_num > parseInt(limit[1])){
						$(n).nextAll(".fi_word").html("已超过"+(word_num-limit[1])+"字").css("color","#f00");
					}else{
						$(n).nextAll(".fi_word").html("");
					}
			}); 
		});
	},
	// 删除已上传图片
	picListsHover: function () {
		$('.pic_lists').find('li').hover(function () {
			var o = $(this);
			o.find('.close').removeClass('hide');
			o.find('.close').click(function () {
				var lis_length = o.parents('.pic_lists').find('li').length,
					thumbnails = o.parent(),
					upload_box = o.parents('.pic_lists').siblings(".upload_box");
				setTimeout(function () {
					if (lis_length <= 9 && lis_length > 1) {
						thumbnails.css("margin-left","65px")
						upload_box.find(".photoUpload_box").removeClass("none")
					} else if (lis_length <= 1) {
						upload_box.find(".photoUpload_box").removeClass("changePion");
						upload_box.find("span").removeClass("none");
						upload_box.find("em").removeClass("none");
					}
				},500)
				user_center_lxl.delAnimate($(".pic_lists"),$(".pic_lists li").length,o);
			})
		},function () {
			var o = $(this);
			o.find(".close").addClass("hide");
		})
	},
	
	delAnimate : function(s,t,y){
		//动态增加or减少
		var num = t%5;
		var h = parseInt(t/5);		
		var height = s.find("li").outerHeight();
			if(num == 1 && y.index() == (t-1)){
				y.animate({"height":0},500,function(){
					y.hide();
					y.remove();
				});
			
			}else{
				y.animate({"width":0},500,function(){
					y.hide();
					y.remove();
				});
				
			}
			
	},
	fixCSSBug : function(){
		var reg = /Chrome|Safari/g;
			if(reg.test(navigator.userAgent)){
				$(".fi_left dl dd").not(".noborder").css("margin-top","-5px")
			}
	},
	/*图片上传*/
	fileUpLoad : function () {
	    $('.comment_img').fileupload({
	        dataType: 'json',
	        type: 'POST',
	        add: function (e, data) {
	            var o = $(this);
	           	var thumbnails = o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails');
	            li = thumbnails.find('li');
	            if (li.length == 8) {
	                o.parents(".photoUpload_box").addClass("none");
	            }; 
	            if(li >= 9){
	                layer.msg('最多支持9张图片', 3, 6);
	                return false;
	            };
	            var head = data.files[0].name;
	            var allImgExt = ".jpg|.jpeg|.png|"; //全部图片格式类型
	            var imgExt = head.substr(head.lastIndexOf(".")).toLowerCase();
	            if (allImgExt.indexOf(imgExt + "|") != -1) {
	                if (data.autoUpload || (data.autoUpload !== false &&
	                    $(this).fileupload('option', 'autoUpload'))) {
	                    data.process().done(function () {
	                        data.submit();
	                    });
	                }
	            } else {
	                layer.msg('暂不支持此图片格式', 3, 2);
	            }
	        },
	        done: function (e, data) {
	            var o = $(this);
	            var thumbnails = o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails');
	            li = thumbnails.find('li');
	            if (li.length == 8) {
	                o.parents(".photoUpload_box").addClass("none");
	                o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails').css("margin-left","0");
	            }; 
	            var serverData = data.result;
	            if(li.length >= 9){
	                layer.msg('最多支持9张图片', 3, 6);
	                return false;
	            }
	            if (serverData.success) {
	                var image_url = serverData.data.image_url;
	                var url = serverData.data['image_url'];
	                var length = url.length;
	                var match = url.match(/\.[^\.]+$/g);
	                var postfix = match[0];
	                var prefix = url.substr(0, length - postfix.length);
	                var li = '<li><img sub_src="' + url + '" src="' + prefix + '_w60_h60_c1_t0' + postfix + '" width="64" height="53" /><span class="close hide"></span></li>';
	                o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails').append(li);
	               
	                if (user_center_lxl.myBrowser() == "IE7") {
	                }
	                if (user_center_lxl.myBrowser() == "IE8" || user_center_lxl.myBrowser() == "IE7") {
	                    $(".mainDiv .upload-img").find(".thumbnails").find("li").css("width","58");
	                }
	            } else {
	                layer.msg('上传失败', 3, 2);
	            }
	            user_center_lxl.picListsHover();
	        }
	    });
	},

    //提交成功弹出层
	showpopBox : function () {
	    $("#SuccessJump").show();
	    $(".divmask").show();
	},
	clickEvents : function () {
		$(".itemJudgeBox").find(".more_eva").click(function () {
			if ($(".itemJudgeBox").find("ul").hasClass("hide")) {
				$(".itemJudgeBox").find("ul").removeClass("hide");
				$(this).find("i").html("收起选项");
				$(this).css("width","8%");
				$(this).find("img").attr("src","https://m.tuniucdn.com/fb2/t1/G3/M00/25/37/Cii_NllZ76eIRQMdAAACtCKKAyoAACWNQP__TQAAALM617.png");
			} else {
				$(".itemJudgeBox").find("ul").addClass("hide");
				$(this).find("i").html("展开更多评价");
				$(this).css("width","11%");
				$(this).find("img").attr("src","https://m.tuniucdn.com/fb2/t1/G3/M00/24/0A/Cii_NllZ4ymIMUxKAAADEuiVqJQAACRMgP__NYAAAMq361.png");
			}
		});

		$('textarea').on('input propertychange', function(){
		    $(this).siblings('.fi_t_cont').addClass('hide');
		    $(this).siblings('.fi_word').removeClass('red');
		});

		$('textarea').on('blur', function(){
		    $(this).siblings('.fi_word').removeClass('red');
		});

		$("#evaluation_box .travel_type").find("span").click(function () {
		    $("#evaluation_box").find(".error_map").hide();
		});

		$("#travelType .wrap").find("img").click(function () {
		    $("#travelType .wrap").find(".error_map").hide();
		});

		$(".evaluation").find("span").click(function () {
			$(".wrap").find(".error_map").hide();
		});

		$(".evaItem").find("img").click(function () {
			var o = $(this);
			o.parents(".evaItem").find(".wrap").find(".error_map").hide();
		})

		//展开更多评价
		if ($(".HotelEvaluation").length >= 2) {
			$(".HotelEvalutioBox").find(".moreEvalution").show();
			$(".HotelEvalutioBox").find(".HotelEvaluation").eq(1).find(".pic_frame").addClass("pic_frameSecond");
			$(".HotelEvalutioBox").find(".moreEvalution").addClass("moreEvalutionSecond");
			$(".HotelEvalutioBox").addClass("EvatioBoxHeight");
			$(".HotelEvalutioBox").find(".moreEvalution").click(function () {
				$(".HotelEvalutioBox").removeClass("EvatioBoxHeight");
				$(".HotelEvalutioBox").find(".moreEvalution").addClass("hide");
				$(".HotelEvalutioBox").find(".HotelEvaluation").eq(1).find(".pic_frame").removeClass("pic_frameSecond");
			})
		} else {
			$(".HotelEvalutioBox").find(".moreEvalution").addClass("hide");
			$(".HotelEvalutioBox").removeClass("EvatioBoxHeight");
		};
		if ($(".ticketEvaluation").length >= 2) {
			$(".TicketEvalutioBox").find(".moreEvalution").show();
			$(".TicketEvalutioBox").find(".ticketEvaluation").eq(1).find(".pic_frame").addClass("pic_frameSecond");
			$(".TicketEvalutioBox").find(".moreEvalution").addClass("moreEvalutionSecond");
			$(".TicketEvalutioBox").addClass("EvatioBoxHeight");
			$(".TicketEvalutioBox").find(".moreEvalution").click(function () {
				$(".TicketEvalutioBox").removeClass("EvatioBoxHeight");
				$(".TicketEvalutioBox").find(".moreEvalution").addClass("hide");
				$(".TicketEvalutioBox").find(".ticketEvaluation").eq(1).find(".pic_frame").removeClass("pic_frameSecond");
			})
		} else if ($(".ticketEvaluation").length != 1) {
			$(".TicketEvalutioBox").find(".moreEvalution").addClass("hide");
			$(".TicketEvalutioBox").removeClass("EvatioBoxHeight");
		};

		//匿名点评
		$("#noname").click(function () {
			var o = $(this);
			if (o.attr("src") == "https://m.tuniucdn.com/fb2/t1/G3/M00/06/04/Cii_LllEoHWIdv6qAAAAv2pvx2EAAAjzgP__v0AAAED145.png") {
				o.attr("src","https://m.tuniucdn.com/fb2/t1/G3/M00/05/67/Cii_LllEoICICqoZAAACBzSCBQ8AAAghgP__eEAAAIf058.png")
				user_center_lxl.anonymous = 1;
			} else {
				o.attr("src","https://m.tuniucdn.com/fb2/t1/G3/M00/06/04/Cii_LllEoHWIdv6qAAAAv2pvx2EAAAjzgP__v0AAAED145.png")
				user_center_lxl.anonymous = 0;
			}
		});
	},
	eva: [
		"不满意",
		"一般",
		"满意"
	],
	
	getOrderId : function () {
		return location.pathname.split('/')[2];
	},
	anonymous : 1,
	check_post: function () {

	    //出游类型 必填项
	    var travelType = $("#travelType .travelTypeAdd").attr("value");
	    if (!travelType) {
	        $("#evaluation_box .error_map").show();
	        $("html,body").animate({scrollTop: 0}, 120);
	        return;
	    } else {
	        $("#evaluation_box .error_map").hide();
	    }

	    //综合评价满意度 必填项
	    if (!$("#travelType").find(".evaluation").find("img").hasClass("totEvaluation")) {
	        $("#travelType").find(".wrap").find(".error_map").show();
	        $("html,body").animate({scrollTop: 0}, 120);
	        return;
	    } else {
	        $("#travelType").find(".wrap").find(".error_map").hide();
	    }

	    
	    //综合评价文本内容 必填项
	    var wholeJudge = $("#evaluation_box textarea").val(),
	        text = $(".HotelEvaluation textarea").val();
	    var wholeJudgeCount = wholeJudge.length;

	    var leftLimitNum = parseInt($("#completeJudge textarea").attr("leftLimitNum"));
	    var rightLimitNum = parseInt($("#completeJudge textarea").attr("rightLimitNum"));
	    if (wholeJudgeCount < leftLimitNum && leftLimitNum > 0) {
	        $("html,body").animate({scrollTop: 350}, 120);
	        $("#completeJudge span").addClass('fi_wordRed');
	        $("#completeJudge textarea").click();
	        if (wholeJudgeCount == 0 && leftLimitNum > 0) $("#completeJudge span").html("还差" + leftLimitNum + "字");
	        return;
	    } else if (wholeJudgeCount > rightLimitNum && rightLimitNum > 0) {
	        $("html,body").animate({scrollTop: 350}, 120);
	        $("#completeJudge span").addClass('fi_wordRed');
	        $("#completeJudge textarea").click();
	        return;
	    }
	    
	    //综合评价子项评价文本内容 非必填
	    var itemsArr = [];
	    var li = $(".itemJudgeBox ul").find("li");
	    for(var h = 0; h < li.length; h ++) {
	    	var itemObj = {};
	    	var item = li.eq(h);
	    	var itemLeftLimit = item.find("textarea").attr("leftlimitnum");
	    	var itemRightLimit = item.find("textarea").attr("rightlimitnum");
	    	itemObj.id = item.find(".itemName").attr("val");
	    	itemObj.value = item.find("textarea").val();
	    	if ( itemObj.value.length > 0 && itemObj.value.length < itemLeftLimit && itemLeftLimit > 0) {
	    		$("html,body").animate({scrollTop: 350}, 120);
	    		item.find(".wrod_limit").addClass('fi_wordRed');
	    		item.find("textarea").click();
	    		if (itemObj.value.length == 0 && itemLeftLimit > 0) item.find(".wrod_limit").html("还差" + itemLeftLimit + "字");
	    		return;
	    	} else if (itemObj.value.length > itemRightLimit && itemRightLimit > 0) {
	    		$("html,body").animate({scrollTop: 350}, 120);
	    		item.find(".wrod_limit").addClass('fi_wordRed');
	    		item.find("textarea").click();
	    		return;
	    	}
	    	itemsArr.push(itemObj);
	    }


	    //子评论
	    var textSubitem = [];
	    $(".texttemplates").each(function () {
	        var arr = {};
	        arr.id = $(this).find("textarea").attr("textid");
	        arr.value = $(this).find("textarea").val();
	        textSubitem.push(arr);
	    })
	    
	    //综合评价照片
	    var photos = [];
	    var isValid = false;
	    $("#travelType").find(".thumbnails li").each(function () {
	        var arr = {};
	        arr.url = $(this).find("img").attr("sub_src");
	        photos.push(arr);
	    });

		//综合评价子项评分
	    var array = [];
	    var gradetemplates = $("#travelType").find(".gradetemplates")
	    for (var k = 0; k < gradetemplates.length; k ++) {
	    	var tmp = {};
	    	var o = gradetemplates.eq(k);
	        tmp.id = o.attr("eva");
	        tmp.value = o.find("img.star").length - o.find("img.grey_s").length;
	        
        	if (tmp.value == 1) {
	            tmp.value = 0;
	        }
	        array.push(tmp)
	    }
	    var gradeCompitem = $(".evaluation").find(".totEvaluation").attr("star");

    // 资源数据
	    var submits = true;
		var resourceItems = [];
	    for (var i = 0; i < $(".evaItem").length; i++) {
    		var temWrited = false,
    			temCompleted = false,
    			pushPhotoUrl = false;
    		var tempRes = {};
    		var obj = $(".evaItem").eq(i)
    		tempRes.contentId = obj.find(".contentId").val();
    		tempRes.compGrade = obj.find(".totEvaluation").attr("star");
    		tempRes.text = obj.find("textarea").val();

    		//图片
			var sourcePhotos = [];
			obj.find(".thumbnails li").each(function () {
			var sourcePhArr = {};
    		sourcePhArr = $(this).find("img").attr("sub_src");
    		sourcePhotos.push(sourcePhArr);
    		if (sourcePhArr) pushPhotoUrl = true;
			})
    		if (pushPhotoUrl) tempRes.photos = sourcePhotos;

    		//子项评分
			var subCompGradesArry = [];

			for (var j = 0; j < obj.find(".gradetemplates").length; j++) {
				var subCompGrades = {};
				var item = obj.find(".gradetemplates").eq(j);
    	    	subCompGrades.id = item.attr("eva");
	    	    subCompGrades.value = item.find("img.star").length -item.find("img.grey_s").length;
	    	    if (subCompGrades.value > 0) {
	    	    	temWrited = true;
	    	    } 
	    	    if (subCompGrades.value == 1) {
	    	    	subCompGrades.value = 0
    	    	};
    	    	subCompGradesArry.push(subCompGrades)
			}

    		tempRes.subCompGrades = subCompGradesArry;
    		
    		if (tempRes.compGrade || tempRes.text) {
    			temWrited = true;
    		};
    		var wholeJudgeSource = obj.find("textarea").val();
    		wholeJudgeCount = wholeJudgeSource.length,
    		leftLimitNum = obj.find("textarea").attr("leftLimitNum"),
    		rightLimitNum = obj.find("textarea").attr("rightLimitNum");
    		if (tempRes.compGrade && tempRes.text && (wholeJudgeCount > leftLimitNum || wholeJudgeCount == leftLimitNum) && (wholeJudgeCount < rightLimitNum || wholeJudgeCount == rightLimitNum)) {
    			temCompleted = true;
    		};

    		if (temWrited && !temCompleted) {
    			//满意度未选判断
				submits = false;
    			if (!tempRes.compGrade) {
    				obj.find(".wrap").find(".error_map").show();
    				$("html,body").animate({scrollTop: obj.offset().top}, 120);
    				break;
    			} else {
    				obj.find(".wrap").find(".error_map").hide();
    			};

    			// 评价内容未填写判断
    			if (!tempRes.text) {
    				var wholeJudgeSource = obj.find("textarea").val();
    				wholeJudgeCount = wholeJudgeSource.length,
    				leftLimitNum = obj.find("textarea").attr("leftLimitNum"),
    				rightLimitNum = obj.find("textarea").attr("rightLimitNum");
    				obj.find(".whole-judge").find("span").addClass('fi_wordRed');
    				obj.find("textarea").click();
    				if (wholeJudgeCount == 0 && leftLimitNum > 0) obj.find(".whole-judge").find("span").html("还差" + leftLimitNum + "字");
    			} else if (wholeJudgeCount < leftLimitNum && leftLimitNum > 0) {
    			    $("html,body").animate({scrollTop: obj.offset().top}, 120);
    			    obj.find(".whole-judge").find("span").addClass('fi_wordRed');
    			    obj.find("textarea").click();
    			} else if (wholeJudgeCount > rightLimitNum && rightLimitNum > 0) {
    			    $("html,body").animate({scrollTop: obj.offset().top}, 120);
    			    obj.find(".whole-judge").find("span").addClass('fi_wordRed');
    			    obj.find("textarea").click();
    			}
    			break;
    		} 

    		if (temCompleted) resourceItems.push(tempRes)
	    }
		if (!submits) return;
	    //提交点评
	    var japiUrl = "/usercenter/usercommonajax/japi";
	    var serviceParams = {
	            orderId: parseInt($("#orderId").val()), //订单id
	            travelType: travelType,                 //出游类型
	            anonymous: user_center_lxl.anonymous,   //是否匿名（0不匿名 1匿名）
	            gradeCompitem: gradeCompitem,           //总评打分（0分对应一星不满意 2分对应二星一般 3分对应三星满意）
	            gradeCompitemId: 1,                     //总评分项id
	            textCompitemId: 2,                      //总评文本项id
	            textCompitem: wholeJudge,               //总评项文本内容 10到500字之间
	            gradeSubitem: array,                    //点评项目及评星个数
	            photo: photos,							//图片列表
	            textSubitem: itemsArr,					//子项文本评价内容
	            resourceItems: resourceItems
	    };
	    var serviceParamsJson = JSON.stringify(serviceParams);
	    var ajaxParams = {
	       "serviceName": "MOB.MEMBER.InnerRemarkController.writeRemark",
	       "serviceParamsJson": serviceParamsJson
	    };
	    $.post(japiUrl,ajaxParams,function(res){
	        if(res.success){
	        	if (res.data.success) {
	            	user_center_lxl.showpopBox();
	        	} else {
	        		layer.alert(res.data.msg);
	        	}
	        } 
	    },"json");
	},

	// 点评模板
	getRemarkInfo : function () {
		var japiUrl = "/usercenter/usercommonajax/japi";
		var serviceParams = {
			orderId: user_center_lxl.getOrderId()
		};
		var serviceParamsJson = JSON.stringify(serviceParams);
		var ajaxParams = {
		   "serviceName": "MOB.MEMBER.InnerRemarkController.getRemarkInfo",
		   "serviceParamsJson": serviceParamsJson
		};
		$.post(japiUrl,ajaxParams,function(res){
		    if(res.success){
		    	if (res.data.success) {
			    	//资源数据重组
			    	var sourceTemplateList = res.data.data.sourceTemplateList,
		    		 	hotelSource = [], 
		    			ticketSource = [];
			    	if (sourceTemplateList) {
				    	for (var i = 0; i < sourceTemplateList.length; i ++) {
				    		if (sourceTemplateList[i].sourceTypeName == "酒店") {
				    			hotelSource.push(sourceTemplateList[i]);
				    		} else if (sourceTemplateList[i].sourceTypeName == "门票") {
				    			ticketSource.push(sourceTemplateList[i]);
				    		}
				    	};
				    	res.data.data.hotelSource = hotelSource;
				    	res.data.data.ticketSource = ticketSource;
			    	}
			    	var RemarkInfo = template("curise_info",res.data);
		    		$('.mainDiv').html(RemarkInfo);
		    	} else {
		    		layer.msg(res.data.msg);
		    		setTimeout(function () {
		    			window.history.go(-1);
		    		},2000)
		    	};
		    	if (user_center_lxl.myBrowser() == "IE7") {
		    	}
		    	if (user_center_lxl.myBrowser() == "IE8" || user_center_lxl.myBrowser() == "IE7") {
		    	    var aHtml = $(".header-order-name").html();
		    	    if (aHtml.length > 60) {
		    	    	aHtml = aHtml.substr(0,60) + '...';
		    	    }
		    	};
		    	user_center_lxl.satiPernum();
		    	user_center_lxl.fileUpLoad();
		    	user_center_lxl.score();
		    	user_center_lxl.changeTabNew();
		    	user_center_lxl.TextareaWord();
		    	user_center_lxl.totalEvaluation();
		    	user_center_lxl.clickEvents();
		    	// user_center_lxl.backProfit();
		    	$(".wrap").find(".gradetemplates_eval").attr("data",user_center_lxl.eva);
		    	$("#travelType").find(".gradetemplates").attr("data",user_center_lxl.eva);
		    	$(".HotelEvalutioBox").find(".gradetemplates").attr("data",user_center_lxl.eva);
		    	$(".TicketEvalutioBox").find(".gradetemplates").attr("data",user_center_lxl.eva);
		    	$("#do_commit").on('click', function (event) {
		    	    event.preventDefault();
		    	    user_center_lxl.check_post();
		    	});
		    }
		},"json");

	},

	// 产品满意度和人数
	satiPernum : function () {
		var japiUrl = "/usercenter/usercommonajax/japi";
		var serviceParams = {
			"productId":210000261
		};
		var serviceParamsJson = JSON.stringify(serviceParams);
		var ajaxParams = {
		   "serviceName": "MOB.MEMBER.InnerRemarkController.getRemarkStat",
		   "serviceParamsJson": serviceParamsJson
		};
		$.post(japiUrl,ajaxParams,function(res){
			var span = '' , eva_num = '';
		    if(res.success){
	    		var satisfaction = res.data.data.satisfaction,
		    		personNum = res.data.data.personNum;
		    	span += '<span>'+ satisfaction +'%</span>';
		    	if (personNum) {
		    		eva_num += '<em>已有'+ personNum +'人点评，</em>'
		    	} else {
		    		eva_num += '<em>暂无点评，</em>'
		    	};
		    	$('#sat_value').html(span);
		    	$('.eva_num').html(eva_num)
		    }
		},"json");
	},
	
	//点评返利
	backProfit: function () {
		var japiUrl = "/usercenter/usercommonajax/japi";
		var serviceParams = {
			orderId: $('#orderId').val()
		};
		var serviceParamsJson = JSON.stringify(serviceParams);
		var ajaxParams = {
		   "serviceName": "MOB.MEMBER.InnerRemarkController.getRebateInfo",
		   "serviceParamsJson": serviceParamsJson
		};
		$.post(japiUrl,ajaxParams,function(res){
			var em = '';
		    if(res.success){
		        var moneyAmount = res.data.data.moneyAmount,
		    		couponAmount = res.data.data.couponAmount,
		    		moneyAmountPerName = res.data.data.moneyAmountPerName,
		    		couponAmountPerName = res.data.data.couponAmountPerName;
		  		if (moneyAmount) em += '<em>现金'+ moneyAmount +'元'+ moneyAmountPerName +'，</em>';
		  		if (couponAmount) em += '<em>抵用券'+ couponAmount +'元'+ couponAmountPerName +'</em>';
		  		$('.eva_done').html(em);
		    }
		},"json");

	}

}
$(function(){
	user_center_lxl.getOrderId();
	user_center_lxl.changeTabNew();
	user_center_lxl.score();
	user_center_lxl.TextareaWord();
	user_center_lxl.picListsHover();
	user_center_lxl.fixCSSBug();
	user_center_lxl.getRemarkInfo();
	user_center_lxl.totalEvaluation();
})