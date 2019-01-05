@foreach($coupon as $k=>$v)
    <div class="coupon_card card_type_4">
        <div class="card_left">
            {{$v->type}}
        </div>
        <div class="card_right">
            <div class="border_top_line"></div>
            <div class="border_bot_line"></div>
            <div class="card_right_top">
                
                <div class="card_rt_left">{{$v->money}}元</div>
                <div class="card_rt_right">
                    <div class="card_rtr_top">
                        @if($v->max_money != 0)
                        每满{{$v->max_money}}元减{{$v->money}}元(最多{{$v->money}}元)
                        @else
                        立减{{$v->money}}元
                        @endif
                    </div>
                    <div class="card_rtr_mid">
                        {{$v->desc}}
                    </div>
                    <div class="card_rtr_bot">
                        {{$v->start_time}}至{{$v->end_time}}
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
                        @if($v->max_money != 0)
                        每满{{$v->max_money}}元减{{$v->money}}元(最多{{$v->money}}元)
                        @else
                        立减{{$v->money}}元
                        @endif
                        <div class="rule_titel"><div class="rule_icon"></div>活动主题</div>
                        {{$v->title}}
                        <div class="rule_titel"><div class="rule_icon"></div>活动说明</div>
                        活动时间：{{$v->start_time}}至{{$v->end_time}}<br>活动对象：优惠劵拥有人<br>活动内容：<br>{{$v->content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endforeach