@extends('home.member_public.index')
@section('title','安全设置')
@section('main')
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/style/home/p_security/user_account.css">
<style type="text/css">
	.container {
	    width: 1190px;
	    margin: 14px auto;
	    overflow: visible;
	    padding: 0 !important;
	    background-color: transparent;
	}
	.security_level, .secur_icon {
	    background: url(/style/home/p_security/security_theme.png) no-repeat;
	}
	.security_top {
	    height: 144px;
	    width: 100%;
	    background: url(/style/home/p_security/security_level_bg.jpg) no-repeat left top;
	    position: relative;
	    margin-bottom: 30px;
	}
	.icon_yes {
	    display: inline-block;
	    width: 24px;
	    height: 24px;
	    background-position: 0 -313px;
	    vertical-align: middle;
	    margin-left: 30px;
	}
	.icon_now {
	    display: inline-block;
	    width: 24px;
	    height: 24px;
	    background-position: 0 -344px;
	    vertical-align: middle;
	    margin-left: 30px;
	}
</style>
<!--主体内容开始-->
<div class="mainDiv">        
    <div class="detail_title clearfix">
        <div class="detail_sub_title">
            <i></i>账户安全
        </div>
    </div>
    <div class="common_div">
        <div class="security_top clearfix">
            <div class="security_level level_weak" style="background-position:0 -205px">
                <span>安全等级:高</span>
            </div>
            <div class="security_mess">
                <p class="s1">建议您启用全部安全设置，以保障账户安全</p>
                <p class="s2">本次登录：{{date('Y-m-d H:i:s',time())}}　</p>
                <p class="s3">忘记密码？<a href="/home/personalpass/index" class="green">修改密码</a>
            </div>
        </div>
        <div class="security_con">
            <table width="100%">
                <tbody>
                <tr>
                    <td width="100"><span class="secur_icon icon_yes"></span></td>
                    <td width="140">身份认证</td>
                    <td width="450"><span class="grey">身份认证用于提升账户安全性</span></td>
                    <td width="240"></td>
                </tr>
                <tr>
                	<td><span class="secur_icon icon_yes"></span></td>
                    <td>手机验证</td>
                    <!--TODO 这边的逻辑没看懂，后续来解决-->
                    <td><span class="grey">手机{{$phone}}已通过验证</span></td>
                    <td><a href="/home/personalsecurity/changephone">更改手机</a></td>
                </tr>
                <tr>
                    <td><span class="secur_icon icon_yes"></span></td>
                    <td>邮箱验证</td>
                    <td><span class="grey">邮箱{{$email}}已通过验证</span></td>
                    <td><a href="/home/personalsecurity/changeemail">更改邮箱</a></td>
                </tr>

                <tr>
                    <td><span class="secur_icon icon_now"></span></td>
                    <td>注销账户</td>
                    <td><span class="grey">联系客服注销账户</span></td>
                    <td><a href="javascript:;" id="deleteAccount">注销账户</a></td>
                </tr>
            	</tbody>
            </table>
        </div>
    </div>
</div>
<!--主体内容结束-->
<div times="1" id="xubox_shade1" class="xubox_shade" style="z-index:19891015; background-color:#000; opacity:0.3; filter:alpha(opacity=30);display: none;"></div>
<div times="2" showtime="0" style="z-index: 19891017; width: 430px; height: 230px; top: 189px; left: 50%; margin-left: -215px;display: none;" id="xubox_layer2" class="xubox_layer" type="page">
	<div style="background-color:#fff; z-index:19891016" class="xubox_main">
		<div class="xubox_page" style="top: 35px;">
			<div class="xuboxPageHtml">
				<div class="deleteAccountTip">为了您的账户安全，请先将所有订单完成出游，账户余额提现、银行卡解绑，完成后拨打客服电话
				<span class="phone">4007-999999</span>协助注销。
				</div>
			</div>
		</div>
		<div class="xubox_title" style="cursor: move;" move="ok"><em>注销账户</em></div>
		<span class="xubox_setwin"><a class="xubox_close xulayer_png32 xubox_close0" href="javascript:;" style=""></a></span>
		<span class="xubox_botton"><a href="javascript:;" class="xubox_yes xubox_botton1">确定</a></span>
	</div>
	<div id="xubox_border2" class="xubox_border" style="z-index: 19891015; background-color: rgb(0, 0, 0); opacity: 0.2; top: -6px; left: -6px; width: 442px; height: 242px;"></div>
</div>
<script type="text/javascript">
	// alert($('.icon_yes').length);
$(function(){
	// 获取已打勾的安全设置个数
	var num = $('.icon_yes').length; 
	if(num == 1){
		$('.security_level').css('backgroundPosition','0 0');
		$('.security_level span').html('安全等级:低');
	}else if(num == 2){
		$('.security_level').css('backgroundPosition','0 -105px');
		$('.security_level span').html('安全等级:中');
	}else{
		$('.security_level').css('backgroundPosition','0 -205px');
		$('.security_level span').html('安全等级:高');
	}
})
	// 注销账户
	$('#deleteAccount').click(function(){
		$('#xubox_layer2').show();
		$('#xubox_shade1').show();
	})
	$('.xubox_botton').click(function(){
		$('#xubox_layer2').hide();
		$('#xubox_shade1').hide();
	})
	$('.xubox_setwin').click(function(){
		$('#xubox_layer2').hide();
		$('#xubox_shade1').hide();
	})
</script>
@endsection