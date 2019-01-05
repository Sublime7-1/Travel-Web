@extends('home.member_public.index')
@section('title','评论详情')
@section('main')
<link rel="stylesheet" type="text/css" href="/style/home/p_commentcheck/left_class.css">
<link rel="stylesheet" type="text/css" href="/style/home/p_commentcheck/usercenter_lxl.css">
<link rel="stylesheet" type="text/css" href="/style/home/p_commentcheck/usercener_remark.css">
  <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
<style type="text/css">
	.left-sidebar{
		display: none;
	}
	.header_nav_menu .nav_menu_list li:not(:first-child) {
		display:none;
	}
	.clists_main_cont .icon-customer {
	    background-image: url(/style/home/goodsinfo/c6qagwwon0a.png);
	    height: 48px;
	    width: 48px;
	    overflow: hidden;
	    display: inline-block;
	    background-repeat: no-repeat;
	    background-position: -78px -0px;
	}
</style>
<div class="wrap clearfix">
	<div class="prod_name single_prod clearfix">
	    <input type="hidden" id="productId" value="300283712">
	    <div class="pn_left">
	        <div class="pn_infor">
	            <p class="pn_line"><a href="javascript:void(0);" target="_blank" title="{{$goodsinfo->title}}">{{$goodsinfo->title}}</a></p>
	            <p class="pn_sub_infor">
	                <span>订单编号：<em>{{$orderinfo->order_num}}</em></span>
	                <span>人数：{{$orderinfo->adult_num}}成人&nbsp;{{$orderinfo->child_num}}儿童</span>
	                <span>出游时间：{{$orderinfo->begin_time}}~{{$orderinfo->end_time}}</span>
	            </p>
	        </div>
	    </div>
	    <div class="pn_right">
	    	<dl class="clearfxi saf_num">
		        <div class="dt_box">
		            <dt>已有{{$commenttotal}}点评，</dt>
		            <dt>满意度：</dt>
		        </div>
		        <dd>
		            <em>{{$satisfied}}%</em>
		        </dd>
	    	</dl>
		</div>
	</div>

	<div class="comment_outbox clearfix">
	    <div class="w800 fl">
	        <!--start top_tour-->
	        <div class="tours">
	            <div class="pkg-detail-infor">
	                <div class="detail_infor">
	                    <!-- 综合点评 start-->
	                    <div class="comments_box compreEva">
	                        <ul class="comment_lists">
	                            <li class="comment_li last">
	                                <dl class="clearfix">
	                                    <span class="totEva">综合评价</span> 
	                                    <dd>                                    
	                                        <span class="clists_main_cont other" data="{{$goodsinfo->title}}">
	                                            <p class="clists_stars clearfix">
	                                                <span class="totEvaKeyword good">
	                                                    <img src="/style/home/p_commentcheck/Cii9EVk5BbiIGEP5AAAG5iN-oggAAL6wQP_-QEAAAb_267.png">
	                                                    <i>{{$commentinfo->colligate_grade}}</i>
	                                                </span>
	                                                <span class="type">{{$typename}}</span>
	                                            </p>
	                                            <p class="clists_words clearfix"> 
                                                    <span>
                                                        预订优惠
                                                        <em>{{$commentinfo->discount_grade}}</em>
                                                    </span>
                                                
                                                    <span>
                                                        游玩服务
                                                        <em>{{$commentinfo->service_grade}}</em>
                                                    </span>
                                                
                                                    <span>
                                                        游玩体验
                                                        <em>{{$commentinfo->experience_grade}}</em>
                                                    </span>
	                                            </p>
	                                            <pre class="comment_detail">{{$commentinfo->content}}</pre>
	                                            <ul>
	                                            	@if($commentinfo->img != '')
	                                            		<img src="{{$commentinfo->img}}" width="200px">
	                                            	@endif
	                                               <!-- 图片  -->
	                                            </ul>
	                                            <dl class="clearfix comment_from">
	                                                <dt>{{$commentinfo->time}}  &nbsp;&nbsp;
	                                                    来自&nbsp;&nbsp;<em class="appIcon"></em><i>WWW站</i>
	                                                </dt>
	                                            </dl>
	                                        </span>
	                                    </dd>	                                    
	                                    <!--回复-->
	                                    @if($commentinfo->reply != '')
	                                    <dd>

	                                    	<span class="clists_main_cont other" data="{{$goodsinfo->title}}">
	                                    		<i class="icon-customer"></i>
	                                            <pre class="comment_detail" style="display: inline-block;vertical-align: top;">回复内容：{!!$commentinfo->reply!!}</pre>
	                                            <dl class="clearfix comment_from">
	                                                <dt>{{$commentinfo->reply_time}}  &nbsp;&nbsp;
	                                                    来自&nbsp;&nbsp;<em class="appIcon"></em><i>途牛客服</i>
	                                                </dt>
	                                            </dl>
	                                        </span>
	                                    </dd>
	                                    @endif
	                                </dl>
	                            </li>
	                        </ul>
	                    </div>
	                    <!-- 综合点评 end-->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection