<!--    <input type="hidden" name="uid" value="<?php echo e($data->uid); ?>">
   <input type="hidden" name="advices_id" value="<?php echo e($data->id); ?>"> -->

   <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>评论者：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="<?php echo e($data->uname); ?>" readonly id="user-name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>商品名：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="<?php echo e($data->gname); ?>" readonly id="user-name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>订单名：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="<?php echo e($data->oid); ?>" readonly id="user-name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>评论类型：</label>
      <div class="formControls">
        <input type="text" class="input-text" value="<?php echo e($data->type); ?>" readonly id="user-name">
      </div>
    </div> 
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>评论内容：</label>
      <div class="formControls">
        <textarea cols="8" rows="6" readonly><?php echo e($data->content); ?></textarea>
      </div>
    </div>
    <?php if($data->img != 0): ?> 
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>相关截图：</label>
      <div class="formControls">
          <img src="<?php echo e($data->img); ?>}" width="500px">
      </div>
    </div>
    <?php endif; ?>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>评论时间：</label>
      <div class="formControls">
        <input type="text" class="input-text" value="<?php echo e($data->time); ?>" readonly id="user-name">
      </div>
    </div> 
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>综合评价：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="<?php echo e($data->colligate_grade); ?>" readonly id="user-name">
        </div>
     </div>
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>预订优惠：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="<?php echo e($data->discount_grade); ?>" readonly id="user-name">
        </div>
     </div>
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>游玩服务：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="<?php echo e($data->service_grade); ?>" readonly id="user-name">
        </div>
     </div>
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>游玩体验：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="<?php echo e($data->experience_grade); ?>" readonly id="user-name">
        </div>
     </div>
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>匿名评论：</label> 
        <div class="formControls">
          <?php if($data->status == 0): ?>
          <input type="text" class="input-text" value="是" readonly id="user-name">
          <?php else: ?>
          <input type="text" class="input-text" value="否" readonly id="user-name">
          <?php endif; ?>
        </div>
     </div> 
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>状态：</label> 
        <div class="formControls">
          <?php if($data->status == '未回复'): ?>
          <input type="text" class="input-text" value="未回复" readonly id="user-name">
          <?php elseif($data->status == '已查看'): ?>
          <input type="text" class="input-text" value="已查看" readonly id="user-name">
          <?php else: ?>
          <input type="text" class="input-text" value="已回复" readonly id="user-name">
          <?php endif; ?>
        </div>
     </div> 
    <div class="">
     <div class="" style=" text-align:center">
      <?php echo e(csrf_field()); ?>

      <?php if($data->status == '已回复'): ?>
      <a class="btn btn-info radius" href="/admin/comment/seereply/<?php echo e($data->id); ?>">查看回复</a>
      <?php else: ?>
      <a class="btn btn-success radius" href="/admin/comment/reply/<?php echo e($data->uid); ?>-<?php echo e($data->id); ?>">回复</a>
      <?php endif; ?>
      <a class="btn btn-primary radius" href="/admin/comment">返回</a>
      </div>
    </div>
</form>
