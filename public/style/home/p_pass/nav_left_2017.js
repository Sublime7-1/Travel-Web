;(function ($){

    //进入页面时展开第一个菜单项 -- 待优化，所属项展开，对应item高亮
    //$("#order > ul").slideDown();
    var href = location.href;
    var containdiv = $("#first-nav");
    $("a",containdiv).each(function() {
        if ( href.indexOf($(this).attr('href')) >= 0) {
            $(this).parents("li").find("ul").slideDown();
            $(this).parents("li").addClass("focus").find("span").removeClass("arrow-down").addClass("arrow-up");
            $(this).addClass("focus");
        }
    });

    //菜单栏切换
    $("#first-nav > li").live("click", function () {
        if($(this).find("ul").length > 0) {
            if(!$(this).hasClass("focus")) {
                $(this).addClass("focus").find("span").addClass("arrow-up");
            }else {
                $(this).removeClass("focus").find("span").removeClass("arrow-up");
            }
            $(this).siblings().removeClass("focus").find("span").removeClass("arrow-up");
            $(this).siblings().find("ul").slideUp("fast");
            $(this).find("ul").slideToggle("fast");
        }
    });

})(jQuery);