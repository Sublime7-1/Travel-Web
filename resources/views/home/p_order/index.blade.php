@extends('home.member_public.index')
@section('title','订单')
@section('main')

<style>
 #list{
        padding-left:415px;
    }
   .pagination li{
        display:inline-block;
        float:left;
        
   }  
   .pagination li span {

    width: 28px;
    height: 29px;
    display: block;
    line-height: 29px;
}
#xubox_border1 span .xubox_text{
    padding-top: 10px;margin-left: 47px;
}
.dian{
    display:inline-block;border:1px solid #f80;color: #f80;background-color: #fff;border-color: #f80;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border-radius: 4px;
}
.dian:hover{
    color:#fff;
    background:#f80;
}
.scroll_like_box .scroll_con li {margin-right: 22px;} .clearfix{ zoom:1; clear:both }</style>
<div class="mainDiv">
        <!--我的订单-->
        <ul id="order-tab">
            <li data="0" class="focus">
                <i>全部订单</i>
            </li>
            <li id="waitPay" data="1">
                <i>待付款(
                    <span>0</span>)</i></li>
            <li id="waitTravel" data="3">
                <i>待出行/收货(
                    <span>0</span>)</i></li>
            <li id="waitCommand" data="2">
                <i>待点评(
                    <span>0</span>)</i></li>
            <!-- <li><i>退款</i></li> -->
        </ul>
        <div id="order-choose">
            <div class="order-info">产品信息</div>
            <div class="order-list">
                <select name="">
                    <option value="0" selected="selected">全部订单</option>
                    <option value="1000">旅游</option></select>
            </div>
            <div class="order-mount">数量</div>
            <div class="order-time">时间</div>
            <div class="order-price">订单金额</div>
            <div class="order-statue">状态</div>
            <div class="order-operate">操作</div>
        </div>
        <div id="order-item-box">
            <div class="loading hide">
                <img src="%E6%9F%A5%E7%9C%8B%E8%AE%A2%E5%8D%95_files/loadv2.gif" alt="" style="">
                <p>牛牛玩儿命加载中...</p>
            </div>
            <div id="order-item-list">

                @foreach($order as $k=>$v)
                <div class="order-item" style="border-bottom:1px solid #b0b0b0;">
                    <div class="item-header">
                        <span class="item-time">下单时间：{{$v->order_change_time}}</span>
                        <span class="order-id">订单号：{{$v->order_num}}</span>
                    </div>
                    <div class="item-detail" style="border:none;">
                        <div class="item-desc">
                            <img class="item-icon" src="%E6%9F%A5%E7%9C%8B%E8%AE%A2%E5%8D%95_files/Cii-U1jltxuIM8EYAAAJI0AcjEEAAJWvAP_9r8AAAlB553.png" alt="">
                            <p title="[春节]&lt;斯里兰卡-马尔代夫机票+当地8晚10日游&gt;双国体验 上海直飞 2人即发 0自费 马代可升级岛屿 锡兰网红火车  趣享大礼包">
                                <a href="http://www.tuniu.com/tour/210137709" target="_blank">
                                    <span>{{$v->goods_id}}...</span></a>
                            </p>
                        </div>
                        <div class="item-kind">{{$v->order_type}}</div>
                        <div class="item-mount">{{$v->adult_num + $v->child_num}}人</div>
                        <div class="item-time">
                            <p>{{$v->begin_time}}</p>
                        </div>
                        <div class="item-price">
                            <span style="color: #404040">-</span>
                        </div>
                        <div class="item-statue">
                            @if($v->order_status == '支付中')
                                <form action="/home/personal/index/pay/{{$v->id}}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default" style="    color: #333;background-color: #ebebeb;border-color: #adadad;    color: #333;background-color: #fff; border-color: #ccc;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid #b0b0b0;border-radius: 4px;" href="">去支付</button>
                                </form>
                            @elseif($v->order_status == '支付成功')
                                <button type="submit" class="btn btn-default" style="    color: #333;background-color: #ebebeb;border-color: #adadad;    color: #333;background-color: #fff; border-color: #ccc;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid #b0b0b0;border-radius: 4px;" href="">等待游玩</button>
                            @else

                                 <p>{{$v->order_status}}</p>
                            @endif
                           
                            <p>
                                <a target="_blank" href="/home/personal/index/info/{{$v->id}}">订单详情</a></p>
                        </div>
                        @if($v->order_status == '支付取消')
                        <div class="item-operate">
                            <a class="btn del" href="javascript:;" onclick="member_del(this,{{$v->id}})" data="1078027111">删除</a>
                        </div>
                        @endif
                        @if($v->order_status == '支付成功')
                            <div class="item-operate">
                                <a class="btn del" href="javascript:;" onclick="member_return(this,{{$v->id}})" data="1078027111">申请退款</a>
                            </div>
                        @endif
                        @if($v->order_status == '申请退款')
                            <div class="item-operate">
                                <a class="btn del" href="javascript:;"  data="1078027111">退款中</a>
                            </div>
                        @endif
                        @if($v->order_status == '出游归来')
                             <a class="btn dian"   href="/home/comment?id={{$v->id}}" style="" data="1078027111">去点评</a>
                        @endif
                    </div>
                </div>
                @endforeach
                <div style="margin:0 auto;text-align:center" id="list">{{$order->links()}}</div>
            </div>
            <ul id="page-nav" class="hide"></ul>
            <div id="no-order" class="hide">
                <img src="%E6%9F%A5%E7%9C%8B%E8%AE%A2%E5%8D%95_files/null.png" alt="" style="">
                <p class="order-tip-title">没有发现订单</p>
                <p class="order-tip-content">旅行，就是离开熟悉的地方，然后不一样的归来</p>
            </div>
        </div>
        <script>
            function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.get("/home/personal/index/del/"+id,{},function(data){
                    if(data == 1){
                        $(obj).parents(".order-item").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }else{
                        layer.msg('删除失败!',{icon:1,time:1000});
                    }
                    setTimeout(function(){
                        location.reload();
                    },2000);
                });
                
            });
        }
        function member_return(obj,id){
            index = layer.confirm('确认要退款吗？',function(index){
                $.get("/home/personal/index/return_pay/"+id,{},function(data){
                    if(data == 1){
                        $(obj).html('退款中');
                        layer.msg('申请成功!',{icon:1,time:1000});
                        setTimeout(function(){
                            $('#xubox_shade2').css('display','none');
                            $('.xubox_main').css('display','none');
                            $('.xubox_border').css('display','none');
                        },1000);
                    }else{
                        layer.msg('删除失败!',{icon:1,time:1000});
                        setTimeout(function(){
                            $('#xubox_shade2').css('display','none');
                            $('.xubox_main').css('display','none');
                            $('.xubox_border').css('display','none');
                        },1000);
                    }
                    
                });
                
            });
        }


        
        </script>
        <div id="personal"></div>

                <style>.hide { display: none !important; } #order-tab { font-size: 16px; font-weight: bold; color: #333; overflow: auto; background-color: #fff; border: 1px solid #e9e9e9; } #order-tab li { float: left; border-bottom: 3px solid transparent; padding: 14px 0; cursor: pointer; width: 125px; text-align: center; } #order-tab li i { font-style: normal; line-height: 24px; border-right: 1px solid #ddd; display: block; } #order-tab li.focus { border-bottom-color: #22c233; color: #22c233; } #order-tab li#waitTravel { width: 175px; } #order-choose { background-color: #eee; color: #666; font-size: 14px; padding: 10px 20px; overflow: auto; text-align: center; border-bottom: 1px solid #e9e9e9; } #order-choose > div { display: inline-block; *display:inline; *zoom:1; width: 9%; } #order-choose > div.order-time { width: 13%; } #order-choose > div.order-mount { width: 10%; } #order-choose > div.order-info { width: 31%; text-align: left; } #order-choose > div.order-list{ width: 11%; } #order-choose > div.order-statue { width: 13%; } #order-choose > div.order-list select { width: 100%; padding: 4px; } #order-item-list { background-color: #fff; } .order-item { padding: 10px 20px; } .order-item > .item-header { padding: 10px 0; font-size: 14px; color: #666; } .order-item > .item-header > .order-id { margin-left: 40px; } .order-item > .item-header > .del { float: right; width: 20px; margin-right: 15px; cursor: pointer; } .order-item > .item-detail { overflow: auto; padding: 10px 0 23px 0; font-size: 14px; border-bottom: 1px solid #ddd; color: #333333; } .order-item > .item-detail > div { display: inline-block; *display:inline; *zoom:1; vertical-align: middle; } .order-item > .item-detail > div.item-desc { width: 31%; } .subtitle { display: block; font-size: 14px; color: #666; margin-top: 8px; } .order-item > .item-detail .item-icon { width: 9%; margin-right: 19px; vertical-align: middle; } .order-item > .item-detail > div.item-desc > p { display: inline-block; *display:inline; *zoom:1; width: 75%; vertical-align: middle; } .order-item > .item-detail > div.item-kind { width: 11%; text-align: center; } .order-item > .item-detail > div.item-mount, .order-item > .item-detail > div.item-time { text-align: center; } .order-item > .item-detail > div.item-mount { width: 10%; } .order-item > .item-detail > div.item-time { width: 13%; } .order-item > .item-detail > div.item-price { width: 10%; text-align: center; color: #ff6600; } .order-item > .item-detail > div.item-statue { width: 13%; text-align: center; } .order-item > .item-detail > div.item-statue > p span { vertical-align: middle; } .order-item > .item-detail > div.item-statue > p img { width: 14%; vertical-align: middle; } .order-item > .item-detail > div.item-statue a { color: #22c233; } .order-item > .item-detail > div.item-operate { width: 9%; text-align: center; } .order-item > .item-detail > div.item-operate .btn { display: block; width: 68px; text-align: center; padding: 3px 0; color: #ff8800; border: 1px solid #ff8800; font-size: 12px; margin: 10px auto; cursor: pointer; } .order-item > .item-detail > div.item-operate .btn.orange, .order-item > .item-detail > div.item-operate .btn:hover { color: #fff; background-color: #ff8800; } .order-item > .item-detail > div.item-operate .btn.orange:hover { background-color: #f3ac4f; border-color: #f3ac4f; } .order-item > .item-detail > div.item-operate .btn.del { color: #666; border-color: #cccccc; } .order-item > .item-detail > div.item-operate .btn.del:hover { background-color: #fff; } .loading, #no-order { text-align: center; margin-top: 100px; font-size: 12px; } .order-tip-title { font-size: 16px; margin-top: 25px; } .order-tip-content { margin-top: 5px; font-size: 13px; } .loading p, .no-col p { margin-top: 5px; } #page-nav { text-align: right; color: #666; margin-top: 20px; } #page-nav li { display: inline-block; *display:inline; *zoom:1; width: 30px; height: 30px; font-size: 12px; line-height: 30px; border: 1px solid #ddd; text-align: center; cursor: pointer; background-color: #fff; } #page-nav li.goPre, #page-nav li.goAfter { width: auto; padding: 0 10px; } #page-nav li.dotted { border: none; background-color: transparent; } #page-nav li.focus { color: #fff; background-color: #22c233; border-color: #22c233; } #page-nav li:hover { border-color: #22c233; } #page-nav li img { width: 8px; display: block; margin: 8px auto; } #personal-title { margin: 30px 0 10px; font-size: 16px; font-weight: bold; color: #333; padding-left: 5px; border-left: 4px solid #37c249; } #personal-list { padding: 20px 16px; border: 1px solid #e4eaee; overflow: auto; position: relative; } #personal-list li { width: 225px; height: 216px; float: left; margin-left: 18px; -webkit-box-shadow: 0 1px 6px rgba(164,176,184,.27); -ms-box-shadow: 0 1px 6px rgba(164,176,184,.27); box-shadow: 0 1px 6px rgba(164,176,184,.27); } #personal-list li:first-child { margin-left: 0; } .personal-header { height: 100px; overflow: hidden; } #personal-list li img { width: 100%; display: block; } .personal-price { color: #f80; } .personal-title { margin-top: 15px; } .personal-title a { font-size: 14px; color: #404040; } .personal-price sub { font-size: 12px; } .personal-price span { font-size: 18px; font-weight: bold; } .personal-desc { width: 88%; margin: 8px auto; } #pre-page, #after-page { position: absolute; width: 46px; height: 100px; cursor: pointer; top: 80px; background-image: url('//img1.tuniucdn.com/site/file/tn-slide/img/sprite.png'); opacity: .8; display: none; } #pre-page {left: 0;} #after-page { right: 0; background-position: 48px 0; } #page-nav li#page-corporation { width: auto; background: transparent; border: none; margin-left: 20px; cursor: default; } #page-nav li#page-corporation input { width: 20px; padding: 5px 10px; border: 1px solid #ddd; color: #051b28; margin: 0 10px; } #page-nav li#page-corporation #jump { padding: 4px 9px; border: 1px solid #ddd; background-color: #fff; margin-left: 10px; cursor: pointer; }</style>
</div>



@endsection