function instalmentPaySubmit(id){
    if($("#xp_agreement_unbind").length>0&&(!($("#xp_agreement_unbind").attr("checked")=="checked"))){
        $("#ts_agreement_unbind").show();
        return;
    }else{
        $("#ts_agreement_unbind").hide();
    }
    if(id == undefined){
        return ;
    }
    if (!validSplitPay()) {
        return ; //valid splitpay first
    }

    var flag = instalmentPayValidate(id);
    if(!flag){
        return;
    }
    loadInstalmentPayInputInfo(id);
    //smsBoxPopup();
    $("#payType").val(PayTypeOption.instalment);
    sendSms(SmsResultOption.NewSmsResult);
}

function bindInstalmentPaySubmit(id){
    if($("#xp_agreement_hasbind").length>0&&(!($("#xp_agreement_hasbind").attr("checked")=="checked"))){
        $("#ts_agreement_hasbind").show();
        return
    }else{
        $("#ts_agreement_hasbind").hide();
    }
    if(id == undefined){
        return ;
    }
    if (!validSplitPay()) {
        return ; //valid splitpay first
    }

    var result = payCardCheckFormat(id);
    if(result.msg != null){
        showErrorTips(result.obj, result.msg);
        return ;
    }
    loadInstalmentPayCardInfo(id);
    //smsBoxPopup();
    $("#payType").val(PayTypeOption.instalment);
    sendSms(SmsResultOption.NewSmsResult);
}

function instalmentPayValidate(id){
    var result = instalmentPayCheckNull(id);
    if(!result.success){
        showErrorTips(result.obj, null);
        return false;
    }
    result = instalmentPayCheckFormat(id);
    if(result.msg != null){
        showErrorTips(result.obj, result.msg);
        return false;
    }
    return true;
}
//新卡快捷支付check
function instalmentPayCheckNull(id){
    var result = new Object();
    result.success = false;
    result.obj = null;
    result.msg = null;
    if($("#"+id+"_cardNoInput").val() == ""){
        result.obj = $("#"+id+"_cardNoInput");
        return result;
    }
    if($("#"+id+"_phoneNumInput").val() == ""){
        result.obj = $("#"+id+"_phoneNumInput");
        return result;
    }
    //信用卡
    if($("#"+id+"_monthInput").val() == ""){
        result.obj = $("#"+id+"_monthInput");
        return result;
    }
    if($("#"+id+"_yearInput").val() == ""){
        result.obj = $("#"+id+"_yearInput");
        return result;
    }
    if($("#"+id+"_validateInput").val() == ""){
        result.obj = $("#"+id+"_validateInput");
        return result;
    }
    if($("#useCert").val()=="0"){
        if($("#"+id+"_accNameInput").val() == ""){
            result.obj = $("#"+id+"_accNameInput");
            return result;
        }
        if($("#"+id+"_idTypeInput").val() == ""){
            result.obj = $("#"+id+"_idTypeInput");
            return result;
        }
        if($("#"+id+"_idCodeInput").val() == ""){
            result.obj = $("#"+id+"_idCodeInput");
            return result;
        }
    }
    result.success = true;
    return result;
}

