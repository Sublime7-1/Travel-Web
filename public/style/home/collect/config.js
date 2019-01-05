!function(){var a=function(){function a(){}function b(a){return decodeURIComponent(a.replace(/\+/g," "))}function c(a,b){var c=a.charAt(0),d=b.split(c);return c===a?d:(a=parseInt(a.substring(1),10),d[a<0?d.length+a:a-1])}function d(a,c){for(var d=a.charAt(0),e=c.split("&"),f=[],g={},h=[],i=a.substring(1),j=0,k=e.length;j<k;j++)if(f=e[j].match(/(.*?)=(.*)/),f||(f=[e[j],e[j],""]),""!==f[1].replace(/\s/g,"")){if(f[2]=b(f[2]||""),i===f[1])return f[2];h=f[1].match(/(.*)\[([0-9]+)\]/),h?(g[h[1]]=g[h[1]]||[],g[h[1]][h[2]]=f[2]):g[f[1]]=f[2]}return d===a?g:g[i]}return function(b,e){var f,g={};if("tld?"===b)return a();if(e=e||window.location.toString(),!b)return e;if(b=b.toString(),f=e.match(/^mailto:([^\/].+)/))g.protocol="mailto",g.email=f[1];else{if((f=e.match(/(.*?)\/#\!(.*)/))&&(e=f[1]+f[2]),(f=e.match(/(.*?)#(.*)/))&&(g.hash=f[2],e=f[1]),g.hash&&b.match(/^#/))return d(b,g.hash);if((f=e.match(/(.*?)\?(.*)/))&&(g.query=f[2],e=f[1]),g.query&&b.match(/^\?/))return d(b,g.query);if((f=e.match(/(.*?)\:?\/\/(.*)/))&&(g.protocol=f[1].toLowerCase(),e=f[2]),(f=e.match(/(.*?)(\/.*)/))&&(g.path=f[2],e=f[1]),g.path=(g.path||"").replace(/^([^\/])/,"/$1"),b.match(/^[\-0-9]+$/)&&(b=b.replace(/^([^\/])/,"/$1")),b.match(/^\//))return c(b,g.path.substring(1));if(f=c("/-1",g.path.substring(1)),f&&(f=f.match(/(.*?)\.(.*)/))&&(g.file=f[0],g.filename=f[1],g.fileext=f[2]),(f=e.match(/(.*)\:([0-9]+)$/))&&(g.port=f[2],e=f[1]),(f=e.match(/(.*?)@(.*)/))&&(g.auth=f[1],e=f[2]),g.auth&&(f=g.auth.match(/(.*)\:(.*)/),g.user=f?f[1]:g.auth,g.pass=f?f[2]:void 0),g.hostname=e.toLowerCase(),"."===b.charAt(0))return c(b,g.hostname);a()&&(f=g.hostname.match(a()),f&&(g.tld=f[3],g.domain=f[2]?f[2]+"."+f[3]:void 0,g.sub=f[1]||void 0)),g.port=g.port||("https"===g.protocol?"443":"80"),g.protocol=g.protocol||("443"===g.port?"https":"http")}return b in g?g[b]:"{}"===b?g:void 0}}();"function"==typeof window.define&&window.define.amd?window.define("js-url",[],function(){return a}):("undefined"!=typeof window.jQuery&&window.jQuery.extend({jsUrl:function(a,b){return window.jsUrl(a,b)}}),window.jsUrl=a)}();

/**
 *  global configuration object
 *  tuniu {
 *      functions: 函数集合
 *      config: {
 *         appBaseUrls: ...
 *         cdn: ...
 *      }
 *  }
 *
 */
var tuniu = window.tuniu || {};
tuniu.functions = tuniu.functions || {};
tuniu.config = tuniu.config || {};
tuniu.config.appBaseUrls = {"default":"/","pc-https":"https://www.tuniu.com","achilles":"http://www.tuniu.com","ares":"https://m.tuniu.com/h5","mtuniu":"https://m.tuniu.com","hsww":"http://www.tuniu.com","web-catalog":"//www.tuniu.com/web-catalog","web-chat":"http://www.tuniu.com/web-chat","web-community":"http://www.tuniu.com/web-community","web-detail":"http://www.tuniu.com/web-detail","web-guide":"http://www.tuniu.com/web-guide","web-mall":"http://www.tuniu.com/web-mall","web-ichannel":"http://www.tuniu.com/web-ichannel","web-personal":"http://www.tuniu.com/web-personal","web-global":"http://www.tuniuglobal.com","amw-apn":"http://www.tuniu.com/amw-apn","resp-detail":"https://www.tuniu.com/resp-detail","web-order":"http://www.tuniu.com/web-order","menpiao":"http://menpiao.tuniu.com","globalhotel":"http://globalhotel.tuniu.com","hotel":"http://hotel.tuniu.com","flight":"http://flight.tuniu.com","search":"http://s.tuniu.com","memeber":"https://i.tuniu.com","open":"http://open.tuniu.com"};
tuniu.config.cdn = {"jsVersion":201810301050,"cssVersion":201810301050,"imageVersion":201807111730,"appId":"achilles","configUrl":"xapi/xlayout/config","appConf":{"default":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"}},"global":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"","pathConf":{"javascript":"j","stylesheet":"s","image":"img","javascript_unmerged":"j","stylesheet_unmerged":"s"},"extends":false},"web-mall":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/mall","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-global":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/global","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"tuc-nuc":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/tuc/nuc","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-ichannel":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/ichannel","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-catalog":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/catalog","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-detail":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/detail","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-guide":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/guide","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-community":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/community","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-chat":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/chat","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-personal":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/personal","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"amw-apn":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/amw/apn","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-mall":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/mall","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-catalog":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/catalog","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-detail":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/detail","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-guide":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/guide","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-community":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/community","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-chat":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/chat","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-pamphlet":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/pamphlet","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-personal":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/personal","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"resp-detail":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/resp/detail","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"web-order":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/web/order","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"wap-user":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/wap/user","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"oap-portal":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/oap/portal","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"mob-achilles":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/mob/achilles","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"mob-ares":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"apps/mob/ares","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false},"achilles":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"static","pathConf":{"javascript":"j","stylesheet":"s","image":"img","javascript_pack":"d","stylesheet_pack":"d","javascript_unmerged":"j","stylesheet_unmerged":"s"},"extends":false},"ares":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"","pathConf":{"javascript":"mj","stylesheet":"ms","image":"site/m2015/images","javascript_unmerged":"mj","stylesheet_unmerged":"ms"},"extends":false},"mtuniu":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"","pathConf":{"javascript":"mj","stylesheet":"ms","image":"site/images","javascript_unmerged":"mj","stylesheet_unmerged":"ms"},"extends":false},"hsww":{"hosts":["//img1.tuniucdn.com"],"baseUrl":"","pathConf":{"javascript":"libs","stylesheet":"styles","image":"images","javascript_unmerged":"libs","stylesheet_unmerged":"styles"},"extends":false}},"env":"prd","appBaseUrls":{"default":"/","pc-https":"https://www.tuniu.com","achilles":"http://www.tuniu.com","ares":"https://m.tuniu.com/h5","mtuniu":"https://m.tuniu.com","hsww":"http://www.tuniu.com","web-catalog":"//www.tuniu.com/web-catalog","web-chat":"http://www.tuniu.com/web-chat","web-community":"http://www.tuniu.com/web-community","web-detail":"http://www.tuniu.com/web-detail","web-guide":"http://www.tuniu.com/web-guide","web-mall":"http://www.tuniu.com/web-mall","web-ichannel":"http://www.tuniu.com/web-ichannel","web-personal":"http://www.tuniu.com/web-personal","web-global":"http://www.tuniuglobal.com","amw-apn":"http://www.tuniu.com/amw-apn","resp-detail":"https://www.tuniu.com/resp-detail","web-order":"http://www.tuniu.com/web-order","menpiao":"http://menpiao.tuniu.com","globalhotel":"http://globalhotel.tuniu.com","hotel":"http://hotel.tuniu.com","flight":"http://flight.tuniu.com","search":"http://s.tuniu.com","memeber":"https://i.tuniu.com","open":"http://open.tuniu.com"}};
var cdnConf = tuniu.config.cdn;

function selectOneHost(hosts) {
    var randomIndex = (new Date() - 0) % hosts.length;
    return hosts[randomIndex];
}

function _getRegularOptions(options) {
    if (typeof options === 'string') {
        options = {
            appId: options
        };
    }
    options = options || {};
    return options;
}

/**
 *  返回当前Web应用的完整URL地址
 *  options = {
 *     appId:
 *  }
 *
 */
function app_url(url, options) {
    options = _getRegularOptions(options);
    var appId = options.appId || cdnConf.appId;

    var fullUrl;
    if (/^(https?:\/\/|\/\/)/.test(url)) {
        fullUrl = url;
    } else {
        var baseUrl = tuniu.config.appBaseUrls[appId] || '';
        if (/^\//.test(url)) {
            baseUrl = jsUrl('protocol', baseUrl) + '://' + jsUrl('hostname', baseUrl) + ((jsUrl('port', baseUrl) == 80 || jsUrl('port', baseUrl) == 443) ?'': ':' + jsUrl('port', baseUrl));
        }

        fullUrl = baseUrl.replace(/\/$/, '') + '/' + url.replace(/^\//, '');
    }
    return fullUrl;
}

/**
 *  返回CDN资源完整URL地址
 *  options = {
 *     appId:
 *     ver:
 *     type: javascript|stylesheet|image
 *  }
 *
 */
function resource_link(url, options) {
    options = _getRegularOptions(options);
    var appId = options.appId || cdnConf.appId;
    var thisAppConf = cdnConf.appConf[appId];

    var fullUrl;
    if (/^(https?:\/\/|\/\/)/.test(url)) {
        fullUrl = url;
    } else {
        url = url.replace(/^\//, '');
        var host =  selectOneHost(thisAppConf.hosts);
        var version = cdnConf.jsVersion;
        if (options.type === 'javascript' || /\.js$/.test(url)) {
            options.type = 'javascript';
            version = cdnConf.jsVersion;
        } else if (options.type === 'stylesheet' || /\.css$/.test(url)) {
            options.type = 'stylesheet';
            version = cdnConf.cssVersion;
        } else if (options.type === 'image' || /\.(jpg|jpeg|gif|png)$/.test(url)) {
            options.type = 'image';
            version = cdnConf.imageVersion;
        } else {
            options.type = '';
        }

        var baseUrl = thisAppConf.baseUrl.replace(/\/$/, '').replace(/^\//, '');
        if (version && options.ver === 'app-path') {
            baseUrl = baseUrl.replace(/^(apps\/)(.*)/, "$1" + version + "/$2");
        }

        var resType = thisAppConf.pathConf[options.type];
        fullUrl = host + '/' + (baseUrl && (baseUrl + '/') || '') + (resType && (resType + '/') || '') + url;
        if (version && (options.ver === true || options.ver === 'get')) {
            fullUrl += '?ver=' + version;
        }
    }
    return fullUrl;
}

function javascript_link(url, options) {
    options = _getRegularOptions(options);
    options.type = 'javascript';
    return resource_link(url, options);
}
function css_link(url, options) {
    options = _getRegularOptions(options);
    options.type = 'stylesheet';
    return resource_link(url, options);
}
function image_link(url, options) {
    options = _getRegularOptions(options);
    options.type = 'image';
    return resource_link(url, options);
}

window.asset_url = app_url;
window.asset_link = resource_link;
tuniu.functions = {
    resource_link: resource_link,
    asset_link: resource_link,
    javascript_link: javascript_link,
    css_link: css_link,
    image_link: image_link,
    app_url: app_url
};
