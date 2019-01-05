@extends('home.member_public.index')
@section('title','我的收藏')
@section('main')
    <script charset="utf-8" src="/style/home/collect/v.htm"></script><script src="/style/home/collect/hm.js"></script><script type="text/javascript" src="/style/home/collect/config.js"></script>
    
    <link href="/style/home/collect/focus.css" rel="stylesheet">
    <!-- <link href="/style/home/collect/header.css" rel="stylesheet"> -->
<!-- <link href="/style/home/collect/user_index.css" rel="stylesheet">
<link href="/style/home/collect/user_order.css" rel="stylesheet"> -->
<!-- <link href="/style/home/collect/common_foot_v3.css" rel="stylesheet"> -->
    <meta name="applicable-device" content="pc">
    <script src="/style/home/js/jquery-1.8.3.min.js"></script>
    <script src="/js/layer/layer.js"></script>
      <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>途牛旅游网会员中心_会员中心_途牛旅游网</title>
<meta content="会员中心" name="keywords">
<meta content="途牛旅游网：中国最大的旅游行业在线电子商务网站，为您提供最为周到的旅游服务。途牛旅游网" name="description">
<style>
    .pagination{
        float: right;
    }
    .pagination li{
        float: left;
    }
    .pagination .active{
        padding: 0 10px;
        height: 28px;
        line-height: 28px;

    }

</style>
<script>
    var cdnConfig = {
        url: "//img1.tuniucdn.com",
        defaultAppBaseUrl: "//img1.tuniucdn.com",
        version: "201810301050",
        env: "prd"
    };
    var PageName = '';
    var GaPageName = '';
</script>

<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="base64" src="/style/home/collect/base64.js"></script></head>
<body class="index1200">


<style type="text/css">    .index_top_nav .item_duobao .dropdown_panel { width: 100%; left: -1px; text-align: center; }</style>
<div class="mainDiv">
        <input type="hidden" name="token" id="token" value="">
        <div class="detail_title clearfix">
            <div class="detail_sub_title">
                <i></i>我的收藏
            </div>
        </div>
        <div class="select-box">
            <ul>
                <li data-type="0" data-href="http://www.tuniu.com/" class="active">
                    全部
                </li>

                <!-- <p></p>
                <li data-type="1" data-href="http://www.tuniu.com/tours/" class="">
                    跟团
                </li> -->
                
            </ul>
        </div>
        <div class="focus-list">
        @if($goods)
            <div class="focus-A">
                <div class="title">
                    <div class="title_1 del-batch-btn">
                        删除选中
                    </div>
                    <div class="title_2">
                        产品信息
                    </div>
                    <div class="title_3">
                        价格
                    </div>
                    <div class="title_4">
                        操作
                    </div>
                </div>
                @foreach($goods as $goods_v)
                <div class="detail">
                    <div class="title_1" style="width: 6%;">
                        <input type="checkbox" product-type="" collect-id="{{$goods_v->collect_id}}" name="productInfo" class="choose-btn">
                    </div>
                    <div class="title_2" style="width: 64%;">
                        <a href="/home/goodsinfo/{{$goods_v->id}}" target="_blank"><img src="{{$goods_v->pic}}" alt="" title=""></a>
                        <p class="start-city ">出发</p>
                        <p class="focus-name">
                            <a href=/home/goodsinfo/{{$goods_v->id}} target="_blank">{{$goods_v->title}}</a>
                        </p>
                        <p class="open-time">&nbsp;</p>
                        <p class="tour-type">
                            <span class="">
                                立减优惠&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span></span>
                            
                        </p>
                        
                        <p class="comment-info"><span class="comment-left">147人点评</span><span class="comment-right">92%满意</span></p>
                        
                    </div>
                    <div class="title_3">
                        <p><span>￥</span>{{$goods_v->price}}<span>&nbsp;起</span></p>
                    </div>
                    <div class="title_4">
                        <a href="/home/goodsinfo/{{$goods_v->id}}" target="_blank" class="order-btn">预订</a>
                        <p class="del-btn" product-id="{{$goods_v->id}}" product-type="">删除</p>
                    </div>
                </div>
                @endforeach
            </div> 
        @else
        <div class="no-focus">
            <div class="order_list">
                <p class="no-focus-img"></p>
                <p class="no-focus-tip">
                    您还没有收藏<span class="focus-type">任何</span>产品哦~<br>
                    既然来了，就<a href="http://tuniu.com/" target="_blank">逛一逛</a>吧~
                </p>
            </div>
        </div>
        @endif
        </div>
        <div class="pagination clearFix" data-curpage="1" id="focus_pagination" data-pager-inited="true">
            <div class="page-bottom">
                {{$collection->render()}}
            </div>
        </div>
    </div>
    <!-- <script src="/style/home/collect/global.js"></script><script>window._gaq={push:function(){}}</script><script src="/style/home/collect/tac.js"></script>
<script src="/style/home/collect/location.js"></script>
<script src="/style/home/collect/noindex_login.js"></script>
<script src="/style/home/collect/in-min.js"></script>
<script src="/style/home/collect/header_v2.js"></script>
<script src="/style/home/collect/polyfill.js"></script>
<script src="/style/home/collect/usercenter_navleft.js"></script>
<script src="/style/home/collect/usercenter_head.js"></script> -->
<script>
    $('.del-btn').click(function(){
        var obj = $(this);
        var id = $(this).attr('product-id');
       
        layer.confirm('你确定要删除吗?',function(){
            $.post('/home/collect/'+id,{'_token':' {{csrf_token()}} ','_method':'DELETE'},function(data){
                if(data==1){
                    layer.alert('删除成功',{icon:1,skin: 'layui-layer-lan'});
                    obj.parents('.detail').remove();
                }
            });
        });               
    });

    $('.del-batch-btn').click(function(){
        var ids = '';
        $('.choose-btn:checked').each(function(){
            ids += $(this).attr('collect-id')+',';
        });
        // id集合
        ids = ids.substr(0,ids.length-1);
        if(ids == ''){
            layer.alert('请选择所要删除的产品!',{icon:5,'title':'提示'});
        }else{
            // 删除该产品
            $.post('/home/collect/'+ids,{'_token':'{{csrf_token()}}','_method':'DELETE'},function(data){
                if(data == 1){
                    layer.msg('删除成功!',{icon:1,time:1000});
                    $('.choose-btn:checked').parents('.detail').remove();
                }
            });
            // alert('en');
        }
    });

</script>


@endsection