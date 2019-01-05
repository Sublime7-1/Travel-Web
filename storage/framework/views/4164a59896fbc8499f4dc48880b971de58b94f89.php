
<?php $__env->startSection('title','优惠劵'); ?>
<?php $__env->startSection('main'); ?>

<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
  <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
<style text="text/css">
    .main-content{
        /*position: relative;*/
        /*z-index: 19891014;*/
    }
    .container{
        overflow: inherit;
    }
    .coupon_header{
        background:#ffffff;
        width:990px;
        height:100px;
        margin-bottom: 20px;
        background-image: url("//img1.tuniucdn.com/site/m2015/images/member/couponCodeV2/head_bgm.png");
        background-size: 100%;
        position: relative;
    }
    .coupon_info{
        display: inline-block;
        padding: 40px 0 0 30px;
        font-family: MicrosoftYaHei-Bold;
        font-size: 20px;
        color: #333333;
        line-height: 20px;
        text-align: left;
        font-weight: bold;
    }
    .coupon_input{
        position: absolute;
        border: 1px solid #dddddd;
        border-radius: 2px;
        width: 268px;
        font-size: 16px;
        top: 16px;
        right: 157px;
        padding: 8.5px 10px;
    }
    .coupon_btn{
        background-color: #32bb60;
        border-radius: 2px;
        position: absolute;
        top: 17px;
        right: 40px;
        font-family: MicrosoftYaHei;
        font-size: 14px;
        color: #ffffff;
        line-height: 14px;
        text-align: left;
        padding: 12px 15px;
        display: inline-block;
        cursor: pointer;
    }
    #bell{
        position: absolute;
        right: 10px;
        top: 0;
    }
    .coupon_tips{
        font-family: MicrosoftYaHei;
        font-size: 12px;
        color: #999999;
        line-height: 12px;
        text-align: right;
        padding-right: 30px;
        padding-top: 8px;
    }
    .coupon_floor{
        width: 989px;
        background-color: #fff;
    }
    .coupon_ul_div{
        border-bottom: 1px solid #e9e9e9;
        height: 49px;
    }
    .coupon_span{
        background: #ffffff;
        width: 150px;
        height: 32px;
        padding-top: 17px;
        display: block;
        font-family: MicrosoftYaHei-Bold;
        font-size: 16px;
        color: #666;
        font-weight: bold;
        letter-spacing: 0px;
        line-height: 16px;
        text-align: center;
        border-right: 1px solid #e9e9e9
    }
    .coupon_li{
        float: left;
        cursor: pointer;
    }
    .li_active .coupon_span{
        border-top: 3px solid #4c5a65;
        border-bottom: none;
        border-right: 1px solid #e9e9e9;
        color: #333;
        height:30px;
    }
    .coupon_type_ul{
        height: 14px;
        padding: 20px 10px 10px;
    }
    .coupon_type_li{
        /*display: inline-block;*/
        float: left;
        font-family: MicrosoftYaHei;
        padding: 0 35px;
        font-weight: bold;
        font-size: 14px;
        color: #999999;
        line-height: 14px;
        text-align: center;
        cursor: pointer;
        border-right: 1px solid #dddddd;
    }
    .clear{
        clear: both;
    }
    .card_type_1 .card_left{
        background: rgb(258, 88, 88);
    }
    .card_type_2 .card_left{
        background: rgb(254, 162, 0);
    }
    .card_type_3 .card_left{
        background: rgb(18, 188, 204);
    }
    .card_type_4 .card_left{
        background: rgb(57, 173, 255);
    }
    .card_type_5 .card_left{
        background: rgb(158, 18, 204);
    }
    .card_type_1 .card_right{
        color: rgb(258, 88, 88);
        background: rgba(258, 88, 88 ,0.05);
    }
    .card_type_2 .card_right{
        color: rgb(254, 162, 0);
        background: rgba(254, 162, 0 ,0.05);
    }
    .card_type_3 .card_right{
        color: rgb(18, 188, 204);
        background: rgba(18, 188, 204 ,0.05);
    }
    .card_type_4 .card_right{
        color: rgb(57, 173, 255);
        background: rgba(57, 173, 255,0.05);
    }
    .card_type_5 .card_right{
        color: rgb(158, 18, 204);
        background: rgba(158, 18, 204,0.05);
    }
    .card_expired .card_left{
        background-color: #ddd;
    }
    .card_expired .card_right{
        color: rgb(221, 221, 221);
        background: rgba(221, 221, 221, 0.05);
    }
    .card_type_1 .card_btn{
        color: rgb(258, 88, 88 );
        border: solid 1px rgb(258, 88, 88 );
    }
    .card_type_2 .card_btn{
        color: rgb(254, 162, 0);
        border: solid 1px rgb(254, 162, 0);
    }
    .card_type_3 .card_btn{
        color: rgb(18, 188, 204);
        border: solid 1px rgb(18, 188, 204);
    }
    .card_type_4 .card_btn{
        color: rgb(57, 173, 255);
        border: solid 1px rgb(57, 173, 255);
    }
    .card_type_5 .card_btn{
        color: rgb(158, 18, 204);
        border: solid 1px rgb(158, 18, 204);
    }
    .coupon_card{
        float: left;
        padding: 10px 0 10px 24px;
        width: 299px;
    }
    .card_left{
        position: relative;
        font-family: MicrosoftYaHei;
        font-size: 12px;
        color: #ffffff;
        letter-spacing: 5px;
        text-align: left;
        writing-mode: tb-lr;
        -webkit-writing-mode: vertical-lr;
        -moz-writing-mode: vertical-lr;
        -ms-writing-mode: vertical-lr;
        writing-mode: vertical-lr;
        padding: 38px 6px;
        float: left;
        width: 17px;
    }

    .card_left:before{

        content:"";
        display:block; /*伪元素默认是行内元素，所以如果要设定宽高，这必须显性设置为block*/
        border-width:0 10px 10px 0; /*设置边框宽度*/
        border-width: 5px 5px 5px 5px;
        border-color: #fff #fff transparent transparent;
        writing-mode:lr-tb;
        border-style:solid; /*设置边框为固体的*/
        width:0; /*设定新创建的元素*/
        position:absolute; /*相对于父容器绝对定位，设置偏移父容器边框距离*/
        top:0;
        right:0;
    }
    .card_left:after{
        content: "";
        display: block;
        border-width: 5px 5px 5px 5px;
        border-color:transparent #fff #fff transparent;
        writing-mode:lr-tb;
        background: transparent;
        border-style: solid;
        width: 0;
        position: absolute;
        top: 118px;
        right: 0;
    }
    .card_right{
        background: rgba(18, 188, 204, 0.05);
        border: 1px solid #e9e9e9;
        border-left: none;
        width: 268px;
        height: 126px;
        float: left;
        position: relative;
    }
    .card_right:before{
        content: "";
        display: block;
        border-width: 5px 5px 5px 5px;
        border-color: #fff transparent transparent #fff;
        background: transparent;
        border-style: solid;
        width: 0;
        position: absolute;
        top: -1px;
        left: -1px;
    }
    .card_right:after{
        content: "";
        display: block;
        border-width: 5px 5px 5px 5px;
        border-color: transparent transparent #fff #fff;
        background: transparent;
        border-style: solid;
        width: 0;
        position: absolute;
        top: 117px;
        left: -1px;
    }
    .border_top_line{
        position: absolute;
        top: 4px;
        left: -2px;
        background-color: #e9e9e9;
        width: 13px;
        height: 1px;
        transform: rotate(-45deg);
        /* IE8+ - must be on one line, unfortunately */
        -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=0.7071067811865483, M12=0.7071067811865467, M21=-0.7071067811865467, M22=0.7071067811865483, SizingMethod='auto expand')";

    }
    .border_bot_line{
        position: absolute;
        top: 121px;
        left: -2px;
        background-color: #e9e9e9;
        width: 13px;
        height: 1px;
        transform: rotate(45deg);
        /* IE8+ - must be on one line, unfortunately */
        -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=0.7071067811865474, M12=-0.7071067811865477, M21=0.7071067811865477, M22=0.7071067811865474, SizingMethod='auto expand')";
    }
    .card_right_top{
        height:84px;
        border-bottom: 1px solid #e9e9e9;
        position: relative;
    }
    .card_rt_left{
        font-family: MicrosoftYaHei;
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 0px;
        text-align: center;
        width: 105px;
        padding-top: 35px;
        float: left;
    }
    .card_rt_right{
        width: 150px;
        float: left;
        font-family: MicrosoftYaHei;
        font-size: 12px;
        color: #999;
        letter-spacing: 0px;
        line-height: 18px;
        text-align: left;
    }
    .card_rtr_top{
        padding-top: 20px;
        color: #333;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .card_rtr_mid{
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .card_rule{
        font-family: MicrosoftYaHei;
        font-size: 12px;
        color: #999999;
        letter-spacing: 0px;
        line-height: 18px;
        text-align: left;
        padding-top: 13px;
        padding-left: 15px;
        float: left;
        cursor: pointer;
    }
    .card_btn{
        font-family: MicrosoftYaHei;
        font-size: 12px;
        margin-top: 7px;
        margin-right: 15px;
        padding: 4px 11px;
        float: right;
    }
    .mask_bgm{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
        background-color: rgb(0,0,0);
        filter:alpha(opacity=30);
        -moz-opacity:0.3;
        opacity: 0.3;
    }
    .mask_rule_bgm{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
    }
    .rule_bgm{
        position: relative;
        width: 600px;
        padding: 0px 25px 20px;
        background-color: #fff;
        margin: 0 auto;
        margin-top: -200px;
        top: 50%;
        font-size: 14px;
        color: #666666;
        letter-spacing: 0px;
        line-height: 21px;
        max-height: 400px;
        text-align: left;
        overflow-y: scroll;
    }
    .rule_titel {
        font-weight: bold;
        padding-bottom: 10px;
        padding-top: 20px;
        font-size: 16px;
        color: #333333;
        letter-spacing: 0px;
        line-height: 16px;
        text-align: left;
        margin-left: -25px;
    }
    .rule_icon {
        width: 5px;
        height: 14px;
        background-color: #555;
        /*display: inline-block;*/
        margin-right: 18px;
        float: left;
    }
    .active {
	    background-color: #37c349;
	    color: #ffffff;
	    border-radius: 5px;
	}
    .close_img {
        position: absolute;
        right: 15px;
        top: 20px;
        width: 15px;
        cursor: pointer;
    }
    .no_tip {
        color: #ddd;
        font-family: "Microsoft Yahei";
        font-size: 18px;
        padding: 5px 0 30px;
    }
    .t_cen {
        text-align: center;
    }
    .icon_niu_b {
        background: url(/style/home/member_public/user_icon.png) no-repeat;
        background-position: 0 -152px;
        display: inline-block;
        height: 102px;
        width: 109px;
    }
</style>
<div class="main-content">
    <div class="coupon_header">
        <img src="/style/home/member_public/bell.png" alt="" id="bell">
        <div>
            <div class="coupon_info">可用优惠券:<span class="coupon_num"><?php echo e($notuse); ?></span>张</div>
            <!-- <input class="coupon_input" placeholder="请填写优惠券券号"> -->
            <!-- <div class="coupon_btn">绑定优惠券</div> -->
        </div>
        <!-- <div class="coupon_tips">
            <p>温馨提示：以下优惠券已经绑定，只能在会员本人消费途牛旅游网产品时使用，如需绑定其他优惠券，请使用上方的绑定功能！</p>
        </div> -->
    </div>

    <div class="coupon_floor">
        <div class="coupon_ul_div">
            <ul>
                <li class="coupon_nouse coupon_li li_active">
                    <span class="coupon_span coupon_nouse_span">未使用(<?php echo e($notuse); ?>)</span>
                </li>
            </ul>
        </div>
        <div class="coupon_type">
            <ul class="coupon_type_ul">
                <li class="coupon_type_li active" data-id="0">全部</li>
            	<?php $__currentLoopData = $coupon_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="coupon_type_li" data-id="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="clear"></li>
            </ul>
        </div>
	    <div class="coupon_content">
            <?php if($coupon): ?>
	       <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <div class="coupon_card card_type_4">
		        <div class="card_left">
		            <?php echo e($v->type); ?>

		        </div>
		        <div class="card_right">
		            <div class="border_top_line"></div>
		            <div class="border_bot_line"></div>
		            <div class="card_right_top">
		                
		                <div class="card_rt_left"><?php echo e($v->money); ?>元</div>
		                <div class="card_rt_right">
		                    <div class="card_rtr_top">
                                <?php if($v->max_money != 0): ?>
		                        每满<?php echo e($v->max_money); ?>元减<?php echo e($v->money); ?>元(最多<?php echo e($v->money); ?>元)
                                <?php else: ?>
                                立减<?php echo e($v->money); ?>元
                                <?php endif; ?>
		                    </div>
		                    <div class="card_rtr_mid">
		                        <?php echo e($v->desc); ?>

		                    </div>
		                    <div class="card_rtr_bot">
		                        <?php echo e($v->start_time); ?>至<?php echo e($v->end_time); ?>

		                    </div>
		                </div>
		            </div>
		            <div class="card_right_bot">
		                <div class="card_rule">
		                    查看规则
		                </div>
		                <div class="mask_bgm hide">
		                </div>
		                <div class="mask_rule_bgm hide">
		                    <div class="rule_bgm">
		                        <img class="close_img" src="/style/home/member_public/x.png">
		                        <div class="rule_titel"><div class="rule_icon"></div>优惠规则</div>
		                        <?php if($v->max_money != 0): ?>
                                每满<?php echo e($v->max_money); ?>元减<?php echo e($v->money); ?>元(最多<?php echo e($v->money); ?>元)
                                <?php else: ?>
                                立减<?php echo e($v->money); ?>元
                                <?php endif; ?>
		                        <div class="rule_titel"><div class="rule_icon"></div>活动主题</div>
		                        <?php echo e($v->title); ?>

		                        <div class="rule_titel"><div class="rule_icon"></div>活动说明</div>
		                        活动时间：<?php echo e($v->start_time); ?>至<?php echo e($v->end_time); ?><br>活动对象：优惠劵拥有人<br>活动内容：<br><?php echo e($v->content); ?>

		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php else: ?>
            <p class="t_cen"><span class="page_icon icon_niu_b"></span></p>
            <p class="t_cen no_tip">您没有未使用优惠券!</p>
           <?php endif; ?>
	    </div>
        <div class="pagination clearfx" id="coupon_pagination" data-curpage="1" data-pager-inited="true">
        	<div class="page-bottom">
        			<!-- 分页 -->  
        	</div>
        </div>
    </div>

</div>
<script type="text/javascript">
    // 点击查看规则
    $(".card_rule").live("click", function () {
        $(this).parents(".coupon_card").css({"position":"relative","z-index":"1999999999"}).siblings().css("position","static");                                         
        $(this).siblings(".mask_bgm,.mask_rule_bgm").removeClass("hide");
    });
    // 关闭查看规则
    $(".close_img").live("click", function () {
        $(this).parents(".card_right_bot").find(".mask_bgm,.mask_rule_bgm").addClass("hide");
    });

    // 获取指定类型劵
    $('.coupon_type_li').live("click",function(){
        $(this).addClass("active").siblings().removeClass("active");
        var pid = $(this).attr('data-id');
        // alert(pid);
        $.get('/home/pids/'+pid,{},function(data){
            if(data){
                $('.coupon_content').html(data);       
            }else{
                $('.coupon_content').html('<p class="t_cen"><span class="page_icon icon_niu_b"></span></p><p class="t_cen no_tip">您没有未使用优惠券!</p>');   
            }
        })
    })


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.member_public.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>