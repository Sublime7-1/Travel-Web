<div class="comment-list">
@if($comment_info != '')
    @foreach($comment_info as $k => $v)
<div class="comment-card">
    <div class="comment-card-user">
        <div class="comment-card-user-vatar">
            <img src="/style/home/goodsinfo/default.gif" alt="{{$v->uname}}"></div>
        <div class="comment-card-user-name">{{$v->uname}}</div>
        <div class="comment-card-user-type">{{$v->type}}</div></div>
    <div class="comment-card-gift">
        <h3 class="comment-card-gift-title">
            <ins class="icon"></ins>点评赠送</h3>
        <div class="comment-card-gift-item">抵用券
            <span>¥20</span></div>
    </div>
    <div class="comment-card-content ">
        <!-- 评论 -->
        <div class="comment-card-product">
            <div class="comment-card-tags">
                <span class="text-orange">总体评价：{{$v->colligate_grade}}</span>
                <span>预订优惠: {{$v->discount_grade}}</span>
                <span>游玩服务: {{$v->service_grade}}</span>
                <span>游玩体验: {{$v->experience_grade}}</span>
            </div>
            <div class="comment-card-text">{{$v->content}}</div>
            @if($v->img != ' ')
            <div class="comment-card-photos comment-card-photos-float">
                <div class="comment-item-picture-button comment-item-picture-prev disabled" data-role="prev" style="display: none;">
                    <i class="icon"></i>
                </div>
                <div class="comment-item-picture-button comment-item-picture-next disabled" data-role="next" style="display: none;">
                    <i class="icon"></i>
                </div>
                <div class="comment-card-photos-box">
                    <ul data-role="list" style="width: 600px; left: 0px; top: 0px;">
                        <li data-role="item">
                            <img src="{{$v->img}}" alt=""></li>
                    </ul>
                </div>
            </div>
            @endif
            <div class="comment-card-resource"></div>
            <div class="comment-card-datetime">{{$v->time}}
                <a href="http://www.tuniu.com/static/mobile/" target="_blank">来自APP</a></div>
        </div>
        <!-- 回复 -->
        @if($v->reply != '')
        <div class="comment-card-reply-customer">
            <i class="icon-customer" style="background-image: url(/style/home/goodsinfo/c6qagwwon0a.png);"></i>
            <h3>{{$v->reply_time}} 途牛客服回复 ：</h3>         
            <p>{!!$v->reply!!}</p>
        </div>
        @endif
    </div>
</div>
    @endforeach
@endif

</div>