function instalmentPayCheckFormat(id){
    var result = new Object();
    var cardType = 1;
    var cardInfo = $("#"+id+"_form_box .card_info .bank-logo");
    var bankCode = cardInfo.attr("cd");
    var cardNo = $("#"+id+"_cardNoInput").val();
    result.success = false;
    result.obj = null;
    result.msg = null;
    var res = cardNoValidate(cardNo, cardType, bankCode);
    if(!res.success){
        result.obj = $("#"+id+"_cardNoInput");
        result.msg = res.msg;
        return result;
    }
    if($("#"+id+"_monthInput").val().length != 2){
        result.obj = $("#"+id+"_monthInput");
        result.msg = "请输入正确的有效期";
        return result;
    }
    if($("#"+id+"_yearInput").val().length != 4 && $("#"+id+"_yearInput").val().length != 2){
        result.obj = $("#"+id+"_yearInput");
        result.msg = "请输入正确的有效期";
        return result;
    }
    if($("#"+id+"_validateInput").val().length != 3){
        result.obj = $("#"+id+"_validateInput");
        result.msg = "请输入有效的卡验证码";
        return result;
    }
    if($("#useCert").val()=="0"){
         var id_type_value = $("#"+id+"_idTypeInput").val();
         var id_type=getIdType(id_type_value);
         $("#accName").val($("#"+id+"_accNameInput").val());
         var name=$("#accName").val();
        if (id_type===0) {
            result.obj = $("#"+id+"_idTypeInput");
            result.msg = "请选择证件类型";
            return result;
        }
        var id_code_value=$("#"+id+"_idCodeInput").val();
        if(id_type==1 && !idnumValidate(id_code_value)){
            result.obj = $("#"+id+"_idCodeInput");
            result.msg = "请输入有效的身份证号";
            return result;
        } else if (id_type==2 && !checkPassport(id_code_value)) {
            result.obj = $("#"+id+"_idCodeInput");
            result.msg = "请输入有效的护照号";
            return result;
        } else if (id_type ==3 && !checkOfficepass(id_code_value)) {
            result.obj = $("#"+id+"_idCodeInput");
            result.msg = "请输入有效的军官证号";
            return result;
        } else if (id_type==4 && !checkHMVisitor(id_code_value)) {
            result.obj = $("#"+id+"_idCodeInput");
            result.msg = "请输入有效的港澳往来通行证号";
            return result;
        } else if (id_type==5 && !checkTaiVisitor(id_code_value)) {
            result.obj = $("#"+id+"_idCodeInput");
            result.msg = "请输入有效的台湾往来通行证号";
            return result;
        }
        if(!checkName(id_type,name)){
            result.obj = $("#"+id+"_accNameInput");
            result.msg = "请输入有效的姓名";
            return result;
        }
    }
    if(!checkMoblie($("#"+id+"_phoneNumInput").val())){
        result.obj = $("#"+id+"_phoneNumInput");
        result.msg = "请输入正确的手机号";
        return result;
    }
    result.success = true;
    return result;
}
//校验实名姓名是否符合规则
function checkName(idType,name) {
    //身份证规则
    var nameReg1=/^[\u4e00-\u9fa5·]{1,32}$/;
    //护照规则
    var nameReg2=/^[·\.a-zA-Z\s\u4e00-\u9fa5]{1,32}$/;
    // var nameReg2=/[\u4e00-\u9fa5·a-zA-Z.\s]{1,32}/;
    //其他
    var nameReg3=/[\s\S]{1,32}/;
    if(idType==1){
        return nameReg1.test(name);
    }else if(idType==2){
        return nameReg2.test(name);
    }else {
        return nameReg3.test(name);
    }
}

/* 加载分期快捷绑定卡支付参数 */
function loadInstalmentPayCardInfo(id){
    var cardInfo = $("#"+id+" .bank-logo");
    var cardType = cardInfo.attr("ct");
    $("#payChannel").val(cardInfo.attr("pc"));
    $("#payMethod").val(cardInfo.attr("pm"));
    $("#cardType").val(cardInfo.attr("ct"));
    $("#bankCode").val(cardInfo.attr("cd"));
    $("#targetBank").val(cardInfo.attr("tbid"));
    $("#phoneNum").val(cardInfo.attr("mb"));
    var year = $("#"+id+"_bindCardYearInput").val().length==2?$("#"+id+"_bindCardYearInput").val():$("#"+id+"_bindCardYearInput").val().substr(2);
    $("#creditValidity").val($("#"+id+"_bindCardMonthInput").val()+year);
    $("#creditCVV").val($("#"+id+"_bindCardCvvInput").val());
    $("#instalmentNum").val($(".fq-list .fq-item.on em b").html());
    $("#downPaymentFlag").val("0");
}

