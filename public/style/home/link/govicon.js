function GetRequest() {
var d = document.getElementById("jsgovicon").src;
var theRequest=/govicon.js\?siteId=([0-9a-fA-F]{32})&width=([0-9]+)&height=([0-9]+)/.test(d) ? RegExp.$1 : "error";
var iconwidth=/govicon.js\?siteId=([0-9a-fA-F]{32})&width=([0-9]+)&height=([0-9]+)&type=([0-9]+)/.test(d) ? RegExp.$2 : "36";
var iconheight=/govicon.js\?siteId=([0-9a-fA-F]{32})&width=([0-9]+)&height=([0-9]+)&type=([0-9]+)/.test(d) ? RegExp.$3 : "50";
var type=/govicon.js\?siteId=([0-9a-fA-F]{32})&width=([0-9]+)&height=([0-9]+)&type=([0-9]+)/.test(d) ? RegExp.$4 : "1";
var retstr={ "siteId": theRequest, "width": iconwidth, "height": iconheight, "type": type };
return retstr;}
var webprefix="http://www.jsdsgsxt.gov.cn/mbm/";
var iconImageURL="http://odr.jsdsgsxt.gov.cn:8081/mbm/app/main/electronic/images/ebsIcon.png";
var tempiconImageURL="";
var params=GetRequest();
if(params.type=="1"){tempiconImageURL=iconImageURL;}
document.write('<a href="'+webprefix +"entweb/elec/certView.shtml?siteId="+params.siteId+'" target="_blank"><img src="'+tempiconImageURL+'" title="" alt="" width="'+params.width+'" height="' + params.height + '"border="0" style="border-width:0px;border:hidden; border:none;"/></a>');
document.write('<script id="dyamicGovScript" defer="defer" type="text/javascript"> </script>');