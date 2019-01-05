(function(){var root=this;var previousUnderscore=root._;var breaker={};var ArrayProto=Array.prototype,ObjProto=Object.prototype,FuncProto=Function.prototype;var
push=ArrayProto.push,slice=ArrayProto.slice,concat=ArrayProto.concat,toString=ObjProto.toString,hasOwnProperty=ObjProto.hasOwnProperty;var
nativeForEach=ArrayProto.forEach,nativeMap=ArrayProto.map,nativeReduce=ArrayProto.reduce,nativeReduceRight=ArrayProto.reduceRight,nativeFilter=ArrayProto.filter,nativeEvery=ArrayProto.every,nativeSome=ArrayProto.some,nativeIndexOf=ArrayProto.indexOf,nativeLastIndexOf=ArrayProto.lastIndexOf,nativeIsArray=Array.isArray,nativeKeys=Object.keys,nativeBind=FuncProto.bind;var _=function(obj){if(obj instanceof _)return obj;if(!(this instanceof _))return new _(obj);this._wrapped=obj;};if(typeof exports!=='undefined'){if(typeof module!=='undefined'&&module.exports){exports=module.exports=_;}
exports._=_;}else{root._=_;}
_.VERSION='1.6.0';var each=_.each=_.forEach=function(obj,iterator,context){if(obj==null)return obj;if(nativeForEach&&obj.forEach===nativeForEach){obj.forEach(iterator,context);}else if(obj.length===+obj.length){for(var i=0,length=obj.length;i<length;i++){if(iterator.call(context,obj[i],i,obj)===breaker)return;}}else{var keys=_.keys(obj);for(var i=0,length=keys.length;i<length;i++){if(iterator.call(context,obj[keys[i]],keys[i],obj)===breaker)return;}}
return obj;};_.map=_.collect=function(obj,iterator,context){var results=[];if(obj==null)return results;if(nativeMap&&obj.map===nativeMap)return obj.map(iterator,context);each(obj,function(value,index,list){results.push(iterator.call(context,value,index,list));});return results;};var reduceError='Reduce of empty array with no initial value';_.reduce=_.foldl=_.inject=function(obj,iterator,memo,context){var initial=arguments.length>2;if(obj==null)obj=[];if(nativeReduce&&obj.reduce===nativeReduce){if(context)iterator=_.bind(iterator,context);return initial?obj.reduce(iterator,memo):obj.reduce(iterator);}
each(obj,function(value,index,list){if(!initial){memo=value;initial=true;}else{memo=iterator.call(context,memo,value,index,list);}});if(!initial)throw new TypeError(reduceError);return memo;};_.reduceRight=_.foldr=function(obj,iterator,memo,context){var initial=arguments.length>2;if(obj==null)obj=[];if(nativeReduceRight&&obj.reduceRight===nativeReduceRight){if(context)iterator=_.bind(iterator,context);return initial?obj.reduceRight(iterator,memo):obj.reduceRight(iterator);}
var length=obj.length;if(length!==+length){var keys=_.keys(obj);length=keys.length;}
each(obj,function(value,index,list){index=keys?keys[--length]:--length;if(!initial){memo=obj[index];initial=true;}else{memo=iterator.call(context,memo,obj[index],index,list);}});if(!initial)throw new TypeError(reduceError);return memo;};_.find=_.detect=function(obj,predicate,context){var result;any(obj,function(value,index,list){if(predicate.call(context,value,index,list)){result=value;return true;}});return result;};_.filter=_.select=function(obj,predicate,context){var results=[];if(obj==null)return results;if(nativeFilter&&obj.filter===nativeFilter)return obj.filter(predicate,context);each(obj,function(value,index,list){if(predicate.call(context,value,index,list))results.push(value);});return results;};_.reject=function(obj,predicate,context){return _.filter(obj,function(value,index,list){return!predicate.call(context,value,index,list);},context);};_.every=_.all=function(obj,predicate,context){predicate||(predicate=_.identity);var result=true;if(obj==null)return result;if(nativeEvery&&obj.every===nativeEvery)return obj.every(predicate,context);each(obj,function(value,index,list){if(!(result=result&&predicate.call(context,value,index,list)))return breaker;});return!!result;};var any=_.some=_.any=function(obj,predicate,context){predicate||(predicate=_.identity);var result=false;if(obj==null)return result;if(nativeSome&&obj.some===nativeSome)return obj.some(predicate,context);each(obj,function(value,index,list){if(result||(result=predicate.call(context,value,index,list)))return breaker;});return!!result;};_.contains=_.include=function(obj,target){if(obj==null)return false;if(nativeIndexOf&&obj.indexOf===nativeIndexOf)return obj.indexOf(target)!=-1;return any(obj,function(value){return value===target;});};_.invoke=function(obj,method){var args=slice.call(arguments,2);var isFunc=_.isFunction(method);return _.map(obj,function(value){return(isFunc?method:value[method]).apply(value,args);});};_.pluck=function(obj,key){return _.map(obj,_.property(key));};_.where=function(obj,attrs){return _.filter(obj,_.matches(attrs));};_.findWhere=function(obj,attrs){return _.find(obj,_.matches(attrs));};_.max=function(obj,iterator,context){if(!iterator&&_.isArray(obj)&&obj[0]===+obj[0]&&obj.length<65535){return Math.max.apply(Math,obj);}
var result=-Infinity,lastComputed=-Infinity;each(obj,function(value,index,list){var computed=iterator?iterator.call(context,value,index,list):value;if(computed>lastComputed){result=value;lastComputed=computed;}});return result;};_.min=function(obj,iterator,context){if(!iterator&&_.isArray(obj)&&obj[0]===+obj[0]&&obj.length<65535){return Math.min.apply(Math,obj);}
var result=Infinity,lastComputed=Infinity;each(obj,function(value,index,list){var computed=iterator?iterator.call(context,value,index,list):value;if(computed<lastComputed){result=value;lastComputed=computed;}});return result;};_.shuffle=function(obj){var rand;var index=0;var shuffled=[];each(obj,function(value){rand=_.random(index++);shuffled[index-1]=shuffled[rand];shuffled[rand]=value;});return shuffled;};_.sample=function(obj,n,guard){if(n==null||guard){if(obj.length!==+obj.length)obj=_.values(obj);return obj[_.random(obj.length-1)];}
return _.shuffle(obj).slice(0,Math.max(0,n));};var lookupIterator=function(value){if(value==null)return _.identity;if(_.isFunction(value))return value;return _.property(value);};_.sortBy=function(obj,iterator,context){iterator=lookupIterator(iterator);return _.pluck(_.map(obj,function(value,index,list){return{value:value,index:index,criteria:iterator.call(context,value,index,list)};}).sort(function(left,right){var a=left.criteria;var b=right.criteria;if(a!==b){if(a>b||a===void 0)return 1;if(a<b||b===void 0)return-1;}
return left.index-right.index;}),'value');};var group=function(behavior){return function(obj,iterator,context){var result={};iterator=lookupIterator(iterator);each(obj,function(value,index){var key=iterator.call(context,value,index,obj);behavior(result,key,value);});return result;};};_.groupBy=group(function(result,key,value){_.has(result,key)?result[key].push(value):result[key]=[value];});_.indexBy=group(function(result,key,value){result[key]=value;});_.countBy=group(function(result,key){_.has(result,key)?result[key]++:result[key]=1;});_.sortedIndex=function(array,obj,iterator,context){iterator=lookupIterator(iterator);var value=iterator.call(context,obj);var low=0,high=array.length;while(low<high){var mid=(low+high)>>>1;iterator.call(context,array[mid])<value?low=mid+1:high=mid;}
return low;};_.toArray=function(obj){if(!obj)return[];if(_.isArray(obj))return slice.call(obj);if(obj.length===+obj.length)return _.map(obj,_.identity);return _.values(obj);};_.size=function(obj){if(obj==null)return 0;return(obj.length===+obj.length)?obj.length:_.keys(obj).length;};_.first=_.head=_.take=function(array,n,guard){if(array==null)return void 0;if((n==null)||guard)return array[0];if(n<0)return[];return slice.call(array,0,n);};_.initial=function(array,n,guard){return slice.call(array,0,array.length-((n==null)||guard?1:n));};_.last=function(array,n,guard){if(array==null)return void 0;if((n==null)||guard)return array[array.length-1];return slice.call(array,Math.max(array.length-n,0));};_.rest=_.tail=_.drop=function(array,n,guard){return slice.call(array,(n==null)||guard?1:n);};_.compact=function(array){return _.filter(array,_.identity);};var flatten=function(input,shallow,output){if(shallow&&_.every(input,_.isArray)){return concat.apply(output,input);}
each(input,function(value){if(_.isArray(value)||_.isArguments(value)){shallow?push.apply(output,value):flatten(value,shallow,output);}else{output.push(value);}});return output;};_.flatten=function(array,shallow){return flatten(array,shallow,[]);};_.without=function(array){return _.difference(array,slice.call(arguments,1));};_.partition=function(array,predicate){var pass=[],fail=[];each(array,function(elem){(predicate(elem)?pass:fail).push(elem);});return[pass,fail];};_.uniq=_.unique=function(array,isSorted,iterator,context){if(_.isFunction(isSorted)){context=iterator;iterator=isSorted;isSorted=false;}
var initial=iterator?_.map(array,iterator,context):array;var results=[];var seen=[];each(initial,function(value,index){if(isSorted?(!index||seen[seen.length-1]!==value):!_.contains(seen,value)){seen.push(value);results.push(array[index]);}});return results;};_.union=function(){return _.uniq(_.flatten(arguments,true));};_.intersection=function(array){var rest=slice.call(arguments,1);return _.filter(_.uniq(array),function(item){return _.every(rest,function(other){return _.contains(other,item);});});};_.difference=function(array){var rest=concat.apply(ArrayProto,slice.call(arguments,1));return _.filter(array,function(value){return!_.contains(rest,value);});};_.zip=function(){var length=_.max(_.pluck(arguments,'length').concat(0));var results=new Array(length);for(var i=0;i<length;i++){results[i]=_.pluck(arguments,''+i);}
return results;};_.object=function(list,values){if(list==null)return{};var result={};for(var i=0,length=list.length;i<length;i++){if(values){result[list[i]]=values[i];}else{result[list[i][0]]=list[i][1];}}
return result;};_.indexOf=function(array,item,isSorted){if(array==null)return-1;var i=0,length=array.length;if(isSorted){if(typeof isSorted=='number'){i=(isSorted<0?Math.max(0,length+isSorted):isSorted);}else{i=_.sortedIndex(array,item);return array[i]===item?i:-1;}}
if(nativeIndexOf&&array.indexOf===nativeIndexOf)return array.indexOf(item,isSorted);for(;i<length;i++)if(array[i]===item)return i;return-1;};_.lastIndexOf=function(array,item,from){if(array==null)return-1;var hasIndex=from!=null;if(nativeLastIndexOf&&array.lastIndexOf===nativeLastIndexOf){return hasIndex?array.lastIndexOf(item,from):array.lastIndexOf(item);}
var i=(hasIndex?from:array.length);while(i--)if(array[i]===item)return i;return-1;};_.range=function(start,stop,step){if(arguments.length<=1){stop=start||0;start=0;}
step=arguments[2]||1;var length=Math.max(Math.ceil((stop-start)/step),0);var idx=0;var range=new Array(length);while(idx<length){range[idx++]=start;start+=step;}
return range;};var ctor=function(){};_.bind=function(func,context){var args,bound;if(nativeBind&&func.bind===nativeBind)return nativeBind.apply(func,slice.call(arguments,1));if(!_.isFunction(func))throw new TypeError;args=slice.call(arguments,2);return bound=function(){if(!(this instanceof bound))return func.apply(context,args.concat(slice.call(arguments)));ctor.prototype=func.prototype;var self=new ctor;ctor.prototype=null;var result=func.apply(self,args.concat(slice.call(arguments)));if(Object(result)===result)return result;return self;};};_.partial=function(func){var boundArgs=slice.call(arguments,1);return function(){var position=0;var args=boundArgs.slice();for(var i=0,length=args.length;i<length;i++){if(args[i]===_)args[i]=arguments[position++];}
while(position<arguments.length)args.push(arguments[position++]);return func.apply(this,args);};};_.bindAll=function(obj){var funcs=slice.call(arguments,1);if(funcs.length===0)throw new Error('bindAll must be passed function names');each(funcs,function(f){obj[f]=_.bind(obj[f],obj);});return obj;};_.memoize=function(func,hasher){var memo={};hasher||(hasher=_.identity);return function(){var key=hasher.apply(this,arguments);return _.has(memo,key)?memo[key]:(memo[key]=func.apply(this,arguments));};};_.delay=function(func,wait){var args=slice.call(arguments,2);return setTimeout(function(){return func.apply(null,args);},wait);};_.defer=function(func){return _.delay.apply(_,[func,1].concat(slice.call(arguments,1)));};_.throttle=function(func,wait,options){var context,args,result;var timeout=null;var previous=0;options||(options={});var later=function(){previous=options.leading===false?0:_.now();timeout=null;result=func.apply(context,args);context=args=null;};return function(){var now=_.now();if(!previous&&options.leading===false)previous=now;var remaining=wait-(now-previous);context=this;args=arguments;if(remaining<=0){clearTimeout(timeout);timeout=null;previous=now;result=func.apply(context,args);context=args=null;}else if(!timeout&&options.trailing!==false){timeout=setTimeout(later,remaining);}
return result;};};_.debounce=function(func,wait,immediate){var timeout,args,context,timestamp,result;var later=function(){var last=_.now()-timestamp;if(last<wait){timeout=setTimeout(later,wait-last);}else{timeout=null;if(!immediate){result=func.apply(context,args);context=args=null;}}};return function(){context=this;args=arguments;timestamp=_.now();var callNow=immediate&&!timeout;if(!timeout){timeout=setTimeout(later,wait);}
if(callNow){result=func.apply(context,args);context=args=null;}
return result;};};_.once=function(func){var ran=false,memo;return function(){if(ran)return memo;ran=true;memo=func.apply(this,arguments);func=null;return memo;};};_.wrap=function(func,wrapper){return _.partial(wrapper,func);};_.compose=function(){var funcs=arguments;return function(){var args=arguments;for(var i=funcs.length-1;i>=0;i--){args=[funcs[i].apply(this,args)];}
return args[0];};};_.after=function(times,func){return function(){if(--times<1){return func.apply(this,arguments);}};};_.keys=function(obj){if(!_.isObject(obj))return[];if(nativeKeys)return nativeKeys(obj);var keys=[];for(var key in obj)if(_.has(obj,key))keys.push(key);return keys;};_.values=function(obj){var keys=_.keys(obj);var length=keys.length;var values=new Array(length);for(var i=0;i<length;i++){values[i]=obj[keys[i]];}
return values;};_.pairs=function(obj){var keys=_.keys(obj);var length=keys.length;var pairs=new Array(length);for(var i=0;i<length;i++){pairs[i]=[keys[i],obj[keys[i]]];}
return pairs;};_.invert=function(obj){var result={};var keys=_.keys(obj);for(var i=0,length=keys.length;i<length;i++){result[obj[keys[i]]]=keys[i];}
return result;};_.functions=_.methods=function(obj){var names=[];for(var key in obj){if(_.isFunction(obj[key]))names.push(key);}
return names.sort();};_.extend=function(obj){each(slice.call(arguments,1),function(source){if(source){for(var prop in source){obj[prop]=source[prop];}}});return obj;};_.pick=function(obj){var copy={};var keys=concat.apply(ArrayProto,slice.call(arguments,1));each(keys,function(key){if(key in obj)copy[key]=obj[key];});return copy;};_.omit=function(obj){var copy={};var keys=concat.apply(ArrayProto,slice.call(arguments,1));for(var key in obj){if(!_.contains(keys,key))copy[key]=obj[key];}
return copy;};_.defaults=function(obj){each(slice.call(arguments,1),function(source){if(source){for(var prop in source){if(obj[prop]===void 0)obj[prop]=source[prop];}}});return obj;};_.clone=function(obj){if(!_.isObject(obj))return obj;return _.isArray(obj)?obj.slice():_.extend({},obj);};_.tap=function(obj,interceptor){interceptor(obj);return obj;};var eq=function(a,b,aStack,bStack){if(a===b)return a!==0||1/a==1/b;if(a==null||b==null)return a===b;if(a instanceof _)a=a._wrapped;if(b instanceof _)b=b._wrapped;var className=toString.call(a);if(className!=toString.call(b))return false;switch(className){case'[object String]':return a==String(b);case'[object Number]':return a!=+a?b!=+b:(a==0?1/a==1/b:a==+b);case'[object Date]':case'[object Boolean]':return+a==+b;case'[object RegExp]':return a.source==b.source&&a.global==b.global&&a.multiline==b.multiline&&a.ignoreCase==b.ignoreCase;}
if(typeof a!='object'||typeof b!='object')return false;var length=aStack.length;while(length--){if(aStack[length]==a)return bStack[length]==b;}
var aCtor=a.constructor,bCtor=b.constructor;if(aCtor!==bCtor&&!(_.isFunction(aCtor)&&(aCtor instanceof aCtor)&&_.isFunction(bCtor)&&(bCtor instanceof bCtor))&&('constructor'in a&&'constructor'in b)){return false;}
aStack.push(a);bStack.push(b);var size=0,result=true;if(className=='[object Array]'){size=a.length;result=size==b.length;if(result){while(size--){if(!(result=eq(a[size],b[size],aStack,bStack)))break;}}}else{for(var key in a){if(_.has(a,key)){size++;if(!(result=_.has(b,key)&&eq(a[key],b[key],aStack,bStack)))break;}}
if(result){for(key in b){if(_.has(b,key)&&!(size--))break;}
result=!size;}}
aStack.pop();bStack.pop();return result;};_.isEqual=function(a,b){return eq(a,b,[],[]);};_.isEmpty=function(obj){if(obj==null)return true;if(_.isArray(obj)||_.isString(obj))return obj.length===0;for(var key in obj)if(_.has(obj,key))return false;return true;};_.isElement=function(obj){return!!(obj&&obj.nodeType===1);};_.isArray=nativeIsArray||function(obj){return toString.call(obj)=='[object Array]';};_.isObject=function(obj){return obj===Object(obj);};each(['Arguments','Function','String','Number','Date','RegExp'],function(name){_['is'+name]=function(obj){return toString.call(obj)=='[object '+name+']';};});if(!_.isArguments(arguments)){_.isArguments=function(obj){return!!(obj&&_.has(obj,'callee'));};}
if(typeof(/./)!=='function'){_.isFunction=function(obj){return typeof obj==='function';};}
_.isFinite=function(obj){return isFinite(obj)&&!isNaN(parseFloat(obj));};_.isNaN=function(obj){return _.isNumber(obj)&&obj!=+obj;};_.isBoolean=function(obj){return obj===true||obj===false||toString.call(obj)=='[object Boolean]';};_.isNull=function(obj){return obj===null;};_.isUndefined=function(obj){return obj===void 0;};_.has=function(obj,key){return hasOwnProperty.call(obj,key);};_.noConflict=function(){root._=previousUnderscore;return this;};_.identity=function(value){return value;};_.constant=function(value){return function(){return value;};};_.property=function(key){return function(obj){return obj[key];};};_.matches=function(attrs){return function(obj){if(obj===attrs)return true;for(var key in attrs){if(attrs[key]!==obj[key])
return false;}
return true;}};_.times=function(n,iterator,context){var accum=Array(Math.max(0,n));for(var i=0;i<n;i++)accum[i]=iterator.call(context,i);return accum;};_.random=function(min,max){if(max==null){max=min;min=0;}
return min+Math.floor(Math.random()*(max-min+1));};_.now=Date.now||function(){return new Date().getTime();};var entityMap={escape:{'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#x27;'}};entityMap.unescape=_.invert(entityMap.escape);var entityRegexes={escape:new RegExp('['+_.keys(entityMap.escape).join('')+']','g'),unescape:new RegExp('('+_.keys(entityMap.unescape).join('|')+')','g')};_.each(['escape','unescape'],function(method){_[method]=function(string){if(string==null)return'';return(''+string).replace(entityRegexes[method],function(match){return entityMap[method][match];});};});_.result=function(object,property){if(object==null)return void 0;var value=object[property];return _.isFunction(value)?value.call(object):value;};_.mixin=function(obj){each(_.functions(obj),function(name){var func=_[name]=obj[name];_.prototype[name]=function(){var args=[this._wrapped];push.apply(args,arguments);return result.call(this,func.apply(_,args));};});};var idCounter=0;_.uniqueId=function(prefix){var id=++idCounter+'';return prefix?prefix+id:id;};_.templateSettings={evaluate:/<%([\s\S]+?)%>/g,interpolate:/<%=([\s\S]+?)%>/g,escape:/<%-([\s\S]+?)%>/g};var noMatch=/(.)^/;var escapes={"'":"'",'\\':'\\','\r':'r','\n':'n','\t':'t','\u2028':'u2028','\u2029':'u2029'};var escaper=/\\|'|\r|\n|\t|\u2028|\u2029/g;_.template=function(text,data,settings){var render;settings=_.defaults({},settings,_.templateSettings);var matcher=new RegExp([(settings.escape||noMatch).source,(settings.interpolate||noMatch).source,(settings.evaluate||noMatch).source].join('|')+'|$','g');var index=0;var source="__p+='";text.replace(matcher,function(match,escape,interpolate,evaluate,offset){source+=text.slice(index,offset).replace(escaper,function(match){return'\\'+escapes[match];});if(escape){source+="'+\n((__t=("+escape+"))==null?'':_.escape(__t))+\n'";}
if(interpolate){source+="'+\n((__t=("+interpolate+"))==null?'':__t)+\n'";}
if(evaluate){source+="';\n"+evaluate+"\n__p+='";}
index=offset+match.length;return match;});source+="';\n";if(!settings.variable)source='with(obj||{}){\n'+source+'}\n';source="var __t,__p='',__j=Array.prototype.join,"+"print=function(){__p+=__j.call(arguments,'');};\n"+
source+"return __p;\n";try{render=new Function(settings.variable||'obj','_',source);}catch(e){e.source=source;throw e;}
if(data)return render(data,_);var template=function(data){return render.call(this,data,_);};template.source='function('+(settings.variable||'obj')+'){\n'+source+'}';return template;};_.chain=function(obj){return _(obj).chain();};var result=function(obj){return this._chain?_(obj).chain():obj;};_.mixin(_);each(['pop','push','reverse','shift','sort','splice','unshift'],function(name){var method=ArrayProto[name];_.prototype[name]=function(){var obj=this._wrapped;method.apply(obj,arguments);if((name=='shift'||name=='splice')&&obj.length===0)delete obj[0];return result.call(this,obj);};});each(['concat','join','slice'],function(name){var method=ArrayProto[name];_.prototype[name]=function(){return result.call(this,method.apply(this._wrapped,arguments));};});_.extend(_.prototype,{chain:function(){this._chain=true;return this;},value:function(){return this._wrapped;}});if(typeof define==='function'&&define.amd){define('underscore',[],function(){return _;});}}).call(this);;var getLoginInfor=getLoginInfor||[];var getLoginInfor={init:function(){},cookieName:"",_isGuest:"",_nickName:"",tuniuImg:"",tuniuVip:"",tuniuLevel:"",parter:"",base64decode:function(str){var base64DecodeChars=new Array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,62,-1,-1,-1,63,52,53,54,55,56,57,58,59,60,61,-1,-1,-1,-1,-1,-1,-1,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,-1,-1,-1,-1,-1,-1,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,-1,-1,-1,-1,-1);var c1,c2,c3,c4;var i,len,out;len=str.length;i=0;out="";while(i<len){do{c1=base64DecodeChars[str.charCodeAt(i++)&0xff];}while(i<len&&c1==-1);if(c1==-1)
break;do{c2=base64DecodeChars[str.charCodeAt(i++)&0xff];}while(i<len&&c2==-1);if(c2==-1)
break;out+=String.fromCharCode((c1<<2)|((c2&0x30)>>4));do{c3=str.charCodeAt(i++)&0xff;if(c3==61)
return out;c3=base64DecodeChars[c3];}while(i<len&&c3==-1);if(c3==-1)
break;out+=String.fromCharCode(((c2&0XF)<<4)|((c3&0x3C)>>2));do{c4=str.charCodeAt(i++)&0xff;if(c4==61)
return out;c4=base64DecodeChars[c4];}while(i<len&&c4==-1);if(c4==-1)
break;out+=String.fromCharCode(((c3&0x03)<<6)|c4);}
return out;},utf8to16:function(str){var out,i,len,c;var char2,char3;out="";len=str.length;i=0;while(i<len){c=str.charCodeAt(i++);switch(c>>4)
{case 0:case 1:case 2:case 3:case 4:case 5:case 6:case 7:out+=str.charAt(i-1);break;case 12:case 13:char2=str.charCodeAt(i++);out+=String.fromCharCode(((c&0x1F)<<6)|(char2&0x3F));break;case 14:char2=str.charCodeAt(i++);char3=str.charCodeAt(i++);out+=String.fromCharCode(((c&0x0F)<<12)|((char2&0x3F)<<6)|((char3&0x3F)<<0));break;}}
return out;},getCookieForLogin:function(){var aCookie=document.cookie.split("; ");var _cookieName=[];if(aCookie.length){for(var i=0;i<aCookie.length;i++){var aCrumb=aCookie[i].split("=");if(aCrumb.length){var cookieValue=aCrumb[1];if(cookieValue){_cookieName[aCrumb[0]]=cookieValue.replace(/<\/?[^>]*>/g,'');}else{_cookieName[aCrumb[0]]="";}}}}
return _cookieName;},getLoginState:function(){this.cookieName=this.getCookieForLogin();var userInfo=this.cookieName['tuniuuser'];this._nickname=this.cookieName['tuniuuser_name'];this.parter=this.cookieName['p_phone_400'];if(this._nickname){this._isGuest=true;this._nickname=unescape(this.cookieName['tuniuuser_name']);this._nickname=this.utf8to16(this.base64decode(this._nickname)).replace(/<\/?[^>]*>/g,'');}else{this._isGuest=false;}}};function getUnderscoreCompiledTemplate(tmpl,data){if($.isFunction(tmpl)){tmpl=tmpl(data);}
return tmpl||'';}
var rightCommon=rightCommon||[];var rightCommonUl="";var rightCommonrcTop="";var rightCommonrcMid="";var rightCommonrcBtm="";var rightCommonrcLastBtm="";var rihtCommonPhone="";var data={};var currentPageData;var KEFU_TEMPLATE_ID=10001;rightCommon={init:function(data,isPreventToolBar){currentPageData=data||{};if(isPreventToolBar){this.getKefu();return;}
this.initToolBar();var topImfor=this.getAdImg()
+this.getApp();var midImfor=this.getMyTuniu()
+this.getCollect()
+this.myScore()
+this.getOrder()
+this.myArch()
+this.getListInfor();var str=window.location.host;var domain=str.split(".")[0];var iframeSrc='https://passport.tuniu.com/login/iframe?origin='+encodeURIComponent('http://www.tuniu.com/ssoConnect/Iframe?reload='+domain);var passport="<div class='nologin_passport rc_common_box nologin' style='width:378px;padding:0px; border:none; outline:none;'>"
+"<iframe src='"+iframeSrc+"'  width='100%' height='352px' frameborder='0'>"
+"</iframe>"
+"</div>"
$('body').delegate('#rightCommon .mytuniuArea','hover',function(event){var $dom=$(this);if($dom.find('.nologin_passport').length>0||$dom.find('.nologin').length<1)return;if(event.type=='mouseover'||event.type=='mouseenter'){$dom.find('.rc_common_box').remove();$dom.find('.rc_box').append(passport);}else{}});$('body').delegate('.hoverClick','click',function(event){var $dom=$(this);if($dom.find('.nologin_passport').length>0||$dom.find('.nologin').length<1)return;$dom.find('.rc_common_box').remove();$dom.find('.rc_click_event.rc_box').append(passport);});var phoneKefu=this.getKefu();var otherInfor=this.myCompare();var btnImfor=this.getQA()+this.addAdvise()+this.backToTop();rightCommonrcTop.innerHTML=topImfor;rightCommonrcMid.innerHTML=midImfor;rihtCommonPhone.innerHTML=phoneKefu;rightCommonrcBtm.innerHTML=btnImfor;rightCommonrcLastBtm.innerHTML=otherInfor;},initToolBar:function(){var trnode=document.getElementById("rightCommon");if(trnode){trnode.parentNode.removeChild(trnode);}
var toolBar="<ul id='rightCommonUl' class='hide'>"
+"<li id=''><ul id='rcTop'></ul></li>"
+"<li ><ul id='rcMid'></ul></li>"
+"<li><ul id='rc_phone'></ul></li>"
+"<li style='position:absolute;top:540px;' id='RCU_doArea'><ul id='rcLastBtm'></ul></li>"
+"<li style='position:absolute;bottom:20px;'><ul id='rcBtm'></ul></li>"
+"</ul>";var toolBarBox=document.createElement("div");toolBarBox.className="right_common";toolBarBox.id="rightCommon";toolBarBox.innerHTML=toolBar;if(!document.getElementById("rightCommonCss")){var toolBarCss=document.createElement("link");toolBarCss.href="//ssl1.tuniucdn.com/s/2016091222/rightcommon/right_common.css";toolBarCss.type="text/css";toolBarCss.rel="stylesheet";toolBarCss.id="rightCommonCss";document.getElementsByTagName("head")[0].appendChild(toolBarCss);}
document.getElementsByTagName("body")[0].appendChild(toolBarBox);rightCommonUl=document.getElementById("rightCommonUl");rightCommonrcTop=document.getElementById("rcTop");rihtCommonPhone=document.getElementById("rc_phone");rightCommonrcMid=document.getElementById("rcMid");rightCommonrcBtm=document.getElementById("rcBtm");rightCommonrcLastBtm=document.getElementById("rcLastBtm");},noProduct:function(){var pageType=document.getElementById("page_type")&&document.getElementById("page_type").value;if(pageType==250000||pageType==10000||pageType==230000||pageType==70000||pageType==40000||pageType==210002||pageType==130000||pageType==1860){return 1;}else{return 0;}},noKefuPage:function(){var pageType=document.getElementById("page_type")&&document.getElementById("page_type").value;if(pageType==250000||pageType==210002||pageType==130000){return 1;}else{return 0;}},getCookie:function(name){var arr=document.cookie.split('; '),i=0,len=arr.length;for(;i<len;i++){var arr2=arr[i].split('=');if(arr2[0]==name){return decodeURIComponent(arr2[1]);}}
return'';},getAdImg:function(){if(data.adArea){var adImg="<% if(data.adArea){ %><li class='' style='height:148px;cursor:pointer;'>"
+"<% if(data.adArea.adUrl_small){ %><div class='rc_index'>"
+"<a href='<%=data.adArea.adUrl %>' target='_blank'>"
+"<img src='<%=data.adArea.adUrl_small %>' alt='' />"
+"</a>"
+"</div>"
+"<div class='rc_box nopad'>"
+"<span class='rc_arrow'>"
+"<i class='triangle_border'>"
+"<em></em>"
+"</i>"
+"</span>"
+"<div class='rc_content'>"
+"<a href='<%=data.adArea.adUrl %>' target='_blank'>"
+"<img src='<%=data.adArea.adUrl_big %>' alt='' />"
+"</a>"
+"</div>"
+"</div><%}%>"
+"</li><%}%>";var listImg=_.template(adImg,data.adArea);return getUnderscoreCompiledTemplate(listImg,data.adArea);}else{return"";}},getApp:function(){if(this.noProduct()){var app="<% if(data.appArea){ %><li style='height:42px;margin-top:20px;'>"
+"<% if(data.appArea.appImgUrl){ %><div class='rc_index' style='cursor:pointer;'>"
+"<p class='rc_app_box'>"
+"<span class='rc_icon rc_app'></span>"
+"</p>"
+"</div>"
+"<div class='rc_box rc_app_b nopad'>"
+"<span class='rc_arrow'>"
+"<i class='triangle_border'>"
+"<em></em>"
+"</i>"
+"</span>"
+"<div class='rc_content'>";if(data.appArea.appUrl){app+="<a href='<%=data.appArea.appUrl %>' target='_blank'>"+"<img src='<%=data.appArea.appImgUrl %>' alt='' />"+"</a>"}else{app+="<img src='<%=data.appArea.appImgUrl %>' alt='' />";}
app+="</div>"+"</div><%}%>"+"</li><%}%>";var listApp=_.template(app,data.appArea);return getUnderscoreCompiledTemplate(listApp,data.appArea);}else{return"";}},reNoLogin_passport:function(){var str=window.location.host;var domain=str.split(".")[0];var iframeSrc='https://passport.tuniu.com/login/iframe?origin='+encodeURIComponent('http://www.tuniu.com/ssoConnect/Iframe?reload='+domain);var reNLogin2="<% if(data.islogin != 1) {%><div class='rc_common_box nologin' style='width:378px;padding:0px; border:none; outline:none;'>"
+"<iframe src='"+iframeSrc+"'  width='100%' height='352px' frameborder='0'>"
+"</iframe>"
+"</div><% } %>"
var listNoLogin=_.template(reNLogin2,data.myTuniu);return getUnderscoreCompiledTemplate(listNoLogin,data.myTuniu);},reNoLogin:function(){var str=window.location.host;var domain=str.split(".")[0];var iframeSrc='https://passport.tuniu.com/login/iframe?origin='+encodeURIComponent('http://www.tuniu.com/ssoConnect/Iframe?reload='+domain);var reNLogin2="<% if(data.islogin != 1) {%><div class='rc_common_box nologin' style='width:378px;padding:0px; border:none; outline:none;'>"
+"<iframe src='"+iframeSrc+"'  width='100%' height='352px' frameborder='0'>"
+"</iframe>"
+"</div><% } %>"
var reNLogin="<% if(data.islogin != 1) {%><div class='rc_common_box nologin'>"
+"<div style='background-color:#fff;opacity:0.5;filter:alpha(opacity=50);width:236px;height:372px;position: absolute;top: 0;left: 0;display:none;' class='rcLoadingImg'></div>"
+"<img src='//ssl3.tuniucdn.com/img/20140922/common/loading-72x72.gif' class='rcLoadingImg' style='position:absolute;top:150px;left:82px;display:none;'>"
+"<p class='show_error' id=''></p>"
+"<dl class='rc_double_col rc_w_s clearfix'>"
+"<dt>账号：</dt>"
+"<dd></dd>"
+"</dl>"
+"<p class='account hide' class='subCookieName'>"
+"<input type='text' class='rc_common_input' />"
+"<span class='lenovo'>"
+"<span class='nickName'></span><br>来自.tuniu.com的密码"
+"</span>"
+"</p>"
+"<p><input type='text'tabindex=1 class='rc_common_input rcUserName' /></p>"
+"<dl class='rc_double_col rc_w_s clearfix'>"
+"<dt>密码：</dt>"
+"<dd><a href='http://www.tuniu.com/u/get_password' target='_blank' class='rc_g_color'>找回密码</a></dd>"
+"</dl>"
+"<p><input type='password' tabindex=2 class='rc_common_input rcPassWord' /></p>"
+"<dl class='rc_double_col rc_w_s clearfix'>"
+"<dt>验证码：</dt>"
+"<dd></dd>"
+"</dl>"
+"<dl class='rc_double_col clearfix'>"
+"<dt><input type='text' tabindex=3 class='rc_common_input rc_small rcVerCode' /></dt>"
+"<dd class='rc_pad_top'>"
+"<img height='24' width='80' class='identify_img' alt='如验证码无法辨别，点击即可刷新。' align='absmiddle' onclick='' onload='' style='display: inline;' src=''>"
+"<img src='http://img4.tuniucdn.com/img/20140911/rightcommon/refresh.jpg' alt='' class='change_img' align='absmiddle' height='24' width='24' style='display: inline;' />"
+"</dd>"
+"</dl>"
+"<input class='rc_ableBtn' value='登录' type='button' / >"
+"<dl class='rc_double_col rc_reg clearfix'>"
+"<dt>首次登录，请先<a href='http://www.tuniu.com/u/register' target='_blank' class='rc_g_color'> 注册</a></dt>"
+"<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其他<a href='http://www.tuniu.com/u/login' target='_blank' class='rc_g_color'> 登录>></a></dd>"
+"</dl>"
+"</div><% } %>"
var listNoLogin=_.template(reNLogin,data.myTuniu);return getUnderscoreCompiledTemplate(listNoLogin,data.myTuniu);},getPreL:function(){var preL="<li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan <%=name.userPrivilege_1 %>'></span></a></li>";var preLTmp="<%_.each(data.myTuniu.userPrivilege,function(name){%>"
+preL
+"<% }) %>";return preLTmp;},getMyTuniu:function(){var myTuniu="<li class='mytuniuArea' style='padding:10px 0;cursorpointer;'>"
+"<div class='rc_index'>"
+"<p class=''>"
+"<% if(data.islogin == 0){ %><a href='https://i.tuniu.com/' target='_blank'><span class='rc_icon rc_tuniu'></span></a><%}%>"
+"<% if(data.islogin == 1){ if(data.myTuniu.userHeadImgUrl){%><a href='https://i.tuniu.com/' target='_blank'><img src='<%=data.myTuniu.userHeadImgUrl %>' style='width:32px;height:32px;margin:4px;background:none;border-radius:50%;' /></a><%}}%>"
+"<% if(data.islogin == 1){ if(!data.myTuniu.userHeadImgUrl){%><a href='https://i.tuniu.com/' target='_blank'><img src='http://img3.tuniucdn.com/img/2014040901/user_center/g_touxiang.png' style='width:32px;height:32px;margin:4px;background:none;border-radius:50%;' /></a><%}}%>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<% if(data.islogin == 1){ %><div class='rc_common_box'>"
+"<div class='clearfix'>"
+"<div class='rc_left'>"
+"<div class='rc_user_img'>"
+"<a href='https://i.tuniu.com/' target='_blank'>"
+"<%if(data.myTuniu.userHeadImgUrl){ %><img src='<%=data.myTuniu.userHeadImgUrl %>' /></a><% } %>"
+"<%if(!data.myTuniu.userHeadImgUrl){ %><img src='http://img3.tuniucdn.com/img/2014040901/user_center/g_touxiang.png' /></a><% } %>"
+"</div> "
+"</div>"
+"<div class='rc_right'>"
+"<p class='rc_user_wel'>欢迎您！</p>"
+"<p class='rc_user_name'><a href='http://www.tuniu.com/u' target='_blank'><%=data.myTuniu.userName %></a></p>"
+"</div>"
+"</div>"
+"<div class='rc_user_info'>"
+"<dl class='rc_double_col clearfix'>"
+"<dt>会员等级：<span style='display:none;' class='right_icons level level<%=data.myTuniu.userLevel %>'></span></dt>"
+"<dd><a href='http://www.tuniu.com/u/club' target='_blank'>"
+"<% if(data.myTuniu.userLevel == 0){%>普通会员<% }%><% if(data.myTuniu.userLevel == 1){%>一星会员<% }%><% if(data.myTuniu.userLevel == 2){%>二星会员<% }%><% if(data.myTuniu.userLevel == 3){%>三星会员<% }%><% if(data.myTuniu.userLevel == 4){%>四星会员<% }%><% if(data.myTuniu.userLevel == 5){%>五星会员<% }%><% if(data.myTuniu.userLevel == 6){%>白金会员<% }%><% if(data.myTuniu.userLevel == 7){%>钻石会员<% }%></a></dd>"
+"</dl>"
+"<dl style='display:none;' class='rc_double_col clearfix'>"
+"<dt>会员特权：</dt>"
+"<dd>"
+"<div id='share_item_0' class='share_item'>"
+"<div class='share_btn right_icons share_btn_prev'><</div>"
+"<div class='share_btn right_icons share_btn_next'>></div>"
+"<div class='share_scroll'>"
+"<ul class='share_item_ul clearfix'>"
+"<% if(data.myTuniu.tequan1){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan1'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan2){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan2'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan3){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan3'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan4){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan4'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan5){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan5'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan6){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan6'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan7){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan7'></span></a></li><%}%>"
+"<% if(data.myTuniu.tequan8){ %><li><a href='http://www.tuniu.com/u/club' target='_blank'><span class='right_icons tequan tequan8'></span></a></li><%}%>"
+"</ul>"
+"</div>"
+"</div>"
+"</dd>"
+"</dl>"
+"</div>"
+"</div><% } %>"
+this.reNoLogin()
+"</div>"
+"</li>";var listMyTuniu=_.template(myTuniu,data.myTuniu);return getUnderscoreCompiledTemplate(listMyTuniu,data.myTuniu);},getLineList:function(t){var lineList="<li>"
+"<dl class='rc_double_col rc_collect_li clearfix'>"
+"<dt>"
+"<a href='<%=name.prdUrl %>' target='_blank'>"
+"<img src='<%=name.prdImg %>' alt='' />"
+"</a>"
+"</dt>"
+"<dd>"
+"<a href='<%=name.prdUrl %>' target='_blank'>"
+" <%=name.prdName %>"
+" </a>"
+"<span class='rc_y_color'>&yen; <%=name.prdPrice %> 起</span>"
+"</dd>"
+"</dl>"
+"</li>";if(t==1){var lineTmp="<%_.each(data.myCollect.prd,function(name){%>"
+lineList
+"<% }) %>";}else{var lineTmp="<%_.each(data.myCollect.prd,function(name){%>"
+lineList
+"<% }) %>";}
return lineTmp;},getCollect:function(){if(this.noProduct()){var noline=this.getLineList(1)?this.getLineList(1):this.getLineList(0);var myCollect="<li class='hoverClick'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<span class='rc_icon rc_collect'></span>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>我的关注</p>"
+"</div>"
+"</div>"
+"<div class='rc_box rc_click_event nopad'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<% if(data.islogin == 1){ %><div class='rc_common_box'>"
+"<dl class='rc_double_col rc_mycol clearfix'>"
+"<dt><div class='rc_btn_bord'>我的关注</div></dt>"
+"<dd><a href='http://www.tuniu.com/u/collect_list' class='rc_g_color' target='_blank'>更多关注 &gt;</a></dd>"
+"</dl>"
+"<% if(!data.myCollect.prd[0].prdUrl){ %><p class='rc_nocollect right_icons'>"
+"<span>暂无关注哦～</span><br />喜欢就点右侧工具栏的<br />按钮进行关注吧～"
+"</p><%}%>"
+"<% if(data.myCollect.prd[0].prdUrl){ %><ul class='rc_collect_box'>"
+noline
+"</ul><% } %>"
+"</div><% } %>"
+this.reNoLogin()
+"</div>"
+" </li>";return getUnderscoreCompiledTemplate(_.template(myCollect,data.myCollect),data.myCollect);}else{return"";}},getScoreList:function(){var scoreList="<div class='right_tagContent' id='rtagContent0'>"
+"<div class='pic'><a href='<%=name.url %>' target='_blank'><img src='<%=name.img_url %>' /></a></div>"
+"<div class='name'><a href='<%=name.url %>' target='_blank'><%=name.name %></a></div>"
+"<div class='price clearfix'>"
+"<% if(name.prdPrice){ %><span>&yen;<em><%=name.prdPrice %></em>起</span><%}%><% if(name.prdSheng){ %><span class='right_icons icon'><%=name.prdSheng %></span><%}%>"
+"</div>"
+"</div>";return"<%_.each(data.myScore.ads,function(name){%>"
+scoreList
+"<% }) %>";},myScore:function(){if(this.noProduct()){var myScoreList="<li class='hoverClick' style='display:none;'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'><span class='rc_icon rc_jifen'></span></p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'><p class='rc_des'>我的积分</p></div>"
+" </div>"
+"<div class='rc_box rc_click_event nopad'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<% if(data.islogin == 1){ %><div class='rc_common_box'>"
+"<p class='rc_check_info'>可用积分：<span class='rc_y_color'><%=data.myScore.leftScore %></span> &nbsp;&nbsp;&nbsp;&nbsp;即将过期：<span class='rc_y_color'><%=data.myScore.expiredPoint %></span></p>"
+"<dl class='rc_double_col rc_mycol clearfix'>"
+"<dt><div class='rc_btn_bord'>积分享优惠</div></dt>"
+"<dd>"
+"<a href='http://www.tuniu.com/u/club' class='rc_g_color' target='_blank'>会员俱乐部 &gt;</a>"
+"</dd>"
+"</dl>"
+"<% if(data.myScore.ads[0].url){ %><div class='rc_jifen_box'>"
+"<div id='right_con'>"
+"<div id='right_tagContent'>"
+this.getScoreList()
+"</div>"
+"</div>"
+"</div><%}%>"
+"</div><%}%>"
+this.reNoLogin()
+"</div>"
+"</li>";return getUnderscoreCompiledTemplate(_.template(myScoreList,data.myScore),data.myScore);}else{return"";}},myOrderList:function(){var order_list="<%_.each(data.myOrder.list,function(name){ %><li>"
+"<dl class='rc_double_col rc_route_w clearfix'>"
+" <dt><a href='<%=name.product_url %>' target='_blank'><%=name.route_name%></a><span class='rc_y_color'><%=name.group_cost %>起</span></dt>"
+"<dd>"
+"<a class='<% if(name.url){ %>rc_g_color<%}%>' <% if(name.url){ %> href='<%=name.url%>' <%}%><% if(!name.url){ %>href='javascript:void(0)' <%}%> ><%=name.pay_status_name %></a>"
+"</dd>"
+"</dl>"
+"</li><%})%>";return order_list;},getOrder:function(){if(this.noProduct()){return'<li>'+'<div class="rc_index">'+'<p class="rc_topBot_b">'+'<a href="http://www.tuniu.com/u/order" target="_blank">'+'<span class="rc_icon rc_order"></span>'+'</a>'+'</p>'+'</div>'+'<div class="rc_box nopad nobord rc_hover_event">'+'<div class="rc_content">'+'<p class="rc_des">'+'<a href="http://www.tuniu.com/u/order" target="_blank" style="display:block;width:60px;height:41px;color:#f80;">我的订单</a>'+'</p>'+'</div>'+'</div>'+'</li>';}else{return"";}},myListInfor:function(){var listNum="<% if(data.islogin == 1 && data.myMessage.sum>0){ _.each(prd,function(name){ %><li>"
+"<% if(data.islogin == 1 && data.myMessage.sum>0){ %><dl class='rc_double_col rc_route_w clearfix'>"
+"<dt><a href='<%=name.orderUrl %>' target='_blank'><%=name.orderName %></a></dt>"
+"<dd>"
+"<span class='rc_red_tips'><%=name.unreadMsgCount %>条</span>"
+"</dd>"
+"</dl><%}%>"
+"</li><%}) } else {%>暂无新消息<%}%>"
return listNum;},myMsgTemplate:function(){return listNum="<%_.each(myMessage.prd,function(name){ %><li>"+"<dl class='rc_double_col rc_route_w clearfix'>"+"<dt><a href='<%=name.orderUrl %>' target='_blank'><%=name.orderName %></a></dt>"+"<dd>"+"<span class='rc_red_tips'><%=name.unreadMsgCount %>条</span>"+"</dd>"+"</dl>"+"</li><%})%>";},getListInfor:function(){var numOfList="<li class='hoverClick'>"
+"<% if(data.islogin == 1 && data.myMessage.sum>0){ %><span class='rc_kefutip_num' id='J_RightCommonMsgNum'><%= data.myMessage.sum %></span><%}%>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'><span class='rc_icon rc_kefutips'></span></p></div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>消息提醒</p>"
+"</div>"
+"</div>"
+"<div class='rc_box rc_click_event nopad'>"
+"<span class='rc_arrow'>"
+"<i class='triangle_border'>"
+"<em></em></i></span>"
+"<% if(data.islogin == 1){ %><div class='rc_common_box'>"
+"<dl class='rc_double_col rc_mycol clearfix'>"
+"<dt><div class='rc_btn_bord'>我的消息提醒</div></dt>"
+"<dd></dd></dl>"
+"<div class='rc_order_box'>"
+"<ul class='rc_order_lists' id='J_RightCommonMsgList'>"
+this.myListInfor()
+"</ul>"
+"</div></div></div></li><%}%>"
+"<% if(data.islogin != 1){ %>"
+this.reNoLogin()
+"<%}%>";return getUnderscoreCompiledTemplate(_.template(numOfList,data.myMessage),data.myMessage);},getCompList:function(){var compList="<li>"
+"<dl class='rc_double_col rc_compare_li clearfix'>"
+"<dt><a href='' target='_blank'></a></dt>"
+"<dd ><a href='' class='rc_y_color'>×</a></dd>"
+"</dl>"
+"</li> ";var compLineTmp="<%_.each(data.myGift.gifts,function(name){%>"
+compList
+"<% }) %>";return compLineTmp;},myCompare:function(){var pageType=document.getElementById("page_type")&&document.getElementById("page_type").value;if(pageType==1860||!this.noProduct()){var myCompList="<li class='hoverClick' style='cursor:pointer;' id='compareBox'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<span class='rc_icon rc_compare' id='addToCompareList'></span>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>我的对比</p>"
+"</div>"
+"</div>"
+"<div class='rc_box rc_click_event nopad'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<div class='rc_common_box'>"
+"<dl class='rc_double_col rc_mycol clearfix'>"
+"<dt><div class='rc_btn_bord'>对比</div></dt>"
+"<dd><a href='javascript:void(0)' class='rc_g_color' id='clearComPareList'>清空</a></dd>"
+"</dl>"
+"<img src='http://img4.tuniucdn.com/img/20140914/rightcommon/no_complist.gif' alt='' id='comPareImg' />"
+"<ul class='rc_compare_box' id='comPareList'>"
+"</ul>"
+"</div> "
+"</div>"
+"</li>";return myCompList;}else{return"";}},getArchList:function(){var archList="<li>"
+"<dl class='rc_double_col rc_collect_li clearfix'>"
+"<dt>"
+"<% if(name.giftUrl){ %><a href='<%=name.giftUrl %>' target='_blank'>"
+"<img src='<%=name.giftImg %>' alt='' />"
+"</a><%}%>"
+"</dt>"
+"<dd>"
+"<a href='<%=name.giftUrl %>' target='_blank'>"
+" <%=name.giftName %>"
+" </a>"
+"</dd>"
+"</dl>"
+"</li>";var archLineTmp="<%_.each(data.myGift.gifts,function(name){%>"
+archList
+"<% }) %>";return archLineTmp;},myArch:function(){if(this.noProduct()){var myArchList="<li class='hoverClick'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'><span class='rc_icon rc_quan'></span></p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'><p class='rc_des'>我的礼券</p></div>"
+"</div>"
+"<div class='rc_box rc_click_event nopad'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<%if(data.islogin == 1) {%><div class='rc_common_box'>"
+"<dl class='rc_double_col rc_mycol clearfix'>"
+"<dt><div class='rc_btn_bord'>礼券信息</div></dt>"
+"<dd><a href='http://www.tuniu.com/u' class='rc_g_color' target='_blank'>更多礼券 &gt;</a></dd>"
+"</dl>"
+"<ul class='clearfix rc_two_col'>"
+"<li>旅游券：<span class='rc_y_color'>&yen;<%=data.myGift.lvyouquan%></span></li>"
+"<li>抵用券：<span class='rc_y_color'>&yen;<%=data.myGift.diyongquan%></span></li>"
+"<li>现金账户：<span class='rc_y_color'>&yen;<%=data.myGift.cash%></span></li>"
+"</ul>"
+"</div><%}%>"
+this.reNoLogin()
+"</div>"
+"</li>";return getUnderscoreCompiledTemplate(_.template(myArchList,data.myGift),data.myGift);}else{return"";}},getParter:function(){var c_name="tuniu_partner";if(document.cookie.length>0){var c_start=document.cookie.indexOf(c_name+"=");if(c_start!=-1){c_start=c_start+c_name.length+1;var c_end=document.cookie.indexOf(";",c_start);if(c_end==-1){c_end=document.cookie.length;}
return unescape(document.cookie.substring(c_start,c_end));}}
return"";},getPhone:function(){return;var page_type=document.getElementById("page_type").value;if(!this.noProduct()){var tuniuNum=$(".tuniu_400_num").html();var isShowPhone=$("#phow_show");var isShowPhoneVal=isShowPhone.val();if(page_type>5000000&&page_type<8000000){isShowPhoneVal=1;}
if(isShowPhoneVal==1){if(tuniuNum=="")tuniuNum="4007-999-999";var phone="<li class='hoverClick' style='cursor:pointer;'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<span class='rc_icon rc_phone'></span>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>电话预订</p>"
+"</div>"
+"</div>"
+"<div class='rc_box rc_click_event pd_5'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<div class=''>"
+"<img src='http://img4.tuniucdn.com/img/20140809/rightcommon/24hours.jpg' alt='' />"
+"<p class='rc_order_phone'>"+tuniuNum+"</p>"
+"</div>"
+"</div>"
+"</li>"
return phone;}else{return"";}}else{return"";}},getKefu:function(){var kefu='';var self=this;var is_kefu=document.getElementById("kefu_show");var listNoLogin='<p class="rc_des">在线客服</p>';var localTime=new Date().getHours().toLocaleString();var numTime=parseInt(localTime,10);var kefuType='live800';if((numTime>=8&&numTime<23)){if(!this.noKefuPage()){kefu="<li class='' id='onlineKefu' onclick=\"_gaq.push(['_trackEvent','在线客服按钮_1','','']);\">"
+"<div class='rc_index' style='cursor:pointer;'>"
+"<p class='rc_topBot_b' style='border-bottom:none;'>"
+"<a href='javascript:void(0)' id='"+kefuType+"'><span class='rc_icon rc_online'></span></a>"
+"</p>"
+"</div>"+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"+listNoLogin
+"</div>"+"</div>"
+"</li>";}else{kefu="";}}else{kefu="";}
var href=location.href;var re=/cruise/;if(!is_kefu&&!re.test(href)){kefu="";}
if(/visa/.test(href)){kefu="";}
var onlineKefuLabel='在线客服';var kefuWinConfig='width=640, height=515, top=100, left=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no';if(window.TNCHAT_isShowChatEntry){if(currentPageData.tempId!=undefined){KEFU_TEMPLATE_ID=currentPageData.tempId;}
window.TNCHAT_isShowChatEntry({entryTemplateId:KEFU_TEMPLATE_ID,productId:currentPageData.productId,productType:currentPageData.productType,userId:self.getCookie('tuniuuser_id')||-1,ct:100},function(res){if(!res.status)return;if(window.currentPageData.success&&$.isFunction(window.currentPageData.success)){try{currentPageData.success({url:decodeURIComponent(res.url)});$(".site_contact").css({"background-image":"url(//ssl1.tuniucdn.com/img/2016090720/header/site_contact_bg.png)","background-position":"left bottom"});}catch(err){}}
$(document).off('click.loginPassport','.headTuniuKefu, .online_btn').on('click.loginPassport','.headTuniuKefu, .online_btn',function(e){var $onlineKefuEl=$('#onlineKefu').trigger('click.openKefuWindow');if($onlineKefuEl&&$onlineKefuEl.length>0){e.preventDefault&&e.preventDefault();return false;}}).off('click.closeLoginPassport').on('click.closeLoginPassport',function(e){if(!$(e.target).hasClass('online_btn')&&$(e.target).parents('.online_btn').length<1&&!$(e.target).hasClass('u_order_tip')&&$(e.target).parents('.u_order_tip').length<1){$('.order_now .rc_box').remove();$('.u_order_tip .rc_box').remove();}});kefuType='tuniuKefu';if($('#onlineKefu').length>0){$('#onlineKefu #live800').attr('id',kefuType);}else{var kefu="<li class='' id='onlineKefu' onclick=\"_gaq.push(['_trackEvent','在线客服按钮_1','','']);\">"
+"<div class='rc_index' style='cursor:pointer;'>"
+"<p class='rc_topBot_b' style='border-bottom:none;'>"
+"<a href='javascript:void(0)' id='"+kefuType+"'><span class='rc_icon rc_online'></span></a>"
+"</p>"
+"</div>"+"<div class='rc_box nopad nobord rc_hover_event'>"
+"</div>"+"</li>";if(!is_kefu){kefu="";return;}
$('#rc_phone').append(kefu);}
$(document).on('click.openKefuWindow','#onlineKefu',function(e){window.open(decodeURIComponent(res.url));})})}
return kefu;},getSaoma:function(){if(data.myCode){var Saoma="<%if(data.myCode){%><li class='hoverClick'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<span class='rc_icon rc_scan'></span>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>扫码预订</p>"
+"</div>"
+"</div>"
+"<div class='rc_box rc_click_event pd_5'>"
+"<span class='rc_arrow'><i class='triangle_border'><em></em></i></span>"
+"<div class=''>"
+"<img src='<%=data.myCode.erweima %>' />"
+"<p class='rc_scan_des'>信扫码预订<br>点评多返5元</p>"
+"</div>"
+"</div>"
+"</li><%}%>";return getUnderscoreCompiledTemplate(_.template(Saoma,data.myCode),data.myCode);}else{return"";}},addToCollect:function(){var page_type=document.getElementById("page_type").value;if(page_type==92000)return"";if(page_type==32000)return"";if(!this.noProduct()){var addToCollectList="<li class='' id='doAddToCollect'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<span class='rc_icon rc_addCollect'></span>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>加入关注</p>"
+"</div>"
+"</div>"
+"</li>";return addToCollectList;}else{return"";}},getQA:function(){var myQA="<li class=''>"
+"<div class='rc_index'>"+"<p class='rc_topBot_b'>"+"<a href='http://masxiaoji.mikecrm.com/6uVEvv' target='_blank'><span class='rc_icon rc_qa'></span></a>"+"</p>"+"</div>"+"<div class='rc_box nopad nobord rc_hover_event'>"+"<div class='rc_content'>"+" <p class='rc_des'><a href='http://www.mikecrm.com/f.php?t=QrOjmJ' target='_blank' style='display:block;width:60px;height:41px;color:#f80;'>问卷调查</a></p>"+"</div>"+"</div>"
+"</li>";return myQA;},addAdvise:function(){if(data.myAdvise){var myAdvise="<li class=''>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<a href='http://www.tuniu.com/corp/advise.shtml' target='_blank'><span class='rc_icon rc_advise'></span></a>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+" <p class='rc_des'><a href='http://www.tuniu.com/corp/advise.shtml' target='_blank' style='display:block;width:60px;height:41px;color:#f80;'>意见建议</a></p>"
+"</div>"
+"</div>"
+"</li>";return myAdvise;}else{return"";}},backToTop:function(){var backTop="<li class='rcBackToTopSty' id='rcBackToTop'>"
+"<div class='rc_index'>"
+"<p class='rc_topBot_b'>"
+"<span class='rc_icon rc_backtotop' id=''></span>"
+"</p>"
+"</div>"
+"<div class='rc_box nopad nobord rc_hover_event'>"
+"<div class='rc_content'>"
+"<p class='rc_des'>返回顶部</p>"
+"</div>"
+"</div>"
+"</li>";return backTop;}};;var checkIsLogin=checkIsLogin||[];var compName=compName||[];var clearTim=clearTim||"";var checkLogin={init:function(){this.submitInfor();},rcUserName:"",rcPassWord:"",rcVerCode:"",reTemp:1,doAddToCollect:function(){$(document).ready(function(){var url=window.DEBUG?"http://www.tuniu.org/tn?r=api/attention/getSingleAttentionInfo":"//www.tuniu.com/tn?r=api/attention/getSingleAttentionInfo";var days=$('#journeyDays').val();days=days==null?0:days;$.ajax({url:url,dataType:"jsonp",jsonp:"callFuc",data:{routeId:$("#route_id_tmp").val(),days:days},success:function(data){$("#focus_num").text(data+PageData.focusNum);}});var url2=window.DEBUG?"http://www.tuniu.org/tn?r=api/attention/isAttention":"//www.tuniu.com/tn?r=api/attention/isAttention";$.ajax({url:url2,dataType:"jsonp",jsonp:"callFuc",data:{routeId:$("#route_id_tmp").val()},success:function(data){$("#favorite_id_rc").removeClass("bg_focus_normal bg_focus_click");switch(data){case 1:$("#favorite_id_rc").addClass("bg_focus_normal");$("#favorite_id_rc").text("关注");break;case 2:$("#favorite_id_rc").addClass("bg_focus_click");$("#favorite_id_rc").text("已关注");break;case 4:$("#favorite_id_rc").addClass("bg_focus_normal");$("#favorite_id_rc").text("关注");break;}}});});$(window).on("bg_focus_clicked bg_box_foucs_clicked",function(e){var target=$("#focus_num");var offset=$(target).offset();var oneElt=$("<div></div>").addClass("plus_one").css({top:offset.top-$(window).scrollTop(),left:offset.left+(($(target).width()-24)/2)});$(document.body).append(oneElt);$(oneElt).animate({top:"-=30"}).fadeOut(function(){$(oneElt).remove();});});$("#favorite_id_rc").mouseenter(function(){var isNormal=$(this).hasClass("bg_focus_normal");if(isNormal){$(this).removeClass("bg_focus_normal");$(this).addClass("bg_focus_hover");}}).mouseleave(function(){var isHover=$(this).hasClass("bg_focus_hover");if(isHover){$(this).removeClass("bg_focus_hover");$(this).addClass("bg_focus_normal");}});var __this=this;var doAddToCollect=$("#favorite_id_rc");doAddToCollect.click(function(){_gaq.push(['_trackEvent','[产品页]','[浮动层点击]','[加入收藏]']);var addbtn=$("#favorite_id_rc");__this.clickAddScroll();});},clickAddScroll:function(){var __this=this;var routeId=$("#route_id_tmp").val(),days=$('#journeyDays').val();if($("#favorite_id_rc").hasClass("bg_focus_click")){$('#delete_collcet_id').show();$('#collcet_id').hide();return;}
var url=window.DEBUG?"http://www.tuniu.org/tn?r=api/attention/attention":"//www.tuniu.com/tn?r=api/attention/attention";$.ajax({url:url,dataType:"jsonp",jsonp:"callFuc",data:{routeId:routeId,days:days},success:function(data){switch(data){case 1:__this.disClick();$('#collcet_id').show();$('#delete_collcet_id').hide();break;case 2:break;case 3:alert('添加关注失败!');break;case 4:$('#login_id').show();break;}}});},disClick:function(){var addBtn=$("#favorite_id_rc");$(addBtn).trigger("bg_focus_clicked");$(addBtn).removeClass("bg_focus_hover");$(addBtn).addClass("bg_focus_click");$(addBtn).text("已关注");var value=parseInt($("#focus_num").text());$("#focus_num").text(value+1);},addToDoCom:function(){var __this=this;$("#addToComp").mouseenter(function(){var isNormal=$(this).hasClass("bg_compare_normal");if(isNormal){$(this).removeClass("bg_compare_normal");$(this).addClass("bg_compare_hover");}}).mouseleave(function(){var isHover=$(this).hasClass("bg_compare_hover");if(isHover){$(this).removeClass("bg_compare_hover");$(this).addClass("bg_compare_normal");}});$("#addToComp").click(function(){__this.addToCompareList();});},showCompareList:function(){var __this=this;var routeIds=this.getCookie("_compare");if(routeIds!=''){__this.get_compare_info(routeIds);}},showCompareBox:function(){var rightCommon=$("#rightCommon");var __w_width=$(window).width();if(__w_width<1024){rightCommon.addClass("mouse_over");}
var compareBox=$("#compareBox");var __this_rc_box=compareBox.find(".rc_click_event");var __this_rc_arrow=compareBox.find(".rc_arrow");var __this_scroll_top=parseInt($(window).scrollTop());if(__this_rc_box.length){var __window_height=parseInt($(window).height());var __this_off_top=parseInt(compareBox.offset().top)-__this_scroll_top;var __this_rc_box_top=parseInt(__this_rc_box.height());if((__this_off_top+__this_rc_box_top)>__window_height){var __off_top=__this_off_top+__this_rc_box_top-__window_height;__this_rc_box.css("top",-__off_top);__this_rc_arrow.css("top",20+__off_top);}else{__this_rc_box.css("top",0);__this_rc_arrow.css("top",20);}}
compareBox.addClass("rc_click");},addToCompareList:function(routeId){var __this=this;var routeIds=this.getCookie("_compare");if(routeIds!=''){routeIds=routeIds+',';}
routeId=routeId||$('#route_id_tmp').val();if(routeIds.indexOf(routeId)==-1){routeIds+=routeId+',';}else{__this.showCompareBox();__this.showCompareTips("此商品已在对比栏中，不需要重复添加哦。");return false;}
var comma_count=(routeIds.split(',')).length-1;if(comma_count>3){__this.showCompareBox();__this.showCompareTips("最多只可以对比三条线路");return false;}
routeIds=routeIds.substr(0,routeIds.length-1);document.cookie="_compare ="+routeIds+";path=/;domain=.tuniu.com";this.get_compare_info(routeIds);__this.showCompareBox();},showCompareTips:function(t){var compareContTips=$("#compareContTips");compareContTips.html(t);},get_compare_info:function(routeIds){var comPareImg=document.getElementById("comPareImg");var __this=this;if(routeIds==''){if(comPareImg)comPareImg.style.display="none";return false;}
var comPareList=document.getElementById("comPareList");var base_url="//www.tuniu.com";var url=base_url+'/tn?r=toursAjax/getInfo/routeIds/'+routeIds+'&jsoncallback=?';$.getJSON(url,function(r){compName=r;var compModuel=[{"id":"","showName":""}]
compName=$.extend(true,[],compModuel,compName);var compList="<li>"
+"<dl class='rc_double_col rc_compare_li clearfix'>"
+"<dt><a href='http://www.tuniu.com/tours/<%=name.id%>' target='_blank'><%=name.showName%></a></dt>"
+"<dd ><a href='javascript:void(0)' class='rc_y_color clearThisItem' data='<%=name.id%>' >×</a></dd>"
+"</dl>"
+"</li> ";var compLineTmp="<%_.each(compName,function(name){%>"
+compList
+"<% }) %>";var compLineBtn="<li><p style='color:#ff0000;font-size:16px;' id='compareContTips'></p><input class='rc_ableBtn' id='gotoContrast' value='马上对比' type='button' style='margin-top:15px;' / ></li>"
if(comPareImg)comPareImg.style.display="none";var compALsit=_.template(compLineTmp,compName);compALsit+=compLineBtn;if(comPareList)comPareList.innerHTML=compALsit;checkLogin.delOneItem();checkLogin.delAllCompareL();checkLogin.gotocontrast();var gotoContrast=document.getElementById('gotoContrast');if(compName.length>1&&gotoContrast){gotoContrast.className='rc_ableBtn';}else if(gotoContrast){gotoContrast.className='rc_ableBtn disable';}});},getCookie:function(c_name){if(document.cookie.length>0){c_start=document.cookie.indexOf(c_name+"=");if(c_start!=-1){c_start=c_start+c_name.length+1;c_end=document.cookie.indexOf(";",c_start);if(c_end==-1){c_end=document.cookie.length;}
return unescape(document.cookie.substring(c_start,c_end));}}
return"";},delCookie:function(name){var date=new Date();date.setTime(date.getTime()-10000);document.cookie=name+"=a; expires="+date.toGMTString()+";path=/;domain=.tuniu.com";},delAllCompareL:function(){var __this=this;var clearComPareList=$("#clearComPareList");var comPareList=$("#comPareList");var goToContrast=$("#gotoContrast");clearComPareList.click(function(){comPareList.find("li").not(goToContrast).remove();goToContrast.addClass("disable");__this.delCookie("_compare");__this.get_compare_info("");});},delOneItem:function(){var __this=this;var goToContrast=$("#gotoContrast");var comPareList_li=$("#comPareList").find("li").not(goToContrast);var routeIds_cookie_tem=this.getCookie("_compare");if(routeIds_cookie_tem!=''){routeIds_cookie_tem=routeIds_cookie_tem+',';}
comPareList_li.each(function(i,n){$(n).find(".clearThisItem").click(function(){$(n).remove();var _this_data=$(this).attr("data");if(typeof(_this_data)!='undefined'){if(routeIds_cookie_tem.indexOf(_this_data)!=-1){routeIds_cookie_tem=routeIds_cookie_tem.replace(_this_data+',','')}}
routeIds_cookie_tem=routeIds_cookie_tem.substr(0,routeIds_cookie_tem.length-1)
document.cookie="_compare ="+routeIds_cookie_tem+";path=/;domain=.tuniu.com";__this.get_compare_info(routeIds_cookie_tem);});})},gotocontrast:function(){var __this=this;var routeIds=__this.getCookie("_compare");var gotoContrast=$("#gotoContrast");gotoContrast.click(function(){if(!$(this).hasClass("disable")){window.open('http://www.tuniu.com/routecompare/'+routeIds);}});},getUserInfo:function(t){if(!t.length)return false;this.rcUserName=t.find(".rcUserName").val().replace(/^\s+|\s+$/g,"");this.rcPassWord=t.find(".rcPassWord").val().replace(/^\s+|\s+$/g,"");this.rcVerCode=t.find(".rcVerCode").val().replace(/^\s+|\s+$/g,"");},showErrormsg:function(t,m){t.find(".show_error").html(m);},checkUserName:function(t){this.getUserInfo(t);if(this.rcUserName!=""){this.showErrormsg(t,"");this.reTemp=1;return true;}
else{this.showErrormsg(t,"请填写用户名");this.reTemp=0;return false;}},checkPasswWord:function(t){this.getUserInfo(t);if(this.rcPassWord!=""){this.showErrormsg(t,"");this.reTemp=1;return true;}else{this.showErrormsg(t,"请填写密码");this.reTemp=0;}},checkVerCode:function(t){this.getUserInfo(t);var _this=this;if(this.rcVerCode==""){this.reTemp=0;return false;}
var url="/main.php?do=user_reg_check_name&num=100&identify="+this.rcVerCode+"&flag=identify2&cache="+Math.random();$.get(url,function(data_2){if(data_2==2){_this.showErrormsg(t,'验证码填写有误');return false;}
_this.showErrormsg(t,'');_this.reTemp=1;return true;});},refreshLoginState:function(){var user_login_info=document.getElementById("user_login_info");if(user_login_info){user_login_info.innerHTML=getLoginInfo();var collebox=document.getElementById("vipnameBox");var vipname=document.getElementById("vipname");if(collebox){collebox.onmouseover=function(){collebox.className="vipname_box on";vipname.className="vipname float_tt";},collebox.onmouseout=function(){collebox.className="vipname_box";vipname.className="vipname float_tt";vipname.className="vipname";}};}},submitInfor:function(){__this=this;var rightCommonUl=$("#rightCommonUl").find("ul li");rightCommonUl.each(function(i,n){var _this=$(n);_this.find(".rcUserName").blur(function(){__this.checkUserName(_this);});_this.find(".rcPassWord").blur(function(){__this.checkPasswWord(_this);});_this.find(".rc_ableBtn").click(function(){_this.find(".rc_ableBtn").attr("disabled","disabled");if(__this.reTemp){__this.checkUserName(_this);}
if(__this.reTemp){__this.checkPasswWord(_this);}
if(!__this.reTemp)return false;var url='/main.php?do=user_reg_check_name&cache='+Math.random();__this.getUserInfo(_this);var p={'username':__this.rcUserName,'password':__this.rcPassWord,'identify':__this.rcVerCode,'needReturn':1}
_this.find(".rcLoadingImg").show();var url='/main.php?do=order_login_ajax&flag=login&t='+Math.random();$.post(url,p,function(json){if(!json.success){_this.find(".rcLoadingImg").hide();var errorMsg='您输入的账号或密码或验证码不正确';if(undefined!=json.msg){errorMsg=json.msg;}
__this.showErrormsg(_this,errorMsg);_this.find(".rc_ableBtn").removeAttr("disabled");getData.changeVcode();return false;}else{__this.showErrormsg(_this,'');getData.init();}},'json');});});},hasLogined:function(){rightCommon.init();}}
var loopDuration=60000;var data=data||{};function cjCallback(result){var save_data=result;var default_data={"islogin":"","adArea":{"adUrl":"","adUrl_small":"","adUrl_big":""},"myTuniu":{"userHeadImgUrl":"","userName":"","userLevel":"","userPrivilege":[{"userPrivilege_1":""}]},"myCollect":{"prd":[{"prdUrl":"","prdImg":"","prdName":"","prdPrice":""}]},"myScore":{"ads":[{"prdUrl":"","prdImg":"","prdName":"","prdPrice":"","prdSheng":"","begin_date":"","due_date":"","module_id":""}],"expiredPoint":"","leftScore":""},"myOrder":{"need_pay":"","need_comment":"","list":[{"prdUrl":"","prdImg":"","prdName":"","prdPrice":"","prd_sta":"","preAdImg":"","prdAdUrl":"","url":"","pay_status_name":""}],"count":""},"myGift":{"lvyouquan":"","diyongquan":"","cash":"","gifts":[{"giftUrl":"","giftImg":"","giftName":"","giftPrice":""}]},"myPhone":{"phone":"4007-999-999"},"myCode":{"erweima":"img/rc_code.jpg"},"myAdvise":{"isShow":1},"appArea":{"appImgUrl":"//ssl1.tuniucdn.com/img/20140623/index_v2/index_app.png",},"myMessage":{"sum":"","prd":[{"orderUrl":"","orderName":"","unreadMsgCount":""}]}}
data=$.extend(true,{},default_data,save_data);rightCommon.init(currentPageData);checkLogin.init();checkLogin.showCompareList();checkLogin.addToDoCom();checkLogin.doAddToCollect();checkLogin.refreshLoginState();getLoginInfor.init();getData.getNameFormCookie(data.islogin);getData.addLive800();getData.backToTop();getData.selectTag();getData.createVCode();getData.compHeig();getData.smallWindow();getData.bindEvent();getData.leftRightSlide();if(save_data&&save_data.islogin==1){getData.getMsg();}};var getData=getData||[];getData={init:function(){this.getAllData();this.compHeig();},getAllData:function(){if(!$("#page_type").val()){rightCommon.init(currentPageData,true);return;}
var url='//www.tuniu.com/api/sidebar/tools/'+$("#page_type").val()+"&js_callback=cjCallback";$.ajax({url:url,type:"get",async:true,dataType:"jsonp",jsonp:"js_callback"})},getMsg:function(){getData.msgNumEle=$('#J_RightCommonMsgNum');getData.msgListEle=$('#J_RightCommonMsgList');setTimeout(function(){getData.getMsgData();},loopDuration);},getMsgData:function(){$.get('//www.tuniu.com/u/msg/unread/',{},function(data){var listHtml;if(data&&data.sum){listHtml=_.template(rightCommon.myMsgTemplate(),{myMessage:data});getData.msgListEle.html(listHtml);getData.msgNumEle.text(data.sum).show();}else{getData.msgListEle.html('暂无新消息');getData.msgNumEle.hide().text(0);}
setTimeout(function(){getData.getMsgData();},loopDuration);},'jsonp');},bindEvent:function(){$("#rightCommonUl ul li").hover(function(){var __this_rc_box=$(this).find(".rc_click_event");var __this_rc_arrow=$(this).find(".rc_arrow");var __this_scroll_top=parseInt($(window).scrollTop());if(__this_rc_box.length){var __window_height=parseInt($(window).height());var __this_off_top=parseInt($(this).offset().top)-__this_scroll_top;var __this_rc_box_top=parseInt(__this_rc_box.height());if((__this_off_top+__this_rc_box_top)>__window_height){var __off_top=__this_off_top+__this_rc_box_top-__window_height;__this_rc_box.css("top",-__off_top);__this_rc_arrow.css("top",20+__off_top);}else{__this_rc_box.css("top",0);__this_rc_arrow.css("top",20);}}
if($(this).hasClass("hoverClick")){$(this).addClass("rc_mouseover");}else{$(this).addClass("rc_hover");}},function(){$(this).removeClass("rc_hover");$(this).removeClass("rc_mouseover");$(this).removeClass("rc_click");});$("#rightCommonUl ul li").click(function(){var __this_rc_box=$(this).find(".rc_click_event");var __this_rc_arrow=$(this).find(".rc_arrow");var __this_scroll_top=parseInt($(window).scrollTop());if(__this_rc_box.length){var __window_height=parseInt($(window).height());var __this_off_top=parseInt($(this).offset().top)-__this_scroll_top;var __this_rc_box_top=parseInt(__this_rc_box.height());if((__this_off_top+__this_rc_box_top)>__window_height){var __off_top=__this_off_top+__this_rc_box_top-__window_height;__this_rc_box.css("top",-__off_top);__this_rc_arrow.css("top",20+__off_top);}else{__this_rc_box.css("top",0);__this_rc_arrow.css("top",20);}}
$(this).removeClass("rc_mouseover");$(this).addClass("rc_click");});},compHeig:function(){var w_gh=$(window).height();var rightCommon_2=$("#rightCommon");if(!rightCommon_2)return false;var lessThanHide=$("#lessThanHide");var RCU_doArea=$("#RCU_doArea");if(!rightCommon.noProduct()){lessThanHide.hide();RCU_doArea.css({"top":450});}
rightCommon_2.css("height",w_gh);},selectTag:function(){var right_tagContent=$("#right_tagContent");if(!right_tagContent.length)return false;var rt_length=right_tagContent.find(".right_tagContent").length;var s_tag="<ul id='right_tags'><li class='selectTag'><a  href='javascript:void(0)'></a> </li>";if(rt_length>1){right_tagContent.find(".right_tagContent").eq(0).addClass("selectTag");for(var i=1;i<rt_length;i++){s_tag+="<li class=''><a  href='javascript:void(0)'></a> </li>";}}
s_tag+="</ul>";right_tagContent.after(s_tag);$("#right_tags").find("li").each(function(i,n){$(n).click(function(){$(n).siblings().removeClass("selectTag").end().addClass("selectTag");right_tagContent.find(".right_tagContent").removeClass("selectTag").eq(i).addClass("selectTag");});});},createVCode:function(){var rightCommonUl=$("#rightCommonUl").find("li");var rd=Math.random();rightCommonUl.each(function(i,n){$(n).find('.identify_img').attr('src','/identify.php?flag=100&cache='+rd);$(n).find(".change_img").click(function(){var rd_2=Math.random();$(n).find('.identify_img').attr('src','/identify.php?flag=100&cache='+rd_2);});})},changeVcode:function(){var rightCommonUl=$("#rightCommonUl").find("li");var rd=Math.random();rightCommonUl.each(function(i,n){$(n).find('.identify_img').attr('src','/identify.php?flag=100&cache='+rd);})},addLive800:function(){var live800=$("#live800");if(!live800)return"";var groupid=$("#kefu_show").attr("groupid");},htmlspecialchars:function(str){str=str.replace('&','&amp;');str=str.replace('<','&lt;');str=str.replace('>','&gt;');str=str.replace('"','&quot;');str=str.replace(' ','&nbsp;');return str;},Live800:function(groupid,iWidth,iHeight){if(!document.getElementById('live800'))return;if(!document.getElementById('live800').value){var tuniuTrakerNew=_tat.getTracker();tuniuTrakerNew.setPageName("客服在线帮助页面");tuniuTrakerNew.trackEvent('live800');tuniuTrakerNew=null;}
var enterurl=encodeURIComponent(this.htmlspecialchars(window.location.href));var pagetitle=encodeURIComponent(this.htmlspecialchars(window.document.title));var url='http://chat16.live800.com/live800/chatClient/chatbox.jsp?companyID=319154&jid=3047301407&skillId='+groupid+'&enterurl='+enterurl+'&pagetitle='+pagetitle;var iTop=(window.screen.availHeight-30-iHeight)/2;var iLeft=(window.screen.availWidth-10-iWidth)/2;var openwindow=window.open(url,'new','height='+iHeight+',innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=yes,location=no,status=no');var timer=setInterval(function(){if(openwindow.closed){document.getElementById('live800').value=0;document.getElementById('live800').href="javascript:Live800("+groupid+","+iWidth+","+iHeight+");";clearInterval(timer);}else{document.getElementById('live800').value=1;document.getElementById('live800').href="javascript:void(0);";}},100);},backToTop:function(){$("#rcBackToTop").click(function(){$("body,html").animate({"scrollTop":0});});},getNameFormCookie:function(login_status){var __this=this;var rightCommonUl=$("#rightCommonUl").find("ul li");rightCommonUl.each(function(i,n){$(n).find(".rc_common_input").click(function(){var cookieName=unescape(checkLogin.getCookie("tuniuuser_name"));cookieName=__this.utf8to16(__this.base64decode(cookieName)).replace(/<\/?[^>]*>/g,'');var subCookieName=$(n).find(".subCookieName");if(login_status==0&&cookieName){subCookieName.removeClass("hide");subCookieName.find(".nickName").html(cookieName);}});;});},utf8to16:function(str){var out,i,len,c;var char2,char3;out="";len=str.length;i=0;while(i<len){c=str.charCodeAt(i++);switch(c>>4){case 0:case 1:case 2:case 3:case 4:case 5:case 6:case 7:out+=str.charAt(i-1);break;case 12:case 13:char2=str.charCodeAt(i++);out+=String.fromCharCode(((c&0x1F)<<6)|(char2&0x3F));break;case 14:char2=str.charCodeAt(i++);char3=str.charCodeAt(i++);out+=String.fromCharCode(((c&0x0F)<<12)|((char2&0x3F)<<6)|((char3&0x3F)<<0));break}}
return out},base64decode:function(str){var base64DecodeChars=new Array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,62,-1,-1,-1,63,52,53,54,55,56,57,58,59,60,61,-1,-1,-1,-1,-1,-1,-1,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,-1,-1,-1,-1,-1,-1,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,-1,-1,-1,-1,-1);var c1,c2,c3,c4;var i,len,out;len=str.length;i=0;out="";while(i<len){do{c1=base64DecodeChars[str.charCodeAt(i++)&0xff]}while(i<len&&c1==-1);if(c1==-1)
break;do{c2=base64DecodeChars[str.charCodeAt(i++)&0xff]}while(i<len&&c2==-1);if(c2==-1)
break;out+=String.fromCharCode((c1<<2)|((c2&0x30)>>4));do{c3=str.charCodeAt(i++)&0xff;if(c3==61)
return out;c3=base64DecodeChars[c3]}while(i<len&&c3==-1);if(c3==-1)
break;out+=String.fromCharCode(((c2&0XF)<<4)|((c3&0x3C)>>2));do{c4=str.charCodeAt(i++)&0xff;if(c4==61)
return out;c4=base64DecodeChars[c4]}while(i<len&&c4==-1);if(c4==-1)
break;out+=String.fromCharCode(((c3&0x03)<<6)|c4)}
return out},smallWindow:function(){var __this=this;var rightCommon=$("#rightCommon");if(!rightCommon)return false;var __w_width=$(window).width();if(__w_width<1024){__this.autoSlideHide(rightCommon);}else{clearTimeout(clearTim);rightCommon.removeClass("lessThan1024");}
var clearTimeoutHand="";rightCommon.hover(function(){clearTimeout(clearTim);if(rightCommon.hasClass("lessThan1024")){rightCommon.addClass("mouse_over");}},function(){__this.autoSlideHide(rightCommon);});},autoSlideHide:function(t){var __w_width=$(window).width();clearTimeout(clearTim);clearTim=setTimeout(function(){if(__w_width<1024){t.animate({"right":-50},function(){t.addClass("lessThan1024");if(t.hasClass("mouse_over")){t.removeClass("mouse_over");}
t.animate({"right":0},500);});}},1000)},leftRightSlide:function(){var share_item_0=$("#share_item_0");var share_item_prev=share_item_0.find(".share_btn_prev");var share_item_next=share_item_0.find(".share_btn_next");var share_item_list=share_item_0.find(".share_item_ul li");var share_scroll=share_item_0.find(".share_item_ul");var share_temp=0;var share_item_length=share_item_list.length;share_item_prev.css({"background-color":"#f0f0f0"});if(share_item_length<3){share_item_next.css({"background-color":"#f0f0f0"});}
share_item_prev.click(function(){if(share_temp>0){share_temp--;share_item_next.css({"background-color":"transparent","color":"#2e9900"});if(share_temp==0){share_item_prev.css({"background-color":"#f0f0f0","color":"#ccc"});}else{share_item_prev.css({"background-color":"transparent","color":"#2e9900"});}
share_scroll.animate({"left":-share_temp*36});}});share_item_next.click(function(){if(share_item_length>3&&share_temp<(share_item_length-3)){share_temp++;share_item_prev.css({"background-color":"transparent","color":"#2e9900"});if(share_temp==share_item_length-3){share_item_next.css({"background-color":"#f0f0f0","color":"#ccc"});}else{share_item_next.css({"background-color":"transparent","color":"#2e9900"});}
share_scroll.animate({"left":-share_temp*36});}});},onlineKefu:function(){var onlineKefu=$("#onlineKefu");if(onlineKefu){onlineKefu.addClass("rc_hover");setTimeout(function(){onlineKefu.removeClass("rc_hover");},5000);}}}
$(function(){getData.init();$(window).resize(function(){getData.compHeig();getData.smallWindow();});})