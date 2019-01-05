$(function(){
    pop_alert()
});
		
function pop_alert(){
    $('#add_item').click(function(){
        $('.textin').val(''), $('#err_card').html(''), showpopup2($('#alert_div'),$('#alert_div .no'));
        return false;
    });
    $('.yes').click(function(){
        var selectd_type = $("#select_type").val();
        var selectd_name = $("#select_type").find("option:selected").text();
        var card_num = $("#card_num").val();
        var reg = /^(1|8)[0-9]{9}$/;
        if(selectd_type <= 0){
            alert("请选择所要绑定的合作卡类型");
            return false;
        }
        if(!reg.test(card_num)){
            alert("请输入正确的合作卡卡号");
            return false;
        }        
        $('#alert_div').css("display",'none');
        $('#divmask').css("display",'none');
        var url='/main.php?do=user_binding_membcard';
        $.post(url,{
            "card_num":card_num,
            "card_type":selectd_type,
            "card_name":selectd_name
        },function(data){
            if(data==-1){
                alert("请输入要绑定的合作卡卡号");
                return false;
            }else if(data==-2){
                alert("请选择要绑定的合作卡类型");
                return false;
            }else if(data==-10){
                alert("还未登陆，请返回登陆页面登陆");
                window.location.href= "http://www.tuniu.com";
            }else if(data == 1){
                alert("绑定成功");
                window.location.href= "/main.php?do=user_member_ship";
            }else{
                alert(data);
                return false;
            }
        } )
    });                
}
		
function showpopup2(w_obj,c_obj)
{
    var Obj = document.getElementById("divmask");
    if (!Obj) $("body").append("<div id='divmask' style='display:none'><iframe style='width:99%;height:99%;filter:alpha(opacity=0);opacity:0;-moz-opacity:0; '></iframe></div>");
    if (c_obj)
    {
        c_obj.click(function(){
            $("#divmask").hide();
            w_obj.hide();
            return false;
        });
    }
    var arrPageSizes = ___getPageSize();
    $('#divmask').css({
        backgroundColor: '#000',
        opacity: 0.3,
        left: 0,
        top: 0,
        "z-index": 1001,
        position: 'absolute',
        width: arrPageSizes[0],
        height: arrPageSizes[1]
    }).show();
    var arrPageScroll = ___getPageScroll();
    var popupwidth = parseInt(w_obj.width()/2);
    w_obj.css({
        display: 'block',
        "z-index": 1002,
        position: 'absolute',
        top: arrPageScroll[1] + (arrPageSizes[3] / 4),
        left: 411
    }).show();
    $(window).resize(function()
    {
        var arrPageSizes = ___getPageSize();
        $('#divmask').css({
            width: arrPageSizes[0],
            height: arrPageSizes[1]
        });
        var arrPageScroll = ___getPageScroll();
        w_obj.css({
            top: arrPageScroll[1] + (arrPageSizes[3] / 10),
            left: 411
        });
    });
    return false;
} 

//获取滚动条信息
function ___getPageScroll() {
    var xScroll, yScroll;
    if (self.pageYOffset) {
        yScroll = self.pageYOffset;
        xScroll = self.pageXOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
        yScroll = document.documentElement.scrollTop;
        xScroll = document.documentElement.scrollLeft;
    } else if (document.body) {// all other Explorers
        yScroll = document.body.scrollTop;
        xScroll = document.body.scrollLeft;
    }
    arrayPageScroll = new Array(xScroll,yScroll);
    return arrayPageScroll;
};
		  
//获取页面尺寸
function ___getPageSize() {
    var xScroll, yScroll;
    if (window.innerHeight && window.scrollMaxY) {
        xScroll = window.innerWidth + window.scrollMaxX;
        yScroll = window.innerHeight + window.scrollMaxY;
    } else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
        xScroll = document.body.scrollWidth;
        yScroll = document.body.scrollHeight;
    } else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
        xScroll = document.body.offsetWidth;
        yScroll = document.body.offsetHeight;
    }
    var windowWidth, windowHeight;
    if (self.innerHeight) { // all except Explorer
        if(document.documentElement.clientWidth){
            windowWidth = document.documentElement.clientWidth;
        } else {
            windowWidth = self.innerWidth;
        }
        windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
        windowWidth = document.documentElement.clientWidth;
        windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
        windowWidth = document.body.clientWidth;
        windowHeight = document.body.clientHeight;
    }
    // for small pages with total height less then height of the viewport
    if(yScroll < windowHeight){
        pageHeight = windowHeight;
    } else {
        pageHeight = yScroll;
    }
    // for small pages with total width less then width of the viewport
    if(xScroll < windowWidth){
        pageWidth = xScroll;
    } else {
        pageWidth = windowWidth;
    }
    arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight);
    return arrayPageSize;
}; 