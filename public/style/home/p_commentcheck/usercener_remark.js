//点评详情
function getInfor () {
    function myBrowser (){
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
    };
    $('.wrap').html('<div style="width: 100%;text-align: center;"><img src="//ssl1.tuniucdn.com/img/2014103102/oneyuan/loadv2.gif" style=""></div>');
    var japiUrl = "/usercenter/usercommonajax/japi";
    var serviceParams = {
        remarkId: $("#remarkId").val()
    };
    var serviceParamsJson = JSON.stringify(serviceParams);
    var ajaxParams = {
       "serviceName": "MOB.MEMBER.InnerRemarkController.getRemarkDetail",
       "serviceParamsJson": serviceParamsJson
    };
    $.post(japiUrl,ajaxParams,function(res){
        if(res.success){
            var resourceContent = res.data.data.resourceContent;
            if (resourceContent) {
                var hotel = [], ticket = [];
                for (var i = 0; i < resourceContent.length; i++) {
                    if (resourceContent[i].resourceType == 2) {
                        hotel.push(resourceContent[i])
                    } else if (resourceContent[i].resourceType == 4) {
                        ticket.push(resourceContent[i])
                    }
                }
            };
            res.data.data.hotel = hotel;
            res.data.data.ticket = ticket;
            var orderDetail = template("orderDetail",res.data);
            $(".wrap").html(orderDetail);
            if (res.data.data.couponAmount == 0 && res.data.data.travelCouponAmount == 0 && res.data.data.moneyAmount == 0 && res.data.data.scoreAmount == 0 && res.data.data.growthAmount == 0 && res.data.data.creditsAmount == 0) {
                $(".comment_prec").addClass("hide")
            }
            satisfaction()
            //初评时间
            if (res.data.data.remarkTime) {
                var remarkTime = res.data.data.remarkTime;
                substr_time = remarkTime.substr(0,10);
                newRemarkTime = substr_time.split('-');
                $(".eva_date").html(newRemarkTime[1] + '.' + newRemarkTime[2]);
            };
            //追评时间
            if (res.data.data.extendTime) {
                var extendTime = res.data.data.extendTime;
                substr_extendtime = extendTime.substr(0,10);
                newExtendTime = substr_extendtime.split('-');
                $(".extendTime").html(newExtendTime[1] + '.' + newExtendTime[2]);
            };
            var line_height = $('.other').height() + 23;
            $(".line").css("height",line_height);
            // if (myBrowser() == "IE7" || myBrowser() == "IE8") {
            //     var aHtml = $(".pn_line").find("a").html();
            //     if (aHtml.length > 60) {
            //         aHtml.html = aHtml.substr(0,60) + '...';
            //     }
            // }
            $(function(){
                    sp_slidy();
                    sp_slidySource();
                    sp_slidy_appendremark();
                    resetPosition();
            });
            var us_temp = 0;
            var us_temp_length = 0;
            var no_change = false;
            function sp_slidy(){
                var pic_lists = $(".compreEva").find(".pic_lists");
                pic_lists.each(function(i,n){
                    var slider = $(n).find("ul");
                    var slider_child_l = slider.find("li").length;
                    var slider_width = slider.find("li").width()+15;
                    var slider_height = slider.find("li").height()+10;
                    var sp_prev = $(n).find(".sp_prev").length>0? $(n).find(".sp_prev"):"";
                    var sp_next = $(n).find(".sp_next").length>0? $(n).find(".sp_next"):"";
                    slider.width(slider_child_l * slider_width);
                    var slider_count = 0;

                    if (slider_child_l <= 6) {
                        sp_prev.hide();
                        sp_next.hide();
                    }

                    sp_prev.click(function(){
                        if (slider_count <= 0) {
                            return false;
                        }
                        slider_count--;
                        slider.animate({left: '+=' + slider_width + 'px'}, 'slow');
                        slider_pic(sp_prev,sp_next,slider_count,slider_child_l);
                    });
                    sp_next.click(function(){
                        if (slider_child_l < 6 || slider_count >= slider_child_l - 6) {
                            return false;
                        }
                        slider_count++;
                        slider.animate({left: '-=' + slider_width + 'px'}, 'slow');
                        slider_pic(sp_prev,sp_next,slider_count,slider_child_l);
                    });
                    slider.find("li a").click(function(){
                        if (!no_change) {
                            $(".pop_slidy").css("height","auto")
                        };
                        var _this = $(this).attr("href");
                        var _this_img_data = $(this).parent().attr("titledata") ? $(this).parent().attr("titledata") : "";
                        var _this_date = $(this).parent().parent().attr("timedata") ? $(this).parent().parent().attr("timedata") : "";
                        us_temp = $(this).parent().index();
                        us_temp_length = $(this).parent().parent().find("li").length;
                        setNum(us_temp+1,us_temp_length);
                        popShow();
                        //alert(_this_img_data+_this_date);
                        getListImg(slider,$(n),_this,_this_img_data,_this_date);
                        return false;
                    });

                });

            }
            //追评图片放大镜
            function sp_slidy_appendremark(){
                var pic_lists = $(".extend_box").find(".pic_appendremark");
                pic_lists.each(function(i,n){
                    var slider = $(n).find("ul");
                    var slider_child_l = slider.find("li").length;
                    var slider_width = slider.find("li").width()+15;
                    var slider_height = slider.find("li").height()+10;
                    var sp_prev = $(n).find(".sp_prev").length>0? $(n).find(".sp_prev"):"";
                    var sp_next = $(n).find(".sp_next").length>0? $(n).find(".sp_next"):"";
                    slider.width(slider_child_l * slider_width);
                    var slider_count = 0;

                    if (slider_child_l <= 6) {
                        sp_prev.hide();
                        sp_next.hide();
                    }

                    sp_prev.click(function(){
                        if (slider_count <= 0) {
                            return false;
                        }
                        slider_count--;
                        slider.animate({left: '+=' + slider_width + 'px'}, 'slow');
                        slider_pic(sp_prev,sp_next,slider_count,slider_child_l);
                    });
                    sp_next.click(function(){
                        if (slider_child_l < 6 || slider_count >= slider_child_l - 6) {
                            return false;
                        }
                        slider_count++;
                        slider.animate({left: '-=' + slider_width + 'px'}, 'slow');
                        slider_pic(sp_prev,sp_next,slider_count,slider_child_l);
                    });
                    slider.find("li a").click(function(){
                        no_change = true;
                        if (no_change) {
                            $(".pop_slidy").css("height","420px")
                            no_change = false
                        }
                        var _this = $(this).attr("href");
                        var _this_img_data = $(this).parent().attr("titledata") ? $(this).parent().attr("titledata") : "";
                        var _this_date = $(this).parent().parent().attr("timedata") ? $(this).parent().parent().attr("timedata") : "";
                        us_temp = $(this).parent().index();
                        us_temp_length = $(this).parent().parent().find("li").length;
                        setNum(us_temp+1,us_temp_length);
                        popShow();
                        getListImgAppendremark(slider,$(n),_this,_this_img_data,_this_date);
                        return false;
                    });

                });

            }

            // 资源弹窗数据调用
            function sp_slidySource(){
                var pic_lists = $(".evaBox").find(".pic_lists");
                pic_lists.each(function(i,n){
                    var slider = $(n).find("ul");
                    var slider_child_l = slider.find("li").length;
                    var slider_width = slider.find("li").width()+15;
                    var slider_height = slider.find("li").height()+10;
                    var sp_prev = $(n).find(".sp_prev").length>0? $(n).find(".sp_prev"):"";
                    var sp_next = $(n).find(".sp_next").length>0? $(n).find(".sp_next"):"";
                    slider.width(slider_child_l * slider_width);
                    var slider_count = 0;
                    if (slider_child_l <= 6) {
                        sp_prev.hide();
                        sp_next.hide();
                    }
                    sp_prev.click(function(){
                        if (slider_count <= 0) {
                            return false;
                        }
                        slider_count--;
                        slider.animate({left: '+=' + slider_width + 'px'}, 'slow');
                        slider_pic(sp_prev,sp_next,slider_count,slider_child_l);
                    });
                    sp_next.click(function(){
                        if (slider_child_l < 6 || slider_count >= slider_child_l - 6) {
                            return false;
                        }
                        slider_count++;
                        slider.animate({left: '-=' + slider_width + 'px'}, 'slow');
                        slider_pic(sp_prev,sp_next,slider_count,slider_child_l);
                    });
                    slider.find("li a").click(function(){
                        if (!no_change) {
                            $(".pop_slidy").css("height","auto")
                        };
                        var _this  = $(this).attr("href");
                        var _this_img_data = $(this).parent().attr("titledata") ? $(this).parent().attr("titledata") : "";
                        var _this_date = $(this).parent().parent().attr("timedata") ? $(this).parent().parent().attr("timedata") : "";
                        us_temp = $(this).parent().index();
                        us_temp_length = $(this).parent().parent().find("li").length;
                        setNum(us_temp+1,us_temp_length);
                        popShow();
                        getListImgSource(slider,$(n),_this,_this_img_data,_this_date);
                        return false;
                    });

                });

            };

            function getPicTitle(s){
                //获取图片名称
                return s.attr("data");
            }
            function pop_slidy(s){
                var pic_lists = s;
                pic_lists.each(function(i,n){

                    var slider = $(n).find("ul");
                    var slider_child_l = slider.find("li").length;
                    var slider_width = slider.find("li").width()+15;
                    var slider_height = slider.find("li").height()+10;
                    var pop_prev = $(n).find(".pop_prev").length>0? $(n).find(".pop_prev"):"";
                    var pop_next = $(n).find(".pop_next").length>0? $(n).find(".pop_next"):"";
                    slider.height(slider_child_l * slider_height);

                    var slider_count = 0;

                    if (slider_child_l < 6) {
                        pop_prev.hide();
                        pop_next.hide();
                    }
                    else{
                        pop_prev.show();
                        pop_next.show();
                    }

                    pop_prev.click(function(){
                        if (slider_count <= 0) {
                            return false;
                        }
                        slider_count--;
                        slider.animate({top: '+=' + slider_height + 'px'}, 'slow');
                        pop_slider_pic(pop_prev,pop_next,slider_count,slider_child_l);
                    });
                    pop_next.click(function(){
                        if (slider_child_l < 5 || slider_count >= slider_child_l - 5) {
                            return false;
                        }
                        slider_count++;
                        slider.animate({top: '-=' + slider_height + 'px'}, 'slow');
                        pop_slider_pic(pop_prev,pop_next,slider_count,slider_child_l);
                    });
                    slider.find("li a").click(function(){
                        var _this = $(this).attr("href");
                        var _this_img_data = $(this).parent().attr("titledata")?$(this).parent().attr("titledata") : "";
                        var _this_date = $(this).parent().parent().attr("timedata") ? $(this).parent().parent().attr("timedata") : "";
                        var s_num = $(this).parent().index();
                        us_temp = $(this).parent().index();
                        us_temp_length = $(this).parent().parent().find("li").length;
                        setNum(us_temp+1,us_temp_length);

                        showBigImg($(this));
                        popSlidyList(_this_img_data,_this_date);
                        return false;
                    });

                });
                    
            }
            function slider_pic(s,t,k,j) {    //s 左句柄，t右句柄
                if (k >= j - 6) {
                    t.css({cursor: "auto"});
                    t.addClass("sp_grey");
                }
                else if (k > 0 && k <= j - 6) {
                    s.css({cursor: "pointer"});
                    s.removeClass("sp_grey");
                    t.css({cursor: "pointer"});
                    t.removeClass("sp_grey");
                }
                else if (k <= 0) {
                    s.css({cursor: "auto"});
                    s.addClass("sp_grey");
                }
            }
            function pop_slider_pic(s,t,k,j) {    //s 左句柄，t右句柄
                if (k >= j - 5) {
                    t.css({cursor: "auto"});
                    t.addClass("pop_grey");
                }
                else if (k > 0 && k <= j - 5) {
                    s.css({cursor: "pointer"});
                    s.removeClass("pop_grey");
                    t.css({cursor: "pointer"});
                    t.removeClass("pop_grey");
                }
                else if (k <= 0) {
                    s.css({cursor: "auto"});
                    s.addClass("pop_grey");
                }
            }
            function popShow(){
                //弹出层
               
                var divMask = $(".divMask");
                var pop_slidy = $(".pop_slidy");
                //var pop_slidy = $(".pop_slidy");
                divMask.removeClass("hide");
                pop_slidy.removeClass("hide");
                 if (myBrowser() == "IE7" || myBrowser() == "IE8") {
                    pop_slidy.css("top","150px")
                }

                //关闭弹出层
                var pop_close = $(".pop_slidy .pop_close");
                pop_close.click(function(){
                    divMask.addClass("hide");
                    pop_slidy.addClass("hide");
                });
            }
            function getListImg(s,t,img,i_t,i_date){
                //获取点击处图片
                var compreEva = t.parents(".compreEva");
                if(t.hasClass('com')){
                    var comment_cont = compreEva.find(".comment_2").html();
                }else{
                    var comment_cont = compreEva.find(".comment_detail").html();
                }
                var comment_star = compreEva.find(".clists_stars").html();
                var comment_title = compreEva.find('.clists_main_cont').attr('data');
                // if (myBrowser() == "IE7" || myBrowser() == "IE8") {
                //     if (comment_title.length > 60) {
                //         comment_title = comment_title.substr(0,60) + '...';
                //     }
                // }

                //设置图片
                var pop_slidy_list = $(".pop_slidy .pop_lists");
                var pop_slidy_a = $(".pop_slidy .pop_prod_lists a");
                var pop_slidy_img = $(".pop_slidy .pop_prod_lists img");
                var pop_slidy_bigimg = $(".pop_slidy .pop_left img");
                var pop_word = $(".pop_slidy .pop_word");
                var pop_star = $(".pop_slidy .clists_stars");
                var pop_tt = $(".pop_slidy .ps_tt label");
                var pop_pic_title = $(".pop_slidy .pop_left_span .bar_left");
                var pop_pic_date = $(".pop_slidy .pop_left_span .bar_right_time");

                pop_slidy_list.html(s.html());
                pop_word.html(comment_cont);
                pop_star.html(comment_star);
                pop_tt.html(comment_title);
                pop_tt.attr("title",comment_title);
                if(i_t.length > 0){
                    pop_pic_title.html(i_t);
                }
                if(i_date.length > 0){
                    pop_pic_date.html(i_date);
                }

                pop_slidy_bigimg.attr("src",img)
                $(".pop_slidy .pop_prev").unbind("click");
                $(".pop_slidy .pop_next").unbind("click");
                $(".pop_slidy ul").find("li a").unbind("click");
                pop_slidy_list.find("li").removeClass("cur").eq(us_temp).addClass("cur");
                pop_slidy($(".pop_img .pop_right"));

                slideDown(pop_slidy_list,us_temp);
            }

            function getListImgSource(s,t,img,i_t,i_date){
                var evaBox = t.parents(".evaBox");
                //获取点击处图片
                if(t.hasClass('com')){
                    var comment_cont = evaBox.find(".comment_2").html();
                }else{
                    var comment_cont = evaBox.find(".comment_detail").html();
                }
                var comment_star = evaBox.find(".clists_stars").html();
                var comment_title = evaBox.find('.clists_main_cont').attr('data');

                //设置图片
                var pop_slidy_list = $(".pop_slidy .pop_lists");
                var pop_slidy_a = $(".pop_slidy .pop_prod_lists a");
                var pop_slidy_img = $(".pop_slidy .pop_prod_lists img");
                var pop_slidy_bigimg = $(".pop_slidy .pop_left img");
                var pop_word = $(".pop_slidy .pop_word");
                var pop_star = $(".pop_slidy .clists_stars");
                var pop_tt = $(".pop_slidy .ps_tt label");
                var pop_pic_title = $(".pop_slidy .pop_left_span .bar_left");
                var pop_pic_date = $(".pop_slidy .pop_left_span .bar_right_time");

                pop_slidy_list.html(s.html());
                pop_word.html(comment_cont);
                pop_star.html(comment_star);
                pop_tt.html(comment_title);
                pop_tt.attr("title",comment_title);
                if(i_t.length > 0){
                    pop_pic_title.html(i_t);
                }
                if(i_date.length > 0){
                    pop_pic_date.html(i_date);
                }

                pop_slidy_bigimg.attr("src",img)
                $(".pop_slidy .pop_prev").unbind("click");
                $(".pop_slidy .pop_next").unbind("click");
                $(".pop_slidy ul").find("li a").unbind("click");
                pop_slidy_list.find("li").removeClass("cur").eq(us_temp).addClass("cur");
                pop_slidy($(".pop_img .pop_right"));

                slideDown(pop_slidy_list,us_temp);
            }
            //追评
            function getListImgAppendremark(s,t,img,i_t,i_date){
                //获取点击处图片
                var compreEva = t.parents(".compreEva");
                if(t.hasClass('com')){
                    var comment_cont = compreEva.find(".comment_2").html();
                }else{
                    var comment_cont = compreEva.find(".comment_detail").html();
                }
                var comment_star = compreEva.find(".clists_stars").html();
                var comment_title = compreEva.find('.clists_main_cont').attr('data');

                //设置图片
                var pop_slidy_list = $(".pop_slidy .pop_lists");
                var pop_slidy_a = $(".pop_slidy .pop_prod_lists a");
                var pop_slidy_img = $(".pop_slidy .pop_prod_lists img");
                var pop_slidy_bigimg = $(".pop_slidy .pop_left img");
                var pop_word = $(".pop_slidy .pop_word");
                var pop_star = $(".pop_slidy .clists_stars");
                var pop_tt = $(".pop_slidy .ps_tt label");
                var pop_pic_title = $(".pop_slidy .pop_left_span .bar_left");
                var pop_pic_date = $(".pop_slidy .pop_left_span .bar_right_time");

                pop_slidy_list.html(s.html());
                pop_word.html("");  
                pop_star.html("");
                pop_tt.html("");
                pop_tt.attr("title",comment_title);
                if(i_t.length > 0){
                    pop_pic_title.html(i_t);
                }
                if(i_date.length > 0){
                    pop_pic_date.html(i_date);
                }

                pop_slidy_bigimg.attr("src",img)
                $(".pop_slidy .pop_prev").unbind("click");
                $(".pop_slidy .pop_next").unbind("click");
                $(".pop_slidy ul").find("li a").unbind("click");
                pop_slidy_list.find("li").removeClass("cur").eq(us_temp).addClass("cur");
                pop_slidy($(".pop_img .pop_right"));

                slideDown(pop_slidy_list,us_temp);
            }

            function popSlidyList(i_t,i_date){
                var pop_pic_title = $(".pop_slidy .pop_left_span .bar_left");
                var pop_pic_date = $(".pop_slidy .pop_left_span .bar_right_time");
                if(i_t.length > 0){
                    pop_pic_title.html(i_t);
                }
                if(i_date.length > 0){
                    pop_pic_date.html(i_date);
                }
                return false;
            }
            function showBigImg(s){
                //点击小图展示大图
                if(s.parents(".pop_lists").length <= 0){
                    return false;
                }

                var s_parent = s.parent();
                var s_parent_index = s_parent.index();
                var s_parent_length = s_parent.siblings().length +1;
                var pop_slidy_img = $(".pop_slidy .pop_left").find("img");
                if(s.attr("href").length > 0){
                    pop_slidy_img.attr("src",s.attr("href"));
                }
                setNum(s_parent_index+1,s_parent_length);
                s_parent.siblings().removeClass("cur");
                s_parent.addClass("cur");
            }
            function setNum(s,l){
                var setNum = $("#setNum");
                setNum.html("(<span>"+s+"</span>/"+l+")")
            }
            function slideDown(s,n){
                //
                if(n > 4){
                    s.animate({"top":-(n-4)*60});
                }else{
                    s.animate({"top":0});
                }

            }
            function getClickNum(){
                //获取点击区域index

            }
            function resetPosition(){
                var pop_slidy = $(".pop_slidy");
                var pop_slidy_h = pop_slidy.height();
                var w_height = $(window).height();
                offset_top = (w_height - pop_slidy_h)/2;
                pop_slidy.css("top",offset_top);
                if(isIE6()){
                    var pop_scroll = $(document).scrollTop();
                    //alert(pop_scroll);
                    pop_slidy.css("top",offset_top+pop_scroll);
                }

            }

            function isIE6(){
                //ie6下定位
                if($.browser.msie && $.browser.version == 6){
                    return true;
                }else{
                    return false;
                }
            }
        }
    },"json");
};
getInfor()

//满意度
function satisfaction () {
    var japiUrl = "/usercenter/usercommonajax/japi";
    var serviceParams = {
        productId: $("#productId").val()
    };
    var serviceParamsJson = JSON.stringify(serviceParams);
    var ajaxParams = {
       "serviceName": "MOB.MEMBER.InnerRemarkController.getRemarkStat",
       "serviceParamsJson": serviceParamsJson
    };
    $.post(japiUrl,ajaxParams,function(res){
        if(res.success){
            var satisfaction = template("satisfaction",res.data);
            $(".pn_right").html(satisfaction);
        }
    },"json");
}
