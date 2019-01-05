
(function($, undefined) {
    var Base64 = function () {  
        _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";  
        this.decode = function (input) {  
            var output = "";  
            var chr1, chr2, chr3;  
            var enc1, enc2, enc3, enc4;  
            var i = 0;  
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");  
            while (i < input.length) {  
                enc1 = _keyStr.indexOf(input.charAt(i++));  
                enc2 = _keyStr.indexOf(input.charAt(i++));  
                enc3 = _keyStr.indexOf(input.charAt(i++));  
                enc4 = _keyStr.indexOf(input.charAt(i++));  
                chr1 = (enc1 << 2) | (enc2 >> 4);  
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);  
                chr3 = ((enc3 & 3) << 6) | enc4;  
                output = output + String.fromCharCode(chr1);  
                if (enc3 != 64) {  
                    output = output + String.fromCharCode(chr2);  
                }  
                if (enc4 != 64) {  
                    output = output + String.fromCharCode(chr3);  
                }  
            }  
            output = _utf8_decode(output);  
            return output;  
        }   
        _utf8_decode = function (utftext) {  
            var string = "";  
            var i = 0;  
            var c = c1 = c2 = 0;  
            while ( i < utftext.length ) {  
                c = utftext.charCodeAt(i);  
                if (c < 128) {  
                    string += String.fromCharCode(c);  
                    i++;  
                } else if((c > 191) && (c < 224)) {  
                    c2 = utftext.charCodeAt(i+1);  
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));  
                    i += 2;  
                } else {  
                    c2 = utftext.charCodeAt(i+1);  
                    c3 = utftext.charCodeAt(i+2);  
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));  
                    i += 3;  
                }  
            }  
            return string;  
        }  
    }  
    var Cookie = {
        get: function(key) {
            var ret, m;

            try {
                if (key) {
                    if ((m = String(document.cookie).match(
                        new RegExp('(?:^| )' + key + '(?:(?:=([^;]*))|;|$)')))) {
                        ret = m[1] ? decodeURIComponent(m[1]) : '';
                    }
                }
            } catch (e) {
                ret = null;
            }

            return ret;
        }
    }
    var upDateClub = function() {
        var base64 = new Base64();
        var ueserNum = base64.decode(unescape(Cookie.get("tuniuuser_cust_type"))).split(",")[0] || 0; 
        if (ueserNum == 4 || ueserNum == 5) {
            $('#club').css('display','none');
        }
    }

    var indexTopNav = {
        init: function() {
            $(".index_top_nav .item_siteMap").hover(this.onSiteMapHover)

            $(".index_top_nav .has_dropdown").hover(this.onNavItemHoverIn, this.onNavItemHOverOut);

            $(".index_top_nav .item_weixin, .index_top_nav .item_weibo").hover(function() {
                $(this).find(".header_icon").toggleClass("hover");
            });

            $(".index_top_nav .item_qrCode").hover(function() {
                $(this).find(".header_icon").toggleClass("active");
            });
            upDateClub();
        },
        onSiteMapHover: function(e) {
            var offsetLeft = $(this).offset().left - $(".header_top .header_inner").offset().left + 1;
                
            $(this).find(".siteMap_panel").css("left", 0 - offsetLeft + "px");
        },
        onNavItemHoverIn: function(e) {

            $(this).addClass("item_hover");
            
            if (utility.isIELte(8)) {

                $(this).find(".icon_arrow").addClass("icon_arrow_rotate");
            }
        },
        onNavItemHOverOut: function(e) {

            $(this).removeClass("item_hover");

            if (utility.isIELte(8)) {
                $(this).find(".icon_arrow").removeClass("icon_arrow_rotate");           
            }
        }
    };

    var searchBox = {
        init: function() {
            $("#keyword-input").focus(this.onInputFocus);
            $("#keyword-input").blur(this.onInputBlur);
        },
        onInputFocus: function() {
            $(this).parents(".tn_search_box").find(".search_hot").hide();
        },
        onInputBlur: function() {
            if ($(this).val() == "") {
                $(this).parents(".tn_search_box").find(".search_hot").show();
            }
        }
    };

    var startCitySearch={

        init: function () {
            var i = this;
            i.patternUrl = $('#tagContent .line_right a').eq(0).attr('href') || '';
            i.bind();
            i.cityTabClick();
            i.searchCity(); 
            i.rendRresetSearchInput();
        },

        bind: function() {
            var obj = $('#startCity');
            var sc_name = $('#startCity .sc_name');
            var serBox=obj.find('.show_city');
            var tagBox=obj.find('.tagBox');
            var input=$("#startCityKeyword");
            var result=$("#stationSearchResult");
            var tip=obj.find('.station_search_box p');

            var _this=this;
            obj.one('mouseenter', function() {
                var $textarea = serBox.find('textarea.storedata');
                if ($textarea[0]) {
                    tagBox.html($textarea.text());
                }
            }).mouseenter(function() {
                this.className = "head_start_city change_tab";
            }).mouseleave(function() {
                this.className = "head_start_city";
                input.val('');
                input.blur();
                result.hide();
            }),

            /*sc_name.bind('click', function(e) {
                var i = $(this);
                obj.toggleClass('change_tab');
                obj.hasClass('change_tab') ? serBox.show() : serBox.hide();
                if($('#searchAdvBox').is(':visible') || $('#searchInputBox').is(':visible')){
                    $('#searchAdvBox').hide();
                    $('#searchInputBox').hide();
                }
                startCitySearch.stopEvent(e);
            }),*/
            /*$('body').bind('click', function() {
                resetSearchInput();
            }),
            $('#seniorSearch').bind('click',function(){
               resetSearchInput();
            }),
            $('#keyword-input').bind('focus',function(){
                
               resetSearchInput();
            }),
            serBox.bind('click', function(e) {
                startCitySearch.stopEvent(e);
            }),*/

            input.focus(function() {
               $(this).parent().addClass("on");
                var a=$(this).val();
                if(a == ''){
                    tip.hide();
                }

            }),

            input.blur(function() {
                $(this).parent().removeClass("on");
                var a = $(this).val();
                if (a == '') {
                    tip.show();
                } else {
                    tip.hide();
                }

            })

           /* function resetSearchInput(){
                alert(input.val());
                input.val('');
                 alert(input.val());
                input.blur();
               // input.trigger('blur');
                result.hide();
            }  */   
        },

        rendRresetSearchInput:function(){
            $("#startCityKeyword").val('');
            $("#stationSearchResult").hide();
        },

        //阻止事件冒泡函数
        stopEvent : function(event){ 
          var e = event || window.event; if(e.stopPropagation){ e.stopPropagation(); }else { e.cancelBubble = true; } 
        },

        cityTabClick: function() {
           $('.show_city').on('click','.station_titlist li',function(){
                var _this = $(this);
                var index = $(this).index();
                _this.addClass('selectTag').siblings().removeClass('selectTag');
                $('#tagContent .tagContent').hide();
                $('#tagContent .tagContent').eq(index).show();

            })
        },

        searchCity: function() {
            var _this=this;
            var currentValue='';
            var defauleValue='';
            var request=null;
            var tip=$("#startCity .s_text");

            var debounce = function(idle, action){
              var last;
              return function(){
                var ctx = this, 
                    args = arguments;

                clearTimeout(last);
                last = setTimeout(function(){
                    action.apply(ctx, args);
                }, idle);
              };
            };

            var ieInputHandler = debounce(300, function(event) {
                var keyCode = event.keyCode;
                if ($.browser.msie && ((keyCode >= 48 && keyCode <= 57)
                                || (keyCode >= 65 && keyCode <= 90)
                                || (keyCode >= 96 && keyCode <= 105)
                                || keyCode == 46 || keyCode == 8|| keyCode == 13|| keyCode == 32)) { // keyCode为48-57或65-90或96-105或46或8
                    tip.hide();
                        var currentValue=lTrim($("#startCityKeyword").val());
                    if (currentValue !== defauleValue) {
                         
                        if ($("#stationSearchResult .no_result").is(":visible") && (currentValue.length > defauleValue.length)) {
                            return;  
                        }

                        defauleValue = currentValue; 
                        ajaxCity(currentValue);
                        
                    }   
                }
            });

            var standardInputHandler = debounce(300, function() {
                tip.hide();
                var currentValue=$("#startCityKeyword").val().replace(/\s+/g,"");
                if (currentValue !== defauleValue) {
                    if ($("#stationSearchResult .no_result").is(":visible") && (currentValue.length > defauleValue.length)) {
                        return;  
                    }
                    defauleValue = currentValue; 
                    ajaxCity(currentValue);
                    
                }
            });

            // 针对IE和非IE做兼容处理input框的输入改变操作
            if ($.browser.msie) {
                $("#startCityKeyword").keyup(function(event){
                    ieInputHandler(event);
                });
            } 
            else{
                $("#startCityKeyword").bind('input', function () {
                    standardInputHandler();
                });
            }

            //去除左边空格
            function lTrim(str) {
                if (str.charAt(0) == " ") {
                    //如果字串左边第一个字符为空格 
                    str = str.slice(1); //将空格从字串中去掉 
                    //这一句也可改成 str = str.substring(1, str.length); 
                    str = lTrim(str); //递归调用 
                }
                return str;
            }

            function ajaxCity(i){
                var input=$("#startCityKeyword");
                var result=$("#stationSearchResult");

                if(request != null){
                    request.abort();
                    if(i==""){
                        result.html('');
                        return;
                    }
                }

               request= $.ajax({
                    url: "//www.tuniu.com/tn?r=homepage/site/CityQueryAjax",
                    type: 'GET',
                    dataType: "jsonp",
                    jsonp: "jsoncallback",
                    data: {
                        'query': i,
                        'path': window.location ? encodeURIComponent(location.protocol + '//' + location.host + location.pathname) : "",
                        'url': _this.patternUrl
                    },
                    success: function(json) {
                        if (json.data.cities == null) {
                            result.html('<p class="no_result">对不起，暂时没有找到结果</p>');
                            result.show();
                        } else {
                            var jsonList = json.data.cities;
                            result.html('');
                            for (var i = 0; i < jsonList.length; i++) {
                                result.append('<a href="' + jsonList[i].url + '">' + jsonList[i].cityName + '</a>');
                                result.show();
                                if (i == 4) {
                                    break;
                                }
                            }

                        }
                    },
                    error: function() {

                    }
                }); 
            }
        }
    };

    var utility = {
        isIELte : function(version) {
            if (!$.browser.msie) {
                return false;
            }
            return parseInt($.browser.version) <= version;
        }
    };

    var searchAdvance =  {
        init: function() {

            $(function() {
                searchAdvance.getAll();
                //searchAdvance.getHot();
            });
        },
        getAll: function() {
            var _self = this;
            var url = 'http://s.tuniu.com/tn?r=search/search/callwidget&type=all';
            $.ajax({
                url: url,
                type: "get",        
                async: true,
                dataType: "jsonp",
                jsonp: "js_callback",
                success: function (json){
                    searchAdvance.advanceCallback(json);
                    search_input.init();
                    if(json.hot && json.hot.length > 0){
                        _self.newHotSearch=true;
                        _self.cjHotCallback(json);
                        search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));
                        // 动态添加绑定点击动作
                        $("#searchInputBox").find("a").bind('click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr('href');
                            var keyword = $(this).text();
                            if(link === undefined) {
                                return;
                            }
                            addSearchCookie(keyword, link);
                            setTimeout(setTimeout(function() {
                                    window.location.href = link;
                            }, 700));
                        });
                    }
                }
            });
        },
        getHot: function() {
            var _self = this;
            var url = 'http://s.tuniu.com/tn?r=search/search/callwidget&type=hot';
            $.ajax({
                url: url,
                type: "get",
                async: true,
                dataType: "jsonp",
                jsonp: "js_callback",
                success:function(json)
                {
                    searchAdvance.hotCallback(json);
                    search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));
                }
            });
        },
        advanceCallback: function(json) {
            if (json) { 
                $("body").append(json.advance);
            }
        },
        hotCallback: function(hotObj) {
            if (hotObj) {
                $("body").append(hotObj.hot);                   
                mouseClick();   
            }
        },
        cookieClear: function(element) {
            var url = 'http://s.tuniu.com/tn?r=search/search/ajaxAddCookie';
            $.ajax({
                url: url,
                type: "get",
                async: true,
                dataType: "jsonp",
                jsonp: "jsoncallback",
                success:function(json)
                {
                    $(element).parents('.sib_last_search').remove();
                }
            });
        },
        advanceSearch: function() {
            var params = {};
            $(obj).parents('div[box="searchBox"]').find("dl[filter-type]").each(function() {
                
                var filterType = $(this).attr('filter-type');
                switch (filterType) {
                    case 'keyword':

                        var advanceFunc=function(inputStr){
                            if(inputStr == false || inputStr === '请输入目的地、主题或关键词'){
                                return false;
                            }else{
                                return true;
                            }
                        };

                        var defKeyword =false;
                        var inputStr = advanceFunc($(this).find("input").val());
                        
                        if(!(defKeyword && inputStr)) params['keywords'] = false;
                        
                        if(inputStr){
                            params['keywords'] = $(this).find("input").val();
                        }else if(defKeyword){
                            params['keywords'] = $("#keyword-input").val();
                        };
                        break;

                    case 'planDate':
                        var startDate =  $(this).find('input[name="start"]').val(),
                            endDate = $(this).find('input[name="end"]').val();

                        if(startDate != 'yyyy-mm-dd') params['startDate'] = startDate;
                        if(endDate != 'yyyy-mm-dd') params['endDate'] = endDate;
                        break;
                    
                    case 'price':
                        var min = $(this).find('input[name="min"]').val(),
                            max = $(this).find('input[name="max"]').val();

                        if(min != '') params['minPrice'] = min;
                        if(max != '') params['maxPrice'] = max;
                        break;
                    
                    case 'prdType' :
                        var prdType = $(this).find('.checked').attr('filter-value');
                        
                        if(prdType != '0') params['prdType'] = prdType;
                        break;

                    default:
                        var option = new Array(),
                            rel = true;

                        $(this).find("a[filter-value]").each(function() {
                            if ($(this).attr("class") == 'checked') {
                                var filterValue = $(this).attr('filter-value');
                                if(filterValue == 0){
                                    rel = false;
                                }else{
                                    option.push(filterValue);
                                }
                            }
                        });

                        if(rel) params[filterType] = option;
                }
            });

            if (!params.keywords) {
                alert('请输入目的地、主题或关键词');
                return;
            }

            $.ajax({
                type: 'get',
                url: "http://s.tuniu.com/tn?r=search/search/getUrlForHomePage",
                data: {'data':params},
                dataType: "jsonp",
                jsonp: "js_callback",
                success: function(data){
                    window.location.href = data;
                }
            });
        }
    };

    
    var indexNavMenu = function() {

        function showSubNav(item) {

            if (!$(item).hasClass("hasSubNav")) {
                return;
            }

            $(item).addClass('cui_nav_o');
            var ThisL = $(item).offset().left, //当前元素li距屏幕左侧位置
                ThisW = $(item).width(), //当前元素li的宽度
                thisW = ThisW / 2, //当前元素li的宽度一半
                winW = $('body').width(), //屏幕宽度
                menuW = $('ul.menu_list').width(), //所有主导航宽度
                menuL = $('ul.menu_list').offset().left,
                liLeft = ThisL - menuL, //li标签距离左侧竖导航的距离
                subNavW = $(item).find('.top_sub_nav').width(), //二级菜单元素宽度
                subNavWban = subNavW / 2, //二级菜单元素宽度一半

                navL = liLeft - subNavWban + thisW; //二级菜单元素距左边定位

            $("#subnav_wrap_bg").show();
            $(item).find('.top_subnav_wrap').css({
                'width': menuW,
                'left': 0
            });
            if (navL < 0) { //左边二级导航覆盖左侧导航
                navL = 0;
                $(item).find('.top_sub_nav').css('left', 0);
            } else {

                if (navL + subNavW > menuW) {
                    $(item).find('.top_sub_nav').css('right', 0);
                } else {
                    $(item).find('.top_sub_nav').css('left', navL);
                }
            }

            $(item).find('.icon_arrowUp').css('left', liLeft + thisW - 5); //二级菜单底部箭头位置
        }

        function closeSubNav(item) {

            if (!$(item).hasClass("hasSubNav")) {
                return;
            }

            $("#subnav_wrap_bg").hide();
            $(item).removeClass('cui_nav_o');
            $(item).find('.top_sub_nav')[0].style.left = null;
            $(item).find('.top_sub_nav')[0].style.right = null;
        }

        $(".index_nav_menu .menu_list>li").hover(function() {

            var self = this;

            var closeTimer = $(this).data("closeTimer");

            if (closeTimer) {
                clearTimeout(closeTimer);
                $(this).data("closeTimer", null);
            }

            var showTimer = $(this).data("showTimer");

            showTimer = setTimeout(function() {
                showSubNav($(self));
                $(self).data("showTimer", null);
            }, 100);

            $(this).data("showTimer", showTimer);
        }, function() {

            var self = this;

            var showTimer = $(this).data("showTimer");

            if (showTimer) {
                clearTimeout(showTimer);
                $(this).data("showTimer", null);
            }

            var closeTimer = $(this).data("closeTimer");

            closeTimer = setTimeout(function() {
                closeSubNav($(self));
                $(self).data("closeTimer", null);
            }, 100);

            $(this).data("closeTimer", closeTimer);
        });
    }
    
    window.indexNavMenu = indexNavMenu;

    var headerNavDest = function() {

        $(".header_nav .nav_dest").hover(function() {
            $(this).find(".allsort").show();
            $(this).find(".allsort .mc").show();
        }, function() {
            $(this).find(".allsort").hide();
            $(this).find(".allsort .mc").show();
        });
    }

    var refreshLoginState = function() {
        var user_login_info = document.getElementById("user_login_info");
        if (user_login_info) {
            user_login_info.innerHTML = getLoginInfo();
            var collebox = document.getElementById("vipnameBox");
            var vipname = document.getElementById("vipname");
            if (collebox) {
                collebox.onmouseover = function() {
                    collebox.className = "vipname_box on";
                    vipname.className = "vipname float_tt";
                }, collebox.onmouseout = function() {
                    collebox.className = "vipname_box";
                    vipname.className = "vipname float_tt";
                    vipname.className = "vipname";
                }
            }
       }
    }

    $(document).ready(function() {
        indexTopNav.init();
        searchBox.init();
        startCitySearch.init();
        //searchAdvance.init();
        indexNavMenu();
        headerNavDest();
        refreshLoginState();
        changeAllPagePhone();
    });

})(jQuery);

