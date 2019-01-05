//检验身份证号码的正确性
var Wi = [7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2]; 
var ValideCode = [1,0,10,9,8,7,6,5,4,3,2]; 
function idnumValidate(rlidnum) {        
    if (rlidnum.length == 15) {   
        return isValidityBrithBy15Idnum(rlidnum);  
    } else if (rlidnum.length == 18) {   
        if(isValidityBrithBy18Idnum(rlidnum)&&isTrueValidateCodeBy18Idnum(rlidnum)){ 
        	return true;   
        }else {   
            return false;   
        }   
    } else {   
        return false;   
    }   
}   
//判断身份证号码为18位时最后的验证位是否正确  
function isTrueValidateCodeBy18Idnum(a_rlidnum) {   
    var sum = 0; 
    var idnumLast = a_rlidnum.charAt(17);
    if (idnumLast.toLowerCase() == 'x') {   
    	idnumLast = 10;                    // 将最后位为x的验证码替换为10方便后续操作   
    }   
    for ( var i = 0; i < 17; i++) {   
    	var num_i = a_rlidnum.charAt(i);
        sum += Wi[i] * num_i;  
    }   
    var valCodePosition = sum % 11; 
    if (idnumLast == ValideCode[valCodePosition]) {   
        return true;   
    } else {   
        return false;   
    }   
}   
// 验证18位数身份证号码中的生日是否是有效生日  
 
function isValidityBrithBy18Idnum(rlidnum18){   
    var year =  rlidnum18.substring(6,10);   
    var month = rlidnum18.substring(10,12);   
    var day = rlidnum18.substring(12,14);  
    var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));
    var now_date = new Date();
    if(temp_date.getTime()>now_date.getTime()||temp_date.getFullYear()!=parseFloat(year)   
          ||temp_date.getMonth()!=parseFloat(month)-1   
          ||temp_date.getDate()!=parseFloat(day)){   
            return false;   
    }else{  
        return true;   
    }   
}   
//验证15位数身份证号码中的生日是否是有效生日  
  function isValidityBrithBy15Idnum(idnum15){   
      var year =  idnum15.substring(6,8);   
      var month = idnum15.substring(8,10);   
      var day = idnum15.substring(10,12);   
      var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));   
      if(temp_date.getYear()!=parseFloat(year)   
              ||temp_date.getMonth()!=parseFloat(month)-1   
              ||temp_date.getDate()!=parseFloat(day)){   
                return false;   
        }else{   
            return true;   
        }   
  }   
  //校验手机号
  function checkMoblie(mobile){
	  if(!(/^1[3|4|5|6|7|8|9][0-9]\d{8}$/.test(mobile))){
		  return false;
	  }else{
		  return true;
	  }
  }
  
	  
  /**
   * 1.将未带校验位的 15（或18）位卡号从右依次编号 1 到 15（18），位于奇数位号上的数字乘以 2。
   * 2.将奇位乘积的个十位全部相加，再加上所有偶数位上的数字。
   * 3.将加法和加上校验位能被 10 整除。
   * 银行卡号校验
   */
	function luhmCheck(bankno){
	    var lastNum=bankno.substr(bankno.length-1,1);//取出最后一位（与luhm进行比较）
	 
	    var first15Num=bankno.substr(0,bankno.length-1);//前15或18位
	    var newArr=new Array();
	    for(var i=first15Num.length-1;i>-1;i--){    //前15或18位倒序存进数组
	        newArr.push(first15Num.substr(i,1));
	    }
	    var arrJiShu=new Array();  //奇数位*2的积 <9
	    var arrJiShu2=new Array(); //奇数位*2的积 >9
	     
	    var arrOuShu=new Array();  //偶数位数组
	    for(var j=0;j<newArr.length;j++){
	        if((j+1)%2==1){//奇数位
	            if(parseInt(newArr[j])*2<9)
	            arrJiShu.push(parseInt(newArr[j])*2);
	            else
	            arrJiShu2.push(parseInt(newArr[j])*2);
	        }
	        else //偶数位
	        arrOuShu.push(newArr[j]);
	    }
	     
	    var jishu_child1=new Array();//奇数位*2 >9 的分割之后的数组个位数
	    var jishu_child2=new Array();//奇数位*2 >9 的分割之后的数组十位数
	    for(var h=0;h<arrJiShu2.length;h++){
	        jishu_child1.push(parseInt(arrJiShu2[h])%10);
	        jishu_child2.push(parseInt(arrJiShu2[h])/10);
	    }        
	     
	    var sumJiShu=0; //奇数位*2 < 9 的数组之和
	    var sumOuShu=0; //偶数位数组之和
	    var sumJiShuChild1=0; //奇数位*2 >9 的分割之后的数组个位数之和
	    var sumJiShuChild2=0; //奇数位*2 >9 的分割之后的数组十位数之和
	    var sumTotal=0;
	    for(var m=0;m<arrJiShu.length;m++){
	        sumJiShu=sumJiShu+parseInt(arrJiShu[m]);
	    }
	     
	    for(var n=0;n<arrOuShu.length;n++){
	        sumOuShu=sumOuShu+parseInt(arrOuShu[n]);
	    }
	     
	    for(var p=0;p<jishu_child1.length;p++){
	        sumJiShuChild1=sumJiShuChild1+parseInt(jishu_child1[p]);
	        sumJiShuChild2=sumJiShuChild2+parseInt(jishu_child2[p]);
	    }      
	    //计算总和
	    sumTotal=parseInt(sumJiShu)+parseInt(sumOuShu)+parseInt(sumJiShuChild1)+parseInt(sumJiShuChild2);
	     
	    //计算Luhm值
	    var k= parseInt(sumTotal)%10==0?10:parseInt(sumTotal)%10;        
	    var luhm= 10-k;
	    return parseInt(lastNum)==luhm ? true:false;
	}
	
function analysisPage(pagename) {
	var analyTuniuSpend = 0.017;
    var tuniuTracker = _tat.getTracker();
    tuniuTracker.setPageName(pagename);
    tuniuTracker.addOrganic("baidu.com","w");
    tuniuTracker.addOrganic("baidu.com","q1");
    tuniuTracker.addOrganic("baidu.com","q2");
    tuniuTracker.addOrganic("baidu.com","q3");
    tuniuTracker.addOrganic("baidu.com","q4");
    tuniuTracker.addOrganic("baidu.com","q5");
    tuniuTracker.addOrganic("baidu.com","q6");
    tuniuTracker.addOrganic("www.so.com","u");
    tuniuTracker.addOrganic("www.so.com","q");
    tuniuTracker.addOrganic("so.360.cn","u");
    tuniuTracker.addOrganic("so.360.cn","q");
    tuniuTracker.trackPageView();
    tuniuTracker.enableLinkTracking();
}
