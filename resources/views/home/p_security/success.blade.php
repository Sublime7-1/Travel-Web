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
		    <div class="veri_con mt70">
		        <div class="veri_input">
		            <div class="fl veri_icon succ_icon" style="background-position: 0 -333px;"></div>
		            <div class="fl succ_box">
		            <div class="succ_word succ_word_more yh">恭喜,您的邮箱已经修改成功!</div>
		                <p class="c_666">新的邮箱为<span class="green">{{$email}}</span></p>
		            </div>
		        </div>
		    </div>
		</div>
    </div>
</div>
@endsection