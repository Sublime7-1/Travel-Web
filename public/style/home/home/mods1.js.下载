define('common_amd/search_input',['jquery'],function($){function search_sub(){var actionStr="";var queryKey=document.getElementById("keyword-input").value;queryKey=lrTrim(queryKey);queryKey=queryKey.replace(/\'*/ig,'');isRouteId(queryKey,function(flag){if(isProduct(queryKey)){actionStr="//www.tuniu.com/product/"+queryKey;window.location.href=actionStr;}else if(flag===1){actionStr="//www.tuniu.com/tour/"+queryKey;window.location.href=actionStr;}else if(flag===2){actionStr="//www.tuniu.com/tour/"+queryKey;window.location.href=actionStr;}else{getKeyLink(queryKey,function(flag){if(flag){actionStr=flag;window.location.href=flag;}else{var type="whole";var classifyId=0;var type_array=getElementsByClassName("type_s","route_search","div");var letter=document.getElementById("letter").value;for(var i=0;i<type_array.length;i++){if(type_array[i].style.display=="none"){classifyId=parseInt(type_array[i].attributes["classify"].nodeValue);}}
switch(classifyId){case 1:type="tours";break;case 2:type="pkg";break;case 3:type="hotel";break;case 5:type="team";break;case 6:type="ticket";break;case 8:type="drive";break;case 12:type="cruise";break;case 13:type="around";break;case 17:type="local";break;case 10:type="visa";break;case 83:type="shoot";break;case 70:type="mice";break;default:type="whole";}
if(queryKey){actionStr="//s.tuniu.com/search_complex/"+type+"-"+letter+"-0-"+queryKey+"/";}else{actionStr="//s.tuniu.com/search_complex/";}
document.getElementById("route_search").action=actionStr;setTimeout("document.getElementById('route_search').submit();",700);}
addSearchCookie(queryKey,actionStr);});return;}
if(window.addSearchCookie){addSearchCookie(queryKey,actionStr);}});}
function isRouteId(queryKey,callback){if(/^\d+$/.test(queryKey)){$.ajax({url:"//www.tuniu.com/tn?r=search/search/isTour",type:"GET",dataType:"json",data:{id:queryKey},success:function(ret){if(ret&&ret.success){if(ret.data.isTour){if(ret.data.productType==1&&/^210\d{6}$/.test(queryKey)){callback(1)}else{callback(2)}}else{callback(false);}}else{callback(false);}},error:function(error){callback(false);}})}else{callback(false);}}
function isProduct(id){return id>=299500001&&id<=320000000;}
function getKeyLink(queryKey,callback){$.ajax({url:"//www.tuniu.com/tn?r=search/search/getKeyLink",type:"GET",dataType:"json",data:{query:queryKey},crossDomain:true,xhrFields:{withCredentials:true},success:function(ret){if(ret&&ret.data){callback(ret.data);}else{callback(false);}},error:function(error){callback(false);}})}
function getElementsByClassName(className,root,tagName){if(root){root=typeof root=="string"?document.getElementById(root):root;}else{root=document.body;}
tagName=tagName||"*";if(document.getElementsByClassName){return root.getElementsByClassName(className);}else{var tag=root.getElementsByTagName(tagName);var tagAll=[];for(var i=0;i<tag.length;i++){for(var j=0,n=tag[i].className.split(' ');j<n.length;j++){if(n[j]==className){tagAll.push(tag[i]);break;}}}
return tagAll;}}
function lTrim(str){if(str.charAt(0)==" "){str=str.slice(1);str=lTrim(str);}
return str;}
function rTrim(str){var iLength;iLength=str.length;if(str.charAt(iLength-1)==" "){str=str.slice(0,iLength-1);str=rTrim(str);}
return str;}
function lrTrim(str){return lTrim(rTrim(str));}
$("#searchSub").click(function(){search_sub();})
window.search_sub=search_sub;});;define('common_amd/jquery.autocomplete_divbycat',['jquery'],function($){var reEscape=new RegExp('(\\'+['/','.','*','+','?','|','(',')','[',']','{','}','\\'].join('|\\')+')','g');function fnFormatResult(value,currentValue){if(currentValue==null){return value;}
else{var pattern='('+currentValue.replace(reEscape,'\\$1')+')';return value.replace(new RegExp(pattern,'gi'),'<strong>$1<\/strong>');}}
function Autocomplete(el,options){this.el=$(el);this.el.attr('autocomplete','off');this.suggestions=[];this.data=[];this.resultbox=[];this.badQueries=[];this.selectedIndex=-1;this.currentValue=this.el.val();this.intervalId=0;this.cachedResponse=[];this.onChangeInterval=null;this.ignoreValueChange=false;this.serviceUrl=options.serviceUrl;this.degreeUrl=options.degreeUrl;this.isOuter=options.isOuter;this.isLocal=false;this.options={autoSubmit:false,minChars:1,maxHeight:476,deferRequestBy:0,width:0,highlight:true,params:{},fnFormatResult:fnFormatResult,delimiter:null,zIndex:9999};this.initialize();this.setOptions(options);}
$.fn.autocomplete=function(options){return new Autocomplete(this.get(0)||$('<input />'),options);};Autocomplete.prototype={killerFn:null,initialize:function(){var me,uid,autocompleteElId;me=this;uid=Math.floor(Math.random()*0x100000).toString(16);autocompleteElId='Autocomplete_'+uid;var mainContainerBoxId='AutocompleteContainter_'+uid;this.killerFn=function(e){if($(e.target).parents('.autocomplete').size()===0){me.killSuggestions();me.disableKillerFn();}};if(!this.options.width){this.options.width=this.el.parent().width()-2;}
this.mainContainerId='AutocompleteContainter_'+uid;$('<div id="'+this.mainContainerId+'" style="position:absolute;z-index:9999999;"><div class="autocomplete-w1"><div class="autocomplete" id="'+autocompleteElId+'" style="display:none; "></div></div></div>').appendTo('body');this.container=$('#'+autocompleteElId);this.fixPosition();if(window.opera){this.el.keypress(function(e){me.onKeyPress(e);});}else{this.el.keydown(function(e){me.onKeyPress(e);});}
this.el.keyup(function(e){me.onKeyUp(e);});this.el.blur(function(){me.enableKillerFn();});this.el.focus(function(){me.fixPosition();if(($('#index1200').length>0&&$('#index1200').hasClass('index1200'))||$('body').hasClass('index1200')){}else if(($('#index1200').length>0&&$('#index1200').hasClass('index1000'))||$('body').hasClass('index1000')){}});this.changeTypeName();$(window).resize(function(){if($('#'+autocompleteElId).css("display")=='block'){clearTimeout(loadautocomResize);var loadautocomResize=setTimeout(autocomResize,200);}})
function autocomResize(){var _left=$("#keyword-input").offset().left;$('#'+mainContainerBoxId).css("left",_left);}},setOptions:function(options){var o=this.options;$.extend(o,options);if(o.lookup){this.isLocal=true;if($.isArray(o.lookup)){o.lookup={suggestions:o.lookup,data:[]};}}
$('#'+this.mainContainerId).css({zIndex:o.zIndex});this.container.css({maxHeight:o.maxHeight+'px'});},clearCache:function(){this.cachedResponse=[];this.badQueries=[];},disable:function(){this.disabled=true;},enable:function(){this.disabled=false;},fixPosition:function(){var offset=this.el.offset();$('#'+this.mainContainerId).css({top:(offset.top+this.el.innerHeight()+4)+'px',left:offset.left+'px'});},enableKillerFn:function(){var me=this;$(document).bind('click',me.killerFn);},disableKillerFn:function(){var me=this;$(document).unbind('click',me.killerFn);},killSuggestions:function(){var me=this;var sbanner=$('.searchbanner');this.stopKillSuggestions();this.intervalId=window.setInterval(function(){me.hide();if(sbanner.length>0)sbanner.remove();me.stopKillSuggestions();},300);},stopKillSuggestions:function(){window.clearInterval(this.intervalId);},onKeyPress:function(e){var sbanner=$('.searchbanner');if(this.disabled||!this.enabled){return;}
switch(e.keyCode){case 27:this.el.val(this.currentValue);this.hide();if(sbanner.length>0)sbanner.remove();break;case 9:case 13:if(this.selectedIndex===-1){this.hide();if(sbanner.length>0)sbanner.remove();return;}
if(e.keyCode===9){return;}
break;case 38:this.moveUp();break;case 40:this.moveDown();break;default:return;}
e.stopImmediatePropagation();e.preventDefault();},onKeyUp:function(e){if(this.disabled){return;}
switch(e.keyCode){case 38:case 40:return;}
clearInterval(this.onChangeInterval);if(this.currentValue!==this.el.val()){if(this.options.deferRequestBy>0){var me=this;this.onChangeInterval=setInterval(function(){me.onValueChange();},this.options.deferRequestBy);}else{this.onValueChange();}}},onValueChange:function(){clearInterval(this.onChangeInterval);this.currentValue=this.el.val().replace(/\'*/ig,'');var q=this.getQuery(this.currentValue);this.selectedIndex=-1;if(this.ignoreValueChange){this.ignoreValueChange=false;return;}
$('.searchbanner').remove();if(q===''||q.length<this.options.minChars){this.hide();}else{this.getSuggestions(q);}},getQuery:function(val){var d,arr;d=this.options.delimiter;if(!d){return $.trim(val);}
arr=val.split(d);return $.trim(arr[arr.length-1]);},getSuggestionsLocal:function(q){var ret,arr,len,val,i;arr=this.options.lookup;len=arr.suggestions.length;ret={suggestions:[],data:[]};q=q.toLowerCase();for(i=0;i<len;i++){val=arr.suggestions[i];if(val.toLowerCase().indexOf(q)===0){ret.suggestions.push(val);ret.data.push(arr.data[i]);}}
return ret;},getSuggestions:function(q){var cr,me;cr=this.isLocal?this.getSuggestionsLocal(q):this.cachedResponse[q];if(cr&&$.isArray(cr.suggestions)){this.suggestions=cr.suggestions;this.data=cr.data;this.suggest();}else if(!this.isBadQuery(q)){me=this;me.options.params.query=q;var t=this.isAllProduct();me.options.params.type=t;if(this.isOuter){var url=this.serviceUrl+"&query="+encodeURI(q)+"&t="+t+"&format=json&jsoncallback=?";$.getJSON(url,function(json){me.processResponse(json);});}else{$.get(this.serviceUrl,me.options.params,function(txt){me.processResponse(txt);},'text');}}},isBadQuery:function(q){var i=this.badQueries.length;while(i--){if(q.indexOf(this.badQueries[i])===0){return true;}}
return false;},hide:function(){this.enabled=false;this.selectedIndex=-1;this.container.hide();},suggest:function(){if(this.suggestions.length===0){this.hide();return;}
var me,len,div,f,v,i,s,mOver,mClick;me=this;len=this.suggestions.length;f=this.options.fnFormatResult;v=this.getQuery(this.currentValue);mOver=function(xi){return function(){me.activate(xi);};};mClick=function(xi){return function(){}};this.container.hide().empty();var prod_type=this.isAllProduct();var liwithhanNum=1;var locationDiv="",allPDiv="",allproItemDiv="",recommendDiv="",freeFlyDiv="",ticketDiv="",wifiDiv="",visaDiv="",hotelDiv="",trainDiv="",flightDiv="",hotCountryDiv="",hotCityDiv="",hotScenicDiv="",nearScenicDiv="",sameNameScenicDiv="",carDiv="",playDiv="",suggFroRbzDiv="",themeScenicDiv="",themeCityDiv="",themeCountryDiv="",tourDayDiv="";var mai=this.suggestions,pro=mai.allProducts,rec=mai.recommend,diy=mai.freeFly,tic=mai.ticket,wi=mai.wifi,vi=mai.visa,hotel=mai.hotel,tra=mai.train,fli=mai.flight,hc=mai.hotCountry,hCity=mai.hotCity,hs=mai.hotScenic,ns=mai.nearScenic,sn=mai.sameNameScenic,newHotel=mai.hotelAggreRst,car=mai.carRst,play=mai.destPlay,suggFroRbz=mai.suggestFromRbz,themeScenic=mai.themeScenic,themeCity=mai.themeCity,themeCountry=mai.themeCountry,keyType=mai.keyType,tourDay=mai.tourDayHot;var alldiv="";if(suggFroRbz&&suggFroRbz!=""&&suggFroRbz.length>0){for(var j=0;j<suggFroRbz.length;j++){var list=suggFroRbz[j];suggFroRbzDiv+='<div class="resultbox an_mo" title="'+list.suggestWord+'"><a href="'+list.url+'" target="_self" m="点击_联想层_RBZ_'+list.suggestWord+'"><span class="autocomplete-icon auto-icon-all"></span><div class="left1">'+list.suggestWord+'</div></a></div>';alldiv=suggFroRbzDiv;}}else if(keyType==5){if(pro&&pro!=""){if(pro.count>0){allPDiv='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+pro.keyUrl+'" target="_self" m="点击_联想层_旅游线路_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-all"></span>'
+'<div class="left1">';if(mai.tourDay==1){allPDiv+=mai.cityName;}
allPDiv+='<strong>'+mai.keyWord+'</strong>的旅游线路'
+'</div>'
+'<div class="right">'+'约'+pro.count+'个结果'+'</div>'
+'</a></div>'}
if(pro.allType&&pro.allType.length>0){for(var j=0;j<pro.allType.length;j++){var ss=pro.allType[j];allproItemDiv+='<div class="resultbox an_mo"'+' title="'+ss.keyWord+'"  data-id="'+ss.keyId+'">'
+'<a href="'+ss.keyUrl+'" target="_self"  m="点击_联想层_旅游线路_'+ss.productType+'_'+mai.keyWord+'"><div class="left2">查看</div><div class="left3">'
if(mai.tourDay==1){allproItemDiv+=mai.cityName}
allproItemDiv+='<strong>'+ss.keyWord+'</strong></div><div class="left4">的'+ss.productType+'</div><div class="right">'+'约'+ss.productCount+'个结果'+'</div></a></div>';}
allPDiv+=allproItemDiv;}}
if(tourDay&&tourDay!=''&&tourDay.length>0){for(var j=0;j<tourDay.length;j++){var item=tourDay[j];tourDayDiv+='<div class="resultbox an_mo" title="'+item.keyWord+'"  data-id="'+item.keyId+'">'
+'<a href="'+item.keyUrl+'" target="_self"  m="点击_联想层_poi推荐_'+item.keyWord+'_'+mai.keyWord+'"><span class="autocomplete-icon auto-icon-location"></span><div class="left1">'+item.keyWord+'<strong>'+mai.keyWord+'</strong>'
+'</div><div class="right">'+'约'+item.count+'个结果</div></a></div>';}}
alldiv+=allPDiv+tourDayDiv;}else if(keyType==6){if(pro&&pro!=""){if(pro.count>0){allPDiv='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+pro.keyUrl+'" target="_self" m="点击_联想层_旅游线路_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-all"></span>'
+'<div class="left1"><strong>'+mai.keyWord+'</strong>的旅游线路'
+'</div>'
+'<div class="right">'+'约'+pro.count+'个结果'+'</div>'
+'</a></div>'}
if(pro.allType&&pro.allType.length>0){for(var j=0;j<pro.allType.length;j++){var ss=pro.allType[j];allproItemDiv+='<div class="resultbox an_mo"'+' title="'+ss.keyWord+'"  data-id="'+ss.keyId+'"><a href="'+ss.keyUrl+'" target="_self" m="点击_联想层_旅游线路_'+ss.productType+'_'+mai.keyWord+'"><div class="left2"> 查看</div><div class="left3"><strong>'+ss.keyWord+'</strong></div><div class="left4">的'+ss.productType+'</div><div class="right">'+'约'+ss.productCount+'个结果'+'</div></a></div>';}
allPDiv+=allproItemDiv;}}
if(themeScenic&&themeScenic!=''&&themeScenic.length>0){themeScenicDiv+='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<span class="autocomplete-icon auto-icon-jingdian"></span>'
+'<div class="left1"><strong>'+mai.keyWord+'</strong>相关景点推荐'
+'</div></div>';for(var j=0;j<themeScenic.length;j++){var item=themeScenic[j];themeScenicDiv+='<div class="resultbox an_mo" title="'+item.keyWord+'"  data-id="'+item.keyId+'">'
+'<a href="'+item.keyUrl+'" target="_self" m="点击_联想层_景点推荐_'+item.keyWord+'_'+mai.keyWord+'"><div class="left2">'+f(item.keyWord,mai.keyWord)
+'</div><div class="right">'+'约'+item.count+'个结果</div></a></div>';}}
if(themeCity&&themeCity!=''&&themeCity.length>0){themeCityDiv+='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<span class="autocomplete-icon auto-icon-location"></span>'
+'<div class="left1"><strong>'+mai.keyWord+'</strong>相关城市推荐'
+'</div></div>';for(var j=0;j<themeCity.length;j++){var item=themeCity[j];themeCityDiv+='<div class="resultbox an_mo" title="'+item.keyWord+'"  data-id="'+item.keyId+'">'
+'<a href="'+item.keyUrl+'" target="_self" m="点击_联想层_城市推荐_'+item.keyWord+'_'+mai.keyWord+'"><div class="left2">'+f(item.keyWord,mai.keyWord)
+'</div><div class="right">'+'约'+item.count+'个结果</div></a></div>';}}
if(themeCountry&&themeCountry!=''&&themeCountry.length>0){themeCountryDiv+='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<span class="autocomplete-icon auto-icon-location"></span>'
+'<div class="left1"><strong>'+mai.keyWord+'</strong>相关国家推荐'
+'</div></div>';for(var j=0;j<themeCountry.length;j++){var item=themeCountry[j];themeCountryDiv+='<div class="resultbox an_mo" title="'+item.keyWord+'"  data-id="'+item.keyId+'">'
+'<a href="'+item.keyUrl+'" target="_self" m="点击_联想层_国家推荐_'+item.keyWord+'_'+mai.keyWord+'"><div class="left2">'+f(item.keyWord,mai.keyWord)
+'</div><div class="right">'+'约'+item.count+'个结果</div></a></div>';}}
alldiv+=allPDiv+themeScenicDiv+themeCityDiv+themeCountryDiv;}else{if(mai&&mai!=""){var _parentName=mai.parentName;if(_parentName==null){_parentName="";}
locationDiv='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+mai.keyUrl+'" target="_self" m="点击_联想层_推荐_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-location"></span>'
+'<div class="left1 autocomplete-input-value"><strong>'+mai.keyWord+'</strong></div>'
+'<div class="location location_first">'+_parentName+'</div>'
+'</a></div>'}
if(pro&&pro!=""){if(pro.count>0){allPDiv='<div class="resultbox an_mo" title="'+mai.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+pro.keyUrl+'" target="_self" m="点击_联想层_旅游线路_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-all"></span>'
+'<div class="left1"><strong>'+mai.keyWord+'</strong>的旅游线路'
+'</div>'
+'<div class="right">'+'约'+pro.count+'个结果'+'</div>'
+'</a></div>'}
if(pro.allType&&pro.allType.length>0){for(var j=0;j<pro.allType.length;j++){var ss=pro.allType[j];allproItemDiv+='<div class="resultbox an_mo"'+' title="'+ss.keyWord+'"  data-id="'+ss.keyId+'"><a href="'+ss.keyUrl+'" target="_self" m="点击_联想层_旅游线路_'+ss.productType+'_'+mai.keyWord+'"><div class="left2"> 查看</div><div class="left3"><strong>'+ss.keyWord+'</strong></div><div class="left4">的'+ss.productType+'</div><div class="right">'+'约'+ss.productCount+'个结果'+'</div></a></div>';}
allPDiv+=allproItemDiv;}}
if(rec&&rec!=""){recommendDiv='<div class="resultbox an_mo" title="'+rec.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+rec.keyUrl+'" target="_self" m="点击_联想层_线路推荐_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-recommend"></span>'
+'<div class="left1">'+f(rec.keyWord,mai.keyWord)+'</div>'
+'</a></div>'
if(rec.productList&&rec.productList.length>0){var recItemDiv="";for(var r=0;r<rec.productList.length;r++){var rr=rec.productList[r];recItemDiv+='<div class="resultbox an_mo"'+' title="'+rr.productName+'" data-id="'+rr.keyId+'"><a href="'+rr.keyUrl+'" target="_self" m="点击_联想层_线路推荐_'+rr.productName+'_'+mai.keyWord+'"><div class="left5">'+f(rr.productName,mai.keyWord)+'</div><div class="right"><span class="price">¥'+rr.price+'</span>'+'起</div></a></div>';}
recommendDiv+=recItemDiv;}}
if(diy&&diy!=""){freeFlyDiv='<div class="resultbox an_mo" title="'+diy.keyWord+'" data-id="'+diy.keyId+'">'
+'<a href="'+diy.keyUrl+'" target="_blank" m="点击_联想层_自由行_'+diy.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-diy"></span>'
+'<div class="left1">'+f(diy.keyWord,mai.keyWord)+'</div>'
+'<div class="right">'+'约'+diy.productCount+'个结果'+'</div></a></div>'}
if(play&&play.productCount&&play.productCount>1){playDiv='<div class="resultbox an_mo" title="'+play.keyWord+'" data-id="'+play.keyId+'">'
+'<a href="'+play.keyUrl+'" target="_blank" m="点击_联想层_玩法_'+play.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-play"></span>'
+'<div class="left1">'+f(play.keyWord,mai.keyWord)+'</div>'
+'<div class="right">'+'约'+play.productCount+'个结果'+'</div></a></div>';}
if(wi&&wi!=""){var wifiNum="";if(wi.count&&wi.count!=""){wifiNum='<div class="right">'+'约'+wi.count+'个结果'+'</div>';}
if(mai.keyPoiType>=9){var wi_key=wi.keyWord;}
else{wi_key='<strong>'+wi.keyWord+'</strong>';}
wifiDiv='<div class="resultbox an_mo" title="'+wi.keyWord+'" data-id="'+wi.keyId+'">'+'<a href="'+wi.keyUrl+'" target="_self" m="点击_联想层_WIFI_'+wi.keyWord+'">'+'<span class="autocomplete-icon auto-icon-wifi"></span><div class="left1">'+wi_key+'WIFI</div>'+wifiNum+'</a></div>'}
if(vi&&vi!=""){var visaNum="";if(vi.count&&vi.count!=""){visaNum='<div class="right">'+'约'+vi.count+'个结果'+'</div>';}
if(mai.keyPoiType>=9){var vi_key=vi.keyWord;}
else{vi_key='<strong>'+vi.keyWord+'</strong>';}
visaDiv='<div class="resultbox an_mo" title="'+vi.keyWord+'" data-id="'+vi.keyId+'">'+'<a href="'+vi.keyUrl+'" target="_self" m="点击_联想层_签证_'+vi.keyWord+'">'+'<span class="autocomplete-icon auto-icon-visa"></span><div class="left1">'+vi_key+'签证</div>'+visaNum+'</a></div>'}
if(fli&&fli!=""){var _rightItem="";if(fli.price&&fli.price!=null&&fli.price>=1){_rightItem='<div class="right"><span class="price">¥'+fli.price+'</span>起</div>';}
flightDiv='<div class="resultbox an_mo" title="'+fli.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+fli.keyUrl+'" target="_blank" m="点击_联想层_机票_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-plane"></span>'
+'<div class="left1">'+f(fli.beginCity,mai.keyWord)+'到'+f(fli.destCity,mai.keyWord)+'的机票</div>'
+_rightItem+'</a></div>'}
if(tra&&tra!=""){trainDiv='<div class="resultbox an_mo" title="'+tra.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+tra.keyUrl+'" target="_blank" m="点击_联想层_火车票_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-train"></span>'
+'<div class="left1">'+f(tra.beginCity,mai.keyWord)+'到'+f(tra.destCity,mai.keyWord)+'的火车票</div>'
+'</a></div>'}
if(car&&car!=""){var _rightItem="";if(car.price&&car.price!=null&&car.price>=1){_rightItem='<div class="right"><span class="price">¥'+car.price+'</span>起</div>';}
carDiv='<div class="resultbox an_mo" title="'+car.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+car.keyUrl+'" target="_blank" m="点击_联想层_汽车票_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-car"></span>'
+'<div class="left1">'+f(car.beginCity,mai.keyWord)+'到'+f(car.destCity,mai.keyWord)+'的汽车票</div>'
+_rightItem+'</a></div>'}
if(tic&&tic!=""){var _right="";if(tic.productCount&&tic.productCount!=""&&tic.productCount>="1"){var _right='约'+tic.productCount+'个结果';ticketDiv='<div class="resultbox an_mo" title="'+tic.keyWord+'" data-id="'+tic.keyId+'">'
+'<a href="'+tic.keyUrl+'" target="_self" m="点击_联想层_门票_'+tic.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-ticket"></span>'
+'<div class="left1"><strong>'+tic.keyWord+'</strong>的门票</div>'
+'<div class="right">'+_right+'</div></a></div>'
if(tic.ticketInfo&&tic.ticketInfo.length>0){var ticItemDiv="";for(var t=0;t<tic.ticketInfo.length;t++){var tt=tic.ticketInfo[t];ticItemDiv+='<div class="resultbox an_mo"'+' title="'
+tt.keyWord+'" data-id="'+tt.keyId+'"><a href="'+tt.keyUrl+'" target="_self" m="点击_联想层_门票_'+tt.keyWord+'_'+tic.keyWord+'"><div class="left5">'
+f(tt.keyWord,mai.keyWord)+'</div><div class="right"><span class="price">¥'
+tt.price+'</span>'
+'起</div></a></div>';}
ticketDiv+=ticItemDiv;}}
else{ticketDiv="";}}
if(hotel&&hotel!=""){hotelDiv='<div class="resultbox an_mo" title="'+hotel.keyWord+'" data-id="'+mai.keyId+'">'
+'<a href="'+hotel.keyUrl+'" target="_blank" m="点击_联想层_酒店_'+hotel.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-hotel"></span>'
+'<div class="left1"><strong>'+hotel.keyWord+'</strong>的酒店</div>'
+'<div class="right">'+'约'+hotel.productCount+'个结果'+'</div></a></div>'
if(hotel.hotelInfo&&hotel.hotelInfo.length>0){var hotelItemDiv="";for(var h=0;h<hotel.hotelInfo.length;h++){var hh=hotel.hotelInfo[h];var _rightItem="";if(hh.keyName&&hh.keyName!=null&&hh.keyName!=""){if(hh.price&&hh.price!=null&&hh.price>=1){_rightItem='<div class="right"><span class="price">¥'+hh.price+'</span>起</div>';}
else if(hh.brandCount&&hh.brandCount>=1){_rightItem='<div class="right">'+'约'+hh.brandCount+'个结果'+'</div>';}
hotelItemDiv+='<div class="resultbox an_mo"'+' title="'+hh.keyName+'" data-id="'+hh.keyId+'"><a href="'+hh.keyUrl+'" target="_blank" m="点击_联想层_酒店_'+hh.keyName+'_'+hotel.keyWord+'"><div class="left5">'+f(hh.keyName,mai.keyWord)+'</div>'+_rightItem+'</a></div>';if(h==1){break;}}
else{hotelItemDiv="";}}
hotelDiv+=hotelItemDiv;}}
if(hc&&hc.length>0){for(var ha=0;ha<hc.length;ha++){var haa=hc[ha];hotCountryDiv+='<div class="resultbox an_mo" title="'+haa.keyWord+'" data-id="'+haa.keyId+'">'
+'<a href="'+haa.keyUrl+'" target="_self" m="点击_联想层_热门国家_'+haa.keyWord+'_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-jingdian"></span>'
+'<div class="left1">'+f(haa.keyWord,mai.keyWord)+'</div>'
+'<div class="location">'+haa.parentName+'</div>'
+'<div class="right">'+'约'+haa.productCount+'个结果'+'</div></a></div>';}}
if(hCity&&hCity.length>0){for(var hb=0;hb<hCity.length;hb++){var hbb=hCity[hb];hotCityDiv+='<div class="resultbox an_mo" title="'+hbb.keyWord+'" data-id="'+hbb.keyId+'">'
+'<a href="'+hbb.keyUrl+'" target="_self" m="点击_联想层_热门城市_'+hbb.keyWord+'_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-jingdian"></span>'
+'<div class="left1">'+f(hbb.keyWord,mai.keyWord)+'</div>'
+'<div class="location">'+hbb.parentName+'</div>'
+'<div class="right">'+'约'+hbb.productCount+'个结果'+'</div></a></div>';}}
if(hs&&hs.length>0){for(var hc=0;hc<hs.length;hc++){var hcc=hs[hc];hotScenicDiv+='<div class="resultbox an_mo" title="'+hcc.keyWord+'" data-id="'+hcc.keyId+'">'
+'<a href="'+hcc.keyUrl+'" target="_self" m="点击_联想层_热门景点_'+hcc.keyWord+'_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-jingdian"></span>'
+'<div class="left1">'+f(hcc.keyWord,mai.keyWord)+'</div>'
+'<div class="location">'+hcc.parentName+'</div>'
+'<div class="right">'+'约'+hcc.productCount+'个结果'+'</div></a></div>';}}
if(ns&&ns.length>0){for(var hd=0;hd<ns.length;hd++){var hdd=ns[hd];nearScenicDiv+='<div class="resultbox an_mo" title="'+hdd.keyWord+'" data-id="'+hdd.keyId+'">'
+'<a href="'+hdd.keyUrl+'" target="_self" m="点击_联想层_附近景点_'+hdd.keyWord+'_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-jingdian"></span>'
+'<div class="left1">'+f(hdd.keyWord,mai.keyWord)+'</div>'
+'<div class="location">'+hdd.parentName+'</div>'
+'<div class="right">'+'约'+hdd.productCount+'个结果'+'</div></a></div>';}}
if(sn&&sn.length>0){for(var he=0;he<sn.length;he++){var hee=sn[he];sameNameScenicDiv+='<div class="resultbox an_mo" title="'+hee.keyWord+'" data-id="'+hee.keyId+'">'
+'<a href="'+hee.keyUrl+'" target="_self" m="点击_联想层_同名景点_'+hee.keyWord+'_'+mai.keyWord+'">'
+'<span class="autocomplete-icon auto-icon-jingdian"></span>'
+'<div class="left1">'+f(hee.keyWord,mai.keyWord)+'</div>'
+'<div class="location">'+hee.parentName+'</div>'
+'</a></div>';}}
if(newHotel&&newHotel!=""){var newHotelCityDiv="";var newHotelDanpinDiv="";var newHotelTitleDiv="";var keyWord=newHotel.keyword;var newKeyWord;if(keyWord.indexOf("酒店")==-1){newKeyWord=keyWord+"酒店";}
else{newKeyWord=keyWord;}
if(newHotel.cityHotel&&newHotel.cityHotel.length>0){for(var h=0;h<newHotel.cityHotel.length;h++){var hh=newHotel.cityHotel[h];if(hh.cityName&&hh.cityName!=null&&hh.cityName!=""){newHotelCityDiv+='<div class="resultbox an_mo" title="'+newKeyWord+'" data-id="'+hh.keyId+'">'+'<a href="'+hh.url+'" target="_blank" m="点击_联想层_城市酒店_'+hh.cityName+'_'+keyWord+'">'+'<span class="autocomplete-icon auto-icon-hotel"></span>'+'<div class="left1">'+hh.cityName+'的'+f(newKeyWord,keyWord)+'</div>'+'<div class="right">'+hh.count+'家'+'</div></a></div>'}}}
if(newHotel.cityHotel&&newHotel.cityHotel.length>0&&newHotel.hotel&&newHotel.hotel.rows.length>0){newHotelTitleDiv='<div class="resultbox an_mo" title="'+keyWord+'" data-id="'+newHotel.hotel.keyId+'">'
+'<a href="'+newHotel.hotel.url+'" target="_blank" m="点击_联想层_酒店单品_'+keyWord+'">'
+'<span class="autocomplete-icon auto-icon-hotel"></span>'
+'<div class="left1">'+newHotel.hotel.cityName+'的'+f(newKeyWord,keyWord)+'</div>'
+'<div class="right">'+newHotel.hotel.count+'家'+'</div></a></div>';var _rightItem="";var _district="";for(var j=0;j<newHotel.hotel.rows.length;j++){var jj=newHotel.hotel.rows[j];if(jj.keyword&&jj.keyword!=null&&jj.keyword!=""){if(jj.price&&jj.price!=null&&jj.price>=1){_rightItem='<div class="right"><span class="price">¥'+jj.price+'</span>起</div>';}
if(jj.price==0){_rightItem='<div class="right"><span class="price">实时计价</div>';}
if(jj.district&&jj.district!=null&&jj.district!=""){_district=jj.district;}
newHotelDanpinDiv+='<div class="resultbox an_mo"'+' title="'+jj.keyword+'" data-id="'+jj.keyId+'"><a href="'+jj.url+'" target="_blank" m="点击_联想层_酒店单品_'+jj.keyword+'_'+keyWord+'"><div class="left5"><span class="h_name">'+f(jj.keyword,keyWord)+'</span><span class="h_adder">'+_district+'</span></div>'+_rightItem+'</a></div>';}}
alldiv=newHotelTitleDiv+newHotelDanpinDiv+newHotelCityDiv;}
else{if(newHotel.hotel&&newHotel.hotel.rows.length>0){var _rightItem="";var _district="";for(var j=0;j<newHotel.hotel.rows.length;j++){var jj=newHotel.hotel.rows[j];if(jj.keyword&&jj.keyword!=null&&jj.keyword!=""){if(jj.price&&jj.price!=null&&jj.price>=1){_rightItem='<div class="right"><span class="price">¥'+jj.price+'</span>起</div>';}
if(jj.price==0){_rightItem='<div class="right"><span class="price">实时计价</div>';}
if(jj.district&&jj.district!=null&&jj.district!=""){_district=jj.district;}
if(jj.district==null){_district="";}
newHotelDanpinDiv+='<div class="resultbox an_mo"'+' title="'+jj.keyword+'" data-id="'+jj.keyId+'"><a href="'+jj.url+'" target="_blank" m="点击_联想层_酒店单品_'+jj.keyword+'_'+keyWord+'"><div class="left5 hotel_danpin"><span class="h_name">'+f(jj.keyword,keyWord)+'</span><span class="h_adder">'+_district+'</span></div>'+_rightItem+'</a></div>';}}}
alldiv=newHotelDanpinDiv+newHotelCityDiv;}}
else{if(mai.keyPoiType>=9){alldiv=locationDiv+allPDiv+recommendDiv+ticketDiv+hotelDiv+flightDiv+trainDiv+carDiv+wifiDiv+visaDiv+freeFlyDiv+playDiv+hotCountryDiv+hotCityDiv+hotScenicDiv+nearScenicDiv+sameNameScenicDiv;}
else{alldiv=locationDiv+allPDiv+recommendDiv+wifiDiv+visaDiv+flightDiv+trainDiv+carDiv+ticketDiv+hotelDiv+freeFlyDiv+playDiv+hotCountryDiv+hotCityDiv+hotScenicDiv+nearScenicDiv+sameNameScenicDiv;}}}
this.container.html(alldiv);this.container.find(".resultbox").each(function(i,n){$(n).mouseover(mOver(i));$(n).click(mClick(i));})
this.enabled=true;this.container.show();},processResponse:function(text){var response;if(this.isOuter){response=text;}else{try{response=eval('('+text+')');}catch(err){return;}}
if(!$.isArray(response.data)){response.data=[];}
if(!this.options.noCache){this.cachedResponse[response.query]=response;if(response.suggestions.length===0){this.badQueries.push(response.query);}}
if(response.query===this.getQuery(this.currentValue)){this.suggestions=response.suggestions;this.data=response.data;this.suggest();}},activate:function(index){var divs,activeItem,dataId;divs=this.container.children();if(this.selectedIndex!==-1&&divs.length>this.selectedIndex){$(divs.get(this.selectedIndex)).removeClass("selected");dataId={dataId:$(activeItem).attr('data-id'),key_word:$(activeItem).attr('title'),degreeUrl:this.degreeUrl}
$(activeItem).trigger('getDegree',dataId);}
this.selectedIndex=index;if(this.selectedIndex!==-1&&divs.length>this.selectedIndex){activeItem=divs.get(this.selectedIndex);$(activeItem).addClass('selected');dataId={dataId:$(activeItem).attr('data-id'),key_word:$(activeItem).attr('title'),degreeUrl:this.degreeUrl}
$(activeItem).trigger('getDegree',dataId);}
return activeItem;},deactivate:function(div,index){div.className='resultbox';if(this.selectedIndex===index){this.selectedIndex=-1;}},select:function(i){var selectedValue,f;var _current=$(".resultbox.selected");if(_current.find(".left1").length>0){selectedValue=$(".resultbox.selected .left1").text();}
else if(_current.find(".left3").length>0){selectedValue=$(".resultbox.selected .left3").text()+$(".resultbox.selected .left4").text();}
else{selectedValue=_current.attr("title");}
if(selectedValue){this.el.val(selectedValue);if(this.options.autoSubmit){f=this.el.parents('form');if(f.length>0){f.get(0).submit();}}
this.ignoreValueChange=true;this.hide();this.onSelect(i);}},moveUp:function(){if(this.selectedIndex===-1){return;}
if(this.selectedIndex===0){this.container.children().get(0).className='resultbox';this.selectedIndex=-1;this.el.val(this.currentValue);return;}
this.adjustScroll(this.selectedIndex-1);},moveDown:function(){if(this.selectedIndex===(this.container.children(".resultbox").length-1)){return;}
this.adjustScroll(this.selectedIndex+1);},adjustScroll:function(i){var activeItem,offsetTop,upperBound,lowerBound;activeItem=this.activate(i);offsetTop=activeItem.offsetTop;upperBound=this.container.scrollTop();lowerBound=upperBound+this.options.maxHeight-25;if(offsetTop<upperBound){this.container.scrollTop(offsetTop);}else if(offsetTop>lowerBound){this.container.scrollTop(offsetTop-this.options.maxHeight+25);}
var _current=$(".resultbox.selected");if(_current.find(".left1").length>0){this.el.val(this.getValue($(".resultbox.selected .left1").text()));}
else if(_current.find(".left3").length>0){this.el.val(this.getValue($(".resultbox.selected .left3").text()+$(".resultbox.selected .left4").text()));}
else{this.el.val(this.getValue(_current.attr("title")));}},onSelect:function(i){var me,fn,s,d;var _current=$(".resultbox.selected");me=this;fn=me.options.onSelect;s=_current.attr("title");d=_current.attr("title");me.el.val(me.getValue(s));if($.isFunction(fn)){fn(i);}},getValue:function(value){var del,currVal,arr,me;me=this;del=me.options.delimiter;if(!del){return value;}
currVal=me.currentValue;arr=currVal.split(del);if(arr.length===1){return value;}
return currVal.substr(0,currVal.length-arr[arr.length-1].length)+value;},isAllProduct:function(){var typename=this.el.attr("data");return typename;},changeTypeName:function(){var me=this;$("#typename").mouseover(function(){$(".tn_search_bar").css("display","block");$("#spic").css("background","url(http://img1.tuniucdn.com/site/images/index/up.jpg) center right no-repeat");$("#searchInputBox").hide();});$("#typename").mouseout(function(){$(".tn_search_bar").css("display","none");$("#spic").css("background","url(http://img1.tuniucdn.com/site/images/index/down.jpg) center right no-repeat");})
$("#typename").find(".type_s").click(function(){me.clearCache();$(this).siblings().show();var temp=$(this).index();var s=$(this).text();var t=$("#typename span").text();var keyword=$("#keyword-input");$("#typename span").text(s);if($.trim(s)=="所有产品"){keyword.attr("data","");keyword.attr("data-cla","");}else if($.trim(s)=="跟团游"){keyword.attr("data",1);}else if($.trim(s)=="自助游"){keyword.attr("data",2);}else if($.trim(s)=="酒店"){keyword.attr("data",3);}else if($.trim(s)=="机票"){keyword.attr("data",4);}else if($.trim(s)=="团队游"){keyword.attr("data",5);}else if($.trim(s)=="景点门票"){keyword.attr("data",6);}else if($.trim(s)=="保险"){keyword.attr("data",7);}else if($.trim(s)=="自驾游"){keyword.attr("data",8);}else if($.trim(s)=="签证"){keyword.attr("data",9);}else if($.trim(s)=="邮轮"){keyword.attr("data",10);}else if($.trim(s)=="火车票"){keyword.attr("data",11);}else if($.trim(s)=="当地玩乐"){keyword.attr("data",13);}
$("#typename .tn_search_bar").hide();$(this).hide();});}};});;define('common_amd/search_input_v2',['jquery'],function($){var search_input=search_input||{};search_input={init:function(){var _self=this;var s_input=$(".tn_s_input");var s_popbox=$("#searchInputBox");var search_box=$(".search_box");search_box.each(function(i,n){_self.showMoreCondition($(n));});this.seniorSearch();this.filterCont();this.showMTTwoLines();this.txt_focus();},creatPopbox:function(){},showPopBox:function(t,s){var _self=this;var tnSearchBox=$("#tnSearchBox");var search_pop_box=$(".search_pop_box");var tnSearchBoxhg=tnSearchBox.height();var updatePosition=function(){var _offset=tnSearchBox.offset();var tnSearchBoxBtom=_offset.top;var tnSearchBoxLeft=_offset.left;s.css({"top":tnSearchBoxBtom+tnSearchBoxhg,"left":tnSearchBoxLeft});}
if(tnSearchBox.length){tnSearchBox.find("input").click(function(e){$("#searchAdvBox").hide();if($.trim($("#keyword-input").val())==''){updatePosition();s.show();}
_self.stopEvent(e);});$(window).resize(function(){if(s.is(":visible")){updatePosition();}})
t.keyup(function(){if($.trim($("#keyword-input").val())=='')
{s.show();}else{s.hide();}});s.find(".closeThisBox").click(function(){s.hide();});s.click(function(e){try{e=e||window.event;var tar=e?e.target:e.srcElement;var m;while(tar.parentNode){if(tar.nodeName=="BODY"||tar.nodeName=="HTML"){break;}
if(m=tar.getAttribute("m")){window.eventTrack&&window.eventTrack.push({text:m,x:e.clientX,y:e.clientY});}
tar=tar.parentNode;}}catch(e){}
_self.stopEvent(e);});$("body").click(function(){s.hide();});$("#searchInputBox").mouseleave(function(){s.hide();});}},stopEvent:function(event){var e=event||window.event;if(e.stopPropagation){e.stopPropagation();}else{e.cancelBubble=true;}},showMoreCondition:function(t){var _state=true;var __this=this;var t_moreCondition=t.find(".moreCondition");t.find(".showallbtn_s a").click(function(){var t_this=$(this);if(t_moreCondition.hasClass("hide")){t_moreCondition.slideDown(function(){t_moreCondition.removeClass("hide").show();if(_state){__this.showMTTwoLines(t_moreCondition);_state=false;}});t_this.html("收起更多 <em class='tn_fontface'>&#xe620;</em>");}else{t_moreCondition.slideUp(function(){t_moreCondition.addClass("hide").hide();});t_this.html("更多条件（交通类型、住宿类型、组团特色、产品特色） <em class='tn_fontface'>&#xe61f;</em>");}});},showMTTwoLines:function(t){var J_prop=t?t.find(".search_adv_others"):$(".search_adv_others");J_prop.each(function(i,n){if(parseInt($(n).css("height"))>28){$(n).css("height",28);$(n).next(".search_adv_more").show().unbind("click").click(function(){$(n).hasClass("isShowALl")?$(n).removeClass("isShowALl").css("height",28):$(n).addClass("isShowALl").css("height","auto");$(n).hasClass("isShowALl")?$(this).html("<span>收起<i class='tn_fontface'>&#xe620;</i></span>"):$(this).html("<span>更多<i class='tn_fontface'>&#xe61f;</i></span>");});}
else{$(n).css("height","auto");}});},seniorSearch:function(){var _self=this;var _state=true;var seniorSearch=$("#seniorSearch");var search_pop_box=$(".search_pop_box");var tnSearchBox=$("#tnSearchBox");var tnSearchBoxhg=tnSearchBox.height();var updatePositionAdv=function(){var advOffset=tnSearchBox.offset();var tnSearchBoxBtom=advOffset.top;var tnSearchBoxLeft=advOffset.left;search_pop_box.css({"top":tnSearchBoxBtom+tnSearchBoxhg-2,"left":tnSearchBoxLeft});}
seniorSearch.click(function(){updatePositionAdv();search_pop_box.toggle();if(search_pop_box.css("display")==="block"){$("#searchInputBox").hide();$(".autocomplete").hide();}
if(_state){_self.showMTTwoLines($("#searchAdvBox"));_state=false;}
return false;});$(window).resize(function(){if(search_pop_box.is(":visible")){updatePositionAdv();}})
search_pop_box.find(".closeSenSearch").click(function(e){search_pop_box.hide();_self.stopEvent(e);});search_pop_box.click(function(e){_self.stopEvent(e);});$("body").click(function(){search_pop_box.hide();});},filterCont:function(){var search_adv_others_a=$(".search_adv_others a");var search_adv_buxian_a=$(".search_adv_buxian a");search_adv_others_a.click(function(){var $this=$(this);$this.parent().prev().find("a").removeClass('checked');if($this.hasClass('checked')){$this.removeClass('checked');}else{if($this.parent(".onlyShowOne").length){$this.siblings('.checked').removeClass('checked');}
$this.addClass('checked');}});search_adv_buxian_a&&search_adv_buxian_a.click(function(){var $this=$(this);$this.addClass('checked');$this.parent().next().find("a").removeClass('checked');});},filterDate:function(){var _self=this;var search_input_date_1=$(".search_input_date");var search_input_date_2=$(".search_input_date_2");search_input_date_1.TN_date({wrap:$("body"),onSelect:function(){}});search_input_date_2.TN_date({wrap:$("body"),onSelect:function(){}});},txt_focus:function(){var $keyWord=$(".input_addr");var a=$keyWord.val();$keyWord.focus(function(){if(this.value==a){this.value="";this.style.color="#333"}});$keyWord.blur(function(){if(this.value==""){this.value=a;this.style.color="#aaa"}});},clearSearchLens:function(thisObj){var cur=$(thisObj);var _parents=cur.parents(".search_box").eq(0);_parents.find(".search_adv_others a").removeClass("checked");_parents.find(".search_adv_buxian a").addClass("checked");_parents.find(".J_FilterCustomPrice input").val("");_parents.find(".search_adv_properties input").val("");}}
window.search_input=search_input;return search_input;});;define('common_amd/search_ajax',['jquery','common_amd/search_input_v2'],function($,search_input){var search_ajax=search_ajax||{};search_ajax={newHotSearch:false,init:function(){var _self=this;_self.getAll();},getCookie:function(NameOfCookie){if(document.cookie.length>0)
{begin=document.cookie.indexOf(NameOfCookie+"=");if(begin!=-1)
{begin+=NameOfCookie.length+1;end=document.cookie.indexOf(";",begin);if(end==-1)end=document.cookie.length;return unescape(document.cookie.substring(begin,end));}}
return null;},getAll:function(){var _self=this;var url='//s.tuniu.com/tn?r=search/search/callwidget&type=all';var _tact=_self.getCookie('_tact')||'';var tuniuuser=_self.getCookie('tuniuuser')||'';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback",data:{'_tact':_tact,'tuniuuser':tuniuuser},success:function(json){search_ajax.cjAdvanceCallback(json);search_input.init();if(json.hot&&json.hot.length>0){_self.newHotSearch=true;_self.cjHotCallback(json);search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));$("#searchInputBox").find("a").bind('click',function(e){e.preventDefault();var link=$(this).attr('href');var keyword=$(this).text();if(link===undefined){return;}
addSearchCookie(keyword,link);setTimeout(setTimeout(function(){window.location.href=link;},700));});}}});},getHot:function(){var _self=this;var url='//s.tuniu.com/tn?r=search/search/callwidget&type=hot';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback",success:function(json)
{_self.newHotSearch=true;_self.cjHotCallback(json);search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));}});},cjAdvanceCallback:function(json){if(json){$("body").append(json.advance);}},cjHotCallback:function(hotObj){if(hotObj){$("body").append(hotObj.hot);}},cookieClear:function(element){var url='//s.tuniu.com/tn?r=search/search/ajaxAddCookie';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"jsoncallback",success:function(json)
{$(element).parents('.sib_last_search').remove();}});},advanceSearch:function(obj){var params={};$(obj).parents('div[box="searchBox"]').find("dl[filter-type]").each(function(){var filterType=$(this).attr('filter-type');switch(filterType){case'keyword':var advanceFunc=function(inputStr){if(inputStr===null||inputStr===undefined||inputStr===''||inputStr==='请输入目的地、主题或关键词'){return false;}else{return true;}};var defKeyword=false;var inputStr=advanceFunc($(this).find("input").val());if(!(defKeyword&&inputStr))params['keywords']=false;if(inputStr){params['keywords']=$(this).find("input").val();}else if(defKeyword){params['keywords']=$("#keyword-input").val();};break;case'planDate':var startDate=$(this).find('input[name="start"]').val();var endDate=$(this).find('input[name="end"]').val();if(startDate!='yyyy-mm-dd')params['startDate']=startDate;if(endDate!='yyyy-mm-dd')params['endDate']=endDate;break;case'price':var min=$(this).find('input[name="min"]').val();var max=$(this).find('input[name="max"]').val();if(min!='')params['minPrice']=min;if(max!='')params['maxPrice']=max;break;case'prdType':var prdType=$(this).find('.checked').attr('filter-value');if(prdType!='0')params['prdType']=prdType;break;default:var option=new Array();var rel=true;$(this).find("a[filter-value]").each(function(){if($(this).attr("class")=='checked'){var filterValue=$(this).attr('filter-value');if(filterValue==0){rel=false;}else{option.push(filterValue);}}});if(rel)params[filterType]=option;}});if(params.keywords!==false)
{$.ajax({type:'get',url:"//s.tuniu.com/tn?r=search/search/getUrlForHomePage",data:{'data':params},dataType:"jsonp",jsonp:"js_callback",success:function(data){window.location.href=data;}});}
else
{alert('请输入目的地、主题或关键词');}}};window.searchAjax=window.search_ajax=search_ajax;return search_ajax;});;define('common_amd/recordCookie',['jquery','common_amd/jquery.autocomplete_divbycat','common_amd/search_ajax'],function($,undefined,search_ajax){function mousehover(){$(".list_suggest").hover(function(){var prevTrIndex=$("#prevTrIndex").val();if(prevTrIndex>0){$("#list_suggest_"+prevTrIndex).removeClass("hover");}
$(this).addClass("hover");var num=$(this).prop("id").split("list_suggest_");$("#prevTrIndex").val(num[1]);},function(){$(this).removeClass("hover");});$("#autoCompleteDivNew").hover(function(){$(".tn_s_input").data("overSuggest",true);},function(){$(".tn_s_input").data("overSuggest",false);$("#autoCompleteDivNew").remove();});};function mouseClick(){$(".search_record_delete").click(function(){var q=$(this).prev().text();mainUrl=getUrl();var url=mainUrl+"/remove_cookie?query="+q
+"&format=json&jsoncallback=?";$.getJSON(url);setTimeout(function(){$('#keyword-input').focus();},500);});$(".search_record").click(function(){var q=$(this).text();$("#keyword-input").val(q);$("#autoCompleteDivNew").remove();$("#route_search").submit();});}
function clickTr(currTrIndex){var prevTrIndex=$("#prevTrIndex").val();if(currTrIndex>0){$("#list_suggest_"+currTrIndex).addClass("hover");}
if(prevTrIndex>0){$("#list_suggest_"+prevTrIndex).removeClass("hover");}
$("#prevTrIndex").val(currTrIndex);};function replaceValue(num){$("#keyword-input").val($("#search_record_"+num).text());}
function addCookieSuggest(){$("#autoCompleteDivNew").remove();return;if(search_ajax.newHotSearch){return;}
if($("#keyword-input").val()==''){mainUrl=getUrl();var url=mainUrl+"/search_cookie?format=json&jsoncallback=?";$.getJSON(url,function(json){$("#autoCompleteDivNew").remove();if(json.length>0&&$("#keyword-input").is(":focus")){$("<div class='autoCompleteDivNew' id='autoCompleteDivNew'><input type='hidden' name='prevTrIndex' id='prevTrIndex' value='0' />"+"<input type='hidden' name='preValue' id='preValue' value='"+$("#keyword-input").val()+"'/></div>").appendTo($("#keyword-input").parent());for(var i=0;i<json.length;i++){$("<div class='list_suggest' id='list_suggest_"+(i+1)+"'><div class='search_record' id='search_record_"+(i+1)+"'>"+json[i]+"</div><div class='search_record_delete'>删除</div></div>").appendTo($("#autoCompleteDivNew"));}
mousehover();mouseClick();}});}}
function addSearchCookie(q,link){mainUrl=getUrl();var url=mainUrl+"/add_cookie?query="+encodeURI(q)+'&link='+encodeURI(link)
+"&format=json&callback=?";$.getJSON(url);}
function addSearchCookies(q){mainUrl=getUrl();var url=mainUrl+"/add_cookie?query="+encodeURI(q)
+"&format=json&callback=?";$.getJSON(url);}
function getUrl(){var host=window.location.host;var hostList=host.split(".");hostList.splice(0,1,'http://s');var url=hostList.join(".");return url;}
function watchFunction(){$("#keyword-input").keydown(function(event){var trSize=$(".list_suggest").size();var prevTrIndex=parseInt($("#prevTrIndex").val());if(event.keyCode==38&&$("#preValue").val()==''){if(prevTrIndex==0){replaceValue(trSize);clickTr(trSize);}else if(prevTrIndex==1){$("#keyword-input").val($("#preValue").val());clickTr(prevTrIndex-1);}else{replaceValue(prevTrIndex-1);clickTr(prevTrIndex-1);}
return false;}else if(event.keyCode==40&&$("#preValue").val()==''){if(prevTrIndex==trSize){$("#keyword-input").val($("#preValue").val());clickTr(0);}else{replaceValue(prevTrIndex+1);clickTr(prevTrIndex+1);}
return false;}else if((event.keyCode==37||event.keyCode==39)&&$("#preValue").val()==''){$("#autoCompleteDivNew").remove();}else if(event.keyCode==13){event.preventDefault();event.stopPropagation();if($("#preValue").val()==''){replaceValue(prevTrIndex);$("#autoCompleteDivNew").remove();}
if($(".autocomplete").css("display")=='block'&&$(".resultbox.selected").length>0){$(".resultbox.selected").trigger("click");}
else{search_sub();}}});var host_url=window.location.host;if(host_url!="s.tuniu.com"){$("#keyword-input").data("suggst",$("#keyword-input").val());}
else{$("#keyword-input").css("color","black");}
$("#keyword-input").bind({focus:function(){if(this.value==$("#keyword-input").data("suggst")){this.value="";}
this.style.color="#000";addCookieSuggest();},blur:function(){if(this.value==""){this.value=$("#keyword-input").data("suggst")||"";this.style.color="#999";}
if(!$(".tn_s_input").data("overSuggest")){$("#autoCompleteDivNew").remove();}}});if($.browser.msie){$("#keyword-input").keyup(function(event){var keyCode=event.keyCode;if($.browser.msie&&((keyCode>=48&&keyCode<=57)||(keyCode>=65&&keyCode<=90)||(keyCode>=96&&keyCode<=105)||keyCode==46||keyCode==8)){addCookieSuggest();}});}else{$("#keyword-input").bind({'input propertychange':function(){addCookieSuggest();}});}
$("#route_search").submit(function(){var base_url=getUrl();var q=$('#keyword-input').val();q=$.trim(q);if(q==null||q==''||q=='请输入目的地或编号'){window.location.href=base_url;}else{$('#q').val(q);$('#route_search').attr("target",'_self');$('#check_route_hi').html('');}});$(".resultbox").live('click',function(){return false;});$(".resultbox").live('click',function(){link=$(this).children(":first").attr('href');if(link===undefined){return;}
blank=$(this).children(":first").attr('target');var _val="";if($(this).find(".left1").length>0){_val=$(".resultbox.selected .left1").text();}else if($(this).find(".left3").length>0){_val=$(".resultbox.selected .left3").text()+$(".resultbox.selected .left4").text();}
else{_val=$(this).attr("title");}
$("#keyword-input").val(_val);addSearchCookie(_val,link);if(blank=="_blank"){setTimeout(jumpOut_blank,700);}
else{setTimeout(jumpOut,700);}});}
function jumpOut(){window.location.href=link;}
function jumpOut_blank(){window.open(link,"_blank");}
function searchTip(){var autocomplete_options,autocomplete_a;var host=window.location.host;var hostList=host.split(".");hostList.splice(0,1,'http://s');var base_url=hostList.join(".");var complex=$("#from_action").val();$('#keyword-input').change(function(){$('#st').val(1);});autocomplete_options={serviceUrl:'//www.tuniu.com/tn?r=search/search/searchSugguestV2',degreeUrl:'//www.tuniu.com/tn?r=search/search/searchSugguestRightV2',onSelect:autocomplete_onselect,isOuter:true};autocomplete_a=$('#keyword-input').autocomplete(autocomplete_options);function autocomplete_onselect(i){var autocomplete=$(".autocomplete-w1").find(".resultbox");var autocomplete_href=autocomplete.eq(i).find("a").attr("href");window.open(autocomplete_href,"_self");}
$("#keyword-input").keyup(function(){if($(this).val()!=''){$("#q").val($(this).val());}});}
function delay(e){if(navigator.userAgent.indexOf("Firefox")>0){if(e&&e.preventDefault){e.preventDefault();}}
search_sub();return false;}
$(function(){watchFunction();searchTip();$("#keyword-input").bind({focus:function(){if(this.value==""){addCookieSuggest();}else{}}});});window.delay=delay;window.addSearchCookie=addSearchCookie;});;define('common_amd/getDegree',['jquery'],function($){var delQ=true;$(window).on('getDegree',function(e,code){var temp=[];var autoDiv=$('.autocomplete-w1');if(autoDiv.length<1)return;var atuoDivCon=autoDiv.find('div.autocomplete');var autoBox=atuoDivCon.find('div.resultbox');var resultLen=autoBox.length;var autoHeight=atuoDivCon.height()-10;var keyId=code.dataId||0;var bannertmp=$('.searchbanner');autoBox.each(function(index,elem){var tmp;var sId=$(elem).attr('data-id')||0;tmp=sId;temp.push(tmp);});if(bannertmp.length<1){if(keyId==0||　keyId　=="undefined"){bannertmp.hide();return;}
getAjax(code.degreeUrl,{key_id:keyId,key_word:code.key_word},function(data){if(data.hasTop){var degreeBox=showDegree(data,resultLen,autoHeight);autoDiv.append(degreeBox);$('#sbanner'+keyId).show();}});}else{if($('#sbanner'+keyId).length>0){bannertmp.hide();$('#sbanner'+keyId).show();}else{if(keyId==0||　keyId　=="undefined"){bannertmp.hide();return;}
getAjax(code.degreeUrl,{key_id:keyId,key_word:code.key_word},function(data){if(data.hasTop){var degreeBox=showDegree(data,resultLen,autoHeight);autoDiv.append(degreeBox);bannertmp.hide();$('#sbanner'+keyId).show();}});}}
function getAjax(url,sendData,callback){if(!delQ){return;}
delQ=false;$.ajax({url:url,dataType:'jsonp',jsonp:"jsoncallback",data:{'key_id':sendData.key_id,'key_word':sendData.key_word,'format':'json'},scriptCharset:'utf-8',success:function(data){delQ=true;if(data){callback(data);}}})}
function showDegree(res,len,sheight){var sdiv='',slen,stop="",scon="",repName,picDiv="";if(res.keyId){var searchRoute=res.playroute;if(searchRoute){slen=searchRoute.length;}
if(res.hasTop&&res.hasTop==1&&len>3){if(slen>0&&len>9){for(var n=0;n<slen;n++){repName=searchRoute[n].routeName;repName=repName.replace(/[ ]/g,"");scon+='<div class="an_mo" liwithhan="搜索最受欢迎玩法-'+searchRoute[n].routeNum+'-'+res.key_word+'-'+repName+'">'
+'<a class="topbanner" target="_self" href="'+searchRoute[n].routeUrl+'" title="'+searchRoute[n].routeName+'">'
+'<span class="toptag">Top '+searchRoute[n].routeNum+'</span>'
+' <span class="topname">'+searchRoute[n].routeName+'</span>'
+'</a></div>';}
stop='<div class="searchtop">'
+'<h2>最受欢迎的玩法</h2>'
+scon
+'</div>';if(slen>0&&len>10){if(res.ad&&res.ad.length>0){picDiv='<div class="searchpic">'
+'<a href="'+res.ad[0].url+'">'
+'<img src="'+res.ad[0].imgUrl+'" />'
+'</a></div>'}}}
sdiv='<div class="searchbanner" id="sbanner'+keyId+'" style="display:none;height:'+sheight+'px">'
+'        <h1>'+res.key_word+'</h1>'
+'        <div class="searchdegree">';if(parseInt(res.degree)>=85){sdiv+='            <div class="degreetag">'
+'                <p class="degreetext">满意度</p>'
+'                <p class="degreenum">'+res.degree+'</p>'
+'            </div>';}
sdiv+='            <div class="degreeitem">';if(res.follwNum>0){sdiv+='                <p class="degreefollow">'
+'                    <label>已关注人数：</label>'
+'                    <span>'+formatNum(res.follwNum)+'人</span>'
+'                </p>';}
if(res.tourNum>0){sdiv+='                <p class="degreetour">'
+'                    <label>已有点评数：</label>'
+'                    <span>'+formatNum(res.tourNum)+'人</span>'
+'                </p>';}
sdiv+='            </div>'
+'        </div>'
+stop
+picDiv
+'</div>';}
return sdiv;}}
function formatNum(num){if(num>=10000){return Math.floor(num/10000)+'万';}else{return num;}}});});define('index_amd/search_input_v2',['jquery'],function($){var search_input=search_input||{};search_input={init:function(){var _self=this;var s_input=$(".tn_s_input");var s_popbox=$("#searchInputBox");var search_box=$(".search_box");search_box.each(function(i,n){_self.showMoreCondition($(n));});this.seniorSearch();this.filterCont();this.showMTTwoLines();this.txt_focus();},creatPopbox:function(){},showPopBox:function(t,s){var _self=this;var tnSearchBox=$("#tnSearchBox");var search_pop_box=$(".search_pop_box");var tnSearchBoxhg=tnSearchBox.height();var updatePosition=function(){var _offset=tnSearchBox.offset();var tnSearchBoxBtom=_offset.top;var tnSearchBoxLeft=_offset.left;s.css({"top":tnSearchBoxBtom+tnSearchBoxhg,"left":tnSearchBoxLeft});}
if(tnSearchBox.length){tnSearchBox.find("input").click(function(e){$("#searchAdvBox").hide();if($.trim($("#keyword-input").val())==''){updatePosition();s.show();}
_self.stopEvent(e);});$(window).resize(function(){if(s.is(":visible")){updatePosition();}})
t.keyup(function(){if($.trim($("#keyword-input").val())=='')
{s.show();}else{s.hide();}});s.find(".closeThisBox").click(function(){s.hide();});s.click(function(e){try{e=e||window.event;var tar=e?e.target:e.srcElement;var m;while(tar.parentNode){if(tar.nodeName=="BODY"||tar.nodeName=="HTML"){break;}
if(m=tar.getAttribute("m")){window.eventTrack&&window.eventTrack.push({text:m,x:e.clientX,y:e.clientY});}
tar=tar.parentNode;}}catch(e){}
_self.stopEvent(e);});$("body").click(function(){s.hide();});$("#searchInputBox").mouseleave(function(){s.hide();});}},stopEvent:function(event){var e=event||window.event;if(e.stopPropagation){e.stopPropagation();}else{e.cancelBubble=true;}},showMoreCondition:function(t){var _state=true;var __this=this;var t_moreCondition=t.find(".moreCondition");t.find(".showallbtn_s a").click(function(){var t_this=$(this);if(t_moreCondition.hasClass("hide")){t_moreCondition.slideDown(function(){t_moreCondition.removeClass("hide").show();if(_state){__this.showMTTwoLines(t_moreCondition);_state=false;}});t_this.html("收起更多 <em class='tn_fontface'>&#xe620;</em>");}else{t_moreCondition.slideUp(function(){t_moreCondition.addClass("hide").hide();});t_this.html("更多条件（交通类型、住宿类型、组团特色、产品特色） <em class='tn_fontface'>&#xe61f;</em>");}});},showMTTwoLines:function(t){var J_prop=t?t.find(".search_adv_others"):$(".search_adv_others");J_prop.each(function(i,n){if(parseInt($(n).css("height"))>28){$(n).css("height",28);$(n).next(".search_adv_more").show().unbind("click").click(function(){$(n).hasClass("isShowALl")?$(n).removeClass("isShowALl").css("height",28):$(n).addClass("isShowALl").css("height","auto");$(n).hasClass("isShowALl")?$(this).html("<span>收起<i class='tn_fontface'>&#xe620;</i></span>"):$(this).html("<span>更多<i class='tn_fontface'>&#xe61f;</i></span>");});}
else{$(n).css("height","auto");}});},seniorSearch:function(){var _self=this;var _state=true;var seniorSearch=$("#seniorSearch");var search_pop_box=$(".search_pop_box");var tnSearchBox=$("#tnSearchBox");var tnSearchBoxhg=tnSearchBox.height();var updatePositionAdv=function(){var advOffset=tnSearchBox.offset();var tnSearchBoxBtom=advOffset.top;var tnSearchBoxLeft=advOffset.left;search_pop_box.css({"top":tnSearchBoxBtom+tnSearchBoxhg-2,"left":tnSearchBoxLeft});}
seniorSearch.click(function(){updatePositionAdv();search_pop_box.toggle();if(search_pop_box.css("display")==="block"){$("#searchInputBox").hide();$(".autocomplete").hide();}
if(_state){_self.showMTTwoLines($("#searchAdvBox"));_state=false;}
return false;});$(window).resize(function(){if(search_pop_box.is(":visible")){updatePositionAdv();}})
search_pop_box.find(".closeSenSearch").click(function(e){search_pop_box.hide();_self.stopEvent(e);});search_pop_box.click(function(e){_self.stopEvent(e);});$("body").click(function(){search_pop_box.hide();});},filterCont:function(){var search_adv_others_a=$(".search_adv_others a");var search_adv_buxian_a=$(".search_adv_buxian a");search_adv_others_a.click(function(){var $this=$(this);$this.parent().prev().find("a").removeClass('checked');if($this.hasClass('checked')){$this.removeClass('checked');}else{if($this.parent(".onlyShowOne").length){$this.siblings('.checked').removeClass('checked');}
$this.addClass('checked');}});search_adv_buxian_a&&search_adv_buxian_a.click(function(){var $this=$(this);$this.addClass('checked');$this.parent().next().find("a").removeClass('checked');});},filterDate:function(){var _self=this;var search_input_date_1=$(".search_input_date");var search_input_date_2=$(".search_input_date_2");search_input_date_1.TN_date({wrap:$("body"),onSelect:function(){}});search_input_date_2.TN_date({wrap:$("body"),onSelect:function(){}});},txt_focus:function(){var $keyWord=$(".input_addr");var a=$keyWord.val();$keyWord.focus(function(){if(this.value==a){this.value="";this.style.color="#333"}});$keyWord.blur(function(){if(this.value==""){this.value=a;this.style.color="#aaa"}});},clearSearchLens:function(thisObj){var cur=$(thisObj);var _parents=cur.parents(".search_box").eq(0);_parents.find(".search_adv_others a").removeClass("checked");_parents.find(".search_adv_buxian a").addClass("checked");_parents.find(".J_FilterCustomPrice input").val("");_parents.find(".search_adv_properties input").val("");}}
window.search_input=search_input;return search_input;});;define('index_amd/search_ajax_home',['jquery','index_amd/search_input_v2'],function($,search_input){var search_ajax=search_ajax||{};search_ajax={newHotSearch:false,init:function(){var _self=this;_self.getAll();},getCookie:function(NameOfCookie){if(document.cookie.length>0)
{begin=document.cookie.indexOf(NameOfCookie+"=");if(begin!=-1)
{begin+=NameOfCookie.length+1;end=document.cookie.indexOf(";",begin);if(end==-1)end=document.cookie.length;return unescape(document.cookie.substring(begin,end));}}
return null;},getAll:function(){var _self=this;var url='//s.tuniu.com/tn?r=search/search/callwidget&type=all';var _tact=_self.getCookie('_tact')||'';var tuniuuser=_self.getCookie('tuniuuser')||'';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback",data:{'_tact':_tact,'tuniuuser':tuniuuser},success:function(json){search_ajax.cjAdvanceCallback(json);search_input.init();if(json.hot&&json.hot.length>0){_self.newHotSearch=true;_self.cjHotCallback(json);search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));if($('#searchInputBox .J_MForHS').length>0){_self.monitorForHotSearch();}
$("#searchInputBox").find("a").bind('click',function(e){e.preventDefault();var link=$(this).attr('href');var keyword=$(this).text();if(link===undefined){return;}
addSearchCookie(keyword,link);setTimeout(setTimeout(function(){window.location.href=link;},700));});}}});},monitorForHotSearch:function(){var _self=this;var atNa='liWithHan';var atNaN='liWithHans';$('#searchInputBox').find('.J_MForHS a').on('click',function(e){var position=[];var aa=0;var TJ='';var getIndex=function($element){var i=$element.prevAll($element.get(0).tagName).length;position.unshift([$element.get(0).tagName,i+1]);var $parent=$element.parent();if(!$parent.hasClass("an_mo")){getIndex($parent);}else{position.unshift([atNa,$parent.attr(atNa),$parent.prevAll("["+atNa+"="+$parent.attr(atNa)+"]").length+1]);if($element.siblings('textarea').first().hasClass("TomJerry")){TJ=$element.siblings('textarea').first().text();}}};getIndex($(this));var X=$(this).offset().top;var Y=$(this).offset().left;var location=[Math.round(X),Math.round(Y-($(document).width()/2))];var fromUrl=window.location.href;var visitUrl=$(this).attr('href');var pageSize=[$(window).height(),$(window).width()];var resolution=_self.screenInfo();var system=_self.getPlatformInfo();var browserInfo=_self.getBrowserInfo();var screenColor=screen.colorDepth;var flashVision=_self.getFlashVision();var javaEnabled=navigator.javaEnabled()?1:0;var cookieEnabled=navigator.cookieEnabled?"1":"0";var title=document.title;var pageName='';$.ajax({type:"POST",dataType:"json",url:"/LiAndHan/index",data:{'position':position,'location':location,'fromUrl':fromUrl,'visitUrl':visitUrl,'resolution':resolution,'pageSize':pageSize,'operatingSystem':system,'browserInfo':browserInfo,'screenColor':screenColor,'flashVision':flashVision,'javaEnabled':javaEnabled,'cookieEnabled':cookieEnabled,'title':title,'pageName':pageName,'tj':TJ},success:function(msg){}});return true;});},getBrowserInfo:function(){browserType=(navigator.userAgent.toLowerCase().match(/(?:firefox|opera|safari|chrome|msie|micromessenger)/))[0];browserVersion=$.browser.version;return[browserType,browserVersion];},screenInfo:function(){screenHeight=screen.height;screenWidth=screen.width;return[screenHeight,screenWidth];},getPlatformInfo:function(){var platform="not set",isWin=(navigator.platform=="Win32")||(navigator.platform=="Windows"),isMac=(navigator.platform=="Mac68K")||(navigator.platform=="MacPPC")||(navigator.platform=="Macintosh"),isUnix=(navigator.platform=="X11")&&!isWin&&!isMac;if(isMac){platform="Mac";}
if(isUnix){platform="Unix";}
if((String(navigator.platform).indexOf("Linux")>-1)){platform="Linux";}
if(isWin){if(navigator.userAgent.indexOf("Win95")>-1||navigator.userAgent.indexOf("Windows 95")>-1){platform="windows 95";}
if(navigator.userAgent.indexOf("Win98")>-1||navigator.userAgent.indexOf("Windows 98")>-1){platform="windows 98";}
if(navigator.userAgent.indexOf("Windows 9x 4.90")>-1||navigator.userAgent.indexOf("Windows ME")>-1){platform="windows ME";}
if(navigator.userAgent.indexOf("Windows NT 5.0")>-1||navigator.userAgent.indexOf("Windows 2000")>-1){platform="windows 2000";}
if(navigator.userAgent.indexOf("Windows NT 5.1")>-1||navigator.userAgent.indexOf("Windows XP")>-1){platform="windows XP";}
if(navigator.userAgent.indexOf("Windows NT 5.2")>-1||navigator.userAgent.indexOf("Windows 2003")>-1){platform="windows 2003";}
if(navigator.userAgent.indexOf("Windows NT 6.0")>-1||navigator.userAgent.indexOf("Windows Vista")>-1){platform="Windows Vista";}
if(navigator.userAgent.indexOf("Windows NT 6.1")>-1||navigator.userAgent.indexOf("Windows 7")>-1){platform="Win7";}
if(navigator.userAgent.indexOf("Windows NT 6.2")>-1||navigator.userAgent.indexOf("Windows 8")>-1){platform="Win8";}}
android=navigator.userAgent.match(/(Android)[\s\/]+([\d\.]+)/);iPad=navigator.userAgent.match(/iPad/i);iPhone=navigator.userAgent.match(/iPhone/i);iPod=navigator.userAgent.match(/iPod/i);windowsPhone=navigator.userAgent.match(/(Windows\s+Phone)\s([\d\.]+)/);if(android){platform="Android";}
if(iPad){platform="iOS-Pad";}
if(iPhone){platform="iOS-Phone";}
if(iPod){platform="iOS-Pod";}
if(windowsPhone){platform="WindowsPhone";}
return platform;},getFlashVision:function(){var f="-",fl;if(navigator.plugins&&navigator.plugins.length){for(var ii=0;ii<navigator.plugins.length;ii++){if(navigator.plugins[ii].name.indexOf("Shockwave Flash")!=-1){f=navigator.plugins[ii].description.split("Shockwave Flash ")[1];break;}}}else{try{fl=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");f=fl.GetVariable("$version");}catch(e){}
if(f=="-"){try{fl=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");f="WIN 6,0,21,0";fl.AllowScriptAccess="always";f=fl.GetVariable("$version");}catch(e){}}
if(f=="-"){try{fl=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");f=fl.GetVariable("$version");}catch(e){}}
if(f!="-"){f=f.split(" ")[1].split(",");;f=f[0]+"."+f[1]+" r"+f[2];}}
return f;},getHot:function(){var _self=this;var url=''+'//s.tuniu.com/tn?r=search/search/callwidget&type=hot';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback",success:function(json)
{_self.newHotSearch=true;_self.cjHotCallback(json);search_input.showPopBox($(".tn_s_input"),$("#searchInputBox"));}});},cjAdvanceCallback:function(json){if(json){$("body").append(json.advance);}},cjHotCallback:function(hotObj){if(hotObj){$("body").append(hotObj.hot);}},cookieClear:function(element){var url='//s.tuniu.com/tn?r=search/search/ajaxAddCookie';$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"jsoncallback",success:function(json)
{$(element).parents('.sib_last_search').remove();}});},advanceSearch:function(obj){var params={};$(obj).parents('div[box="searchBox"]').find("dl[filter-type]").each(function(){var filterType=$(this).attr('filter-type');switch(filterType){case'keyword':var advanceFunc=function(inputStr){if(inputStr===null||inputStr===undefined||inputStr===''||inputStr==='请输入目的地、主题或关键词'){return false;}else{return true;}};var defKeyword=false;var inputStr=advanceFunc($(this).find("input").val());if(!(defKeyword&&inputStr))params['keywords']=false;if(inputStr){params['keywords']=$(this).find("input").val();}else if(defKeyword){params['keywords']=$("#keyword-input").val();};break;case'planDate':var startDate=$(this).find('input[name="start"]').val();var endDate=$(this).find('input[name="end"]').val();if(startDate!='yyyy-mm-dd')params['startDate']=startDate;if(endDate!='yyyy-mm-dd')params['endDate']=endDate;break;case'price':var min=$(this).find('input[name="min"]').val();var max=$(this).find('input[name="max"]').val();if(min!='')params['minPrice']=min;if(max!='')params['maxPrice']=max;break;case'prdType':var prdType=$(this).find('.checked').attr('filter-value');if(prdType!='0')params['prdType']=prdType;break;default:var option=new Array();var rel=true;$(this).find("a[filter-value]").each(function(){if($(this).attr("class")=='checked'){var filterValue=$(this).attr('filter-value');if(filterValue==0){rel=false;}else{option.push(filterValue);}}});if(rel)params[filterType]=option;}});if(params.keywords!==false)
{$.ajax({type:'get',url:"//s.tuniu.com/tn?r=search/search/getUrlForHomePage",data:{'data':params},dataType:"jsonp",jsonp:"js_callback",success:function(data){window.location.href=data;}});}
else
{alert('请输入目的地、主题或关键词');}}};window.searchAjax=window.search_ajax=search_ajax;return search_ajax;});;define('index_amd/float_menu',['jquery'],function($){var exports={};exports.init=function(){var root=$(".float_menu"),layers=$(".layer");var height=$(root).height();$(root).css("top",0-height);var layerPositions=[];for(var i=0;i<$(layers).length;i++){layerPositions.push($(layers).eq(i).offset().top);}
var scrollHandler=null,prevScrollTop=$(window).scrollTop();function updateLayerPostions(){layerPositions=[];for(var i=0;i<$(layers).length;i++){layerPositions.push($(layers).eq(i).offset().top);}}
updateLayerPostions();$(window).on("adClosed adLoaded resize",updateLayerPostions);function updateFloatMenu(){var scrollTop=$(window).scrollTop();mainBodyTop=$(".main_body").offset().top-100;if(prevScrollTop<mainBodyTop&&scrollTop>=mainBodyTop){$(root).animate({top:"300"},"normal","swing",function(){$(root).animate({top:"50"},"normal","swing");});}
if(prevScrollTop>=mainBodyTop&&scrollTop<mainBodyTop){var windowHeight=$(window).height();$(root).animate({top:windowHeight+height},"normal","swing",function(){$(root).css("top",0-height);});}
var menuItems=$(root).find("li:not(.separator)"),nearestLayer=0;for(var len=layerPositions.length,i=len-1;i>=0;i--){if(($(menuItems).eq(i).offset().top)>=layerPositions[i]){nearestLayer=i;break;}}
$(root).find("li").not(".separator").removeClass("selected").css("background","#fff");var color=$(layers).eq(nearestLayer).find(".layer_header li.current a").css("border-bottom-color");if(!color){color="#d06dc3";}
$(root).find("li").not(".separator").eq(nearestLayer).addClass("selected").css("background",color);prevScrollTop=scrollTop;}
$(window).scroll(function(){if(scrollHandler){clearTimeout(scrollHandler);}
scrollHandler=setTimeout(function(){updateFloatMenu();scrollHandler=null;},10);});$(root).on("click","li:not(.separator)",function(){var idx=$(this).prevAll().not(".separator").length,top=$(this).offset().top,scrollTop=$(window).scrollTop();var position=layerPositions[idx]-(top-scrollTop);$("html, body").animate({scrollTop:position},300);});};return exports;});;define('index_amd/start_city_search',['jquery'],function($){var exports={};var startCitySearch=startCitySearch||{};startCitySearch={init:function(){var i=this;i.bind();i.cityTabClick();i.searchCity();i.rendRresetSearchInput();},bind:function(){var obj=$('#startCity');var sc_name=$('#startCity .sc_name');var serBox=obj.find('.show_city');var tagBox=obj.find('.tagBox');var input=$("#startCityKeyword");var result=$("#stationSearchResult");var tip=obj.find('.station_search_box p');var _this=this;obj.one('mouseenter',function(){var $textarea=serBox.find('textarea.storedata');if($textarea[0]){tagBox.html($textarea.text());}}).mouseenter(function(){this.className="head_start_city change_tab";}).mouseleave(function(){this.className="head_start_city";input.val('');input.blur();result.hide();}),input.focus(function(){$(this).parent().addClass("on");var a=$(this).val();if(a==''){tip.hide();}}),input.blur(function(){$(this).parent().removeClass("on");var a=$(this).val();if(a==''){tip.show();}else{tip.hide();}})},rendRresetSearchInput:function(){$("#startCityKeyword").val('');$("#stationSearchResult").hide();},stopEvent:function(event){var e=event||window.event;if(e.stopPropagation){e.stopPropagation();}else{e.cancelBubble=true;}},cityTabClick:function(){$('.show_city').on('click','.station_titlist li',function(){var _this=$(this);var index=$(this).index();_this.addClass('selectTag').siblings().removeClass('selectTag');$('#tagContent .tagContent').hide();$('#tagContent .tagContent').eq(index).show();})},searchCity:function(){var _this=this;var currentValue='';var defauleValue='';var request=null;var tip=$("#startCity .s_text");var debounce=function(idle,action){var last;return function(){var ctx=this,args=arguments;clearTimeout(last);last=setTimeout(function(){action.apply(ctx,args);},idle);};};var ieInputHandler=debounce(300,function(event){var keyCode=event.keyCode;if($.browser.msie&&((keyCode>=48&&keyCode<=57)||(keyCode>=65&&keyCode<=90)||(keyCode>=96&&keyCode<=105)||keyCode==46||keyCode==8||keyCode==13||keyCode==32)){tip.hide();var currentValue=lTrim($("#startCityKeyword").val());if(currentValue!==defauleValue){if($("#stationSearchResult .no_result").is(":visible")&&(currentValue.length>defauleValue.length)){return;}
defauleValue=currentValue;ajaxCity(currentValue);}}});var standardInputHandler=debounce(300,function(){tip.hide();var currentValue=$("#startCityKeyword").val().replace(/\s+/g,"");if(currentValue!==defauleValue){if($("#stationSearchResult .no_result").is(":visible")&&(currentValue.length>defauleValue.length)){return;}
defauleValue=currentValue;ajaxCity(currentValue);}});if($.browser.msie){$("#startCityKeyword").keyup(function(event){ieInputHandler(event);});}else{$("#startCityKeyword").bind('input',function(){standardInputHandler();});}
function lTrim(str){if(str.charAt(0)==" "){str=str.slice(1);str=lTrim(str);}
return str;}
function ajaxCity(i){var input=$("#startCityKeyword");var result=$("#stationSearchResult");if(request!=null){request.abort();if(i==""){result.html('');return;}}
request=$.ajax({url:"/tn?r=homepage/site/CityQueryAjax",type:'GET',dataType:"jsonp",jsonp:"jsoncallback",data:{'query':i},success:function(json){if(json.data.cities==null){result.html('<p class="no_result">对不起，暂时没有找到结果</p>');result.show();}else{var jsonList=json.data.cities;result.html('');for(var i=0;i<jsonList.length;i++){result.append('<a href="'+jsonList[i].url+'">'+jsonList[i].cityName+'</a>');result.show();if(i==4){break;}}}},error:function(){}});}}}
exports.init=function(){startCitySearch.init();};return exports;});;define('index_amd/right_part',['jquery','index_amd/data'],function($,DATA){var exports={};var aside_footprint=function(){var root=$(".your_footprint"),actions=$(root).find("h4 .actions"),footprintList=$(root).find(".widget_content .footprint_list"),isSliding=false,position=1;var len=$(footprintList).find(".widget_item").length;actions.on("click",".icon_btn_left",function(){if(isSliding)return;if(position>1){var prevPosition=position;var n=position-1;if(n>=4){position=position-4;}else{position=position-n;}
var top=(prevPosition-position)*80;isSliding=true;$(footprintList).find(".widget_item").animate({top:"+="+top},"normal","linear",function(){isSliding=false;});}});actions.on("click",".icon_btn_right",function(){if(isSliding)return;if((position+4)<=len){var prevPosition=position;var n=len-position-3;if(n>=4){position=position+4;}else{position=position+n;}
var top=(position-prevPosition)*80;isSliding=true;$(footprintList).find(".widget_item").animate({top:"-="+top},"normal","linear",function(){isSliding=false;});}});}
var interest_dest=function(){var root=$(".interest_dest"),actions=$(root).find("h4 .actions"),destList=$(root).find(".dest_list"),isSliding=false,position=1;var len=$(destList).find(".dest_item").length;actions.on("click",".icon_btn_left",function(){if(isSliding)return;if(position>1){var prevPosition=position;var n=position-1;if(n>=3){position=position-3;}else{position=position-n;}
var left=(prevPosition-position)*75;isSliding=true;$(destList).find(".dest_item").animate({left:"+="+left},"normal","linear",function(){isSliding=false;});}});actions.on("click",".icon_btn_right",function(){if(isSliding)return;if((position+3)<=len){var prevPosition=position;var n=len-position-2;if(n>=3){position=position+3;}else{position=position+n;}
var left=(position-prevPosition)*75;isSliding=true;$(destList).find(".dest_item").animate({left:"-="+left},"normal","linear",function(){isSliding=false;});}});}
var clearTime="";var clearTime2="";var latest_comments=function(){var root=$(".latest_comments"),comments=$(root).find(".comment_list");var li_heig=0;function slide(){li_heig=parseInt(comments.find("li").eq(0).height())+10;comments.find("li").animate({top:"-="+li_heig},"normal","linear",function(){});clearTime=setTimeout(function(){var comment=comments.find("li").eq(0).remove();$(comments).append(comment);$(comments).find("li").css("top",0);slide();},3000);}
if(comments.height()>root.height()){comments.hover(function(){clearTimeout(clearTime);clearTimeout(clearTime2);},function(){clearTime2=setTimeout(function(){slide();},1500);});slide();}};var aside_tab=function(){var root=$(".best_seller"),tabs=$(root).find(".tabs"),tabContents=$(root).find(".tab_contents");$(tabs).find("li").click(function(){if($(this).hasClass("current")){return;}
var self=this;_index=$(self).index();$(tabs).find("li").removeClass("current");$(self).addClass("current");$(root).find(".tab_contents>li").removeClass("current");$(root).find(".tab_contents>li").eq(_index).addClass("current").find('.seller_item img').each(function(){var real_src=$(this).attr('data-src');if(real_src){$(this).removeAttr('data-src');$(this).attr('src',real_src);}});})}
var tourism_scroll=function(){var resizeHandler=null;var root=$("#tourism_wrap_inner"),comments=$("#tourismLists");var ul_heig=parseInt(comments.height());var li_heig=parseInt(comments.find("li").eq(0).height());var t=0;var n=Math.ceil(ul_heig/li_heig)-1;$(window).resize(function(e){if(resizeHandler){clearTimeout(resizeHandler);}
resizeHandler=setTimeout(function(){ul_heig=parseInt(comments.height());n=Math.ceil(ul_heig/li_heig)-1;resizeHandler=null;},20)})
if(n<=1){return;}else{autoSlide();}
function slide(){t=(t+1)%n;comments.animate({top:-li_heig*t},"normal","linear",function(){autoSlide();})}
function autoSlide(){setTimeout(slide,3000);}};exports.init=function(){DATA.promises.footprint.done(aside_footprint);DATA.promises.interest_dest.done(interest_dest);DATA.promises.latest_comments.done(latest_comments);DATA.promises.tourism_scroll.done(tourism_scroll);};return exports;});;define('index_amd/mods1',['jquery','common_amd/tool'],function($,tool){var exports={};exports.init=function(){require(['common_amd/getDegree']);require(['common_amd/jquery.autocomplete_divbycat']);require(['common_amd/recordCookie']);require(['common_amd/search_input']);require(['index_amd/search_ajax_home'],function(mod){mod.init();});require(['index_amd/float_menu'],function(mod){mod.init();});require(['index_amd/right_part'],function(mod){mod.init();});require(['index_amd/start_city_search'],function(mod){mod.init();});require(['rightcommon_amd/getdata'],function(mod){mod.init({productType:0,productId:-1,success:function(data){console.log(data);$('.site_contact').prepend('<a class="headTuniuKefu" href="javascript:;">'+'<img src="//ssl1.tuniucdn.com/img/2017020818/header/head_tel.png" style="width: 28px;" /><span>欢迎使用<i>在线客服</i></span>'+'</a>');}});});var getCookieUserInfo=function(){return tool.cookie.get("tuniuuser_cust_type");}
var upDateClub=function(){var ueserNum=tool.base64.decode(getCookieUserInfo())||0;if(ueserNum==4||ueserNum==5){$('#club').css('display','none');}}
upDateClub()};return exports;});