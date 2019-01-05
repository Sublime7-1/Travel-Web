<?php $__currentLoopData = $char; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($value->level == 1): ?>
<li class="cl-cutomser" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276">
    <div class="cl-reply" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276.1">
        <div class="cl-content" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276.1.0">
            <h5 class="cl-title" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276.1.0.0"><?php echo e($value->user_id); ?></h5>
            <div class="cl-text" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276.1.0.1">
                <div data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276.1.0.1.0"><?php echo $value->content; ?></div></div>
        </div>
        <span class="" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1543838995276.1.1"></span>
    </div>
</li>
<?php else: ?>
<li class="cl-user" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444">
    <div class="cl-reply" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444.1">
        <div class="cl-content" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444.1.0">
            <h5 class="cl-title" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444.1.0.0"><?php echo e($value->service_id); ?></h5>
            <div class="cl-text" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444.1.0.1">
                <div data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444.1.0.1.0"><?php echo $value->content; ?></div></div>
        </div>
        <span class="" data-reactid=".2.0.1.0.0:$9232549.1.1.0:$1544196788444.1.1"></span>
    </div>
</li>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>$("#chat-list").scrollTop($("#chat-list")[0].scrollHeight);</script>