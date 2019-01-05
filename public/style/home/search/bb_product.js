(function(window,document){var converDataPst=function(oriData,el){var handleDataPstFunction=typeof window.BBProductHandleDataPst=='function'?window.BBProductHandleDataPst:null;var result=oriData;if(handleDataPstFunction){result=handleDataPstFunction(oriData,el);}
return(result||result=='')?result:oriData;};var addPstData=function(e){var event=window.event||e;var oriTar=event.target||event.srcElement;var tar=oriTar;var links=[]; 
while(tar&&tar.nodeName!="BODY"){ 
if(tar.nodeName=="A"){ 
links.push(tar); } 
tar=tar.parentNode||tar.parentElement; } 
for(var i=0;i<links.length;i++){ 
var hash=links[i].getAttribute("data-pst")||"";var oldUrl=links[i].getAttribute("href"); 
var hashUrl; 
if(hash){ 
hash=converDataPst(hash,oriTar);var urlArr=oldUrl.split("#"),hashStr=urlArr>1?(hash+'#'+urlArr.slice(1).join("#")):hash; 
if(urlArr[0].indexOf("?")==-1){ 
hashUrl=urlArr[0]+"?"+hashStr; } 
else{ 
hashUrl=urlArr[0]+"&"+hashStr; } 
links[i].setAttribute("href",hashUrl);links[i].removeAttribute("data-pst");break; } } };if(window.addEventListener){document.body.addEventListener("click",addPstData,false);}else{document.body.attachEvent("onclick",addPstData);}})(window,document);