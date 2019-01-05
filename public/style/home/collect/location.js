var locationchange = {
    checkip: function() {
        var citycode = locationchange.getCookie('tuniuuser_ip_citycode');
        var citycodeTuniu = locationchange.getCookie('tuniuuser_citycode');
        setlocationcookie(citycodeTuniu);
        if (citycode) {
            return false;
        } else {
            var remind_url = '/ajax/locationchange/';
            var xmlHttp = null;
            if (window.ActiveXObjext) {
                xmlHttp = new ActiveXObject("Microsoft,XMLHTTP");
            } else if (window.XMLHttpRequest) {
                xmlHttp = new XMLHttpRequest();
            } else {
                return false;
            }
            if (xmlHttp != null) {
                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 4) {
                        if (xmlHttp.status == 504) {
                            xmlHttp.abort();
                        } else if (xmlHttp.status == 200) {
                            var dataObj = eval('(' + xmlHttp.responseText + ')');
                            if (dataObj.code == 1) {
                                var html = dataObj.result;
                                var showcity = document.getElementById('startCity').parentNode;
                                showcity.insertAdjacentHTML('afterbegin', html);
                                setlocationcookie(dataObj.baseCode);
                                var t = setTimeout("closelocationchange()", 60000);
                            }
                        }
                    }
                }
                xmlHttp.open("GET", remind_url, true);
                xmlHttp.timeout = 1000;
                xmlHttp.send(null);
            }
            return false;
        }
    },
    getCookie: function(name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
};

if (document.all) {
window.attachEvent('onload', docheck);
} else {
window.addEventListener('load', docheck, false);
}

function docheck(){
    var startCity = document.getElementById('startCity');
    var citycodeTuniu = locationchange.getCookie('tuniuuser_citycode');
    if (startCity && citycodeTuniu) {
        locationchange.checkip();
    }
}

function changelocationbyip(code, href) {
    var Days = 7;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = 'tuniuuser_citycode' + "=" + code + ";expires=" + exp.toGMTString() + ";path=/;domain=.tuniu.com";
    window.location.href = href;
    return false;
}
function closelocationchange() {
    var cityBtn = document.getElementById('cityBtn-hover');
    if (cityBtn) {
        cityBtn.style.display = 'none';
    }
    return false;
}
function setlocationcookie(code) {
    var expip = new Date();
    expip.setTime(expip.getTime() + 1 * 24 * 60 * 60 * 1000);
    document.cookie = 'tuniuuser_ip_citycode' + "=" + code + ";expires=" + expip.toGMTString() + ";path=/;domain=.tuniu.com";
    return false;
}





