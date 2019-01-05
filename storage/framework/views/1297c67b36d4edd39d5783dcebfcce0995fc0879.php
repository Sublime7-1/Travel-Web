<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="renderer" content="webkit|ie-comp|ie-stand" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> 
  <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" /> 
  <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]--> 
  <script src="/style/admin/js/jquery-1.9.1.min.js"></script> 
  <script src="/style/admin/assets/js/bootstrap.min.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <script src="/style/admin/assets/js/ace-extra.min.js"></script> 
  <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script> 
  <script src="/style/admin/assets/dist/echarts.js"></script> 
  <script type="text/javascript" src="/style/admin/js/H-ui.js"></script> 
  <title>支付方式</title> 
 </head> 
 <body> 
  <div class="margin clearfix"> 
   <div class="defray_style"> 
   <!--  <div class="alert alert-danger"> 
     <button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>注：该支付方式启用并不能正常使用，需要开通支付功能才能使用相应的支付方式，
    </div>  -->
    <div class="border clearfix"> 
     <span class="l_f"> <a href="javascript:ovid()" onclick="add_payment()" class="btn btn-primary Pay_add"><i class="fa fa-credit-card"></i>&nbsp;添加支付方式</a> </span> 
    </div> 
        <!-- 验证消息 -->
  <?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
      <div class="mws-form-message error">
          <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>layer.msg("<?php echo e($error); ?>",{icon: 5,time:1000});</script>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
  </div>
    <script>
    setTimeout(function(){
        $('.alert-danger').hide();
    },2000);
    </script>
    <?php endif; ?>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
    <div class="mws-form-message success">
        <?php echo e(session('success')); ?>

    </div>
    </div>
    <script>
    setTimeout(function(){
        $('.alert-success').hide();
    },2000);
    </script>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="alert alert-danger">
    <div class="mws-form-message warning">
        <?php echo e(session('error')); ?>

    </div> 
    </div>  
    <script>
    setTimeout(function(){
        $('.alert-danger').hide();
    },2000);
    </script>
    <?php endif; ?>
    <!--支付列表--> 
    <div class="defray_list cover_style clearfix"> 
     <div class="type_title">
      支付方式
     </div> 
     <div class="defray_content clearfix"> 
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <ul class="defray_info"> 
       <li class="defray_name"><?php echo e($v->name); ?></li> 
       <li class="name_logo"><img src="<?php echo e($v->img); ?>" width="100%" height="150px;" /> </li> 
       <li class="description"><?php echo e($v->desc); ?></li> 
       <li class="select"> 
        <label><input name="form-field-radio<?php echo e($v->id); ?>" type="radio" <?php if($v->status == 0): ?> checked <?php endif; ?> class="ace" onchange="status(<?php echo e($v->id); ?>,'0')" /><span class="lbl">启用</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <label><input name="form-field-radio<?php echo e($v->id); ?>" <?php if($v->status == 1): ?> checked <?php endif; ?> onchange="status(<?php echo e($v->id); ?>,'1')" type="radio" class="ace" /><span class="lbl">关闭</span></label> 
       </li> 

       <li class="operating"> <a href="javascript:ovid()" onclick="member_del(this,<?php echo e($v->id); ?>)" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;删除</a></li> 
      </ul> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </div> 
    </div> 
   </div> 
  </div> 
  <!--添加支付方式--> 
  <div id="add_payment_style" style="display:none"> 
   <form id="payment_checkbox" action="/admin/pay" method="post" enctype="multipart/form-data"> 
    <?php echo e(csrf_field()); ?>

    <ul class="margin payment_list  clearfix"> 
      <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>名称：</label>
        <div class="formControls ">
          <input type="text" class="input-text" placeholder="请输入适合的名称..." id="user-name" name="title">
        </div>
      </div>
      <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>支付分类：</label>
        <div class="formControls ">
            <select class="form-control" id="form-field-select-1" name="flag" style="margin-left: 10px"> 
              <option value="">--选择分类--</option> 
              <option value="1">第三方支付方式</option>
              <option value="2">快捷支付方式</option>
              <option value="3">网银支付方式</option>
            </select>
        </div>
      </div>
      <div class="Operate_cont clearfix">
          <label class="form-label"><span class="c-red">*</span>支付图标：</label>
          <div class="formControls">
              <input name="img" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
          </div>
       </div> 
      <div class="Operate_cont clearfix">
          <label class="form-label"><span class="c-red">*</span>支付描述：</label>
          <div class="formControls">
              <textarea name="desc" class="form-textarea" id="form_textarea" placeholder=""></textarea>
          </div>
       </div> 
       <div class="Operate_cont clearfix">
          <label class="form-label"><span class="c-red">*</span>启用状态：</label>
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <label><input name="status" type="radio" value="0" checked /><span class="lbl">启用</span></label>&nbsp;&nbsp; 
              <label><input name="status" type="radio" value="1" class="ace" /><span class="lbl">关闭</span></label> 
          </div>
       </div> 
       <div class="Operate_cont clearfix">
          <label class="form-label"><span class="c-red"></span>方式：</label>
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <label><input type="submit" class="btn btn-info" value="提交" /></label>&nbsp;&nbsp; 
              <label><input type="reset" class="btn btn-danger" value="重置" /></label> 
          </div>
       </div>
    </ul> 


   <!--  <div class="add_content clearfix"> 
     <ul> 
      <li class=" clearfix"><label class="label_name">支付方式名称</label><span><input name="支付方式名称" type="text" /></span></li> 
      <li class=" clearfix"><label class="label_name">支持交易货币</label><span style=" margin-left:10px;">人民币</span></li> 
      <li class=" clearfix"><label class="label_name">合作者身份</label><span><input name="合作者身份" type="text" /></span></li> 
      <li class=" clearfix"><label class="label_name">交易安全校验码</label><span><input name="交易安全校验码" type="text" /></span></li> 
      <li class=" clearfix"> <label class="label_name">选择接口类型</label> <span> <select class="form-control" id="form-field-select-1"> <option value="">--选择接口类型--</option> <option value="1">使用标准双接口</option> <option value="2">使用担保交易接口</option> <option value="3">使用即时到帐交易接口</option> </select> </span> </li> 
      <li class=" clearfix"><label class="label_name">支付费率</label><span><input name="支付费率" type="text" />%</span></li> 
      <li class=" clearfix"><label class="label_name">排序</label><span><input name="" type="text" value="0" style="width:80px;" /></span></li> 
      <li class=" clearfix"><label class="label_name">说明</label><span><textarea name="说明" class="form-textarea" id="form_textarea" placeholder="" onkeyup="checkLength(this);"></textarea><span style=" margin-left:10px;">剩余字数：<em id="sy" style="color:Red;">200</em>字</span></span></li> 
     </ul> 
    </div>  -->
   </form> 
  </div>   
  <script>
  // 验证添加支付
