<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <title>途牛收银台</title>
    <link href="/style/home/order_pay/reset.css" rel="stylesheet">
    <link rel="icon" href="https://ssl.tuniucdn.com/img/20150215/jinrong/licai2/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://ssl.tuniucdn.com/img/20150215/jinrong/licai2/favicon.ico" type="">
    <link rel="stylesheet" type="text/css" href="/style/home/order_pay/pcCheckoutNew-v1.css">
    <link rel="stylesheet" href="/style/home/order_pay/modalLoading_pc.css">
    <script type="text/javascript" src="/style/home/order_pay/jquery.js"></script>
    <script type="text/javascript" src="/style/home/order_pay/tac.js"></script>
    <style>
        .card_installment .fq-list li.show {
            display: block;        }
        .card_installment .fq-list li.hidden{
            display: none;
        }
        .mask{
            width: 100%;
            height: 100%;
            background-color:rgba(0,0,0,0.5);
            z-index: 1000;
            position: fixed;
            top: 0;
            display: none;
        }
        .mask .sfcf_tips{
            background: #fff;
            width: 400px;
            margin: 200px auto;
            padding: 10px;
            text-align: center;
        }
        .mask .sfcf_tips .head{
            font-size: 24px;
            font-weight: bold;
            padding: 0 0 10px 0;
            border-bottom: 1px #efefef solid;
        }
        .mask .sfcf_tips .content{
            padding: 30px 0;
            font-size: 18px;
        }
        .mask .sfcf_tips button{
            background: #f80;
            border: none;
            color: #fff;
            padding: 10px 40px;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
<link type="text/css" rel="stylesheet" href="/style/home/order_pay/layer.css" id="skinlayercss"></head>
<body>  
    <div class="top_box">
    <div class="module clearfix">
        <ul class="user_login fr clearfix">
                        <li><span>8159835813</span>|</li>
            <li><a href="https://cashier.tuniu.com/u/logout" target="_blank">注销</a></li>
        </ul>
    </div>
</div>  <div class="logo_box">
        <div class="module clearfix">
            <div class="logo fl"></div>
            <h3 class="fl">收银台</h3>
        </div>
    </div>


    <div class="pay_box">
        <div class="module">
            <div class="order_field">
                <div class="order_box">
                    <div class="bankOrderInfo clearfix">
                        <div class="fl">
                                <p class="pdt-title">产品名称：&lt;三亚免税店&gt;交通接驳，旅游大巴定点接送</p>
                            <p class="order-info">订单编号：1185874927 | 订单金额：1.00 元 | 已支付：0.00 元</p>
                        </div>
                        <div class="fr pay_money noerma">
<!--                        <div class="fc-tips"><i></i>途牛钱包支付另减元</div> -->
                            <p>应付金额：
                                <span class="price fen f24">1.00</span>
                                <input style="font-size: 1.2rem" placeholder="本次至少支付1,000" onkeyup="value=value.replace(/[^\.\d]/g,'');" onblur="queryActivity()" id="splitAmount" name="splitAmount" type="text" value="1">
                                元
                            </p>
                            <div class="error_info">金额输入错误</div>
                                <a href="javascript:void(0);" m="点击_分次支付" id="splitpay" style="display: none">分次支付</a>
                        </div>
                    </div>
                </div>
                     <p class="pay-tips">请您在提交订单后
                         <span class="timeout" id="orderPayLimitTime">5天8小时33分钟7秒</span>
                         内完成支付，否则订单会自动取消。
                     </p>
            </div>

                    <div class="cont_box mask_box z12 choose_box card_pay_box card_and_wallet">
                            <div class="top-tips clearfix">
                                <div class="fl big-pay" style="display: none;">
                                    <span class="inline">大额支付通道</span>支持<i>5千元</i>以上大额订单一次性支付，安全便捷
                                </div>
                            </div>
                        <div class="choose_pay">
                            <div class="top_title clearfix">
                                <div class="fl left"><span>银行卡</span>
                                        <input type="hidden" id="isQuickPayActivity" name="isQuickPayActivity" _v="0" value="0">
                                        <i class="shortcut-tips">（储蓄卡/信用卡支付 ）</i>
                                </div>
                            </div>
                            <div class="unBind_field active">
                                <div class="input-card-bind mask_box clearfix">
                                    <ul class="line clearfix">
                                        <li class="label">银行卡号</li>
                                        <li><input class="widthL cardInput" onkeyup="value=value.replace(/[^\d\s]/g,'');formateCard(this);" maxlength="23" type="text"></li>
                                        <li>
                                            <a href="javascript:;" m="点击_银行卡_输入卡号_确定">确定</a>
                                        </li>
                                        <li class="ts" style="display: none;">请输入银行卡号</li>
                                    </ul>
                                    <div class="card_info">
                                        <span class="z">◆</span>
                                        <span class="y">◆</span>
                                        <span cpdl="" dpdl="" ct="" class="bank-logo"></span>
                                        <em class="xy-bg card-type-check"></em>
                                    </div>
                                </div>
                                <div class="pay-select mask_box">
                                    <ul class="pay-select-tab clearfix">
                                        <li class="kj-tab on" m="点击_银行卡_选择新银行卡_快捷支付">快捷支付</li>
                                        <li class="wy-tab" m="点击_银行卡_选择新银行卡_网银支付">网银支付</li>
                                    </ul>
                                    <div class="pay-select-con">
                                        <ul class="pl-wrap kj-box clearfix">
                                            @foreach($pay_quickly as $k=>$v)
                                            <li class="pl-item" style="display: list-item;">
                                                <span  class="bank-logo bank-icbc" cd="CBC" style="display:none" ct="3" ccm="23-3" dcm="75-3" cpdl="50000-5000" dpdl="50000-50000">{{$v->name}}</span>
                                                <img style="width:115px;height:35px;margin-left:39px" src="{{$v->img}}" />
                                                <div class="tips">
                                                    <div class="bg"></div>
                                                    <b>支付超限，请选择其他银行卡</b>
                                                </div>
                                                <div class="hover-tips">
                                                    
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="form_box" id="quick_new_form_box">
                                            <ul class="line clearfix">
                                                <li class="label">付款银行</li>
                                                <li class="card_info"><span class="bank-logo bank-njcb">中国工商银行</span>单笔限额 2千 单日限额 5千
                                                </li>
                                                <li class="sbank"><a class="blueBtn" href="javascript:toBankList(0,this);" m="点击_银行卡_选择新银行卡_快捷支付_银行图标_选择其他银行"><img src="/style/home/order_pay/back_blue.png">选择其他银行</a>
                                                </li>
                                            </ul>
                                            <ul class="line clearfix">
                                                <li class="label">卡种</li>
                                                <li class="card_type">
                                                    <input type="radio" checked="checked" value="2" name="cardType" class="cx" id="cardCX" m="点击_银行卡_选择新银行卡_快捷支付_银行图标_储蓄卡">
                                                    <label class="cx_label" for="cardCX">储蓄卡</label>
                                                    <input type="radio" value="1" name="cardType" class="xy" id="cardXY" m="点击_银行卡_选择新银行卡_快捷支付_银行图标_信用卡">
                                                    <label class="xy_label" for="cardXY">信用卡</label>
                                                </li>
                                            </ul>
                                            <div class="shortcut">
                                                <ul class="line clearfix">
                                                    
                                                </ul>
                                                <div class="credit">
                                                    <ul class="line visible clearfix">
                                                        <li class="label">有效期</li>
                                                        <li class="visible clearfix">
                                                            <div class="date_select_box fl z13"><input onkeyup="value=value.replace(/[^\d]/g,'');monthCheck(this);" maxlength="2" onblur="checkNotInput(this,true);" type="text" _id="quick_new" id="quick_new_monthInput"><i class="inline"><b></b></i>
                                                                <dl style="display: none;">
                                                                    <dd>01</dd>
                                                                    <dd>02</dd>
                                                                    <dd>03</dd>
                                                                    <dd>04</dd>
                                                                    <dd>05</dd>
                                                                    <dd>06</dd>
                                                                    <dd>07</dd>
                                                                    <dd>08</dd>
                                                                    <dd>09</dd>
                                                                    <dd>10</dd>
                                                                    <dd>11</dd>
                                                                    <dd>12</dd>
                                                                </dl>
                                                            </div>
                                                            <span class="fl txt">月/</span>

                                                            <div class="date_select_box fl"><input onkeyup="value=value.replace(/[^\d]/g,'');" maxlength="4" onblur="checkNotInput(this,true);" type="text" _id="quick_new" id="quick_new_yearInput"><i class="inline"><b></b></i>
                                                                <dl style="display: none;">
                                                                    <dd>2018</dd>
                                                                    <dd>2019</dd>
                                                                    <dd>2020</dd>
                                                                    <dd>2021</dd>
                                                                    <dd>2022</dd>
                                                                    <dd>2023</dd>
                                                                    <dd>2024</dd>
                                                                    <dd>2025</dd>
                                                                    <dd>2026</dd>
                                                                    <dd>2027</dd>
                                                                    <dd>2028</dd>
                                                                    <dd>2029</dd>
                                                                    <dd>2030</dd>
                                                                    <dd>2031</dd>
                                                                    <dd>2032</dd>
                                                                </dl>
                                                            </div>
                                                            <span class="fl txt">年</span>
                                                        </li>
                                                        <li class="ts">请输入有效期</li>
                                                    </ul>
                                                    <ul class="line  clearfix">
                                                        <li class="label">卡验证码</li>
                                                        <li>
                                                            <input class="valicode widthS " maxlength="3" onkeyup="value=value.replace(/[^\d]/g,'');" onblur="checkNotInput(this,true);" style="width: 200px" type="text" placeholder="请输入信用卡背面后3位数字">
                                                            <input type="hidden" _id="quick_new" id="quick_new_validateInput">
                                                        </li>
                                                        <li class="ts">请输入卡验证码</li>
                                                    </ul>
                                                    <img src="/style/home/order_pay/sytx_shoucikaitong.png" class="sytx_shoucikaitong">
                                                </div>
                                                <div class="user_box">
                                                    <ul class="line clearfix">
                                                        <li class="label">姓名</li>
                                                        <li class="inputLi" style="display: list-item;"><input class="widthS" maxlength="32" onblur="checkNotInput(this);" type="text" id="quick_new_accNameInput">
                                                        </li>
                                                        <li class="ts">请输入姓名</li>
                                                    </ul>
                                                    <ul class="line clearfix">
                                                        <li class="label">证件号</li>
                                                        <li class="inputLi" style="display: list-item;">
                                                            <div class="date_select_box idType fl">
                                                                <input type="text" readonly="readonly" placeholder="请选择" onblur="checkNotInput(this,true);" _id="quick_new" id="quick_new_idTypeInput"><i class="inline"><b></b></i>
                                                                <dl style="display: none;">
                                                                </dl>
                                                            </div>
                                                            <input class="widthL" maxlength="18" onkeyup="value=value.replace(/[^\w\d]/g,'');" onblur="checkNotInput(this,true);" _id="quick_new" type="text" id="quick_new_idCodeInput">
                                                        </li>
                                                        <li class="ts">请输入证件号</li>
                                                    </ul>
                                                </div>
                                                <ul class="line clearfix">
                                                    <li class="label">手机号</li>
                                                    <li><input class="widthS" type="text" maxlength="11" onkeyup="value=value.replace(/[^\d]/g,'');" onblur="checkNotInput(this,true);" _id="quick_new" placeholder="银行存留号码" id="quick_new_phoneNumInput"></li>
                                                    <li class="ts">请输入手机号</li>
                                                </ul>
                                                <div class="keep-common">
                                                    <input type="checkbox" id="keepCommon" checked="checked" m="点击_银行卡_选择新银行卡_快捷支付_银行图标_保存我的常用卡"><label for="keepCommon">保存为我的常用卡</label>
                                                        <a class="blueBtn agreement-link" target="_blank" href="https://ssl.tuniucdn.com/img/20180417/jinrong/files/comdCardAgreement.pdf">《常用卡服务协议》</a>
                                                </div>
                                            </div>
                                            <div class="btn_box clearfix">
                                                <a class="payBtnCom goToBind fl active" href="javascript:newPaySubmit('quick_new')" m="点击_银行卡_选择新银行卡_快捷支付_银行图标_同意开通并支付">同意开通并支付</a>
                                                <span class="pay-enter-tips"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="unexpanded"></div>
                    </div>


                    <div class="cont_box mask_box link_box  other-pay-box active">
                    <div class="pay-other">
                        <div class="top_title clearfix">
                            <div class="fl left"><span>支付平台</span>
                            
                            </div>
                        </div>
                        <div class="pay-other-con hasBind_field active">
                            <ul class="pay-other-list clearfix">
                                @foreach($pay_zfb as $k=>$v)
                                <li>
                                    <a href="javascript:accountpaySubmit(9,16)" m="点击_支付平台_支付宝" class="hidden">
                                        <div class="tips one-line">
                                            <i class="z">◆</i>
                                            <i class="y">◆</i>
                                            <em><img src="{{$v->img}}" alt="">{{$v->name}}快捷支付限额较低，建议您直接使用<strong>途牛钱包或银行卡</strong>完成付款</em>
                                        </div>    
                                             <img src="{{$v->img}}" onclick="tiao()"  style="width:94px;height:35px;margin-left:39px" />                   
                                    </a>
                                </li>
                                @endforeach
                                

                                <script>
                                    function tiao(){
                                        location.href='/home/personal/index/doing_pay/{{$order_id}}';
                                    }
                                </script>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="pay-problem">
                <h3>支付常见问题：</h3>
                <p>
                    1.订单金额超过银行卡支付限额怎么办？<br>
                                 答：银行卡限额是指单笔交易在支付时候的最大额度以及每个月最高的支出金额。如果订单金额超过2万元，推荐您使用途牛钱包或者途牛宝支付来完成交易。<br>
                    <br>
                    2.忘记当前银行卡在银行保存的手机号码怎么办？<br>
                                 答：您可拨打银行客服电话查看或修改银行卡预存手机号码。请明确告诉银行客服是修改该银行卡绑定的手机号码。<br>
                    <br>
                    3.无法收到手机短信校验码怎么办？<br>
                                 答：请确认您当前使用的手机号码和该银行卡在银行预存的手机号码一致。如果不一致，请拨打银行客服热线，修改预存的手机号码。如果一致，可致电客服电话4007-999-999，联系客服处理。<br>
                    <a class="blueBtn" href="javascript:;">更多&gt;&gt;</a>
                    <br>
                    4、网上银行重复付款了该怎么办？<br>
                                 答：因银行未及时传输数据导致，请联系客服，我们与银行核对后，会将重复支付的款项退至您的原支付银行卡中。<br>
                    <br>
                    5.使用网银支付失败怎么办？<br>
                                 答：（1）根据报错提示进行处理。<br>
                                         （2）如果报错信息不明确，请确认填写信息是否正确、是否超过您银行卡的交易限额、是否开通网银支付功能等。<br>
                                         （3）上述问题均排除后，烦请更换其他浏览器支付；如仍无法支付可致电4007-999-999，联系客服处理。<br>
                    <br>
                    6、银行卡或者账户已被扣款，但是订单仍然是“未付款”，怎么办？<br>
                                 答：因银行未及时传输数据导致，可稍后刷新页面查看，如长时间仍显示“未付款”，可致电客服电话4007-999-999，联系客服处理。<br>
                    <br>
                    7、支付总是失败，常见的原因有哪些？<br>
                                 答：（1）若您的银行卡未开通网上支付功能，无法进行在线支付，请拨打银行客服热线，咨询开通网上支付流程，进行开通。<br>
                                        （2）银行卡已过期、作废、挂失或者余额不足，限额超限等，建议您拨打银行客服热线咨询。<br>
                                        （3）输入的银行卡号、密码或证件号等与预置的不符，建议您重新输入正确的卡密码或证件号等，如果您忘记了密码，请您及时与所属银行联系办理密码重置。<br>
                                        （4）银行系统数据传输出现异常。<br>
                                        （5）网络中断。
                </p>
            </div>
        </div>

    </div>
    
    <div class="pay_footer">
    <a class="blueBtn" href="http://www.atsec.cn/cn/pci-attestation/TUNIU-FINANCE-PCIAttestation-atsec-PCI-DSS-C-01489.jpg" target="_blank"><img src="/style/home/order_pay/atsecPCILogo_pc.jpg"></a>
    <br>Copyright@2006-2018 途牛旅游网 tuniu.com
    </div>
    <div class="pop_box">
        <div class="backg"></div>
        <div class="pop_win">
            <div class="head"><span>登录网上银行支付</span><img class="close" src="/style/home/order_pay/pop_close.png">
            </div>
            <p>请您在新打开的网上银行页面进行支付，<br>
                支付完成前不要关闭该窗口</p>
            <div class="butg"><a class="pop_btn confirm mar hover" href="#">已完成支付</a><a class="pop_btn other hover" href="#">用其他支付方式</a></div>
        </div>
    </div>
    <div class="loading_box">
        <div class="backg"></div>
        <img src="/style/home/order_pay/loading-72x72.gif" alt="">
    </div>
    <div class="mask">
        <div class="sfcf_tips">
            <div class="head">提示</div>
            <div class="content">
                <div>首付出发账户认证失效，请重新认证</div>
                <p style="font-size: 14px;color: red;">(注：请在15分钟内完成认证支付)</p>
            </div>
            <button onclick="sfcfMaskHide()">确认</button>
        </div>
    </div>
    <form id="authForm">
                <input type="hidden" id="fcActivityFlag" value="">
                <input type="hidden" id="random" value="">
                <input type="hidden" id="amount" name="amount" value="1.00">
                <input type="hidden" id="bizOrderId" name="bizOrderId" value="1185874927">
                <input type="hidden" id="payChannel" name="payChannel" value="1">
                <input type="hidden" id="payMethod" name="payMethod" value="2">
                <input type="hidden" id="cardType" name="cardType" value="">
                <input type="hidden" id="payPlatform" name="payPlatform" value="10001">
                <input type="hidden" id="channelSmsId" value="">
                <input type="hidden" id="bankCode" value="">
                <input type="hidden" id="isBindCard" value="0">
                <input type="hidden" id="targetBank" value="0">
                <input type="hidden" id="orderId" name="orderId" value="63442502">
                <input type="hidden" id="orderType" value="2">
                <input type="hidden" id="splitOrderFlag" value="2">
                <input type="hidden" id="splitAvailFlag" name="splitAvailFlag" value="0">
                <input type="hidden" id="smstoken" name="smstoken" value="">
                <input type="hidden" id="activityFlag" name="activityFlag" _v="" value="">
                <input type="hidden" id="tnWalletFlag" name="tnWalletFlag" value="0">
                <input type="hidden" id="discountAmount" name="discountAmount" value="">
                <input type="hidden" id="authCode" name="authCode" value="">
                <input type="hidden" id="cardNo" name="cardNo" value="">
                <input type="hidden" id="phoneNum" name="phoneNum" value="">
                <input type="hidden" id="accName" name="accName" value="">
                <input type="hidden" id="idType" name="idType" value="0">
                <input type="hidden" id="idCode" name="idCode" value="">
                <input type="hidden" id="creditValidity" name="creditValidity" value="">
                <input type="hidden" id="creditCVV" name="creditCVV" value="">
                <input type="hidden" id="useCert" name="useCert" value="0">
                
                <input type="hidden" id="creditAvailFlag" name="creditAvailFlag" value="0">
                <input autocomplete="off" type="hidden" id="downPaymentFlag" name="downPaymentFlag" value="0">
                <input type="hidden" id="downPayment" name="downPayment" value="">
                <input type="hidden" id="needDownpayment" name="needDownpayment" value="">
                <input type="hidden" id="term" name="term" value="">
                <input type="hidden" id="installment" name="installment" value="">
                <input type="hidden" id="fee" name="fee" value="">
                <input type="hidden" id="bizType" name="bizType" value="">
                <input type="hidden" id="baiTiaoBalanceFlag" name="baiTiaoBalanceFlag" value="0">
                <input type="hidden" id="buttonType" name="buttonType" value="">
                <input type="hidden" id="payedAmount" name="payedAmount" value="0">
                <input type="hidden" id="remainAmount" name="remainAmount" value="1.00">
                <input type="hidden" id="instalmentNum" name="instalmentNum" value="">
                <input type="hidden" id="splitFlag" name="splitFlag" value="0">
                <input type="hidden" id="discountAmount" name="discountAmount" value="0">
                <input type="hidden" id="applicant" name="applicant" value="0">
                <input type="hidden" id="applicantIdCard" name="applicantIdCard" value="0">
                <input type="hidden" id="tourPath" name="tourPath" value="">
                <input type="hidden" id="splitTextForBank" name="splitTextForBank" value="银行额度受限，无法一次支付，推荐使用“分次支付”">
                <input type="hidden" id="walletTextForBank" name="walletTextForBank" value="银行额度受限，无法一次支付，推荐使用“途牛钱包”">
                <input type="hidden" id="otherTextForBank" name="otherTextForBank" value="银行单笔限额不足，支付超限！请选择其他银行">
                <input type="hidden" id="splitTextForBindCard" name="splitTextForBindCard" value="银行额度受限，无法一次支付，推荐使用“分次支付”">
                <input type="hidden" id="walletTextForBindCard" name="walletTextForBindCard" value="银行额度受限，无法一次支付，推荐使用“途牛钱包”">
                <input type="hidden" id="tradeRequestNo" name="tradeRequestNo" value="CA00017524130">
    </form>
    <input type="hidden" id="orderInfoUrl" name="orderInfoUrl" value="http://www.tuniu.com/u/order">
    <input type="hidden" id="cardBinQueryResult" name="cardBinQueryResult" value="99">
    <input type="hidden" id="payType" name="payType" value="">
    <input type="hidden" id="activityDesc" name="activityDesc" value="">
    <input type="hidden" id="discountAmountQuickPay" name="discountAmountQuickPay" value="0">

<script src="/style/home/order_pay/payInteraction-v1.js"></script>

<script type="text/javascript" src="/style/home/order_pay/Base64.js"></script>
<script type="text/javascript" src="/style/home/order_pay/pc_cashier.js"></script>
<script type="text/javascript" src="/style/home/order_pay/pc_instalment.js"></script>
<script type="text/javascript" src="/style/home/order_pay/pc_timer.js"></script>
<script type="text/javascript" src="/style/home/order_pay/cashier.js"></script>
<script type="text/javascript" src="/style/home/order_pay/utils.js"></script>
<script src="/style/home/order_pay/layer.js"></script>
<script>
    // 埋点
    var PageName = "PC:预订流程:途牛pc收银台:品类=新零售平台订单:订单编号=1185874927";
    analysisPage(PageName);
    $(document).ready(function(){
        var nowTime = new Date();
        refreshToPayAmount();
        showerma();
    });
    var contextPath = "";
    var minSingleAmount="1,000";
    var payMinSingleAmount =Number(minSingleAmount.replace(/,/g,"") ) ;
    var isBindCard = parseInt("0");
    var isWalletBindCard =parseInt("1");
    var isAuth = "";
    var hasBindCreditInstallment = $(".credit-installment-field .bank_select_list .card_info").length>0 ? 1 : 0;
    var isSupportFc = parseInt("0");
    var bigPayLines = parseInt("5000");
    var walletMaxLimit = parseInt("0");
    var isSupportSfcf = parseInt("0");
    if (bigPayLines == 0) {
        $(".big-pay i").text("2万元");
    } else if (bigPayLines < 10000) {
        $(".big-pay i").text(parseInt("5000")/1000 + "千元");
    } else {
        $(".big-pay i").text(parseInt("5000")/10000 + "万元");
    }
     
    
    //清位时间计时器
    var orderLimitTime = parseInt('462818');
    if(orderLimitTime != -1){
        clearedTimer.init(orderLimitTime, "63442502");
        clearedTimer.start();
    }

    /**/
    if(hasBindCreditInstallment == 0){
        $(".credit-installment-field .hasBind_field .choose_bank").remove();
        $(".credit-installment-field .hasBind_field .form_box").remove();
        $(".card_installment .top_title .left  a.goMyCard").remove();
    }
    //  是否有分期信息
    var creditInstallmentInfoJson = '[]';
    var creditInstallmentInfo = eval(creditInstallmentInfoJson);
    //是否为促销订单
    var isPromotion=''||"";
    var netbankInstallmentInfoJson = '';
    var netbankInstallmentInfo = eval(netbankInstallmentInfoJson);

    //第三方分期银行列表
    var thirdpartyInstallmentInfo = "";
    //出游人信息
    var thirdpartyItmApplicantInfo = "";
    //bank Cert List
    var certIdtypes={1:"身份证",2:"护照",3:"军官证",4:"回乡证",5:"台胞证"};
    var cardCertTypes = '[{"id":1,"payChannel":10,"payMethod":3,"idTypes":"1,2,3,4,5","status":1},{"id":2,"payChannel":23,"payMethod":3,"idTypes":"1,2,4,5","status":1},{"id":3,"payChannel":75,"payMethod":3,"idTypes":"1,2,3,4,5","status":1},{"id":4,"payChannel":79,"payMethod":3,"idTypes":"1,2,4,5","status":1},{"id":5,"payChannel":81,"payMethod":3,"idTypes":"1","status":1},{"id":6,"payChannel":10,"payMethod":21,"idTypes":"1,2","status":1},{"id":7,"payChannel":109,"payMethod":3,"idTypes":"1,2,3","status":1},{"id":8,"payChannel":105,"payMethod":3,"idTypes":"1,2,3,4,5","status":1},{"id":9,"payChannel":182,"payMethod":3,"idTypes":"1,2,4,5","status":1}]';
    var cardCertTypeList = eval(cardCertTypes);
    //定义免息分期对象
    var freeInterest='';
    //cvv2的加密处理
    $(".valicode").blur(function () {
        var reg=/[^*]/g;
        $(this).next().val($(this).val());
        var str=$(this).val().replace(reg,"*");
        $(this).val(str);
    });
    //首付出发地址
    if($("#sfAgreement")){
        $("#sfAgreement").attr("href","63442502/new?callbackUrl="+window.location.href);
    }
    $(function(){
    /*收银台交互*/
        new payInteraction({
            hasBindTnWallet: isWalletBindCard,
            hasBindCard: isBindCard,
            isAuth: isAuth,
            hasBindCreditInstallment : hasBindCreditInstallment,
            thirdpartyItmApplicantInfo: thirdpartyItmApplicantInfo,
            isSupportSfcf: isSupportSfcf,//是否支持首付出发
            isSupportFc:  isSupportFc,//是否支持分次支付
            walletMaxPay: walletMaxLimit,//钱包最大限额
            bigPayLines: bigPayLines,//大额支付标准
            isCollapse : 0,
            recommendWalletTxt: $("#walletTextForBank").val(),
            recommendFCTxt: $("#splitTextForBank").val(),
            bankLimit: function ($cardInfo) {
                //点击银行卡，把限额传入表单
                var limitStr = "单笔限额 " + $cardInfo.attr("dpdl").split("-")[0] + " 单日限额 " + $cardInfo.attr("dpdl").split("-")[1];
                return limitStr;
            },
            cutBankLimit: function ($cardInfo, $radio) {
                //储蓄和信用单选框切换时，银行限额变化
                var limitStr = "";
                if ($cardInfo.attr("dpdl") != null) {
                    if ($radio.hasClass("cx")) {
                        limitStr = "单笔限额 " + $cardInfo.attr("dpdl").split("-")[0] + " 单日限额 " + $cardInfo.attr("dpdl").split("-")[1];
                    } else if ($radio.hasClass("xy")) {
                        limitStr = "单笔限额 " + $cardInfo.attr("cpdl").split("-")[0] + " 单日限额 " + $cardInfo.attr("cpdl").split("-")[1];
                    }
                }
                return limitStr;
            },
            cancleFcPay :function(){
                //取消分次支付
                if($("#splitOrderFlag").val() == "1"){
                    $("#orderType").val("1");
                }
                var $splitError = $(".bankOrderInfo .pay_money .error_info");
                $splitError.html("");
                $splitError.hide();
                $("#splitAmount").val($("#remainAmount").val());
                queryActivity();
                refreshToPayAmount();
                $("#splitFlag").val(0);
                refreshWalletActivityInfo();
                $(".order_box .pay_money").removeClass("fc-pay");
                $("#splitpay").attr("m", "点击_分次支付");
            },
            getFcPay :function(){
                //使用分次支付
                $("#orderType").val("2");
                $("#splitAmount").val($("#remainAmount").val());
                $("#splitAmount").focus(); // on focus
                $("#splitFlag").val(1);
                refreshWalletActivityInfo();
                $(".order_box .pay_money").addClass("fc-pay");
                $("#splitpay").attr("m", "点击_分次支付_取消");
            },
            checkFormShow :function($field){
                //控制表单显示内容
                var $form = $field.find(".form_box");
                var $cardInfo = $form.find(".card_info span");
                if($cardInfo.attr("ct") == 1){
                    //只支持信用卡
                    $form.find(".card_type label").show();
                    $form.find(".card_type input").show();
                    $form.find(".card_type .cx").hide();
                    $form.find(".card_type .cx_label").hide();
                    $form.find(".card_type .xy").trigger("click").hide().addClass("disable");
                } else if($cardInfo.attr("ct") == 2){
                    //只支持储蓄卡
                    $form.find(".card_type label").show();
                    $form.find(".card_type input").show();
                    $form.find(".card_type .xy").hide();
                    $form.find(".card_type .xy_label").hide();
                    $form.find(".card_type .cx").trigger("click").hide().addClass("disable");
                } else {
                    //储蓄卡，信用卡都支持
                    $form.find(".card_type label").show();
                    $form.find(".card_type input").show().removeClass("disable").first().trigger("click");
                }
                //无实名信息则显示输入框
                if(isAuth == ""){
                    $form.find(".inputLi").show();
                }
                $(".form_box .wy-pay").off("click").on("click",function(){
                    netbankPaySubmit("quick_new");
                })
            },
            getActivityPay :function($obj){
                if($("#fcActivityFlag").val()== "1" || $("#fcActivityFlag").val() == 1){
                    $("#activityFlag").val($obj.attr("atty"));
                    if($("#activityFlag").val() == "1" || $("#activityFlag").val() == 1){
                        $obj.parents(".tn_wallet_box").removeClass("noActivity");
                    }else {
                        $obj.parents(".tn_wallet_box").addClass("noActivity");
                    }
                }
                refreshWalletActivityInfo();
            },
            selectTnWallet : function() {
                $("#tnWalletFlag").val(1);
                refreshToPayAmount();
                refreshWalletActivityInfo();
            },
            cancleTnWallet : function() {
                $("#tnWalletFlag").val(0);
                refreshToPayAmount();
                if ($("#splitFlag").val() == 0) {
                    if ($("#downPaymentFlag").val() == "1") {
                        $("#splitAmount").val($("#needDownpayment").val());
                    } else {
                        $("#splitAmount").val($("#remainAmount").val());
                    }
                }
                refreshWalletActivityInfo();
            },
            createFqSelectInfo: function($obj){
                //首付分期选择信息
                $("#downPaymentFlag").val(1);
                $("#downPayment").val($obj.attr("downPayment"));
                $("#needDownpayment").val($obj.attr("needDownpayment"));
                $("#term").val($obj.attr("term"));
                $("#installment").val($obj.attr("installment"));
                $("#fee").val($obj.attr("fee"));
                $("#bizType").val($obj.attr("bizType"));
                
                var needDownpayment = $obj.attr("needDownpayment");
                var isZeroPay = (needDownpayment == "0.00" || needDownpayment == "0" || needDownpayment == "0.0");
                if(isZeroPay){
                    $("#splitAmount").val(parseFloat($(".bankOrderInfo .pay_money .fen").html()));
                }else {
                    $("#splitAmount").val($obj.attr("needDownpayment"));
                }
              
                refreshToPayAmount();

                if($obj.hasClass('hui')){
                    $("#sf_hui").show();
                }else {
                    $("#sf_hui").hide();
                }
                return  "已选择" + $obj.attr("termStr")  + "｜"+ $obj.attr("feeStr")+"｜"+$obj.attr("feeRateStr") ;
            },
            isZeroPay: function($obj){
                //判断是否0首付
                var needDownpayment = $obj.attr("needDownpayment");
                var isZeroPay = (needDownpayment == "0.00" || needDownpayment == "0" || needDownpayment == "0.0");
                if(!isZeroPay){
                    queryActivity();
                    refreshToPayAmount();
                }
                refreshWalletActivityInfo();
                return isZeroPay;
            },
            cancleSfcf: function(){
                //退出首付出发
                $("#downPaymentFlag").val(0);
                $("#downPayment").val();
                $("#needDownpayment").val();
                $("#term").val();
                $("#installment").val();
                $("#fee").val();
                $("#bizType").val();
                refreshToPayAmount();
                $("#sf_hui").hide();
                $("#splitAmount").val(parseFloat($(".bankOrderInfo .pay_money .fen").html()));
                queryActivity();
            },
            loadInstallmentSelect: function(cardClass, bindEvent, self, $field){
                var amount = $("#splitAmount").val();
                var installmentInfo = null;
                if($field.hasClass("credit-installment-field")){
                    //确定为信用卡分期支付
                    installmentInfo = creditInstallmentInfo;
                }else if($field.hasClass("thirdparty-installment-field")){
                    installmentInfo = thirdpartyInstallmentInfo;
                }else if($field.hasClass("netbank-installment-field")){
                    installmentInfo = netbankInstallmentInfo;
                }
                //加载信用卡分期选项
                bankName = $('.credit-installment-field').find('.' + cardClass).text();
                for(var i = 0; i < installmentInfo.length; i++){
                    if("bank-" + installmentInfo[i].bankCode.toLowerCase() == cardClass){
                        var installmentSelectArr = installmentInfo[i].installmentList;
                        var installmentSelect = "";
                        if(isPromotion=="true"){
                            for(var k = 0; k < installmentSelectArr.length; k++){
                                if(installmentSelectArr[k].rate<0){
                                    freeInterest=installmentSelectArr[k];
                                    break;
                                }
                            }
                        }
                        //优先分期条件
                        var primaryInstallment=null;
                        //存在免手续费的对象
                        if(freeInterest!=''&&isPromotion=="true"){
                            analysisText = '点击_银行卡分期_' + bankName + '_' + freeInterest.instalmentNum + '期';
                            if(installmentInfo[i].poundageType == 0) {
                                var poundage = 0;
                                var payEveryMonth=amount/freeInterest.instalmentNum;
                                installmentSelect += '<li class="fq-item clearfix " m="' + analysisText + '"><em><b rate="'+ (freeInterest.rate*100).toFixed(2) +'">' + freeInterest.instalmentNum + '</b>期</em><p><span style="color: red;font-weight: bold">0 </span>元/期+'+payEveryMonth.toFixed(2)+'元 /期</p></li>';
                            }else {
                                var poundage = 0;
                                var payEveryMonth = amount/freeInterest.instalmentNum;
                                installmentSelect += '<li class="fq-item clearfix " m="' + analysisText + '"><em><b rate="'+ (freeInterest.rate*100).toFixed(2) +'">' + freeInterest.instalmentNum + '</b>期</em><p><span style="color: red;font-weight: bold">0 </span>元+'+payEveryMonth.toFixed(2)+'元 /期</p></li>';
                            }
                        }else{
                            for(var j = 0; j < installmentSelectArr.length; j++){
                                analysisText = '点击_银行卡分期_' + bankName + '_' + installmentSelectArr[j].instalmentNum + '期';
                                if(installmentSelectArr[j].primary==1){
                                    primaryInstallment=j;
                                }
                                //0:分期付手续费；1：一次性付手续费
                                if(installmentInfo[i].poundageType == 0) {
                                    var poundage = amount*(installmentSelectArr[j].rate*1+1)/installmentSelectArr[j].instalmentNum;//需计算
                                    installmentSelect += '<li class="fq-item clearfix" m="' + analysisText + '"><em><b rate="'+ (installmentSelectArr[j].rate*100).toFixed(2) +'">' + installmentSelectArr[j].instalmentNum + '</b>期</em><p>'+poundage.toFixed(2)+'元 /期</p></li>';
                                } else {
                                    var poundage = amount*installmentSelectArr[j].rate;
                                    var payEveryMonth = amount/installmentSelectArr[j].instalmentNum;
                                    installmentSelect += '<li class="fq-item clearfix " m="' + analysisText + '"><em><b rate="'+ (installmentSelectArr[j].rate*100).toFixed(2) +'">' + installmentSelectArr[j].instalmentNum + '</b>期</em><p>'+poundage.toFixed(2)+'元+'+payEveryMonth.toFixed(2)+'元 /期</p></li>';
                                }
                            }
                        }
                        $field.find(".fq-list").html(installmentSelect);
                        bindEvent(self);
                        if(primaryInstallment){
                            $field.find(".fq-list .fq-item:eq("+primaryInstallment+")").trigger("click");
                        }else{
                            $field.find(".fq-list .fq-item:first").trigger("click");
                        }
                        break;
                    }
                }
                $('.credit-installment-field .next').attr("m", "点击_银行卡分期_" + bankName + "_下一步");
                $('.credit-installment-field .goToBind').attr("m", "点击_银行卡分期_" + bankName + "_下一步_确认支付");
            },
            createCardFqSelectInfo: function(cardClass, installmentNum, rate, $field){
                //信用卡分期选择信息
                var returnInfo = "";
                var amount = $("#splitAmount").val();
                var poundage = amount*rate/100/installmentNum;//需计算

                if($field.hasClass("credit-installment-field")){
                    var poundageType = -1;
                    for(var i = 0;i < creditInstallmentInfo.length;i++){
                        if("bank-" + creditInstallmentInfo[i].bankCode.toLowerCase() == cardClass){
                            poundageType = creditInstallmentInfo[i].poundageType;
                            break;
                        }
                    }
                    if(poundageType == 0&&freeInterest==""){
                        returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜每期含分期手续费" + poundage.toFixed(2) + "元｜分期服务费率" + rate + "% ";
                    }else if(poundageType == 0&&freeInterest!=""&&isPromotion=="true"){
                        returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜<a href='javascript:void(0)' style='color: red;'>减免</a>手续费" + (-poundage*installmentNum).toFixed(2) + "元｜分期服务费率" + (-rate) + "% ";
                    }else if(poundageType == 1&&freeInterest==""){
                        returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜一次性收取手续费" + (poundage*installmentNum).toFixed(2) + "元｜分期服务费率" + rate + "% ";
                    }else if(poundageType == 1&&freeInterest!=""&&isPromotion=="true"){
                        returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜一次性<a href='javascript:void(0)' style='color: red;'>减免</a>手续费" + (-poundage*installmentNum).toFixed(2) + "元｜分期服务费率" + (-rate) + "% ";
                    }
                }else if($field.hasClass("thirdparty-installment-field")){
                    returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜每期含分期手续费" + poundage.toFixed(2) + "元｜分期服务费率" + rate + "% ";
                }else if($field.hasClass("netbank-installment-field")){
                    var poundageType = -1;
                    for(var i = 0;i < netbankInstallmentInfo.length;i++){
                        if("bank-" + netbankInstallmentInfo[i].bankCode.toLowerCase() == cardClass){
                            poundageType = netbankInstallmentInfo[i].poundageType;
                            break;
                        }
                    }
                    if(poundageType == 0){
                        returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜每期含分期手续费" + poundage.toFixed(2) + "元｜分期服务费率" + rate + "% ";
                    }else if(poundageType == 1){
                        returnInfo = "<em>已选择分</em><i>" + installmentNum + "期</i>｜一次性收取手续费" + (poundage*installmentNum).toFixed(2) + "元｜分期服务费率" + rate + "% ";
                    }
                }

                return returnInfo;
            },
            checkCardID: function(){
                var cardNo  = $(".input-card-bind .cardInput").val().replace(/\s+/g, "");
                return queryBankInfo(cardNo, true);
            },
            getCredentialList: function($radio){
            //根据银行获取证件列表
            var $box = $radio.parents(".form_box");//表单
            var $cardInfo = $box.find(".card_info .bank-logo");//银行
            var $paperBox = $box.find(".date_select_box.idType dl");
            if ($radio.hasClass("cx")) {
                var pay_channel =$cardInfo.attr("dcm")?$cardInfo.attr("dcm").split("-")[0]:"";
                var pay_method =$cardInfo.attr("dcm")?$cardInfo.attr("dcm").split("-")[1]:"";
                $paperBox.html(getCardCertType(pay_channel,pay_method)).find("dd").eq(0).trigger("click");
            }else if ($radio.hasClass("xy")) {
                var pay_channel =$cardInfo.attr("ccm")?$cardInfo.attr("ccm").split("-")[0]:"";
                var pay_method = $cardInfo.attr("ccm")?$cardInfo.attr("ccm").split("-")[1]:"";
                $paperBox.html(getCardCertType(pay_channel,pay_method)).find("dd").eq(0).trigger("click");
            }
        },
            getCardInfo: function(obj, self, _canInputCardSupportPay) {
                var cardNo  = obj.value.replace(/\s+/g, "");
                if (cardNo.length < 10) {
                    resetCardBin(CardBinQueryResult.SysError, "", false);
                } else if ($("#cardBinQueryResult").val() == -1 || $("#cardBinQueryResult").val() == 99 || $(".input-card-bind .card_info").css('display') == "none") {
                    queryBankInfo(cardNo, false);
                    var payNum = $("#splitAmount").val();//获取当前要支付的金额
                    _canInputCardSupportPay(payNum, self);
                }
            },
            changeNeedPayNum: function(payNum){
                //更改应付金额
                $("#splitAmount").val(payNum);
            }
        });
        //初始化分次支付
        initSpliPayInfo();
        $(".choose_box .unBind_field .pay-select-tab").each(function(){
            $(this).find("li").eq(0).trigger("click");
        });
             
        $(".shoufuchufa .pay-enter .payBtnCom.active").click(function(){
            refreshToPayAmount();
            SFSubmit();
            return false;
        })
    });

    //广发第三方分期支持银行弹框
    $(".pay-enter .card-" +
            " i").click(function () {
        $(".pop_box .pop_win").addClass("big").html('<div class="head"><span>支持广发银行分期开户行</span><img class="close" src="https://ssl.tuniucdn.com/img/20160308/jinrong/licai2/checkout/pop_close.png"></div>' +
        '<ul class="pl-wrap clearfix">' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-boc">中国银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-ccb">中国建设银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-abc">中国农业银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-szpab">平安银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-cmbc">中国民生银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-spdb">浦发银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-citic">中信银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-ceb">中国光大银行</span>' +
        '</li>' +
        '<li class="pl-item">' +
        '<span class="bank-logo bank-bjrcb">北京农商银行</span>' +
        '</li>' +
        '</ul>' +
        '<div class="butg"><a class="pop_btn confirm hover" href="javascript:;">确认</a></div>');
        $(".pop_box .pop_win").off("click").on("click", ".head img, .confirm", function () {
            $(".pop_box").hide();
            $(".pop_box .pop_win").removeClass("big");
        });
        $(".pop_box").show();
        verticalPop();
    });
    
    //点击支付平台弹框
    $(".other-pay-box .unexpanded").click(function (e) {
        e.stopPropagation();
        if (bigPayLines !=0 && parseInt($("#splitAmount").val()) > bigPayLines) {
            $(".pop_box .pop_win").html('<div class="head"> <span>是否选择支付平台进行支付</span><img class="close" src="https://ssl.tuniucdn.com/img/20160308/jinrong/licai2/checkout/pop_close.png"></div>' +
                '<div class="butg"><a class="pop_btn confirm mar hover" href="javascript:;">确认</a><a class="pop_btn other hover" href="javascript:;">取消</a></div>');
            $(".pop_box .pop_win").off("click").on("click", ".pop_btn.confirm", function () {
                $(".pop_box").hide();
                $('.other-pay-box').addClass('active').find('.hasBind_field').addClass('active');
            });
            //支付平台弹出弹框之后，点击确认跳转
            $(".pop_box .pop_win .pop_btn.other").on("click",function () {
                $(".pop_box").hide();
                $('.other-pay-box').removeClass('active').find('.hasBind_field').removeClass('active');
            });
            $(".pop_box .pop_win .head img").on("click", function () {
                $(".pop_box").hide();
                $('.other-pay-box').removeClass('active').find('.hasBind_field').removeClass('active');
            });
            $(".pop_box").show();
            verticalPop();
        } else {
            $('.choose_box').removeClass('active');
            $('.other-pay-box').addClass('active').find('.hasBind_field').addClass('active');
        }
    });
    
    //支付平台鼠标移动事件
    $(".pay-other-list a").mouseover(function () {
        tipsNode = $(this).find(".tips");
        if (tipsNode != null && tipsNode != undefined && tipsNode.length > 0 && $(this).hasClass("visible")) {
            upTipsNode = $(this).find(".up_tips");
            if (upTipsNode != null && upTipsNode != undefined && upTipsNode.length > 0) {
                upTipsNode.hide();
            }
        }
    });
    $(".pay-other-list a").mouseout(function () {
        upTipsNode = $(this).find(".up_tips");
        if (upTipsNode != null && upTipsNode != undefined && upTipsNode.length > 0) {
            upTipsNode.show();
        }
    });
    //切换首付出发分期
    $(".fq-item").on("click",function () {
        //判断是否0首付
        var needDownpayment = $(this).attr("needDownpayment");
        var isZeroPay = (needDownpayment == "0.00" || needDownpayment == "0" || needDownpayment == "0.0");
        if(!isZeroPay){
            sfcfIsZeroPay=false
        }else {
            sfcfIsZeroPay=true
        }
        if(!isVerifySfcf&&!sfcfIsZeroPay){
            sfcfVerifySend();
        }
    })
    function checkNotInput(obj,flag) {
        var $this = $(obj);
        if ($this.val() == "") {
            $this.addClass("error hui-shake").parents("ul").find(".ts").text("请输入" + $this.parents("ul").find(".label").text()).show();
        }
        else {
            $this.removeClass("error hui-shake").parents("ul").find(".ts").hide();
        }
        if(flag){

            var result = quickpayCheckNull($this.attr('_id'));
            if (result.success) {
                if ($this.attr('_id') == "instalment_new") {
                    $("#instalmentBtn").addClass("active").attr("href","javascript:instalmentPaySubmit('"+$this.attr('_id')+"');");
                } else if ($this.attr('_id') == "thirdParty_instalment_bind") {
                    $("#instalmentBtn").addClass("active").attr("href","javascript:thirdPartyInstalmentPaySubmit('"+$this.attr('_id')+"');");
                }
            } else {
                if ($this.attr('_id') != "quick_new") {
                    $("#instalmentBtn").removeClass("active").attr("href","javascript:void(0);");
                }
            }
        }
    }

    function replaceIlegalParam(obj){
        var $this = $(obj);
        if($this.attr('readonly')=='readonly'){
            return;
        }else {
            var valueOrgin = $this.val();
            $this.val(valueOrgin.replace(/[^\w\d]/g, ''));
        }
    }
    function getCardCertType(cl,md) {
        for(var i=0; i<cardCertTypeList.length;i++){
            var  certTypes = cardCertTypeList[i];
            if(certTypes.payChannel==cl && certTypes.payMethod==md){
                var idTypes= certTypes.idTypes.split(",");
                var idTypeHtml = '<dd class="cur">'+certIdtypes[idTypes[0]]+'</dd>';
                for (var index=1;index<idTypes.length;index++){
                    idTypeHtml +='<dd >'+certIdtypes[idTypes[index]]+'</dd>';
                }
                return idTypeHtml;
            }
        }
        return '<dd class="cur">身份证</dd>';
    }
      function checkunBindXP() {
        //未绑卡小浦协议勾选校验
        if($("#xp_agreement_unbind").length>0&&(!($("#xp_agreement_unbind").attr("checked")=="checked"))){
            $("#ts_agreement_unbind").show();
            return;
        }else{
            $("#ts_agreement_unbind").hide();
        }

    }
    function checkhasBindXP () {
        //已绑卡小浦协议勾选校验
        if($("#xp_agreement_hasbind").length>0&&(!($("#xp_agreement_hasbind").attr("checked")=="checked"))){
            $("#ts_agreement_hasbind").show();
            return;
        }else{
            $("#ts_agreement_hasbind").hide();
        }
    }
    function sfcfMaskHide() {
        window.location.href=MainUrl+contextPath+"/cashier/"+$("#orderId").val();
    }
</script>

<div style="visibility: hidden; position: absolute;" id="userdata_el"></div></body></html>