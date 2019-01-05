/**
 * @author: matthewsun(sunchengrui@tuniu.com)
 * @date: 2016-07-12
 * @function: TNCHAT_isShowChatEntry
 * @desc: 判断在线客服入口是否露出
 * @param {JSON} options 入参 示例：{entryTemplateId: 12, productId: 5803536, productType: 3} entryTemplateId 为模板配置Id，必传
 * @param {Function} callback 回调 callback接收data参数, data.status标示是否打开入口, data.url是对应的跳转链接
 * 示例
 * 1.产品入口
 * 特殊处理，options.rewriteChatAppUrl = true; 使用内部url处理函数 getOnlineChatAppUrl 生成url
     TNCHAT_isShowChatEntry({entryTemplateId: 12, productId: 5803536, productType: 3}, function(data) {
         if(!data.status) return;
         location.href = data.url
     })
 * 2.订单入口
     TNCHAT_isShowChatEntry({entryTemplateId: 13, orderId: 628243446, orderType: 11}, function(data) {
         if(!data.status) return;
         location.href = data.url
     })
 * 3.无产品无订单入口
     TNCHAT_isShowChatEntry({entryTemplateId: 14}, function(data) {
         if(!data.status) return;
         location.href = data.url
     })
 *
 */
;(function() {
    /**
     * @method getCookie
     * @param {String} name cookie的名字
     * @return {String} cookie值
     */
    function getCookie(name) {
        var arr = document.cookie.split('; '),
            i = 0,
            len = arr.length ;

        for(;i<len;i++){
            var arr2 = arr[i].split('=');
            if(arr2[0] == name) {
                return decodeURIComponent(arr2[1]);
            }
        }

        return null;
    }

    var formatParams = function(data) {//格式化参数
        var arr = [];
        for (var name in data) {
            arr.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
        }
        return arr.join('&');
    }

    var jsonp = function(options) {
        options = options || {};
        if (!options.url || !options.callback) {
            throw new Error("参数不合法");
        }

        //创建 script 标签并加入到页面中
        var callbackName = ('jsonp_' + Math.random()).replace(".", "");
        var oHead = document.getElementsByTagName('head')[0];
        var params = "";
        if(options.data){
            options.data[options.callback] = callbackName;
            params += formatParams(options.data);
        }else{
            params+=options.callback+"="+callbackName;
        }
        var oS = document.createElement('script');
        oHead.appendChild(oS);

        //创建jsonp回调函数
        window[callbackName] = function (json) {
            oHead.removeChild(oS);
            clearTimeout(oS.timer);
            window[callbackName] = null;
            options.success && options.success(json);
        };

        //发送请求
        oS.src = options.url + '?' + params;

        //超时处理
        if (options.time) {
            oS.timer = setTimeout(function () {
                window[callbackName] = null;
                oHead.removeChild(oS);
                options.fail && options.fail({ message: "超时" });
            }, options.time);
        }
    };

    /**
     * 判断是不是在途牛app环境里
     */
    function isApp() {
        return document.cookie.indexOf("deviceType")!=-1 || !!localStorage.getItem("zipLocation");
    }

    /**
     * 获取app版本号
     */
    function getAppVersion() {
        var AppVersion = '8.1.6';

        if(localStorage.getItem("appVersion")){
            AppVersion=localStorage.getItem("appVersion");
        }else{
            var versionCookie=document.cookie.match(/appVersion=([\.|\d]+)/);
            if(versionCookie && versionCookie[1]){
                AppVersion=versionCookie[1];
            }
        }

        return AppVersion;
    }

    /**
     * 通过ua判断是不是m站
     */
    function isMweb() {
        var userAgentInfo = navigator.userAgent;
        var Agents = ["Android", "iPhone",
                    "SymbianOS", "Windows Phone",
                    "iPad", "iPod"];
        var flag = false;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) {
                flag = true;
                break;
            }
        }
        return flag;
    }


    /**
     * 判断在线客服入口是否露出
     * @param {JSON} options 入参 示例：{entryTemplateId: 12, productId: 5803536, productType: 3} entryTemplateId 为模板配置Id，必传
     * @param {Function} callback 回调 callback接收data参数, data.status标示是否打开入口, data.url是对应的跳转链接
     */
    function isShowChatEntry(options, callbackHandler) {
        var d = {};

        if(options.productId) {
            d = {
                productId: options.productId,
                productType: options.productType
            }
        }else if(options.orderId) {
            d = {
                orderId: options.orderId,
                orderType: options.orderType
            }
        }
        if(typeof options.productType != 'undefined') {
            d.productType = options.productType;
        }

		if(options.userId){
			d.userId = options.userId;
		}
        d.entryTemplateId = options.entryTemplateId;
        if(options.appVersion) {
            d.appVersion = options.appVersion;
        }else {
            d.appVersion = getAppVersion();
        }
        if(options.ct) {
            d.ct = options.ct;
        }else if(getCookie('deviceType') == 0) {
            d.ct = 10;
        }else if(getCookie('deviceType') == 1) {
            d.ct = 20;
        }else if(/m.tuniu.com/.test(location.host) || isMweb()) {
            d.ct = 30;
        }else {
            d.ct = 100;
        }
        if(options.parameters) {
            d.parameters = options.parameters;
        }else {
            d.parameters = {};
            d.parameters.entranceUrl = encodeURIComponent(location.pathname + location.search);
        }

        /**
         * 对模板id为10001的PC页面设置静态配置模板跳转客服中心
         */
        if (d.ct == 100 && d.entryTemplateId == 10001) {
            callbackHandler({
                groupId: -1,
                status: true,
                url: encodeURIComponent('http://www.tuniu.com/kefu/center')
            });
            return ;
        }

        d = JSON.stringify(d);
        jsonp({
            url:"//m.tuniu.com/japi/chat/api/entryService/isShowChatEntry",
            callback:"cb",
            data:{cb:'jsoncallback',d:d},
            success:function(res){

                if (options.rewriteChatAppUrl && isApp() && res.success && res.data.status && res.data.url) {
                    if (navigator.userAgent.toLowerCase().indexOf('android') > -1) {
                        res.data.status = false;
                        res.data.url = '';
                    } else {
                        res.data.url = getOnlineChatAppUrl(res.data.groupId, options.productId, options.productType);
                    }
                }

                callbackHandler(res.data);
            },
            error: function(){
                callbackHandler({
                    "actionType": -1,
                    "containerId": -1,
                    "entryCategory": -1,
                    "groupId": -1,
                    "status": false,
                    "url": ""
                });
            }
        })
    }

    function getOnlineChatAppUrl(groupId,productId,productType) {
        var params = {
            "category_id":448,
            "consult_entrance_type":1,
            "destination_group_info":{
                "groupId":groupId,
                "orderId":'',
                "orderType":'',
                "presentedGroupName":"预订客服",
                "productId":productId,
                "productType":productType
            },
            "entrance_url":"",
            "faq":false,
            "faq_protocol_url":"",
            "from_faq_protocol":false,
            "line_type":-1,
            "need_check_order":false,
            "order_id":'',
            "product_id":productId,
            "product_type":productType,
            "template_id":18
        };
        return 'tuniuapp://page?iosPageName=TNChatCustomConsultMessageViewController&entryStyle=0&animated=1&androidPageName=com.tuniu.chat.activity.ConsultActivity&pluginType=9&parameters=' +JSON.stringify(params);
    }

    if (typeof window.TNCHAT_isShowChatEntry == 'undefined') {
        window.TNCHAT_isShowChatEntry = isShowChatEntry;
    }

})();