/* 加载分期快捷支付表单提交的参数 */
function loadInstalmentPayInputInfo(id){
    var cardInfo = $("#"+id+"_form_box .card_info .bank-logo");
    $("#cardType").val("1");
    $("#cardNo").val(trim($("#"+id+"_cardNoInput").val()));
    $("#phoneNum").val($("#"+id+"_phoneNumInput").val());
    var year = $("#"+id+"_yearInput").val().length==2?$("#"+id+"_yearInput").val():$("#"+id+"_yearInput").val().substr(2);
    $("#payChannel").val(cardInfo.attr("ccm").split("-")[0]);
    $("#payMethod").val(cardInfo.attr("ccm").split("-")[1]);
    $("#creditCVV").val($("#"+id+"_validateInput").val());
    $("#creditValidity").val($("#"+id+"_monthInput").val()+year);
    if($("#useCert").val() == "0"){
        $("#accName").val($("#"+id+"_accNameInput").val());
        $("#idType").val(getIdType($("#"+id+"_idTypeInput").val()));
        $("#idCode").val($("#"+id+"_idCodeInput").val());
    }
    $("#bankCode").val(cardInfo.attr("cd"));
    $("#targetBank").val("0");
    $("#instalmentNum").val($(".credit-installment-field .fq-list .fq-item.on em b").html());
    $("#downPaymentFlag").val("0");
}

/* 加载第三方分期支付参数 */
function loadThirdPartyInstalmentPayInfo(id){
    var cardInfo = $("#"+id+" .form_box .line .card_info .bank-logo");
    var applicant = $("#"+id+"_applicantInput").val();
    var applicantIdCard = $("#"+id+"_applicantIdInput").val();
    var instalmentInfo =$(".thirdparty-installment-field .fq-list .fq-item.on em b");
    $("#cardType").val("1");
    $("#payChannel").val(cardInfo.attr("pc"));
    $("#payMethod").val(cardInfo.attr("pm"));
    $("#bankCode").val(cardInfo.attr("bc"));
    $("#applicant").val(applicant);
    $("#applicantIdCard").val(applicantIdCard);
    $("#instalmentNum").val(instalmentInfo.html());
    $("#fee").val(instalmentInfo.attr("rate"));
}

/**第三方分期支付递交**/
function thirdPartyInstalmentPaySubmit(id){
    if(id == undefined){
        return ;
    }
    if (!validSplitPay()) {
        return ; //valid splitpay first
    }
    var result = thirdPartyInstallmentsCheck(id);
    if(result.msg != null){
        showErrorTips(result.obj, result.msg);
        return ;
    }
    loadThirdPartyInstalmentPayInfo(id);
    submitForm(PayResultOption.AccountPayResult);
}

function thirdPartyInstallmentsCheck(id){
    var result = new Object();
    result.success = false;
    result.obj = null;
    result.msg = null;
    if($("#"+id+"_applicantInput").val().length <= 0){
        result.obj = $("#"+id+"_applicantInput");
        result.msg = "请选择申请人";
        return result;
    }
    if($("#"+id+"_applicantIdInput").val().length <= 0){
        result.obj = $("#"+id+"_applicantIdInput");
        result.msg = "申请人身份证为空";
        return result;
    }
    result.success = true;
    return result;
}

/**网银分期支付递交**/
function netbankInstalmentPaySubmit(){
    if (!validSplitPay()) {
        return ; //valid splitpay first
    }
    loadNetbankInstalmentPayInputInfo();
    $("#payType").val(PayTypeOption.netbankInstalment);
    submitForm(PayResultOption.AccountPayResult);
}

/**加载网银分期支付参数*/
function loadNetbankInstalmentPayInputInfo(){
    var cardInfo = $(".netbank-installment-field .pl-item.on .bank-logo");
    $("#cardType").val("1");
    $("#payChannel").val(cardInfo.attr("ccm").split("-")[0]);
    $("#payMethod").val(cardInfo.attr("ccm").split("-")[1]);
    $("#bankCode").val(cardInfo.attr("cd"));
    $("#targetBank").val("0");
    $("#instalmentNum").val($(".netbank-installment-field .fq-list .fq-item.on em b").html());
    $("#downPaymentFlag").val("0");
}