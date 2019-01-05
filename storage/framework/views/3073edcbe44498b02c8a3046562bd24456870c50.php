<div class="comment-list">
<?php if($comment_info != ''): ?>
    <?php $__currentLoopData = $comment_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="comment-card">
    <div class="comment-card-user">
        <div class="comment-card-user-vatar">
            <img src="/style/home/goodsinfo/default.gif" alt="<?php echo e($v->uname); ?>"></div>
        <div class="comment-card-user-name"><?php echo e($v->uname); ?></div>
        <div class="comment-card-user-type"><?php echo e($v->type); ?></div></div>
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
                <span class="text-orange">总体评价：<?php echo e($v->colligate_grade); ?></span>
                <span>预订优惠: <?php echo e($v->discount_grade); ?></span>
                <span>游玩服务: <?php echo e($v->service_grade); ?></span>
                <span>游玩体验: <?php echo e($v->experience_grade); ?></span>
            </div>
            <div class="comment-card-text"><?php echo e($v->content); ?></div>
            <?php if($v->img != ' '): ?>
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
                            <img src="<?php echo e($v->img); ?>" alt=""></li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <div class="comment-card-resource"></div>
            <div class="comment-card-datetime"><?php echo e($v->time); ?>

                <a href="http://www.tuniu.com/static/mobile/" target="_blank">来自APP</a></div>
        </div>
        <!-- 回复 -->
        <?php if($v->reply != ''): ?>
        <div class="comment-card-reply-customer">
            <i class="icon-customer" style="background-image: url(/style/home/goodsinfo/c6qagwwon0a.png);"></i>
            <h3><?php echo e($v->reply_time); ?> 途牛客服回复 ：</h3>         
            <p><?php echo $v->reply; ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</div>