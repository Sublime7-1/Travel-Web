<?php
date_default_timezone_set('PRC');
//发送短信校验码
function sendsphone($p){
    //初始化必填
    //填写在开发者控制台首页上的Account Sid
    $options['accountsid']='4b728d05882e4777d68609df00095c14';
    //填写在开发者控制台首页上的Auth Token
    $options['token']='6e7d2c621e1a0f21dc80685a84a23739';
    //初始化 $options必填
    $ucpass = new Ucpaas($options);
    $appid = "9220f3ec079a4815802bffb1a1902222"; //应用的ID，可在开发者控制台内的短信产品下查看
    $templateid = "412352"; //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
    $param = mt_rand(1000,9999); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
    //存储在cookie
    \Cookie::queue('sms',$param,1);
    $mobile = $p;
    $uid = "";
    //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
    echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}



function pay($order_num,$goods_name,$money,$desc,$id){




        
//↑↑↑↑↑↑↑↑↑↑请在这里配置防钓鱼信息，如果没开通防钓鱼功能，为空即可 ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");

/**************************请求参数**************************/
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $order_num;

        //订单名称，必填
        $subject = $goods_name;

        //付款金额，必填
        $total_fee = $money;

        //商品描述，可空
        $body = $desc;





/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
        "service"       => $alipay_config['service'],
        "partner"       => $alipay_config['partner'],
        "seller_id"  => $alipay_config['seller_id'],
        "payment_type"  => $alipay_config['payment_type'],
        "notify_url"    => $alipay_config['notify_url'],
        "return_url"    => $alipay_config['return_url'],
        
        "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
        "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
        "out_trade_no"  => $out_trade_no,
        "subject"   => $subject,
        "total_fee" => $total_fee,
        "body"  => $body,
        "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
        //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
        //如"参数名"=>"参数值"
        
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;
}


/*********************中文分词*******************************/
function participle($text){

require_once('pscws4/pscws4.class.php');

        // 实例化
        $cws = new PSCWS4();
        //设置字符集
        $cws->set_charset('utf8');
        //设置中华词典（分词的规则）
        $cws->set_dict('../app/Library/pscws4/etc/dict.utf8.xdb');
        //设置utf8规则
        $cws->set_rule('../app/Library/pscws4/etc/rules.utf8.ini');
        //忽略标点符号
        $cws->set_ignore(true);
        //传递字符串
        $cws->send_text($text);
        //获取权重最高的前五个词
        // $ret = $cws->get_tops(5);
        //获取全部的分词结果
        $data=$cws->get_result();
        //关闭
        $cws->close();
        return $data;
}


