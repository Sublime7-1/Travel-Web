<form action="/admin/advert/<?php echo e($data->id); ?>" method="post" enctype="multipart/form-data" id="typeerror" >

  		<?php echo e(csrf_field()); ?>

      <?php echo e(method_field('PUT')); ?>

      <br>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>广告名字</label>
          <div class="formControls">
              <input type="text" class="input-text" value="<?php echo e($data->name); ?>" placeholder="" id="user-name" name="name" datatype="*2-16" nullmsg="广告名字不能为空" >
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>商品ID</label>
          <div class="formControls">
              <input type="text" class="input-text" value="<?php echo e($data->gid); ?>" placeholder="" id="user-name" name="gid">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>

      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>排序</label>
          <div class="formControls">
              <input type="text" class="input-text" value="<?php echo e($data->sort); ?>" placeholder="" id="user-name" name="sort">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>

      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>放置区域</label>
          <div class="formControls" style="width: 500px">
              <label>
                <input name="area" type="radio" value="0" class="ace" <?php if($data->area==0): ?> checked <?php endif; ?> /><span class="lbl">轮播区域</span>
              </label>&nbsp;&nbsp;&nbsp; 
              <label>
                <input name="area" value="1" type="radio" class="ace" <?php if($data->area==1): ?> checked <?php endif; ?> /><span class="lbl">头部区域</span>
              </label>
              <label>
                <input name="area" value="2" type="radio" class="ace" <?php if($data->area==2): ?> checked <?php endif; ?> /><span class="lbl">内容区域</span>
              </label>
              <label>
                <input name="area" value="3" type="radio" class="ace" <?php if($data->area==3): ?> checked <?php endif; ?> /><span class="lbl">尾部区域</span>
              </label>
              <label>
                <input name="area" value="4" type="radio" class="ace" <?php if($data->area==4): ?> checked <?php endif; ?> /><span class="lbl">商品区域</span>
              </label>
          </div>
          <div class="col-2"> <span class="Validform_checktip"></span></div>
      </div>

      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>状态</label>
          <div class="formControls">
              <label>
                <input name="status" type="radio" value="0" class="ace" <?php if($data->status==0): ?> checked <?php endif; ?> /><span class="lbl">显示</span>
              </label>&nbsp;&nbsp;&nbsp; 
              <label>
                <input name="status" type="radio" value="1" class="ace" <?php if($data->status==1): ?> checked <?php endif; ?> /><span class="lbl">隐藏</span>
              </label>
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>

       <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>当前图片</label>
          <div class="formControls">
              <img src="<?php echo e($data->img); ?>" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
       </div>

       <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>重置图片</label>
          <div class="formControls">
              <input name="img" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
       </div> 
       <div class="form-group col-md-offset-1">
          <label class="form-label"><span class="c-red"></span></label>
          <div class="formControls">
              <input type="submit" class="btn btn-success" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" class="btn btn-danger" value="重置">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
       </div> 
</form>
<script type="text/javascript">
  
  $('#typeerror').submit(function(){
    str=$('#typeerror').serialize();
    var bool = false;
    $.ajax({
       type:"GET",
       url:"/admin/advert/checkup",
       data:{'str':str},
       async:false,
       success:function(data){
          if(data != 1){
            
            layer.msg(""+data+"",{icon: 5,time:1000});
            bool = false;
          }else{
            bool = true;
          }
      }

     }); 
    return bool;

});
      
 
</script>