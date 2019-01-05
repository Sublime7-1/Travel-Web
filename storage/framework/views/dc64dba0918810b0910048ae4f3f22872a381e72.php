<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" /> 
  <!--[if IE 7]>
		  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]--> 
  <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
		<![endif]--> 
  <script src="/style/admin/assets/js/jquery.min.js"></script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]--> 
  <!--[if !IE]> --> 
  <script type="text/javascript">
			window.jQuery || document.write("<script src='/style/admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/style/admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 
  <script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/style/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> 
  <script src="/style/admin/assets/js/bootstrap.min.js"></script> 
  <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script> 
  <!-- page specific plugin scripts --> 
  <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script> 
  <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script> 
  <script type="text/javascript" src="/style/admin/js/H-ui.js"></script> 
  <script type="text/javascript" src="/style/admin/js/H-ui.admin.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>

  <script type="text/javascript" charset="utf-8" src="/style/admin/ueditor/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/style/admin/ueditor/ueditor.all.min.js">
  </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加
    载的中文，那最后就是中文-->
  <script type="text/javascript" charset="utf-8" src="/style/admin/ueditor/lang/zh-cn/zh-cn.js">
  </script>

  <title>发布内容</title> 
 </head> 
 <body> 
  <div class="page-content clearfix"> 
   <div id="Member_Ratings"> 
    <div class="d_Confirm_Order_style"> 
     <!----> 
     <div class="table_menu_list container"> 
      <form action="/admin/discountActive" method="post" id="typeerror">
        <?php echo e(csrf_field()); ?>

        <br>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>活动名称 : </label>
            <div class="formControls" style="width: 500px">
                <input type="text" class="input-text" value="<?php echo e(old('name')); ?>" placeholder="   请输入30字内的内容" id="user-name" name="name"  style="margin-left: 0;width: 500px;height: 40px">
            </div>
            <span style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;你还可输入 <b id="num">30</b> 字</span>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
       
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>活动商品 : </label>
            <div class="formControls">
               <select name="goods_id" id="">
                 <option value="0" disabled selected>--请选择--</option>
                 <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goods_v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($goods_v->id); ?>"><?php echo e($goods_v->title); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>优惠金额 : </label>
            <div class="formControls" style="width: 400px;">
                <input type="text" class="input-text" placeholder="   请输入优惠金额" id="user-name" name="discount_amount" value="<?php echo e(old('discount_amount')); ?>" style="margin-left: 0;height: 40px">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>活动时间 : </label>
            <div class="formControls" style="width: 400px;">
                <input type="date" name="begin_time" value="<?php echo e(old('begin_time')); ?>" style="margin-left: 0px;">&nbsp;&nbsp;-<input type="date" name="end_time" value="<?php echo e(old('end_time')); ?>">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div> 
         <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>活动详情 : </label>
            <div class="formControls">
                <script id="editor" type="text/plain" name="content" value="<?php echo e(old('content')); ?>" style="width:1000px;height:400px;"></script>
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <input type="hidden" name="admin_id" value="<?php echo e(session('AdminUserInfo.id')); ?>">
         <div class="form-group col-md-offset-1">
            <label class="form-label"><span class="c-red"></span></label>
            <div class="formControls" style="margin-left: 36px">
                <input type="submit" class="btn btn-success" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" class="btn btn-danger" value="重置">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
         </div> 
        </form>   
     </div> 
    <?php if(count($errors)>0): ?>
    <!-- 加top 表示最顶层弹出 -->
    <script>top.layer.alert('<?php echo e($errors->all()[0]); ?>',{
        'icon':5,
        'title':'提示'
      })</script>
    <?php endif; ?>
    </div> 
   </div> 
  </div>   
 </body>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
  var ue = UE.getEditor('editor');



</script>
<script type="text/javascript">
  var num = 29;
  $("#user-name").keydown(function(){
      var len = $(this).val().length;
      // 当长度和字数一样时，存储输入的值
      if(len == num){
        text = $(this).val();
      }
      // 当长度大于字数时，将原来存储的值覆盖新值，达到禁止再输入的效果
      if(len >= num+1){
        $(this).val(text);
        return;
      }
      $('#num').html(num - len).css('color','red');
  })
// $("#user-name").attr({maxlength:"30"});
</script>
<script type="text/javascript">
  
  $('#typeerror').submit(function(){
    str=$('#typeerror').serialize();
    var bool = false;
    $.ajax({
       type:"GET",
       url:"/admin/message/checkup",
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
    // return bool;

});
      
 
</script>
</html>