<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
      <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
    <![endif]-->
    <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
    <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>            
    <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
<title>支付配置</title>
</head>

<body>
<div class="margin clearfix">
 <div class="Configure_style">
    <div class="manner">
      <div class="title_name">商城用户支付配置</div>
      <div class="info clearfix">
      <table class="table table-bordered">
        <thead>
         <th>支付名称</th>
         <th>状态</th>
         <th>旗下支付方式的数量</th>
         <th>操作</th>
        </thead>
        <tbody>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
       <td>
         <?php if($v->flag == 1): ?>
            第三方支付方式
         <?php elseif($v->flag == 2): ?>
            快捷支付方式
         <?php else: ?>
            网银支付方式
         <?php endif; ?>
       </td>
       <td>
       <label><input name="form-field-radio<?php echo e($v->flag); ?>" onchange="status(<?php echo e($v->flag); ?>,'0')" type="radio" <?php if($v->status == 0): ?> checked <?php endif; ?> class="ace" onclick="Enable(this,'123')"><span class="lbl">启用</span></label>
       <label><input name="form-field-radio<?php echo e($v->flag); ?>" onchange="status(<?php echo e($v->flag); ?>,'1')" type="radio" <?php if($v->status == 1): ?> checked <?php endif; ?> class="ace" onclick="closes(this,'213')"><span class="lbl">关闭</span></label>     
       </td>      
       <td><?php echo e($v->num); ?></td>
        <td><a href="javascript:;" onclick="member_del(this,<?php echo e($v->flag); ?>)" class="btn btn-danger" name="" title="支付删除">删除</a></td>
       </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>
      </table>
      </div>
    </div><!--其他配置-->
  <div class="Other_style">
    <div class="title_name">其他配置信息</div>
    <div style="margin:5px;">
     <ul class="invoice deploy">
      <li class="name">发票</li>
      <li class="operating">  
       <span class=""><label><input name="radio" type="radio" class="ace" onclick="Enable()"><span class="lbl">启用</span></label>&nbsp;&nbsp;&nbsp;&nbsp;
       <label><input name="radio" type="radio" class="ace" onclick="closes()"><span class="lbl">关闭</span></label></span>   
        <div class="Reply_style">
          <span class="title">选择发票类型</span>
         <p><label><input name="form-field-checkbox" type="checkbox" class="ace"><span class="lbl">普通纸质发票</span></label></p>
          <p><label><input name="form-field-checkbox" type="checkbox" class="ace"><span class="lbl">增值税发票</span></label></p>
          <p><label><input name="form-field-checkbox" type="checkbox" class="ace"><span class="lbl">电子发票</span></label></p>
        </div>
         </li>
      <li class="info">发票是指一切单位和个人在购销商品、提供或接受服务以及从事其他经营活动中，所开具和收取的业务凭证，是会计核算的原始依据，也是审计机关、税务机关执法     </li>
     </ul>
      <ul class="invoice deploy">
      <li class="name">优惠劵</li>
      <li class="operating">  
       <span class="">
       <label><input name="radio1" type="radio" class="ace" ><span class="lbl">启用</span></label>&nbsp;&nbsp;&nbsp;&nbsp;
       <label><input name="radio1" type="radio" class="ace" ><span class="lbl">关闭</span></label></span>          
         </li>
      <li class="info">发票是指一切单位和个人在购销商品、提供或接受服务以及从事其他经营活动中，所开具和收取的业务凭证，是会计核算的原始依据，也是审计机关、税务机关执法     </li>
     </ul>
     <ul class="invoice deploy">
      <li class="name">代收人</li>
      <li class="operating">  
       <span class="">
       <label><input name="radio2" type="radio" class="ace" title="启用"><span class="lbl">启用</span></label>&nbsp;&nbsp;&nbsp;&nbsp;
       <label><input name="radio2" type="radio" class="ace" title="关闭"><span class="lbl">关闭</span></label></span>          
         </li>
      <li class="info">是否启用代收人操作，一次只能填写一次。如不在家可填写代收人的地址作为收货地址</li>
     </ul>
  </div>
  </div>
 </div>
 
</div>
</body>
</html>
<script>
// 修改状态
function status(flag,status){
  // alert(id+statuss);
  $.post('/admin/payconfig/'+flag,{'_token':"<?php echo e(csrf_token()); ?>",'_method':'PUT','status':status},function(data){
      // alert(data);
      if(data == 1){
        alert('修改成功');
      }else{
        alert('修改失败');
      }
  })
}

/*支付配置删除*/
function member_del(obj,flag){
  layer.confirm('确认要将所有的该类支付都删除吗？',{icon:0,},function(index){
    $.get("/admin/payconfig/del",{'flag':flag},function(data){
      // alert(data);
      if(data == 1){
        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});       
      }
    });
  })
}

 /*radio激发事件*/
function Enable(){ $('.Reply_style').css('display','block');}
function closes(){$('.Reply_style').css('display','none')}
/* function Enable(ojb,id){
   layer.confirm('确认要开启吗？',function(index){
    layer.msg('开启成功!',{icon:1,time:1000});
  });
 }
 function closes(ojb,id){
    layer.confirm('确认要关闭该支付功能吗？',function(index){
    layer.msg('以关闭!',{icon:1,time:1000});
    })
}*/
  

</script>
