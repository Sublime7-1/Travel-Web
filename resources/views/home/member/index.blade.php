@extends('home.member_public.index')
@section('title','会员中心')
@section('main')
<link rel="stylesheet" type="text/css" href="/style/home/member/head_divbycat_v6.css">
<link rel="stylesheet" type="text/css" href="/style/home/member/user_index.css">
<link rel="stylesheet" type="text/css" href="/style/home/member/mainv2.css">
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
  <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="/style/home/member_public/layer/layer.js"></script>
<style type="text/css">
	.collection-price > span.del, .histroy-price > span.del {
	     color: #dddddd; 
	    font-size: 12px;
	    position: absolute;
	    right: 0;
	    bottom: 0;
	    cursor: pointer;
	}
</style>
<div class="main-content">
        <div id="main-header">
            <img src="/style/home/member_public/bell.png" alt="" id="bell">
            <div class="header-left" id="user-info"><a href="http://i.tuniu.com/userinfoconfirm">
            			@if($userinfo->pic)
                        <img src="{{$userinfo->pic}}" alt="" id="user-logo">
            			@else
                        <img src="/style/home/member/thumb.png" alt="" id="user-logo">
                        @endif
                    </a>
                    <div class="user-msg">
                        <p id="user-name">
                            <a href="javascript:;">@if($userinfo->nickname) {{$userinfo->nickname}} @elseif($userinfo->realname) {{$userinfo->realname}} @else {{$userinfo->username}} @endif</a>
                        </p>
                        <a href="javascript:void(0)&quot;">
                            <div id="user-level">
                                <div id="level-inner" style="width:50%;"></div>
                                <span id="level-tag" class="gopng_icon_v0"></span>
                            </div>
                        </a>
                        <div id="user-operation">
                            <a href="/home/personaldata/index">更改信息</a>
                            
                            <a target="_blank" href="/home/member" id="personal-page">个人主页</a>
                            
                        </div>
                    </div>
                    
                    <div class="user-box" id="box-left">
                        <a href="javascript:;"><img src="/style/home/member/gift.png" alt=""></a>
                        <p>会员礼包</p>
                    </div>
                    <div class="user-box" id="box-middle">
                        <a href="javascript:;"><img src="/style/home/member/crown.png" alt=""></a>
                        <p>会员俱乐部</p>
                    </div>
                    <div class="user-box" id="box-right">
                        <a href="javascript:;"><img src="/style/home/member/diamond.png" alt=""></a>
                        <p>会员权益</p>
                    </div>
                    </div>
            <div class="header-right"><ul>
                <li>
                    <a href="/home/coupon"><div><p><b>{{$coupon_total}}</b>张</p><span>优惠券:</span></div></a>
                    <a href="javascript:;"><div><p><b>0</b>元</p><span>旅游券:</span></div></a>
                </li>
            </ul></div>
        </div>
        <div id="main-body">
            <div class="body-left">
                <div id="record-list" style="min-height: auto;">
                    <ul class="list-header">
                        <li class="focus" name="order-all">待办订单</li>
                        <!-- <li name="order-pay">待付款(<span>--</span>)</li>
                        <li name="order-go">待出行(<span>--</span>)</li>
                        <li name="order-command">待点评(<span>--</span>)</li> -->
                    </ul>
                    <a id="getAllOrder" href="/home/personal/index">查看全部订单</a>
                    <div id="order-all">
                        @if(count($agentorder))
                        <div class="order-list">
                            <ul class="list-content">
                    		@foreach($agentorder as $k=>$v)	
                            <li>
                                <div class="item-desc">
                                    <img src="{{$v->pic}}" alt="">
                                    <div>
                                        
                                        <p class="main-title" title="{{$v->gname}}">{{$v->gname}}</p>
                                        
                                        <p class="sub-title">
                                            时间 : {{$v->order_change_time}}&nbsp;&nbsp;&nbsp;&nbsp;{{$v->adult_num+$v->child_num}}人
                                        </p>
                                    </div>
                                 </div>
                                <div class="item-price">
                                    
                                        ￥{{$v->money}}
                                    
                                </div>
                                <div class="item-statue">
                                    <p>@if($v->order_status == 0) 待处理 @elseif($v->order_status == 1) 支付中 @elseif($v->order_status == 4) 申请退款 @endif</p>
                                    <!-- <p>
                                        <img src="//m.tuniucdn.com/fb2/t1/G2/M00/B6/C4/Cii-TFkdVVaIR_ZzAAADvx9MYK8AAJ44gP__CkAAAPX089.png" alt="">
                                        <span class="time">09:48</span>
                                    </p> -->
                                    <p>
                                        <a target="_blank" class="statue-link" href="/home/personal/index/info/{{$v->id}}">订单详情</a>
                                    </p>
                                </div>
                                <div class="item-operate">
                                    	@if($v->order_status == 7)
										<a href="/home/comment?id={{$v->id}}" class="btn ">去点评</a>
                                        @elseif($v->order_status == 8)
                                        <a href="javascript:;" class="btn" style="color: #999;border-color: #999">已点评</a>
                                    	@else
                                        <a href="/home/personal/index/info/{{$v->id}}" class="btn ">去查看</a>
                                        @endif
                                    
                                </div>
                            </li>
                        	@endforeach 
                        	</ul>
                            <!-- <div class="list-footer">
                                <a href="/list/?t=0&s=0&p=1">查看全部订单</a>
                            </div> -->
                        </div>
                        <div class="loading hide">
                            <img src="/style/home/member/loadv2.gif" alt="" style="">
                            <p>牛牛玩儿命加载中...</p>
                        </div>
                        @else
                        <div id="no-order-all" class="no-order hide">
                            <img src="/style/home/member/null.png" alt="" style="">
                            <p>没有查到符合的订单，去<a href="/">首页逛逛</a></p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
      
            <div class="body-right">
                <div id="right-bottom">
                    <p class="moudle-title">我的收藏</p>
                    <div id="collection-list">
                    	@if(count($collection))
                    	<div class="loading hide">
                            <img src="/style/home/member_public/loadv2.gif" alt="" style="">
                            <p>牛牛玩儿命加载中...</p>
                        </div>

                    	<div id="col-content">
	                    	<ul>	
	                    		@foreach($collection as $k=>$v)                         
	                            <li id="collect" name="1">
                                    <img src="{{$v->pic}}" alt="">
                                    <div>
                                        <p><a href="/home/goodsinfo/{{$v->gid}}">{{$v->gname}}</a></p>
                                        <p class="collection-price">
                                            
                                            <span>
                                                <sub>￥</sub><b>{{$v->price}}</b><sub>起</sub>
                                            </span>
                                         
                                            <span class="del" product-id="{{$v->id}}">删除</span>
                                        </p>
                                    </div>
                                </li>
                                @endforeach	                            
	                        </ul>
	                        <div><a href="/home/collect">查看全部收藏</a></div>
	                    </div>
                       	@else
                        <div id="no-col" class="">
                            <img src="/style/home/member_public/null.png" alt="">
                            <p>您还没有收藏任何产品哦~</p>
                        </div>
                        @endif  
                    </div>
                </div>
                <div class="cmp-hide-cont" id="right-middle">
                    <p class="moudle-title">我的社区 <a target="_blank" href="/home/member">我的主页 &gt;</a></p>
                    <ul>
                        <li>
                            <div>
                                <img src="/style/home/member_public/icon1.png" alt="" style="">
                                <div>
                                    <p><a target="_blank" href="/home/coupon">我的优惠券</a></p>
                                </div>
                            </div>
                            <div>
                                <img src="/style/home/member_public/icon1.png" alt="" style="">
                                <div>
                                    <p><a target="_blank" href="/home/personal/index">我的订单</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <img src="/style/home/member_public/icon3.png" alt="" style="">
                                <div>
                                    <p><a target="_blank" href="/home/comment">我的点评</a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	$('.del').click(function(){
        var obj = $(this);
        var id = $(this).attr('product-id');
    
        layer.confirm('你确定要删除吗?',function(){
            $.post('/home/collect/'+id,{'_token':' {{csrf_token()}} ','_method':'DELETE'},function(data){
                if(data==1){
                    layer.alert('删除成功',{icon:1,skin: 'layui-layer-lan'});
                    obj.parents('#collect').remove();
                }
            });
        });               
    });
    </script>
@endsection