$('#payment_checkbox').submit(function(){
    // 将表单提交的所有的值序列化
    str = $('#payment_checkbox').serialize();
    // 定义一个布尔值
    var bool = false;
    // ajax传输
    $.ajax({
         type:"GET",//方式
         url:"/admin/pay/checkup",//提交地址
         data:{'str':str},//提交信息
         async:false,//是否同步
         success:function(data){//返回信息
            if(data != 1){  
              // 若失败显示信息,布尔值为flase，不让提交
              layer.msg(""+data+"",{icon: 5,time:1000});
              bool = false;
            }else{
              // 成功,布尔值为true
              bool = true;
            }
        }

       }); 
    // 返回布尔值
    return bool;
});


function select_payment(ojb,id){
  if($('input[name="checkbox"]').prop("checked")){
     $('.add_content').css('display','block');
    /*  var num=0;
    var str="";
      $(".add_content input[type$='text']").each(function(n){
          if($(this).val()=="")
          { 
      layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
            title: '提示框',       
        icon:0,               
          }); 
        num++;
            return false;            
          } 
     });
      if(num>0){  return false;}  */
    }
  else{
    
     $('.add_content').css('display','none');
    }
}

/*支付删除*/
function member_del(obj,id){
  layer.confirm('确认要删除吗？',{icon:0,},function(index){
    $.get("/admin/pay/del",{'id':id},function(data){
      // alert(data);
      if(data == 1){
        $(obj).parents("ul").remove();
        layer.msg('已删除!',{icon:1,time:1000});       
      }
    });
  })
}

// 修改状态
function status(id,status){
  // alert(id+statuss);
  $.post('/admin/pay/'+id,{'_token':"<?php echo e(csrf_token()); ?>",'_method':'PUT','status':status},function(data){
      // alert(data);
      if(data == 1){
        alert('修改成功');
      }else{
        alert('修改失败');
      }
  })
}

/*字数限制*/
function checkLength(which) {
  var maxChars = 200; //
  if(which.value.length > maxChars){
     layer.open({
     icon:2,
     title:'提示框',
     content:'您输入的字数超过限制!', 
    });
    // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
    which.value = which.value.substring(0,maxChars);
    return false;
  }else{
    var curr = maxChars - which.value.length; //250 减去 当前输入的
    document.getElementById("sy").innerHTML = curr.toString();
    return true;
  }
};
/**添加支付方式0**/
function add_payment(index ){
      layer.open({
        type: 1,
        title: '添加支付方式',
        maxmin: true, 
        shadeClose:false,
        area : ['830px' , ''],
        content:$('#add_payment_style'),
      })
}
/**面包屑**/
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.details_btn').on('click', function(){
  var cname = $(this).attr("title");
  var cnames = parent.$('.Current_page').html();
  var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
  parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
  //parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
  
});
function Paymentdetails(id){
  window.location.href = "Payment_details.html?="+id;
};

</script> 
 </body>
</html>