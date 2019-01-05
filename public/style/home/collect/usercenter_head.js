    var userTopNav = userTopNav || [];
    //新会员头部导航hover效果，更新于20150320
    var userTopNav = {  
        init: function() {

            $(".header_nav_menu .hasMoreMenu").hover(this.onNavLiHoverIn, this.onNavLiHOverOut);
        },
        onNavLiHoverIn: function(e) {

            $(this).addClass("cur_menu");
            
            if (utility.isIELte(9)) {

                $(this).find(".icon_arrows").addClass("icon_arrows_rotate");
            }
        },
        onNavLiHOverOut: function(e) {

            $(this).removeClass("cur_menu");

            if (utility.isIELte(9)) {
                $(this).find(".icon_arrows").removeClass("icon_arrows_rotate");           
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

    $(document).ready(function() {
        userTopNav.init();
})