function selectTag(showContent,selfObj){
    var tag = document.getElementById("tags").getElementsByTagName("li");
    var taglength = tag.length;
    for(i=0; i<taglength; i++){
        tag[i].className = "";
    }
    selfObj.parentNode.className = "selectTag";
    for(i=1; j=document.getElementById("tagContent"+i); i++){
        j.style.display = "none";
    }
    document.getElementById(showContent).style.display = "block";
}

function getPhoneCookie(objName){
    var arrStr = document.cookie.split("; ");
    for(var i = 0;i < arrStr.length;i ++){
        var temp = arrStr[i].split("=");
        if(temp[0] == objName) return unescape(temp[1]);
    }
    return false;
}

function changeAllPagePhone() {
    var headPhoneBox = $(".header_search .site_contact");
    var footPhoneBox = $(".three_trav .thr_trav");
    var tuniuHeaderPhoneText = headPhoneBox.find(".text");
    var tuniuHeaderPhoneTel = headPhoneBox.find(".tel")
    var tuniuFootPhoneText = footPhoneBox.find(".tn_text");
    var tuniuFootPhoneTel = footPhoneBox.find(".tn_phone");
    var tuniuPPhoneNumber = getPhoneCookie("p_phone_400") || '4007-999-999';
    var tuniuPPhoneText = getPhoneCookie("p_phone_level") || '0';
    var tuniuGlobalPhone=getPhoneCookie("p_global_phone") || '+0086-25-8685-9999';
    var hkPhone=tuniuPPhoneNumber.substr(0,1);
    if(hkPhone=="+"){
        tuniuFootPhoneTel.addClass("hk-tel");
        headPhoneBox.addClass("hk-tel");
    }
    var isTuniuVip=false ;
    if(tuniuPPhoneText==1){
        isTuniuVip=true;
    }
    else{
        isTuniuVip=false;
    }
    var tuniuPPhoneHeadText=isTuniuVip ? "24h途致贵宾专线":"24h客户服务电话";
    var tuniuPPhoneFootText=isTuniuVip ? "途致贵宾专线（免长途费）":"客户服务电话（免长途费）";

    if(tuniuFootPhoneText.length >0 ){

    }
    else{
        footPhoneBox.find("a").prepend("<em class='tn_text'></em>");
        var tuniuFootPhoneText = footPhoneBox.find(".tn_text");
    }

    if (tuniuHeaderPhoneTel) {
        var siteContact=$(".site_contact");
        //添加电话悬浮框
        siteContact.append("<div class='service_phone_box'><span id='service_phone_box_tel'></span><div class='arrow'></div></div>");
        var servicePhoneBox=$(".site_contact .service_phone_box");

        if (tuniuPPhoneNumber) {
            tuniuHeaderPhoneText.html(tuniuPPhoneHeadText);
            tuniuHeaderPhoneTel.html(tuniuPPhoneNumber);
            //设置悬浮框中的国内国际电话
            $("#service_phone_head_text").append("<em></em>");
            $("#service_phone_box_tel").html("国内：<i>" + tuniuPPhoneNumber + "</i><br>国际：<i>" + tuniuGlobalPhone+"</i>");
            //添加下拉框显示事件
            siteContact.bind('mouseenter', function() {
                servicePhoneBox.show();
                siteContact.find("em").addClass("down");
            }).bind('mouseleave', function() {
                servicePhoneBox.hide();
                siteContact.find("em").removeClass("down");
            });
		}
	}
    if (tuniuFootPhoneTel) {
        if (tuniuPPhoneNumber) {
            tuniuFootPhoneText.html(tuniuPPhoneFootText);
            tuniuFootPhoneTel.html(tuniuPPhoneNumber);
        }
    }
}


function showHeadTuniuChat(data){

        $('.site_contact').prepend('<a class="headTuniuKefu" href="' + data.url + '" target="_blank">' +
        '<img src="//ssl1.tuniucdn.com/img/20160919/header/head_tel.png" /><span>欢迎使用<i>在线客服</i></span>' +
        '</a>');
    }

    window.showHeadTuniuChat= showHeadTuniuChat;


$(function($) {
    var sub = $("#keyword-input-sub").val();
    if(sub && sub != ''){
        $("#keyword-input").val(sub);
    }
});