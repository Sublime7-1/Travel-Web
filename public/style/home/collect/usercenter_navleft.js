var userAside = userAside || [];
var userAside = {//左侧菜单相关事件
    init: function() {
        this.asideToggle("#asideInner dt", "dd");//左侧菜单收起展开
        this.asideToggle(".More_Items", "ul");//左侧菜单更多项收起展开
        this.HighlightCur();
    },
    //左侧菜单收起展开
    asideToggle: function(len, con) {
        var o = len;
        $(o).click(function() {
            var _self = $(this);
            // $(this).parent().find(con).slideToggle("fast");
            if (_self.hasClass("up")) {
                _self.removeClass("up");
                _self.find("a").html("收起订单<b></b>");
                _self.parent().find(con).slideDown("fast");
            }
            else {
                _self.addClass("up");
                _self.find("a").html("更多订单<b></b>");
                _self.parent().find(con).slideUp("fast");
            }
        });
    },
    //被选中的菜单高亮
    HighlightCur: function() {
        var containdiv = $(".aside");
        var href = location.href;
        //账户安全侧边栏问题修改
        if (href.indexOf('/change-tel') >= 0 || href.indexOf('/change-email') >= 0 || href.indexOf('/bind-tel') >= 0) {
            href = 'https://i.tuniu.com/safe';
        }
        var show_flag = 0;
        $('a', containdiv).each(function() {
            if (($(this).attr('href') != "/u") && (href.indexOf($(this).attr('href')) >= 0)) {
                $(this).parents('div').siblings('div').removeClass('cur');
                $(this).parents('div').addClass('cur');
                $(this).parents('dl').attr('id');
                if ('user_nav_1' == $(this).parents('dl').attr('id') || 'user_nav_2' == $(this).parents('dl').attr('id') || 'user_nav_3' == $(this).parents('dl').attr('id')) {
                    $('#user_nav_1').show();
                    $('#user_nav_2').show();
                    $('#user_nav_3').show();
                    show_flag = 1;
                } else if ('user_nav_4' == $(this).parents('dl').attr('id')) {
                    $('#user_nav_4').show();
                    show_flag = 1;
                } else if ('user_nav_5' == $(this).parents('dl').attr('id')) {
                    $('#user_nav_5').show();
                    show_flag = 1;
                }
                $('h2').parents('div').removeClass('cur');
            }
        });
        if (0 === show_flag) {
            $('#user_nav_1').show();
            $('#user_nav_2').show();
            $('#user_nav_3').show();
        }
        //头部的高亮

        /* 判断是否属于会员俱乐部的页面 */
        if( /^https?:\/\/i.tuniu.com\/club\/?$/.test(href) ||
            /^https?:\/\/i.tuniu.com\/club\/memRights\/?$/.test(href) ||
            /^https?:\/\/i.tuniu.com\/card\/?$/.test(href) ){
            href = 'https://i.tuniu.com/club';   // 此处有坑，如果俱乐部首页的 URL 变了，那么这个也要变
        }

        var headdiv = $(".nav_menu_list");
        $('a', headdiv).each(function() {
            if ($(this).attr('href') && (href.indexOf($(this).attr('href')) >= 0)) {
                $(this).parents('li').siblings('li').removeClass('cur');
                if ('http://www.tuniu.com/u/' == $(this).attr('href') || 'http://www.tuniu.com/u' == $(this).attr('href')) {
                    if ('http://www.tuniu.com/u/' == href || 'http://www.tuniu.com/u' == href) {
                        $(this).parents('li').addClass('cur');
                    }
                }else{
                    $(this).parents('li').addClass('cur');
                }
            }
        });
    }
};

var userScreenSize = {//浏览器屏幕分辨率相关
    init: function() {
        this.resizeScreen();
    },
    resizeScreen: function() {
        var index1200 = $("#index1200");
        //初始化页面
        if (!userScreenSize.isBigThan1280()) {
            index1200.removeClass("index1200").addClass("index1000");
        } else {
            index1200.removeClass("index1000").addClass("index1200");
        }
        //改变屏幕大小
        $(window).resize(function() {
            if (!userScreenSize.isBigThan1280()) {
                if (!index1200.hasClass("index1000")) {
                    index1200.removeClass("index1200").addClass("index1000");
                }
            } else {
                if (!index1200.hasClass("index1200")) {
                    index1200.removeClass("index1000").addClass("index1200");
                }
            }
        });
    },
    isIE6: function() {
        if ($.browser.msie && $.browser.version == 6) {
            return true;
        } else {
            return false;
        }
    },
    isBigThan1280: function() {
        //
        var w_wd = $(window).width();
        if (w_wd >= 1280) {
            return true;
        } else {
            return false;
        }
    }
};

var userTipShow={  //页面提示层弹出框相关
  init:function(){
    this.tipConShow($("#pass_tip"));//修改密码页面如何设置安全密码提示
    this.tipConShow($("#comment_tip"));//会员单页面点评规则提示层展示
  },
  tipConShow:function(obj){
    if(obj.length){
      obj.hover(function(){
        $(this).addClass("hover");
      },function(){
        $(this).removeClass("hover")
      })
    }
  }
}

var userTabChange={   //tab切换事件
    init:function(){
        this.tabOrderChange();
        this.tabOrderChange($("#tabChangeNav"), $("#tabChangeBox .tabChangeCon"), "cur");

    },
    tabOrderChange: function(nav, con, cur) {  
        if($(nav).length){
            nav.find("li").bind("click", function() {
                $(this).siblings().removeClass(cur);
                $(this).addClass(cur);
                var num = $(this).index();
                con.hide();
                con.eq(num).show();
            });
        }
    }
}

$(function() {
    userAside.init();
    userScreenSize.init();
    userTipShow.init();
    userTabChange.init();

});