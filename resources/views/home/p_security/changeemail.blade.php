@extends('home.member_public.index')
@section('title','修改邮箱')
@section('main')
<link rel="stylesheet" type="text/css" href="/style/home/p_security/user_verification.css">
<style type="text/css">
	.container {
	    width: 1190px;
	    margin: 14px auto;
	    overflow: visible;
	    padding: 0 !important;
	    background-color: transparent;
	}
	.veri_icon {
	    background: url(/style/home/p_security/user_veri.png) no-repeat;
	}
	.icon_yp {
	    width: 42px;
	    height: 50px;
	    background-position: 0 -209px;
	}
	.icon_np {
	    width: 40px;
	    height: 50px;
	    background-position: 0 -266px;
	}
	.veri_step_pic {
	    background: url(/style/home/p_security/verification_tit.png) no-repeat;
	    width: 560px;
	    height: 20px;
	    margin-bottom: 5px;
	}
</style>
<div class="mainDiv">        
    <div class="detail_title clearfix">
        <div class="detail_sub_title fl">
            <i></i>修改邮箱
        </div>
    </div>
    <div class="common_div">
        <div class="veri_box">
            <div>请先确认当前绑定的邮箱 <span class="yh f16">{{$email}}</span>是否能接收邮件，再选择修改方式：</div>
            <ul class="style_list">
                <li class="clearfix">
                    <span class="veri_icon icon_yp fl"></span>
                    <div class="fl">
                        <p class="s1">能接收邮件</p>
                        <p class="s2">如果原邮箱能接收邮件，请选择此方式</p>
                    </div>
                    <div class="fr">
                        <a href="javascript:;" id="change" rel="nofollow" class="veri_btn veri_yellow_btn">立即修改</a>
                    </div>
                </li>
                <li class="clearfix">
                    <span class="veri_icon icon_np fl"></span>
                    <div class="fl">
                        <p class="s1">无法接收邮件</p>
                        <p class="s2">如您遇到问题，请拨打途牛客服热线 4007-999-999</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
	$('#change').click(function(){
		$.get('/home/personalsecurity/email_one',{},function(data){
			$('.common_div').html(data);
		})
	})
</script>
@endsection